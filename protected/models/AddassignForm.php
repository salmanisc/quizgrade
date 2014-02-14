<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AddassignForm extends CActiveRecord
{
 
	public $assignname;
        public $gradtype;
        public $point;
        
        public $coursename;
       // public $programtype;
        public $fromdate;
        public $duedate;
        public $assigndesc;
        public $userid;
 
 
	/**
         * 
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
        public function tableName()
        {
            return 't_assignment';
        }
        
	public function rules()
	{
 
		return array(
			// username and password are required
 			 array('assignname,point,fromdate,duedate,assigndesc', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                       // array('progname','firstprogram'),
                       // array('point', 'numbervalidate' ),
                        array('point','checkpoints'),
                    	// array('email', 'email'),
                        array('duedate','compare','compareAttribute'=>'fromdate','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} must be greater than From Date.'),
			 
			
		);
 
	}
        public function numbervalidate($attribute)
        {
            if ($this->gradtype==="Point")
             {

                   if(!is_numeric($this->$attribute))
                   $this->addError($attribute, 'Point must be a number');
              }

        }
        public function checkpoints($attribute,$params) 
        {
            if(!$this->hasErrors())
            {   

               $info=Courses::model()->findByAttributes(array('courseid'=>$_POST['coursename']));
                
               if($info!==null)
                   
               {  
                   $point=$this->point;
                   settype($point, "integer"); 
                   $rempoint=$info->totalpoint-$info->availpoint;
 
                  
                   if ($this->point > $rempoint)
                        $this->addError($attribute, "Point Exceed from Total Course Points");

               }
            }
        }
       
                
//        public function save()
//	{
//		if(!$this->hasErrors())
//		{
//                        $duedate='2014-01-01';
//                        //$duedate=$this->duedate;
//                        //$duedate = new Datetime($duedate);
//                        //$duedate = $duedate->format('Y-m-d');
//                        
//                        
//                        $userid=Yii::app()->session['user'];
//                      
//                        
//                        $fromdate=$this->fromdate;
//                        $fromdate = new Datetime($fromdate);
//                        $fromdate = $fromdate->format('Y-m-d');
//             
//                        
//                       // $duedate=new DateTime();
//
//                        
//                        $cruddate = date("Y-m-d");
//                        
////                        $sql = "insert into `t_assignment`(userid,assignname,assigndesc,gradetype,point,
////                          progid,firstprogid,startdate,enddate,
////                          cruddate,crudby) values ($userid,'$this->assignname',
////                         '$this->description','$this->gradtype','$this->point','$this->progname',
////                         '$this->programtype','$fromdate','$duedate','$cruddate','')"; 
//
//                  //        echo $sql;
//                        
//                        $assignment = new AddassignForm;
//                        
//                        $assignment->userid=$userid;
//                        $assignment->assignname=$this->assignname;
//                        $assignment->assigndesc=$this->assigndesc;
//                        
//                        $assignment->gradetype=$this->gradetype;
//                        $assignment->point=$this->point;
//                        $assignment->progid=$this->progname;
//                        $assignment->firstprogid=$this->programtype;
//                        $assignment->startdate=$fromdate;
//                        $assignment->enddate=$duedate;
//                        $assignment->cruddate=$cruddate;
//                        $assignment->crudby='';
//                        
//                        $assignment->save();
//
//
//
////                   $command = Yii::app()->db->createCommand($sql);
////                     $command->execute();
////                   
//		}
//	}
        
       // }
        
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
