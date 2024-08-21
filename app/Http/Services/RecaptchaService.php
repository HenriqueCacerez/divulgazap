<?php

namespace App\Http\Services;

class RecaptchaService
{
    public static function validate(string $recaptchaResponse)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL            => "https://www.google.com/recaptcha/api/siteverify",
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS     => [
                    "secret"   => env('reCAPTCHA_secret_key'),
                    "response" => $recaptchaResponse
                ]
            ]);
    
            $response = json_decode(curl_exec($curl));
            curl_close($curl);
    
            return ($response->success) ? true : false;
        } catch (\Exception $e) {
            return false;
        }
    }
}