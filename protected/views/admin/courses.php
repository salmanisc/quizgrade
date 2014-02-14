 


<?php
$page = "Manage Courses";
$title = "Admin Dashboard - Manage Courses";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Categories Types';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Manage Course Types";
$title = "Admin Dashboard - Manage Category Types";

?>


<?php if (Yii::app()->user->hasFlash('courses')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('courses'); ?>
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
                                'id' => 'course-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                                <?php echo $form->textField($model, 'progname', array('class' => "span6 ie7-margin", 'placeholder' => "Enter Category Type",'maxlength'=>100)); ?>
                                <?php echo $form->error($model, 'progname'); ?>
                    <?php 
                                 $departid=0;
                                 echo $form->hiddenField($model, 'progid', array('value'=>"$departid",'type' => "hidden" )); ?>
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
                                <td ><?php  echo $val['progname'];?></td>
                                <td> <?php echo $form->hiddenField($model, 'progid', array('type' => "hidden" )); ?>
                                <td>
                                    <?php echo CHtml::link('Edit',array('/admin/editcourses',
                                        'progid'=>$val['progid'])); ?>
                                </td>
                                <td>
                                <?php echo CHtml::link('Delete',  array('admin/editcourses',
                                    'progid'=>$val['progid'])) ;
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
