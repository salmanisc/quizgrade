<?php
$this->pageTitle = Yii::app()->name . ' - Lessons';
$this->breadcrumbs = array(
    'Lessons',
);
$page = "Lessons";
$title = "Lessons";

?>


<?php if (Yii::app()->user->hasFlash('viewlesson')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('viewlesson'); ?>
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
            'id' => 'viewlesson-form',
            'enableAjaxValidation' => false,
                )
        );
        ?>
                    
                    <div class="row">

                        <div class="span7">



                            <table class="table table-bordered table-striped" >
                           
                                <thead>
                                <tr>
                                    <th>Course Title </th>
                                    <th>Lesson Name</th>
                                    <!--<th>Type</th>-->
                                    <th>Attach File</th>
                                    <th>Created Date</th>
                                    <!--<th>Response</th>-->
                                </tr></thead>

                                <tbody>
<!--                                <tr>
                                    <td>Curabitur blandit tempus porttitor </td>
                                    <td>Mark Twain</td>
                                    <td>10.30 AM</td>
                                    <td>Received</td>
                                </tr>
                                <tr>
                                    <td>Pellentesque ornare sem</td>
                                    <td>Janet Hope</td>
                                    <td>10.30 AM</td>
                                    <td>Reviewed</td>
                                </tr>
                                <tr>
                                    <td>Integer posuere erat a ante venenatis</td>
                                    <td>Tom Cruise</td>
                                    <td>12.30 AM</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>Sed posuere consectetur</td>
                                    <td>Bob Sinclair</td>
                                    <td>11.30 AM</td>
                                    <td>Rewarded</td>
                                </tr>-->
                                 
                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['progname'];?></td>
                                <td  ><?php  echo $val['lessonname'];?></td>
                                <td><?php  echo $val['lessonfile'];?></td>
                    
                                <td><?php  
                                        $enddate = $val['cruddate'];
                                        $enddate = new Datetime($enddate);
                                        $enddate= $enddate->format('M-d-Y');
                                        echo $enddate;?></td>
                                
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