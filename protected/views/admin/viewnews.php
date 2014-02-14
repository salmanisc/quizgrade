<?php
$page = "View News";
$title = "Admin Dashboard - View News";
 
 
?>


 
<?php
/* @var $this SiteController */
/* @var $model AddNewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - View News';
//$this->breadcrumbs = array(
//    'Add News',
//);
$page = "View News";
$title = "Admin Dashboard - View News";

?>


<?php if (Yii::app()->user->hasFlash('viewnews')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('viewnews'); ?>
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
                                'id' => 'viewnews-form',
                                'enableAjaxValidation' => true,
                    )); ?>
                            <?php
                                    $list = array('General' => "General", 'Exams' => "Exams");
                                    echo $form->dropDownList($model, 'newscat', $list, array(
                                        'empty' => 'Select News Category', 'class' => "span2"));
                            ?>

                            <?php echo $form->error($model, 'newscat'); ?>
                             
                    
                    
                    
                    <?php $this->endWidget(); ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                       <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Expiry</th>
                            <th>Type</th>
                            
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['newstitle'];?></td>
                                 
                                <td>
                                    
                                <?php  
                                        $startdate = $val['fromdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d-m-Y');
                                    
                                        echo $startdate;
                                ?>
                                
                                
                                </td>
                                <td> 
                                 <?php  
                                        $enddate = $val['expirydate'];
                                        $enddate = new Datetime($enddate);
                                        $enddate= $enddate->format('d-m-Y');
                                    
                                        echo $enddate;
                                ?>
                                
                                </td>
                                <td ><?php  echo $val['newstype'];?></td>
                                <td>
                                    <?php echo CHtml::link('Edit',array()); ?>
                                </td>
                                </tr>
                                <?php endforeach;?>
                        </tbody>


                    </table>


                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->



    <?php endif; ?>