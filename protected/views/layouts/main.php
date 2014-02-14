<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
	<!--<title>//<?php// echo CHtml::encode($this->pageTitle); ?></title>-->
 

<!--body-->

<!--div class="container" id="page"-->

	<!--<div id="header">-->
		<?php 
                Yii::import('application.views.*');
                include_once 'layouts/header.php'; 
                ?>
	<!--</div> header -->

	<!--div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
                                array('label'=>'Teacher Signup', 'url'=>array('/site/tsignup')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));*/ ?>
	</div><!-- mainmenu -->
	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/?>

	<?php echo $content; ?>

<!--	<div class="clear"></div>-->

	<!--<div id="footer">-->
 
                <?php 
                Yii::import('application.views.*');
                include_once 'layouts/footer.php'; 
                ?>
	<!--</div> footer -->

<!--/div--><!-- page -->


</body>


</html>