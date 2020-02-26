<?php

namespace App\Models;

use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use LocaleDateTimeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'viewed', 'domain_id'
    ];

    /**
     * @return HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    /**
     * @return BelongsTo
     */
    public function domain()
    {
        return $this->belongsTo('App\Models\Domain');
    }
}
