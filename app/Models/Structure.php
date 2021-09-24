<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Structure extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'slug', 'position', 'image'];


    function image()
    {
        if ($this->image && file_exists(public_path('uploads/structure/' . $this->image)))
            return asset('uploads/structure/' . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('uploads/structure/' . $this->image)))
            return unlink(public_path('uploads/structure/' . $this->image));
    }

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

}
