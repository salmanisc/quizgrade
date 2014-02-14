<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Courses extends CActiveRecord
{
    public $coursename;
   
   
 
    public function tableName()
    {
        return 't_courses';
    }
    
    public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			 //array('news', 'required'), array('courseid,coursename','safe', 'on'=>'search'),
			 array('coursename','safe', 'on'=>'search'),
		);
	}
    public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

//         
		$criteria=new CDbCriteria;

		$criteria->compare('coursename',$this->coursename,true);
		 //   var_dump($this->news);
               //  echo 'sss';
          //die();

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
         public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
?>
