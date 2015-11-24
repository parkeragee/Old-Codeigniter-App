<?php
    /* Include the Twilio Helper client library. */
    require "Services/Twilio.php";
 
    /* Set our AccountSid and AuthToken */
    $AccountSid = "AC31e74e5eafd04ac69b9105852c2f4748";
    $AuthToken = "b6d11003da4ba96acd334a95c0a1449e";
 
    /* Instantiate a new Twilio Rest Client */
    $client = new Services_Twilio($AccountSid, $AuthToken);
?>
<?php if(empty($_POST['submit'])): /* Display Form for searching AvailablePhoneNumbers */?>
<html>
    <head>
        <title>Find a Twilio number to buy</title>
    </head>
    <body>
        <h3>Find a Twilio number to buy</h3>
        <?php if(!empty($_GET['msg'])): ?>
            <p class="msg"><?php echo htmlspecialchars($_GET['msg']); ?></p>
        <?php endif;?>
 
        <form method="POST">
            <label>Area code (e.g. 901): </label><input type="text" size="3" name="area_code"/><br/>
			<label>near US postal code (e.g. 94117): </label><input type="text" size="4" name="postal_code"/><br/>
            <label>near this other number (e.g. +14156562345): </label><input type="text" size="7" name="near_number"/><br/>
            <label>matching this pattern (e.g. 415***EPIC): </label><input type="text" size="7" name="contains"/><br/>
            <input type="submit" name="submit" value="SEARCH"/>
        </form>
    </body>
</html>
<?php endif; ?>

<?php
    /*  Handle Searches from the Twilio number search form */
    if(!empty($_POST['submit']) && $_POST['submit'] == 'SEARCH'):
        $SearchParams = array();
 
        /* Search parameters for US Local PhoneNumbers */
        //$SearchParams['InPostalCode'] = !empty($_POST['postal_code'])? trim($_POST['postal_code']) : '';
        //$SearchParams['NearNumber'] = !empty($_POST['near_number'])? trim($_POST['near_number']) : '';
        //$SearchParams['Contains'] = !empty($_POST['contains'])? trim($_POST['contains']) : '' ;
		$SearchParams['AreaCode'] = !empty($_POST['area_code'])? trim($_POST['area_code']) : '' ;
 
        try {
 
            $numbers = $client->account->available_phone_numbers->getList('US', 'Local', $SearchParams);
 
            if(empty($numbers->available_phone_numbers)) {
                $err = urlencode("We didn't find any phone numbers by that search");
				echo $err;
                //header("Location: ?msg=$err");
                //exit(0);
            }
 
        } catch (Exception $e) {
 
            $err = urlencode("Error processing search: {$e->getMessage()}");
			echo $err;
            //header("Location: ?msg=$err");
            //exit(0);
 
        }
 
        ?>
 
        <html>
            <head>
                <title>Choose a Twilio number to buy</title>
            </head>
            <body>
                <h3>Choose a Twilio number to buy</h3>
                <?php foreach($numbers->available_phone_numbers as $number): ?>
                <form method="POST">
                    <label><?php echo $number->friendly_name ?></label>
                    <input type="hidden" name="PhoneNumber" value="<?php echo $number->phone_number ?>">
                    <input type="submit" name="submit" value="BUY" />
                </form>
                <?php endforeach; ?>
            </body>
        </html>
<?php endif; ?>

<?php
    /* Buy the selected Twilio Number */
    if(!empty($_POST['submit']) && $_POST['submit'] == 'BUY') {
        $PhoneNumber = $_POST['PhoneNumber'];
 
        try {
 
            /* Purchase the selected PhoneNumber */
            $number = $client->account->incoming_phone_numbers->create(array(
                'PhoneNumber' => $PhoneNumber
            ));
 
        } catch (Exception $e) {
            $err = urlencode("Error purchasing number: {$e->getMessage()}");
			echo $err;
            //header("Location: ?msg=$err");
            //exit(0);
        }
 
        $msg = urlencode("Thank you for purchasing $PhoneNumber");
		echo $msg;
        //header("Location: ?msg=$msg");
        //exit(0);
    }
?>


