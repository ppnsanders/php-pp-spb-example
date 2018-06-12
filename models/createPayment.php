<?php
/* Create Payment Model
 * File: /models/createPayment.php
 * Function: createPayment(object)
 *
 * @params [object]$body
 * @return [object]$result
 */
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

function createPayment($apiContext, $pmtObj) {

	$payer = new Payer();
	$payer->setPaymentMethod('paypal');

	$amount = new Amount();
	$amount->setTotal($pmtObj->total);
	$amount->setCurrency('USD');

	$transaction = new Transaction();
	$transaction->setAmount($amount);

	$items = array();
	foreach($pmtObj->items as $itemObj) {
		foreach($itemObj as $key => $value) {
			$i = 0;
			$tmpItem = new Item();
			if($key === 'name') { $tmpItem->setName($value); }
			elseif($key === 'currency') { $tmpItem->setCurrency($value); }
			elseif($key === 'description') { $tmpItem->setDescription($value); }
			elseif($key === 'price') { $tmpItem->setPrice($value); }
			elseif($key === 'quantity') { $tmpItem->setQuantity($value); }
			elseif($key === 'sky') { $tmpItem->setSku($value); }
			else{ 
				//not sure what happened here...
			}
			if($i < count($pmtObj->items)) {
				$i++;
			} else {
				array_push($items, $tmpItem);
				$tmpItem = null;
			}
		}
	}

	$itemList = new ItemList();
	$itemList->setItems($items);
	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl('http://localhost:8888/return');
	$redirectUrls->setCancelUrl('http://localhost:8888/cancel');

	$payment = new Payment();
	$payment->setIntent('sale');
	$payment->setPayer($payer);
	$payment->setTransactions(array($transaction));
	$payment->setRedirectUrls($redirectUrls);

	try {
		$payment->create($apiContext);
		return $payment;
	} catch(Exception $ex) {
		return $ex;
	}
}

?>