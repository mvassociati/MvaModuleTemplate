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