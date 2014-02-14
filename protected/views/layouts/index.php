 

<div class="row">
    <div class="span12">
        &nbsp;
    </div>
</div>

 


    <div class="container">
        <div class="row">
            <aside class="span4 ">

                <div class="box-style-1 ribbon borders">

                    <div class="feat">
                        <i class="icon-group icon-3x"></i>
                        <h3>Expert teachers</h3>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
                    </div>

                    <hr class="double">

                    <div class="feat">
                        <i class="icon-film icon-3x"></i>
                        <h3>Video Courses</h3>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
                    </div>

                    <hr class="double">

                    <div class="feat">
                        <i class="icon-book icon-3x"></i>
                        <h3>Library</h3>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
                    </div>

                    <hr class="double">

                    <div class="feat last">
                        <i class="icon-laptop icon-3x"></i>
                        <h3>Online courses</h3>
                        <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. </p>
                    </div>

                </div>
                <p><a title="All courses" href="all-courses.html"><img class="img-rounded" alt="Banner" src="<?php echo Yii::app()->request->baseUrl; ?>/images/img/banner.jpg"></a></p>
            </aside>

            <section class="span8">
                 <div class="col-right">
                    <h2>Upcoming courses</h2>
                    <p>An utinam reprimique duo, putant mandamus cu qui. Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. Priaeque iuvaret nominati et, ad mea clita numquam. Maluisset dissentiunt et per, dico liber erroribus vis te. Dolor consul graecis nec ut, scripta eruditi scriptorem et nam.</p>
                    <hr>
                    <?php foreach($data as $key=>$val): ?>
                    <div class="strip-lessons">
                        <div class="row">
                            <div class="span2">
                                <div class="box-style-one borders"><img class="picture" alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/img/teacher-3.jpg"><h5>Lesson three</h5></div>
                            </div>
                            <div class="span5">
                                <h4><?php  echo $val['coursename'];?></h4>
                                <p><?php  echo $val['coursedesc'];?> </p>
                                <ul class="data-lessons">
                                    
                                    
                                    <li><i class="icon-time"></i>Duration: <?php   $datetime1 = new DateTime($val['startdate']);
                                            $datetime2 = new DateTime($val['enddate']);
                                            $interval = $datetime1->diff($datetime2);
                                            $week= $interval->format('%a');
                                            $week= $week/7;
                                            echo round($week,0).' weeks';
                                            ?></li>
                                    <li><i class="icon-film"></i><a href="http://www.youtube.com/watch?v=pgk-719mTxM" class="fancybox-media" rel="media-gallery">Play video</a></li>
                                     
                                </ul>
                            </div>
                        </div>
                    </div>  
                    <?php endforeach;?>
                    <p class="text-center"><a class="button_large" href="contact.html">View all courses </a></p>
             </div>  
            </section>
        </div>
    </div>

 
