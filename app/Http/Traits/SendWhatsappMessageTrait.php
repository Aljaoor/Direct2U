<?php

namespace App\Http\Traits;

trait SendWhatsappMessageTrait
{
    public function sendWhatsappMessage($number, $message)
    {
        $params=array(
            'token' => 'lv4spuhopj0w6jxx',
            'to' => $number,
            'body' => $message
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance58225/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            $res =  "cURL Error #:" . $err;
        } else {
            $res =  $response;
        }
        curl_close($curl);

        return $res;

    }
}
