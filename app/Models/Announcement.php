<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Announcement extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['pengumuman', 'isi', 'file'];

    function file()
    {
        if ($this->file && file_exists(public_path('uploads/pengumuman/' . $this->file)))
            return asset('uploads/pengumuman/' . $this->file);
        else
            return asset('file/no_file');
    }

    function delete_file()
    {
        if ($this->file && file_exists(public_path('uploads/pengumuman/' . $this->file)))
            return unlink(public_path('uploads/pengumuman/' . $this->file));
    }

    public function Sluggable():array
    {
        return [
            'slug' => [
                'source' => 'pengumuman'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

}
