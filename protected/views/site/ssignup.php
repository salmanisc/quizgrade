<?php
/* @var $this SiteController */
/* @var $model SsignupForm */
/* @var $form CActiveForm */

    $this->pageTitle=Yii::app()->name . ' - Student Signup';
    $this->breadcrumbs=array(
            'Signup',
    );
    $page = "Student Signup";
    $title = "Student Signup";
    ?>


    <?php if(Yii::app()->user->hasFlash('signup')): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('signup'); ?>
    </div>

    <?php else: ?>

 

 

    <div class="container">





        <div class="row">
		<section class="span8 offset2">
		<div class="col-right">
            <h4><?php if(isset($page)) echo $page; ?></h4>
			<hr>
	 
                 <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'sstuent-form',
           'enableAjaxValidation' => true,
            )); ?>   
			<div id="Student_signup_container">



                    <div class="row">
                               
                               <div class="span6">
                                    <?php //echo $form->labelEx($model,'fname'); ?>
                                    <?php echo $form->textField($model,'fullname' ,array('class'=>"span6 ie7-margin",'placeholder'=>"Full Name",'maxlength'=>100)); ?>
                                    <?php echo $form->error($model,'fullname'); ?>
                                </div>  
                    </div>


                    <div class="row">
                        <div class="span3">
                                    <?php //echo $form->labelEx($model,'fname'); ?>
                                    <?php echo $form->textField($model,'codeno' ,array('class'=>"span3 ie7-margin",'placeholder'=>"Code No",'maxlength'=>50)); ?>
                                    <?php echo $form->error($model,'codeno'); ?>
                                </div>  
                        
                        <div class="span3">
                            <?php echo $form->textField($model,'phoneno' ,array('class'=>"span3 ie7-margin",'placeholder'=>"Phone No",'maxlength'=>50)); ?>
                                    <?php echo $form->error($model,'phoneno'); ?>
                        </div>
                    </div>
<!--                     <div class="row">      
                            <div class="span3">
                                
                               
                                <?php 
                                /*$models = program::model()->findAll();

                                 $list = CHtml::listData($models, 'progid', 'progname');
                                echo CHtml::dropDownList('progname','', $list ,
                                    array(
                                            'empty'=>'Select Program Name',
                                            'ajax' => array(
                                            'type'=>'POST', 
                                            'url'=>CController::createUrl('firstprogram'), 
                                            'update'=>'#programtype', 
                                            'data'=>array('progname'=>'js:this.value'),
                                ))); ?>
                                <?php echo $form->error($model, 'progname'); ?>
                             </div>  
                            <div class="span3">    
                                <?php  echo CHtml::dropDownList('programtype','', array() ,array('empty'=>'Select Program Type' )); ?>
                                <?php echo $form->error($model, 'programtype'); */?>
                            </div>
                        </div>-->
  

                     
                    <div class="row">
                        <div class="span3">
                                    <?php // echo $form->labelEx($model,'address'); ?>
                                    <?php echo $form->textArea($model,'address' ,array('class'=>"span6",'placeholder'=>"Address",'rows'=>"5",'maxlength'=>200)); ?>
                                    <?php echo $form->error($model,'address'); ?>
 
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



                    <div class="row">

                        <div class="button-align span1">
                            <?php echo CHtml::submitButton('Sign up' ,array('class'=>"btn btn-info")); ?>
                             
                        </div>
                    </div>
                    <hr>



		</div><!-- Student_signup_container-->
          <?php $this->endWidget(); ?>
                </div><!-- end col right-->
                </section>
    </div><!-- end row-->

    </div><!-- end container-->
  <?php endif; ?>