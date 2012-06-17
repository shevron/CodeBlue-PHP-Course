<?php

// This is a sub-namespace of OtherApp
namespace OtherApp\Model\Mapper;

abstract class AbstractMapper
{

}

class UserMapper extends AbstractMapper
{
    // this is \OtherApp\Model\Mapper\UserMapper
    // it extends \OtherApp\Model\Mapper\AbstractMapper
}

// This is a namespaced function
function getMapper($class)
{
    $class .= "Mapper";
    return new $class(\DB::getAdapter());
}
