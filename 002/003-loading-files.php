<?php

/**
 * Demonstrating include and require
 */

// Include an existing file twice
// This will load and execute the code in mylibrary twice
include 'includes/mylibrary.php';
include 'includes/mylibrary.php';

// This will do nothing as the file was already loaded
include_once 'includes/mylibrary.php';

// This will trigger a warning
include 'includes/no-such-file.php';

// This will silently fail (you really shouldn't do this)
@include 'includes/no-such-file.php';

// This will cause a fatal error
require 'includes/no-such-file.php';