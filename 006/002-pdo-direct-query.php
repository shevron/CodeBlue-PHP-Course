<?php

/**
 * Running Direct Queries
 *
 * THIS EXAMPLE INTENTIONALLY CONTAINS AN SQL INJECTION EXPLOIT - DO NOT
 * PLACE IT ON ANY SERVER OPEN TO OUTSIDE CONNECTIONS!
 *
 */

// Let's not repeat the connection code...
include '001-pdo-connecting.php';

if (isset($_GET['contactId'])) {
    $contactId = $_GET['contactId'];
} else {
    $contactId = null;
}

if ($contactId) {
    $sql = "SELECT * FROM contacts WHERE id = $contactId";
    $result = $dbh->query($sql);
    $contact = $result->fetch(PDO::FETCH_ASSOC);
}