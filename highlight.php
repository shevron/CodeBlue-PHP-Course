<?php

/**
 * Example 002: PHP Syntax Highlighting
 *
 * Use PHP's internal syntax highlighting capabilities to
 * produce a nicely formatted code sample from a file or
 * a string
 *
 * @author Shahar Evron <shahar@arr.gr>
 */

if (isset($_POST['code'])) {
    $code = $_POST['code'];
} else {
	$code = null;
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>PHP Code Syntax Highlighter</title>
	<style type="text/css" media="screen">
        body { font-family: Verdana, Arial, sans-serif; }
        div#code-input, div#code-output {
            width: 40%;
        	margin: 2em;
        	float: left;
        }
        div#code-input form { padding: 0; margin: 0 }
        div#code-input textarea { width: 100% }
        div.button-wrapper { text-align: right; padding: 1em 0; }
        div#code-output { overflow: auto; max-height: 600px; border: 1px dashed #aaa; padding: 2px; }
    </style>
</head>
<body>
	<h1>PHP Code Syntax Highlighter</h1>
	<hr />
	<div id="code-input">
    	<form method="post">
    		<textarea rows="20" name="code"><?php if ($code) echo htmlspecialchars($code) ?></textarea><br />
    		<div class="button-wrapper"><input type="submit" value="Highlight" /></div>
    	</form>
	</div>
	<div id="code-output">
<?php if ($code): ?>
	    <?php highlight_string($code); ?>
<?php else: ?>
        Please enter some PHP code and click "Highlight"
<?php endif ?>
	</div>
</body>
</html>
