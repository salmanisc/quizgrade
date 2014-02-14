<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ViewQuizAns extends CActiveRecord
{
  
   
         public $quizid;
	public $quizname;
        public $gradtype;
        public $totalquest;
        public $point;
        public $progname;
        public $programtype;
        public $totaltime;
        public $optiona;
        
        public $cruddate;
        public $quesno;
        public $quesnoa;
        public $canswer;
        public $answer;
        public $correct;
        

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
                      array('optiona,quizid,quesno,totalquest,quesnoa', 'required',
                            'message'=>'Please select any value for Answer.'),
                     
			
		);
 
	}
 
        public function tableName()
        {
            return 't_quizans';
        }
   
}
