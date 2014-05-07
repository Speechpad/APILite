APILite
=======

## Usage Examples

### Instantiating the class

	include_once '/path/to/Speechpad/APILite.php';
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

There are a handful of example scripts provided to illustrate some basic usage of the Speechpad API.

All examples below assume:

 - you have valid keys in config.local.php (see config.example.php)
 - are running the scripts on a web server
 - are making requests to the examples provided

**NOTE: We recommend running the examples against the sandbox endpoint only.  Any usage against the production endpoint may result in your account being invoiced or charged.**

### test

http://path/to/examples/test.php

### add_media_url

http://path/to/examples/add_media_url.php?url=https://www.speechpad.com/is_a.mp3

(Replace https://www.speechpad.com/is_a.mp3 with a public URL to your own media.)

### transcription_status

http://path/to/examples/transcription_status.php?audio_id=12345,12346

(Replace "12345,12346" with the ID (or comma-separated list of IDs) of the media you are checking.)

### get_transcript

http://path/to/examples/get_transcription.php?audio_id=12345

(Replace 12345 with **one** ID of the media you are checking.)