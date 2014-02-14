 

<?php
$page = "Approve Students";
$title = "Admin Dashboard - Approve Students";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Approve Students';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Approve Students";
$title = "Admin Dashboard - Approve Students";

?>


<?php if (Yii::app()->user->hasFlash('aprvstudent')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('aprvstudent'); ?>
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
                                'id' => 'aprvstudent-form',
                                'enableAjaxValidation' => true 
                               
                    )); ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Fullname</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
 

                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['codeno'];?></td>
                                <?php 
                                    $userid= $val['suserid'];
                                    echo $form->hiddenField($model, 'suserid', array('type' => "hidden",'value'=>$userid )); 
                                ?>
                          
                                  <td ><?php  echo $val['fullname'];?></td>
                                  <td ><?php  echo $val['phoneno'];?></td>
                                  <!--<td ><?php // echo $val['progname'];?></td>-->
                                    <td ><?php  echo $val['username'];?></td>
                                
                                <td>  <span class="icon-ok-circle text-success">    </span>                                    
                                    <?php echo CHtml::link('Approve',array('/admin/editstudent',
                                        'suserid'=>$val['suserid'],'class'=>"text-success")); ?>
                                 
                                </td>
                                
                                <td>  <span class="icon-remove-sign text-error"> </span>                                  
                                    <?php echo CHtml::link('Decline',array('/admin/rejectstudent',
                                        'suserid'=>$val['suserid'],'class'=>"text-success")); ?>
                                </td>
                                
                                
                                    
                                    
                                    
                                </td>
                                </tr>
                                <?php endforeach;?>

                    </table>
                   <?php $this->endWidget(); ?>

                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->


    <?php endif; ?>
 