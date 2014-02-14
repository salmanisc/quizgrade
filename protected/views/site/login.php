<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
    
);
$page = "Login";
$title = "Login";
?>

 
 

<div class="container">
    	<div class="row">

		<!--div class="span12">
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a><span class="divider">/</span></li>
				<li class="active"><?php// if(isset($page)) echo $page; ?></li>
			</ul>
		</div-->
        <!-- =========================Start Col left section ============================= -->





        
        <!-- =========================Start Col right section ============================= -->
		<section class="span5 offset4">
		<div class="col-right">
                <h4><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            
        <div id="login_container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
 
  
                <div class="row text-center">
                     <div class="span4">

                        <?php echo $form->textField($model,'email',array( 'class'=>"span3 ie7-margin",'placeholder'=>"Email",'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'email'); ?>
                     </div>    
                </div>  

                <div class="row text-center">
                    <div class="span4">
                        <?php echo $form->passwordField($model,'password',array('class'=>"span3 ie7-margin",'placeholder'=>"Password",'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'password'); ?>
                         <?php echo $form->hiddenField($model,'isadmin',array('type'=>"hidden",'value'=>"0")); ?>

                    </div>
                </div>

                <div class="row text-center">
                     
                       <?php echo CHtml::submitButton('Login',array('class'=>"btn btn-info")); ?>
                     

                     
                         
                        <?php echo CHtml::link('Forget Password',array('/site/forget'),array('class'=>"text-info")); ?>
                     
                </div>
                <hr>
        <?php $this->endWidget(); ?>
        </div><!-- login_container-->
		</section>
	</div><!-- end row-->
</div><!-- end container-->
