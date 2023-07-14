<?php
$amt=$_POST['eventamt'];
$redirecturl="http://localhost/Ripple2K23/Response.php";
$stname=$_POST['fname'];
$stemail=$_POST['email'];
$stphone=$_POST['phone'];
$eventid=$_POST['eventid'];
$htno=$_POST['collegeid'];
$eventname=$_POST['event'];
date_default_timezone_set('Asia/Kolkata');
$datenow = date("d/m/Y h:m:s");
$transactionDate = str_replace(" ", "%20", $datenow);

$transactionId = rand(1,1000000);

require_once 'TransactionRequest.php';


$transactionRequest = new TransactionRequest();

//Setting all values here
$transactionRequest->setLogin('192');
$transactionRequest->setPassword("Test@123");
$transactionRequest->setProductId("NSE");
$transactionRequest->setAmount($amt);
$transactionRequest->setTransactionCurrency("INR");
$transactionRequest->setTransactionAmount($amt);
$transactionRequest->setReturnUrl($redirecturl);
$transactionRequest->setClientCode($eventname);
$transactionRequest->setTransactionId($transactionId);
$transactionRequest->setTransactionDate($transactionDate);
$transactionRequest->setCustomerName($stname);
$transactionRequest->setCustomerEmailId($stemail);
$transactionRequest->setCustomerMobile($stphone);
$transactionRequest->setCustomerBillingAddress($eventid);
$transactionRequest->setCustomerAccount($htno);
$transactionRequest->setReqHashKey("KEY123657234");
$transactionRequest->seturl("https://paynetzuat.atomtech.in/paynetz/epi/fts");
$transactionRequest->setRequestEncypritonKey("8E41C78439831010F81F61C344B7BFC7");
$transactionRequest->setSalt("8E41C78439831010F81F61C344B7BFC7");


$url = $transactionRequest->getPGUrl();
header("Location: $url");