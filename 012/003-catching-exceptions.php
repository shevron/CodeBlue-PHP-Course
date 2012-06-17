<?php

/**
 * This example shows catching a PDO connection exception
 */

$dbUri  = 'mysql:host=127.0.0.1;dbname=foobar';
$dbUser = 'organizer';
$dbPass = 'org4n1z3r';

try {
    $dbh = new PDO($dbUri, $dbUser, $dbPass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $ex) {
    fprintf(STDERR, "Unable to connect to DB: " .
                    $ex->getMessage());
    exit(1);
}

echo "Connected to DB successfully!";