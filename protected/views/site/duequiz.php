<?php
$this->pageTitle = Yii::app()->name . ' - Due Quiz';
$this->breadcrumbs = array(
    'Due Quiz',
);
$page = "Due Quiz";
$title = "Due Quiz";

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
                                    <th>Name</th>
                                    <th>Instructor</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr></thead>

                                <tbody>

                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['quizname'];?></td>
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
                                 
                                
                                <td>
                                    <?php 
                                    if ($val['quesno']<>0)
                                    { echo 'Submitted';}
                                    else
                                    {
                                        echo CHtml::link('Start Quiz',array('/site/viewquizans',
                                         'quizid'=> $val['quizid']  ,
                                         'totalquest'=>$val['totalquest'], 
                                         'userid'=>$val['userid'],
                                         'quesno'=>1
                                            )     );
                                    
                                    } 
                                    ?>
                             
                                </td>
                                </tr>
                                <?php endforeach;?>
                                
                                </tbody></table>
                        </div>

                    </div>




                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
    </div><!-- end container
    'totalquest'=>$val['totalquest'],$val['quizid']
                                         'userid'=>$val['userid'],
    -->


 