<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $guarded = ['id'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function full()
    {
        return $this->load('image');
    }



}
