 
<?php
/* @var $this SiteController */
/* @var $model AddassignForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Assignments Response';
$this->breadcrumbs = array(
    'Assignments Response',
);
$page = "Assignments Response";
$title = "Assignments Response";

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

                            <h5 style="color: #333;">Title: <?php 
                            if(isset($data[0]['assignname']))
                            {echo $data[0]['assignname']; }   
                            ?></h5>
                            <p>Due Date : <?php 
                            if(isset($data[0]['enddate']))
                            {echo $data[0]['enddate'];} ?></p>


                            <table class="table table-bordered table-striped">

                                <thead>
                                <tr>

                                    <th>Student</th>
                                    <th>Submit Date</th>
                                    <th>Status</th>
                                </tr></thead>

                                <tbody>
<!--                                <tr>

                                    <td>Mark Twain</td>

                                    <td>05-Dec-2013</td>
                                    <td class="text-success"><span class="icon-ok-circle"></span>Checked</td>
                                </tr>
                                <tr>

                                    <td>Janet Hope</td>

                                    <td>05-Dec-2013</td>
                                    <td class="text-success"><span class="icon-ok-circle"></span>Checked</td>
                                </tr>
                                <tr>

                                    <td>Tom Cruise</td>

                                    <td>05-Dec-2013</td>
                                    <td class="text-error"><span class="icon-ban-circle"></span><a href="chk_assign.php" class="text-error" title="Check Pending Assignment">Pending</a></td>
                                </tr>
                                <tr>

                                    <td>Bob Sinclair</td>

                                    <td>05-Dec-2013</td>
                                    <td class="text-success"><span class="icon-ok-circle"></span>Checked</td>
                                </tr>-->
                                <?php foreach($data as $key=>$val): ?>
                                <tr>    
                                <td ><?php  echo $val['fullname'];?></td>
                                
                                 
                                <td><?php  
                                        $startdate = $val['cruddate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('M-d-Y');
                                    
                                        echo $startdate;
                                ?>
                                </td>
                                
                                <td>
                                     <?php 
                                    if ($val['resultid']<>0)
                                    { echo 'Checked';}
                                    else   
                                    { echo CHtml::link('Pending',array('/site/chkassign',
                                        'assignid'=>$val['assignid'])); 
                                    }?>
                                </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody></table>
                        </div>

                    </div>

                    </div><!-- end col right-->
            </section>
        </div><!-- end row-->
        <!--,'firstprogid'=>$val['firstprogid']-->
    </div><!-- end container-->


 