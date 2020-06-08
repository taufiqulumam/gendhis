<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeddingPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'services', 'price', 'location'
    ];

    protected $hidden = [

    ];

    //relasi wedding_package dengan gallery
    public function galleries() 
    {   
        return $this->hasMany(Gallery::class, 'wedding_packages_id','id');      
    }
}
