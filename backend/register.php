<?php 
session_start();
?>
<?php
    if(!isset($_POST['event']))
    {
        header("Location:index.html");
    }
    $event=$_POST['event'];
    require "dbconnect.php";
    if($event=="Coding") $eventamt="150";
    if($event=="Paper Presentation") $eventamt="150";
    if($event=="Poster Presentation") $eventamt="150";
    if($event=="Web Designing") $eventamt="150";
    if($event=="Technical Quiz") $eventamt="100";


    $sql="SELECT * FROM registrations WHERE event='$event'";
    $query=mysqli_query($mycon,$sql);
    $rows=mysqli_num_rows($query);

    if($event=="Coding") $eventid="CD".sprintf("%03d",($rows+1));
    if($event=="Paper Presentation") $eventid="PP".sprintf("%03d",($rows+1));
    if($event=="Poster Presentation") $eventid="PO".sprintf("%03d",($rows+1));
    if($event=="Web Designing") $eventid="WD".sprintf("%03d",($rows+1));
    if($event=="Technical Quiz") $eventid="TQ".sprintf("%03d",($rows+1));
?>
<!DOCTYPE html>
<html lang="zxx">
    
<head>
    
</head>
<?php include "header.php"?>
<body>
<div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        
                        <div class="card">
                            <div class="card-body p-4">
                                <h3 class="auth-title" style="text-align:center"><?php echo $_POST['event']." Registration"; ?></h3>
                                <hr/>
                                <form action="Redirect.php"  method="post" id="form">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="fname">Firstname</label>
                                            <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter your Firstname" required pattern='[a-zA-Z]+/s[a-Z]'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="lname">Lastname</label>
                                            <input class="form-control" type="text" id="lname" name="lname" placeholder="Enter your Lastname" required pattern='[a-zA-Z]+'>
                                            
                                        </div>
                                    </div>
                        
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" required>
                                                <option selected="" disabled value="">--Select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="Enter your Email" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" type="text" id="phone" name="phone" placeholder="Enter your Phone" required pattern='^[6-9][0-9]{9}'>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="clgid">College Id</label>
                                            <input class="form-control" type="text" id="clgid" name="collegeid" placeholder="Enter your college Id" required pattern='^[1-9][0-9]{3}[a-Z][0-9]{2}[a-Z0-9][0-9]'>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="clgname">College Name</label>
                                            <input class="form-control" type="text" id="clgname" name="collegename" placeholder="Enter your College Name" required pattern='[a-zA-Z]+/s[a-Z]'>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="year">Year</label>
                                            <select class="form-control" name="year" required>
                                                <option selected="" disabled value="">--Select year--</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="branch">Branch</label>
                                            <select class="form-control" name="dept" required>
                                                <option selected="" disabled value="">--Select Branch--</option>
                                                <option value="Civil">CIVIL</option>
                                                <option value="EEE">EEE</option>
                                                <option value="MECH">MECH</option>
                                                <option value="ECE">ECE</option>
                                                <option value="CSE">CSE</option>
                                                <option value="CSE (AIML)">CSE (AI&ML)</option>
                                                <option value="CSE (DS)">CSE (DS)</option>
                                                <option value="CSEG">CSEG</option>
                                                <option value="CSE&BS">CSE&BS</option>
                                                <option value="CSE (CYS)">CSE (CYS)</option>
                                                <option value="IT">IT</option>
                                                <option value="EIE">EIE</option>
                                                <option value="MBA">MBA</option>
                                                <option value="MCA">MCA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input type="hidden" value="<?php echo $event; ?>" name="event">
                                            <input type="hidden" value="<?php echo $eventamt; ?>" name="eventamt">
                                            <input type="hidden" value="<?php echo $eventid; ?>" name="eventid">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 text-center">
                                            <input class="btn btn-danger btn-block" type="submit" name="submit" value="Submit">  
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        
<?php include "footer.php"?>
</body>

    
</html>