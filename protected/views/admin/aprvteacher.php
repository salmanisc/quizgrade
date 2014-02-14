 

<?php
$page = "Approve Students";
$title = "Admin Dashboard - Approve Teachers";
 
$userType = "Admin";
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Approve Teachers';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "Approve Teachers";
$title = "Admin Dashboard - Approve Teachers";

?>


<?php if (Yii::app()->user->hasFlash('aprvteacher')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('aprvteacher'); ?>
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
                                'id' => 'aprvteacher-form',
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
                                  <td ><?php  echo $val['progname'];?></td>
                                    <td ><?php  echo $val['username'];?></td>
                                
                                <td>  <span class="icon-ok-circle text-success">    </span>                                    
                                    <?php echo CHtml::link('Approve',array('/admin/editteacher',
                                        'suserid'=>$val['suserid'],'class'=>"text-success")); ?>
                                 
                                </td>
                                
                                <td>  <span class="icon-remove-sign text-error"> </span>                                  
                                    <?php echo CHtml::link('Decline',array('/admin/rejectteacher',
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
 