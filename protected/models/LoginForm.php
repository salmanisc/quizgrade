<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CActiveRecord
{
	public $email;
	public $password;
        public $isadmin;
        public $userid;
	private $_identity;
        public $isloggedin;
 
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
         public function tableName()
        {
            return 't_user';
        }
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password,isadmin', 'required'),
			// rememberMe needs to be a boolean
			 
			array('password', 'authenticate'),
                         array('email','checkLogged')
		);
	}

	 
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
        public function checkLogged($attribute,$params) 
        {
            if(!$this->hasErrors())
            {   

//               $info=user::model()->findByAttributes(array('username'=>$this->email));
//               if($info!==null)
//               {     if ( $info->isloggedin==="1")
//                        $this->addError($attribute, "You are already Logged in.");
//
//               }
            }
        }
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password,$this->isadmin);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
				
                        
                        
		} 
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
           
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password,$this->isadmin);
                        $this->_identity->authenticate();
		}
                if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			//$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
                        $duration= 10; // 0 days
			Yii::app()->user->login($this->_identity,$duration);
			
                        //open session
                        // get session variable 'name1'
                       // echo $session['user'];
                        
                        return true;
                 }   
                  
 
                        
               
		else
			return false;
	}
}
