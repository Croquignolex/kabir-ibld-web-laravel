<?php

namespace App\Models;

use App\Traits\FileManageTrait;
use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @property mixed extension
 * @property mixed file
 */
class Contributor extends Model
{
    use LocaleDateTimeTrait, FileManageTrait;

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
            (new self)->deleteFile($contributor, 'contributors');
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
        return img_asset($this->file, $this->extension, 'contributors/');
    }
}
