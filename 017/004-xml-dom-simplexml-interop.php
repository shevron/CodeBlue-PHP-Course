<?php

/**
 * Show DOM <-> SimpleXML interoperability
 */

// DOM is good at loading non-strict HTML documents
$dom = new DOMDocument();
$dom->loadHTML('http://en.wikipedia.org/wiki/Parmenides_%28dialogue%29')