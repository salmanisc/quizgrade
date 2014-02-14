<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 12/9/13
 * Time: 12:41 PM
 * To change this template use File | Settings | File Templates.
 */
class AdminController extends CController
{
    public $layout='//admin/layouts/column1';
    
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
       $this->checksession(); 
        $this->render('index');
    }

    
 
        public function actionLogin()
    {
        $model=new AdminLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='adminlogin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['AdminLoginForm']))
		{
            
			$model->attributes=$_POST['AdminLoginForm'];
                        
			// validate user input and redirect to the previous page if valid
			 if($model->validate() && $model->login())
                                    
                                $this->redirect(array('admin/index', 'username'=>$model->email));
                             
                }
                   
                
		// display the login form
                 
		$this->render('login',array('model'=>$model));
    }
    
    //addnews
     public function actionaddnews() {

        $this->checksession();
        $model = new AddNewsForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'addnews-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['AddNewsForm'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['AddNewsForm'];
            if ($model->validate())
               
//var_dump($model->attributes);
//            die();
             
            $model->newstitle = $model->newstitle;
            $model->newscat = $model->newscat;
            $model->newstype = $model->newstype;
            $model->fromdate = $model->fromdate;
            $model->expirydate = $model->expirydate;
            $model->news = $model->news;
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->save())
                
                $this->redirect(array('/admin/viewnews'));
        }
        // display the teacher signup form

        $this->render('addnews', array('model' => $model));
    }
        //add department
        public function actionDepart() {

        $this->checksession();
        
        $sql = "SELECT  distinct departid,departname   
                         
                        FROM t_department    
                        order by cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new department;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'department-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['department'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['department'];
            
            if ($model->validate())
             
            
            $model->departname = $model->departname;
             
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->save())
                
                $this->redirect(array('/admin/depart'));
        }
        // display the departmen   form

        $this->render('depart', array('model' => $model,'data' => $data));
    }
    
        public function actionCourses() {

        $this->checksession();
        
        $sql = "SELECT  distinct progid,progname   
                         
                        FROM t_program    
                        order by cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new program;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['program'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['program'];
            if ($model->validate())
             
            
            $model->progname = $model->progname;
             
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->save())
                
                $this->redirect(array('/admin/courses'));
        }
        // display the departmen   form

        $this->render('courses', array('model' => $model,'data' => $data));
    }
            //add department
        public function actionDeletedepart()
        {
            $this->checksession();
            $model = new department;
             
            $post=department::model()->findByPk($_GET['departid']); // assuming there is a post whose ID is 10
            if (isset($post))
            {$post->delete(); }
            
            $sql = "SELECT  distinct departid,departname   
                    FROM t_department    
                    order by cruddate DESC";

            $command = Yii::app()->db->createCommand($sql);
            $data = $command->queryAll();
            $this->render('depart', array('model' => $model,'data' => $data));
        
        }
        public function actionEditdepart() {

        $this->checksession();
        
        $sql = "SELECT  distinct departid,departname   
                         
                        FROM t_department    
                        order by cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new department;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'editdepart-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['department'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['department'];
            
            if ($model->validate())
            {    
            $model->setIsNewRecord(false);
            $model->departid = $_GET['departid'];
            $model->departname = $model->departname;
             
             
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->update())
                
                $this->redirect(array('/admin/depart'));
        }}
        // display the teacher signup form

        $this->render('editdepart', array('model' => $model,'data' => $data));
    }
         public function actionEditcourses() {

        $this->checksession();
        
        $sql = "SELECT  distinct progid,progname   
                         
                        FROM t_program
                        order by cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new program;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'editcourses-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['program'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['program'];
            if ($model->validate())
             
            $model->setIsNewRecord(false);
            $model->progid= $_GET['progid'];
            $model->progname = $model->progname;
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->update())
                
                $this->redirect(array('/admin/courses'));
        }
        // display the teacher signup form

        $this->render('editcourses', array('model' => $model,'data' => $data));
    }  
            //approve student
        public function actionaprvstudent() 
        {
       
        $this->checksession();
     
        $sql = "SELECT  distinct t_user.fullname,
                        t_user.userid as suserid,
                        t_user.phoneno,t_user.codeno,
                         t_user.username
                         FROM t_user  
                        where (t_user.isauthorized=0 and t_user.isrejected=0  and t_user.isstudent=1)
                        order by t_user.cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new user;
//        $userid = Yii::app()->session['user'];
//        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvstudent-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//
//       
//
//        if (isset($_POST['user'])) {
//
//            $model->attributes = $_POST['user'];
//
//            if ($model->validate()) 
//            {
//               // var_dump($_POST['user']);
//                
//                
//                $model->userid = $model->userid;
//                $model->isauthorized = 1;
//                $cruddate = date("Y-m-d");
//                $model->authorizedate = $cruddate;
//                $model->authorizeby = $userid;
//                if ($model->update())
// 
//                    $this->redirect(array('/admin/aprvstudent'));
//            }}
        // display the departmen   form

        $this->render('aprvstudent', array('model' => $model,'data' => $data));
    }
               //approve student
        public function actioneditstudent() 
        {
          
        
        $this->checksession();
        $model = new user;
        
        
     
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvstudent-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

   
       
      //  if (isset($_POST['user'])) 
        //  {
                $tuserid = Yii::app()->session['user'];
               // $model->attributes = $_POST['user'];
                //if ($model->validate())
                 
                $model->setIsNewRecord(false);
                
                $model->userid = $_GET['suserid'];
                $model->isauthorized = 1;
                $model->isstudent = 1;
                $cruddate = date("Y-m-d");
                $model->authorizedate = $cruddate;
                $model->authorizeby = $tuserid;
                if ($model->update())
 
                    $this->redirect(array('/admin/aprvstudent'));
          //  } 
        // display the departmen   form

       //  $this->render('aprvstudent', array('model' => $model,'data' => $data));
    }
    public function actionrejectstudent() 
        {
          
        
        $this->checksession();
        $model = new user;
        
        
     
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvstudent-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

   
       
      //  if (isset($_POST['user'])) 
        //  {
                $tuserid = Yii::app()->session['user'];
               // $model->attributes = $_POST['user'];
                //if ($model->validate())
                 
                $model->setIsNewRecord(false);
                
                $model->userid = $_GET['suserid'];
                $model->isrejected = 1;
                $model->isstudent = 1;
                $cruddate = date("Y-m-d");
                $model->rejecteddate = $cruddate;
                $model->rejectedby = $tuserid;
                if ($model->update())
 
                    $this->redirect(array('/admin/aprvstudent'));
          //  } 
        // display the departmen   form

       //  $this->render('aprvstudent', array('model' => $model,'data' => $data));
    }
    
    
    
               //approve student
        public function actionaprvteacher() 
        {
       
        $this->checksession();
     
        $sql = "SELECT  distinct t_user.fullname,
                        t_user.userid as suserid,
                        t_user.phoneno,t_user.codeno,
                         t_user.username
                          ,t_department.departname as progname
                         FROM t_user  join
                         t_department on 
                         t_user.departid=t_department.departid
                        where (t_user.isauthorized=0 and t_user.isrejected=0  and t_user.isstudent=0)
                        order by t_user.cruddate DESC";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new user;
//        $userid = Yii::app()->session['user'];
//        // if it is ajax validation request
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvstudent-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//
//       
//
//        if (isset($_POST['user'])) {
//
//            $model->attributes = $_POST['user'];
//
//            if ($model->validate()) 
//            {
//               // var_dump($_POST['user']);
//                
//                
//                $model->userid = $model->userid;
//                $model->isauthorized = 1;
//                $cruddate = date("Y-m-d");
//                $model->authorizedate = $cruddate;
//                $model->authorizeby = $userid;
//                if ($model->update())
// 
//                    $this->redirect(array('/admin/aprvstudent'));
//            }}
        // display the departmen   form

        $this->render('aprvteacher', array('model' => $model,'data' => $data));
    }
               //approve student
        public function actioneditteacher() 
        {
          
        
        $this->checksession();
        $model = new user;
        
        
     
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvteacher-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

   
       
      //  if (isset($_POST['user'])) 
        //  {
                $tuserid = Yii::app()->session['user'];
               // $model->attributes = $_POST['user'];
                //if ($model->validate())
                 
                $model->setIsNewRecord(false);
                
                $model->userid = $_GET['suserid'];
                $model->isauthorized = 1;
                $model->isstudent = 0;
                $cruddate = date("Y-m-d");
                $model->authorizedate = $cruddate;
                $model->authorizeby = $tuserid;
                if ($model->update())
 
                    $this->redirect(array('/admin/aprvteacher'));
          //  } 
        // display the departmen   form

       //  $this->render('aprvstudent', array('model' => $model,'data' => $data));
    }
    public function actionrejectteacher() 
        {
          
        
        $this->checksession();
        $model = new user;
        
        
     
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aprvteacher-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

   
       
      //  if (isset($_POST['user'])) 
        //  {
                $tuserid = Yii::app()->session['user'];
               // $model->attributes = $_POST['user'];
                //if ($model->validate())
                 
                $model->setIsNewRecord(false);
                
                $model->userid = $_GET['suserid'];
                $model->isrejected = 1;
                $model->isstudent = 0;
                $cruddate = date("Y-m-d");
                $model->rejecteddate = $cruddate;
                $model->rejectedby = $tuserid;
                if ($model->update())
 
                    $this->redirect(array('/admin/aprvteacher'));
          //  } 
        // display the departmen   form

       //  $this->render('aprvstudent', array('model' => $model,'data' => $data));
    }
    //viewnews
    public function actionviewnews() 
    {
        $this->checksession();
        $model = new ViewNewsForm;
        
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'viewnews-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
      
        $username = Yii::app()->session['user'];

        // display the assignment form
        $cruddate = date("Y-m-d");
        $search=$model->newscat;
        if ($search=="")
        {    
            $sql = "SELECT  distinct t_news.newstitle,
                        t_news.fromdate,t_news.expirydate,
                        t_news.newstype 
                        FROM t_news    
                        WHERE  '$cruddate' between t_news.fromdate and t_news.expirydate";
        }else
        {
            $sql = "SELECT  distinct t_news.newstitle,
                        t_news.fromdate,t_news.expirydate,
                        t_news.newstype 
                        FROM t_news    
                        WHERE  '$cruddate' between t_news.fromdate and t_news.expirydate
                        and  t_news.newscat like '%$search%"; 
        }
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        // var_dump($data);
        $this->render('viewnews', array('model' => $model,'data' => $data));
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
    public function checksession() {
 
        if (!isset(Yii::app()->session['user'])) {
            //$this->render('index');
            $this->redirect(array('admin/login'));
            Yii::app()->end();
        }
    }
    public function actionSchool() {

        $this->checksession();
        
        $sql = "SELECT  distinct t_program.progid,t_program.progname,
                        t_firstprogram.firstprogid,t_firstprogram.firstprogname   
                         
                        FROM t_program 
                        join t_firstprogram on
                        t_program.progid=t_firstprogram.progid
                        order by t_program.progname";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new firstprogram;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'school-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['firstprogram'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['firstprogram'];
            if ($model->validate())
            
            
            $model->progid = $_POST['progid'];
            
            $model->firstprogname = $model->firstprogname; 
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            //$model->crudby = $userid;
            if ($model->save())
                
                $this->redirect(array('/admin/school'));
        }
        // display the departmen   form

        $this->render('school', array('model' => $model,'data' => $data));
    }
       public function actionEditschool() {

        $this->checksession();
        
        $sql = "SELECT  distinct t_program.progid,t_program.progname,
                        t_firstprogram.firstprogid,t_firstprogram.firstprogname   
                         
                        FROM t_program 
                        join t_firstprogram on
                        t_program.progid=t_firstprogram.progid
                        order by t_program.progname";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new firstprogram;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'editschool-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['firstprogram'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['firstprogram'];
            if ($model->validate())
            { 
 
            $model->setIsNewRecord(false);
            $model->progid= $_GET['progid'];
            $model->firstprogid= $_GET['firstprogid'];
             
            $model->firstprogname = $model->firstprogname;
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
           // $model->crudby = $userid;
            if ($model->update())
                
                $this->redirect(array('/admin/school'));
        }}
        // display the teacher signup form

        $this->render('editschool', array('model' => $model,'data' => $data));
    }  
    
    public function actionContact() {

        $this->checksession();
        
        $sql = "SELECT  * FROM t_contact    
                        limit 1 ";
        
        $command = Yii::app()->db->createCommand($sql);
        $data = $command->queryAll();
        
        $model = new contact;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'contact-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data

        if (isset($_POST['contact'])) {
            $userid = Yii::app()->session['user'];
            $model->attributes = $_POST['contact'];
            
            if ($model->validate())
            {    
            $model->setIsNewRecord(false);
            $model->id = 1;
            $model->email = $model->email;
            $model->phone = $model->phone;
            $model->fax = $model->fax; 
            $model->address = $model->address; 
            
            $cruddate = date("Y-m-d");
            $model->cruddate = $cruddate;
            $model->crudby = $userid;
            if ($model->update())
                
                $this->redirect(array('/admin/index'));
        }}
        // display the teacher signup form

        $this->render('contact', array('model' => $model,'data' => $data));
    }
}