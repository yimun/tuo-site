<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $pass
 * @property string $sign
 * @property string $face
 * @property integer $sex
 * @property string $birthday
 * @property string $location
 * @property integer $eiocount
 * @property integer $fanscount
 * @property integer $score
 * @property string $uptime
 */
class User extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, pass, birthday, sex', 'required'),
			array('sex, eiocount, fanscount, score', 'numerical', 'integerOnly'=>true),
			array('name, pass, sign, face, location', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, pass, sign, face, sex, birthday, location, eiocount, fanscount, score, uptime', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '用户名',
			'pass' => '密码',
			'sign' => '个人说明',
			'face' => '头像',
			'sex' => '性别',
			'birthday' => '出生年月',
			'location' => '地区',
			'eiocount' => 'Eiocount',
			'fanscount' => 'Fanscount',
			'score' => 'Score',
			'uptime' => 'Uptime',
			'verifyCode' => '验证码',
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
		//$criteria->compare('name',$this->name,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('sign',$this->sign,true);
		$criteria->compare('face',$this->face,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('eiocount',$this->eiocount);
		$criteria->compare('fanscount',$this->fanscount);
		$criteria->compare('score',$this->score);
		$criteria->compare('uptime',$this->uptime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
