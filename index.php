<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './vendor/autoload.php';

/*

use Unirest\Request;


$headers = array('Accept' => 'application/xml');
$query = array('usr' => 'mike@sinaprinting.com', 'pwd' => 'Sina123');
Unirest\Request::verifyPeer(false);
$response = Unirest\Request::put('https://ssl.expensewatch.com/api/v1/authenticate', $headers, $query);

print_r($response);
die();


print_r( json_decode( $response->raw_body, true));
 

 */

use OtherCode\Rest;

$api = new \OtherCode\Rest\Rest();
$api->configuration->url = "https://ssl.expensewatch.com/api/v1/";

$response = $api->put('authenticate', ['usr' => 'mike@sinaprinting.com', 'pwd' => 'Sina123']);

//print_r($response);

if($response->code == 200){
    $token = $response->body;
    echo 'woo hoo! '.$token;
} else {
   print_r($response);
}


$invoices = $api->get('invoice', ['t' => $token, 'invoiceid' => '1005354-00']);

print_r($invoices);



