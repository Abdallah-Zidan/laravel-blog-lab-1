<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $fillable =[
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute($value)
    {
       
        return Carbon::parse($value)->format('Y-m-d');
        
    }

    public function getHumanReadableDateAttribute()
    {
       
        return Carbon::parse($this->created_at)->isoFormat('dddd Do of MMMM  Y');
        
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
