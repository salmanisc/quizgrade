<?php

/**
 * SubassignForm class.
 * SubassignForm is the data structure for keeping
 * user assignment form data. It is used by the 'subassign' action of 'SiteController'.
 */
class SubassignForm extends CActiveRecord
{
 
	public $assignfile;
        public $comment;
        public $assignid; 
        public $userid;
        public $progid;
        public $firstprogid;
        public $cruddate;
        public $crudby;
        public $codeno;
 
        
        //public $uploadedFile;
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
 			 // array('assignfile', 'required',
                        // 'message'=>'Please select a value for {attribute}.'),
                    	//  array('assignfile', 'file', 'types'=>'doc, docx, txt', 'maxSize'=>1024 * 1024 * 50, 'tooLarge'=>'File has to be smaller than 50MB' ),
			 //  array('file','ext.upload.Upload','statusVar'=>'file_status','allowEmpty'=>false,'savePath'=>'upload/')
			
		);
 
	}
        public function tableName()
        {
            return 't_assignsubm';
        }
//  public function enablepoint()
//  {
//      //if ($this->gradtype==="point")
//      //{
//           echo CHtml::tag('text', array( 'class'=>"span3 ie7-margin",'placeholder'=>"Points", 'disabled' => 'enabled','value'=>'2'));
//      //}
//      
//  }
//        public function save()
//	{
//		if(!$this->hasErrors())
//		{
//                     
//                      $user=Yii::app()->session['user'];
//                      $codeno=Yii::app()->session['codeno'];
//                     
//                      $uploadedFile = CUploadedFile::getInstance('SubassignForm', 'assignfile');
//                        
//                      $fileName = Yii::app()->session['codeno']. '_' .date('Y-m-d') . '_' . $uploadedFile;  // $timestamp + file name
//           
//                      $uploadedFile->saveAs(Yii::app()->basePath . '/../protected/upload/' . $fileName);
//                         
//                        
//                      $cruddate = date("Y-m-d");
//                      $sql = "insert into `t_assignsubm`(assignpath,comment,userid,codeno,
//                      cruddate,crudby) values ('$fileName',
//                      '$this->comments','$user','$codeno','$cruddate','')"; 
//
//                        //  echo $sql;
//                      $command = Yii::app()->db->createCommand($sql);
//                      $command->execute();
//                   
//		}
//	}
//        
       // }
        

	 	 
}
