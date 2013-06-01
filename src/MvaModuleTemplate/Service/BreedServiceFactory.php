<?php
namespace MvaModuleTemplate\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BreedServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return \Incarichi\Service\IncaricoService;
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $I_entityManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        return new BreedService($I_entityManager);
    }
}
