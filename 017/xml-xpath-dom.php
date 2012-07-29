<?php

// Load the document
$xmlDoc = new DOMDocument();
$r = $xmlDoc->loadHTMLFile('http://en.wikipedia.org/wiki/Main_Page');

// Create an XPath object
$xpath = new DOMXPath($xmlDoc);
$xpath->registerNamespace('html', 'http://www.w3.org/1999/xhtml');

$results = $xpath->query("//html:img");

echo "<h1>Wikipedia images that have an 'alt' tag and are more than 40px wide</h1>";
foreach($results as $result) { /* @var $result DOMElement */
    $alt = $result->getAttribute('alt');
    echo "<img src=\"{$result->getAttribute('src')}\" />";
    echo "(" . $result->getAttribute('width') . " pixels wide)";
}
