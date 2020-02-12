<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

class AuthController extends Zend_Controller_Action{
    
    public function loginAction(){
        $db = $this->_getParam('db');
        
        $loginForm = new Default_Form_Auth_Login($_POST);
        
        if ($loginForm->isValid()){
            $adapter = new Zend_Auth_Adapter_DbTable(
                    $db,
                    'users',
                    'username',
                    'Password',
                    'MD5(CONCAT(?, Password_salt))'
                    );
            
            $adapter->setIdentity($loginForm->getValue('Username'));
            $adapter->setCrendential($loginForm->getValue('Password'));
            
            $result = $auth->authenticate($adapter);
            
            if ($result->isValid()){
                $this->_helper->FlashMessenger('Sucessful Login');
                $this->redirect('/');
                return;
            }
        }
        
        $this->view->loginForm = $loginForm;
    }
}