<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class TsignupForm extends CActiveRecord
{
 
	public $fullname;
        public $email;
        public $phoneno;
        public $password;
        public $departname;
        public $cruddate;
        
       

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
 
		return array(
			// username and password are required
			 array('fullname, phoneno,email,password,departname', 'required'),
                         // email has to be a valid email address
			 array('email', 'email'),
                         array('password', 'length', 'min' => 6),      
                         array('email', 'checkExists') ,
			 
			
		);
 
	}
        public function tableName()
        {
            return 't_user';
        }
//        public function save()
//	{
//           
//           
//		 if(!$this->hasErrors())
//		{
//                    $cruddate = date("Y-m-d");
//                    $pass=$this->passwordhash($this->password);
//                   
//                    $sql = "insert into `t_user`  (fullname,phoneno,
//                      departid,username,password,isstudent,isadmin,
//                      cruddate) values ('$this->fullname',
//                     '$this->phoneno','$this->departname','$this->email',
//                     '$pass',0,0,'$cruddate')"; 
//
//                $command = Yii::app()->db->createCommand($sql);
//                $command->execute();
//		} 
//	}
	 
//	public function passwordhash($password)
//        {
//            $options = [
//            'cost' => 11,
//            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
//            ];
//            return password_hash($password, PASSWORD_BCRYPT, $options);
//        }
    
        public function checkExists($attribute,$params) 
        {
            if(!$this->hasErrors())
            {   

               $info=user::model()->findByAttributes(array('username'=>$this->email));
               if($info!==null)
               {     if ($this->email=== $info->username)
                        $this->addError($attribute, "This email is already exist's");

               }
            }
        }
          public  function encode($value){ 
       $result = ''; 
	$key=5;
	for($i=0; $i<strlen($value); $i++)
	{ 
		$char = substr($value, $i, 1); 
		$keychar = substr($key, ($i % strlen($key))-1, 1); 
		$char = chr(ord($char)+ord($keychar)); 
		$result.=$char; 
	} 
	
	return base64_encode($result); 
        
    }
}
