<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
         public $user;
         public $codeno;
         private $_id;
         public  $skey = "isys2013"; // you can change it
         
        
         
	 public function authenticate()
	{
        
  
               $user=login::model()->findByAttributes(array('username'=>$this->username,'isadmin'=>$this->isadmin,'isauthorized'=>1 ));
    
               //die(); // here I use Email as user name which comes from database,'isadmin'=>0
               if($user===null)
                       {
                            $this->errorCode=self::ERROR_USERNAME_INVALID;
                       }
                        
               else if ($this->password !== $this->decode($user->password))           // here I compare db password with passwod field
                       {     
                          
                               $this->errorCode=self::ERROR_PASSWORD_INVALID;
                       }
               else
               {  
                        $session=new CHttpSession;
                        $session->open();
                        $session['user']=$user->userid;
                        $session['isstudent']=$user->isstudent; 
                        $session['codeno']=$user->codeno; 
                         
                        $this->_id=$user->isstudent;
                       // $user=$user->username;
                       // $codeno= $session['codeno'];
                 
                  $this->errorCode=self::ERROR_NONE;

               }
               return !$this->errorCode;
	 
	}
        
      
        public function passwordhash($password)
        {
//            $options = [
//            'cost' => 11,
//            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
//            ];
            //return password_hash($password, PASSWORD_BCRYPT, $options);
            return encode($password);
           
 
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

    public function decode($value){
	$result = ''; 
	$key=5;
        $string = base64_decode($value); 
	
	for($i=0; $i<strlen($string); $i++)
	{ 
		$char = substr($string, $i, 1); 
		$keychar = substr($key, ($i % strlen($key))-1, 1); 
		$char = chr(ord($char)-ord($keychar)); 
		$result.=$char; 
	} 
	
	return $result; 
    }

        public function getId()       //  override Id
        {
            return $this->_id;
        }
   
      
}