 
<?php
/* @var $this SiteController */
/* @var $model AddassignForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Create New Assignment';
$this->breadcrumbs = array(
    'New Assignment',
);
$page = "Create New Assignment";
$title = "Create New Assignment";

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
                    <hr>


        <div id="new_assigment_container">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'addassign-form',
            'enableAjaxValidation' => true,
 
        )); ?>

                        <div class="row">
                            <div class="span3">
                                <?php //echo $form->labelEx($model,'fname'); ?>
                                <?php echo $form->textField($model, 'assignname', array('class' => "span6 ie7-margin", 'placeholder' => "Assignment Name",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'assignname'); ?>
                            </div>  
                        </div>  
                        <div class="row">     

<!--                        <div class="span3">
                                <?php
                                   /* $list = array('Point' => "Point", 'Grade' => "Grade");
                                    echo $form->dropDownList($model, 'gradtype', $list, array(
                                        'empty' => 'Select Grading Type', 'class' => "span3"));
//                                            , array('ajax' => array(
//                                            'type' => 'POST', //request type
//                                            'url' => CController::createUrl('AddassignForm/enablepoint'), //url to call.
//                                            //Style: CController::createUrl('currentController/methodToCall')
//                                            'update' => '#point'))); //selector to update
                                    ?>

                                    <?php echo $form->error($model, 'gradtype'); */?>
                        </div>  -->

<!--                            <div class="span3">

                                    <?php //echo $form->textField($model, 'point', array('class' => "span3 ie7-margin", 'placeholder' => "Points",'maxlength'=>5));?> 
                                    <?php //echo $form->error($model, 'point'); ?>
                            </div>     -->
                        
                        </div>
                       <div class="row">      
                            <div class="span3">
<!--                                 
                               
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
                                <?php echo $form->error($model, 'progname'); */?>
                             </div>  -->
<!--                            <div class="span3">    
                                <?php // echo CHtml::dropDownList('programtype','', array() ,array('empty'=>'Select Program Type' )); ?>
                                <?php //echo $form->error($model, 'programtype'); ?>
                            </div>-->
                                <?php 
                                  $userid=Yii::app()->session['user'];
                                  $models=Courses::model()->findAllByAttributes(array('userid'=>$userid));
                                   
                                  $list = CHtml::listData($models, 'courseid', 'coursename');
                                   
                                 echo CHtml::dropDownList('coursename','', $list ,
                                    array(
                                            'empty'=>'Select Course Name',
                                            'ajax' => array(
                                            'type'=>'POST', 
                                            //'url'=>CController::createUrl('firstprogram'), 
                                            //'update'=>'#programtype', 
                                            //'data'=>array('progname'=>'js:this.value'),
                                )));  ?>
                                <?php echo $form->error($model, 'coursename'); ?>

                         </div>
                           
                           
                         <div class="span3">

                                    <?php echo $form->textField($model, 'point', array('class' => "span3 ie7-margin", 'placeholder' => "Points",'maxlength'=>5));?> 
                                    <?php echo $form->error($model, 'point'); ?>
                            </div>      
                        </div>
 
                        <div class="row">
                            <div class="span3">
                            <div class="input-append datetimepicker">
                                    <?php echo $form->textField($model, 'fromdate', array('class' => "dateinput span2", 'placeholder' => "Available From Date",'readonly'=>"true"));?> 
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
                                <?php echo $form->textArea($model, 'assigndesc', array('class' => "span6", 'placeholder' => "Assignment Description", 'rows' => "5", 'id'=>'editor1','cols'=>"80",'maxlength'=>1000 )); ?>
                                <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                                <?php echo $form->error($model, 'assigndesc'); ?>
                            </div>
                        </div>



                        <div class="row">

                            <div class="button-align span1">
                                <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Submit")); ?>
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