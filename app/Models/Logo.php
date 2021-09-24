<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Logo extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'image'];

    function image()
    {
        if ($this->image && file_exists(public_path('uploads/logo/' . $this->image)))
            return asset('uploads/logo/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/logo/' . $this->image)))
            return unlink(public_path('uploads/logo/' . $this->image));
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
