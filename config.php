<?php
	return array(
		/**
		* Set layout for each action page
		* you can define eg. create,view,admin to apply layout for all pages with these names
		* also you can use controller/action to apply layout for specific page only
		**/
		'layout'=>array(
			array('create','application.modules.admin.views.layouts.admin'),
		),
		'params'=>array(
			'siteName'=>'Example.com',
			'siteUrl'=>'http://example.com',
			'facebookUrl'=>'#', // facebook fan page url
			'twitterUrl'=>'#', // twitter fan page url
		)
	);
?>