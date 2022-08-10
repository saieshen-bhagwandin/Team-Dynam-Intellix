<?php 

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
		
		if($name == "loggedinuser"){
		}else{
			
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
		}
    }
}




$servername = "localhost";
$username = "Saieshen";
$password2 = "saisu0511";
$dbname = "intellixdb";

// Create connection
$conn = new mysqli($servername,$username,$password2,$dbname);

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="navbar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport">
   

     <meta name="viewport" content="width=device-width, initial-scale=1.0">


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
	
</head>
<body style="background-color:#E6E9EE;">

    <header style="position: fixed;z-index:100">
        <div class="logo">
            <img src="./images/finallogo.png" class="responsive" width="100" height="100"  style="margin-top:0.9vw;margin-left:-1vw;">
        </div>
        <a href="#" class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
		
        <nav style="margin-right:1vw; margin-top:1vw;">
            <ul>
			
                <li><a href="http://localhost/dashboard/Intellix/homepage.php" style="width:150px;background-color:#E6E9EE;font-weight: bold;text-transform: capitalize;font-size:18px" >Home</a></li>
                <li><a href="http://localhost/dashboard/Intellix/projects.php" style="width:150px;background-color:#E6E9EE;font-weight: bold;text-transform: capitalize;font-size:18px">Project</a></li>
                <li><a href="http://localhost/dashboard/Intellix/employee.php" style="width:190px;background-color:#E6E9EE;font-weight: bold;text-transform: capitalize;font-size:18px">Team Member</a></li>
                <li><a href="http://localhost/dashboard/Intellix/tasks.php" style="width:150px;background-color:#E6E9EE;font-weight: bold;text-transform: capitalize;font-size:18px">Tasks</a></li>
                <li><a href="http://localhost/dashboard/Intellix/dashboard.php" style="width:150px;background-color:#E6E9EE;font-weight: bold;text-transform: capitalize;font-size:18px">Dashboard</a></li>
				
				
				
			<span class="sampah" style="margin-top:-0.5vw;margin-right:-11.5vw" id="recycletest">
		
    	        <span id="recycletest"></span>
				
				  <?php
  
  
  $sql = "SELECT * FROM deletedproject";
    $result = $conn->query($sql);


$num_rowsproj = mysqli_num_rows($result);



$sql = "SELECT * FROM deletedtask";
    $result = $conn->query($sql);


$num_rowstask = mysqli_num_rows($result);


$sql = "SELECT * FROM deletedteammember";
    $result = $conn->query($sql);


$num_rowsteam = mysqli_num_rows($result);

$total = $num_rowsproj + $num_rowstask + $num_rowsteam;

if($total>0){
  
  ?>
  
  
					<img src=".\Images\dirtcolor.png" class="trash" style="margin-top:-0.404vw;margin-left:-0.009vw;width:0.9vw;height:1vh" >
				
		<?php 

}
?>		
				
				
    	        <i class="bin" id="recycletest"></i>
				
					
                </span>   
			   
		
		<div id="myModal" class="modal" style="margin-left: 70vw;">

  <!-- Modal content -->
  <div class="modal-content">
  <center>

    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Enter Passcode</h2>
    </div>
   <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="margin-top:2.5vw;margin-right:-2vw">
   <input name="password" id="test" type="password" style="border-radius:3px;border:1px solid #D6D8DD ">
    <input type="submit" name="bin" class="btnstatus"  value="Submit" >
    </form> <br>
  </div>
</center>
</div>
			  
			  
			<img src=".\Images\user.png" height="22px" widht="22px" style="float:right;margin-left:12.5vw;margin-top:-1vw;cursor:pointer" >
			
			    
             
			

				
				 <li><a href="http://localhost/dashboard/Intellix/newlogin.php" class="logout" style="font-size:15px;background-color:#E6E9EE;padding:7px;margin-left:0.5vw;margin-top:-1.3vw;font-weight: bold;text-transform: capitalize;">Logout</a></li>
				
            </ul>
			
				
        </nav>
		
	
    </header>


<?php 


if(isset($_POST['bin'])){
	
	$password = $_POST['password'];
	

	if ($password == "12345") {
		header("Location: http://localhost/dashboard/Intellix/recycle.php");
		

}else{
	  echo "<script>alert('Incorrect, please try again')</script>";
}
	
	
}




?>

<style>




.sampah {
	position: relative;
	background:#0d4a78;
	width: 12px;
	height: 10px;
	margin-right:-11.7vw;
	margin-left:10vw;
	border-bottom-right-radius: 2px;
	border-bottom-left-radius: 2px;
	z-index:1;
	
}



.sampah span {
	position: absolute;
	height: 4px;
	width:12px;
	background: #0d4a78;
	top: -6px;
	left: 0px;
	right: -10px;
	z-index:1;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	transform: rotate(0deg);
	transition: transform 250ms;
	transform-origin: 19% 100%;
}

.sampah:hover span {
	transform: rotate(-45deg);
	transition: transform 250ms;
	z-index:1;
}


.trash{

margin-bottom:6vw;
	z-index:-1;

	
	
}

.responsive {
  width: 70%;
  height: auto;


}



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 30%; /* Full width */
  height: 50%; /* Full height */
   

}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #D6D8DD;
  border-radius:5px;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: #18114a;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 5px 16px;
  background-color: #E6E9EE;
  color: #18114a;
}

.modal-body {padding: 2px 16px;}


.btnstatus{
	
	padding:4px;
	border-radius:15px;
	border: 1px solid white;
	width:4vw;
	background:white;
	color:black;
	margin-right:10px
	
}

.btnstatus:hover {
	

	color:#CED0D1
	
}



</style>


</body>
</html>



	
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>  
       
		
		
         $('#recycletest').click(function(){  
          var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];

 modal.style.display = "block";
		 

span.onclick = function() {
  modal.style.display = "none";
}

		 
       }); 



	   
   
       </script>

