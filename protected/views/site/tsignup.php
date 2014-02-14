<?php
/* @var $this SiteController */
/* @var $model TsignupForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Teacher Signup';
$this->breadcrumbs=array(
	'Signup',
);
$page = "Teacher Signup";
$title = "Teacher Signup";
?>

 
<?php if(Yii::app()->user->hasFlash('tsignup')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('tsignup'); ?>
</div>

<?php else: ?>
 
 

<div class="container">



	 

	<?php //echo $form->errorSummary($model); ?>
 
        <div class="row">

		
        <!-- =========================Start Col left section ============================= -->
        
         <!-- =========================Start Col right section ============================= -->
		<section class="span8 offset2">
		<div class="col-right">
                <h4><?php if(isset($page)) echo $page; ?></h4>
		<hr>
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
         
           'enableAjaxValidation' => true,
             
    )); ?>
            
                <div id="Student_signup_container">
                            <div class="row">
                                <div class="span6">
                                    <?php //echo $form->labelEx($model,'fullname'); ?>
                                    <?php echo $form->textField($model,'fullname' ,array('class'=>"span6 ie7-margin",'placeholder'=>"Full Name",'maxlength'=>100)); ?>
                                    <?php echo $form->error($model,'fullname'); ?>
                                </div>  
                            </div>   
                            <div class="row">
                               <div class="span3">
                                    <?php //echo $form->labelEx($model,'phoneno'); ?>
                                    <?php echo $form->textField($model,'phoneno' ,array('class'=>"span3 ie7-margin",'placeholder'=>"Phone",'maxlength'=>50)); ?>
                                    <?php echo $form->error($model,'phoneno'); ?>
                                </div>  
                             
                                <div class="span3">
                                    <?php //echo $form->labelEx($model,'departname'); ?>
                                    <?php 
                                     $models = department::model()->findAll();
                                    // format models as $key=>$value with listData
                                     $list = CHtml::listData($models,'departid', 'departname'); 
                                     echo $form->dropDownList($model,'departname',$list);
                                     ?>
                                    <?php  echo $form->error($model,'departname'); ?>
                                </div>  
                            </div>
 
                            <div class="row">
                                <div class="span3">
                                    <?php //echo $form->labelEx($model,'email'); ?>
                                    <?php echo $form->textField($model,'email',array('class'=>"span3 ie7-margin",'placeholder'=>"Email",'maxlength'=>50)); ?>
                                    <?php echo $form->error($model,'email'); ?>
                                </div>
                                <div class="span3">
                                    <?php //echo $form->labelEx($model,'password');?>
                                    <?php echo $form->passwordField($model,'password',array('class'=>"span3 ie7-margin",'placeholder'=>"Password",'maxlength'=>50)); ?>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                            </div>

                </div> <!-- Student_signup_container -->
                    <div class="row">

                        <div class="button-align span1">
                          
                            <?php echo CHtml::submitButton('Sign up',array('class'=>"btn btn-info")); ?>
                        </div>
                    </div>
                 
                <hr>
<?php $this->endWidget(); ?>

                </div><!-- col-right -->

		</section>
         </div><!-- row -->
</div><!-- container -->
 <?php endif; ?>