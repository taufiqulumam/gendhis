<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use softDeletes;

    protected $fillable = [
        'wedding_packages_id', 'users_id', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [
        
    ];


    //relasi untuk melihat transaction details
    public function details() 
    {                                                  //foreign_key         //primary_key
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
        
    }
    
    //relasi untuk melihat wedding package yg dipilih
    public function wedding_package() 
    {                                                  //foreign_key         //primary_key
        return $this->belongsTo(WeddingPackage::class, 'wedding_packages_id', 'id');
        
    }

    //relasi untuk melihat siapa yg memesan wedding package
    public function user() 
    {                                                  //foreign_key         //primary_key
        return $this->belongsTo(User::class, 'users_id', 'id');
        
    }
    
}
