<?php

/**
 * This file enables viewing all files under the directory in which
 * it is installed (and subdirs) as highlighted PHP source files (or
 * plain text files). 
 * 
 * NOTE: NEVER deploy this file on a production server. It is basically
 *       one big security hole by design. 
 */

header("Content-type: text/html; charset=UTF-8");

$basePath = realpath(__DIR__);
$isBasePath = true;

chdir($basePath);

if (isset($_GET['p'])) {
    $path = realpath($_GET['p']);
    if (substr($path, 0, strlen($basePath)) !== $basePath) {
        // Path is not under the base path
        throw new ErrorException("Requested path $path is not under the allowed directory $basePath");
    }

    $isBasePath = ($path == $basePath);

} else {
    $path = $basePath;
}

if (is_dir($path)) {
    $output = new DirectoryIterator($path);
} else {
    $output = highlight_file($path, true);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP file / project syntax highlighting</title>
    <style type="text/css">
        * { font-family: Monaco, "Courier New", monospace; }
        #content { padding: 10px; border: 1px solid black; background-color: #f0f0f0; }
        #content ul { margin: 0; list-style-type: none; padding: 0; }
        a { text-decoration: none; color: #2040ee; }
        a:hover { text-decoration: underline; }
        #content a:after { content: " →" }
    </style>
</head>

<body>
    <header>
        <h1>
<?php if (! $isBasePath): ?>
            <a href="?p=<?php echo dirname($path) ?>"><?php echo htmlspecialchars(basename(dirname($path))); ?></a> /
<?php endif; ?>
            <?php echo htmlspecialchars(basename($path)); ?>
        </h1>
    </header>

    <div id="content">
<?php if ($output instanceof DirectoryIterator): ?>
        <ul>
<?php foreach($output as $file): /* @var $file SplFileInfo */ ?>
<?php if (substr($file->getFilename(), 0, 1) != '.'): ?>
            <li><a href="?p=<?php echo $file->getPathname(); ?>"><?php echo htmlspecialchars($file->getFilename()); ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
        </ul>
<?php else: ?>
        <?php echo $output; ?>
<?php endif; ?>
    </div>

</body>

</html>
