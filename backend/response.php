<?php

require_once 'TransactionResponse.php';
$transactionResponse = new TransactionResponse();

$transactionResponse->setRespHashKey("KEYRESP123657234");
$transactionResponse->setResponseEncypritonKey("8E41C78439831010F81F61C344B7BFC7");
$transactionResponse->setSalt("8E41C78439831010F81F61C344B7BFC7");

$arrayofdata = $transactionResponse->decryptResponseIntoArray($_POST['encdata']);

//print_r($arrayofdata);

require_once 'dbconnect.php';
/*  Payment Values */
$date=$arrayofdata['date'];
$CardNumber=$arrayofdata['CardNumber'];
$surcharge=$arrayofdata['surcharge'];
$clientcode=$arrayofdata['clientcode'];
$scheme=$arrayofdata['scheme'];
$udf14=$arrayofdata['udf14'];
$signature=$arrayofdata['signature'];
$udf13=$arrayofdata['udf13'];
$udf12=$arrayofdata['udf12'];
$udf11=$arrayofdata['udf11'];
$amt=$arrayofdata['amt'];
$udf10=$arrayofdata['udf10'];
$merchant_id=$arrayofdata['merchant_id'];
$mer_txn=$arrayofdata['mer_txn'];
$f_code=$arrayofdata['f_code'];
$bank_txn=$arrayofdata['bank_txn'];
$udf9=$arrayofdata['udf9'];
$ipg_txn_id=$arrayofdata['ipg_txn_id'];
$bank_name=$arrayofdata['bank_name'];
$prod=$arrayofdata['prod'];
$mmp_txn=$arrayofdata['mmp_txn'];
$udf5=$arrayofdata['udf5'];
$udf6=$arrayofdata['udf6'];
$udf3=$arrayofdata['udf3'];
$udf4=$arrayofdata['udf4'];
$udf1=$arrayofdata['udf1'];
$udf2=$arrayofdata['udf2'];
$discriminator=$arrayofdata['discriminator'];
$auth_code=$arrayofdata['auth_code'];
$desc=$arrayofdata['desc'];

$sql="SELECT `signature` FROM payments WHERE `f_code` = 'Ok' and `udf4`='$udf4'";
$query=mysqli_query($mycon,$sql);
if(mysqli_num_rows($query)==0)
{
    $sql="INSERT INTO `payments`(`date`, `CardNumber`, `surcharge`, `clientcode`, `scheme`, `udf14`, `signature`, `udf13`, `udf12`, `udf11`, `amt`, `udf10`,`merchant_id`, `mer_txn`, `f_code`, `bank_txn`, `udf9`,`ipg_txn_id` , `bank_name`, `prod`, `mmp_txn`, `udf5`, `udf6`, `udf3`, `udf4`, `udf1`, `udf2`, `discriminator`, `auth_code`, `desc`) VALUES ('$date', '$CardNumber', '$surcharge', '$clientcode', '$scheme', '$udf14', '$signature', '$udf13', '$udf12', '$udf11', '$amt', '$udf10', '$merchant_id', '$mer_txn', '$f_code', '$bank_txn', '$udf9', '$ipg_txn_id', '$bank_name', '$prod', '$mmp_txn', '$udf5', '$udf6', '$udf3', '$udf4', '$udf1', '$udf2', '$discriminator', '$auth_code', '$desc')";
    $query=mysqli_query($mycon,$sql);
}
?>
<form method="post" action="Successful.php" name="myForm" id="myForm">
    <input type="hidden" value="<?php echo $udf4; ?>" name="eventid"/>
    <input type="hidden" value="<?php echo $f_code; ?>" name="f_code"/>
    <input type="hidden" value="<?php echo $amt; ?>" name="amt"/>
    <input type="hidden" value="<?php echo $udf3; ?>" name="phone"/>
    <input type="hidden" value="<?php echo $clientcode; ?>" name="event"/>
    <input type="hidden" value="<?php echo $udf4; ?>" name="eventid"/>
    <input type="hidden" value="<?php echo $date; ?>" name="date"/>
    <input type="hidden" value="<?php echo $udf1; ?>" name="name"/>
    <input type="hidden" value="<?php echo $udf2; ?>" name="email"/>
    <input type="submit" value="submit" id="submit" name="submit"/>
</form>

<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
    document.getElementById("myForm").submit.click();
</script>

