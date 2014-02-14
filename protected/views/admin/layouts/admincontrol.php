<!-- =========================Start Col left section ============================= -->
<aside class="span4">
    <div class="col-left">

        <div id="student_control">
            <h3>Admin Actions</h3>

            <div style="display: none;">
                <a class="accrodian-trigger active" href="#">Courses</a>
                <div style="" class="accrodian-data">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu
                    </p>
                </div>
            </div>
            <a class="accrodian-trigger" href="#">Users</a>
            <div style="display: none;" class="accrodian-data">

                <ul class="list_2">
                    <li> 
                    <?php echo CHtml::link('Approve Student',array('/admin/aprvstudent')); ?>
                    </li>
                    
                    <li> 
                    <?php echo CHtml::link('Approve Teacher',array('/admin/aprvteacher')); ?>
                    </li>

                </ul>

            </div>
            <a class="accrodian-trigger" href="#">Department</a>
            <div style="display: none;" class="accrodian-data">

                <ul class="list_2">
                    <li> 
                    <?php echo CHtml::link('Add Deparment',array('/admin/depart')); ?>
                    </li>

                </ul>
            </div>


            <a class="accrodian-trigger" href="#">Categories</a>
            <div style="display: none;" class="accrodian-data">
                <ul class="list_2">
                    <li> 
                    <?php echo CHtml::link('Add Categories',array('/admin/courses')); ?>
                    </li>
                    <li> 
                    <?php echo CHtml::link('Add Schools',array('/admin/school')); ?>
                    </li>
                </ul>
            </div>



            

            <a class="accrodian-trigger" href="#">News</a>
            <div style="display: none;" class="accrodian-data">
                <ul class="list_2">
                     
                    <li> 
                    <?php echo CHtml::link('Add News',array('/admin/addnews')); ?>
                    </li>
                    <li> 
                    <?php echo CHtml::link('View News',array('/admin/viewnews')); ?>
                    </li>
                </ul>
            </div>




            <a class="accrodian-trigger" href="#">Contact us</a>
            <div style="display: none;" class="accrodian-data">
                <ul class="list_2">
                    <li> 
                    <?php echo CHtml::link('Contact us',array('/admin/contact')); ?>
                    </li>
                </ul>
            </div>



        </div> <!--Admin control-->

    </div><!--col-left-->

</aside>