d
<?php
$page = "Edit Courses";
$title = "Admin Dashboard - Edit Categories";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Edit Categories';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Edit Courses";
$title = "Admin Dashboard - Edit Categories";

?>
<?php if (Yii::app()->user->hasFlash('editcourses')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('editcourses'); ?>
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
                                'id' => 'editcourses-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                    
                    <?php  
                         
                         
                                   $sql = "SELECT  distinct progid,progname   
                         
                                            FROM t_program
                                         
                                        WHERE  progid = '$_GET[progid]'";
                                    

                                    $command = Yii::app()->db->createCommand($sql);
                                    $dataq = $command->queryRow();
                         
//                         var_dump($dataq);
                         ;?>
                    
                    
                                <?php
                                $progname=$dataq['progname'];
                                echo $form->textField($model, 'progname', array('value'=>"$progname",  'class' => "span6 ie7-margin", 'placeholder' => "Enter Catgory Type",'maxlength'=>100)); ?>
                                
                                <?php   echo $form->error($model, 'progname'); ?>
                                <?php 
                                 $progid=$dataq['progid'];
                                echo $form->hiddenField($model, 'progid', array('value'=>"$progid",'type' => "hidden" )); ?>
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
                                <td ><?php  echo $val['progname'];?></td>
                                <td> <?php echo $form->hiddenField($model, 'progid', array('type' => "hidden" )); ?>
                                <td>
                                    <?php echo CHtml::link('Edit',array('/admin/editcourses',
                                        'progid'=>$val['progid'])); ?>
                                </td>
                                <td>
                                <?php echo CHtml::link('Delete',  array('admin/editcourses',
                                    'progid'=>$val['progid']   ));
                               ?>  
                                </tr>
                                <?php endforeach;?>

                        </tbody></table>




                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->


    <?php endif; ?>
