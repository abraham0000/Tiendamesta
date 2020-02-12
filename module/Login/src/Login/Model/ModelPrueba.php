<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Login\Model;

use lib\model\ModelMaster;

class ModelPrueba extends ModelMaster {
    
    public function realizarPrueba(){
        $sql = "Select * from Producto";
        $result = $this->executeQuery($sql)->fetchAll();
        return $result;
    }
}