<?php

namespace MvaModuleTemplate;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getControllerConfig() {
        return array(
            'factories' => array(
                'MvaModuleTemplate\Controller\Index' => 'MvaModuleTemplate\Controller\IndexControllerFactory'
            ),
        );
    }
    
    public function getServiceConfig() {
    
        return array(
            'factories' => array(
                'MvaModuleTemplate\Service\DogService' => 'MvaModuleTemplate\Service\DogServiceFactory',
                'MvaModuleTemplate\Service\BreedService' => 'MvaModuleTemplate\Service\BreedServiceFactory',
            ),
        );
    
    }
    
}
