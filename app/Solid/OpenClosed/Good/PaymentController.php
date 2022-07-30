<?php

namespace App\Solid\OpenClosed\Good;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request, PaymentFactory $paymentFactory)
    {
        try {
            $payment = $paymentFactory->initializePayment($request->type);
            $payment->pay();
        } catch (\Exception $e) {
            //exception handling
        }

    }
}

