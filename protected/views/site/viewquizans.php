 
<?php
/* @var $this SiteController */
/* @var $model Viewquizans */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Quiz Answer';
$this->breadcrumbs = array(
    'Quiz Answer',
);
$page = "Quiz Answer";
$title = "Quiz Answer";

?>


<?php if (Yii::app()->user->hasFlash('viewquizans')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('viewquizans'); ?>
    </div>

<?php else: ?>

<div class="container">
	
	<div class="row">

        
		<section class="span8 offset2">
		<div class="col-right">
            <h4><?php if(isset($title)) echo $title; ?></h4>
			<hr>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'viewquizans-form',
                'enableAjaxValidation' => false,
                    )
            );
            ?>

                
                        <?php  
                         
                         
                                    $sql = "SELECT  distinct t_quiz.quizname,
                                    t_quiz.courseid ,t_quiz.quizid,
                                    t_quiz.startdate,t_quiz.enddate,
                                    t_quiz.gradetype,t_quiz.point,
                                    t_quiz.userid,t_quizques.quesno,
                                    t_quizques.question,t_quizques.optiona,
                                    t_quizques.optionb,t_quizques.optionc,
                                    t_quizques.optiond,t_quizques.answer as quesnoa,
                                    t_quiz.totalquest
                                    FROM t_coursesapp 
                                    join t_quiz as t_quiz on

                                    t_coursesapp.courseid=t_quiz.courseid   


                                    join t_quizques on
                                    t_quiz.quizid=t_quizques.quizid

                                    WHERE  t_coursesapp.userid = '$_GET[userid]'
                                    and t_quiz.quizid='$_GET[quizid]'
                                    and  t_quizques.quesno= '$_GET[quesno]'";

                                    $command = Yii::app()->db->createCommand($sql);
                                    $dataq = $command->queryRow();
                         
//                         var_dump($dataq);
                         ;?>
                <div class="row">
                <div class="span7">
                    <h4 class="box-style-one"><?php   echo ucwords($dataq['quizname']); //echo ucwords($data[0]['quizname']) ;?></h4>

                </div>
                </div>
                 <div class="row">
                        <div class="span3 offset1">
                            <label>Question No. <?php  echo $dataq['quesno'] .' / '.   $dataq['totalquest'];?></label>
                         
                        </div>

                    <div class="span3">
 

                    </div>

                  </div>

                <hr />
                <div class="row">
                    <div class="span7">
                        <p class="que"> <?php echo 'Que .'. $dataq['quesno']. ' : '.  $dataq['question'];  ?></p>
                    </div>
                </div>


                    <div class="row">
                
                        <div class="span7">
                            <label class="radio ans">
                              <?php echo $form->radioButton($model, 'optiona', array('value'=> 'A','uncheckValue'=>null)); echo $dataq['optiona'] ;?> 
                            </label>
                         </div>
                    </div>
                <hr />

                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                            <?php echo $form->radioButton($model,'optiona', array('value'=> 'B','uncheckValue'=>null ) ); echo $dataq['optionb'];?>
                            
                        </label>
                    </div>
                </div>
                <hr />
                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                           <?php echo $form->radioButton($model, 'optiona' , array('value'=> 'C','uncheckValue'=>null));echo $dataq['optionc'];?> 
                       
                        </label>
                    </div>
                </div>
                <hr />
                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                            <?php echo $form->radioButton($model,'optiona' , array('value'=> 'D','uncheckValue'=>null));echo $dataq['optiond'];?> 
                            <?php echo $form->error($model, 'optiona'); ?>
                        </label>
                    </div>
                </div>
                <hr />



                <div class="row">
                        <div class="span5">
                            <div class="">
                                 <?php 
                            
                            $totalquest=$dataq['totalquest'];
                            $questno=$dataq['quesno'];
                            if ($questno!==$totalquest)
                            {    
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Previous")); 
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Next"));  
                            }
                            else
                            {
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Previous")); 
                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"End")); 
                            }
                          ?>  
                            </div>
                        </div>
                    <div class="row">
                                    <?php 
                                        echo $form->hiddenField($model, 'quesnoa', array('type'=>"hidden",'value'=> $dataq['quesnoa']  )); 
                                        echo $form->hiddenField($model, 'quesno', array('type'=>"hidden",'value'=> $dataq['quesno']  ));
                                        echo $form->hiddenField($model, 'quizid', array('type'=>"hidden",'value'=> $dataq['quizid']  ));
                                        echo $form->hiddenField($model, 'totalquest', array('type'=>"hidden",'value'=> $dataq['totalquest']  ));
                                    ?> 
                    </div>    
<!--                        <div class="span1">
                            <button id="review" class="btn btn-info">
                                Review
                            </button>
                        </div>-->
                    </div>
                    <?php $this->endWidget(); ?> 
               
                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
   
    </div><!-- end container-->
    <?php endif; ?>