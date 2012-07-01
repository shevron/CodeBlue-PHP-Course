<?php

namespace Calendar\Model;

use Zend\Db\TableGateway\AbstractTableGateway,
    Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet;

class EventTable extends AbstractTableGateway
{
    protected $table = 'events';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet(new Event());
    }

    public function fetchAll()
    {
        return $this->select();
    }
}