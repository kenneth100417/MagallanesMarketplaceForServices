<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $table = 'service_providers';
    protected $fillable = [
        'user_id',
        'business_name',
        'business_address',
        'firstname',
        'lastname',
        'mobile_number',
        'photo',
    ];

    
    public function user(){
        return  $this->belongsTo(User::class,'user_id','id');
    }
    
    public function service(){
        return $this->hasMany(Service::class, 'service_provider_id', 'id');
    }

}
