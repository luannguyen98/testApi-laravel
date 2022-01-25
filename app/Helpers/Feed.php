<?php
namespace App\Helpers;

class Feed{

    public static function test(){
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '10',
            'convert' => 'USD'
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: 61a710bb-f4e2-4381-98bb-3929d434d8d8'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers 
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response, TRUE); // print json decoded response
        $data = $data['data'];
        curl_close($curl); // Close request

        $result = [];
        foreach ($data as $key => $value) {
            $result[$key]['name'] = $value['name'];
            $result[$key]['price'] = $value['quote']['USD']['price'];
            $result[$key]['percent_change_24h'] = $value['quote']['USD']['percent_change_24h'];
        }
        return $result;
    }
}
