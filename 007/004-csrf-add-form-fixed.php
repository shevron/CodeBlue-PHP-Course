<?php

/**
 * Simple Contact Management App
 *
 * add.php - Add a new contact
 *
 */

require_once 'functions.php';

session_start();

$error = null;
if (! empty($_POST)) {
    // Handle form submission and redirect to home page
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {

        // Verify nonceToken
        if (isset($_SESSION['nonceToken']) && isset($_POST['nonceToken']) &&
            $_SESSION['nonceToken'] === $_POST['nonceToken']) {


            if (addContact($_POST['name'], $_POST['email'], $_POST['phone'])) {
                header("Location: index.php");
                exit(0);
            } else {
                $error = "Unable to save data in DB";
            }
        } else {
            $error = "Your request has expired - please try again";
        }
    }
} else {
    $nonceToken = md5(microtime() . rand());
    $_SESSION['nonceToken'] = $nonceToken;
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
        <input type="hidden" name="nonceToken" value="<?php echo $nonceToken; ?>" />
        <input type="submit" value="Add Contact" />
    </form>

    <div id="contact-controls">
        <a href="index.php">&laquo; back to list</a>
    </div>

<?php

printHtmlFooter();