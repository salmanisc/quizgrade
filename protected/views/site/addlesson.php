 
 
<?php
/* @var $this SiteController */
/* @var $model AddLessonForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Add Lessons';
$this->breadcrumbs = array(
    'Add Lessons',
);
$page = "Add Lessons";
$title = "Add Lessons";

?>

<?php if (Yii::app()->user->hasFlash('addlesson')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addlesson'); ?>
    </div>

<?php else: ?>

    <div class="container">
        <div class="row">
            <?php 
              Yii::import('application.views.*');
             include_once 'layouts/sidebar.php'; 
            ?>
 


        
        <!-- =========================Start Col right section ============================= -->
		<section class="span8">
		<div class="col-right">
            <h4><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            
			<div id="sub_assigment_container">


        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'addlesson-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
 
        )); ?>

                    <div class="row">
                        <div class="span6">
                                 <?php 
                                  $userid=Yii::app()->session['user'];
                                  $models=Courses::model()->findAllByAttributes(array('userid'=>$userid));
                                   
                                  $list = CHtml::listData($models, 'courseid', 'coursename');
                                   
                                 echo CHtml::dropDownList('coursename','', $list ,
                                    array(
                                            'empty'=>'Select Course Name',
                                            'ajax' => array(
                                            'type'=>'POST', 
                                            //'url'=>CController::createUrl('firstprogram'), 
                                            //'update'=>'#programtype', 
                                            //'data'=>array('progname'=>'js:this.value'),
                                )));  ?>
                                <?php echo $form->error($model, 'coursename'); ?>
                        </div>

                    </div>
                    <div class="row">
                         
                            <div class="span6">
                                <?php //echo $form->labelEx($model,'fname'); ?>
                                <?php echo $form->textField($model, 'lessonname', array('class' => "span6 ie7-margin", 'placeholder' => "Lesson Name",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'lessonname'); ?>
                            </div>  
        
                    </div>
                    <div class="row">

                        <div class="span2">
                            <label>Lesson File<span class="required">*</span></label>
                        </div>

                        <div class="span3">
                                <?php echo $form->fileField($model, 'lessonfile', array('class' => "span3 ie7-margin", 'placeholder' => "Choose File",'value'=>"Choose File")); ?>
                                <?php echo $form->error($model, 'lessonfile'); ?>
                        </div>

                    </div>


                    <div class="row">

                         <div class="span2">
                            <label>Lesson Description<span class="required">*</span></label>
                        </div>
                        <div class="span6">
                                 
                                <?php echo $form->textarea($model, 'lessondesc', array('class' => "span6 ie7-margin", 'placeholder' => "Please provide little description about the files here",'rows' => "5", 'cols'=>"80",'maxlength'=>1000 )); ?>
                                <?php echo $form->error($model, 'lessondesc'); ?>
                            </div>  
                        
                    </div>
                    <div class="row">

                        <div class="button-align span1">
                            <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Submit")); ?>
                        </div>
                    </div>
                    <hr>
                <?php $this->endWidget();?>

            
		</div><!-- end col right-->
		</section>
	</div><!-- end row-->
</div><!-- end container-->
    <?php endif; ?>

    