<?php

/**
 * This script demonstrates the same code as in 001-xss-insecure.php but this
 * time with the XSS vulnerbilities fixed
 *
 */

session_start();

if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];
} else {
    $searchTerm = null;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Cool Site</title>
    </head>

    <body>
        <h1>Search My Cool Site</h1>
        <hr />
        <form>
            <label for="search-query">Enter Search Term:</label>
            <input name="q" id="search" type="text" value="<?php echo htmlspecialchars($searchTerm, ENT_QUOTES); ?>" />
            <input type="submit" value="I'm Feeling Secure" />
        </form>
<?php if ($searchTerm): ?>
        <h2>You searched for '<?php echo htmlspecialchars($searchTerm); ?>'</h2>
        <div>Search results:</div>
        <ul>
            <li>...</li>
            <li>...</li>
            <li>...</li>
        </ul>
<?php endif; ?>
    </body>
</html>