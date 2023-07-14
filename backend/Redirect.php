<?php
   require_once 'dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
          $firstname=ucfirst($_POST["fname"]);
          $lastname=ucfirst($_POST["lname"]);
          $gender=$_POST['gender'];
          $collegeid=strtoupper($_POST["collegeid"]);
          $phoneno=$_POST["phone"];
          $email=$_POST["email"];
          $collegename=$_POST["collegename"];
          $branch=$_POST["dept"];
          $year=$_POST['year'];
          $event=$_POST['event'];
          $eventid=$_POST['eventid'];
          if(!empty($firstname) && !empty($lastname) && !empty($collegeid) && !empty($phoneno) && !empty($email) && !empty($collegename) && !empty($branch) && !empty($year) && !empty($event))
          { 
                $query = "SELECT `email` FROM `registrations` WHERE `event` = '$event' and `collegeid` = '$collegeid'";
                
                if($query_run = mysqli_query($mycon,$query))
                {
                    $num_rows = mysqli_num_rows($query_run);
                    if($num_rows == 1)
                    { 
                        $query2 = "SELECT `f_code` `clientcode` FROM `payments` WHERE `udf4` = '$eventid' AND `f_code`='Ok'";
                        
                        $result = mysqli_query($mycon,$query2);
                        $count = mysqli_num_rows($result);
                        if($count > 0 )
                        {
                            $redirecturl="index.html" ;
                            echo '<script type="application/javascript"> alert("User is aleardy Registered");
                            window.location.href="'.$redirecturl.'";
                            </script>';
                            exit();
                             
                        }
                    }
                    else
                    {
                        $query = "INSERT INTO registrations VALUES ('$firstname','$lastname','$gender','$collegeid','$phoneno','$email','$collegename','$branch','$year','$event','$eventid')";
                        mysqli_query($mycon,$query);
                    }
                }
                
            }
          
        }

$amt=$_POST['eventamt'];
$redirecturl="http://localhost/Ripple2k23/response.php";
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