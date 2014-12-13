 <?php
 /**
 FUNCTION: ffl_HttpGet()
 * Perform a HTTP Get Request.
 *
 * ffl_HttpGet uses fsockopen() to request a given URL via HTTP
 * 1.0 GET and returns a three element array.  On success, array
 * key 'body' contains the body of the request's reply and key
 * 'header' contains the reply's headers.  On error, the keys
 * returned are 'errornumber' and 'errorstring' from
 * fsockopen()'s third and fourth arguments.  In either case,
 * key 'url' contains an array such as returned from parse_url()
 * after the input url has been massaged a bit.
 *
 * {@source }
 *
 * @param string $url URL to fetch.
 * @param boolean $followRedirects Optionally follow 
 * 'location:' in header, default true.
 * @return array 'header', 'body', 'url' OR 'errorstring',
 * 'errornumber', 'url'.
 */
 
class httpGet {

	function ffl_HttpGet( $url, $followRedirects=true ) {
		$url_parsed = parse_url($url);
		
		if ( empty($url_parsed['scheme']) ) {
			$url_parsed = parse_url('http://'.$url);
		}
		$rtn['url'] = $url_parsed;

		$port = $url_parsed["port"];
		if ( !$port ) {
			$port = 80;
		}
		$rtn['url']['port'] = $port;
		
		$path = $url_parsed["path"];
		if ( empty($path) ) {
				$path="/";
		}
		if ( !empty($url_parsed["query"]) ) {
			$path .= "?".$url_parsed["query"];
		}
		$rtn['url']['path'] = $path;

		$host = $url_parsed["host"];
		$foundBody = false;

		$out = "GET $path HTTP/1.0\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Connection: Close\r\n\r\n";

		if ( !$fp = @fsockopen($host, $port, $errno, $errstr, 30) ) {
			$rtn['errornumber'] = $errno;
			$rtn['errorstring'] = $errstr;
			return $rtn;
		}
		fwrite($fp, $out);
		while (!feof($fp)) {
			$s = fgets($fp, 128);
			if ( $s == "\r\n" ) {
				$foundBody = true;
				continue;
			}
			if ( $foundBody ) {
				$body .= $s;
			} else {
				if ( ($followRedirects) && (stristr($s, "location:") != false) ) {
					$redirect = preg_replace("/location:/i", "", $s);
					return ffl_HttpGet( trim($redirect) );
				}
				$header .= $s;
			}
		}
		fclose($fp);

		$rtn['header'] = trim($header);
		$rtn['body'] = trim($body);
		return $rtn;
	}
}


?>
