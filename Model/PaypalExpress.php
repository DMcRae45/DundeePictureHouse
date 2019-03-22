<?php
/*
 * PaypalExpress Class
 * Author Mark Warren
 */
class PaypalExpress
{
    public $paypalEnv       = 'sandbox'; //'production';
    public $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
//    public $paypalClientID  = 'AfjDCjvPb-qaDe7PqXGpkbgBgUThlxkS0A1fJx_cn58L6ALG75Z_SwTrwpzA0JPzcoAlQCIR1ES3TavC'; Live Client ID
//    private $paypalSecret   = 'EMw_HunFqgh2V-CfSkRDV2Hx_UzotmBErtKDfqZnvMlmzlp0LzNJMxayFGbWZdy6uM27_1YM2ZSq7mN4'; Live Secret
    public $paypalClientID  = 'AX4mPecwP3_kSjJibyAs3QVh_PKkTkGwF4vK3W3jXahw34f8OZYPg6e5PISIwqYFNHm6GApQnPdi0R8f'; // Sandbox
    private $paypalSecret   = 'EN8A1zXN5_Kd9Tkf3nLRGSewBOU_Ka4xdBTnHdZUFb0BrM_9PlIiAV49aHEvuO6AfqamQnaQcjOy61KS'; // Sandbox

    public function validate($paymentID, $token, $buyerID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->paypalURL.'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->paypalClientID.":".$this->paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);

        if(empty($response))
        {
            return false;
        }
        else
        {
            $jsonData = json_decode($response);
            $curl = curl_init($this->paypalURL.'payments/payment/'.$paymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Transaction data
            $result = json_decode($response);

            return $result;
        }
    }
}
