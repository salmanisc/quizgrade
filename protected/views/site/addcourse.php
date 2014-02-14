 
<?php
/* @var $this SiteController */
/* @var $model AddcourseForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Create New Course';
$this->breadcrumbs = array(
    'New Course',
);
$page = "Create New Course";
$title = "Create New Course";

?>

<?php if (Yii::app()->user->hasFlash('addcourse')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addcourse'); ?>
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
                    <h4><?php echo $title; ?></h4>
                    <hr>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'addcourse-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
 
        )); ?>

                    <div class="row">
                              <div class="span3">
                                <?php  echo $form->labelEx($model,'Choose Picture For Course :'); ?>
                              </div>  
                            
                            <div class="span3">
                                <?php echo $form->fileField($model, 'coursepic', array('class' => "span3 ie7-margin", 'placeholder' => "Choose Picture",'value'=>"Choose Picture")); ?>
                                <?php echo $form->error($model, 'coursepic'); ?>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="span3">
                                <?php //echo $form->labelEx($model,'fname'); ?>
                                <?php echo $form->textField($model, 'coursecode', array('class' => "span3 ie7-margin", 'placeholder' => "Course Code",'maxlength'=>10)); ?>
                                <?php echo $form->error($model, 'coursecode'); ?>
                            </div>  
                            <div class="span3">
                                <?php echo $form->textField($model, 'totalpoint', array('class' => "span3 ie7-margin", 'placeholder' => "Total Points for Course",'maxlength'=>10)); ?>
                                <?php echo $form->error($model, 'totalpoint'); ?>
                            </div>  
                        </div>  
                        <div class="row">
                            <div class="span3">
                                <?php //echo $form->labelEx($model,'fname'); ?>
                                <?php echo $form->textField($model, 'coursename', array('class' => "span6 ie7-margin", 'placeholder' => "Course Name",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'coursename'); ?>
                            </div>  
                        </div>  
                     
                     <div class="row">      
                            <div class="span3">
                                
                               
                                <?php 
                                 $models = program::model()->findAll();

                                 $list = CHtml::listData($models, 'progid', 'progname');
                                 echo CHtml::dropDownList('progname','', $list ,
                                    array(
                                            'empty'=>'Select Course Type',
                                            'ajax' => array(
                                            'type'=>'POST', 
                                            'url'=>CController::createUrl('firstprogram'), 
                                            'update'=>'#programtype', 
                                            'data'=>array('progname'=>'js:this.value'),
                                ))); ?>
                                <?php echo $form->error($model, 'progname'); ?>
                             </div>  
                            <div class="span3">    
                                <?php  echo CHtml::dropDownList('programtype','', array() ,array('empty'=>'Select Course School' )); ?>
                                <?php echo $form->error($model, 'programtype'); ?>
                            </div>
                        </div>

                       
                    
                       <div class="row">
                            <div class="span3">
                            <div class="input-append datetimepicker">
                                    <?php echo $form->textField($model, 'fromdate', array('class' => "dateinput span2", 'placeholder' => "From Date",'readonly'=>"true"));?> 
                                    <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>
                                   
                             </div>    
                                 <?php echo $form->error($model, 'fromdate'); ?>
                            </div>

                            <div class="span3">
                                <div class="input-append datetimepicker">
                                 
                                    <?php echo $form->textField($model, 'duedate', array('class' => "dateinput span2", 'placeholder' => "Due Date",'readonly'=>"true"));?> 
                                     <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>
                                     
                                 
                                </div>
                                <?php echo $form->error($model, 'duedate'); ?>
                            </div>
                        </div>

                        <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
                        <div class="row">
                            <div class="span6">
                                <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
                                <?php echo $form->textArea($model, 'coursedesc', array('class' => "span6", 'placeholder' => "Course Description", 'rows' => "5", 'id'=>'editor1','cols'=>"80",'maxlength'=>1000 )); ?>
                                <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                                <?php echo $form->error($model, 'coursedesc'); ?>
                            </div>
                        </div>



                        <div class="row">

                            <div class="button-align span1">
                                <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Submit")); ?>
                            </div>
                        </div>
                        <hr>


             <?php $this->endWidget(); ?>
                   
               
                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
   
    </div><!-- end container-->
    <?php endif; ?>