<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require("vendor/autoload.php");

use GuzzleHttp\Client;

// Skapa en HTTP-client
$client = new Client();



if(isset($_GET['oneUnicorn'])) {
    $getUnicornId = $_GET['id'];
    if($getUnicornId != ""){
        try {
            $res = getOneUnicorn($getUnicornId, $client);
            // Omvandla JSON-svar till datatyper
            $oneUnicorn = json_decode($res->getBody());
        } catch (Exception $e) {
            $errorMessage = "That unicorn doesn't exist";
        }
    } 


    


} elseif(isset($_GET['allUnicorns'])) {

    $res = getAllUnicorns($client);
    // Omvandla JSON-svar till datatyper
    $allUnicorns = json_decode($res->getBody());

}



// Anropa URL: http://unicorns.idioti.se/
function getAllUnicorns($client){

    $res = $client->request('GET', 'http://unicorns.idioti.se/', [
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);

    return $res;
            
}

function getOneUnicorn($id, $client){
    $url = 'http://unicorns.idioti.se/' . $id;

    $res = $client->request('GET', $url, [
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);

    return $res;
}


?>
