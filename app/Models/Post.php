<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [ 'category_id','title', 'slug', 'excerpt', 'body', 'image'];

    public function Category() {
        return $this->belongsTo(Category::class);
    }



    function image()
    {
        if ($this->image && file_exists(public_path('uploads/post/' . $this->image)))
            return asset('uploads/post/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/post/' . $this->image)))
            return unlink(public_path('uploads/post/' . $this->image));
    }

    public function Sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
