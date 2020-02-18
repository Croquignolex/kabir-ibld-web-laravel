<?php

namespace App\Models;

use App\Traits\LocaleDateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed email
 * @property mixed is_read
 * @property mixed subject
 * @property mixed format_name
 */
class Answer extends Model
{
    use LocaleDateTimeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'contact_id'
    ];

    /**
     * @return BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }
}
