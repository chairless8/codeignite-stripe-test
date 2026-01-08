<?php
// app/Controllers/Payment.php

namespace App\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class Payment extends BaseController
{
    public function pay()
    {
        return view('pay');
    }

    public function checkout()
    {
        $secretKey = getenv('STRIPE_SECRET_KEY');
        $priceId   = getenv('STRIPE_PRICE_ABC');

        if (!$secretKey || !$priceId) {
            return $this->response
                ->setStatusCode(500)
                ->setBody('Stripe env vars missing: STRIPE_SECRET_KEY / STRIPE_PRICE_ABC');
        }

        Stripe::setApiKey($secretKey);

        $baseUrl = rtrim(base_url(), '/');

        try {
            $session = CheckoutSession::create([
                'mode' => 'payment',
                'line_items' => [[
                    'price' => $priceId,
                    'quantity' => 1,
                ]],
                'success_url' => $baseUrl . '/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'  => $baseUrl . '/cancel',
            ]);

            return redirect()->to($session->url);
        } catch (\Throwable $e) {
            return $this->response
                ->setStatusCode(500)
                ->setBody('Stripe error: ' . $e->getMessage());
        }
    }

    public function success()
    {
        $sessionId = $this->request->getGet('session_id');

        // Opcional: traer data real de Stripe para mostrar "paid"
        $status = null;
        $amount = null;
        $currency = null;

        $secretKey = getenv('STRIPE_SECRET_KEY');
        if ($secretKey && $sessionId) {
            try {
                Stripe::setApiKey($secretKey);
                $session = CheckoutSession::retrieve($sessionId);

                $status   = $session->payment_status ?? null;
                $amount   = $session->amount_total ?? null;
                $currency = $session->currency ?? null;
            } catch (\Throwable $e) {
                // En demo no pasa nada si falla esta parte
            }
        }

        return view('success', [
            'session_id' => $sessionId,
            'status' => $status,
            'amount' => $amount,
            'currency' => $currency,
        ]);
    }

    public function cancel()
    {
        return view('cancel');
    }
}
