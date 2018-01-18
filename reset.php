<?php include"connection.php"; 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>reset password</title>
     <meta charset="utf-8"/>
    <meta http-equiv="X-UA-compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
          
<link rel="stylesheet" href="main.css" type="text/css">
<script src="jquery-3.1.1.min.js"></script>
    <style >
    
        form{
            width: 300px;
            margin:0px auto;
            box-shadow:4px 5px 9px  #546688;
        }
input:hover{
border-color:rgba(34,54,4,.3) ;
color: white;
background-color:rgba(34,54,4,.3)

}    
        
input[type="email"]{
            height:30px;
    font-size:20px;
            opacity: .9;
     margin-left:-60px;
            padding:10px;
    
    
        border-radius:4%;
        }
        input[type="submit"]{
           
    font-size:20px;
      
            margin-left:-60px;
            box-shadow:3px 4px white;
            opacity: .9;
        border-radius:4%;
            margin-bottom: 10px;
        }
        input[type="password"]{
    font-size:20px;
      height:20px;
            overflow: hidden;
            margin-left:-60px;         
            opacity: .9;
            padding:10px;
        border-radius:4%;
            margin-bottom: 10px;
        }
    form{border-top:outset;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;}
   
input:hover{
border-color:#445566;
background-color:#567776;


}    </style>

</head>

<body style="margin:0px auto;padding:0px;">
<header style="background-color:#654543 ;font-size:1.5em;padding:3vh;width:98%;margin-top:0px;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;"><h1 style="color:#867563;
"><u>Ait chat</u><span style="font-size:20px;color:white;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;">Serve your dreams</span></h1> <p style="margin-left:0px;font-weight:bolder;color:white;padding:2px;font-family:'licida grande',tahoma,sans-serif,verdana;background-color:#657687;width:auto;height:auto;float:right;">
</header>
<div id="bind" style="margin:0px auto;padding:0px ; ">
<center>
<div id="form">
<h1><em style="color:white;">password reset</em></h1>
<img src="login.jpg" height="60px" width="60px">
<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="email" name="email"   placeholder="email"  id="email" required/><br>
    <input type="password" name="oldpass" placeholder=" current password"  id="opass" required /><br>
    <input type="password" name="newpassword"   placeholder="new password" minlength="8" id="pass" required/><br>
    <input type="submit" name="submit"  id="submit" value="signup" required/>
</form></div>
    <p style="color:#764534;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;font-size:20px;">Change  your password <SPAn>to play safe</SPAn></p>
    </center>

<?php
    
 if(isset($_POST['submit'])) {
    $email =   $_POST['email'];
    $pas =  $_POST['oldpass'];
     $npass  = $_POST['newpassword'];
     
     $sth = mysqli_query($db,"SELECT email,password FROM log ");
     while($row = mysqli_fetch_array($sth)){
      $femail = $row['email'];
   $fpass = $row['password'];
         }

     if(   $femail  == $email && $fpass ==  $pas)
     {

         $sth= mysqli_query($db,"UPDATE log SET password='".$npass."' where email='".$email."' ");
         echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <p style='color:white;background-color:#545643;padding:4px;margin-left:2vw;'><script>alert('your password has been reset successfully');</script>";
       header('refresh:4,url="index.php"');
     }
     else {
         echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <script>alert('check your current password or mail');</script>";
         header('refresh:4,url="reset.php"');
     }
 }
    
    
    
    
    
    
    
    
?></div>

</body>
</html>

