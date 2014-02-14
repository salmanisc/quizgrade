<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ViewNewsForm extends CActiveRecord
{
 
	public $newstitle;
        public $newscat;
        public $newstype;
        
        public $availabledate;
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
 			 array('newscat', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
                        
                        
			 
			
		);
 
	}
      
        
 
	 	 
}
