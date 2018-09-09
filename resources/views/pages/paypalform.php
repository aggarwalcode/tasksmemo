<?php

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$serviceAccount = ServiceAccount::fromJsonFile('../assignmentsmemo-af86443b7b6b.json');

$firebase = (new Factory)
->withServiceAccount($serviceAccount)
->create();

$database = $firebase->getDatabase();

    //  Post Data To Firebase
$uIdFbase = $fBaseId[0];

$reference = $database->getReference('tasks/'.$uIdFbase);
$snapshot = $reference->getSnapshot();
$value = $snapshot->getValue();

$name = explode(" ", $value['name'])
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test</title>
</head>
<body>

    <form class="paypal" action="payments.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        First Name: 
        <input type="text" name="first_name" value="<?php echo $name[0];?>" /><br><br>

        Last Name:
        <input type="text" name="last_name" value="<?php try {echo $name[1];}catch(Exception $e){}?>" /><br><br>

        Email:
        <input type="text" name="payer_email" value="<?php echo $value['email'];?>" /><br><br>

        Item Name:    
        <input type="text" name="item_name" value="Test Item" /><br><br>

        Item Number:
        <input type="hidden" name="item_number" value="<?php echo $value['fBaseId'];?>" / ><br><br>

        Total Amount:    
        <input type="text" name="amount_total" value="<?php echo $value['amount'];?>" / ><br><br>    

        Country:    
        <input type="text" name="country" value="<?php echo $value['country'];?>" / ><br><br>

        Currency:    
        <input type="text" name="currency" value="<?php echo $value['currency'];?>" / ><br><br>   

        Invoice Amount:    
        <input type="text" name="amount" value="<?php echo $value['invoiceAmt'];?>" / ><br><br> 

        Task Status:    
        <input type="text" name="taskStatus" value="<?php echo $value['taskStatus'];?>" / ><br><br>

        Time:    
        <input type="text" name="timestamp" value="<?php echo $value['timestamp'];?>" / ><br><br>

        Word Count:    
        <input type="text" name="wordCount" value="<?php echo $value['wordCount'];?>" / ><br><br>

        <input type="hidden" name="payer_id" value="<?php echo $value['fBaseId'];?>"/ ><br><br>

        Order Id:    
        <input type="text" name="payer_id" value="<?php echo $fBaseId[0];?>"/ ><br><br>

        <input type="hidden" name="custom" value="<?php echo $fBaseId[0];?>"/ ><br><br>

        <input type="submit" name="submit" value="Submit Payment"/><br><br>
    </form>

</body>
</html>
