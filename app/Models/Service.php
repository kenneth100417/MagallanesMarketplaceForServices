<?php

namespace App\Models;

use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'service_provider_id',
        'service_title',
        'service_description',
        'service_rate',
        'slot'
    ];

    public function serviceProviders(){
        return  $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'user_id');
    }
}
