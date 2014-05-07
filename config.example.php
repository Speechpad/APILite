<?php

/**
 * Copy this file to config.local.php in the same path, then add your keys and set the appropriate environment.
 */

$environments = array(
	'sandbox' => array(
		'rest_uri'		=> 'http://dev.speechpad.com/services',
		'access_key'	=> '',
		'secret_key'	=> ''
	),
	'production' => array(
		'rest_uri'		=> 'https://www.speechpad.com/services',
		'access_key'	=> '',
		'secret_key'	=> ''
	)
);

$env = 'sandbox';