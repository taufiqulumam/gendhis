<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use softDeletes;

    protected $fillable = [
        'transactions_id', 'name', 'email', 'phone_number', 'wedding_date'
    ];

    protected $hidden = [
        
    ];


    //relasi antara transaction detail dengan transaction
    public function transaction() 
    {                                                  //foreign_key         //primary_key
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
        
    }
}
