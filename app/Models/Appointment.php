<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Customer;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'customer_id',
        'service_provider_id',
        'service_id',
        'start_date',
        'end_date',
        'status',
    ];


    public function service(){
        return  $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function customer(){
        return  $this->belongsTo(Customer::class, 'customer_id', 'user_id');
    }
    public function service_provider(){
        return  $this->belongsTo(ServiceProvider::class, 'service_provider_id', 'id');
    }
}
