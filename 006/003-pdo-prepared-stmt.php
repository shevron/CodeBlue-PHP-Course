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
    $result = $stmt->execute(array($contactId));
    $contact = $result->fetch(PDO::FETCH_ASSOC);
}