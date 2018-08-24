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
        <input type="text" name="cmd" value="_xclick" />
        <input type="text" name="no_note" value="1" />
        <input type="text" name="lc" value="UK" />
        <input type="text" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="text" name="first_name" value="Customer's First Name" />
        <input type="text" name="last_name" value="Customer's Last Name" />
        <input type="text" name="payer_email" value="aggarwalcodes@gmail.com" />
        <input type="text" name="item_name" value="ITEM NAME" />
        <input type="text" name="item_number" value="12345" / >    
        <input type="text" name="payer_id" value="<?php echo $fBaseId[0];?>"/ >
        <input type="text" name="custom" value="<?php echo $fBaseId[0];?>"/ >
        
        <input type="submit" name="submit" value="Submit Payment"/>
    </form>

</body>
</html>
