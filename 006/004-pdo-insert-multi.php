<?php

/**
 * Running prepared statement INSERT queries multiple times
 *
 * This file loads data to insert from a CSV file
 */

// Let's not repeat the connection code...
include '001-pdo-connecting.php';

$csvFile = __DIR__ . '/data/contacts.csv';
$fp = fopen($csvFile, 'r');

$sql = "INSERT INTO contacts (name, email, phone) VALUES (?,?,?)";
$stmt = $dbh->prepare($sql);
while ($row = fgetcsv($fp)) {
    $stmt->execute($row);
}

fclose($fp);
