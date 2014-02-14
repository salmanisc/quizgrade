d
<?php
$page = "Edit Courses";
$title = "Admin Dashboard - Edit School";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Edit School';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Edit School";
$title = "Admin Dashboard - Edit School";

?>
<?php if (Yii::app()->user->hasFlash('editschool')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('editschool'); ?>
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
                                'id' => 'editschool-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                    
                    <?php  
                         
                         
                                   $sql = "SELECT  distinct t_program.progid,t_program.progname,
                                        t_firstprogram.firstprogid,t_firstprogram.firstprogname   

                                        FROM t_program 
                                        join t_firstprogram on
                                        t_program.progid=t_firstprogram.progid
                                        WHERE  t_firstprogram.progid =  $_GET[progid] 
                                        and t_firstprogram.firstprogid= $_GET[firstprogid]  ";
                                    

                                    $command = Yii::app()->db->createCommand($sql);
                                    $dataq = $command->queryRow();
                         
//                         var_dump($dataq);
                         ;?>
                    
                    
                                <?php
                                $progname=$dataq['firstprogname'];
                                echo $form->textField($model, 'firstprogname', array('value'=>"$progname",  'class' => "span6 ie7-margin", 'placeholder' => "Enter Course Type",'maxlength'=>100)); ?>
                                
                                <?php   echo $form->error($model, 'firstprogname'); ?>
                                <?php 
                                 $progid=$dataq['progid'];
                                echo $form->hiddenField($model, 'progid', array('value'=>"$progid",'type' => "hidden" )); 
                                 $firstprogid=$dataq['firstprogid'];
                                echo $form->hiddenField($model, 'firstprogid', array('value'=>"$firstprogid",'type' => "hidden" )); ?>
                               
                                <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Save")); ?>
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
