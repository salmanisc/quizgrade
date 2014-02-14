<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class QuizQuesForm extends CActiveRecord
{
 
	public $optiona;
        public $optionb;
        public $optionc;
        public $optiond;
        public $question;
        public $answer;
        public $quizid;
   

	/**
         * 
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
 
		return array(
			// username and password are required
 			 array('question,optiona,optionb,optionc,optiond,answer', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                       // array('totalquestions', 'numerical', 'integerOnly'=>true, 'min'=>1),
                    	// array('email', 'email'),
                       // array('duedate','compare','compareAttribute'=>'fromdate','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} must be greater than From Date.'),
			 
			
		);
 
	}
 
        public function tableName()
        {
            return 't_quizques';
        }
   
}
