<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Frontpage extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'sub_title', 'registration', 'video', 'history', 'visi', 'misi', 'image_subhead', 'misi_visimisi'];

    function image()
    {
        if ($this->image_subhead && $this->image_subvisimisi && file_exists(public_path('uploads/frontpage/subhead/', 'uploads/frontpage/visimisi/' . $this->image_subhead, $this->image_visimisi)))
            return asset('uploads/frontpage/subhead/', 'uploads/frontpage/visimisi/' . $this->image_subhead, $this->image_visimisi);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image_subhead && $this->image_subvisimisi && file_exists(public_path('uploads/frontpage/subhead/', 'uploads/frontpage/visimisi/'. $this->image_subhead, $this->image_visimisi)))
            return unlink(public_path('uploads/frontpage/subhead/', 'uploads/frontpage/visimisi/' . $this->image_subhead, $this->image_visimisi));
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
