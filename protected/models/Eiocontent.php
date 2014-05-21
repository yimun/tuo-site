<?php

/**
 * This is the model class for table "eiocontent".
 *
 * The followings are the available columns in table 'eiocontent':
 * @property integer $id
 * @property integer $eioid
 * @property integer $questionnum
 * @property string $question
 * @property string $answerA
 * @property string $answerB
 * @property string $answerC
 * @property string $answerD
 * @property string $answerE
 * @property string $trueanswer
 */
class Eiocontent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eiocontent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eioid, questionnum, question, trueanswer', 'required'),
			array('eioid, questionnum', 'numerical', 'integerOnly'=>true),
			array('answerE', 'length', 'max'=>100),
			array('trueanswer', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, eioid, questionnum, question, answerA, answerB, answerC, answerD, answerE, trueanswer', 'safe', 'on'=>'search'),
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
			'eio' => array(self::BELONGS_TO, 'Eio', 'eioid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'eioid' => 'Eioid',
			'questionnum' => '回答数量',
			'question' => '问题描述',
			'answerA' => '选项A:',
			'answerB' => '选项B:',
			'answerC' => '选项C:',
			'answerD' => '选项D:',
			'answerE' => '选项E:',
			'trueanswer' => '正确回答',
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
		$criteria->compare('eioid',$this->eioid);
		$criteria->compare('questionnum',$this->questionnum);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answerA',$this->answerA,true);
		$criteria->compare('answerB',$this->answerB,true);
		$criteria->compare('answerC',$this->answerC,true);
		$criteria->compare('answerD',$this->answerD,true);
		$criteria->compare('answerE',$this->answerE,true);
		$criteria->compare('trueanswer',$this->trueanswer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Eiocontent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
