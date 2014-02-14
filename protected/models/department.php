<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class department extends CActiveRecord
{
    public $departname;
    public $departid;
    public $cruddate;
    public $crudby;
    
    public function rules()
	{
 
		return array(
			// username and password are required
 			 array('departname,departid', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                     
			 
			
		);
 
	}
        
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    
    public function tableName()
    {
        return 't_department';
    }
    
   /* public function hashPassword($password, $salt)
{
    return md5($salt.$password);
}
        
// password validation
public function validatePassword($password)
{
    return $this->hashPassword($password,$this->salt)===$this->password;
}
        
//generate salt
public function generateSalt()
{
    return uniqid('',true);
}
        
public function beforeValidate()
{
    $this->salt = $this->generateSalt();
    return parent::beforeValidate();
}
        
public function beforeSave()
{
    $this->password = $this->hashPassword($this->password, $this->salt);
    return parent::beforeSave();
}
    */
}
?>
