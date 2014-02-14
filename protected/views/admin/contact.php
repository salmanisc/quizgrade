<?php
$page = "Contact us";
$title = "Admin Dashboard - Contact us";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact us';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Contact us";
$title = "Admin Dashboard - Contact us";

?>


<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>

 

    <div class="container">
        <div class="row">

 

        <?php 
              Yii::import('application.views.*');
             include_once 'layouts/admincontrol.php'; 
         ?>

            <!-- =========================Start Col right section ============================= -->

            <section class="span8">
                <div class="col-right">
                    <h4><?php echo $title; ?></h4>
                    <hr>

                     <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'contact-form',
                                'enableAjaxValidation' => true,

                    )); ?>

                    <div class="row">
                        <div class="span6">
                             
                         
                        <?php 
                         
                         $phone=$data[0]['phone'];  
                        echo $form->textField($model, 'phone', array('class' => "input-block-level",'value'=>"$phone" ,'placeholder' => "Phone no",'maxlength'=>50)); ?>
                        <?php echo $form->error($model, 'phone'); ?>      
     
                        <?php 
                        $fax=$data[0]['fax'];
                        echo $form->textField($model, 'fax', array('class' => "input-block-level",'value'=>"$fax" , 'placeholder' => "Fax no",'maxlength'=>50)); ?>
                        <?php echo $form->error($model, 'fax'); ?>      
                        </div>
                   </div>
                   <div class="row">
                        <div class="span6">
                        <?php $email=$data[0]['email'];
                        echo $form->textField($model, 'email', array('class' => "input-block-level",'value'=>"$email" , 'placeholder' => "Phone no",'maxlength'=>50)); ?>
                        <?php echo $form->error($model, 'email'); ?>      
                        </div>
                   </div> 
                   <div class="row">
                        <div class="span3">
                                    <?php // echo $form->labelEx($model,'address'); ?>
                                    <?php 
                                    $address=$data[0]['address'];
                                    echo $form->textArea($model,'address' ,array('class'=>"span6",'value'=> "$address" ,'placeholder'=>"Address",'rows'=>"5",'maxlength'=>200)); ?>
                                    <?php echo $form->error($model,'address'); ?>
 
                        </div>
                    </div>
                      

                        <div class="row ">
                            <div class="span3">
                             
                                <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Submit")); ?>
                             
                            </div>
                        </div>

                    <?php $this->endWidget(); ?>



                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->
    <?php endif; ?>


 