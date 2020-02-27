<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\LocaleDateTimeTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed role
 * @property mixed city
 * @property mixed file
 * @property mixed email
 * @property mixed phone
 * @property mixed country
 * @property mixed address
 * @property mixed last_name
 * @property mixed extension
 * @property mixed post_code
 * @property mixed role_name
 * @property mixed first_name
 * @property mixed avatar_src
 * @property mixed profession
 * @property mixed description
 * @property mixed password_reset
 * @property mixed format_full_name
 * @property mixed format_last_name
 * @property mixed format_first_name
 */
class User extends Authenticatable
{
    use LocaleDateTimeTrait;

    const USER_DEFAULT_IMAGE = 'default';
    const FOLDER = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'post_code', 'extension',
        'city', 'country', 'phone', 'profession', 'address', 'role_id',
        'file', 'description', 'email', 'is_confirmed', 'email', 'password'
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
        if($this->role->type === Role::USER) return route('dashboard');
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
        return ucfirst(mb_strtolower($this->first_name));
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
    public function getRoleNameAttribute()
    {
        if($this->role->type === Role::SUPER_ADMIN) return 'Super administrateur';
        else if($this->role->type === Role::ADMIN) return 'Administrateur';

        return 'Membre';
    }

    /**
     * @return mixed
     */
    public function getAuthorisedAttribute()
    {
        return Auth::user()->role->type !== Role::USER;
    }

    /**
     * User avatar image src
     *
     * @return string
     */
    public function getAvatarSrcAttribute() {
        if(!file_exists(img_asset($this->file)))
            $this->update(['image' => self::USER_DEFAULT_IMAGE]);

        return img_asset($this->file, $this->extension, self::FOLDER . '/');
    }
}
