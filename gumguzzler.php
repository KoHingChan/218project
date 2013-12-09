<?php
require_once 'vendor/autoload.php';
use Guzzle\Http\Client;

// Create a client and provide a base URL
$client = new Client('https://api.github.com');
// Create a request with basic Auth
$request = $client->get('/user')->setAuth('user', 'pass');
// Send the request and get the response
$response = $request->send();
echo $response->getBody();
// >>> {"type":"User", ...
echo $response->getHeader('Content-Length');
// >>> 792

// Create a client to work with the Twitter API
$client = new Client('https://api.twitter.com/{version}', array(
    'version' => '1.1'
));

// Sign all requests with the OauthPlugin
$client->addSubscriber(new Guzzle\Plugin\Oauth\OauthPlugin(array(
    'consumer_key'  => '***',
    'consumer_secret' => '***',
    'token'       => '***',
    'token_secret'  => '***'
)));

echo $client->get('statuses/user_timeline.json')->send()->getBody();
// >>> {"public_gists":6,"type":"User" ...

// Create a tweet using POST
$request = $client->post('statuses/update.json', null, array(
    'status' => 'Tweeted with Guzzle, http://guzzlephp.org'
));

// Send the request and parse the JSON response into an array
$data = $request->send()->json();
echo $data['text'];
// >>> Tweeted with Guzzle, http://t.co/kngJMfRk