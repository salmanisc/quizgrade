<?php

 
class user extends CActiveRecord
{
    public $userid;
    public $suserid;
    public $authorizedate;
    public $authorizeby;
  
    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    public function tableName()
    {
        return 't_user';
    }
    public function rules()
	{
 
		return array(
			// username and password are required
 			 array('suserid', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                         
		);
 
	}
     
        
    
    
//    public function getnewuser()
//    {
//                    $sql = "select * from    `t_user` where isauthorized=0"; 
//                    $command = Yii::app()->db->createCommand($sql);
//                    $dataReader=$command->query();
//                    return $dataReader;
//    }
}
?>
