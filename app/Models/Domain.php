<?php

namespace App\Models;

use App\Traits\FileManageTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed can_show
 * @property mixed can_subscribe
 * @property mixed subscription_status
 */
class Domain extends Authenticatable
{
    use FileManageTrait;

    const SUBSCRIBE_PENDING = 'pending';
    const SUBSCRIBE_ACCEPTED = 'accepted';
    const SUBSCRIBE_REJECTED = 'rejected';

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

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withPivot('reason', 'status')
            ->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getSubscriptionStatusAttribute()
    {
        $subscription = $this->users()->find(Auth::user()->id);
        if($subscription->pivot->status === self::SUBSCRIBE_ACCEPTED) return ['Membre', 'success'];
        else if($subscription->pivot->status === self::SUBSCRIBE_PENDING) return ['En attente', 'warning'];
        else return ['Réjeté', 'danger'];
    }

    /**
     * @return mixed
     */
    public function getCanShowAttribute()
    {
        return $this->users()->find(Auth::user()->id)->pivot->status === self::SUBSCRIBE_ACCEPTED;
    }

    /**
     * @return mixed
     */
    public function getCanSubscribeAttribute()
    {
        return !Auth::user()->domains->contains($this);
    }
}
