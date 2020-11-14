<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'HAISTAR',
	'theme'=>'GentelellaMaster',
	'preload'=>array('log'),
	'defaultController' =>'site/index',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.extensions.YiiMailer.YiiMailer',
		'application.extensions.ekeepselection.*',
	),

	'aliases'=>array(
		'xupload'=>'ext.xupload',
	),

	'modules'=>array(
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'anukuda',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'privilege'=>array(
			'class'=>'application.components.EWebUser',
		),

		'custom'=>array(
			'class'=>'application.components.Custom',
		),

		'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
            'driver'=>'GD',
            'params'=>array('directory'=>'/opt/local/bin'),
        ),

		'user'=>array(
			'allowAutoLogin'=>true,
		),

		'email'=>array(
			'class'=>'application.extensions.email.Email',
			'delivery'=>'php',
		),

		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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
			'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    'htmlOptions' => array(
                        'class' => 'pagination'
                    ),
                    'header' => false,
                    'maxButtonCount' => 5,
                    'cssFile' => false,
                ),
            	'CGridView' => array(
                    'htmlOptions' => array(
                        'class' => 'table-responsive'
                    ),
                    'pagerCssClass' => 'dataTables_paginate paging_simple_numbers',
                    'itemsCssClass' => 'table table-striped jambo_table bulk_action',
                    'cssFile' => false,
                    'summaryCssClass' => 'dataTables_info',
                    'summaryText' => 'Showing {start} to {end} of {count} entries',
                    'template' => '{items}<div class="row"><div class="col-md-12 col-sm-12">{summary}</div><div class="col-md-7 col-sm-12">{pager}</div></div><br />',
                ),
	),
),
		),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
