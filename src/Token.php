<?php

namespace SuperMetrics;
/**
 * Class that is responsible for getting the token, also further can have token storage/persistance related options
 */
class Token
{
    /**
     * @var Config holds the config object
     */
    private Config $c;
    /**
     * class constructor, takes the input as config and sets it in the object
     * @param Config the config object
     */
    function __construct($config)
    {
        $this->c = $config;
    }
    /**
     * returns the token to be used while sending API requests
     * @return string the token
     */
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
