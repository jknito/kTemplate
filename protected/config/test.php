<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
        'preload'=>array('log', 'kint'),
        'modules'=>array(
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'changeme',
                'ipFilters'=>array('127.0.0.1','::1'),
                'generatorPaths'=>array(
                    //'system.gii.generators',
                    //'application.gii',
                    'ext.giibootstrap',
                ),
            ),
        ),
		'components'=>array(
            'kint' => array(
                'class' => 'ext.Kint.Kint',
            ),
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
            'urlManager'=>array(
                'showScriptName' => true,
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                        'ipFilters'=>array('127.0.0.1'),
                    ),
                ),
            ),
		),
	)
);
