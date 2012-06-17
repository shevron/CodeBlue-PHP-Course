<?php

// You can declare multiple namespaces per file -
// However this is probably not a very good practice

namespace MyApp {
    function myFunc() {
        return __FUNCTION__;
    }
}

namespace OtherApp {
    function myFunc() {
        return "This is not " . \MyApp\myFunc();
    }
}
