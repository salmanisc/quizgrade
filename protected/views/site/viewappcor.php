<?php
$this->pageTitle = Yii::app()->name . ' - Applied Courses';
$this->breadcrumbs = array(
    'Applied Courses',
);
$page = "Applied Courses";
$title = "Applied Courses";

?>


<?php if (Yii::app()->user->hasFlash('viewappcor')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('viewappcor'); ?>
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
            'id' => 'viewappcor-form',
            'enableAjaxValidation' => false,
                )
        );
        ?>
                    
                    <div class="row">

                        <div class="span7">



                            <table class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th>Course Title</th>
                                    <th>Course Name</th>
                                    <th>Applied Date</th>
                                </tr></thead>

                                <tbody>
                                 
                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['progname'];?></td>
                                <td  ><?php  echo $val['coursename'];?></td>
                                <td><?php  
                                        $startdate = $val['cruddate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('M-d-Y');
                                    
                                        echo $startdate;
                                ?>
                                </td>
                                
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>

              <?php $this->endWidget(); ?>                   
                    
                    </div><!-- end col right-->
            </section>
        </div><!-- end row-->
    </div><!-- end container-->


    <?php endif; ?>