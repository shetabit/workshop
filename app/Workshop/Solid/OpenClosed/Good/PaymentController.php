<?php

namespace App\Workshop\Solid\OpenClosed\Good;

use App\Http\Controllers\Controller;
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
