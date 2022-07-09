<?php
 require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
                                
<body>
    <center style="font-size:5vw;color: aliceblue; font-family: inherit" ><p></p></center>
    <div class="signupbox">
    <h1>Sign-up to uNi-bOok</h1>
        <form class="myform" action="signup.php" method="post">
            <input name="username" type="text" class="inputvalues" placeholder="Username" required/>
             <input name="password"  type="password" class="inputvalues" placeholder="Password" required/>
             <input name="cpassword" type="password" class="inputvalues" placeholder="confirm Password" required/>
             <input name="submit_btn" type="submit" id="signup_btn" value="sign up"/>
            <p>By joining uNi-bOok you are agree to our <a href="#">Terms of service</a> and <a href="#"> Privacy Policy </a></p>
            <p><a href="">Join with Facebook</a></p>
        </form>
		
		<?php
		if(isset($_POST['submit_btn']))
		{
			//echo'<script type="text/javascript">alert("joined bottom clicked") </script>';		
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			if($password==$cpassword)
			{
				$query="select * from user WHERE username='$username'";
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					//there is already a user with the same name
					echo'<script type="text/javascript">alert("User already exists.. try another username") </script>';	
				}
				else
				{
					$query= "insert into user values('$username','$password')";
					$query_run=mysqli_query($con,$query);
					
					if($query_run)
					{
						echo'<script type="text/javascript">alert("User Registered .. go to login") </script>';
					}
                    else
					{
                        echo'<script type="text/javascript">alert("Error!") </script>';
					}	
				}
			}
            else
			{
                echo'<script type="text/javascript">alert("password and confirm password does not match!") </script>';
			}
		}
		?>
    </div>    
  
   
</body>
</head>
</html>
