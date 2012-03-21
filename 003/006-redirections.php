<?php

/**
 * Using HTTP headers to redirect a request
 *
 * This page will redirect to itself 3 times before stopping.
 *
 * Use a client-side debugger like Firebug or Chrome's developer tools, or a
 * network packet sniffer to see what's going on
 */

$redirectCount = 0;
if (isset($_GET['redirectCount'])) {
    $redirectCount = (int) $_GET['redirectCount'];
}

if ($redirectCount < 3) {
    $newLocation = $_SERVER['PHP_SELF'] . '?redirectCount=' . ++$redirectCount;
    header("Location: $newLocation");
} else {

?>
<h1>Enough with the Redirects!</h1>
<p>We are done redirecting after <?php echo $redirectCount; ?> rounds</p>
<?php

}
