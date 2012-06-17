<?php

// Namespace aliasing
// This files refers classes from ZF 2.0

use Zend\Uri\Http as HttpUri,
    SplQueue as Queue;

$uri = new HttpUri('http://www.example.com/');
$queue = new Queue;

$queue->enqueue($uri);
