<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

require("vendor/autoload.php");

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Assignement 1');
$log->pushHandler(new StreamHandler('greetings.log', Logger::INFO));

use GuzzleHttp\Client;

// Skapa en HTTP-client
$client = new Client();

if(isset($_GET['oneUnicorn'])) {
    $getUnicornId = $_GET['id'];
    if($getUnicornId != ""){
        try {
            $oneUnicorn = getOneUnicorn($getUnicornId, $client, $log);

        } catch (Exception $e) {
            $errorMessage = "That unicorn doesn't exist";
        }
    } 

} elseif(isset($_GET['allUnicorns'])) {

    $allUnicorns = getAllUnicorns($client, $log);
}



// Anropa URL: http://unicorns.idioti.se/
function getAllUnicorns($client, $log){

    $res = $client->request('GET', 'http://unicorns.idioti.se/', [
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);

    $resJson = json_decode($res->getBody());
    $log->info("Requested info about all unicorns");

    return $resJson;
            
}

function getOneUnicorn($id, $client, $log){
    $url = 'http://unicorns.idioti.se/' . $id;

    $res = $client->request('GET', $url, [
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);

    $resJson = json_decode($res->getBody());
    $log->info("Requested info about: " . $resJson->name);

    return $resJson;
}


?>
