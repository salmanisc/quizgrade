<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class program extends CActiveRecord
{   
    public $progname;
    public $progid;
    public $cruddate;
    public $crudby;
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 't_program';
    }
    
    public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			 //array('news', 'required'), array('courseid,coursename','safe', 'on'=>'search'),
			 array('progname','required'),
		);
	}
   public function attributeLabels()
	{
		return array(
			'progname' => 'CourseType',
			 
		);
	}
}
?>
