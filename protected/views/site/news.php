 
<?php
/* @var $this SiteController */
/* @var $model NewsForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Latest News';
$this->breadcrumbs = array(
    'Latest News',
);
$page = "Latest News";
$title = "Latest News";

?>


<?php if (Yii::app()->user->hasFlash('news')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('news'); ?>
    </div>

<?php else: ?>


    <div class="container">
        <div class="row">

         

            <!-- =========================Start Col left section ============================= -->
            <aside class="span4 ">
                <div class="col-left">
                    <h3>Search news</h3>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'news-form',
                        'enableAjaxValidation' => true,

                    )); ?>
                         <?php echo $form->textField($model, 'news', array('class' => "",'value'=>'', 'placeholder' => "Search News",'maxlength'=>100)); ?>
                        <button class="btn btn-info" type="submit">Search</button>
                    <?php $this->endWidget(); ?>
                    <hr>
                    <h3>Latest news</h3>
                   
                    <div class="widget">
                        <ul class="latest_news">
                            
                             <?php   isset($datan) ? $datan : $datan=$data;
                                    foreach($datan as $key=>$val): 
                                 ?>
                              <?php if ($key<=1){ ?>
                             <li><i class="icon-calendar-empty"></i> <?php 
                                        $startdate = $val['fromdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d M ,Y');
                                         echo $startdate;
                                   ?> <div><a href="#"><?php  echo $val['newstitle'];?> </a></div></li>
                              <?php } ?>
                              <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="box-style-1 ribbon borders">
                    <span class="date"><i class="icon-calendar-empty"></i> 25 June 2013</span>
                    <h4><a href="#">Athletics program exceeding</a></h4>
                    <p>Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. </p>
                </div>


                <div class="box-style-1 borders">
                    <span class="date"><i class="icon-calendar-empty"></i> 25 June 2013</span>
                    <h4><a href="#">Native American documentary</a></h4>
                    <p>Autem possim his cu, quodsi nominavi fabellas ut sit, mea ea ullum epicurei. Saepe tantas ocurreret duo ea, has facilisi vulputate an. </p>
                </div>

            </aside>

            <!-- =========================Start Col right section ============================= -->
            <section class="span8">
                <div class="col-right">
                    <p class="lead">An utinam reprimique duo, putant mandamus cu qui. Priaeque iuvaret nominati et, ad mea clita numquam. Maluisset dissentiunt et per, dico liber erroribus vis te. Dolor consul graecis nec ut, scripta eruditi scriptorem et nam.</p>

                    <hr>

                    <div class="news-strip">
                        <ul>
                             <?php foreach($data as $key=>$val): ?>
                             <li class="row">
                                <div class="date-news"><strong>
                                <?php 
                                        $startdate = $val['fromdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('d');
                                         echo $startdate;
                                 ?></strong>
                                <?php 
                                        $startdate = $val['fromdate'];
                                        $startdate = new Datetime($startdate);
                                        $startdate= $startdate->format('M Y');
                                         echo $startdate;
                                 ?>
                                </div>
                                <div class="span6">
                                    <h5><a href="#"><i class="icon-file"></i> <?php  echo $val['newstitle'];?> </a></h5>
                                    <p> <?php  echo $val['news'];?> </p>
                                </div>
                            </li>

                            
                          <?php endforeach;?>
                        </ul>
                         
                    </div>

                    <hr>
                    <div class="pagination pagination-centered">
                        <ul>
                     <?php 
                
                         $this->widget('CLinkPager', array(
                            'header' => '',
                            'firstPageLabel' => '&lt;&lt;',
                            'prevPageLabel' => '&lt;',
                            'nextPageLabel' => '&gt;',
                            'lastPageLabel' => '&lt;&lt;',
                            'pages' => $pages,
                        ));
                            
                             ?>


                        </ul>
                    </div><!-- end pagination-->

                </div>

            </section>

        </div><!-- end row-->
    </div>

    <?php endif; ?>

 