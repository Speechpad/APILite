<?php

/**
 * Checks and loads config variables and sets up any other necessary requirements.
 */

$here =  __DIR__.'/';
include_once "{$here}Speechpad/APILite.php";
include_once "{$here}functions.php";

$localConfigPath = "{$here}config.local.php";

if (!file_exists($localConfigPath)) {
	print_r("{$localConfigPath} is missing.  Please see instructions in config.example.php.");
	die;
}

include_once $localConfigPath;

if (empty($environments[$env])) {
	print_r("Environment '{$env}' is missing or not configured in {$localConfigPath}.  Please see instructions in config.example.php.");
	die;
}

if (empty($environments[$env]['access_key']) || empty($environments[$env]['secret_key'])) {
	print_r("access_key and/or secret_key are missing or not configured in {$localConfigPath} for environment '{$env}'.  Please see instructions in config.example.php.");
	die;
}

$restURI = $environments[$env]['rest_uri'];		// Speechpad API Endpoint
$accessKey = $environments[$env]['access_key'];	// Customer's access_key
$secretKey = $environments[$env]['secret_key']; 	// Customer's secret_key - Used for signing.  Do not send this along with your API requests