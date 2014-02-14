<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head-->



	<div id="header">
		<?php 
                Yii::import('application.views.admin.*');
                include_once 'layouts/header1.php'; 
               // include_once 'layouts/controlbar.php'; 
                ?>
	</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
 
                <?php 
                Yii::import('application.views.admin.*');
                include_once 'layouts/footer1.php'; 
                ?>
	</div><!-- footer -->

<!--/div--><!-- page -->

</body>
</html>
