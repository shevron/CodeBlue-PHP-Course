<?php

namespace Calendar\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel;

class EventController extends ActionController
{
    /**
     * @var Calendar\Model\EventTable
     */
    protected $eventTable = null;

    /**
     * Get the event table gateway object
     *
     * @return Calendar\Model\EventTable
     */
    protected function getEventTable()
    {
        if (! $this->eventTable) {
            $this->eventTable = $this->getServiceLocator()->get('event-table');
        }

        return $this->eventTable;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'events' => $this->getEventTable()->fetchAll()
        ));
    }
}