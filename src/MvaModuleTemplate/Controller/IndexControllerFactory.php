<?php
namespace MvaModuleTemplate\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Contents\Controller\IndexController;
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $I_form = new \MvaModuleTemplate\Form\Dog();
        $I_formFilter = new \MvaModuleTemplate\Form\DogFilter();
        $I_form->setInputFilter($I_formFilter);
        
        // set form action
        $I_form->setAttribute('action', '/mva-module-template/process');
        
        $I_service = $serviceLocator->getServiceLocator()->get('MvaModuleTemplate\Service\DogService');
        
        return new IndexController($I_service, $I_form);
        
    }
}
