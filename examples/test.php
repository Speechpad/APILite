<?php

include_once '../bootstrap.php';

/** TEST CALL **/
echo '<h2>Begin test Call</h2>';

$params = array(
	'service_name' => 'account',
	'service_version' => '1.0.0',
	'format' => 'json',
	'method' => 'get',
	'operation' => 'test',
	'value' => '123'
);

$APILite = new \Speechpad\APILite($accessKey, $secretKey, $restURI);

$result = $APILite->call($params);

dumpResult($result);
/** /TEST CALL **/