<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use HasFactory;
    protected $table = 'otp_codes';
    protected $fillable = [
        'phone_number',
        'otp_code',
        'purpose',
        'expires_at',
    ];
}
