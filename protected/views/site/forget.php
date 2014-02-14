<?php //
/* @var $this SiteController */
/* @var $model ForgetForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Forget Password';
$this->breadcrumbs=array(
	'Forget Password',
    
);
$page = "Forget Password";
$title = "Forget Password";
?>

 <?php if(Yii::app()->user->hasFlash('forget')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('forget'); ?>
</div>

<?php else: ?>
 

<div class="container">
  <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'forget-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
    
      
    <div class="row">

		<!--div class="span12">
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a><span class="divider">/</span></li>
				<li class="active"><?php// if(isset($page)) echo $page; ?></li>
			</ul>
		</div-->
        <!-- =========================Start Col left section ============================= -->





        
        <!-- =========================Start Col right section ============================= -->
		<section class="span8 offset2">
		<div class="col-right">
                <h4><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            

 

                <div class="row">
                     <div class="span3">

                        <?php echo $form->textField($model,'email',array('class'=>"span3 ie7-margin",'placeholder'=>"Enter Email")); ?>
                        <?php echo $form->error($model,'email'); ?>
                     </div>    


                    
                </div>

                <div class="row">
                    <div class="button-align span1">
                            <?php echo CHtml::submitButton('submit',array('class'=>"btn btn-info",'value'=>"Send")); ?>
                    </div>

                    
                </div>
                <hr>
        
        </div><!-- login_container-->
		</section>
	</div><!-- end row-->
        <?php $this->endWidget(); ?>
</div><!-- end container-->
<?php endif; ?>