<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DVVC extends Model
{
    protected $table='dvvc';
    function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    use HasFactory;
}
