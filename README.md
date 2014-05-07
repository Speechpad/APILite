APILite
=======

## Usage Examples

	$APILite = new \Speechpad\APILite($accessKey, $secretKey, $restURI);

	// Make a generic call (all parameters required for the call in $params)
	$result = $APILite->call($params);

### Making a test call

	// see examples/test.php

	$params = array(
    	'service_name' => 'account',
    	'service_version' => '1.0.0',
    	'format' => 'json',
    	'method' => 'get',
    	'operation' => 'test',
    	'value' => '123'
    )

	$result = $APILite->call($params);

## Using the Pre-made Example Scripts

There are a handful of example scripts in the examples folder which illustrate some basic usage of the Speechpad API.

All examples below assume:

 - you have valid keys in config.local.php (see config.example.php)
 - are running the scripts on a web server
 - are making requests to the examples provided.

### test

http://path/to/examples/test.php

### add_media_url

http://path/to/examples/add_media_url.php?url=https://www.speechpad.com/is_a.mp3

(replace https://www.speechpad.com/is_a.mp3 with a public URL to your own media)

