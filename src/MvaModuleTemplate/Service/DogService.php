<?php

namespace MvaModuleTemplate\Service;

use MvaModuleTemplate\Entity\Dog;

class DogService extends \MvaCrud\Service\CrudService {
    
    public function __construct($I_entityManager) {
        $this->I_entityRepository  = $I_entityManager->getRepository('MvaModuleTemplate\Entity\Dog');
        $this->I_entityManager = $I_entityManager;
        $I_dog = new Dog();

        parent::__construct($this->I_entityManager,$this->I_entityRepository,$I_dog);
    }
}
