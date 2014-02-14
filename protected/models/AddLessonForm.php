<?php
class AddLessonForm extends CActiveRecord

{
    public $coursename;

    public function tablename()
    {
        return 't_lesson';
    }

public function rules()
{
    return array(
         array('lessonname,lessondesc', 'required',
                         'message'=>'Please enter a value for {attribute}.'),
        
    );
}

}

 
?>
