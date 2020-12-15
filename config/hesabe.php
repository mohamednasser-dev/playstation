<?php
/**
 * hesabe Setting & API Credentials
  
 */

return [
	'VERSION' => "2.0",

    //Payment API URL
    'PAYMENT_API_URL' => env('URL_MODE', 'https://sandbox.hesabe.com'),
    // Get below values from Merchant Panel, Profile section
    'ACCESS_CODE' => env('ACCESS_CODE', ''),
    'MERCHANT_SECRET_KEY' => env('MERCHANT_SECRET_KEY', ''),
    'MERCHANT_IV' =>env('MERCHANT_IV', ''),
    'MERCHANT_CODE' => env('MERCHANT_CODE', ''),
    //Codes
    'SUCCESS_CODE' => '200',
    'AUTHENTICATION_FAILED_CODE' => '501',
	
    
];