<?php defined('SYSPATH') or die('No direct script access.');

// Static file serving (CSS, JS, images)
Route::set('simpleauth/assets', 'simpleauth/assets(/<file>)', array('file' => '.+'))
	->defaults(array(
		'controller' => 'simpleauth',
		'action'     => 'assets',
		'file'       => NULL,
	));