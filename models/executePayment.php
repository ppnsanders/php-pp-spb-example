<?php
/* Execute Payment Model
 * File: /models/executePayment.php
 * Function: executePayment(object)
 *
 * @params [object]$body
 * @return [object]$result
 */
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

function executePayment($apiContext, $body) {
	$payment = Payment::get($body->id, $apiContext);

	$execution = new PaymentExecution();
	$execution->setPayerId($body->payer->payer_info->payer_id);

	$transaction = new Transaction();
	$amount = new Amount();
	$details = new Details();

	//The shipping and tax amounts would be set based on the
	//shipping method/location of the consumer.
	//I'm hard-coding here as a simple example.
	$details->setShipping(2.2)
			->setTax(1.3);

	$details->setSubtotal($body->transactions[0]->amount->total);

	$totalAmount = $body->transactions[0]->amount->total + 3.5;

	$amount->setCurrency($body->transactions[0]->amount->currency);
	$amount->setTotal($totalAmount);
	$amount->setDetails($details);
	$transaction->setAmount($amount);

	$execution->addTransaction($transaction);

	try {
		$result = $payment->execute($execution, $apiContext);
		return $result;
	} catch (Exception $ex) {
		return $ex;
	}

}
?>