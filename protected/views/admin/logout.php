<?php
/* @var $this AdminController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Logout',
//    
//);
$page = "Logout";
$title = "Logout";
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

            <p class="text-error text-center"><i class="icon-ban-circle icon-2x"></i>You are now logged out</p>
                    <hr class="clearfix">

		</div><!-- end col right-->
		</section>

       </div><!-- end row-->
</div><!-- end container-->
