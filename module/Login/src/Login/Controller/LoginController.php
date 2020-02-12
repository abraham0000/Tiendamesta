<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Model;
class LoginController  extends AbstractActionController{
    protected $_model;
    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $this->_model  = new Model\ModelPrueba($em);
        parent::onDispatch($e);
    }
    
    public function indexAction(){
        $result = $this->_model->realizarPrueba();
        return new ViewModel(array('result' => $result));
    }
    
    
}