<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\HasTags;
class Post extends Model
{
    use Sluggable;
    use HasTags;
    
    protected $fillable =[
        'title',
        'description',
        'user_id',
        "post_image"
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getCreatedAtAttribute($value)
    {
       
        return Carbon::parse($value)->format('Y-m-d');
        
    }

    public function getHumanReadableDateAttribute()
    {
       
        return Carbon::parse($this->created_at)->isoFormat('dddd Do of MMMM  Y');
        
    }

    public function getPostImageAttribute($value){
        return $value ? Storage::url($value) : null;
    }

    public function setPostImageAttribute($value){

        if(isset($this->attributes['post_image']))
                Storage::disk('public')
                ->delete("uploads/images/".basename($this->attributes['post_image']));
        
        $folder = 'public/uploads/images';
        $path =$value->store($folder);
        $this->attributes['post_image'] =$path;
    }
}
