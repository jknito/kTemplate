<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
	'import'=>array(
		'application.models.*',
		'application.helpers.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
	),
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=vnadb',
			'emulatePrepare' => true,
			'username' => 'vnauser',
			'password' => 'Furud5s2',
			'charset' => 'utf8',
            'enableParamLogging' => true,
            'enableProfiling' => true,
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);