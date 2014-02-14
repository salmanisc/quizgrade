 
<?php
/* @var $this SiteController */
/* @var $model AddQuizForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Create New Quiz';
$this->breadcrumbs = array(
    'New Quiz',
);
$page = "Create New Quiz";
$title = "Create New Quiz";
?>


<?php if (Yii::app()->user->hasFlash('addquiz')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('addquiz'); ?>
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


                    <div id="new_quiz">

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'addquiz-form',
                            'enableAjaxValidation' => false,
                                )
                        );
                        ?>

                        <div class="row">
                            <div class="span6">
                                <?php //echo $form->labelEx($model,'fname');  ?>
                                <?php echo $form->textField($model, 'quizname', array('class' => "span6 ie7-margin", 'placeholder' => "Quiz Name", 'maxlength' => 50)); ?>
                                <?php echo $form->error($model, 'quizname'); ?>
                            </div>  
                        </div>  
                        <div class="row">     

<!--                            <div class="span3">
                                <?php
                               /* $list = array('Point' => "Point");
                                //, 'Grade' => "Grade"x
                                echo $form->dropDownList($model, 'gradtype', $list, array(
                                    'empty' => 'Select Grading Type', 'class' => "span3"), array('ajax' => array(
                                        'type' => 'POST', //request type
                                        'url' => CController::createUrl('AddassignForm/enablepoint'), //url to call.
                                        //Style: CController::createUrl('currentController/methodToCall')
                                        'update' => '#point'))); //selector to update
                                ?>

                                <?php echo $form->error($model, 'gradtype');*/ ?>
                            </div>  -->

                              

                        </div>
                       <div class="row">      
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
                                ))); */?>
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
<!--                            <div class="span3">    
                                <?php  //echo CHtml::dropDownList('programtype','', array() ,array('empty'=>'Select Program Type' )); ?>
                                <?php //echo $form->error($model, 'programtype'); ?>
                            </div>-->

                            <div class="span3">
                                <?php echo $form->textField($model, 'point', array('class' => "span3 ie7-margin", 'placeholder' => "Points", 'maxlength' => 10)); ?> 
                                <?php echo $form->error($model, 'point'); ?>
                            </div>   

                       </div>

                        <div class="row">
                            <div class="span3">
                                <div class="input-append datetimepicker">
                                <?php echo $form->textField($model, 'fromdate', array('class' => "dateinput span2", 'placeholder' => "Available From Date", 'readonly' => "true")); ?> 
                                 <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>

                                </div>    
                                <?php echo $form->error($model, 'fromdate'); ?>
                            </div>

                            <div class="span3">
                                <div class="input-append datetimepicker">

                                    <?php echo $form->textField($model, 'duedate', array('class' => "dateinput span2", 'placeholder' => "Due Date", 'readonly' => "true")); ?> 
                                    <span class="add-on"><i data-date-icon="icon-calendar" data-time-icon="icon-time" class="icon-calendar"></i></span>


                                </div>
                                <?php echo $form->error($model, 'duedate'); ?>
                            </div>
                            
                        </div>


                        <div class="row">


                            <div class="span3">
    <?php echo $form->textField($model, 'totaltime', array('class' => "span3 ie7-margin", 'placeholder' => "Total Time")); ?>
                                <?php echo $form->error($model, 'totaltime'); ?>
                            </div>


                            <div class="span3">
    <?php echo $form->textField($model, 'totalquestions', array('class' => "span3 ie7-margin", 'placeholder' => "Total Questions", 'integer' => 'true', 'maxlength' => 10)); ?>
                                <?php echo $form->error($model, 'totalquestions'); ?>
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <div class="button-align span1">
    <?php echo CHtml::submitButton('submit', array('class' => "btn btn-info", 'value' => "Submit")); ?>
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