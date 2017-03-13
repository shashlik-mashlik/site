<?php
class cHotp
{
	var $_user;			// Current user
	var $_token;		// Current token
	
	function cHotp()
	{
		$this->smth = "";
	}
	
	function authOTP($secret, $pass, $cnt, $window = 10)
	{ 
		if(preg_match("/(\\d{6})$/", $pass)) 
		{
			$cnt = intval($cnt) + 1;
			$i = 0;
			while($i < $window) 
			{

				if($this->hotp($secret, $cnt) == $pass) 
				{	
					return $cnt;
				}
			$cnt++;
			$i++; 
			}
		}	
	}
  
	function hmac_sha1($data, $key)
	{
		if(function_exists('hash_hmac')) 
		{
			return hash_hmac('sha1', $data, $key);
		}
		if(strlen($key) > 64) 
		{
			$key = pack('H*', sha1($key));
		}

		$key = str_pad($key, 64, chr(0x00));
		$ipad = str_repeat(chr(0x36), 64);
		$opad = str_repeat(chr(0x5c), 64);
		$hmac = pack('H*',sha1(($key^$opad).pack('H*',sha1(($key^$ipad).$data))));
		return bin2hex($hmac);
	}

	function hotp($secret, $cnt, $digits = 6)
	{
		$secret  = pack('H*', $secret);
		$sha1_hash = $this->hmac_sha1(pack("NN", 0, $cnt), $secret);				
		$dwOffset = hexdec(substr($sha1_hash, -1, 1));
		$dbc1   = hexdec(substr($sha1_hash, $dwOffset * 2, 8 ));
		$dbc2   = $dbc1 & 0x7fffffff;
		$hotp   = $dbc2 % pow(10, $digits);
		return $hotp;
	}
}
?>