<?php
$this->pageTitle = Yii::app()->name . ' - Results';
$this->breadcrumbs = array(
    'Results',
);
$page = "Results";
$title = "Results";

?>


<?php if (Yii::app()->user->hasFlash('viewresult')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('viewresult'); ?>
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
            'id' => 'viewresult-form',
            'enableAjaxValidation' => false,
                )
        );
        ?>
                    
                    <div class="row">

                        <div class="span7">



                            <table class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th>Title </th>
                                    <th>Program Name</th>
                                    <th>Type</th>
                                    <th>Start</th>
                                    <th>Deadline</th>
                                    <th>Result</th>
                                    <th>Score</th>
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
                                <td ><?php  echo $val['assignname'];?></td>
                                <td  ><?php  echo $val['progname'];?></td>
                                <td><?php  echo $val['firstprogname'];?></td>
                                <td><?php  
                                        $startdate = $val['startdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('M-d-Y');
                                    
                                        echo $startdate;
                                ?>
                                </td>
                                <td><?php  
                                        $enddate = $val['enddate'];
                                        $enddate = new Datetime($enddate);
                                        $enddate= $enddate->format('M-d-Y');
                                    
                                        echo $enddate;
                                ?></td>
                                <td class="text-info">
                                    <?php echo $val['result']  ?>
                                </td>
                                <td class="text-info">
                                    <?php echo 
                                    $val['score']!=0?$val['score']:''  ?>
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