<?php

namespace App\Models;

use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed email
 * @property mixed is_read
 * @property mixed subject
 * @property mixed format_name
 */
class Contact extends Model
{
    use LocaleDateTimeTrait;

    const GLOBAL = 'global';
    const DOMAIN = 'domain';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'viewed'
    ];


    /**
     * @return HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
