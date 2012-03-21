<?php

/**
 * Setting Custom Response Headers
 *
 * This shows how you can generate a simple image with PHP and get the browser
 * to display it properly by sending the right response headers
 *
 * This example uses the gd library and PHP extension, which should be enabled
 * by default on your PHP installation. If it does not work you may have gd
 * disabled or not properly installed.
 *
 * Ensure that you have 'extension=gd.so' in your php.ini
 */

if (! function_exists('imagecreate')) {
    trigger_error('The gd extension is not enabled', E_USER_ERROR);
}

if (isset($_GET['star'])) {
    // This generates the image
    $image = imagecreate(200, 200);
    $bgcolor = imagecolorallocate($image, 255, 255, 255);
    $color = imagecolorallocate($image, 127, 10, 50);
    $points = array(
        100, 10,
        150, 150,
        30, 60,
        170, 60,
        50, 150,
    );
    imagepolygon($image, $points, 5, $color);
    imagestring($image, 5, 10, 170,  "Look I'm a PHP Star!", $color);

    // Set the right content-type header so the
    // browser knows this is an image
    header("Content-Type: image/png");
    if (isset($_GET['download'])) {
        // Set headers that tell the browser to show a "save as" dialog
        header('Content-Disposition: attachment; filename="php-star.png"');
    }

    // Send the image data
    imagepng($image);

    // Clear image memory
    imagedestroy($image);

} else {

?>
<!DOCTYPE html>
<head>
    <title>Drawing a star in PHP</title>
</head>

<body style="text-align: center;">
    <h1>How do you draw a star in PHP?</h1>
    <img src="?star=1" alt="This should be a star" />
    <p>
        <a href="?star=1&download=1">Download it!</a>
    </p>
</body>
<?php
}
