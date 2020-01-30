<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed id
 * @property mixed role
 * @property string city
 * @property mixed image
 * @property string phone
 * @property string token
 * @property string address
 * @property string country
 * @property mixed extension
 * @property string post_code
 * @property mixed authorised
 * @property mixed currencies
 * @property mixed is_factored
 * @property string profession
 * @property bool is_confirmed
 * @property string description
 * @property mixed user_settings
 * @property mixed password_reset
 * @property mixed format_full_name
 * @property mixed format_last_name
 * @property mixed format_first_name
 * @property array|null|string email
 * @property array|null|string password
 * @property array|null|string last_name
 * @property array|null|string first_name
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'post_code', 'extension',
        'city', 'country', 'phone', 'profession', 'address', 'role_id',
        'image', 'description', 'email', 'is_confirmed', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'is_confirmed', 'email'
    ];

    /**
     * Boot functions
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = Str::random(64);
            $user->password = Hash::make($user->password);
        });
    }

    /**
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * @return HasOne
     */
    public function password_reset()
    {
        return $this->hasOne('App\Models\PasswordReset');
    }

    /**
     * @return mixed
     */
    public function getDashboardRouteAttribute()
    {
        if($this->role->type === Role::USER) return route('app.dashboard');
        else return route('admin.dashboard');
    }

    /**
     * @return mixed
     */
    public function getResetLinkAttribute()
    {
        if($this->role->type === Role::USER) return route('password.reset', ['token' => $this->password_reset->token]);
        else return route('admin.password.reset', ['token' => $this->password_reset->token]);
    }

    /**
     * @return mixed
     */
    public function getFormatFirstNameAttribute()
    {
        return ucfirst($this->first_name);
    }

    /**
     * @return mixed
     */
    public function getFormatLastNameAttribute()
    {
        return mb_strtoupper($this->last_name);
    }

    /**
     * @return mixed
     */
    public function getFormatFullNameAttribute()
    {
        return $this->format_first_name . ' ' . $this->format_last_name;
    }

    /**
     * @return mixed
     */
    public function getAuthorisedAttribute()
    {
        return Auth::user()->role->type !== Role::USER;
    }
}
