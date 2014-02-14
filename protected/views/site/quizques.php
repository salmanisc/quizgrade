 
<?php
/* @var $this SiteController */
/* @var $model QuizQuesForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Quiz Questions';
$this->breadcrumbs = array(
    'Quiz Questions',
);
$page = "Quiz Questions";
$title = "Quiz Questions";

?>


<?php if (Yii::app()->user->hasFlash('quizques')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('quizques'); ?>
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
            <h4><?php if(isset($title)) echo $title; ?></h4>
			<hr>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'quizques-form',
                'enableAjaxValidation' => false,
                    )
            );
            ?>

                
                <div class="row">
                        <div class="span3">
                           <?php  // echo $form->labelEx($model,'QuestionNumber'); ?>
                         </div>
                </div>

                <div class="row">
                    <div class="span3">
                        <?php   
                           $totalquest=$_GET['totalquest'];
                           $questno=$_GET['questno'];
                           $question='Question '. $questno. ' of ' . $totalquest;
                        ?>
                         <?php 
                           
                            echo $form->labelEx($model, $question); 
                         ?>
                        <?php echo $form->textArea($model, 'question', array('class' => "span6", 'placeholder' => "Question", 'rows' => "5",  'cols'=>"80", 'maxlength' => 500 )); ?>
                    </div>
                </div>


                <div class="row">
                    <div class="span6">
                    <label>Available Choices for Answers</label>
                    </div>
                </div>


                <div class="row">
                        <div class="span6">
                            <?php echo $form->textField($model, 'optiona', array('class' => "span6 ie7-margin", 'placeholder' => "Option A", 'maxlength' => 200)); ?>
                            <?php echo $form->error($model, 'optiona'); ?>
                            
                        </div>
                </div>

                <div class="row">
                    <div class="span6">
                            <?php echo $form->textField($model, 'optionb', array('class' => "span6 ie7-margin", 'placeholder' => "Option B", 'maxlength' => 200)); ?>
                            <?php echo $form->error($model, 'optionb'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span6">
                            <?php echo $form->textField($model, 'optionc', array('class' => "span6 ie7-margin", 'placeholder' => "Option C", 'maxlength' => 200)); ?>
                            <?php echo $form->error($model, 'optionc'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span6">
                            <?php echo $form->textField($model, 'optiond', array('class' => "span6 ie7-margin", 'placeholder' => "Option D", 'maxlength' => 200)); ?>
                            <?php echo $form->error($model, 'optiond'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span6">
                        <?php
                                    $list = array('A' => "A", 'B' => "B", 'C' => "C", 'D' => "D");
                                    echo $form->dropDownList($model, 'answer', $list, array(
                                        'empty' => 'Select Correct Option', 'class' => "span3") ); //selector to update
                                    ?>

                                    <?php echo $form->error($model, 'answer'); ?>
                        
                         
                    </div>
                </div>
                
                    <div class="row">
                        <div class="span7">
                            
                             
                            <?php 
                            
                            $totalquest=$_GET['totalquest'];
                            $questno=$_GET['questno'];
                            if ($questno!==$totalquest)
                            {    
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Next")); 
                            }
                            else
                            {
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"End"));  
                            }
                          ?>  
                            
                            
                        </div>
                    </div>

                    <?php $this->endWidget(); ?>
                    </div><!-- Student_signup_container-->
               
                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
   
    </div><!-- end container-->
    <?php endif; ?>