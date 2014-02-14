<?php

/**
 * This is the model class for table "t_news".
 *
 * The followings are the available columns in table 't_news':
 * @property integer $newsid
 * @property string $newscat
 * @property string $newstype
 * @property string $newstitle
 * @property string $news
 * @property string $fromdate
 * @property string $expirydate
 * @property string $cruddate
 * @property integer $crudby
 */
class TNews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('newscat, newstype, newstitle, news, fromdate, expirydate, cruddate, crudby', 'required'),
			array('crudby', 'numerical', 'integerOnly'=>true),
			array('newscat, newstype', 'length', 'max'=>50),
			array('newstitle', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('newsid, newscat, newstype, newstitle, news, fromdate, expirydate, cruddate, crudby', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'newsid' => 'Newsid',
			'newscat' => 'Newscat',
			'newstype' => 'Newstype',
			'newstitle' => 'Newstitle',
			'news' => 'News',
			'fromdate' => 'Fromdate',
			'expirydate' => 'Expirydate',
			'cruddate' => 'Cruddate',
			'crudby' => 'Crudby',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('newsid',$this->newsid);
                
               //  $criteria->addSearchCondition('newsid',$id);
		$criteria->compare('newscat',$this->newscat,true);
		$criteria->compare('newstype',$this->newstype,true);
		$criteria->compare('newstitle',$this->newstitle,true);
		$criteria->compare('news',$this->news,true);
		$criteria->compare('fromdate',$this->fromdate,true);
		$criteria->compare('expirydate',$this->expirydate,true);
		$criteria->compare('cruddate',$this->cruddate,true);
		$criteria->compare('crudby',$this->crudby);
//               var_dump( $this->newsid);
//               die();
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                    
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
