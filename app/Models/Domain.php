<?php

namespace App\Models;

use App\Traits\FileManageTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Domain extends Authenticatable
{
    use FileManageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'name', 'icon', 'country_id'
    ];

    /**
     * Boot functions
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($domain) {
            // Delete contributors images
            foreach($domain->contributors as $contributor)
                (new self)->deleteFile($contributor, Contributor::FOLDER);
            // Delete documents files
            foreach($domain->documents as $document)
                (new self)->deleteFile($document, Document::FOLDER);
        });
    }

    /**
     * @return BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * @return HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    /**
     * @return HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }

    /**
     * @return HasMany
     */
    public function contributors()
    {
        return $this->hasMany('App\Models\Contributor');
    }
}
