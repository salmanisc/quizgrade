 
<?php
/* @var $this SiteController */
/* @var $model SubassignForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Assignment Submission';
$this->breadcrumbs = array(
    'New Assignment',
);
$page = "Assignment Submission";
$title = "Assignment Submission";

?>


<?php if (Yii::app()->user->hasFlash('addassign')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addassign'); ?>
    </div>

<?php else: ?>





    <div class="container">
        <div class="row">
        
 
        <?php 
             Yii::import('application.views.*');
             include_once 'layouts/sidebar.php'; 
        ?>
        


            <section class="span8">
                <div class="col-right">
                    <h4><?php if (isset($page)) echo $page; ?></h4>
                    <h3><?php if (isset($_GET['assignname'])) echo 'Assignment Title:'.$_GET['assignname']; ?></h3>
                    <hr>


                    <div id="new_assigment_container">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'subassign-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                )
        );
        ?>

                        <div class="row">
                            <div class="span2">
                                <?php  echo $form->labelEx($model,'assignment file'); ?>
                                
                                
                                
                            </div>  
                            
                            <div class="span3">
                                <?php echo $form->fileField($model, 'assignfile', array('class' => "span3 ie7-margin", 'placeholder' => "Choose File",'value'=>"Choose File")); ?>
                                <?php echo $form->error($model, 'assignfile'); ?>
                            </div>  
                        </div>
                        <div class="row">     

                            <div class="span3">
                                <?php  echo $form->labelEx($model,'comment'); ?>
                                <?php echo $form->textArea($model, 'comment', array('class' => "span6", 'placeholder' => "comments", 'rows' => "5" ,'maxsize'=>200)); ?>
                                <?php echo $form->error($model, 'comment'); ?>
                            </div>  
                        </div>
                         


                        <div class="row">

                            <div class="button-align span1">
                                <?php echo CHtml::submitButton('submit', array('class' => "button_medium",'value'=>"Submit")); ?>
                            </div>
                        </div>
                        <hr>


             <?php $this->endWidget(); ?>
                    </div><!-- Student_signup_container-->
               
                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
   
    </div><!-- end container-->
    <?php endif; ?>