<?php

/**
 * Usage of XMLWriter for efficient XML generation
 */

header("Content-type: application/xml");

// This is a hack to bypass superglobals JIT
$_SERVER;
$_ENV;

// Let's write all PHP's superglobals into an XML file
$writer = new XMLWriter();
$writer->openUri('php://output');
$writer->startDocument('1.0', 'utf8');

// Start the root element
$writer->startElement('superGlobals');

$superGlobs = array('_GET', '_POST', '_COOKIE', '_SERVER', '_ENV');
foreach($superGlobs as $superGlobName) {

    if (! isset($$superGlobName)) continue;

    $writer->startElement('superGlobalArray');
    $writer->writeAttribute('name', $superGlobName);

    foreach($$superGlobName as $key => $value) {
        $writer->startElement('arrayMember');
        $writer->writeAttribute('name', $key);
        $writer->text($value);
        $writer->endElement();
    }

    $writer->endElement(); // end superGlobalArray
}

$writer->endDocument();
$writer->flush();
