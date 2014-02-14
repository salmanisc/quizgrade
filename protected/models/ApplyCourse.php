<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ApplyCourse extends CActiveRecord
{
 
	public $courseid;
        public $userid; 
        public $progname;
        public $programtype;
        public $coursecode;

 
	/**
         * 
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
        public function tableName()
        {
            return 't_coursesapp';
        }
        
	public function rules()
	{
 
		return array(
			// username and password are required
 			  array('courseid,progid,firstprogid', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                       // array('progname','firstprogram'),
                        
			 
			
		);
 
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
