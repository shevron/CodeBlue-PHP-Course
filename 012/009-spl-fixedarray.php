<?php

$array = new SplFixedArray(10);

try {
    for ($i = 0; $i < 11; $i++) {
        $array[$i] = $i * $i;
    }

} catch (RuntimeException $ex) {
    echo "ERROR: " . $ex->getMessage() . "\n";
}
