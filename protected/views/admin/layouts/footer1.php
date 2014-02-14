
<div id="toTop">Back to Top</div>


</div><!--page wrap sticky footer fix -->

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="span12">
                <p class="text-center text-info">&#169; Copyright <?php echo date('Y'); ?> </p>
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
<script type="text/javascript" src="../src/jquery-sticklr-1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#example-1').sticklr({
            animate         : true,
            showOn		    : 'hover'
        });
    });
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script>
 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/src/fswit.js"></script>


</body>
</html>