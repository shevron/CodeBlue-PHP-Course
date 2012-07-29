<?php

/**
 * Using XPath with DOM
 */

// Load the document
$xmlDoc = new DOMDocument();
$xmlDoc->load('http://rss.cnn.com/rss/cnn_latest.rss');

// Create an XPath object
$xpath = new DOMXPath($xmlDoc);
$results = $xpath->query("//item[contains(title, 'Syria')]");

echo "<h1>Recent CNN News containing 'Syria' in the title</h1>";

echo "<h2>Using DOM:</h2>";
echo "<ul>";
foreach($results as $result) { /* @var $result DOMElement */
    $title = $result->getElementsByTagName('title')->item(0)->nodeValue;
    $link = $result->getElementsByTagName('link')->item(0)->nodeValue;
    echo "<li><a href=\"{$link}\">" . htmlspecialchars($title) . "</a></li>";
}
echo "</ul>";

/**
 * Doing the same thing, but with XPath
 */

// Lets get lazy and import the document from DOM
$xml = simplexml_import_dom($xmlDoc);

// XPath query
$results = $xml->xpath("//item[contains(title, 'Syria')]");

echo "<h2>Using SimpleXML:</h2>";
echo "<ul>";
foreach($results as $result) { /* @var $result SimpleXMLElement */
    $title = (string) $result->title;
    $link  = (string) $result->link;
    echo "<li><a href=\"{$link}\">" . htmlspecialchars($title) . "</a></li>";
}
echo "</ul>";