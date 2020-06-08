<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use softDeletes;

    protected $fillable = [
        'wedding_packages_id', 'image'
    ];

    protected $hidden = [
        
    ];


    //relasi antara gallery dengan wedding_package
    public function wedding_package() 
    {                                                  //foreign_key         //primary_key
        return $this->belongsTo(WeddingPackage::class, 'wedding_packages_id', 'id');
        
    }

}
