<aside class="span4">
   
    
<div class="col-left">
    
<?php 
$isstudent=Yii::app()->session['isstudent'];

if ( $isstudent==="1")  {?> 

<div id="student_control">
     
        <h3>Student Actions</h3>
 


       <div style="display: none;">
            <a href="#" class="accrodian-trigger">spacer</a>
            <div class="accrodian-data" style="display: none;">&nbsp;</div>
        </div>

        <a href="#" class="accrodian-trigger">Courses</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
                <li> 
                 <?php echo CHtml::link('View Applied Courses',array('/site/viewappcor')); ?>
                </li>
                <li> 
                 <?php echo CHtml::link('View All Courses',array('/site/index')); ?>
                </li>

            </ul>
        </div>

        <a href="#" class="accrodian-trigger">Quiz</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
                <li> 
                <?php echo CHtml::link('Due Quiz',array('/site/duequiz')); ?>
                </li>    
            </ul>
        </div>

        <a href="#" class="accrodian-trigger">Assigment</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
                <li> 
                 <?php echo CHtml::link('Due Assignments',array('/site/dueassign')); ?>
                </li>    
            </ul>
        </div>
        
        <a href="#" class="accrodian-trigger">Results</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
                <li> 
                <?php echo CHtml::link('View Result',array('/site/viewresult')); ?>
                </li>    
            </ul>
        </div>

</div> <!--teacher control-->
    
 <!-- teacher control -->
<?php  }else{?>
 

    <div id="teacher_control">

        <h3>Teacher Actions</h3>
        
        
             <div style="display: none;">
        <a href="#" class="accrodian-trigger">spacer</a>
        <div class="accrodian-data" style="display: none;">
            &nbsp;
        </div>
    </div>


    <a href="#" class="accrodian-trigger">Courses</a>
    <div class="accrodian-data" style="display: none;">
        <ul>
            <li> 
                    <?php echo CHtml::link('New Course',array('/site/addcourse')); ?>
            </li> 
            <li> 
                    <?php echo CHtml::link('View Courses',array('/site/viewcourse')); ?>
            </li> 
        </ul>
    </div>

        <a href="#" class="accrodian-trigger">Quiz</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
                <li> 
                 <?php echo CHtml::link('New Quiz',array('/site/addquiz')); ?>
                </li>
                 
                <li>
                    <?php echo CHtml::link('View Quiz',array('/site/viewquiz')); ?>
                </li>    
            </ul>
        </div>
        <a href="#" class="accrodian-trigger">Assigment</a>
        <div class="accrodian-data" style="display: none;">
            <ul>
               <li> 
                    <?php echo CHtml::link('New Assignment',array('/site/addassign')); ?>
               </li>
               <li> 
                    <?php echo CHtml::link('View Assignment',array('/site/viewassign')); ?>
               </li>
                

            </ul>

        </div>

        <a href="#" class="accrodian-trigger">Course Lessons</a>
        <div class="accrodian-data" style="display: none;">

        <ul>
               <li> 
                    <?php echo CHtml::link('Add Lesson',array('/site/addlesson')); ?>
               </li>
               <li> 
                    <?php echo CHtml::link('View Lessons',array('/site/viewlesson')); ?>
               </li>
            <li><a href="add_video.php">Youtube videos</a></li>

        </ul>

    </div>
 
<!--<aside class="span4">
 <div class="col-left" <?php// if (Yii::app()->session['isstudent']="0") {?>>-->
</div>

 <?php }?>
    </div><!--col-left-->

</aside>
