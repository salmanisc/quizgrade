 <div id="toTop">Back to Top</div>


</div><!--page wrap sticky footer fix -->

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="span4" id="brand-footer">
                <p><img src="http://placehold.it/200x154" alt="" width="200" height="154"></p>
                <p>&#169; Copyright <?php echo date('Y'); ?> </p>

            </div>
            <div class="span4" id="contacts-footer">
                <h4>Newsletter</h4>
                <p>Donec adipiscing,scripta eruditi scriptorem et nam.</p>

                <div id="message-newsletter"></div>
                <form method="post"  action="http://www.ansonika.com/edu/assets/newsletter.php" name="newsletter" id="newsletter" class="form-inline">
                    <input name="email_newsletter" id="email_newsletter"  type="email" value="" placeholder="Your Email" >
                    <button  id="submit-newsletter" class=" button_medium" > Subscribe</button>
                </form>

                <div class="twitter"><a href="#" class="text-center">Follow on Twitter</a></div>
                <div class="fb"><a href="#" class="text-center">Follow on  Facebook</a></div>



            </div>
            <div class="span4" id="quick-links">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="#" >Admissions</a></li>
                    <li><a href="#" >Administration</a></li>
                    <li><a href="#" >Courses</a></li>
                    <li><a href="#" >Departments and Programs</a></li>
                    <li><a href="#" >Summer sessions</a></li>
                </ul>

            </div>

        </div>
    </div>

</footer>



<!-- End footer-->



<!-- DATEPICKER -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $('.datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        pick12HourFormat: false,   // enables the 12-hour format time picker
        pickSeconds: false,
        language: 'en'
    });
</script>
<!-- MEGAMENU -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/megamenu.js"></script>

<!-- OTHER JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/validate.js"></script>

<!-- FANCYBOX -->
<script  src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/jquery.fancybox.pack63b9.js?v=2.1.4" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/source/helpers/jquery.fancybox-media3447.js?v=1.0.5" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancy_func.js" type="text/javascript"></script>

<!-- STYLE SWITCHER -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/src/jquery-sticklr-1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#example-1').sticklr({
            animate         : true,
            showOn		    : 'hover'
        });
    });
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/src/fswit.js"></script>



