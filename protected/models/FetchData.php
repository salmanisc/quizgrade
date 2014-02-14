<?php

class FetchData extends CFormModel
{
    
    public function viewassign()
    {
         $username=Yii::app()->session['user'];
		// display the assignment form
                $sql = "SELECT  assign.assignname,t_program.progname,
                        t_firstprogram.fistprogname,assign.startdate,assign.enddate
                        FROM t_assignment as assign
                        
                        join t_program on 
                        t_assignment.progid=t_program.progid    
                        
                        join t_firstprogram on 
                        t_assignment.progid=t_firstprogram.progid  and 
                        t_assignment.firstprogid=t_firstprogram.firstprogid  
                WHERE  t_assignment.username =  '$username'";
        
        
    }
}
?>
