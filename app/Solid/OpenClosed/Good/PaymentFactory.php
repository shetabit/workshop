<?php

namespace App\Solid\OpenClosed\Good;

class PaymentFactory
{
    /**
     * @throws \Exception
     */
    public function initializePayment(string $type): PaypalPayment|WalletPayment|CreditCardPayment
    {
        if ($type === 'credit') {
            return new CreditCardPayment();
        } elseif ($type === 'paypal') {
            return new PaypalPayment();
        } elseif ($type === 'wallet') {
            return  new WalletPayment();
        }

        throw new \Exception('Unsupported payment method!');
    }
}
