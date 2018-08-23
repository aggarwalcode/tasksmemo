<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paypal Integration Test - Success</title>
</head>
<body>

	<h1>Successful Payment</h1>

	<?php

	require '../vendor/autoload.php';


	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;

	echo __DIR__;
	$serviceAccount = ServiceAccount::fromJsonFile('../assignmentsmemo-af86443b7b6b.json');

	$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();

	$database = $firebase->getDatabase();

	
	//	Post Data To Firebase
	$var = "-LEstkoQfur8Q57HoQbZ";

	$newPost = $database
	->getReference('tasks/'.$var)
	->update([
		'taskStatus' => 'completed',
	]);

	?>

</body>
</html>