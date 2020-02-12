<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Login\Form;

use Zend\Form\Form;


class LoginForm extends Form{
    
    public function __construct($name = null) {
        parent::__construct('admin');
        
        $this->add(array(
            'name' => 'username',
            'type' => 'Text',
            'options' => array(
                'label' => 'Usuario',
            )
        ));
        
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Password',
            )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'options' => array(
                'value' => 'Iniciar Sesion',
                'id' => 'submitbutton',
            )
        ));
        
        $this->add(array(
            'name' => 'rememberme',
            'type' => 'CheckBox',
            'options' => array(
                'label' => 'No cerrar Sesion',
            )
        ));
    }
}