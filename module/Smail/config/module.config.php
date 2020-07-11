<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Smail\Controller\Smail' => 'Smail\Controller\SmailController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'smail' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/smail[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Smail\Controller\Smail',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'smail' => __DIR__ . '/../view',
        ),
    ),
);