<?php

class firstprogram extends CActiveRecord
{
    public $progid;
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 't_firstprogram';
    }
        public function rules()
	{
 
		return array(
			// username and password are required
 			 array('firstprogname,firstprogid', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                     
			 
			
		);
 
	}
}
?>
