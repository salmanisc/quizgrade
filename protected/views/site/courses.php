 
<?php
/* @var $this SiteController */
/* @var $model ApplyCourse */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - View Course Detail';
$this->breadcrumbs = array(
    'New Assignment',
);
$page = "View Course Detail";
$title = "View Course Detail";

?>


<?php if (Yii::app()->user->hasFlash('courses')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('courses'); ?>
    </div>

<?php else: ?>

    <div class="container">

        <div class="row">
 <aside class="span4 ">
                <div class="col-left">
                    <h3>Browse Courses</h3>
                    <ul class="submenu-col">
                        <?php if(isset($dataq))
                        { 
                           
                        foreach($dataq as $key=>$val): ?>
                        
                        <li> 
                        <?php echo CHtml::link($val['progname'].' ('.$val['totalcourse'].')',array('/site/allcourses','progid'=>$val['progid'])); ?>
                        </li>
                    
                        <?php endforeach; }?>
                    </ul>

                    <hr>

                    <h5>Upcoming Courses</h5>
                    <p>Suspendisse quis risus turpis, ut pharetra arcu. Donec adipiscing, quam non faucibus luctus, mi arcu blandit diam, at faucibus mi ante vel augue.</p>
                    <p><a href="#" class=" button_red_small">View Courses</a></p>

                </div>

            </aside>

            <!-- =========================Start Col left section ============================= -->
   

            <section class="span8  ">
                <div class="col-right">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'courses-form',
                'enableAjaxValidation' => true,

            )); ?>
                    
                     
                
                    
                    <div class="strip-courses gray">
                        <div class="title-course">
                            <?php 
                                        $courseid=  $data['courseid']; 
                                        echo $form->hiddenField($model, 'courseid', array( 'type'=>"hidden",'value'=> $courseid  ));

                                        $progid=  $data['progid']; 
                                        echo $form->hiddenField($model, 'progid', array( 'type'=>"hidden",'value'=> $progid  ));

                                        $firstprogid=  $data['firstprogid']; 
                                        echo $form->hiddenField($model, 'firstprogid', array( 'type'=>"hidden",'value'=> $firstprogid  ));
                            
                                        
                            ?>
                            <h3><?php echo $data['progname'];?></h3>
                            <ul>
                                <li><i class="icon-calendar"></i> Start date: <?php  
                                        $startdate = $data['startdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d-m-Y');
                                    
                                        echo $startdate; 
                                
                                ?></li>
                                
                            </ul>
                        </div>
                        <div class="description">
                            <h3><?php echo $data['coursename'];?></h3>
                            <p><?php echo $data['coursedesc'];?></p>
                            <ul>
                                <li><i class="icon-book"></i> 10 Lessons</li>
                                <li><i class="icon-reorder"></i> Level Basic</li>
                                <li><i class="icon-bookmark"></i> ID: <?php echo $data['coursecode'];?></li>
                                <li class="online"><i class="icon-laptop"></i> Online</li>
                            </ul>
                            <?php 
                                        $isstudent=Yii::app()->session['isstudent'];
                                        echo $form->hiddenField($model, 'isstudent', array( 'type'=>"hidden",'value'=> $isstudent  ));
                            if ( $isstudent==="1")  {              
                            echo CHtml::submitButton('Apply Now' ,array('class'=>"button_medium button-align-2"));} ?>
                        </div>
                    </div>
                     

                    <hr>

                    

                </div><!-- end col right-->

             <?php $this->endWidget(); ?>
                   
               
            </section>
        </div><!-- end row-->
   
    </div><!-- end container-->
    <?php endif; ?>
 