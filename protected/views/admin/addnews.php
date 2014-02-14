<?php
$page = "Add News";
$title = "Admin Dashboard - Add News";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Add News';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Add News";
$title = "Admin Dashboard - Add News";

?>


<?php if (Yii::app()->user->hasFlash('addnews')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addnews'); ?>
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
                                'id' => 'addnews-form',
                                'enableAjaxValidation' => true,

                    )); ?>

                    <div class="row">
                        <div class="span2">
                             
                            <?php
                                    $list = array('General' => "General", 'Exams' => "Exams");
                                    echo $form->dropDownList($model, 'newscat', $list, array(
                                        'empty' => 'Select News Category', 'class' => "span2"));
                            ?>

                            <?php echo $form->error($model, 'newscat'); ?>
                            
                            
                            
                        </div>

                        <div class="span2">
                            
                           <?php
                                    $list = array('Admission' => "Admission", 
                                        'Announcements' => "Announcements",
                                        'Exams' => "Exams",
                                        'Results' => "Results",
                                        'Assignments' => "Assignments",
                                        'Quiz' => "Quiz"
                                        
                                        );
                                    echo $form->dropDownList($model, 'newstype', $list, array(
                                        'empty' => 'Select News Type', 'class' => "span2"));
                            ?>

                            <?php echo $form->error($model, 'newstype'); ?>                           
                            
                        </div>
                        </div>
<!--                        <div class="span2">
                            <label class="checkbox text-success">
                                <input type="checkbox" value="1">
                                Publish News
                            </label>
                        </div>

                    </div>-->

                        

                        
                                <?php echo $form->textField($model, 'newstitle', array('class' => "input-block-level", 'placeholder' => "New Title",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'newstitle'); ?>


                         <script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
                        <div class="row">
                            <div class="span6">
                                <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
                                <?php echo $form->textArea($model, 'news', array('class' => "span6", 'placeholder' => "Assignment Description", 'rows' => "5", 'id'=>'editor1','cols'=>"80",'maxlength'=>1000 )); ?>
                                <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                                <?php echo $form->error($model, 'news'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="span8">
                                &nbsp;
                            </div>
                        </div>


                         <div class="row">
                            <div class="span3 pull-left">
                            <div class="input-append datetimepicker">
                                    <?php echo $form->textField($model, 'fromdate', array('class' => "dateinput span4", 'placeholder' => "Available From Date",'readonly'=>"true"));?> 
                                    <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>
                                   
                             </div>    
                                 <?php echo $form->error($model, 'fromdate'); ?>
                            </div>

                            <div class="span3">
                                <div class="input-append datetimepicker">
                                 
                                    <?php echo $form->textField($model, 'expirydate', array('class' => "dateinput span4", 'placeholder' => "Expiry Date",'readonly'=>"true"));?> 
                                     <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>
                                     
                                 
                                </div>
                                <?php echo $form->error($model, 'expirydate'); ?>
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


 