<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles, HasApiTokens, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['profile', 'profile.subcategory', 'profile.subcategory.category'];

    public function avatar()
    {
        if ($this->getMedia('avatar')->first() != null) {
            return $this->getFirstMediaUrl('avatar');
        }
        return '/img/avatar.png';
        
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
             ->singleFile();

        $this->addMediaCollection('trabajos');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->performOnCollections('trabajos');
        $this->addMediaConversion('avatar')
              ->width(100)
              ->height(100)
              ->performOnCollections('avatr');
    }

    public function followers()
    {
        return $this->hasMany(Follower::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

}
