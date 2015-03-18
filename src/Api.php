<?php
namespace N8G\Api;

use N8G\Api\ApiAbstract,
	N8G\Utils\Json,
	N8G\Utils\Log;

require_once '../vendor/autoload.php';

/**
 * 
 *
 * @author  Nick Green <nick-green@live.co.uk>
 */
class Api extends ApiAbstract
{
	protected $User;

	public function __construct($request, $origin)
	{
		parent::__construct($request);

		// Abstracted out for example
		//$APIKey = new Models\APIKey();
		//$User = new Models\User();

		// if (!array_key_exists('apiKey', $this->request)) {
		// 	throw new \Exception('No API Key provided');
		// } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
		// 	throw new \Exception('Invalid API Key');
		// } else if (array_key_exists('token', $this->request) &&
		// 	!$User->get('token', $this->request['token'])) {

		// 	throw new \Exception('Invalid User Token');
		// }

		//$this->User = $User;
	}

	/**
	 * Example of an Endpoint
	 */
	// protected function example() {
	// 	if ($this->method == 'GET') {
	// 		return "Your name is " . $this->User->name;
	// 	} else {
	// 		return "Only accepts GET requests";
	// 	}
	// }

	protected function version()
	{
		return array('API Version' => '0.0.1');
	}
}

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
	$_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
	$API = new Api($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
	echo $API->processAPI();
} catch (\Exception $e) {
	echo json_encode(Array('error' => $e->getMessage()));
}