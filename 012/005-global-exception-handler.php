<?php

function global_exception_handler($ex)
{
    $log = Logger::getGlobalLog();
    $log->error("Uncaught exception: " . $ex);
    renderErrorPage($ex->getMessage());

    exit(1);
}

set_exception_handler('global_exception_handler');