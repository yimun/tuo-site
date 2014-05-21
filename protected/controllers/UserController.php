<?php

class UserController extends Controller
{
	/*
	 * 管理用户
	 */
	public function actionAdmin()
	{
		$this->render('admin');
	}

	/*
	 * 注册用户
	 */
	public function actionCreate()
	{
		$model=new User;
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if(User::model()->find('LOWER(name)=?',array($model->attributes['name'])))
			{
				Yii::app()->user->setFlash('error', '<strong>用户已存在!&nbsp;</strong>请换一个用户名.');
			}
			else
			{
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionView()
	{
		$this->render('view');
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users 
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user 
				'actions'=>array('view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user 
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
 			array('deny',  // deny all users
				'users'=>array('*'),
			), 
		);
	}
	// Uncomment the following methods and override them if needed
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
		
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
			/* 'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			), */
		);
	}
	/*

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}