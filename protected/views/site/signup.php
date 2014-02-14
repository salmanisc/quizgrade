<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
	'Signup',
    
);
$page = "Sign up";
$title = "Sign up";
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
		<section class="span6 offset3">
		<div class="col-right">
                 <h4 class="text-center"><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            
        <div id="login_container">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'signup-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
 
    
            
                    <div class="row">
                        <div class="span2">
                             <?php echo CHtml::link("Student's",array('/site/ssignup'),array('class'=>"btn btn-info",'title'=>"Sign up as Student")); ?>
                        </div>
                        <div class="span2 offset1">
                             <?php echo CHtml::link("Teacher's",array('/site/tsignup'),array('class'=>"btn btn-info",'style'=>"float: right;",'title'=>"Sign up as Teacher")); ?>
                        </div>
                    </div>
                    <hr class="clearfix">
                    
        <?php $this->endWidget(); ?>
        </div><!-- login_container-->
                </div>
                </section>
	</div><!-- end row-->
</div><!-- end container-->
