<?php

/**
 * Using PHP Sessions
 *
 * This demonstrates simple usage of PHP sessions, including starting, ending
 * and regenerating sessions.
 *
 * Refer to http://php.net/manual/en/book.session.php for more info on
 * session functions and options.
 */

session_name("MyAppSession");
session_start();

if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'log in':
            if (isset($_POST['username'])) {
                session_regenerate_id(true);
                $_SESSION['username'] = $_POST['username'];
            }
            break;

        case 'log out':
            unset($_SESSION['username']);
            break;

        case 'reset my session':
            session_destroy();
            break;
    }

    // Redirect to same page to avoid POST being re-sent
    header("Location: " . $_SERVER['REQUEST_URI']);
}

$hitCount = get_user_hit_count();
$username = get_user_name();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Sessions Example</title>
        <style type="text/css">
            body { font-family: Verdana, sans-serif; }
        </style>
    </head>

    <body>
        <h1>PHP Sessions Example</h1>
        <div id="user-info">
            <form method="post">
<?php if ($username): ?>
                Logged in as <?php echo htmlspecialchars($username); ?><br />
                <input type="submit" name="action" value="log out" />
<?php else: ?>
                Not Logged In.<br />
                <input type="text" name="username" value="username" />
                <input type="submit" name="action" value="log in" />
<?php endif; ?>
                <input type="submit" name="action" value="reset my session" />
            </form>
        </div>
        <div id="session-info">
            <p>Session ID: <?php echo session_id(); ?></p>
            <p>Session hits: <?php echo $hitCount ?></p>
        </div>
    </body>
</html>
<?php

/**
 * Get the number of times the user hit this page
 *
 * @return integer
 */
function get_user_hit_count()
{
    if (! isset($_SESSION['hits'])) {
        $_SESSION['hits'] = 0;
    }

    return ++$_SESSION['hits'];
}

/**
 * Get the current user name or NULL if not logged in
 *
 * @return string|null
 */
function get_user_name()
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    } else {
        return null;
    }
}
