<?php

/**
 * This is the model class for table "eiotype".
 *
 * The followings are the available columns in table 'eiotype':
 * @property integer $id
 * @property string $typename
 * @property string $cnname
 * @property string $uptime
 */
class Eiotype extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eiotype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typename, cnname, uptime', 'required'),
			array('typename', 'length', 'max'=>100),
			array('cnname', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, typename, cnname, uptime', 'safe', 'on'=>'search'),
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
			'eios' => array(self::HAS_MANY, 'Eio', 'typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'typename' => 'Typename',
			'cnname' => 'Cnname',
			'uptime' => 'Uptime',
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
		$criteria->compare('typename',$this->typename,true);
		$criteria->compare('cnname',$this->cnname,true);
		$criteria->compare('uptime',$this->uptime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Eiotype the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getAllName()
	{
		$all = array();
		$AR = $this->findAll();
		foreach($AR as $ARitem)
		{
			$all[$ARitem['id']] =$ARitem['cnname'];
		}
		return $all;
		
	}
	

	public function getIdByOrder($order)
	{
		return $this->findAll()[$order]['id'];
	}
}
