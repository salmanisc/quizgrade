d
<?php
$page = "Edit Departments";
$title = "Admin Dashboard - Edit Departments";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Edit Departments';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Edit Departments";
$title = "Admin Dashboard - Edit Departments";

?>
<?php if (Yii::app()->user->hasFlash('editdepart')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('editdepart'); ?>
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
                                'id' => 'editdepart-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                    
                    <?php  
                         
                         
                                   $sql = "SELECT  distinct departid,departname   
                         
                                            FROM t_department    
                                         
                                        WHERE  departid = '$_GET[departid]'";
                                    

                                    $command = Yii::app()->db->createCommand($sql);
                                    $dataq = $command->queryRow();
                         
//                         var_dump($dataq);
                         ;?>
                    
                    
                                <?php
                                $departname=$dataq['departname'];
                                echo $form->textField($model, 'departname', array('value'=>"$departname",  'class' => "span6 ie7-margin", 'placeholder' => "Enter Department Name",'maxlength'=>100)); ?>
                                
                                <?php   echo $form->error($model, 'departname'); ?>
                                <?php 
                                 $departid=$dataq['departid'];
                                echo $form->hiddenField($model, 'departid', array('value'=>"$departid",'type' => "hidden" )); ?>
                                <?php echo CHtml::submitButton('submit', array('class'=>"btn btn-info",'value'=>"Save")); ?>
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
                                    'departid'=>$val['departid'],'confirm'=>'Are you sure you want to delete this item?' ,
                                    'csrf'=>true   ));
                               ?>  
                                </tr>
                                <?php endforeach;?>

                        </tbody></table>




                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->


    <?php endif; ?>
