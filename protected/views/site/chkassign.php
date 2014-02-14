<?php

/* @var $this SiteController */
/* @var $model UpdatePointForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . 'Check - Assignments';
$this->breadcrumbs = array(
    'Check Assignments',
);
$page = "Check Assignments";
$title = "Check Assignments";

?>


<?php if (Yii::app()->user->hasFlash('chkassign')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('chkassign'); ?>
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
                    <h4><?php if(isset($page)) echo $page; ?></h4>
                    <hr>



                    <div class="clearfix"></div>

       <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'chkassign-form',
                'enableAjaxValidation' => false,
                    )
            );
        ?>
                    <div class="row">

                        <div class="span7">

                            <h5 style="color: #333;">Title: <?php echo $data[0]['gradetype'];?></h5>
                            <div class="row">
                                <div class="span4">
                            <p class="pull-left">Due Date : <?php 
                            $startdate =  $data[0]['enddate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d-M-Y');
                            
                            echo $startdate; ?> 
                             Submit Date : 
                             <?php 
                                    $startdate =  $data[0]['cruddate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d-M-Y');
                             
                             
                             echo $startdate; ?></p>
                            <div class="clearfix"></div>
                                </div>
                            </div>
                            <hr>



                            <div class="row">
                                <div class="span3">
                                    <blockquote>
                                       <p>
                                           <?php echo $data[0]['comment'];?>
                                       </p>
 
                                    </blockquote>
                                    <p class="pull-left"><span class="icon-pushpin icon-2x"></span> 
                                     <?php 
                                       $path=Yii::app()->request->baseUrl;
                                       $codeno=$data[0]['codeno'];
                                       $filename=$data[0]['assignfile'];

 
                                         
                                         echo CHtml::link("Download Attachment",array('/site/download/','filename'=>$filename,'codeno'=>$codeno),array('class'=>'text-error') );
                                        //.$path.'/'.'upload'.'/'.$codeno.'/'.$filename
                                      ?> 
                                       <?php echo $data[0]['assignfile']; ?>
                                       </p>  
                                     

                                </div>
                            </div>
                                <div class="row">
                                    <div class="span3">
                                        <?php 
                                        $gradtype=  $data[0]['gradetype']; 
                                        echo $form->textField($model, 'gradtype', array('class' => "span3 ie7-margin", 'placeholder' => "Grade/Point",'disabled'=>'disabled','value'=> "$gradtype"));?> 
                                        <?php echo $form->error($model, 'gradtype'); ?>
                                    </div>
                                        <div class="span3">

                                            <?php echo $form->textField($model, 'point', array('class' => "span3 ie7-margin", 'placeholder' => "Points",'maxlength'=>5));?> 
                                            <?php echo $form->error($model, 'point'); ?>
                                         </div>
                                    </div>
                                    <?php 
                                        $assignid=  $data[0]['assignid']; 
                                        echo $form->hiddenField($model, 'assignid', array( 'type'=>"hidden",'value'=> $assignid  ));
                                    
                                     ?> 
                                    <?php 
                                        $assignid=  $data[0]['assignid']; 
                                        echo $form->hiddenField($model, 'assignid', array( 'type'=>"hidden",'value'=> $assignid  ));
                                    
                                     ?> 
                                        <?php echo $form->error($model, 'assignid'); ?>
                                    <?php 
                                        $suserid=  $data[0]['crudby']; 
                                        echo $form->hiddenField($model, 'suserid', array('type'=>"hidden",'value'=> $suserid  ));
                                    ?> 
                                    <?php echo $form->error($model, 'suserid'); ?>
                                </div>
                                <div class="span3">
                                    <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Update")); ?>
                                </div>
                             

                        </div>
   <?php $this->endWidget(); ?>
                    </div>
          
                    </div><!-- end col right-->
            </section>
        </div><!-- end row-->
    </div><!-- end container-->


     <?php endif; ?>