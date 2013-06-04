<?php

namespace MvaModuleTemplate\Controller;

class IndexController extends \MvaCrud\Controller\CrudIndexController {
    
    public function __construct($I_service, $I_form, $as_config) {
        parent::__construct('Cane', $I_service, $I_form, $as_config);
        
        
        // Override __NAMESPACE__ configuration
        /*$this->s_indexTitle = 'Controller index custom title';
        $this->s_indexTemplate = 'mva-crud/index/index';
        
        $this->s_newTitle = 'Crea un nuovo cane';
        $this->s_newTemplate = 'mva-crud/index/default-form';

        $this->s_editTitle = 'Modifica i dati del cane';
        $this->s_editTemplate = 'mva-crud/index/default-form';
        
        $this->s_detailTitle = 'Dati del cane';
        $this->s_detailTemplate = 'mva-crud/index/detai';
        
        $this->s_processErrorTitle = 'Errore';
        $this->s_processErrorTemplate  = 'mva-crud/index/default-form';

        $this->s_processRouteRedirect = 'mva-crud';
        $this->s_deleteRouteRedirect = 'mva-crud';
        //*/
    }
    
}
