<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google\Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('GOOGLE_CLIENT_ID');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('GOOGLE_CLIENT_SECRET');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/main/register.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>