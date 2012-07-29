<?php

/**
 * Encode some variables as JSON
 */

$people  = array('Fry', 'Amy', 'Prof. Farnsworth');
$robots  = array('Bender', 'Flexo', 'Calculon', 'The Robot Devil');
$mutants = array('Leela');
$aliens  = array('Zoidberg');

$characters = compact('people', 'robots', 'mutants', 'aliens');

// Print data as JSON
echo "<h1>JSON data</h1>";
echo "<pre>" .
     json_encode($characters) .
     "</pre>";

// Print data as nicer looking JSON (more bytes on wire, requires PHP 5.4)
echo "<h1>Pretty JSON data</h1>";
echo "<pre>" .
json_encode($characters, JSON_PRETTY_PRINT) .
"</pre>";

// Force indexed arrays into JSON objects
echo "<h1>Forcing arrays as JSON objects</h1>";
echo "<pre>" .
     json_encode($characters, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT) .
     "</pre>";

// PHP data for reference
echo "<h1>var_dump value for reference</h1>";
echo "<pre>";
var_dump($characters);
echo "</pre>";

?>
<style type="text/css">
    body { font-family: sans-serif; }
    pre { border: 1px solid #aaa; background-color: #eee; padding: 3px; font-size: 14pt; }
</style>
