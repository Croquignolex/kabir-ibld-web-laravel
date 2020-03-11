<?php

namespace App\Models;

use App\Traits\FileManageTrait;
use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed file
 * @property mixed domain
 * @property mixed extension
 * @property mixed can_download
 */
class Document extends Model
{
    use LocaleDateTimeTrait, FileManageTrait;

    const FOLDER = 'documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'file', 'extension', 'description',  'domain_id'
    ];

    /**
     * Boot functions
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($document) {
            (new self)->deleteFile($document, self::FOLDER);
        });
    }

    /**
     * @return BelongsTo
     */
    public function domain()
    {
        return $this->belongsTo('App\Models\Domain');
    }

    /**
     * @return string
     */
    public function getSrcAttribute()
    {
        return img_asset(mb_strtolower($this->extension), 'png', 'icons/');
    }

    /**
     * @return string
     */
    public function getCanDownloadAttribute()
    {
        $user = Auth::user();
        $document_domain = $this->domain;
        return (
            ($user->role->type !== Role::USER) ||
            (
                $user->domains->contains($document_domain) &&
                $user->domains()->find($document_domain->id)->pivot->status === Domain::SUBSCRIBE_ACCEPTED
            )
        );
    }
}
