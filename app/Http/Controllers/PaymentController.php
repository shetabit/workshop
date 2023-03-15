<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{
    public function paymentForm()
    {
        return view('payment.payment-form');
    }

    public function payment(Request $request)
    {
        try {
            $payment = new Payment([
                'amount' => $request->input('amount')
            ]);
            $payment->save();
            $amount = $payment->amount / 10;

            return ShetabitPayment::purchase(
                (new Invoice)->amount($amount),
                function($driver, $transactionId) use ($payment) {
                    // Store transactionId in database.
                    // We need the transactionId to verify payment in the future.
                    $payment->update(['token' => $transactionId]);
                }
            )->pay()->render();

        } catch (Exception $exception) {
            dd($exception->getFile(), $exception->getLine(), $exception->getMessage());
        }
    }

    public function verify(Request $request)
    {
        $payment = Payment::where('token', $request->Authority)->first();
        abort_unless($payment, 404);

        try {
            $receipt = ShetabitPayment::amount($payment->amount / 10)->transactionId($payment->token)->verify();
            DB::transaction(function () use ($payment, $receipt) {
                //Update payment
                $payment->update([
                    'status' => true,
                    'tracking_code' => $receipt->getReferenceId()
                ]);

            });

            $message = 'پرداخت با موفقیت انجام شد.';
            $status = 'success';

        } catch (InvalidPaymentException $exception) {
            //Update payment
            $payment->update([
                'status' => false
            ]);

            $message = $exception->getMessage();
            $status = 'error';
        }

        return view('payment.payment-back', [
            'status' => $status,
            'message' => $message,
            'payment' => $payment
        ]);
    }
}
