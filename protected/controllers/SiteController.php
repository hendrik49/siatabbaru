<?php

class SiteController extends Controller
{
	public $layout='//layouts/column2';

	/**
	 * Declares class-based actions.
	 */

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
	/*public $modelS;
	public $modelT;
	public $modelH;
	public $modelP;
	public $modelM;*/
	public $modelKota;
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = '//site/landing';
		$model = new LoginForm;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			$model->Tanggal = time();
			Yii::app()->end();
		}


		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->Tanggal = time();
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}*/
		$this->render('landing', array(
			'model'=>$model,

		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionIndexdata()
	{
		$criteria=new CDbCriteria;

		$dataProvider=new CActiveDataProvider('Sumur', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'nama_ws DESC',
			),
			'pagination' => array(
				'pageSize' => 5,
			),
		));

		$this->render('indexdata',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPeraturan()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('peraturan','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('peraturan',array('model'=>$model));
	}
	/**
	 * Displays the login page
	 */
	
	public function actionLogin()
	{
		$this->layout = '//login';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public $sumur;
	public $rumah_pompa;
	public $pompa;
	public $saluran;

	public $dataProvider1;
	public $dataProvider2;
	public $dataProvider3;
	public $dataProvider4;
	public function actionDashboard()
	{
		$model=new Neraca;
		$ii = 1;
		$nilai = 0;
		$dataProvider = KondisiSumur::model()->findAll();
		foreach($dataProvider as $datasumur){
			$ii++;
			if($datasumur->sumur != ""){
				if($datasumur->sumur == "Baik"){
					$nilaisumur[$ii] = + (1 * 0.0773);
				}else if($datasumur->sumur == "Rusak Ringan"){
					$nilaisumur[$ii] =+ (0.5 * 0.0773);
				}else{
					$nilaisumur[$ii] =+ 0;
				}
			}
			if($datasumur->rumah_pompa != ""){
				if($datasumur->rumah_pompa == "Baik"){
					$nilaisumur[$ii] =+ (1 * 0.0773);
				}else if($datasumur->rumah_pompa == "Rusak Ringan"){
					$nilaisumur[$ii] =+ (0.5 * 0.0773);
				}else{
					$nilaisumur[$ii] =+ 0;
				}
			}
			if($datasumur->pompa != ""){
				if($datasumur->pompa == "Baik"){
					$nilaisumur[$ii] =+ (1 * 0.0773);
				}else if($datasumur->pompa == "Rusak Ringan"){
					$nilaisumur[$ii] =+ (0.5 * 0.0773);
				}else{
					$nilaisumur[$ii] =+ 0;
				}
			}
			

		}

		$sql='SELECT count(id),broncaptering FROM t_mataair6 where broncaptering !=" " GROUP BY broncaptering';
		$dataProvider=new CSqlDataProvider($sql,array(
            'keyField' => 'id',
		));
		
		$sql='SELECT count(id),kondisi_sungai FROM t_permukaan6 WHERE kondisi_sungai !=" " GROUP BY kondisi_sungai';
		$dataProvider1=new CSqlDataProvider($sql,array(
			'keyField' => 'id',
		));

		$sql='SELECT count(id),sumur FROM t_sumur6 where sumur !=" " GROUP BY sumur';
		$dataProvider2=new CSqlDataProvider($sql,array(
			'keyField' => 'id',
		));

		$sql='SELECT count(id),reservoar FROM t_hujan5 where reservoar !=" " GROUP BY reservoar';
		$dataProvider3=new CSqlDataProvider($sql,array(
			'keyField' => 'id',
		));

		$sql='SELECT count(id),kondisi_sungai FROM t_tampungan6 where kondisi_sungai !=" " GROUP BY kondisi_sungai';
		$dataProvider4=new CSqlDataProvider($sql,array(
			'keyField' => 'id',
		));

		$this->render('dashboard',array(
			'dataProvider'=>$dataProvider,
			'dataProvider1'=>$dataProvider1,
			'dataProvider2'=>$dataProvider2,
			'dataProvider3'=>$dataProvider3,
			'dataProvider4'=>$dataProvider4,
			'model'=>$model,
		));

	}

	public function actionSetkot()
	{	 
		$modelKota= new Kota;
	   	$data=Kota::model()->findAll('provinsi=:provinsi',
		array(':provinsi'=>(string) $_POST['provinsi']));
		$data=CHtml::listData($data,'kab','kab');
		foreach($data as $value=>$name)
		{
		echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
		}  
	}
}