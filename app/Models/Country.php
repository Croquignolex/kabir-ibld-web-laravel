<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'alpha_2', 'alpha_3', 'en_name', 'fr_name'
    ];

    /**
     *  @return HasMany
     */
    public function domains()
    {
        return $this->hasMany('App\Models\Domain');
    }
}
