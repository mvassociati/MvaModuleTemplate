<?php

namespace MvaModuleTemplate\Controller;

class IndexController extends \MvaCrud\Controller\CrudIndexController {
    
    public function __construct($I_service, $I_form, $as_config) {
        parent::__construct('Cane', $I_service, $I_form, $as_config);
        
        /*
        // Override __NAMESPACE__ configuration
        $this->s_indexTitle = 'Controller index custom title';
        $this->s_indexTemplate = 'mva-module-template/index/index';
        
        $this->s_newTitle     = 'Crea un nuovo cane';
        $this->s_newTemplate    = 'mva-module-template/index/dog-form';

        $this->s_editTitle    = 'Modifica i dati del cane';
        $this->s_editTemplate   = 'mva-module-template/index/dog-form';
        
        $this->s_processErrorTitle = 'Errore';
        $this->s_processErrorTemplate  = 'mva-module-template/index/dog-form';

        $this->s_processRouteRedirect = 'mva-module-template';
        $this->s_deleteRouteRedirect = 'mva-module-template';
        //*/
    }
    
    // Demostrate how to set a custom view with custom variables
    public function CustomIndexAction(){
        $this->s_indexTitle     = 'Controller index custom title';
        $this->s_indexTemplate  = 'mva-module-template/index/index';
        $base = parent::indexAction();
        $base->setVariable('foo', 'bar');
        $base->setVariable('cippa', 'lippa');
        return $base;
    }
        public function processAction(){
        if ($this->request->isPost()) {

            // get post data
            $as_post = $this->request->getPost()->toArray();
            
            // fill form
            $this->I_form->setData($as_post);
    
            // check if form is valid
            if(!$this->I_form->isValid()) {
                
                // prepare view
                $I_view = new ViewModel(array('form'  => $this->I_form,
                                               'title' => 'Some errors during dog editing'));
                $I_view->setTemplate('mva-module-template/index/dog-form');
                return $I_view;
                
            }
            
            $I_entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
            $I_breed = $I_entityManager->getReference('MvaModuleTemplate\Entity\Breed', $as_post['breed']);
            $as_post['breed'] = $I_breed;
            
            // use service to save data
            $I_dog = $this->I_service->upsertEntityFromArray($as_post);
            
            if ( $as_post['id'] > 0 ) {
                $this->flashMessenger()->setNamespace('dog')->addMessage('Dog ' . $I_dog->getName() . ' updated successfully');
            } else {
                $this->flashMessenger()->setNamespace('dog')->addMessage('Dog' . $I_dog->getName() . ' inserted successfully');
            }
            
            return $this->redirect()->toRoute('mva-module-template');
    
        }
        
        
        $this->getResponse()->setStatusCode(404);
        return;
    }
}
