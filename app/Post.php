<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body',
        'state',
        'user_rating',
        'employee_rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belonsTo(User::class, 'employee_id');
    }
}
