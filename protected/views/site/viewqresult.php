<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Quiz Result';
$this->breadcrumbs=array(
	'Quiz Result',
    
);
$page = "Quiz Result";
$title = "Quiz Result";
?>

 
 

<div class="container">
    	<div class="row">

		<!--div class="span12">
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a><span class="divider">/</span></li>
				<li class="active"><?php// if(isset($page)) echo $page; ?></li>
			</ul>
		</div-->
        <!-- =========================Start Col left section ============================= -->





        
        <!-- =========================Start Col right section ============================= -->
		<section class="span6 offset3">
		<div class="col-right">
               <h4 class="text-center"><?php if(isset($page)) echo $page; ?></h4>
			<hr>

            <p class="text-error text-center"><i class="icon-ban-circle icon-2x"></i>
                
                <?php 
                 $result=$_GET['result'];
             
                //$result=$data[0]['result'];
                if($result== 'P')
                    
                { 
                    echo 'Congratulations Pass';
                }
                else
                {   
                    echo 'Fail Try Luck Next Time';
                }
        
                        ;?></p>
                    <hr class="clearfix">

		</div><!-- end col right-->
		</section>

       </div><!-- end row-->
</div><!-- end container-->
