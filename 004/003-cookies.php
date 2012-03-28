<?php

/**
 * Using cookies to store user preferences
 *
 * This simple text viewer app uses cookies to remember the user's preferred
 * theme and font size
 *
 */

$fontSize = null;
$theme    = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Change user options and redirect back to a GET view of the page
    handle_user_options_change($_POST);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit(0);
}

// Check if a font-size cookie is set
if (isset($_COOKIE['fontSize'])) {
    $fontSize = (int) $_COOKIE['fontSize'];
    if ($fontSize > 60 || $fontSize < 4) {
        $fontSize = 16;
    }
}

// Check if a theme cookie is set
if (isset($_COOKIE['theme'])) {
    switch($_COOKIE['theme']) {
        case 'dark':
        case 'light':
            $theme = $_COOKIE['theme'];
            break;
    }
}

$theme = $theme ?: 'light';
$fontSize = $fontSize ?: 16;

?>
<!DOCTYPE html>
<head>
    <title>Showcasing Cookie Usage</title>
    <link href="http://fonts.googleapis.com/css?family=Macondo" rel="stylesheet" type="text/css">
    <style type="text/css">
        body { font-family: Verdana, sans-serif; padding: 0; margin: 0 }
        body.dark { background-color: #666; color: #fff; }
        header { padding: 1em; border-bottom: 1px solid black; height: 50px; }
        header h1 { margin: 0; float: left; }
        header form { float: right; font-size: 10pt; }
        article { padding: 30px; font-family: Macondo; font-size: <?php echo $fontSize?>pt; }
        article h2 { margin: 0; }
        body.dark article { color: #fff; background-color: #333; }
    </style>
</head>

<body class="<?php echo $theme; ?>">
    <header>
        <h1>Very Cool Text Viewer</h1>
        <form id="view-controls" method="post">
            <label for="font-size">Font size: </label>
            <select name="fontSize" id="font-size" onchange="this.form.submit();">
<?php foreach(range(4, 36, 2) as $size):
      $selected = $size == $fontSize ? ' selected="selected"' : '';
?>
                <?php echo '<option value="' . $size . '"' . $selected . '>' . $size . '</option>'; ?>
<?php endforeach; ?>
            </select>
            <label for="view-theme">Theme: </label>
            <select name="theme" id="view-theme" onchange="this.form.submit();">
                <option value="light"<?php if ($theme == 'light') echo ' selected="selected"'; ?>>light</option>
                <option value="dark"<?php if ($theme == 'dark') echo ' selected="selected"'; ?>>dark</option>
            </select>
            <input type="submit" name="defaults" value="restore defaults" />
        </form>
    </header>
    <article>
        <h2>Verse 27</h2>
        <p>
            A good traveler has no fixed plans<br />
            and is not intent upon arriving.<br />
            A good artist lets his intuition<br />
            lead him wherever it wants.<br />
            A good scientist has freed himself of concepts<br />
            and keeps his mind open to what is.<br />
        </p>
        <p>
            Thus the Master is available to all people<br />
            and doesn't reject anyone.<br />
            He is ready to use all situations<br />
            and doesn't waste anything.<br />
            This is called embodying the light.<br />
        </p>
        <p>
            What is a good man but a bad man's teacher?<br />
            What is a bad man but a good man's job?<br />
            If you don't understand this, you will get lost,<br />
            however intelligent you are.<br />
            It is the great secret.<br />
        </p>
    </article>
</body>
<?php

function handle_user_options_change($data)
{
    if (isset($data['defaults']) && $data['defaults']) {
        // Restore to defaults by resetting all cookies
        setcookie('fontSize', '', 1);
        setcookie('theme', '', 1);
        return;
    }

    $expireTime = time() + 2 * 365 * 24 * 60 * 60; // expire in two years

    if (isset($data['fontSize'])) {
        setcookie('fontSize', $data['fontSize'], $expireTime);
    }

    if (isset($data['theme'])) {
        setcookie('theme', $data['theme'], $expireTime);
    }
}
