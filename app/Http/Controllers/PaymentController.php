<?php

namespace App\Http\Controllers;

use Paystack;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request)
    {
        $amount = $request->input('amount');
        $email = $request->input('email');
        $discount = $request->input('discount'); // optional

        if ($discount) {
            $amount = $amount - ($amount * ($discount / 100));
        }

        $transaction = Paystack::getTransactionInitialize([
            'amount' => $amount * 100, // Paystack amount is in kobo
            'email' => $email,
            'reference' => time(), // Generate a unique reference
        ]);

        return redirect()->to($transaction['data']['authorization_url']);
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData(request()->input('reference'));

        // Check if the payment is successful
        if ($paymentDetails['data']['status'] == 'success') {
            // Save the transaction and update your database
            // Redirect to a success page
        } else {
            // Redirect to a failure page
        }
    }
}

