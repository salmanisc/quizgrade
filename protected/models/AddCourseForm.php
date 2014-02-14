<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AddCourseForm extends CActiveRecord
{
 
        public $coursecode;
        public $coursepic;
	public $coursename;
        public $progname;
        public $programtype;
        public $fromdate;
        public $duedate;
        public $coursedesc;
        public $totalpoint;
        public $userid;
        public $search;
 
 
	/**
         * 
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
        public function tableName()
        {
            return 't_courses';
        }
        
	public function rules()
	{
 
		return array(
			// username and password are required
 			 array('coursecode,coursename,totalpoint,fromdate,duedate,coursedesc', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                       // array('progname','firstprogram'),,      
                         array('coursename', 'checkExists') ,
                       
                        array('totalpoint', 'numerical', 'integerOnly'=>true, 'min'=>1),
                    	 
                        array('duedate','compare','compareAttribute'=>'fromdate','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} must be greater than From Date.'),
			 
			
		);
 
	}
        
        
       
                
 	public function checkExists($attribute,$params) 
        {
          //  echo $this->email;
            if(!$this->hasErrors())
            {   
              
               $info=Courses::model()->findByAttributes(array('coursename'=>$this->coursename));
               if($info!==null)
                
               {     if ($this->coursename=== $info->coursename   )
                        $this->addError($attribute, "This Course is already exist's");

               }
            }
        }
        
 public function firstprogram()
   {
      
            
            $progid = $model->progname;


            $data=firstprogram::model()->findAll('progid=:progid', 
             array(':progid'=>$progid));
            $data=CHtml::listData($data,'firstprogid','firstprogname');

        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                       array('value'=>$value),CHtml::encode($name),true);
        };

 
    }
	 	 
}
