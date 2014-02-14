<?php

/**
 * TsignupForm class.
 * TsignupForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class NewsForm extends CActiveRecord
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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			 array('news', 'required'),
			 array('news','safe', 'on'=>'search'),
		);
	}
      	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

//         
		$criteria=new CDbCriteria;

		$criteria->compare('news',$this->news,true);
		 //   var_dump($this->news);
               //  echo 'sss';
          //die();

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TProgram the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
 
	 	 
}
