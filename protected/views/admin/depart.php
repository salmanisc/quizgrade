 


<?php
$page = "Manage Departments";
$title = "Admin Dashboard - Manage Departments";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model department */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Manage Departments';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Manage Departments";
$title = "Admin Dashboard - Manage Departments";

?>


<?php if (Yii::app()->user->hasFlash('depart')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('depart'); ?>
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
                                'id' => 'department-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                                <?php echo $form->textField($model, 'departname', array('class' => "span6 ie7-margin", 'placeholder' => "Enter Department Name",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'departname'); ?>
                    <?php 
                                 $departid=0;
                                 echo $form->hiddenField($model, 'departid', array('value'=>"$departid",'type' => "hidden" )); ?>
                                 <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Add")); ?>
                   <?php $this->endWidget(); ?>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         
                           
                        <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['departname'];?></td>
                                <td> <?php echo $form->hiddenField($model, 'departid', array('type' => "hidden" )); ?>
                                <td>
                                    <?php echo CHtml::link('Edit',array('/admin/editdepart',
                                        'departid'=>$val['departid'])); ?>
                                </td>
                                <td>
                                <?php echo CHtml::link('Delete',  array('admin/deletedepart',
                                    'departid'=>$val['departid'],
                                    'csrf'=>true   ));
                               ?>  
 
                                    
                                    
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
