<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require('tableCreator.php');
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "44249764-Q8erqkADuFQn8HD0VVegodFxDVmk2pNVbc0EGaw5t",
    'oauth_access_token_secret' => "rLg18ypeu44afWJzASBiQlHOzt5TkJFKukkJi4o7S6D7X",
    'consumer_key' => "PHFqWvqXZFBwwhmJSZcN7JXnY",
    'consumer_secret' => "FcToUpUdJhLW6JF9xxpS4B5aO4sGKxnho3OYFB4N9munt1Zw7q"
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

$requestMethod = "GET";

if (isset($_GET['user']))  {
	$user = $_GET['user'];
}else {
	$user  = "mikerogo13";
}
if (isset($_GET['count'])) {
	$user = $_GET['count'];
}else {
	$count = 20;
}

$getfield = "?screen_name=$user&count=$count";

$twitter = new TwitterAPIExchange($settings);

$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);

if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

tableCreator::showTimeline($getfield, $string);
										  
?>	
