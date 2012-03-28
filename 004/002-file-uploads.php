<?php

/**
 * Handling File Uploads
 *
 */

$error = null;
$output = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // We have a post request, handle stuff
    $source = get_uploaded_file_contents('inputFile');
    $processor = get_processor_func_name();

    if ($source) {
        if ($processor) {
            // call_user_func allows calling any callable (?) dynamically
            $output = call_user_func($processor, $source);
        } else {
            $error = "unknown or missing processing option";
        }
    } else {
        $error = "no valid source file provided";
    }

    if ($output) {
        if (isset($_POST['download']) && $_POST['download'] === '1') {
            // We send file as a download
            // See headers example from last week
            $filename = get_uploaded_file_name('inputFile');

            header("Content-type: text/plain");
            header("Content-disposition: attachment; filename=\"$filename\"");

            echo $output;

            exit(0);
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <title>Text File Processor</title>
    <style type="text/css">
        body { font-family: Verdana, sans-serif; }
        form dl dt { float: left; clear: left; width: 12em; text-align: right; margin-bottom: 1em; }
        form dl dd { float: left; clear: right; margin-bottom: 1em; margin-left: 1em; }
        div.error { border: 1px dashed #a00; background-color: #fcc; padding: 3px; }
        pre { border: 1px solid black; padding: 3px; clear: both; }
    </style>

    <body>
        <h1>Text File Processor</h1>
<?php if ($error): ?>
        <div class="error">ERROR: <?php echo $error; ?></div>
<?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <dl>
                <dt>File to Process:</dt>
                <dd><input type="file" name="inputFile" /></dd>

                <dt>Processor:</dt>
                <dd><select name="processor">
                    <option value="strtoupper">Convert to uppercase</option>
                    <option value="strtolower">Convert to lowercase</option>
                    <option value="capitalize">Capitalize Words</option>
                </select></dd>

                <dt>&nbsp;</dt>
                <dd>
                    <input type="checkbox" name="download" value="1"  id="download-cbox" />
                    <label for="download-cbox">Download output as file</label>
                </dd>

                <dt>&nbsp;</dt>
                <dd><input type="submit" value="Process File" /></dd>
            </dl>
        </form>
<?php if ($output): ?>
        <pre><?php echo htmlspecialchars($output); ?></pre>
<?php endif; ?>
    </body>
</html>
<?php

// Functions go here

/**
 * Get the uploaded file contents
 *
 * @param  string      $formField     Name of form field identifying the file
 * @return string|NULL                File contents or NULL if invalid
 */
function get_uploaded_file_contents($formField)
{
    if (isset($_FILES[$formField])) {
        $uploadedFile = $_FILES[$formField]['tmp_name'];

        // This is a required security check
        if (is_uploaded_file($uploadedFile)) {
            return file_get_contents($uploadedFile);
        }
    }

    return null;
}

/**
 * Get uploaded file name
 *
 * @param  string      $formField  Name of form field identifying the file
 * @param  string      $prefix     Prefix to add to the returned name
 * @return string|NULL             File name or NULL if invalid
 */
function get_uploaded_file_name($formField, $prefix = "processed")
{
    if (isset($_FILES[$formField])) {
        // It's probably a good idea to sanitize the file name here...
        return $prefix . '-' . $_FILES[$formField]['name'];
    }

    return null;
}

/**
 * Get selected processor function
 *
 * This returns a callable to be later called by call_user_func()
 *
 * @return Callable
 */
function get_processor_func_name()
{
    if (isset($_POST['processor'])) switch($_POST['processor']) {
        case 'strtoupper':
        case 'strtolower':
            return $_POST['processor'];
            break;

        case 'capitalize':
            return 'ucwords';
            break;
    }

    return null;
}
