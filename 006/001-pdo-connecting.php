<?php

/**
 *  Connecting to a local MySQL server using PDO
 *
 *  Ensure you have created a schema named "organizer" and granted full access
 *  to a user named 'organizer' with the password 'org4n1z3r'.
 *
 *    CREATE DATABASE organizer;
 *    GRANT ALL PRIVILEGES ON organizer.* TO 'organizer'@'localhost'
 *      IDENTIFIED BY 'org4n1z3r'
 *
 */

$dbUri  = 'mysql:host=127.0.0.1;dbname=organizer';
$dbUser = 'organizer';
$dbPass = 'org4n1z3r';

// Connect, and set error mode to Exceptions
$dbh = new PDO($dbUri, $dbUser, $dbPass, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

