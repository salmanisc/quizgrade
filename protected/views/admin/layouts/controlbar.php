<!--control bar stars -->
<div id="control-bar" class="left">
    <h5>Users</h5>

    <ul>
        <li><?php echo CHtml::link('Students',array('/admin/aprv_student')); ?></li>
        <li><a href="teacher.php">Teachers</a></li>
    </ul>
<hr>
    <h5>Department </h5>

    <ul>
        <li><a href="departments.php">Department</a></li>
    </ul>
<hr>
    <h5>Course Categories</h5>
    <ul>
        <li><a href="#">Parent</a></li>
        <li><a href="#">Child</a></li>
    </ul>

    <hr>
 &nbsp;
 <i class="icon-ban-circle">
  <?php echo CHtml::link('Login',array('/admin/adminlogin'),array('class'=>"btn btn-info btn-small")); ?>
 </i> 
  

</div> <!--left control bar-->