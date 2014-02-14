<?php
$this->pageTitle = Yii::app()->name . ' - Due Assignments';
$this->breadcrumbs = array(
    'Due Assignments',
);
$page = "Due Assignments";
$title = "Due Assignments";

?>
 

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

                    <div class="row">

                        <div class="span7">



                            <table class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Instructor Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Grading Type</th>
                                    <th>Point</th>
                                    <th>Action</th>
                                </tr></thead>

                                <tbody>

                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['assignname'];?></td>
                                <td  ><?php  echo $val['fullname'];?></td>
                                <td><?php  
                                        $startdate = $val['startdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d-m-Y');
                                    
                                        echo $startdate;
                                ?>
                                </td>
                                <td><?php  
                                        $enddate = $val['enddate'];
                                        $enddate = new Datetime($enddate);
                                        $enddate= $enddate->format('d-m-Y');
                                    
                                        echo $enddate;
                                ?></td>
                                <td><?php  echo $val['gradetype'];?></td>
                                <td>
                                    <?php  
                                        echo $val['point']==0?'':$val['point'];
                                    ?>
                                </td>
                                
                                <td>
                                    <?php 
                                    if ($val['subid']<>0)
                                    { echo 'Submitted';}
                                    else
                                    {
                                        /*echo CHtml::link('Submit',array('/site/subassign',
                                        'progid'=>$val['progid'],
                                        'firstprogid'=>$val['firstprogid'],
                                        'assignid'=>$val['assignid'],
                                        'userid'=>$val['userid']*/
                                        echo CHtml::link('Submit',array('/site/subassign',
                                        'courseid'=>$val['courseid'],
                                        'assignid'=>$val['assignid'],
                                        'userid'=>$val['userid']
                                    )     );
                                    
                                    } ?>
                                </td>
                                </tr>
                                <?php endforeach;?>
                                
                                </tbody></table>
                        </div>

                    </div>




                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
    </div><!-- end container-->


 