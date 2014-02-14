<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grading Application</title>
    <meta name="description" content="EDU - Educational, College and Courses Boostrap based site template only 15$">
    <meta name="author" content="Ansonika">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    -->
<!--    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/cssadmin/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/cssadmin/style.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/18d254ce/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/18d254ce/jquery.yiiactiveform.js"></script>-->

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/megamenu.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet"> 

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admincss.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox63b9.css?v=2.1.4">


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Jquery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

    <!-- Support media queries for IE8 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>

    <!-- HTML5 and CSS3-in older browsers-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.17475.js"></script>

    <!-- jquery validdte plugin -->

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js"></script>
    <script type="text/javascript">
       $(window).unload(function() 
        {
           $.ajax({
           url: "logout"
          
        });
        //alert( 'ss');
        });
 
</script>

    <!--[if IE 7]>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->

    <!-- Style switcher-->
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php echo Yii::app()->request->baseUrl; ?>/src/jquery-sticklr-1.4-light-color.css" >
    <!-- Fonts-->
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/helvetica.css" title="helvetica" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/cabin.css" title="cabin" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/droid.css" title="droid" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/lato.css" title="lato" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/montserrat.css" title="montserrat" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/opensans.css" title="opensans" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/quattrocento.css" title="quattrocento" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/roboto.css" title="roboto" media="all">
    <link rel="alternate stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/src/css/robotoslab.css" title="robotoslab" media="all">




</head>
<body>
<div class="page-wrap">
<!--[if !IE]><!--><script>if(/*@cc_on!@*/false){document.documentElement.className+=' ie10';}</script><!--<![endif]--> <!-- Border radius fixed IE10-->


<header>
    <div class="container">
        <div class="row">
            <div class="span4" id="logo"><a href="index.php"><img src="http://placehold.it/275x45" alt="Logo" width="275" height="45"></a></div>
            <div class="span8">

                <div id="menu-top">
                    <ul>
                        
                        
                        <li><i class="icon-gears icon-2x text-success"></i>
                            <!--<a href="index.php" title="Admin Dashbaord">Admin Area</a>-->
                             <?php 
                                    if (!isset(Yii::app()->session['user'])) 
                                    {?>
                                    <li><small><i class="icon-user"> <?php echo CHtml::link('Login',array('/admin/login'),array('class'=>"nodrop-down")); ?> </i></small></li>
                                    <?php }else{?>
                                    &nbsp;
                                    <li><i class="icon-arrow-up"> 
                                    <?php echo CHtml::link('Admin Area',array('/admin/index'),array('class'=>"nodrop-down")); ?>
                                    </i></li>
                                <?php   
                                } ?>  
                            &nbsp;
                            &nbsp;
                        <li>
                            <i class="icon-ban-circle icon-2x text-error"></i>
                            <?php echo CHtml::link('LogOut',array('/admin/logout')); ?>
                            
                           </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>


<nav>
&nbsp;
</nav>

<!-- header.php end -->
