<?php 
$conn = mysqli_connect('localhost','SAI','saisu0511','login_sai');

if (!$conn){
echo "Database didn't connect". mysql_connect_error();
}

session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   header('location: login.php');
      exit();
}

$name = $_SESSION['username'];
$surname = $_SESSION['surname'];
$bio = $_SESSION['bio'];
$age =  $_SESSION['age'];
$question =  $_SESSION['question'] ;
$answer = $_SESSION['answer'] ;
$province = $_SESSION['province'] ;
$city = $_SESSION['city'] ;
$high =  $_SESSION['hschool'] ;
$uni = $_SESSION['uni'];
$gender= $_SESSION['gender'];
$dob= $_SESSION['dob'] ;
$status = $_SESSION['status'];
$num = $_SESSION['number'];
$pic = $_SESSION['profile'] ;
 $id = $_SESSION['id'];
 

$noti = mysqli_query($conn, "SELECT * FROM users WHERE ID='$id'");

$row3 = mysqli_fetch_array($noti);

$numnoti =  $row3['NOTIFICATIONS'];

$nummessages = $row3['NUMOFMESSAGE'];

?>


<html>

  <link rel="icon" type="image/x-icon" href="Saiber Space Icon Black.png">
  
<div class="icons">
  <a href="http://localhost/messages.php"><i class="fa fa-rocket"><?php echo " ".$nummessages;?></i></a>
  <a href="http://localhost/notifications.php"><i class="fa fa-bell"><?php echo " ".$numnoti;?></i></a>
  <a href="http://localhost/profilepage.php" ><i class="fa fa-user"></i></a>
  <a href="http://localhost/friends.php"><i class="fa fa-users"></i></a>
  <a href="http://localhost/homepage.php"><i class="fa fa-home"></i></a>
  </div>
  
  <div class="log out">
<a href="http://localhost/login.php" class="left btn brand z-depth-0"> Sign-Out </a>
</div>



<?php  include("header.php");?>

<div class="topnav grey lighten-3 z-depth-0">
<br>
  <ul>
  <li><a href="http://localhost/homepage.php">Home Page</a></li>
  <li><a href="http://localhost/friends.php">Friends</a></li>
   <li><a href="http://localhost/profilepage.php">My Profile</a></li>
  <li><a href="http://localhost/notifications.php" style="color:white">Notifications</a></li>
</ul>
</div>
<link rel="icon" type="image/x-icon" href="Saiber Space Icon Black.png">

<body background = "Saiber Space Cover 3.png">

<br><br><br><br>



<style>

.items{
    background-color: #fff;
    border: 1px solid #d1d1d1;
    margin: 30px;
    padding: 10px;

}

.card {
  float: left;
  margin-left: 100px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  background-color: grey  z-depth-0;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color:black;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  color: black;
  float: right;
  margin-right : 50px;
  font-size:36px;
  margin-top: 10px;
}

button:hover, a:hover {
  opacity: 0.7;
}



.details{
  float: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 100%;
  margin: auto;
  text-align: center;
  background-color: white;
  

}

.log out{

margin-left: 50px;
}



 .topnav{ 
width:100%;
background-color: white;
     height: 30px;

 }

 .topnav ul{ 
list-style: none;
padding:0;
margin:0;
position: absolute;
 }

  .topnav ul li {
 float:left;
  }
 
  .topnav ul li a {
 width: 420px;
 color: black;
 display: block;
 text-decoration: none;
 font-size: 29px;
 text-align:center;
 padding:5px;
 font-family: Tisa Sans Pro Medium Italic;
 font-weight: bold;
  
  }

   .topnav a:hover{
  background-color: grey;
  color: white; 
   }
   
  
  .buttons {

margin-left:460px; 
}

.title{
    text-align: center;
    font-size: 50px;
    font-family: Ubuntu;
    color: black;
border: 1px solid black;
    margin: 50px;
}

  
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php
    $friendsarray = array();


       $gettingmyfriends =  mysqli_query($conn, "SELECT* from relationships WHERE USERONE = '$id'");

