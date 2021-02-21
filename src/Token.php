<?php

namespace SmartMetrics;

class Token
{
    private Config $c;
    function __construct($config)
    {
        $this->c = $config;
    }
    function get_token()
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->c->get_register_url(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>
            '{
                "client_id":"' . $this->c->get_client_id() . '",
                "email":"' . $this->c->get_email() . '",
                "name":"' . $this->c->get_name() . '"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $json_response = json_decode($response);
        return $json_response->data->sl_token;
    }
}
