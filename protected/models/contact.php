<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class contact extends CActiveRecord
{
    public $email;
    public $fax;
    public $phone;
    public $address;
    
    public function rules()
	{
 
		return array(
			// username and password are required
 			 array('email,phone,fax,address', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                     
			 
			
		);
 
	}
        
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    
    public function tableName()
    {
        return 't_contact';
    }
    
   
}
?>
