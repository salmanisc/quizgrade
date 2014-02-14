<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AddNewsForm extends CActiveRecord
{
 
	public $newstitle;
        public $newscat;
        public $newstype;
        
        public $fromdate;
        public $expirydate;
        public $news;
        public $userid;
        public $cruddate;
 
 
	/**
         * 
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
        public function tableName()
        {
            return 't_news';
        }
        
	public function rules()
	{
 
		return array(
			// username and password are required
 			 array('newstitle,newscat,newstype,fromdate,expirydate,news', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                        array('expirydate','compare','compareAttribute'=>'fromdate','operator'=>'>', 'allowEmpty'=>false , 'message'=>'{attribute} must be greater than From Date.'),
			 
			
		);
 
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
