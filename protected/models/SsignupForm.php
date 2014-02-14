<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SsignupForm extends CActiveRecord
{
 
	public $fullname;
        public $codeno;
        public $phoneno;
        public $address;
        public $email;
        public $password;
        public $cruddate;
        public $progname;
        public $programtype;
        public $progid;
         public $firstprogid;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
 
		return array(
                       // array('progname,programtype', 'safe') ,
			// username and password are required,progname,programtype
 			 array('codeno,fullname,phoneno,address,email,password', 'required'),
                    	 array('email', 'email'),
                         array('password', 'length', 'min' => 6),      
                         array('email', 'checkExists') ,
                        // array('progname', 'checkprogram') ,
                        // array('progname,programtype',  'numerical', 'integerOnly' => true) ,
                   	 
			
		);
 
	}
        public function tableName()
        {
            return 't_user';
        }
//        public function save()
//	{
//		if(!$this->hasErrors())
//		{
//                    
//                        $cruddate = date("Y-m-d");
//                        $pass=$this->passwordhash($this->password);
//
//                        $sql = "insert into `t_user`  (fullname,phoneno,
//                          progid,firstprogid,address,username,password,isstudent,isadmin,
//                          cruddate) values ('$this->fullname',
//                         '$this->phoneno','$this->progname','$this->programtype','$this->address','$this->email',
//                         '$pass',1,0,'$cruddate')"; 
//
//                      //  echo $sql;
//                    $command = Yii::app()->db->createCommand($sql);
//                     $command->execute();
//                   
//		}
//	}
//        public function passwordhash($password)
//        {
//            $options = [
//            'cost' => 11,
//            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
//            ];
//            //return password_hash($password, PASSWORD_BCRYPT, $options);
//            return md5($password);
//        }
	public function checkExists($attribute,$params) 
        {
          //  echo $this->email;
            if(!$this->hasErrors())
            {   
              
               $info=user::model()->findByAttributes(array('username'=>$this->email));
               if($info!==null)
                
               {     if ($this->email=== $info->username )
                        $this->addError($attribute, "This email is already exist's");

               }
            }
        }
        public function checkprogram($attribute,$params) 
        {
          //  echo $this->email;
           if ( isset($this->progname)===false)
            
                $this->addError("progname",  " cannot be blank.");
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
