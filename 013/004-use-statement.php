<?php

// Import namespaced class and a namespace

require_once './001-declaring-namespaces.php';
require_once './003-declaring-subnamespace.php';

use MyApp\User,
    OtherApp\Model\Mapper;

$name = User::getName();
$name = \MyApp\User::getName(); // same

$mapper = Mapper\getMapper('User');
$otherMapper = new Mapper\UserMapper();
