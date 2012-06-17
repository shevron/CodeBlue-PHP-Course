<?php

// Using the __NAMESPACE__ magic constant for dynamic features using namespaces

namespace MyApp\Model;

class User
{ }

class Group
{ }

class ModelFactory
{
    static public function factoryBroken($type)
    {
        return new $type();
    }

    static public function factory($type)
    {
        $class = __NAMESPACE__ . '\\' . $type;
        return new $class();
    }
}

ModelFactory::factoryBroken('User');
ModelFactory::factory('User');