<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // id // title // posted by // created at // actions 
    protected $fillable =[
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
