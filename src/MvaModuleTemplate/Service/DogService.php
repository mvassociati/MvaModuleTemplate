<?php

namespace MvaModuleTemplate\Service;

use MvaModuleTemplate\Entity\Dog;

class DogService extends \MvaCrud\Service\CrudService {
    
    private $I_breedRepository;
    
    public function __construct($I_entityManager) {
        $this->I_entityRepository  = $I_entityManager->getRepository('MvaModuleTemplate\Entity\Dog');
        $this->I_breedRepository  = $I_entityManager->getRepository('MvaModuleTemplate\Entity\Breed');
        $this->I_entityManager = $I_entityManager;
        $I_dog = new Dog();

        parent::__construct($this->I_entityManager,$this->I_entityRepository,$I_dog);
    }
    
    public function fetchAllBreedsAsArray(){
        $as_breeds = array();
        $aI_breeds = $this->I_breedRepository->findAll();
        foreach ($aI_breeds as $I_breed )
        {
            $as_breeds[$I_breed->getId()] = $I_breed->getName();
        }
        return $as_breeds;
    }
    
}
