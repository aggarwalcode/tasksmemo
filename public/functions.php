<?php
/**
 * Verify transaction is authentic
 *
 * @param array $data Post data from Paypal
 * @return bool True if the transaction is verified by PayPal
 * @throws Exception
 */

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

function verifyTransaction($data) {
	global $paypalUrl;
	$req = 'cmd=_notify-validate';
	foreach ($data as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
		$req .= "&$key=$value";
	}
	$ch = curl_init($paypalUrl);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSLVERSION, 6);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
	$res = curl_exec($ch);
	if (!$res) {
		$errno = curl_errno($ch);
		$errstr = curl_error($ch);
		curl_close($ch);
		throw new Exception("cURL error: [$errno] $errstr");
	} 
	$info = curl_getinfo($ch);
	// Check the http response
	$httpCode = $info['http_code'];
	if ($httpCode != 200) {
		throw new Exception("PayPal responded with http code $httpCode");
	}
	curl_close($ch);
	return $res === 'VERIFIED';
}
/**
 * Check we've not already processed a transaction
 *
 * @param string $txnid Transaction ID
 * @return bool True if the transaction ID has not been seen before, false if already processed
 */
function checkTxnid($data) {
	$serviceAccount = ServiceAccount::fromJsonFile('../assignmentsmemo-af86443b7b6b.json');

	$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();

	$database = $firebase->getDatabase();
	
	//	Post Data To Firebase
	$uIdFbase = $data['custom'];
	$txn_id = $data['txn_id'];

	$reference = $database->getReference('tasks/'.$uIdFbase. 'txn_id');
	$snapshot = $reference->getSnapshot();
	$value = $snapshot->getValue();

	return $value === $data['txn_id'];	
}
/**
 * Add payment to database
 *
 * @param array $data Payment data
 * @return int|bool ID of new payment or false if failed
 */
function addPayment($data) {

	$serviceAccount = ServiceAccount::fromJsonFile('../assignmentsmemo-af86443b7b6b.json');

	$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();

	$database = $firebase->getDatabase();

	
	//	Post Data To Firebase
	$uIdFbase = $data['custom'];

	$payment_status_var = $data['payment_status'];
	if($data['payment_status'] == "Completed"){
		$payment_status_var = "Confirmed";
	}
	$newPost = $database
	->getReference('tasks/'.$uIdFbase)
	->update([
		'taskStatus' => $payment_status_var,
	]);

	$newPost = $database
	->getReference('tasks/'.$uIdFbase)
	->update([
		'txn_id' => $data['txn_id'],
	]);

	return true;
}
?>