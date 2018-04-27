<?php
require("vendor/autoload.php");

use GuzzleHttp\Client;

// Skapa en HTTP-client
$client = new Client();

// Anropa URL: http://unicorns.idioti.se/
$res = $client->request('GET', 'http://unicorns.idioti.se/', [
    'headers' => [
        'Accept' => 'application/json'
    ]
]);

// Omvandla JSON-svar till datatyper
$data = json_decode($res->getBody());

// @TODO Gör något fantastiskt med vår data!

?>

<!DOCTYPE html>
<html>
<head>

<title>Testing, testing</title>
</head>
<body>
<?php
    foreach($data as $unicorn){
        foreach($unicorn as $key => $value){
            echo $key, ': ',  $value, '<br/>';

        }
        echo '<br/>';
    }

?>
</body>
</html>