if (($gettingmyfriends -> fetch_assoc()) == false){
echo " <div class = 'title' style='background-color: white'>";
       echo      "NO FRIENDS POSTED YET";
        echo "</div>";

} else {

 $gettingmyfriends =  mysqli_query($conn, "SELECT* from relationships WHERE USERONE = '$id' ");
 
  while ($row5 = $gettingmyfriends -> fetch_assoc()){
 
   
 $friendsid = $row5['USERTWO'];
 
 
array_push($friendsarray,$friendsid);


  }
  
    array_push($friendsarray,$id);

$gettinginfo = mysqli_query($conn, 'SELECT * FROM posts WHERE USERID IN (' . implode(",", $friendsarray) . ') ORDER BY ID DESC');
 
 
  if (($gettinginfo -> fetch_assoc()) == false){
echo " <div class = 'title' style='background-color: white'>";
       echo      "NO NEW POSTED YET";
        echo "</div>";

} else {

 $gettinginfo = mysqli_query($conn, 'SELECT * FROM posts WHERE USERID IN (' . implode(",", $friendsarray) . ') ORDER BY ID DESC');


 while($row6=$gettinginfo->fetch_assoc()){

                  $posted = $row6['CONTENT'];
$time = $row6['DATE'];
$plike = $row6['LIKES'];
$pname = $row6['NAME'];
$psname = $row6['SURNAME'];
$pcomments = $row6['COMMENTS'];
$isedited = $row6['EDITED'];
$userid = $row6['USERID'];
$thepicture = $row6['PICTURE'];

 
$date = date("Y-m-d H:i:s");

$dateposted = new DateTime($time);


$datecurrent = new DateTime($date);

$difference = $dateposted -> diff($datecurrent);


if($difference->y >=1){


if($difference ==1){

 $datemessage = $difference->y. " year ago";
} else {
$datemessage = $difference->y. " years ago"; 
}

} else if ($difference->m >=1){
if($difference ->d ==0){
$days = " ago";
} else if($difference ->d ==1){
$days = $difference ->d. " day ago";

}else {
$days = $difference ->d. " days ago";
}

if ($difference->m ==1){

$datemessage = $difference-> m. " month";
} else {
$datemessage = $difference-> m. " months";
}


} else if ($difference->d >=1){
  if ($difference->d ==1){
  $datemessage = "Yesterday";
  } else {
  $datemessage = $difference ->d. " days ago";
  
  }

} else if($difference->h >=1){

if ($difference->h >=1){
$datemessage = $difference->h . " hour ago";
} else {

      $datemessage = $difference->h . " hours ago";
}


} else if($difference->i >=1){

if ($difference->i >=1){
$datemessage = $difference->i . " minute ago";
} else {

      $datemessage = $difference->i . " minutes ago";
}

} else {

if($difference->s <50){
$datemessage = "Just now";
} else {

$datemessage = $difference->s . " seconds ago";
}



}  
 
 





if (isset($_POST['liked'])) {

$postid = $_POST['postid'];
$date = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "SELECT * FROM posts WHERE ID=$postid");
$row = mysqli_fetch_array($result);
$n = $row['LIKES'];

$result2 = mysqli_query($conn, "SELECT * FROM users WHERE ID = $id");
$row2 = mysqli_fetch_array($result2);
$useronename = $row2['NAME'];
$useronesname = $row2['SURNAME'];
  
   mysqli_query($conn, "INSERT INTO likes (USERID, POSTID) VALUES ($id, $postid)");

        mysqli_query($conn, "INSERT INTO notifications(NOTIFICATION,USERONE,USERTWO,INDICATOR,CATEGORY,TIME,STATUS) VALUES ('$useronename $useronesname liked your post', '$id','$userid','$postid','LIKEPOST','$date','1')");

$noti = mysqli_query($conn, "SELECT * FROM users WHERE ID='$userid'");

   $row3 = mysqli_fetch_array($noti);

   $numnoti =  $row3['NOTIFICATIONS'];

mysqli_query($conn, "UPDATE users SET NOTIFICATIONS=$numnoti+1 WHERE ID=$userid");

mysqli_query($conn, "UPDATE posts SET LIKES=$n+1 WHERE ID=$postid");

echo $n+1;
echo $noti+1;

exit();
}


if (isset($_POST['unliked'])) {

$postid = $_POST['postid'];

$result2 = mysqli_query($conn, "SELECT * FROM users WHERE ID = $id");
$row2 = mysqli_fetch_array($result2);
$useronename = $row2['NAME'];
$useronesname = $row2['SURNAME'];


$result = mysqli_query($conn, "SELECT * FROM posts WHERE ID=$postid");
$row = mysqli_fetch_array($result);
$n = $row['LIKES'];

mysqli_query($conn,"DELETE FROM notifications WHERE USERONE=$id AND INDICATOR=$postid");

mysqli_query($conn, "DELETE FROM likes WHERE POSTID=$postid AND USERID=$id");

$noti = mysqli_query($conn, "SELECT * FROM users WHERE ID='$userid'");

   $row3 = mysqli_fetch_array($noti);

   $numnoti =  $row3['NOTIFICATIONS'];

mysqli_query($conn, "UPDATE users SET NOTIFICATIONS=$numnoti-1 WHERE ID=$userid");

mysqli_query($conn, "UPDATE posts SET LIKES=$n-1 WHERE ID=$postid");

echo $n-1;
echo $noti-1;
exit();
}


if (isset($_POST['commented'])) {

 $postid = $_POST['postid'];
 
 session_start();
 
 $_SESSION['postid'] = $postid;
}


if (isset($_POST['mycommented'])) {

 $postid = $_POST['postid'];
 
 session_start();
 
 $_SESSION['postid'] = $postid;
}


if (isset($_POST['edited'])) {

 $postid = $_POST['postid'];
 
 session_start();
 
 $_SESSION['postid'] = $postid;
}

if (isset($_POST['delete'])) {

 $postid = $_POST['postid'];
 
 $result2 = mysqli_query($conn, "SELECT * FROM posts WHERE USERID = $id ORDER BY ID DESC");
$row2 = mysqli_fetch_array($result2);
$useronename = $row2['NAME'];
$useronesname = $row2['SURNAME'];
$unique = $row2['ID'];


mysqli_query($conn, "DELETE FROM posts WHERE ID=$postid");
   mysqli_query($conn, "DELETE* FROM notifications WHERE USERONE=$id AND INDICATOR=$postid");
mysqli_query($conn, "DELETE* FROM likes WHERE POSTID=$postid");
mysqli_query($conn, "DELETE* FROM comments WHERE POSTID=$postid");

   $noti = mysqli_query($conn, "SELECT * FROM users WHERE ID='$id'");

$row3 = mysqli_fetch_array($noti);

$numnoti =  $row3['NOTIFICATIONS'];

mysqli_query($conn, "UPDATE users SET NOTIFICATIONS=$numnoti-1 WHERE ID=$id");


$message = "POST DELETED" ;
         echo "<script type='text/javascript'>alert('$message');</script>";

echo $numnoti-1;
exit();
}
 
 
 ?>
 
 
 
 
  <div class = "container">
            
                         
                
             
                    
                        <div class = "row">
                            
                      
                            <div class = "items">
                                
<?php echo "<b>  <div class='writing' style='font-size:20px'>". $pname . "</div> <div class='writing2' style='font-size:20px'>"  . $psname. "</div></b><br>";
if ($isedited == "YES"){
echo "<i> edited </i><br> <br>";
  }
 
    echo "<i class='fa fa-calendar' style='color:brown; font-size:24px'></i> " .$datemessage. "<br><br><br>";

  if ($thepicture !=""){

       echo "<img src ='allpics/$thepicture' style='margin-left:400px;width:400px;height:400px;'>";

echo "<br><br>";
}

    echo "<div class='posted' style='font-size:20px; border:1px solid #d1d1d1'>". $posted. "</div><br><br><br>";
                                    echo "<i class='likes_count fa fa-thumbs-up' style='color:blue; font-size:24px'></i> ". $plike . " <i class='fa fa-comments-o' style='font-size:24px; color:red'></i> ". $pcomments;


?>

                            </div>

<div class="buttons">
<form action="homepage.php" method= "POST">

<?php 

$results = mysqli_query($conn, "SELECT * FROM likes WHERE USERID='$id' AND POSTID=".$row6['ID']."");

if (mysqli_num_rows($results) == 1){ ?>
<!-- user already likes post -->
<input type="submit" value ="UNLIKE" id = "<?php echo $row6['ID'] ?>"  class="btn brand z-depth-0 unlike"  style=" outline: 1px solid white; outline-offset:1px;width:10px">    
<?php }else {?>
<!-- user has not yet liked post -->
<input type="submit" value = "LIKE" id = "<?php echo $row6['ID'] ?>"  class="btn brand z-depth-0 like"  style=" outline: 1px solid white; outline-offset:1px;">
 
<?php } ?>



                            <?php  if ($id == $userid){ ?>
<input type="submit" value="COMMENT" id = "<?php echo $row6['ID'] ?>"   class="btn brand z-depth-0 mycom" style="outline: 1px solid white; outline-offset:1px;"> 
<?php } else{ ?>
<input type="submit" value="COMMENT" id = "<?php echo $row6['ID'] ?>"   class="btn brand z-depth-0 com" style=" outline: 1px solid white; outline-offset:1px;"> 
<?php } ?>


<?php  if ($id == $userid){ ?>
<input type="submit" name="delete" value="DELETE"  id = "<?php echo $row6['ID'] ?>"  class="btn brand z-depth-0 del"  style=" outline: 1px solid white; outline-offset:1px;"> 
       <?php } ?>
<?php  if ($id == $userid){ ?>
<input type="submit" name="edit" value="EDIT" id = "<?php echo $row6['ID'] ?>"  class="btn brand z-depth-0 edt"  style=" outline: 1px solid white; outline-offset:1px;"> 
<?php } ?>
</form>
                            </div>


                        </div>
                    
              
                
          
            
            
        </div>
 
 
 
 
 
 
 <?php 
 

 
 }
 
 
 
  
  
  
}

}?>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

 $(document).ready(function(){ 

$("input.like").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'liked': 1,
'postid': postid
},
success: function(response){
      $post.parent().find('span.likes_count').text(response + " likes");
alert('LIKED POST');
location.reload();
}

});
  });
  


$("input.unlike").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'unliked': 1,
'postid': postid
},
success: function(response){
$post.parent().find('span.likes_count').text(response + " likes");
alert('UNLIKED POST');
location.reload();
}

});

  });
  
  
    $("input.com").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'commented': 1,
'postid': postid
},
success: function(response){

window.location.replace("http://localhost/otherprofilecomments.php");
}

});

  });
  
      $("input.mycom").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'mycommented': 1,
'postid': postid
},
success: function(response){

window.location.replace("http://localhost/comments.php");
}

});

  });
  
  
      $("input.edt").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'edited': 1,
'postid': postid
},
success: function(response){

window.location.replace("http://localhost/editpost.php");
}

});

  });
  
  
        $("input.del").click(function(){
 
 var postid = $(this).attr('id');
$post = $(this);

$.ajax({
url: 'homepage.php',
type: 'post',
data: {
'delete': 1,
'postid': postid
},
success: function(response){

alert("POST DELETED")
location.reload()
}

});

  }); 
  });

</script>

                 

<br><br><br>

</body>
<?php  include("footer.php");?>


</html>
