<?php
/* @var $this SiteController */
/* @var $model AdminLoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
 
$page = "Login";
$title = "Login";
?>
               
 

<div class="wrap">
    	<div class="logcont">

	<p class="text-center text-info">Enter Administrative Credentials</p>
            
        <div id="login_container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'adminlogin-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
 

                <div class="row text-center">
                    
                        <?php echo $form->textField($model,'email',array('placeholder'=>"Email")); ?>
                        <?php echo $form->error($model,'email'); ?>
                 
                </div>     

                    <div class="row text-center" style="margin-top: 6px; margin-bottom: 6px; ">
                     
                          <?php echo $form->passwordField($model,'password',array('placeholder'=>"Password")); ?>
                          <?php echo $form->error($model,'password'); ?>
                        
                         <?php echo $form->hiddenField($model,'isadmin',array('value'=>1,'type'=>"hidden")); ?>
                         <?php echo $form->error($model,'isdmin'); ?>
                    </div>
                 

                <div class="row text-center">
                     
                            <?php echo CHtml::submitButton('Login',array('class'=>"btn btn-info")); ?>
                </div>

                     
                 
                <hr>
        <?php $this->endWidget(); ?>
        </div><!-- login_container-->
 
	</div><!--logcont-->
</div><!-- end wrap-->