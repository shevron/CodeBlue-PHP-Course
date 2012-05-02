<?php

/**
 * Simple Contact Management App
 *
 * add.php - Add a new contact
 *
 */

require_once 'functions.php';

$error = null;
if (! empty($_POST)) {
    // Handle form submission and redirect to home page
}

printHtmlHeader("Add Contact");

?>
<?php if ($error): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>
    <form method="post">
        <dl>
            <dt>Contact Name:</dt>
            <dd><input type="text" name="name" value="" /></dd>

            <dt>Contact Email:</dt>
            <dd><input type="email" name="email" value="" /></dd>

            <dt>Contact Phone #:</dt>
            <dd><input type="text" name="phone" value="" /></dd>
        </dl>
        <input type="submit" value="Add Contact" />
    </form>

    <div id="contact-controls">
        <a href="index.php">&laquo; back to list</a>
    </div>

<?php

printHtmlFooter();