<?php

namespace Calendar\Model;

use Zend\Db\ResultSet\Row;

class Event extends Row
{
    protected $startDateTime = null;

    /**
     * Get the start_at value as a DateTime object
     *
     * @return DateTime
     */
    public function getStartDateTime()
    {
        if ($this->start_at && $this->startDateTime === null) {
            $this->startDateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $this->start_at);
        }

        return $this->startDateTime;
    }
}