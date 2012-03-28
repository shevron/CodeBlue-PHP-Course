<?php

/**
 * Highlight a PHP source file
 *
 * This tool shows the list of examples in our course. If one is selected,
 * it will show a highlighted version of it.
 *
 * NOTE: THIS SCRIPT CONTAINS AN (INTENTIONAL) SECURITY VULNERABILITY AND MUST
 *       NEVER(!) BE DEPLOYED ON A PUBLICLY ACCESSIBLE SERVER
 *       oh, also, can you find what it is?
 */

$possibleFiles = get_possible_files();

if (isset($_GET['file']) && $_GET['file'] && in_array($_GET['file'], $possibleFiles)) {
    $file = __DIR__ . '/../' . $_GET['file'];
    $source = highlight_file($file, true);
} else {
    $source = null;
}

?>
<!DOCTYPE html>
<head>
    <title>Syntax Highlighted File</title>
    <style type="text/css">
        body { font-family: sans-serif; }
        #file-selector { padding-bottom: 20px; border-bottom: 1px solid black; }
        #file-source { padding: 20px; }
    </style>
</head>

<body>
    <h1>Syntax Highlighted PHP Files</h1>
    <div id="file-selector">
        <form method="get">
            <label>Select file: </label>
            <select name="file">
                <option value="">Select file...</option>
<?php foreach($possibleFiles as $file): ?>
                <option value="<?php echo $file; ?>" <?php
                    if (isset($_GET['file']) && $file == $_GET['file']) echo ' selected="selected"'
                ?>><?php echo $file?></option>
<?php endforeach; ?>
            </select>

            <input type="submit" value="Highlight" />
        </form>
    </div>
<?php if ($source): ?>
    <div id="file-source">
        <?php echo $source?>
    </div>
<?php endif; ?>
</body>

<?php

/**
 * Get list of possible files
 *
 * @return array
 */
function get_possible_files()
{
    $possibleFiles = glob(__DIR__ . '/../00?/*.php');
    return array_map('filter_file_path', $possibleFiles);
}

/**
 * Filter a single file path by removing it's base directory
 *
 * This is used as an array_map callback by get_possible_files
 *
 * @param  string $file
 * @return string
 */
function filter_file_path($file)
{
    static $pathlen = null;

    if ($pathlen === null) {
        $pathlen = strlen(__DIR__ . '/../');
    }

    return substr($file, $pathlen);
}
