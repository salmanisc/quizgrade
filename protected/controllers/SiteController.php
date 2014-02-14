<?php

class SiteController extends CController {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //echo Yii::app()->session['user']	;
        //unset(Yii::app()->session['user']);
        $model = new Courses;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'index') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        $cruddate = date("Y-m-d");


        $pagesize = Yii::app()->params['listPerPage'];
        isset($_GET['page']) ? $pageno = $_GET['page'] - 1 : $pageno = 1;

        (!isset($_GET['page'])) ? $lowerlimit = 0 : $lowerlimit = $pagesize * $pageno;

        (!isset($_GET['page'])) ? $upperlimit = $pagesize : $upperlimit = $pagesize * $pageno;




        $criteria = new CDbCriteria();
        $criteria->select = "distinct  t.courseid,t.coursename,
                t.startdate,t.enddate,
                t.coursedesc,t.courseid,t.coursecode,t.coursepic  ";

        $criteria->join = " join t_user on t.userid=t_user.userid ";
        $criteria->condition = "startdate<='$cruddate' and  enddate>= '$cruddate' order by startdate DESC limit $lowerlimit,$upperlimit";





        $criteriac = new CDbCriteria();
        $criteriac->select = "distinct t.courseid ";
        $criteriac->condition = "startdate<='$cruddate' and  enddate>= '$cruddate'   ";

        $datac = $model->findAll($criteriac);
        $data = $model->findAll($criteria);

        $item_count = $model->count($criteriac);

        $pages = new CPagination($item_count);
        $pages->setPageSize($pagesize);
        $pages->applyLimit($criteria);  // the trick is here!

        $this->render('index', array('model' => $model, 'data' => $data, 'pages' => $pages));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionStaff() {
        $this->render('staff');
    }

    public function actionAbout() {
        $this->render('about');
    }

    public function actionAddlesson() 
    {
        
        $this->checksession();
        if (!isset(Yii::app()->session['user'])) {
            $this->render('index');
            Yii::app()->end();
        }

        $model = new AddLessonForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'addlesson-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['AddLessonForm'])) {

            $model->attributes = $_POST['AddLessonForm'];
            $userid = Yii::app()->session['user'];

            if ($model->validate()) 
            {
                
                 
         

                $model->lessonfile = CUploadedFile::getInstance('AddLessonForm', 'lessonfile');

                $fileName = CUploadedFile::getInstance('AddLessonForm', 'lessonfile');
                 
                
                if (isset($fileName)) {
                    
                    $courseid=$_POST['coursename'];
                    $sql = "SELECT t.coursecode from t_courses t where t.courseid= $courseid";
                    $command = Yii::app()->db->createCommand($sql);
                    $data = $command->queryRow();
                 
                    $coursecode = $data['coursecode'];

                    $path = dirname(Yii::app()->request->scriptFile);



                    if (!is_dir($path . '/courses/' . $coursecode.'/lessons')) {
                        mkdir($path . '/courses/' . $coursecode.'/lessons');
                    }

//                if (!is_dir(Yii::app()->basePath . '/upload/' . $codeno)) {
//                    mkdir(Yii::app()->basePath . '/upload/' . $codeno);
//                }


                    $user = Yii::app()->session['user'];


                    //$fileName->saveAs(Yii::app()->basePath . '/upload/' . $codeno . $fileName);
                    
                    
                    $fileName->saveAs($path . '/courses/' . '/' . $coursecode . '/'. '/lessons/' . '/' .  $fileName);
                }


                $model->userid = $userid;

                $model->lessonname = $model->lessonname;
                $model->lessondesc = $model->lessondesc;
                $model->lessonfile = $fileName;
                
                $model->courseid = $_POST['coursename'];  
                
                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;
                $model->crudby = '';

                if ($model->save())
                    $this->redirect(array('site/viewlesson'));
            }
        }
 
        $this->render('addlesson',array('model'=>$model));
    }
  
        public function actionViewlesson() {
        $this->checksession();
        $username = Yii::app()->session['user'];

        // display the assignment form
        $sql = "SELECT  distinct assign.lessonname,
                        assign.courseid,
                        assign.lessonfile,
                        t_program.progname,
                        assign.cruddate 
                        FROM t_lesson as assign
                        
                        join t_program on 
                        assign.courseid=t_program.progid    
                        
                         
                WHERE  assign.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewlesson', array('data' => $data));
    }
    public function actionAllcourses()
    {
        $pagesize = Yii::app()->params['listPerPage'];
        $model=new Courses();
        
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'allcourses') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        $cruddate = date("Y-m-d");


        $pagesize = Yii::app()->params['listPerPage'];
        isset($_GET['page']) ? $pageno = $_GET['page'] - 1 : $pageno = 1;

        (!isset($_GET['page'])) ? $lowerlimit = 0 : $lowerlimit = $pagesize * $pageno;

        (!isset($_GET['page'])) ? $upperlimit = $pagesize : $upperlimit = $pagesize * $pageno;

        
        if((!isset($_GET['progid'])))  
        {

        $criteria = new CDbCriteria();
        $criteria->select = "distinct  t.courseid,t.coursename,
                t.startdate,t.enddate,
                t.coursedesc,t.courseid,t.coursecode,t.coursepic  ";

        $criteria->join = " join t_user on t.userid=t_user.userid ";
        $criteria->condition = "startdate<='$cruddate' and  enddate>= '$cruddate' order by startdate DESC limit $lowerlimit,$upperlimit";
        }
        else
        {
            $progid=$_GET['progid'];
        $criteria = new CDbCriteria();
        $criteria->select = "distinct  t.courseid,t.coursename,
                t.startdate,t.enddate,
                t.coursedesc,t.courseid,t.coursecode,t.coursepic  ";

        $criteria->join = " join t_user on t.userid=t_user.userid ";
        $criteria->condition = " t.progid=$progid and startdate<='$cruddate' and  enddate>= '$cruddate' order by startdate DESC limit $lowerlimit,$upperlimit";
            
        }
        
         
        $data = $model->findAll($criteria);
        
        $item_count = $model->count($criteria);
         
        
        $sql = "SELECT distinct t.progid,t.progname,
        if(length(count(t_courses.courseid))>2,count(t_courses.courseid),lpad(count(t_courses.courseid),2,0)) as totalcourse  
        from t_program t  left join t_courses on 
        t.progid=t_courses.progid
        group by t.progid order by progname ASC";

        $command = Yii::app()->db->createCommand($sql);
        $dataq = $command->queryAll();
        
        

        $pages = new CPagination($item_count);
        $pages->setPageSize($pagesize);
        $pages->applyLimit($criteria);  // the trick is here!
 
         
        $this->render('allcourses', array('model' => $model, 'data' => $data, 'dataq' => $dataq,'pages' => $pages));
        
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        if (!isset(Yii::app()->session['user'])) {
            $this->render('index');
            Yii::app()->end();
        }
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    //Teacher Submit assignment function
    public function actionAddcourse() {
        $this->checksession();
        if (!isset(Yii::app()->session['user'])) {
            $this->render('index');
            Yii::app()->end();
        }

        $model = new AddCourseForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'addcourse-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['AddCourseForm'])) {

            $model->attributes = $_POST['AddCourseForm'];
            $userid = Yii::app()->session['user'];

            if ($model->validate()) {

                $model->coursepic = CUploadedFile::getInstance('AddCourseForm', 'coursepic');

                $filename = $model->coursepic;
                $fileName = CUploadedFile::getInstance('AddCourseForm', 'coursepic');
                // echo $filename;
                //die();
                if (isset($model->coursepic)) {

                    $coursecode = $model->coursecode;

                    $path = dirname(Yii::app()->request->scriptFile);


                    if (!is_dir($path . '/courses/' . $coursecode)) {
                        mkdir($path . '/courses/' . $coursecode);
                    }

//                if (!is_dir(Yii::app()->basePath . '/upload/' . $codeno)) {
//                    mkdir(Yii::app()->basePath . '/upload/' . $codeno);
//                }


                    $user = Yii::app()->session['user'];


                    //$fileName->saveAs(Yii::app()->basePath . '/upload/' . $codeno . $fileName);
                    $fileName->saveAs($path . '/courses/' . '/' . $coursecode . '/' . $fileName);
                }

                $model->userid = $userid;

                $model->coursecode = $model->coursecode;
                $model->coursepic = $fileName;
                $model->coursename = $model->coursename;
                $model->coursedesc = $model->coursedesc;


                $model->progid = $_POST['progname']; //$model->progname;//
                $model->firstprogid = $_POST['programtype'];
                $fromdate = $model->fromdate;
                $fromdate = new Datetime($fromdate);
                $fromdate = $fromdate->format('Y-m-d');
                $model->startdate = $fromdate;


                $duedate = $model->duedate;
                $duedate = new Datetime($duedate);
                $duedate = $duedate->format('Y-m-d');

                $model->enddate = $duedate;

                $cruddate = date("Y-m-d");
                $model->totalpoint = $model->totalpoint;
                $model->cruddate = $cruddate;
                $model->crudby = '';

                if ($model->save())
                    $this->redirect(array('site/viewcourse'));
            }
        }
        $this->render('addcourse', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $userid = Yii::app()->session['user'];
                $cruddate = date("Y-m-d H:i:s");
//            
                //var_dump($userid );
                //die();
//                $model->userid = $userid;
//                $model->isloggedin = 1;
//                $model->logintime = $cruddate;
//                $model->setisNewRecord(false);
//     
//                if ($model->update()) 
//                {
                $sql = "update  `t_user` set isloggedin=1,logintime= '$cruddate'                     
                 WHERE   userid =  '$userid'";

                $command = Yii::app()->db->createCommand($sql);
                $command->execute();



                $isstudent = Yii::app()->session['isstudent'];

                if ($isstudent === "1")
                    $this->redirect(array('site/student', 'username' => $model->email));
                else
                    $this->redirect(array('site/teacher', 'username' => $model->email));
            }
        }
        // display the login form

        $this->render('login', array('model' => $model));
    }

    //Teacher Signup Form  
    public function actionTsignup() {



        $model = new TsignupForm;


        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'signup-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
        // collect user input datas

        if (isset($_POST['TsignupForm'])) {

            $model->attributes = $_POST['TsignupForm'];
            if ($model->validate())
                $cruddate = date("Y-m-d");

            // echo $pass;
            $model->fullname = $model->fullname;
            $model->phoneno = $model->phoneno;
            $model->departid = $model->departname;
            $model->username = $model->email;
            $model->password = $model->encode($model->password);
            $model->isstudent = 0;
            $model->isadmin = 0;
            $model->cruddate = $cruddate;
            if ($model->save())
                $this->redirect(array('site/index'));
        }
        // display the teacher signup form


        $this->render('tsignup', array('model' => $model));
    }

    //Student Signup Form 
    public function actionSsignup() {


        $model = new SsignupForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sstuent-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['SsignupForm'])) {

            $model->attributes = $_POST['SsignupForm'];

            if ($model->validate()) {
                //$password = UserIdentity::encode($model->password);
                //echo $model->progname;
                $model->codeno = $model->codeno;
                $model->fullname = $model->fullname;
                $model->phoneno = $model->phoneno;
                //$model->progid = $_POST['progname']; //$model->progname;//
                //$model->firstprogid = $_POST['programtype'];
                $model->address = $model->address;
                $model->username = $model->email;

                $model->password = $model->encode($model->password);
                $model->isstudent = 1;
                $model->isadmin = 0;
                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;

                if ($model->save())
                    $this->redirect(array('site/index'));
            }
        }

        $this->render('ssignup', array('model' => $model));
    }

    //Teacher Submit assignment function
    public function actionforget() {
        $model = new ForgetForm;


        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'forget-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['ForgetForm'])) {

            $model->attributes = $_POST['ForgetForm'];
            if ($model->validate())
            //$model->save();
            //$this->redirect(Yii::app()->user->returnUrl);
                Yii::app()->user->setFlash('forget', 'Please check your email . We send the forget password to you.');
            $this->refresh();
        }

        // display the login form

        $this->render('forget', array('model' => $model));
    }

    public function actionViewappcor() {
        $this->checksession();
        $userid = Yii::app()->session['user'];

        // display the assignment form
        $sql = "SELECT  distinct t.courseid,t_courses.coursename,
                 t_program.progname,t.cruddate,
                t.progid,t.firstprogid from t_coursesapp t 

                join t_courses on 
                t.courseid=t_courses.courseid 
                
                join t_program on 
                t.progid=t_program.progid    

                join t_firstprogram on 
                t.progid=t_firstprogram.progid  and 
                t.firstprogid=t_firstprogram.firstprogid  
        
                where 
                t.userid =  $userid";

        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewappcor', array('data' => $data));
    }

    // display the couse details
    public function actionCourses() {

        $courseid = $_GET['courseid'];
        $sql = "SELECT  distinct t.courseid,t.coursename,t.coursepic,
                t.startdate,t.enddate,t.coursecode,
                t.coursedesc,t_program.progname,
                t.progid,t.firstprogid from t_courses t 

                join t_program on 
                t.progid=t_program.progid    

                join t_firstprogram on 
                t.progid=t_firstprogram.progid  and 
                t.firstprogid=t_firstprogram.firstprogid  
        
                where 
                t.courseid =  $courseid";

        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryRow();

          
        
        //source add

        $model = new ApplyCourse;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'courses-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

 

        if (isset($_POST['ApplyCourse'])) {


            $userid = Yii::app()->session['user'];

            if (!isset($userid)) {
                $this->redirect(array('site/login'));
            } else {
                $model->attributes = $_POST['ApplyCourse'];

                if ($model->validate()) {

                    $userid = $userid;

                    $model->userid = $userid;
                    $model->courseid = $courseid;
                    $model->progid = $model->progid; //$model->progname;//
                    $model->firstprogid = $model->firstprogid;
                    $cruddate = date("Y-m-d");
                    $model->cruddate = $cruddate;

                    $criteria = new CDbCriteria;
                    $criteria->select = "(userid) as userid ";
                    $criteria->condition = "courseid=$courseid and userid='$userid'";

                    $row = $model->find($criteria);
                    $resultid = $row['userid'];

                    if ($resultid !== null) {

                        $model->setIsNewRecord(false);
                        $model->update();
                        $this->redirect(array('site/viewappcor'));
                    } else {

                        $model->save();
                        //$resultid = Yii::app()->db->getLastInsertID();
                        $this->redirect(array('site/viewappcor'));
                    }
                }
            }
            //source add       
        }
        $sql = "SELECT distinct t.progid,t.progname,
        if(length(count(t_courses.courseid))>2,count(t_courses.courseid),lpad(count(t_courses.courseid),2,0)) as totalcourse  
        from t_program t  left join t_courses on 
        t.progid=t_courses.progid
        group by t.progid order by progname ASC";

        $command = Yii::app()->db->createCommand($sql);
        $dataq = $command->queryAll();      
        $this->render('courses', array('model' => $model, 'data' => $data,'dataq'=>$dataq));
    }

    public function actionsignup() {
        // display the login form

        $this->render('signup');
    }

    public function actionTeacher() {
        $this->checksession();
        $username = Yii::app()->session['user'];
        // display the login form
        $sql = "SELECT t_user.fullname,t_user.cruddate,t_department.departname FROM t_user  
                        join t_department on 
                        t_user.departid=t_department.departid                        
                WHERE  t_user.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryRow();
        //var_dump($data);
        $this->render('teacher', array('data' => $data));
    }

    public function actionStudent() {
        $this->checksession();
        $username = Yii::app()->session['user'];
        // display the login form
        $sql = "SELECT t_user.fullname,t_user.cruddate,
                       t_user.phoneno,t_user.address     
                        FROM t_user  
                        
                        
                        
                         
                WHERE  t_user.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryRow();
        // var_dump($data);
        $this->render('student', array('data' => $data));
    }

    public function actionviewassign() {
        $this->checksession();
        $username = Yii::app()->session['user'];

        // display the assignment form
        /* $sql = "SELECT  distinct assign.assignname,
          assign.progid,assign.firstprogid,
          assign.assignid,
          t_program.progname,
          t_firstprogram.firstprogname,assign.startdate,assign.enddate
          FROM t_assignment as assign

          join t_program on
          assign.progid=t_program.progid

          join t_firstprogram on
          assign.progid=t_firstprogram.progid  and
          assign.firstprogid=t_firstprogram.firstprogid
          WHERE  assign.userid =  '$username'"; */
        $sql = "SELECT  distinct assign.assignname,
                        assign.assignid,
                        assign.courseid,assign.firstprogid,
                        t_courses.coursename,
                        assign.startdate,assign.enddate
                        FROM t_assignment as assign
                        
                        join t_courses on 
                        assign.courseid=t_courses.courseid    
                        
                          
                WHERE  assign.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewassign', array('data' => $data));
    }

    //View Teacher Courses
    public function actionViewcourse() {
        $this->checksession();
        $username = Yii::app()->session['user'];

        // display the assignment form
        $sql = "SELECT  distinct assign.coursename,
                        assign.progid,assign.firstprogid,
                        assign.courseid,
                        t_program.progname,
                        t_firstprogram.firstprogname,assign.startdate,assign.enddate
                        FROM t_courses as assign
                        
                        join t_program on 
                        assign.progid=t_program.progid    
                        
                        join t_firstprogram on 
                        assign.progid=t_firstprogram.progid  and 
                        assign.firstprogid=t_firstprogram.firstprogid  
                WHERE  assign.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewcourse', array('data' => $data));
    }

    //Student result
    public function actionviewresult() {
        $this->checksession();
        $username = Yii::app()->session['user'];

        // display the assignment form
        $sql = "SELECT  distinct ifnull(assign.assignname,'') as assignname,
                        assign.courseid,
                        t_courses.coursename,
                        assign.startdate,assign.enddate,
                        t_result.result,t_result.score 
                        FROM t_result 
                        
                        inner join t_assignment as assign on
                        t_result.resultid=assign.assignid
                        and t_result.type='A'
                        
                        join t_courses on 
                        assign.courseid=t_courses.courseid    
                        
 
                        WHERE  t_result.suserid  =  '$username'
                
                union all
                SELECT  distinct ifnull(t_quiz.quizname,'') as assignname,
                        t_quiz.courseid,
                        t_courses.coursename,
                        t_quiz.startdate,t_quiz.enddate,
                        case 
                        when t_result.result = 'P' then 'Pass'
                        when t_result.result = 'F' then 'Fail'
                        end as result,t_result.score                     

                        FROM t_result 
                        
                        
                        
                        inner join t_quiz   on
                        t_result.resultid=t_quiz.quizid
                        and t_result.type='Q'
                        
                        join t_courses on 
                        t_quiz.courseid=t_courses.courseid    
                        
 
                        WHERE  t_result.suserid  =  '$username'


                ";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewresult', array('data' => $data));
    }

    public function actionrespassign() {
        $this->checksession();

        $username = Yii::app()->session['user'];

        $assignid = $_GET['assignid'];

//        $sql = "SELECT  distinct t_assignment.assignname,t_program.progname,
//                        assign.progid,assign.firstprogid,
//                        t_firstprogram.firstprogname,
//                        student.fullname,
//                        assign.cruddate,t_assignment.enddate
//                        ,ifnull(resultid,0) as resultid,
//                        t_assignment.assignid
//                        FROM t_assignsubm as assign
//                        
//                        join t_program on 
//                        assign.progid=t_program.progid    
//                        
//                        join t_firstprogram on 
//                        assign.progid=t_firstprogram.progid  
//                        and assign.firstprogid=t_firstprogram.firstprogid 
//                        
//                        join t_assignment on 
//                        assign.assignid=t_assignment.assignid    
//                         
//                        join t_user as student on 
//                        assign.crudby=student.userid    
//                        
//                        left join t_result on
//                        assign.assignid=t_result.resultid   
//                        and t_result.type='A'
//                        
//                        WHERE  assign.userid =   $username
//                        and  t_assignment.assignid=$assignid";

        $sql = "SELECT  distinct t_assignment.assignname,t_courses.coursename,
                        assign.courseid, 
                         
                        student.fullname,
                        assign.cruddate,t_assignment.enddate
                        ,ifnull(resultid,0) as resultid,
                        t_assignment.assignid
                        FROM t_assignsubm as assign
                        
                        join t_courses on 
                        assign.courseid=t_courses.courseid    
                        
                        
                        join t_assignment on 
                        assign.assignid=t_assignment.assignid    
                         
                        join t_user as student on 
                        assign.crudby=student.userid    
                        
                        left join t_result on
                        assign.assignid=t_result.resultid   
                        and t_result.type='A'
                        
                        WHERE  assign.userid =   $username
                        and  t_assignment.assignid=$assignid";
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('respassign', array('data' => $data));
    }

    public function actionrespquiz() {
        $this->checksession();
        $username = Yii::app()->session['user'];
        $quizid = $_GET['quizid'];

        $sql = "SELECT  distinct t_quiz.quizname,
                        student.fullname,
                        t_result.score,
                        t_result.cruddate
                        FROM t_quiz  
                        
                        join t_result on
                        t_quiz.quizid=t_result.resultid   
                        and t_result.type='Q'
                            
                        join t_user as student on 
                        t_result.suserid=student.userid    
                        
                         
                        
                        WHERE  t_quiz.userid =  '$username'
                        and t_quiz.quizid=$quizid";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('respquiz', array('data' => $data));
    }

