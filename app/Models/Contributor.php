<?php

namespace App\Models;

use App\Traits\FileManageTrait;
use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed id
 * @property mixed file
 * @property mixed name
 * @property mixed email
 * @property mixed domain
 * @property mixed extension
 */
class Contributor extends Model
{
    use LocaleDateTimeTrait, FileManageTrait;

    const FOLDER = 'contributors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'name', 'file', 'extension', 'address', 'phone', 'description', 'domain_id'
    ];

    /**
     * Boot functions
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($contributor) {
            (new self)->deleteFile($contributor, self::FOLDER);
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
        return img_asset($this->file, $this->extension, self::FOLDER . '/');
    }
}
