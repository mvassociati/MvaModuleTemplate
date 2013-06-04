<?php

namespace MvaModuleTemplate;

return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /MvaModuleTemplate/:controller/:action
            'mva-module-template' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/mva-module-template',
                    'defaults' => array(
                        '__NAMESPACE__' => 'MvaModuleTemplate\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    
                    // Default routes
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                                  
                ),
            ),
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),    
    
    
    /*'MvaCrud' => array(
        's_indexTitle' => 'Index page MvaCrud default',
        's_indexTemplate'   => 'mva-crud/index/index',
        's_newTitle'  => 'New page MvaCrud default',
        's_newTemplate'   => 'mva-crud/index/default-form',
        's_editTitle'  => 'Edit page MvaCrud default',
        's_editTemplate'   => 'mva-crud/index/default-form',
        's_detailTitle' => 'Detail page MvaCrud default',
        's_detailTemplate' => 'mva-crud/index/detail',
        's_processErrorTitle' => 'Error page MvaCrud default',
        's_processErrorTemplate' => 'mva-crud/index/default-form',
        's_deleteRouteRedirect' => 'mva-crud',
        's_processRouteRedirect' => 'mva-crud',
    ),*/
    
    
);
