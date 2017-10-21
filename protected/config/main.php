<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


//###############################
//Bootstrap Setup
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

//'params'=>require(dirname(__FILE__).'/params.php'),
//###############################


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'params'=>require(dirname(__FILE__).'/params.php'),
	//'name'=>'Sistem Informasi Air Tanah dan Air Baku',
	'name'=>'...',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	//###############################
	//Bootstrap Setup
	'theme'=>'bootstrap',
	//###############################
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		//###############################
		//Bootstrap Setup
		'generatorPaths'=>array(
            'bootstrap.gii',
        ),		

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	'language'=>'id',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		//###############################
		//Bootstrap Setup		  
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		//###############################
		//Non aktifkan Kontroler GII Bootstrap Setup
		
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		//###############################	
		
		
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_siatab',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	'theme'=>'bootstrap',
	'modules'=>array(
	'gii'=>array(
	'generatorPaths'=>array(
	'bootstrap.gii',
	),
	),
	)
	
	// application-level parameters that can be accessed
	//using 
	//Yii::app()->params['paramName']
	//'params'=>require(dirname(__FILE__).'/params.php'),
);



?>