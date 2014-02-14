<?php
/* @var $this SiteController */
/* @var $model ViewForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Student Area';
$this->breadcrumbs = array(
    '           ',
);
$page = "Student Area";
$title = "Student Area";

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

                    <h5>Profile Information</h5>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="span7">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Name </td>
                                    <td class="text-info">
                                    <?php 
                                        echo CHtml::encode($data["fullname"]);
                                    ?>   
                                    </td>
                                </tr>
                                <tr>
                                    <td>Registered Since</td>
                                    <td class="text-info">
                                    <?php 
                                     $datejoin=new DateTime($data["cruddate"]);
                                     $datejoin=$datejoin->format('d-M-Y');
                                     
                                        echo CHtml::encode($datejoin);
                                    ?>    
                                    </td>
                                </tr>

                                <tr>
                                    <td>Current Level</td>
                                    <td class="text-info">
                                        <?php 
                                        echo CHtml::encode($data["progname"]);
                                    ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td >Semster</td>
                                    <td class="text-info">
                                    <?php 
                                        echo CHtml::encode($data["firstprogname"]);
                                    ?></td>
                                </tr>

<!--                                <tr>
                                    <td>Field</td>
                                    <td> 
                                    <?php 
                                       var_dump($data);
                                    ?></td>
                                </tr>-->


                                </tbody></table>
                        </div>

                    </div>

                </div><!-- end col right-->
            </section>
        </div><!-- end row-->
    </div><!-- end container-->


 