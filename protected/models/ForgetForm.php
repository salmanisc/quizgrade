<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ForgetForm extends CFormModel
{
	public $email;
	 
 
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
        public function rules()
	{
		return array(
			// username and password are required
                        
			array('email', 'required'),
			// rememberMe needs to be a boolean
			 
			array('email', 'email'),
                        array('email','checkUser'),
		);
	}
         public function tableName()
        {
            return 't_user';
        }
        public function checkUser($attribute,$params) 
        {
          //  echo $this->email;
            if(!$this->hasErrors())
            {   
              
               $info=user::model()->findByAttributes(array('username'=>$this->email));
                
               if($info===NULL)
               {    
                   $this->addError($attribute, "This User Name does not Exist's");

               }
            }
        }
        public function save()
	{
        	 if(!$this->hasErrors())
		{
                     
                    $info=user::model()->findByAttributes(array('username'=>$this->email));
                    if($info!==null)
                        
                     {     if ($this->email=== $info->username)
                        $pass = UserIdentity::decode($info->password);
                     //  echo $pass;
                      // echo $info->password;
//                    $message            = new YiiMailMessage;
//                    $subject='Forget Password - Email'; 
//                    $body='Your Password is '.$info->password;
//                    $name='=?UTF-8?B?'.base64_encode($this->email).'?=';
//                    $subject='=?UTF-8?B?'.base64_encode($subject).'?=';
//                    $headers="From: $name <{$this->email}>\r\n".
//                            "Reply-To: {$this->email}\r\n".
//                            "MIME-Version: 1.0\r\n".
//                            "Content-Type: text/plain; charset=UTF-8";
//
//                    mail(Yii::app()->params['adminEmail'],$subject,$body,$headers);
//                    Yii::app()->user->setFlash('Password Reset','Thank you for contacting us. We will respond to you as soon as possible.');
                   // $this->refresh();
                      $message            = new YiiMailMessage;
                        //this points to the file test.php inside the view path
                     $message->view = "forgetpassword";
             //        $sid                 = 1;
             //        $criteria            = new CDbCriteria();
             //        $criteria->condition = "studentID=".$sid."";            
             //        $studModel1          = Student::model()->findByPk($sid);        
                     $params              = array('password'=>'Your Password is '.$pass);
                     $message->subject   ='Forget Password - Email'; 
                     $message->setBody($params, 'text/html');                
                     $message->addTo($this->email);
                     $message->from = 'admin@domain.com';   
                     Yii::app()->mail->send($message);       
                    $message            = new YiiMailMessage;
           //this points to the file test.php inside the view path
                     $message->view = "forgetpassword";
//        $sid                 = 1;
//        $criteria            = new CDbCriteria();
//        $criteria->condition = "studentID=".$sid."";            
//        $studModel1          = Student::model()->findByPk($sid);        
        $params              = array('password'=>'Your Password is '.$pass);
        $message->subject   ='Forget Password - Email'; 
        $message->setBody($params, 'text/html');                
        $message->addTo($this->email);
        $message->from = 'admin@domain.com';   
        Yii::app()->mail->send($message);       
                     
    
                     
		} 
	}
}

 public function SendMail()
    {   
        $message            = new YiiMailMessage;
           //this points to the file test.php inside the view path
        $message->view = "forgetpassword";
//        $sid                 = 1;
//        $criteria            = new CDbCriteria();
//        $criteria->condition = "studentID=".$sid."";            
//        $studModel1          = Student::model()->findByPk($sid);        
        $params              = array('password'=>'Your Password is '.$pass);
        $message->subject   ='Forget Password - Email'; 
        $message->setBody($params, 'text/html');                
        $message->addTo($this->email);
        $message->from = 'admin@domain.com';   
        Yii::app()->mail->send($message);       
    }
}

