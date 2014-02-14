<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]-->
 
<head>
 
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title> Quiz Grading App<?php if(isset($title)) echo $title; ?></title>
    <meta name="description" content="EDU - Educational, College and Courses Boostrap based site template only 15$">
    <meta name="author" content="Ansonika">

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/img/apple-touch-icon-57x57-precomposed.html">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo Yii::app()->request->baseUrl; ?>/img/apple-touch-icon-144x144-precomposed.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/megamenu.css" rel="stylesheet">
    
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox63b9.css?v=2.1.4">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Jquery -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

    <!-- Support media queries for IE8 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>

    <!-- HTML5 and CSS3-in older browsers-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.17475.js"></script>

    <!--[if IE 7]>
    <link rel="stylesheet" href="font-awesome/css/font-awesome-ie7.min.css">
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
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/18d254ce/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/18d254ce/jquery.yiiactiveform.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<!--    <script type="text/javascript">
    setInterval(function(){<?php 
   //  $this->redirect(array('site/logout'));
    ?>
    },<?php// Yii::app()->session->timeout ?> *1000);
   </script>  -->
        
<!--    <script type="text/javascript">
       $(window).unload(function() 
        {
           $.ajax({
           url: "logout"
          
        });
        
        });
 
 
</script>-->

<!--<script type="text/javascript">
window.onbeforeunload = check;
 
function check()
{
   return "Are you sure you want to exit this page?";
}
 
 
 
</script>-->
    
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    
 
     
</head>

<body>
 <div class="page-wrap">   
<!-- [if !IE]><!--><script>if(/*@cc_on!@*/false){document.documentElement.className+=' ie10';}</script><!--<![endif]--> <!-- Border radius fixed IE10-->
<header>
    <div class="container">
        <div class="row">
            <div class="span4" id="logo"><a href="oldhtml/index.html"><img src="http://placehold.it/275x45" alt="Logo" width="275" height="45"></a></div>
            <div class="span8">

                <div id="phone" class="hidden-phone"><strong>+44 (0) 123 456 789 </strong>Admissions department</div>

                <div id="menu-top">
                    <ul>

                                <?php 
                                    if (isset(Yii::app()->session['user']))
                                    {    
                                         $isstudent=Yii::app()->session['isstudent'];
 
                                         if ( $isstudent==="1")
                                        
                                        {?>
                                        <li> <i class="icon-certificate"> <?php echo CHtml::link('Student Area',array('/site/student') ); ?> </i> </li>
                                        <?php }else{?>
                                        &nbsp;
                                        <li><i class="icon-certificate"> 
                                        <?php echo CHtml::link('Teacher Area',array('/site/teacher') ); ?>
                                        </i></li>
                                    <?php   
                                     }} ?>  
                            &nbsp;
                                <?php 
                                    if (!isset(Yii::app()->session['user'])) 
                                    {?>
                                    <li><i class="icon-user"> <?php echo CHtml::link('Login',array('/site/login') ); ?> </i></li>
                            &nbsp;
                                    <li><i class="icon-arrow-up"> 
                                    <?php echo CHtml::link('Sign Up',array('/site/signup') ); ?>
                                    </i></li>
                                <?php   
                                } ?>  
                            &nbsp;
                            <?php 
                            if (isset(Yii::app()->session['user'])) 
                            {?>
                            <li><i class="icon-ban-circle"> 
                            <?php echo CHtml::link('LogOut',array('/site/logout') ); ?>
                            </i></li>
                            <?php   

                            } ?>
                          
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>



<nav>
<div class="megamenu_container">
<a id="megamenu-button-mobile" href="#">Menu</a><!-- Menu button responsive-->

<!-- Begin Mega Menu Container -->
<ul class="megamenu">
<!-- Begin Mega Menu -->

<li><a href="#" class="drop-down">Courses</a>
    <!-- Begin Item -->
    <div class="drop-down-container">
        <div class="row">

            <div class="span3">
                <h4>Quick links</h4>
                <ul class="list-menu">
                    <li> 
                    <?php echo CHtml::link('All Courses',array('/site/allcourses')); ?>
                    </li>
                    
                    <li> 
                    <?php echo CHtml::link('Meet the Team',array('/site/staff')); ?>
                    </li>
                     
                    <li> 
                    <?php echo CHtml::link('About',array('/site/about')); ?>
                     </li>
                     <li> 
                     <?php echo CHtml::link('News',array('/site/news')); ?>
                     </li>
                     <li> 
                     <?php echo CHtml::link('Feedback',array('/site/feedback')); ?>
                     </li>
                </ul>
                <p><a href="oldhtml/all-courses.html" title="Courses" class="button_medium add-bottom-20">View all courses</a></p>
            </div>

            <div class="span9">
                <div class="row">
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Administration</a> (10)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Business</a> (08)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Communication</a> (05)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                </div><!-- End row -->

                <div class="row">
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Computing</a> (10)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Consueling</a> (08)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                    <div class="span3">
                        <h5><a href="#"><i class="icon-book"></i>Education</a> (05)</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/course-detail.html" class="button_red_small">Read more</a></p>
                    </div>
                </div><!-- End row -->

            </div><!-- End span9 -->
        </div><!-- End row -->
    </div><!-- End Item Container -->
</li><!-- End Item -->


<li><a href="#" class="drop-down">About</a>
    <!-- Begin Item -->
    <div class="drop-down-container">

        <div class="row">

            <div class="span3">
                <h4>Quick links</h4>
                <ul class="list-menu">
                     <li> 
                    <?php echo CHtml::link('All Courses',array('/site/allcourses')); ?>
                    </li>
                    
                    <li> 
                    <?php echo CHtml::link('Meet the Team',array('/site/staff')); ?>
                    </li>
                     
                    <li> 
                    <?php echo CHtml::link('About',array('/site/about')); ?>
                     </li>
                     <li> 
                     <?php echo CHtml::link('News',array('/site/news')); ?>
                     </li>
                     <li> 
                     <?php echo CHtml::link('Feedback',array('/site/feedback')); ?>
                     </li>
                </ul>
                <p><a href="oldhtml/all-courses.html" title="Courses" class="button_medium add-bottom-20">View all courses</a></p>
            </div>

            <div class="span9">
                <ul class="tabs">
                    <li><a class="active" href="#section-1">Staff</a></li>
                    <li><a href="#section-2">History</a></li>
                </ul>

                <ul class="tabs-content">

                    <li class="active" id="section-1">
                        <div class="row">

                            <div class="span3">
                                <p><img src="images/img/teacher-small.jpg" class="img-rounded shadow" alt=""></p>
                                <h5>Ms. Annie Ann <em>Management</em></h5>
                                <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                                <p><a href="oldhtml/staff.html" class="button_red_small" title="staff">Read more</a></p>
                            </div>

                            <div class="span3">
                                <p><img src="images/img/teacher-small-2.jpg" class="img-rounded shadow" alt=""></p>
                                <h5>Ms. Annie Ann <em>Business</em></h5>
                                <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                                <p><a href="oldhtml/staff.html" class="button_red_small" title="staff">Read more</a></p>
                            </div>

                            <div class="span3">
                                <p><img src="images/img/teacher-small-3.jpg" class="img-rounded shadow" alt=""></p>
                                <h5>Ms. Annie Ann <em>Administration</em></h5>
                                <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                                <p><a href="oldhtml/staff.html" class="button_red_small" title="staff">Read more</a></p>
                            </div>

                        </div><!-- End row -->
                    </li>

                    <li id="section-2">
                        <p class="lead ">An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui.</p>
                        <hr>

                        <div class="row">

                            <div class="span4">
                                <h5>History</h5>
                                <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                            </div>

                            <div class="span4">
                                <h5>Mission</h5>
                                <p>An utinam reprimique duo, putant mandamus cu qui. <strong>Autem possim his cu</strong>, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                            </div>

                        </div><!-- End row -->
                    </li>

                </ul><!-- End tabs-->
            </div><!-- End span9 -->

        </div><!-- End row -->
    </div><!-- End Item Container -->
</li><!-- End Item -->


<li><a href="#" class="drop-down">Contacts</a>
    <!-- Begin Item -->
    <div class="drop-down-container">

        <div class="row">

            <div class="span6">
                <iframe height="300" src="https://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=new+york&amp;sll=40.714353,-74.005973&amp;sspn=0.868126,2.422485&amp;ie=UTF8&amp;hq=&amp;hnear=New+York,+Stati+Uniti&amp;t=m&amp;z=10&amp;iwloc=A&amp;ll=40.714353,-74.005973&amp;output=embed">
                </iframe>
            </div>

            <div class="span6">
                <h4>Address</h4>
                <?php $sql = "SELECT  * FROM t_contact    
                        limit 1 ";
        
                $command = Yii::app()->db->createCommand($sql);
                $data = $command->queryAll();
                ?>
                <ul>
                    <li><i class="icon-home"></i><?php echo $data[0]['address'] ?></li>
                    <li><i class="icon-phone"></i> <?php echo $data[0]['phone'] ?></li>
                    <li><i class="icon-phone-sign"></i> <?php echo $data[0]['fax'] ?></li>
                    <li><i class="icon-envelope"></i> Email: <a href="#"><?php echo $data[0]['email'] ?></a></li>
                </ul>
                <br>
                <hr>

                <div class="row">

                    <div class="span3">
                        <h5>Questions?</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/contact.html" class="button_red_small">Read more</a></p>
                    </div>

                    <div class="span3">
                        <h5>Apply now</h5>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei.</p>
                        <p><a href="oldhtml/contact.html" class="button_red_small" title="Contact">Contact us</a></p>
                    </div>

                </div><!-- End row -->
            </div><!-- End Span6 -->
        </div><!-- End row-->
    </div><!-- End Item Container -->
</li><!-- End Item -->


</ul><!-- End Mega Menu -->





</div>


</nav>

<!-- header.php end -->




