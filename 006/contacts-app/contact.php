<?php

/**
 * Simple Contact Management App
 *
 * contact.php - show contact information
 *
 */

require_once 'functions.php';

if (! isset($_GET['cid'])) {
    // If no contact ID specified, redirect to the home page
    header("Location: index.php");
    exit(0);
}

$contact = getContactInfo($_GET['cid']);
if ($contact) {
    $pageTitle = "Contact Info: " . $contact['name'];
} else {
    $pageTitle = "Contact Not Found";
}

printHtmlHeader($pageTitle);

if ($contact): ?>
    <h2><?php echo $contact['name']; ?></h2>
    <ul id="contact-info">
        <li><strong>Email: </strong>
            <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>"><?php echo htmlspecialchars($contact['email']); ?></a>
        </li>
        <li><strong>Phone #: </strong>
<?php if ($contact['phone']): ?>
            <?php echo htmlspecialchars($contact['phone']); ?>
<?php else: ?>
            not set
<?php endif; ?>
        </li>
    </ul>
<?php else: ?>
    Sorry, the specified contact does not exist
<?php endif; ?>
    <div id="contact-controls">
        <a href="index.php">&laquo; back to list</a>
    </div>
<?php

printHtmlFooter();
