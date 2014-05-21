<?php

/**
 * This is the model class for table "eio".
 *
 * The followings are the available columns in table 'eio':
 * @property integer $id
 * @property integer $typeid
 * @property integer $classifyid
 * @property string $icon
 * @property string $title
 * @property string $describe
 * @property string $author
 * @property integer $questioncount
 * @property string $levelA
 * @property string $levelB
 * @property string $levelC
 * @property string $levelD
 * @property integer $didcount
 * @property integer $praisecount
 * @property integer $stampcount
 * @property string $publishtime
 * @property string $uptime
 */
class Eio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeid,classifyid, describe, title, levelA, levelB, levelC, levelD ,questioncount', 'required'),
			array('typeid, questioncount, didcount, praisecount, stampcount', 'numerical', 'integerOnly'=>true),
			array('icon, title, author', 'length', 'max'=>100),
			array('publishtime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, typeid, classifyid, icon, title, author, questioncount, levelA, levelB, levelC, levelD, didcount, praisecount, stampcount, publishtime, uptime', 'safe', 'on'=>'search'),
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
			'eiotype' => array(self::BELONGS_TO, 'Eiotype', 'typeid'),
			'eioclassify' => array(self::BELONGS_TO, 'Eioclassify', 'classifyid'),
			'eiocontent' => array(self::HAS_MANY, 'Eiocontent', 'eioid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'typeid' => '问题类型',
			'eiotype.cnname' => '问题类型',
			'eioclassify.name' => '所属类别',
			'classifyid' => '所属类别',
			'icon' => 'Icon',
			'title' => '问卷名称',
			'describe' => '问卷描述',
			'author' => '发布者',
			'questioncount' => '问题数目',
			'levelA' => 'Level A',
			'levelB' => 'Level B',
			'levelC' => 'Level C',
			'levelD' => 'Level D',
			'didcount' => '已做',
			'praisecount' => '赞',
			'stampcount' => '踩',
			'publishtime' => '发布时间',
			'uptime' => '更新时间',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('typeid',$this->typeid);
		$criteria->compare('classifyid',$this->classifyid);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('questioncount',$this->questioncount);
		$criteria->compare('levelA',$this->levelA,true);
		$criteria->compare('levelB',$this->levelB,true);
		$criteria->compare('levelC',$this->levelC,true);
		$criteria->compare('levelD',$this->levelD,true);
		$criteria->compare('didcount',$this->didcount);
		$criteria->compare('praisecount',$this->praisecount);
		$criteria->compare('stampcount',$this->stampcount);
		$criteria->compare('publishtime',$this->publishtime,true);
		$criteria->compare('uptime',$this->uptime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Eio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getHotData()
	{
		/* $criteria->with=array(
			'author.profile',
			'author.posts',
			'categories',
		); */
		return new CActiveDataProvider($this, array(
			//'criteria'=>$criteria,
			'criteria'=>array(
				//'condition'=>'status=1',
				'order'=>'praisecount DESC',
				'with'=>array('eioclassify','eiotype'),
			),
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
	}
	
	public function getUserData()
	{

		return new CActiveDataProvider($this, array(
			//'criteria'=>$criteria,
			'criteria'=>array(
				'condition'=>"author='".Yii::app()->user->name."'",
				'order'=>'uptime DESC',
			),
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
	}
}
