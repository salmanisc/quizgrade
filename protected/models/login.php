<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class login extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 't_user';
    }
    
 
    
}
?>
