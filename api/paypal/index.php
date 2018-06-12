<?php
/* PayPal API Service
 * File: /api/paypal/index.php
 *
 * Supported Paths/Functions
 *
 * 1. POST - /api/paypal/index.php/create -> https://developer.paypal.com/docs/api/payments/#payment_create
 * 2. GET - /api/paypal/index.php/query/<PaymentId> -> https://developer.paypal.com/docs/api/payments/#payment_get
 * 3. GET - /api/paypal/index.php/execute/<PaymentId> -> https://developer.paypal.com/docs/api/payments/#payment_execute
 */
$apiContext = require('bootstrap.php');
include('../../models/createPayment.php');
include('../../models/getPaymentById.php');
include('../../models/executePayment.php');
$method = $_SERVER['REQUEST_METHOD'];

if(!isset($_SERVER['PATH_INFO'])){
	//if there isn't a path beyond `index.php/` 
	//return an HTTP response of 404.
	header("HTTP/1.0 404 Not Found");
	die();
} else {
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	
	if($method === 'POST' && $request[0] === 'create') {
		/* Call createPayment() via createPayment.php - Model
		 * Then echo the response back to the API Caller.
		 * Endpoint Requested: POST /api/paypal/index.php/create
		 */
		$body = json_decode(file_get_contents('php://input'), false);
		$response = createPayment($apiContext, $body);
		echo $response;
	} elseif($method === 'POST' && $request[0] === 'execute') {
		/* Call executePayment() via executePayment.php - Model
		 * Then echo the response back to the API Caller.
		 * Endpoint Requested: POST /api/paypal/index.php/execute/<PaymentId>
		 */
		$body = json_decode(file_get_contents('php://input'), false);
		$response = executePayment($apiContext, $body);
		echo $response;
	} elseif($method === 'GET' && $request[0] === 'query' && isset($request[1])) {
		/* Call getPayment() via getPayment.php - Model
		 * Then echo the response back to the API Caller.
		 * Endpoint Requested: GET /api/paypal/index.php/query/<PaymentId>
		 */
		$response = getPayment($apiContext, $request[1]);
		echo $response;
	} else {
		//if an API Endpoint other than those supported is called.
		//return an HTTP response of 404
		header("HTTP/1.0 404 Not Found");
		die();
	}
}


?>