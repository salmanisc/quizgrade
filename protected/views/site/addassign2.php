 
<?php
/* @var $this SiteController */
/* @var $model AddassignForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Create New Assignment';
$this->breadcrumbs = array(
    'New Assignment',
);
$page = "Create New Assignment";
$title = "Create New Assignment";
?>

 





    <div class="container">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'addassign-form',
            'enableAjaxValidation' => true,
                )
        );
        ?>


        <!--            'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true, -->

        
             


                        
<div class="row"> 
                            
                       <?php  
//                       $list = array('Point' => "Point", 'Grade' => "Grade");
//                       echo CHtml::dropDownList('idProvince','', $list,
//        array(
//            'prompt'=>'Select Province',
//            'ajax' => array(
//                'type'=>'POST',
//                'url'=>CController::createUrl('User/updateCities'), 
//                'dataType'=>'json',
//                'data'=>array('idProvince'=>'js:this.value'),  
//                'success'=>'function(data) {
//                    $("#idCity").html(data.dropDownCities);
//                    $("#'.CHtml::activeId($model, "idDistrict").'").html(data.dropDownDistricts);
//                }',
//    ))); ?>
 
    <?php 
    $models = program::model()->findAll();

     $list = CHtml::listData($models, 'progid', 'progname');
    echo CHtml::dropDownList('progname','', $list ,
        array(
             'empty'=>'Select Program Name',
            'ajax' => array(
                'type'=>'POST', 
                'url'=>CController::createUrl('firstprogram'), 
                'update'=>'#programtype', 
                'data'=>array('progname'=>'js:this.value'),
    ))); ?>
 
 
   <?php  echo CHtml::dropDownList('programtype','', array() ,array('empty'=>'Select Program Type' )); ?>
 
 
    
    </div>
                      




 


 
                        



                   
    <?php $this->endWidget(); ?>
    </div><!-- end container-->
    