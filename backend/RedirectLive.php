<?php
	require "admin/Connection.php";
	date_default_timezone_set('Asia/Kolkata');
	$datenow = date("d/m/Y h:m:s");
	$transactionDate = str_replace(" ", "%20", $datenow);
	$returnURL="https://stjohnambulancehyd.org/response.php";

	$transactionId = 100;

	require_once 'TransactionRequest.php';


	$transactionRequest = new TransactionRequest();

	if(isset($_POST['pay']))
	{
		$appid=$_POST['appid'];
		$name=$_POST['name'];
		$fname=$_POST['fname'];
		$qualification=$_POST['qualification'];
		$paddress=$_POST['paddress'];
		$taddress=isset($_POST['taddress'])?$_POST['taddress']:'';
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$fee=$_POST['fee'];
		$aadharno=$_POST['fAadhar'];
		$sql="SELECT * FROM `students` WHERE `phone1`='$phone'";
		$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)==0)
		{
			$sql="INSERT INTO `students`(`name`, `fhname`, `gender`, `dob`, `qualification`, `primaryaddress`, `secondaryaddress`, `phone1`, `phone2`, `email`, `aadharno`) VALUES ('$name', '$fname', '$gender', '', '$qualification', '$paddress', '$taddress', '$phone', '', '$email', '$aadharno')";
			$query=mysqli_query($conn,$sql);
		}
		if($fee>0)
		{
			$appid="1";
			//Setting all values here
			$transactionRequest->setLogin('335116');
			$transactionRequest->setPassword("634ff865");
			$transactionRequest->setProductId("ASSOCIATION");
			$transactionRequest->setAmount($fee);
			$transactionRequest->setTransactionCurrency("INR");
			$transactionRequest->setTransactionAmount('0');
			$transactionRequest->setReturnUrl($returnURL);
			$transactionRequest->setClientCode('STJOHN');
			$transactionRequest->setTransactionId('0010');
			$transactionRequest->setTransactionDate($transactionDate);
			$transactionRequest->setCustomerName($name);
			$transactionRequest->setCustomerEmailId($email);
			$transactionRequest->setCustomerMobile($phone);
			$transactionRequest->setCustomerBillingAddress($paddress);
			$transactionRequest->setCustomerAccount($appid);
			$transactionRequest->setReqHashKey("0b1fc31ede0e160b4a");
			$transactionRequest->seturl("https://payment.atomtech.in/paynetz/epi/fts");
			$transactionRequest->setRequestEncypritonKey("7CE9E5AC96CA1B41A8953FF552A371AD");
			$transactionRequest->setSalt("7CE9E5AC96CA1B41A8953FF552A371AD");
		}
	}


	$url = $transactionRequest->getPGUrl();
	header("Location: $url");
?>