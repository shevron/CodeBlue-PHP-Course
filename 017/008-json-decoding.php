<?php

/**
 * Decoding JSON data as PHP
 */

// Same Twitter feed, but use JSON
$twitterUrl = "http://api.twitter.com/1/statuses/user_timeline/darthvader.json";

// Decode JSON objects as PHP objects
$feed = json_decode(file_get_contents($twitterUrl));

echo "<h1>JSON objects as PHP objects</h1>";
echo "<pre>";
var_dump($feed[0]);
echo "</pre>";
echo "<h3>Tweeted using {$feed[0]->source}</h3>";

// Decode JSON objects as PHP associative arrays
$feed = json_decode(file_get_contents($twitterUrl), true);

echo "<h1>JSON objects as PHP arrays</h1>";
echo "<pre>";
var_dump($feed[0]);
echo "</pre>";
echo "<h3>Tweeted using {$feed[0]['source']}</h3>";

?>
<style type="text/css">
    body { font-family: sans-serif; }
    pre { border: 1px solid #aaa; background-color: #eee; padding: 3px; font-size: 14pt; }
</style>