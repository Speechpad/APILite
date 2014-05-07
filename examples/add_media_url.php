<?php

include_once '../bootstrap.php';

$url = $_GET['url'];

$params = array(
	'service_name' => 'account',
	'service_version' => '1.0.0',
	'format' => 'json',
	'method' => 'post',
	'operation' => 'add_media_url',
	'url' => $url
);

$APILite = new \Speechpad\APILite($accessKey, $secretKey, $restURI);

$result = $APILite->call($params);

dumpResult($result);