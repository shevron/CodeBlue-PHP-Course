<?php

/**
 * Using DOM for reading an XML document
 */

// Parsing an XML document
$twitterUrl = "http://api.twitter.com/1/statuses/user_timeline/darthvader.xml";
$domDoc = new DOMDocument();
$domDoc->load($twitterUrl);

// Grab the first <user> element
$user = $domDoc->getElementsByTagName('user')->item(0);
$userName = $user->getElementsByTagName('name')->item(0)->nodeValue;

// Grab list of tweets
$statuses = $domDoc->getElementsByTagName('status');

?>
<h1>Recent tweets from <?php echo htmlspecialchars($userName)?></h1>
<ul>
<?php foreach($statuses as $status): /* @var $status DOMElement */ ?>
    <li><strong><?php echo date("Y-m-d H:i:s", get_tweet_timestamp($status)); ?></strong>
        <?php echo htmlspecialchars(get_tweet_content($status)); ?></li>
<?php endforeach; ?>
</ul>

<?php

function get_tweet_timestamp(DOMElement $status)
{
    $ts = null;

    foreach($status->childNodes as $node) {
        if ($node->nodeName == 'created_at') {
            $ts = strtotime($node->nodeValue);
            break;
        }
    }

    return $ts;
}

function get_tweet_content(DOMElement $status)
{
    foreach($status->childNodes as $node) {
        if ($node->nodeName == 'text') return $node->nodeValue;
    }

    return null;
}

