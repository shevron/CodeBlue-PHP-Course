<?php

// Module configuration for the Calendar module

use Calendar\Model\EventTable;

return array(
    'controller' => array(
        'classes' => array(
            'calendar/event' => 'Calendar\Controller\EventController',
        )
    ),

    'router' => array(
        'routes' => array(
            'event' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/event[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z-]*',
                        'id'     => '\d+'
                    ),
                    'defaults' => array(
                        'controller' => 'calendar/event',
                        'action'     => 'index'
                    )
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),

    'service_manager' => array(
        'factories' => array(
            'event-table' => function($serviceMgr) {
                return new EventTable($serviceMgr->get('db-adapter'));
            }
        ),

    )
);