<?php

$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";
$empcode = "";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password2, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


 $errors = array('empcode' => '', 'password' => '');

 
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
		
    }
}
 
 
 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 



  if(empty($_POST["empcode"])){
	  
	  $errors['empcode'] = "Please enter an employee code";
	  
  }
  
    if(empty($_POST["password"])){
	  
	   $errors['password'] = "Please enter a password";
	  
  }
  
 
  
  $empcode = $_POST["empcode"];
  $password = $_POST["password"];
  
  $sql = "SELECT * FROM user";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   
   if($empcode == $row["EMPCODE"]){
	   
	   if($empcode == $row["EMPCODE"] && md5($password) == $row["PASSWORD"]){
		   
		   mysqli_close($conn);

            $loggedinuser = $row["EMPCODE"];
			
			setcookie("loggedinuser", $loggedinuser, time() + (86400 * 30), "/");
		  
		   header("refresh: 0.5; url = http://localhost/dashboard/Intellix/homepage.php");
		   
		   
	   }else{
		   
		   
		    $errors['password'] = "Password is incorrect";
			
		   
	   }
	   
	   
   }else{
	   
	   
	     $errors['empcode'] = "Employee Code not found";
		 
		 
	   
   }
   
   
  }
} 

  
  if(array_filter($errors)){
	  
	  echo "<script>alert('Failure to log in')</script>";
	
	
	  
  }
	
	
}
	
?>



<html>
<head>
    <link rel="stylesheet" href="login.css">
 
</head>
<body style="background-color:#E6E9EE">
        <div class="wrapper">
          <div class="title" style="background:#fff"><img src="./Images/finallogo.png" width="80%" height="25%"></div>
          <form method="post" action="newlogin.php">
            <div class="field">
              <input type="text" name="empcode" autocomplete="off" required>
              <label id="user">Employee Code</label>  
             <label for="errorusername" style="color:red;"><?php echo $errors['empcode']?></label>			  
            </div>
			<br>
			
            <div class="field">
              <input type="password" id="password" name="password" required>
              <label id="pass">Password</label>
			    <label for="errorpassword" style="color:red"><?php echo $errors['password'] ?></label>
            </div><br>
            <div class="content">
              <div class="checkbox">
                <input type="checkbox" id="remember-me" onclick="myFunction()">
                <label for="remember-me">Show Password</label>
              </div>

            </div>
            <div class="field">
              <input type="submit" class="login" name="submit" value="Login" style="background: #0d4a78"> 
            </div><br>
		   
		 <div style="margin-left:1.9vw">For further inquiries click <a href="https://betsoftware-support.4me.com/self-service" style="color:#18114a">here  </a></div>
		   
		   
          </form>
 
         
</html>


<style>

.field.login:hover{
	
	background-color: #76c1e2;
	
}



</style>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
