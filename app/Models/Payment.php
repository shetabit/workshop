<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'token',
        'tracking_code',
        'status'
    ];

    public function payWithCreditCard()
    {
        //paying with credit card
    }

    public function payWithPaypal()
    {
        //paying with PayPal
    }

    public function payWithWallet()
    {
        //paying with wallet
    }
}
