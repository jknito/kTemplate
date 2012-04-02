<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'kTemplate',

	// preloading 'log' component
	'preload'=>array('log', 'kint'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'changeme',
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                //'bootstrap.gii',
            ),
		),
        'user',
        'rights'=>array(
            //'install'=>true,
            'enableBizRule'=>false,
		),
	),

	// application components
	'components'=>array(
		'kint' => array(
			'class' => 'ext.Kint.Kint',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
            'class'=>'RWebUser',
		),
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js'=>false,
                'jquery.min.js'=>false,
                'core.css'=>false,
                'styles.css'=>false,
                'pager.css'=>false,
                'default.css'=>false,
            ),
            'packages'=>array(
                'jquery'=>array(
                    'baseUrl'=>'bootstrap/',
                    'js'=>array('js/jquery-1.7.2.min.js'),
                ),
                'bootstrap'=>array(
                    'baseUrl'=>'bootstrap/',
                    'js'=>array('js/bootstrap.min.js'),
                    'css'=>array(
                        'css/bootstrap.min.css',
                        'css/custom.css',
                        'css/bootstrap-responsive.min.css',
                    ),
                    'depends'=>array('jquery'),
                ),
            ),
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
        ),
		'urlManager'=>array(
            'showScriptName' => false,
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=ktemplate',
			'emulatePrepare' => true,
			'username' => 'ktemplate',
			'password' => 'ktemplate',
			'charset' => 'utf8',
            'enableParamLogging' => true,
            'enableProfiling' => true,
		),
		'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                    'ipFilters'=>array('127.0.0.1'),
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);