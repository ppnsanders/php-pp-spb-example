<?php
/* Get Payment By ID Model
 * File: /models/getPaymentById.php
 * Function: getPayment(string)
 *
 * @params string $paymentId
 * @return [object] $payment
 */
use PayPal\Api\Payment;

function getPayment($apiContext, $paymentId) {
	try {
		$payment = Payment::get($paymentId, $apiContext);
		return $payment;
	} catch (Exception $ex) {
		return $ex;
	}
}
?>