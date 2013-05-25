<?php

namespace MvaModuleTemplate\Form;

use Zend\InputFilter\InputFilter;

class DogFilter extends InputFilter {

    public function __construct() {
        
        $this->add(array(
            'name'       => 'name',
            'required'   => true,
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
            	array(
                    'name' => 'not_empty'
                    ),
                )
            )
       );

    }
}