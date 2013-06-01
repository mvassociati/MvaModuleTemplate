<?php

namespace MvaModuleTemplate\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class Dog extends Form
{
    
    public function __construct() {
        
        parent::__construct('dog');
        
        $id = new Element\Hidden('id');
        $this->add($id);
        
        $name = new Element\Text('name');
        $name->setLabel('name');
        $this->add($name);

        $I_breed = new Element\Select('breed');
        $I_breed->setLabel('Breed');
        $this->add($I_breed);
        
        $I_birthdate = new Element\Text('birthdate');
        $I_birthdate->setLabel('Birthdate');
        $I_birthdate->setAttributes( array(
            'class' => 'large',
            'id' => 'fd',
            'class' => 'date-picker',
            'data-date-format'=>'dd.mm.yyyy'
            ) );
        $this->add($I_birthdate);
        
        $isagoodwatchdog = new Element\Radio('isagoodwatchdog');
        $isagoodwatchdog->setLabel('Is a good watchdog?');
        $isagoodwatchdog->setValueOptions(array(
                             '1' => 'Yes',
                             '0' => 'No',
             ));
        $this->add($isagoodwatchdog);

        $send = new Element\Button('submit');
        $send->setLabel('Submit');
        $send->setAttributes(array(
            'type'  => 'submit'
        ));
        $this->add($send);
        
    }
}