<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'mobile_number',
        'address',
        'photo',
        'status'
    ];

    public function user(){
        return  $this->belongsTo(User::class,'user_id','id');
    }
}
