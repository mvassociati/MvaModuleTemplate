<?php

namespace MvaModuleTemplate\Controller;

class IndexController extends \MvaCrud\Controller\IndexController {
    
    public function __construct($I_service, $I_form) {
        parent::__construct('Cane', $I_service, $I_form);
        $this->s_entityName = 'cane';
        
        // Set defaults variables
        $this->s_newActionTitle     = 'Crea un nuovo '.$this->s_entityName;
        $this->s_newFormTemplate    = 'mva-module-template/index/dog-form';

        $this->s_editActionTitle    = 'Modifica i dati del '.$this->s_entityName;
        $this->s_editFormTemplate   = 'mva-module-template/index/dog-form';
        
        $this->s_processActionErrorTitle = 'Errore';
        $this->s_processActionErrorForm  = 'mva-module-template/index/dog-form';
        
        $this->s_processRouteRedirect = 'mva-module-template';
        $this->s_deleteRouteRedirect = 'mva-module-template';
    }

}
