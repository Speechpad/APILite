<?php

include_once '../bootstrap.php';

$params = array(
	'service_name' => 'account',
	'service_version' => '1.0.0',
	'format' => 'json',
	'method' => 'get',
	'operation' => 'transcription_status',
	'audio_id' => $_GET['audio_id']
);

$APILite = new \Speechpad\APILite($accessKey, $secretKey, $restURI);

$result = $APILite->call($params);

dumpResult($result);