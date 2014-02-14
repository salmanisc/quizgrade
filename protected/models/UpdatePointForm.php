<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class UpdatePointForm extends CActiveRecord
{
 
        public $tuserid;
	public $gradtype;
        public $assignid;
        public $resultid;
        public $type;
        public $result;
	public $suserid;
        public $point;
        public $cruddate;
        public $score;
         
	
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
 			 array('point,assignid,suserid', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                         
                    	// array('email', 'email'),
                       // array('duedate','compare','compareAttribute'=>'fromdate','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} must be greater than From Date.'),
			 
			
		);
 
	}
//  public function enablepoint()
//  {
//      //if ($this->gradtype==="point")
//      //{
//           echo CHtml::tag('text', array( 'class'=>"span3 ie7-margin",'placeholder'=>"Points", 'disabled' => 'enabled','value'=>'2'));
//      //}
//      
//  }
        public function tableName()
        {
            return 't_result';
        }
  public function numbervalidate($attribute)
  {
      if ($this->gradtype==="Point")
       {
              
             if(!is_numeric($this->$attribute))
             $this->addError($attribute, 'Point must be a number');
        }
      
  }
//        public function save()
//	{
//		if(!$this->hasErrors())
//		{
//                    
//                        $cruddate = date("Y-m-d");
//                        $sql = "insert into `t_quiz`(quizname,gradetype,point,
//                          progid,firstprogid,totaltime,totalquest,
//                          cruddate,crudby) values ('$this->quizname',
//                          '$this->gradtype','$this->point','$this->progname',
//                         '$this->programtype','$this->totaltime','$this->totalquestions','$cruddate','')"; 
//
//                         // echo $sql;
//                     $command = Yii::app()->db->createCommand($sql);
//                     $command->execute();
//                   
//		}
//	}
        
       // }
        

	 	 
}
