<?php
class Fetch
{
	public function get($url)
	{
		$url = $this->resolve_domain($url);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		if (curl_errno($ch)) {
			echo array('error' => 'Error: ' . curl_error($ch));
		}

		curl_close($ch);
		return json_decode(json_encode($output), true);
	}

	public function resolve_data($data)
	{
		return json_decode(json_encode($data), true);
	}

	private function resolve_domain($url)
	{
		$domain = $_SERVER['HTTP_HOST'];
		$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
		return $protocol . $domain . $url;
	}
}

return new Fetch();
