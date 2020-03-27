<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
       
        return Carbon::parse($this->created_at)->isoFormat('dddd Do of MMMM  Y hh:mm:ss A');
        
    }

}
