<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed type
 */
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone', 'town', 'description'];
}
