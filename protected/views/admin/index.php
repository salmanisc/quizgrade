<?php
/* @var $this SiteController */
 

$this->pageTitle=Yii::app()->name;
?>

<!--<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('admin/main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>-->


<?php
 
$page = "Admin Dashbaord";
$title = "Admin Dashboard";
 
$userType = "Admin";
?>

 

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

                <div class="clearfix"></div>

                    <div class="row">
                        <div class="span7">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <td>Adminstrators</td>
                                    <!--<td>12</td>-->
                                </tr>

                                <tr>
                                    <td>Pending Student Approval</td>
                                    <!--<td class="text-error">35</td>-->
                                </tr>

                                <tr>
                                    <td>Pending Teacher Approval</td>
                                    <!--<td class="text-error">10</td>-->
                                </tr>

                                <tr>
                                    <td>Courses</td>
                                    <!--<td>300</td>-->
                                </tr>

                                <tr>
                                    <td>Quiz</td>
                                    <!--<td>300</td>-->
                                </tr>

                                <tr>
                                    <td>News</td>
                                    <!--<td class="text-error">15</td>-->
                                </tr>

                                <tr>
                                    <td>Expired News</td>
                                    <!--<td class="text-error">200</td>-->
                                </tr>


                                </tbody></table>
                        </div>

                    </div>

                </div><!-- end col right-->
            </section>

        </div><!-- end row-->
    </div> <!--end container-->


 