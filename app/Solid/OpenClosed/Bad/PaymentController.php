<?php

namespace App\Solid\OpenClosed\Bad;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request, Payment $payment)
    {
//        if ($request->type === 'credit') {
//            $payment->payWithCreditCard();
//        } else {
//            $payment->payWithPaypal();
//        }

        if ($request->type === 'credit') {
            $payment->payWithCreditCard();
        } elseif ($request->type === 'paypal') {
            $payment->payWithPaypal();
        } else {
            $payment->payWithWallet();
        }

    }
}
