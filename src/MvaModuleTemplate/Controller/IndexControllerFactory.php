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
        $I_dogService = $serviceLocator->getServiceLocator()->get('MvaModuleTemplate\Service\DogService');
        $I_BreedService = $serviceLocator->getServiceLocator()->get('MvaModuleTemplate\Service\BreedService');
        
        $I_form = new \MvaModuleTemplate\Form\Dog();
        $I_formFilter = new \MvaModuleTemplate\Form\DogFilter();
        $I_form->setInputFilter($I_formFilter);
        $I_form->setAttribute('action', '/mva-module-template/process');
        
        $I_form->get('breed')->setValueOptions($I_BreedService->fetchAllAsArray());
        
        $as_config = $serviceLocator->getServiceLocator()->get('Config');
        return new IndexController($I_dogService, $I_form, $as_config['MvaCrud']);
    }
}
