<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'user_id',
        'service_id',
        'rating',
        'comment'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