//     public function actionrespassign() {
//
//        $username = Yii::app()->session['user'];
//
//        $sql = "SELECT  distinct t_assignment.assignname,t_program.progname,
//                        assign.progid,assign.firstprogid,
//                        t_firstprogram.firstprogname,
//                        student.fullname,
//                        assign.cruddate,t_assignment.enddate
//                        FROM t_assignsubm as assign
//                        
//                        join t_program on 
//                        assign.progid=t_program.progid    
//                        
//                        join t_firstprogram on 
//                        assign.progid=t_firstprogram.progid  
//                        and assign.firstprogid=t_firstprogram.firstprogid 
//                        
//                        join t_assignment on 
//                        assign.assignid=t_assignment.assignid    
//                         
//                        join t_user as student on 
//                        assign.crudby=student.userid    
//                        
//                        WHERE  assign.userid =  '$username'";
//        // echo $sql;
//        $command = Yii::app()->db->createCommand($sql);
//        $data = $command->queryAll();
//        // var_dump($data);
//        $this->render('respassign', array('data' => $data));
//    }
//      //Student due assignments
    public function actiondueassign() {
        $this->checksession();

        $username = Yii::app()->session['user'];

//        $sql = "SELECT  distinct assign.assignname,
//                        assign.progid,assign.firstprogid,assign.assignid,
//                        assign.startdate,assign.enddate,
//                        assign.gradetype,assign.point,
//                        userteacher.fullname,assign.userid,
//                        ifnull(t_assignsubm.subid,0) as subid
//                        FROM t_user 
//                        join t_assignment as assign on
//                        
//           
//
//                        t_user.progid=assign.progid and
//                        t_user.firstprogid=assign.firstprogid 
//                        
//                        join t_user as userteacher on 
//                        assign.userid=userteacher.userid    
//                        
//                        left join t_assignsubm on
//                        assign.assignid=t_assignsubm.assignid and
//                        t_assignsubm.crudby=t_user.userid
//                        
//                        WHERE  t_user.userid =  '$username'";

        $sql = "SELECT  distinct assign.assignname,
                        assign.courseid,assign.assignid,
                        assign.startdate,assign.enddate,
                        assign.gradetype,assign.point,
                        userteacher.fullname,assign.userid,
                        ifnull(t_assignsubm.subid,0) as subid
                        FROM t_coursesapp 
                        join t_assignment as assign on
                        
                        t_coursesapp.courseid=assign.courseid 
                        
                        join t_user as userteacher on 
                        assign.userid=userteacher.userid    
                        
                        left join t_assignsubm on
                        assign.assignid=t_assignsubm.assignid and
                        t_assignsubm.crudby=t_coursesapp.userid
                        
                        WHERE  t_coursesapp.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('dueassign', array('data' => $data));
    }

    //check Student due assignments
    public function actionchkassign() {
        $this->checksession();

        $userid = Yii::app()->session['user'];
        $assignid = $_GET['assignid'];

//        $sql = "SELECT  distinct t_assignment.assignname,t_assignment.gradetype,
//                        assign.progid,assign.firstprogid,
//                        t_firstprogram.firstprogname,
//                        student.fullname,
//                        assign.cruddate,t_assignment.enddate,
//                        assign.assignfile,student.codeno,
//                        assign.comment,t_assignment.assignid,
//                        assign.crudby
//                        FROM t_assignsubm as assign
//                        
//                        join t_program on 
//                        assign.progid=t_program.progid    
//                        
//                        join t_firstprogram on 
//                        assign.progid=t_firstprogram.progid  
//                        and assign.firstprogid=t_firstprogram.firstprogid 
//                        
//                        join t_assignment on 
//                        assign.assignid=t_assignment.assignid    
//                       
//                
//                        join t_user as student on 
//                        assign.crudby=student.userid    
//                        
//                       
//                        
//                        WHERE  assign.userid =   $userid 
//                        and  t_assignment.assignid=$assignid ";

        $sql = "SELECT  distinct t_assignment.assignname,t_assignment.gradetype,
                        assign.courseid, 
                         
                        student.fullname,
                        assign.cruddate,t_assignment.enddate,
                        assign.assignfile,student.codeno,
                        assign.comment,t_assignment.assignid,
                        assign.crudby
                        FROM t_assignsubm as assign
                        
                        join t_courses on 
                        assign.courseid=t_courses.courseid    
                        
                         
                        
                        join t_assignment on 
                        assign.assignid=t_assignment.assignid    
                       
                
                        join t_user as student on 
                        assign.crudby=student.userid    
                        
                       
                        
                        WHERE  assign.userid =   $userid 
                        and  t_assignment.assignid=$assignid ";



        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();

        $model = new UpdatePointForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'chkassign-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['UpdatePointForm'])) {

            $model->attributes = $_POST['UpdatePointForm'];
            //var_dump( $model->attributes);
            //die();

            if ($model->validate()) {






                $type = 'A';

                $resultid = $model->assignid;


                $model->tuserid = $userid;
                $model->resultid = $resultid;
                $model->type = $type;
                $model->result = $model->point;
                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;
                $model->suserid = $model->suserid;


                $criteria = new CDbCriteria;
                $criteria->select = "(resultid) as resultid ";
                $criteria->condition = "resultid=$resultid and type='$type'";

                $row = $model->find($criteria);
                $resultid = $row['resultid'];

                if ($resultid !== null) {

                    $model->setIsNewRecord(false);
                    $model->update();
                    $this->redirect(array('site/respassign', 'assignid' => $assignid));
                } else {

                    $model->save();
                    //$resultid = Yii::app()->db->getLastInsertID();
                    $this->redirect(array('site/respassign', 'assignid' => $assignid));
                }
            }
        }
        $this->render('chkassign', array('model' => $model, 'data' => $data));
    }

    //Teacher due assignments
    public function actionduequiz() {
        $this->checksession();

        $username = Yii::app()->session['user'];

//        $sql = "SELECT  distinct t_quiz.quizname,
//                        t_quiz.progid,
//                        t_quiz.firstprogid,t_quiz.quizid,
//                        t_quiz.startdate,t_quiz.enddate,
//                        t_quiz.gradetype,t_quiz.point,
//                        userteacher.fullname,t_user.userid,
//                        ifnull(t_result.resultid,0) as quesno,
//                        t_quiz.totalquest
//                        FROM t_user 
//                        join t_quiz as t_quiz on
//                        
//                        t_user.progid=t_quiz.progid and
//                        t_user.firstprogid=t_quiz.firstprogid 
//                        
//                        join t_user as userteacher on 
//                        t_quiz.userid=userteacher.userid    
//                        
//                        left join t_result on
//                        t_quiz.quizid=t_result.resultid and
//                        t_user.userid=t_result.suserid
//                        and t_result.type='Q'
//                        
//                        WHERE  t_user.userid =  '$username'";

        $sql = "SELECT  distinct t_quiz.quizname,
                        t_quiz.courseid,
                        t_quiz.quizid,
                        t_quiz.startdate,t_quiz.enddate,
                        t_quiz.gradetype,t_quiz.point,
                        userteacher.fullname,t_coursesapp.userid,
                        ifnull(t_result.resultid,0) as quesno,
                        t_quiz.totalquest
                        FROM t_coursesapp 
                        join t_quiz as t_quiz on
                        
                        t_coursesapp.courseid=t_quiz.courseid 
                        
                        
                        join t_user as userteacher on 
                        t_quiz.userid=userteacher.userid    
                        
                        left join t_result on
                        t_quiz.quizid=t_result.resultid and
                        t_coursesapp.userid=t_result.suserid
                        and t_result.type='Q'
                        
                        WHERE  t_coursesapp.userid =  '$username'";
        // echo $sql;
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('duequiz', array('data' => $data));
    }

    //Teacher Submit assignment function
    public function actionaddassign() {
        $this->checksession();
        if (!isset(Yii::app()->session['user'])) {
            $this->render('index');
            Yii::app()->end();
        }

        $model = new AddassignForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'addassign-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['AddassignForm'])) {

            $model->attributes = $_POST['AddassignForm'];
            $userid = Yii::app()->session['user'];

            if ($model->validate()) {




                $model->userid = $userid;

                $model->assignname = $model->assignname;
                $model->assigndesc = $model->assigndesc;

                $model->gradetype = $model->gradtype;
                $model->point = $model->point;
                $model->courseid = $_POST['coursename']; //$model->progname;//
                // $model->firstprogid = $_POST['programtype'];
                $fromdate = $model->fromdate;
                $fromdate = new Datetime($fromdate);
                $fromdate = $fromdate->format('Y-m-d');
                $model->startdate = $fromdate;


                $duedate = $model->duedate;
                $duedate = new Datetime($duedate);
                $duedate = $duedate->format('Y-m-d');

                $model->enddate = $duedate;

                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;
                $model->crudby = '';

                if ($model->save())
                    $this->redirect(array('site/viewassign'));
            }
        }
        $this->render('addassign', array('model' => $model));
    }

    //viewqresult
    public function actionviewqresult() {
//        $this->checksession();
//
//        $username = Yii::app()->session['user'];
//        $cruddate = date("Y-m-d");
//        $sql = "SELECT  distinct  count(correct) as correct,
//                        t_quiz.userid as teacherid,
//                        t_quiz.totalquest,
//                        (count(t_quizans.correct)/t_quiz.totalquest)*100 as perc,
//                        case 
//                        when ((count(t_quizans.correct)/t_quiz.totalquest)*100) >=60 then 'P'
//                        when ((count(t_quizans.correct)/t_quiz.totalquest)*100) <60 then 'F'
//                        end as result,
//                        t_quiz.quizid
//                        FROM t_quizans 
//                        join t_quiz   on
//                        
//                        t_quiz.quizid=t_quizans.quizid
//
//                        join t_user     on 
//                        t_quizans.userid=t_user.userid   
//                        
//                        WHERE  t_user.userid =  '$username'
//                        and t_quizans.correct='Y'";
//         
//                    $command = Yii::app()->db->createCommand($sql);
//                    $data = $command->queryAll();
//                   // var_dump($data[0]["correct"]);
//                    
////                    $model=new UpdatePointForm;
////                    
////                    $model->tuserid=$data[0]["teacherid"];
////                    $model->type="Q";
////                    $model->result=$data[0]["result"];
////                    $model->cruddate=$cruddate;
////                    $model->score= round($data[0]["result"],2);
////                    $model->suserid=$username;
////                    $model->save();
//                    
//                    $tuserid=$data[0]['teacherid'];
//                    $result=$data[0]['result'];
//                    $score=round($data[0]['perc'],2);
//                    $quizid=$data[0]['quizid'];
//                    
//                 
//                    
//                $sql="SELECT count(*) as exist FROM t_result WHERE resultid =$quizid and type='Q' limit 1 ";
//                $command = Yii::app()->db->createCommand($sql);
//                $dataf = $command->queryColumn();
//            //   var_dump($dataf[0][0]);
//          // die();
//            if( $dataf[0][0] ==0)
//            { $sqlins = "INSERT INTO `t_result`(`tuserid`,`resultid`,`type`, `result`,
//                   `cruddate`,`score`, `suserid`) VALUES
//                    ($tuserid,$quizid,'Q','$result',
//                    '$cruddate', $score ,$username) ";
//              
//                
//                
//       
//       Yii::app()->db->createCommand($sqlins)->execute();
//            }
//             
////        $command = Yii::app()->db->createCommand($sql);
////        $data = $command->queryAll();
//        // var_dump($data);
//    //    $this->redirect(array('site/viewqresult','result'=>$result ));
        $this->render('viewqresult');
    }

    public function actionViewquizans() {



        $this->checksession();
        $model = new ViewQuizAns;
        $userid = Yii::app()->session['user'];
        $quizid = $_GET['quizid'];



        $sql = "SELECT  distinct t_quiz.quizname,
                        t_quiz.courseid,t_quiz.quizid,
                        t_quiz.startdate,t_quiz.enddate,
                        t_quiz.gradetype,t_quiz.point,
                        t_quiz.userid,t_quizques.quesno,
                        t_quizques.question,t_quizques.optiona,
                        t_quizques.optionb,t_quizques.optionc,
                        t_quizques.optiond,t_quizques.answer,
                        t_quiz.totalquest
                        FROM t_coursesapp
                        join t_quiz as t_quiz on
                        
                        t_coursesapp.courseid=t_quiz.courseid  
                        
                        
                        join t_quizques on
                        t_quiz.quizid=t_quizques.quizid
                        
                        WHERE  t_coursesapp.userid = '$userid'   
                        and  t_quizques.quesno=1 
                        and t_quiz.quizid=$quizid ";

        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryRow();
        //for loop for all records 



        if (isset($_POST['ajax']) && $_POST['ajax'] === 'viewquizans-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }


        if (isset($_POST['ViewQuizAns'])) {


            $model->attributes = $_POST['ViewQuizAns'];


            if ($model->validate()) {

                $quizid = $model->quizid;
                $totalquestions = $model->totalquest;
                $quesno = $model->quesno;
                $qanswer = $model->optiona;
                $model->quizid = $quizid;
                $model->userid = $userid;
                $model->quesno = $quesno;
                $model->qanswer = $qanswer;
                $model->answer = $model->quesnoa;
                if ($qanswer == $model->answer) {
                    $model->correct = 'Y';
                } else {
                    $model->correct = 'N';
                }

                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;



                $criteria = new CDbCriteria;
                $criteria->select = "(ansid) AS ansid ";
                $criteria->condition = "quizid=$quizid and quesno=$quesno and userid=$userid ";

                $row = $model->find($criteria);
                $ansid = $row['ansid'];
                //                         
                //                        $model->quizid=$quizid;
                //                         
                if ($ansid !== null) {
                    //$row->delete();

                    $model->setisNewRecord(false);
                    $model->update();
                } else {

                    $model->save();
                    $ansid = Yii::app()->db->getLastInsertID();
                }
                //echo $ansid;
                //    
                $quesno = $quesno + 1;

                if ($quesno <= $totalquestions) {

                    $sql = "SELECT  distinct t_quiz.quizname,
                                    t_quiz.courseid ,t_quiz.quizid,
                                    t_quiz.startdate,t_quiz.enddate,
                                    t_quiz.gradetype,t_quiz.point,
                                    t_quiz.userid,t_quizques.quesno,
                                    t_quizques.question,t_quizques.optiona,
                                    t_quizques.optionb,t_quizques.optionc,
                                    t_quizques.optiond,t_quizques.answer,
                                    t_quiz.totalquest
                                    FROM t_coursesapp 
                                    join t_quiz as t_quiz on

                                    t_coursesapp.courseid=t_coursesapp.courseid 


                                    join t_quizques on
                                    t_quiz.quizid=t_quizques.quizid

                                    WHERE  t_coursesapp.userid = '$userid'   
                                    and  t_quizques.quesno=$quesno ";

                    $command = Yii::app()->db->createCommand($sql);
                    $data = $command->queryRow();




                    $this->redirect(array('site/viewquizans', 'userid' => $userid, 'quizid' => $quizid, 'totalquest' => $totalquestions, 'quesno' => $quesno));

                    // $this->renderpartial('quizans', array('model' => $model, 'data' => $data));
                } else {


                    //$this->actionviewqresult();

                    $sql = "SELECT  distinct  count(correct) as correct,
                                                t_quiz.userid as teacherid,
                                                t_quiz.totalquest,
                                                (count(t_quizans.correct)/t_quiz.totalquest)*100 as perc,
                                                case 
                                                when ((count(t_quizans.correct)/t_quiz.totalquest)*100) >=60 then 'P'
                                                when ((count(t_quizans.correct)/t_quiz.totalquest)*100) <60 then 'F'
                                                end as result,
                                                t_quiz.quizid
                                                FROM t_quizans 
                                                join t_quiz   on

                                                t_quiz.quizid=t_quizans.quizid

                                                join t_user     on 
                                                t_quizans.userid=t_user.userid   

                                                WHERE  t_user.userid =  $userid
                                                and t_quiz.quizid=$quizid   
                                                and t_quizans.correct='Y'";

                    $command = Yii::app()->db->createCommand($sql);
                    $data = $command->queryAll();
                    // var_dump($data[0]["correct"]);
                    //                    $model=new UpdatePointForm;
                    //                    
                    //                    $model->tuserid=$data[0]["teacherid"];
                    //                    $model->type="Q";
                    //                    $model->result=$data[0]["result"];
                    //                    $model->cruddate=$cruddate;
                    //                    $model->score= round($data[0]["result"],2);
                    //                    $model->suserid=$username;
                    //                    $model->save();

                    $tuserid = $data[0]['teacherid'];
                    $result = $data[0]['result'];
                    $score = round($data[0]['perc'], 2);
                    //$quizid=$data[0]['quizid'];



                    $sql = "SELECT count(*) as exist FROM t_result WHERE resultid =$quizid and type='Q' limit 1 ";
                    $command = Yii::app()->db->createCommand($sql);
                    $dataf = $command->queryColumn();

                    if ($dataf[0][0] == 0) {
                        $sqlins = "INSERT INTO `t_result`(`tuserid`,`resultid`,`type`, `result`,
                                               `cruddate`,`score`, `suserid`) VALUES
                                                ($tuserid,$quizid,'Q','$result',
                                                '$cruddate', $score ,$userid) ";




                        Yii::app()->db->createCommand($sqlins)->execute();
                    }


                    $this->redirect(array('site/viewqresult', 'result' => $result));
                }
            }
        }




        $this->render('viewquizans', array('model' => $model, 'data' => $data));
    }

    public function actionaddquiz() {

        $this->checksession();


        $model = new AddQuizForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'addquiz-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['AddQuizForm'])) {

            $model->attributes = $_POST['AddQuizForm'];

            $userid = Yii::app()->session['user'];

            if ($model->validate()) {

                // var_dump(  );
                //die();

                $totalquestions = $model->totalquestions;
                $quizname = $model->quizname;

                $model->quizid = $model->quizid;
                $model->userid = $userid;

                $model->quizname = $model->quizname;
                //$model->gradetype = $model->gradtype;

                $model->point = $model->point;
                $model->courseid = $_POST['coursename'];
                //$model->firstprogid = $_POST['programtype'];
                $model->totaltime = $model->totaltime;
                $model->totalquest = $totalquestions;


                $fromdate = $model->fromdate;
                $fromdate = new Datetime($fromdate);
                $fromdate = $fromdate->format('Y-m-d');
                $model->startdate = $fromdate;

                $duedate = $model->duedate;
                $duedate = new Datetime($duedate);
                $duedate = $duedate->format('Y-m-d');

                $model->enddate = $duedate;


                $cruddate = date("Y-m-d");
                $model->cruddate = $cruddate;
                $model->crudby = "";


                $criteria = new CDbCriteria;
                $criteria->select = "max(quizid) AS quizid ";
                $criteria->condition = "quizname='$quizname'";
                //$criteria->params=array(':params'=>'ss');
                $row = $model->find($criteria);
                $quizid = $row['quizid'];

                // echo $quizid;
                $model->quizid = $quizid;

                if ($quizid !== null) {
                    $row->delete();
                    $model->save();
                } else {
                    // echo'ttt';
                    $model->save();
                    $quizid = Yii::app()->db->getLastInsertID();
                }
                // echo $quizid;

                $this->redirect(array('site/quizques', 'quizid' => $quizid, 'totalquest' => $totalquestions, 'questno' => "1"));
            }
        }
        $this->render('addquiz', array('model' => $model));
    }

    public function actionviewquiz() {
        $this->checksession();
        $username = Yii::app()->session['user'];
        // display the assignment form
        /* $sql = "SELECT  distinct t_quiz.quizname,
          t_quiz.quizid,
          t_courses.coursename,
          --t_firstprogram.firstprogname,
          t_quiz.startdate,t_quiz.enddate
          FROM t_quiz  as t_quiz

          join t_courses on
          t_quiz.progid=t_courses.courseid

          --join t_firstprogram on
          --t_quiz.progid=t_firstprogram.progid  and
          --t_quiz.firstprogid=t_firstprogram.firstprogid

          WHERE  t_quiz.userid =  '$username' order by t_quiz.startdate DESC"; */

        $sql = "SELECT  distinct t_quiz.quizname,
                        t_quiz.quizid,
                        t_courses.coursename,
                        
                        t_quiz.startdate,t_quiz.enddate
                        FROM t_quiz  as t_quiz
                        
                        join t_courses on 
                        t_quiz.courseid=t_courses.courseid    
                        
                         
                        
                WHERE  t_quiz.userid =  '$username' order by t_quiz.startdate DESC";
        // echo $sql; --t_quiz.progid,t_quiz.firstprogid,
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewquiz', array('data' => $data));
    }

    public function actionquizques() {

        $this->checksession();


        $model = new QuizQuesForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'quizques-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['QuizQuesForm'])) {

            $model->attributes = $_POST['QuizQuesForm'];
            if ($model->validate()) {


                $cruddate = date("Y-m-d");
                $user = Yii::app()->session['user'];

                $quizid = $_GET['quizid'];
                $questno = $_GET['questno'];
                $totalquestions = $_GET['totalquest'];

                $model->quizid = $quizid;
                $model->quesno = $_GET['questno'];


                $model->type = "M";
                $model->question = $model->question;
                $model->optiona = $model->optiona;
                $model->optionb = $model->optionb;
                $model->optionc = $model->optionc;
                $model->optiond = $model->optiond;

                $model->answer = $model->answer;

                $model->cruddate = $cruddate;

                $model->crudby = $user;

                $criteria = new CDbCriteria;
                $criteria->select = "(quizid) AS quizid ";
                $criteria->condition = "quizid=$model->quizid and quesno=$model->quesno ";

                $row = $model->find($criteria);

                if ($row !== null) {
                    //$row->delete($criteria);
                    //  $model->saveAttributes(array('question'=>$model->question));
                }
//                              
                else {
                    $model->save();
                }
                $questno = $questno + 1;
                if ($questno <= $totalquestions) {
                    $this->redirect(array('site/quizques', 'quizid' => $model->quizid, 'totalquest' => $totalquestions, 'questno' => $questno));
                } else {
                    $this->actionviewquiz();
                }
            }
        }
        $this->render('quizques', array('model' => $model));
    }

    //Student Submit assignment function
    public function actionsubassign() {

        $this->checksession();

        $model = new SubassignForm;


        if (isset($_POST['ajax']) && $_POST['ajax'] === 'subassign-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['SubassignForm'])) {

            $model->attributes = $_POST['SubassignForm'];
            if ($model->validate()) {

                $model->assignfile = CUploadedFile::getInstance('SubassignForm', 'assignfile');

                $fileName = CUploadedFile::getInstance('SubassignForm', 'assignfile');
                $codeno = Yii::app()->session['codeno'];

                if (isset($fileName)) {





                    $path = dirname(Yii::app()->request->scriptFile);


                    if (!is_dir($path . '/upload/' . $codeno)) {
                        mkdir($path . '/upload/' . $codeno);
                    }

//                if (!is_dir(Yii::app()->basePath . '/upload/' . $codeno)) {
//                    mkdir(Yii::app()->basePath . '/upload/' . $codeno);
//                }


                    $user = Yii::app()->session['user'];


                    //$fileName->saveAs(Yii::app()->basePath . '/upload/' . $codeno . $fileName);
                    $fileName->saveAs($path . '/upload/' . '/' . $codeno . '/' . $fileName);
                }

                $cruddate = date("Y-m-d");
                $model->assignfile = $fileName;
                $model->comment = $model->comment;
                $model->userid = $_GET['userid'];
                $model->courseid = $_GET['courseid'];
                //$model->firstprogid = $_GET['firstprogid'];
                $model->assignid = $_GET['assignid'];
                $model->cruddate = $cruddate;
                $model->codeno = $codeno;
                $model->crudby = $user;

                if ($model->save())
                    $this->redirect(array('site/dueassign'));
            }
        }

        $this->render('subassign', array('model' => $model));
    }

