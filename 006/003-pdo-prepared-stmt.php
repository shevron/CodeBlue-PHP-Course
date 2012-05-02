<?php

/**
 * Running prepared statement queries
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
    $sql = "SELECT * FROM contacts WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    if ($stmt->execute(array($contactId)))
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
}