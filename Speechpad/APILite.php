<?php

namespace Speechpad;

class APILite
{

	protected $_accessKey = null;
	protected $_secretKey = null;
	protected $_restURI = null;

	public function __construct($accessKey, $secretKey, $restURI)
	{
		$this->_accessKey = $accessKey;
		$this->_secretKey = $secretKey;
		$this->_restURI = $restURI;
	}

	private function _hmacSha1($s) {
		return pack("H*", sha1((str_pad($this->_secretKey, 64, chr(0x00)) ^ (str_repeat(chr(0x5c), 64))) .
			pack("H*", sha1((str_pad($this->_secretKey, 64, chr(0x00)) ^ (str_repeat(chr(0x36), 64))) . $s))));
	}


	public function generateSignature($params) {
		if (empty($params['timestamp'])) {
			$params['timestamp'] = gmdate("Y-m-d\TH:i:s\\Z", time());
		}

		ksort($params); // note, changes order of $params array

		$s = implode('', $params); // concatenate sorted parameter values
		$hmac = $this->_hmacSha1($s);
		$params['signature'] = base64_encode($hmac);

		return $params;
	}

	public function call($params)
	{
		$params['access_key'] = $this->_accessKey;
		$params = $this->generateSignature($params);

		$uri = $this->_restURI . '?' . http_build_query($params);

		$ch = curl_init($uri);

		curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

}