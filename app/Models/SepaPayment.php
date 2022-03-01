<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepaPayment extends Model
{
    use HasFactory;

    protected $fillable = ['payment_id', 'amount', 'customer_id', 'user_id', 'city', 'country', 'line1', 'line2', 'postal_code', 'state', 'email', 'name', 'phone', 'bank_code', 'branch_code', 'fingerprint', 'last4', 'mandate', 'payment_type', 'payment_method'];
}