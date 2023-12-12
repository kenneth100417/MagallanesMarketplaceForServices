<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationRequest extends Model
{
    use HasFactory;

    protected $table = 'verification_requests';
    protected $fillable = [
        'user_id',
        'user_type',
        'business_name',
        'name',
        'business_address',
        'document_type',
        'document',
        'status'
    ];
}
