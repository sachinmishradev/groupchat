<?php 
session_start();
if(isset($_SESSION['mail'])){
    include"connection.php";
     $sth = mysqli_query($db,"SELECT email,password,name,img  FROM log  where email='".$_SESSION['mail']."' ");
    $num = mysqli_num_rows($sth);
    if($num > 0 ){
     while($row = mysqli_fetch_array($sth))
     {
        $femail = $row['email'];
          $fpass = $row['password'];
           $fname = $row['name'];
       
    
     }
    if($_SESSION['mail'] == $femail){


main();


}} else {
    echo "<script >alert(
    'there is no entery found in database')</script>";
login();

}}
else {
    login();
   
}
?>
<!doctype html>
<html>
    <head> <link rel="stylesheet" href="main.css" type="text/css"></head>
<?php    function login(){   ?> 
<body style="padding:-20px auto; margin:opx auto; max-width:1250px;">
<div style="position:absolute;padding:.6vh;background-color:#654543;margin-left:0px;margin-top:0px;padding:20px;font-size:1.5em;width:96%;"><h1 style="color:#867563;"><u>Ait chat</u><span style="font-size:20px;color:white;">Serve your dreams</span></h1> 
</div>
<div style="padding:0px;margin:0  auto;font-family:'lucida grande',tahoma,sans-serif,verdana,arial;max-width:300px;max-height:300px;"><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<p style="background-color:white;font-size:2em;padding:5px;box-shadow:2px 3px #656323;">login</p>
<form  style="background-color:white;width:auto;padding:10px;box-shadow:2px 8px #656323;padding:20px;text-align:justify;font-size:1.5em;" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<br/>
    <input type="email" name="mai"  id="name" placeholder="email" required  style="padding:10px;border-radius:4%;"/><br/><br/>
    <input type="password" name="pass"  id="email"  placeholder="password" required style="padding:10px;border-radius:4%;"/><br><br/>
    
    <input type="submit" name="s" value="login" id="submit" required/><br><br/>
    </form><p style="font-family:'lucida grande',tahoma,sans-serif,verdana,arial;font-size:30px;">don't have an account yet click <a href="signup.php" style="color:#890898; text-decoration:none;float:right;font-size:20px;"><u>signup</u></a></p>
</div>

</body>
</html>
<?php
if(isset($_POST['s'])){
$_SESSION['mail'] = strtolower($_POST['mai']);
$_SESSION['pass'] = $_POST['pass'];
header('Location:index.php');
}
}
?>





































<?php 
function main(){
?>
<!DOCTYPE html>
<html>
<head>

	<title>chat</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	 <script src="jquery-1.12.4.min-1.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script>
	function ajax(){
		var req = new XMLHttpRequest();
		 req.onreadystatechange = function(){
			if(req.readyState == 4 && req.status == 200){
         document.getElementById('ch').innerHTML = req.responseText;
			}
		}
		req.open('GET','chat.php',true);
		req.send();
	
	}	
    setInterval(function(){ajax()},1000);
    </script>


<link rel="stylesheet" href="main.css" type="text/css">
</head>

<body onload="ajax()" style="margin:0px auto; padding:0px;">
    <?php  $host = "localhost";
$name   = "1246724";
$p      = "pihuminkal";
$db_name  =   "1246724db2";
$db = mysqli_connect($host,$name,$p,$db_name);

 $sth = mysqli_query($db,"SELECT email,password,name,img  FROM log  where email='".$_SESSION['mail']."' ");
  
     while($row = mysqli_fetch_array($sth))
     {
        $femail = $row['email'];
          $fpass = $row['password'];
           $fname = $row['name'];
           $imgname = $row['img'];
    
     }
?>
<div id="wrap" style="margin:0px auto; padding:0px;max-width:800px;" >
<header style="background-color:#654543;font-size:1.5em;padding:3vh;width:98%;margin-top:0px;"><h1 style="color:white;font-family:'licida grande',tahoma,sans-serif,verdana;
"><u>Ait chat</u><span style="font-size:20px;color:white;">Serve your dreams</span></h1> <img  id="profile" src="<?php echo $imgname; ?>" height="120px;" style="margin-top:20px;float:right;"/>
<p style="margin-left:0px;font-weight:bolder;color:orange;padding:2px;font-family:'licida grande',tahoma,sans-serif,verdana;background-color:white;width:auto;height:auto;"><?php  echo $fname; ?></p>
</header>

<div id="shift">
  <div id="chat_box"><div id="chat_data" style="float:left;width:70px"></div>
<div id="container" style="overflow:auto;max-height:300px;">
    <center>
    <div id="chat_box">
 
   

</div>
 
<div id="ch" ></div>

</center>
</div>

<form  action="index.php" method="post" style="margin-top:10px;margin-left:10px; ">
<input  type="text" name="msg" style="font-size:30px;width:60vw;height:10vh;border-radius:4%;font-weight:bold;padding:3px;margin-top:3px;font-weight:bolder;" placeholder="enter message" required/><br>
<input type="submit" id="submit" name="submit" value="send it"/><br>
</form><form method="post" action="">
<input type="submit" name="sub" value="logout" style="float:right;"/>
</form>
      
<?php  
                
if(isset($_POST['submit'])){
    $msg  = $fname.":". $_POST['msg'];
    $insert = "INSERT INTO chat_in (msg) values ('$msg')";
    $run = mysqli_query($db,$insert);
    
 /*if($run){
    echo "<embed src='chat.wav' loop='false' autoplay='true' hidden='true'/>";
}*/
}
   



} 
 if(isset($_POST['sub'])){ des();  }  function des(){  session_unset(); session_destroy(); header('refresh:.6;url=index.php'); }   ?>
    </div>
    </div>
    </div>
</body>
</html>
