<?php

/**
 * Using SimpleXML for XML parsing
 *
 * This is similar to 001-xml-dom.php but using SimpleXML
 */

// Parsing an XML document
$twitterUrl = "http://api.twitter.com/1/statuses/user_timeline/darthvader.xml";
$xml = simplexml_load_file($twitterUrl);

// Grab the first <user> element and extract name
$userName = $xml->status->user->name;

?>
<h1>Recent tweets from <?php echo htmlspecialchars($userName)?></h1>
<ul>
<?php foreach($xml->status as $status): /* @var $status SimpleXMLElement */ ?>
    <li><strong><?php echo date("Y-m-d H:i:s", strtotime($status->created_at)); ?></strong>
        <?php echo htmlspecialchars($status->text); ?></li>
<?php endforeach; ?>
</ul>