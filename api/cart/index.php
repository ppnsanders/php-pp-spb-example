<?php
/* Products API Service
 * File: /api/cart/index.php
 *
 * Supported Paths/Functions
 *
 * 1. GET - /api/cart/index.php/items/<count>
 * 
 *  Where "<count>" is an integer. e.g. /api/cart/index.php/items/2
 * 
 * Example Response Array:  
 * [
 *		{ 
 *			"name": "Widget - 1",
 *			"sku": "1-5b201cef4450b",
 *			"price":"97",
 *			"currency":"USD",
 *			"quantity":"5",
 *			"category":"PHYSICAL",
 *			"description":"Brand new Widget 1"
 *		},
 *		{
 *			"name":"Widget - 2",
 *			"sku":"2-5b201cef4455e",
 *			"price":"56",
 *			"currency":"USD",
 *			"quantity":"3",
 *			"category":"PHYSICAL",
 *			"description":"Brand new Widget 2"
 *		}
 * ]
 *
 *@return array() $items
 */

$method = $_SERVER['REQUEST_METHOD'];

if(!isset($_SERVER['PATH_INFO'])){
	//if there isn't a path beyond `index.php/` 
	//return an HTTP response of 404.
	header("HTTP/1.0 404 Not Found");
	die();
} else {
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	if($method === 'GET' && $request[0] === "items") {
		$number_of_items = $request[1];
		$items = array();
		for($i = 1; $i <= $number_of_items; $i++) {
			$item = createItem($i);
			array_push($items, $item);
			if($i >= $number_of_items) {
				echo json_encode($items);
			}
		}
	} else {
		//invalid request - return an HTTP 404
		header("HTTP/1.0 404 Not Found");
		die();
	}
}

/* createItem(int)
 * 
 * Simple function that returns and Object containing Item properties.
 *
 * @params integer
 *
 * @returns JSON Object
 */
function createItem($itemNumber) {
	$uuid = uniqid((string)$itemNumber . '-');
	$amount = (string)rand(5, 99);
	$qty = (string)rand(1, 5);
	$name = "Widget - " . (string)$itemNumber;
	$description = "Brand new Widget " . (string)$itemNumber;
	$tmpAr = array("name" => $name, "sku" => $uuid, "price" => $amount, "currency" => "USD", "quantity" => $qty, "category" => "PHYSICAL", "description" => $description);
	$itemJson = json_encode($tmpAr, JSON_FORCE_OBJECT);
	return $itemJson;
}
?>