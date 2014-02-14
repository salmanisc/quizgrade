<?php
$page = "Courses";
$title = "Courses";
 
$userType = "";
?>


    <div class="container">

        <div class="row">
 
 <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'allcourses',
            'enableAjaxValidation' => true,
 
        )); ?>
            <!-- =========================Start Col left section ============================= -->
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
                    <p><a class=" button_red_small" href="#">View Courses</a></p>

                </div>

            </aside>

            <section class="span8  ">
                <div class="col-right">
                    <h4><?php if(isset($page)) echo $page; ?> </h4>
                    <div class="main-img">
                        <!--
                        <img alt="" src="images/img/pic-2.jpg">
                        -->
                        <p class="lead">Tibique dolores adversarium ne vel. At vide errem duo, vis luptatum menandri ullamcorper id. </p>
                    </div>

 
                        <?php 
                        if(isset($data))
                        {    
                        foreach($data as $key=>$val): ?>

                    <div class="strip-courses gray">
                        <div class="title-course">
                            <h3><?php echo $val['coursename']; ?></h3>
                            <ul>
                                <li><i class="icon-calendar"></i> Start date: <?php    $datetime1 = new DateTime($val['startdate']);
                                echo $datetime1->format('M-d-Y')
                                ?></li>
                                <li><i class="icon-bookmark"></i> ID: 012</li>
                            </ul>
                        </div>
                        <div class="description">
                            <p><?php  echo $val['coursedesc']; ?></p>
                            <ul>
                                <li><i class="icon-book"></i> 10 Lessons</li>
                                <li><i class="icon-reorder"></i> Level Basic</li>
                                <li class="online"><i class="icon-laptop"></i> Online</li>
                                <li><?php echo CHtml::link('Read more',array('/site/courses' ,
                                        'courseid'=>$val['courseid']
                             )); ?></li>
 
                                <li>
 


                            </ul>
                             
                        </div>
                    </div><!-- end strip-->
                        <?php endforeach;}?>

                    <hr>

                    <div class="pagination pagination-centered">
                     <ul> 
           
                            <?php 
                if(isset($data))
                        {  
                         $this->widget('CLinkPager', array(
                            'header' => '',
                            'firstPageLabel' => '&lt;&lt;',
                            'prevPageLabel' => '&lt;',
                            'nextPageLabel' => '&gt;',
                            'lastPageLabel' => '&lt;&lt;',
                            'pages' => $pages,
                        ));
                        }  
                             ?>


                        </ul>
                    </div><!-- end pagination-->

                </div><!-- end col right-->

            </section>
<?php   $this->endWidget();?>
        </div><!-- end row-->
    </div>




 