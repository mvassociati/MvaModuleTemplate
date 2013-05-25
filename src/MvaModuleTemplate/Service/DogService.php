<?php

namespace MvaModuleTemplate\Service;

use \MvaModuleTemplate\Entity\Dog;

class DogService {
    
    private $I_dogRepository;
    private $I_entityManager;
    
    public function __construct($I_entityManager) {
        $this->I_dogRepository  = $I_entityManager->getRepository('MvaModuleTemplate\Entity\Dog');
        $this->I_entityManager = $I_entityManager;
    }
    
    public function getAllEntities(){
        return $this->I_dogRepository->findAll();
    }
    
    public function getEntity($i_id){
        $I_entity = $this->I_dogRepository->find($i_id);
        
        if ($I_entity === null ){
            throw new \Exception('Entity not found');    //@todo throw custom exception type
        }
        
        return $I_entity;
    }
    
    /**
     * Inserts or updates Dog
     * 
     * @param array $am_formData
     * @return Ambigous <NULL, \MvaModuleTemplate\Entity\Dog>
     */
    public function upsertEntityFromArray(array $am_formData){

        $I_dog = NULL;
        if (isset($am_formData['id']) && 
            is_numeric($am_formData['id']) && 
            $am_formData['id'] > 0){
            $I_dog = $this->getEntity($am_formData['id']);
        }

        if (!($I_dog instanceof Dog)) {
            $I_dog = new Dog();
        }

        $I_dog->fillWith($am_formData);
        
        $this->I_entityManager->persist($I_dog);
        $this->I_entityManager->flush();
    
        return $I_dog;
    }
    
    public function deleteDog(Dog $I_dog) {
        $this->I_entityManager->remove($I_dog);
        $this->I_entityManager->flush();
    }    
    
}
