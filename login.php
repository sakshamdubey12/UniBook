<?php
 require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
                                
<body>
    <div class="loginbox">
    <img src="avtar.png" class="avtar">
        <h1>Login Here</h1>
        <form class="myform" action="login.php" method="post">
            <p>Username</p>
            <input name="username" type="text" class="inputvalues" placeholder="Enter Username" required />
            <p>Password</p>
            <input name="password" type="password" class="inputvalues" placeholder="Enter Password"required />
            <input name="login" type="submit" id="login_btn" value="login"/>
            <a href="#">Lost your password?</a><br>
            <a href="signup.php">Don't have an account?</a>
        </form>
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from user WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$_SESSION['username']=$username;
				header('location:b.php');
			}
			else
			{
				//invalid
				echo'<script type="text/javascript">alert("Invaid credentials") </script>';		
			}
		}
		?>	
    </div>    
</body>
</head>
</html>