//        public function actionDynamicprogram()
//        { 
//      //    $progid =  $_POST['addassign']['progname']; 
//          
//             
//              $progname = 1;
//              $data=firstprogram::model()->findAll('progid = '. $progname) ;
//
//               
//            $data=CHtml::listData($data,'progfirstid','progfirstname');
//            echo "<option value=''>Select City</option>";
//            foreach($data as $value=>$name)
//            {
//                echo CHtml::tag('option',
//                           array('value'=>$value),CHtml::encode($name),true);
//            }
////            $sql = "SELECT firstprogid,firstprogname FROM t_firstprogram ";
////            //"WHERE  progid = :progid";
////            $command = Yii::app()->createCommand($sql);
////            //$command->bindValue(':progid', $progid, PDO::PARAM_INT);
////            $data = $command->execute();
////
////            $data = CHtml::listData($data,'firstprogid','firstprogname');
////            foreach($data as $value=>$name)
////            {
////              echo CHtml::tag('option',
////              array('value'=>$value),CHtml::encode($name),true);
////            }
////             public function init()
////    {
////        // Here we define query conditions.
////        $criteria = new CDbCriteria;
////        $criteria->condition = '`status` = 1';
////        $criteria->order = '`position` ASC';
////
////        $items = MenuModel::model()->findAll($criteria);
////
////        foreach ($items as $item)
////            $this->items[] = array('label'=>$item->label, 'url'=>$item->url);
////    } 
////              
//              
//              
////              $data=firstprogram::model()->findAll('parent_id=:parent_id', 
////                  array(':parent_id'=>(int)  $progname    ));
//// 
////                $data=CHtml::listData($data,'firstprogid','firstprogname');
////                foreuh($data as $key=>$val)
////                {
////                    echo CHtml::tag('option',
////                               array('key'=>$key),CHtml::encode($val),true);
////                }
//        }


    public function actionfirstprogram() {
//        echo 'sss';
//        $model=new AddassignForm();
//        $progid = $model->progname;
//  
//        $data=firstprogram::model()->findAll('progid=:progid', 
//         array(':progid'=>$progid));
//        $data=CHtml::listData($data,'firstprogid','firstprogname');
//
//    foreach($data as $value=>$name)
//    {
//        echo CHtml::tag('option',
//                   array('value'=>$value),CHtml::encode($name),true);
//    };
        // var_dump($data);
        //    return $data;


        $data = firstprogram::model()->findAllBySql('select firstprogid, firstprogname from t_firstprogram
                where firstprogid=' . $_POST['progname']);
        $data = CHtml::listData($data, 'firstprogid', 'firstprogname');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public $breadcrumbs = array();

    public function checksession() {

        if (!isset(Yii::app()->session['user'])) {
            $this->render('index');
            Yii::app()->end();
        }
    }

    public function actionLogout() {

        $userid = Yii::app()->session['user'];
        $sql = "update  `t_user` set isloggedin=0           
        WHERE   userid =  '$userid'";

        $command = Yii::app()->db->createCommand($sql);
        $command->execute();
        unset(Yii::app()->session['user']);
        $_SESSION = array();
        session_destroy();
        Yii::app()->user->logout();

        //$this->redirect(Yii::app()->homeUrl);
        $this->render('logout');
    }

    public function actiondownload() {
        $this->checksession();
        $path = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
        $codeno = $_GET['codeno'];
        $name = $_GET['filename'];

        $filename = $path . '/' . 'upload' . '/' . $codeno . '/' . $name;
// echo $filename;
// die();
//            
//                        echo basename($filename);
// 
//            
//                        $path_parts = @pathinfo($filename);
//                         
//                        header('Content-Description: File Transfer',true);
//                        header('Content-Type: application/octet-stream',true);
//                        //header('Content-Type: '.$mime);
//                        header('Content-Disposition: attachment; filename='.basename($filename),true);
//                        //header('Content-Transfer-Encoding: binary');
//                        //header('Expires: 0');
//                        //header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//                        //header('Pragma: public');
//                        //header('Content-Length: ' . filesize($filename));
//                        ob_clean();
//                        flush();
//                        $filecontent =file_get_contents($filename);
//              echo $filecontent;
        //new code
        //  if(file_exists($filename))
        // {
        //  echo 'sfdsf';
        // die();
        return Yii::app()->getRequest()->sendFile($name, file_get_contents($filename));
        //  return Yii::app()->request->xSendFile($name, array(
        //    'saveName' => $name,
        //));
        //}
        //new code     





        exit;
    }

    public function actionnews() {

        $model = new NewsForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        $cruddate = date("Y-m-d");
        if (isset($_POST['NewsForm'])) {

            $model->attributes = $_POST['NewsForm'];
            $search = $model->news;


            if ($search != "") {
                $criterian = new CDbCriteria();
                $criterian->select = "distinct t.newstitle,
                t.fromdate,t.expirydate,
                t.newstype,t.news ";
                $criterian->condition = "('$cruddate' >=fromdate and '$cruddate'<=expirydate) and news like '%$search%'";
                $criterian->order = 'fromdate DESC';

                $datan = $model->findAll($criterian);
            }
        }

        $pagesize = Yii::app()->params['listPerPage'];
        isset($_GET['page']) ? $pageno = $_GET['page'] - 1 : $pageno = 1;

        (!isset($_GET['page'])) ? $lowerlimit = 0 : $lowerlimit = $pagesize * $pageno;

        (!isset($_GET['page'])) ? $upperlimit = $pagesize : $upperlimit = $pagesize * $pageno;

        $criteria = new CDbCriteria();
        $criteria->select = "distinct t.newstitle,
                t.fromdate,t.expirydate,
                t.newstype,t.news ";
        $criteria->condition = "'$cruddate' >=fromdate and '$cruddate'<=expirydate  order by fromdate DESC limit $lowerlimit,$upperlimit";

        $criteriac = new CDbCriteria();
        $criteriac->select = "distinct t.newstitle
               ";
        $criteriac->condition = "'$cruddate' >=fromdate and '$cruddate'<=expirydate ";



        $datac = $model->findAll($criteriac);
        $data = $model->findAll($criteria);

        $item_count = $model->count($criteriac);

        $pages = new CPagination($item_count);
        $pages->setPageSize($pagesize);
        $pages->applyLimit($criteria);  // the trick is here!
        // var_dump($criteria);
        if (!isset($datan)) {
            $this->render('news', array('model' => $model, 'data' => $data, 'pages' => $pages));
        } else {
            $this->render('news', array('model' => $model, 'data' => $data, 'pages' => $pages, 'datan' => $datan));
        }
    }

    public function actionAdmin() {
        $model = new TProgram('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TProgram']))
            $model->attributes = $_GET['TProgram'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    protected function performAjaxValidation($model, $form) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === '$form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

//                     
//                         $file=$model->file_status;
// 
//                         $model->file=$file->name;
// 
//                         $file->save();
//                      $model->image=CUploadedFile::getInstance($model,'image');
//            if($model->save())
//            {
//                $model->image->saveAs('path/to/localFile');
//                // redirect to success page
//            }
            
            
            //echo $uploadedFile; 
          //  $fileName = Yii::app()->session['codeno']. '_' .date('Y-m-d') . '_' . $uploadedFile;  // $timestamp + file name
           // echo $fileName;
//            if (!is_dir(Yii::app()->basePath . '/../protected/upload/' . $model->project->id . '/' . $model->id)) {
//                mkdir(Yii::app()->basePath . '/../protected/upload/' . $model->project->id . '/' . $model->id);
//            }
//            if ($model->save($fileName)) {
//                $uploadedFile->saveAs(Yii::app()->basePath . '/../protected/upload/' . $model->project->id . '/' .  $fileName);
//            }
           // $this->redirect(array('view', 'id' => $model->id));
            
//            $rnd = rand(0,9999);  // generate random number between 0-9999
//            $model->attributes=$_POST['Banner'];
// 
//            $uploadedFile=CUploadedFile::getInstance($model,'image');
//            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            $model->image = $fileName;
                     
                     
                         //$this->redirect(Yii::app()->user->returnUrl);