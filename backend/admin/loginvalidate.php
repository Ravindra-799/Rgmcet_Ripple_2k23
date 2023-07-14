<?php
    session_start();
    include 'dbconnect.php'
?>
<?php
        if(isset($_POST['username']) && isset($_POST['password'])){
            $res=mysqli_query($mycon,"SELECT * FROM admin_login WHERE username='$_POST[username]';");
            $row=mysqli_fetch_assoc($res);
            $count=mysqli_num_rows($res);
					if($count==0)
					{
					?>
						<div>
							<strong>username doesn't exist</strong>
						</div>
					<?php
                    }
                    else{
                        $password1=$_POST['password'];
                        $password2=$row['password'];
                        if($password1==$password2){
                            header('location: dashboard.php');
                        }
                    }

        }
?>