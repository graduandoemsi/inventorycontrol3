<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Isnack Developer
 */
interface Crud {
     public function get($id);
     public function insert($obj);
     public function delete($id);
     public function update($id,$obj);
    

    
}
