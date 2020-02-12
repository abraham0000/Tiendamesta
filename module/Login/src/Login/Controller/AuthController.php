<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\Model\ViewModel;
use Login\Form\LoginForm;

class AuthController extends AbstractActionController{
    
    protected $form;
    protected $storage;
    protected $authservice;
    
    
    
    public function indexAction(){
        return new ViewModel();
    }
    
    
    public function getAuthService(){
        if(! $this->authservice){
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }
        return $this->authservice;
    }
    
    public function getSessionStorage(){
        if(! $this->storage){
            $this->storage = $this->getServiceLocator()->get('Admin\Model\MyAuthStorage');
        }
        return $this->storage;
    }
    
    public function getForm(){
        if(! $this->form){
            $this->form = new LoginForm();
        }
        return $this->form;
    }
    
    public function loginAction(){
        if(! $this->getAuthService()->hasIdentity()){
            //cambiar aqui por la verdadera ruta ya que no la declaramos 
            return $this->redirect()->toRoute('success');
        }
    }

}
