<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
  /**
   * The URIs that should be excluded from CSRF verification.
   *
   * @var array
   */
  protected $except = [
 

    '/*paytm/payment-status*',
    '/vendor/membership/mercadopago/cancel',
    '/vendor/membership/mercadopago/success',
    '*/vendor/membership/razorpay/success',
    '*/vendor/membership/razorpay/cancel',
    '/vendor/membership/instamojo/cancel',
    '/*flutterwave/success',
    '/vendor/membership/flutterwave/cancel',
    '/vendor/membership/mollie/cancel',

    '/membership/paytm/payment-status*',
    '/membership/mercadopago/cancel',
    '/membership/razorpay/success',
    '/membership/razorpay/cancel',
    '/membership/instamojo/cancel',
    '/membership/flutterwave/success',
    '/membership/flutterwave/cancel',
    '/membership/mollie/cancel',

    '/vendor/property-management/featured/flutterwave/notify',
    '/vendor/property-management/featured/razorpay/notify',
    '/vendor/property-management/featured/mercadopago/notify',
    '*/vendor/property-management/featured/paytm/notify*',
    'api/*'
  ];
}
