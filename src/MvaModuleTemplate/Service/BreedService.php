<?php

namespace MvaModuleTemplate\Service;

use ZfcBase\EventManager\EventProvider;

class BreedService extends EventProvider {
    
    private $I_entityManager;
    private $I_breedRepository;
    
    public function __construct($I_entityManager) {
        $this->I_entityManager = $I_entityManager;
        $this->I_breedRepository = $I_entityManager->getRepository('MvaModuleTemplate\Entity\Breed');
    }
    
    public function fetchAllAsArray(){
        $as_breeds = array();
        $aI_breeds = $this->I_breedRepository->findAll();
        foreach ($aI_breeds as $I_breed )
        {
            $as_breeds[$I_breed->getId()] = $I_breed->getName();
        }
        return $as_breeds;
    }

}
