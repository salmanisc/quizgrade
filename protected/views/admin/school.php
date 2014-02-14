 


<?php
$page = "Manage Schools";
$title = "Admin Dashboard - Manage Schools";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Manage Schools';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Manage Schools";
$title = "Admin Dashboard - Manage Schools";

?>


<?php if (Yii::app()->user->hasFlash('school')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('school'); ?>
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
                                'id' => 'school-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                    <div class="row">      
                            <div class="span3">
                                 
                               
                                 
                                <?php 
                                   
                                  $models=program::model()->findAll();
                                   
                                  $list = CHtml::listData($models, 'progid', 'progname');
                                   
                                 echo CHtml::dropDownList('progid','', $list ,
                                    array(
                                            'empty'=>'Select Course Type',
                                            'ajax' => array(
                                            'type'=>'POST', 
                                            //'url'=>CController::createUrl('firstprogram'), 
                                            //'update'=>'#programtype', 
                                            //'data'=>array('progname'=>'js:this.value'),
                                )));  ?>
                                <?php echo $form->error($model, 'progid'); ?>

                         </div>
                        </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                                <?php echo $form->textField($model, 'firstprogname', array('class' => "span6 ie7-margin", 'placeholder' => "Enter School Name",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'firstprogname'); ?>
                    <?php 
                                 $departid=0;
                                 echo $form->hiddenField($model, 'firstprogid', array('value'=>"$departid",'type' => "hidden" )); ?>
                                 <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Add")); ?>
                   <?php $this->endWidget(); ?>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Course Type</th>
                            <th class="text-right"></th>
                            <th class="text-right" colspan="2">School</th>
                             <th class="text-right" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         
                           
                        <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['progname'];?></td>
                                <td> <?php echo $form->hiddenField($model, 'progid', array('type' => "hidden" )); ?>
                                <td ><?php  echo $val['firstprogname'];?></td>
                                <td> <?php echo $form->hiddenField($model, 'firstprogid', array('type' => "hidden" )); ?>
                                <td>
                                    <?php echo CHtml::link('Edit',array('/admin/editschool',
                                        'progid'=>$val['progid'],'firstprogid'=>$val['firstprogid'])); ?>
                                </td>
                                <td>
                                <?php echo CHtml::link('Delete',array('/admin/editschool',
                                        'progid'=>$val['progid'],'firstprogid'=>$val['firstprogid'])); ?>
                              
 
                                    
                                    
                                    <?php //echo CHtml::link('Remove',array('/admin/editdept',
                                       // 'departid'=>$val['departid'])); 
                                    ?>
                                </td>
                                </tr>
                                <?php endforeach;?>

                        </tbody></table>




                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->


    <?php endif; ?>
