                    
<?php
/* @var $this SiteController */
/* @var $model AddassignForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Quiz Answer';
$this->breadcrumbs = array(
    'Quiz Answer',
);
$page = "Quiz Answer";
$title = "Quiz Answer";

?>


<?php if (Yii::app()->user->hasFlash('quizans')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('quizans'); ?>
    </div>

<?php else: ?>


<div class="container">
	
	<div class="row">




        <!-- =========================Start Col left section ============================= -->





        
        <!-- =========================Start Col right section ============================= -->
		<section class="span8 offset2">
		<div class="col-right">
            <h4><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            <div class="row">
                <div class="span7">
                    <h4 class="box-style-one"><?php   var_dump($data); //echo ucwords($data[0]['quizname']) ;?></h4>

                </div>
            </div>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'quizans-form',
            'enableAjaxValidation' => false,
                )
        );
        ?>




<!--                <div class="row">
                        <div class="span3 offset1">
                            <label>Question No. <?php //echo $data[0]['quesno'] .' / '.   $data[0]['totalquest'];?></label>
                        </div>

                    <div class="span3">
                        <label class="checkbox">
                        <input type="checkbox" name="review" value="mark">
                            Mark For Review
                        </label>

                    </div>

                    </div>

                <hr />


                <div class="row">
                    <div class="span7">
                        <p class="que"> <?php //echo 'Que .'. $data[0]['quesno']. ' : '.  $data[0]['question'];  ?></p>
                    </div>
                </div>


                    <div class="row">
                
                        <div class="span7">
                            <label class="radio ans">
                              <?php echo CHtml::radioButton(  'optiona', false,array('value'=> "A",'uncheckValue'=>null));//$data[0]['optiona'] ;?> 
                            </label>
                         </div>
                    </div>
                <hr />

                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                            <?php echo CHtml::radioButton(  'optiona', false,array('value'=> "B",'uncheckValue'=>null ) );//$data[0]['optionb'];?> 
                        </label>
                    </div>
                </div>
                <hr />
                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                           <?php echo CHtml::radioButton(  'optiona' , false,array('value'=> "C",'uncheckValue'=>null));//$data[0]['optionc'];?> 
                        </label>
                    </div>
                </div>
                <hr />
                <div class="row">

                    <div class="span7">
                        <label class="radio ans">
                            <?php echo CHtml::radioButton(  'optiona' , false,array('value'=> "D",'uncheckValue'=>null));//$data[0]['optiond'];?> 
                    
                        </label>
                    </div>
                </div>
                <hr />



                <div class="row">
                        <div class="span5">
                            <div class="">
                                 <?php 
                            
//                            $totalquest=$data[0]['totalquest'];
//                            $questno=$data[0]['quesno'];
//                            if ($questno!==$totalquest)
//                            {    
//                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Previous")); 
//                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Next"));  
//                            }
//                            else
//                            {
//                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"Previous")); 
//                                echo CHtml::submitButton('submit', array('class' => "btn btn-info",'value'=>"End")); 
//                            }
                          ?>  
                            </div>
                        </div>
                        <div class="span1">
                            <button id="review" class="btn btn-info">
                                Review
                            </button>
                        </div>
                    </div>

                    </div>-->


             <?php $this->endWidget(); ?>

            

		</section>
	</div><!-- end row-->

</div><!-- end col right-->
</div><!-- end container-->

    <?php endif; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            