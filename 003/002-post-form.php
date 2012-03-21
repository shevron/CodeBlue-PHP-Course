<?php

/**
 * Simple text encoding service
 *
 * This sample shows handling simple POST forms
 */

$result = null;

if (isset($_POST['method']) && isset($_POST['data'])) {
    switch($_POST['method']) {
        case 'rot13':
            $result = str_rot13($_POST['data']);
            break;

        case 'base64':
            $result = base64_encode($_POST['data']);
            break;

        case 'uuencode':
            $result = convert_uuencode($_POST['data']);
            break;
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Simple POST Form Example</title>
        <style type="text/css">
            body { font-family: sans-serif; }
        </style>
    </head>

    <body>
        <h1>Text Encoder Service</h1>
<?php if ($result): ?>
        <h2>Encoded Result:</h2>
        <textarea id="enc-result" rows="10" cols="80"><?php echo $result; ?></textarea>
<?php endif; ?>
        <form method="post">
            <h2>Encode Text</h2>
            <dl>
                <dt><label for="enc-method">Select encoding method: </label></dt>
                <dd>
                    <select name="method" id="enc-method">
                        <option value="rot13">ROT-13</option>
                        <option value="base64">Base 64</option>
                        <option value="uuencode">UUEncodce</option>
                    </select>
                </dd>
                <dt><label for="enc-data">Enter text to encode:</label></dt>
                <dd>
                    <textarea name="data" id="enc-data" rows="10" cols="80"><?php
                        if (isset($_POST['data'])) echo $_POST['data'];
                    ?></textarea>
                </dd>
            </dl>
            <input type="submit" value="Encode Text" />
        </form>
    </body>
</html>