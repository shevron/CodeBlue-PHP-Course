<?php

/**
 * Simple Contact Management App
 *
 * index.php - home page / list contacts
 *
 */

require_once 'functions.php';

$contacts = getContactsList();

printHtmlHeader("My Contact Manager");

if (! empty($contacts)): ?>

    <?php echo count($contacts) ?> contacts found:
    <table id="contacts-list">
        <tr>
            <th>Contact ID</th>
            <th>Contact Name</th>
        </tr>
<?php foreach($contacts as $id => $name): ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><a href="contact.php?cid=<?php echo $id ?>"><?php echo htmlspecialchars($name); ?></a>
        </tr>
<?php endforeach; ?>
    </table>

<?php else: ?>
    Sorry, you have no contacts in your list.
<?php endif; ?>
    <div id="contact-controls">
        <a href="add.php"><button>+ Add Contact</button></a>
    </div>

<?php

printHtmlFooter();