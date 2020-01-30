<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed type
 */
class Role extends Model
{
    const USER = 'user';
    const ADMIN = 'admin';
    const SUPER_ADMIN = 'super admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    /**
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        if($this->type === Role::ADMIN) return trans('general.admin');
        if($this->type === Role::SUPER_ADMIN) return trans('general.super_admin');
        else return trans('general.user');
    }
}
