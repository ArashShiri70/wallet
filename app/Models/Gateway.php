<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gateway extends Model
{
    use HasFactory;
    protected $table = "gateways";

    protected $fillable = [
        "name",
        "api_key",
        "username",
        "password",
        "transaction_fee_deposit",
        "transaction_fee_withdraw",
        "transaction_tax"
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
