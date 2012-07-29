<?php

/**
 * Creating an XML file using the DOM API
 */

$domDoc = new DOMDocument();

// Create root element
$rootNode = $domDoc->createElement('myXmlDoc');
$rootNode->setAttribute('version', '1.1');
$domDoc->appendChild($rootNode);

for ($i = 1; $i <= 5; $i++) {
    $element = $domDoc->createElement('childNode', "This is node #{$i}");
    $element->setAttribute('id', "node-{$i}");
    $rootNode->appendChild($element);
}

// Print out XML document
header("Content-type: application/xml");
echo $domDoc->saveXML();