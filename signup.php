
<?php  include"connection.php";

 session_start(); 

 ?>
     <!DOCTYPE html>
<html>
<head>
	<title></title>
      <meta charset="utf-8"/>
    <meta http-equiv="X-UA-compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
          
<link rel="stylesheet" href="main.css" type="text/css">
<script src="jquery-3.1.1.min.js"></script>
    <style>
    
        form{
            box-shadow:4px 5px 9px  #546688;
        }
input:hover{
border-color:rgba(34,54,4,.3) ;
color: white;
background-color:rgba(34,54,4,.3)

}    
        input[type="text"]{
            font-size:25px;
            height:50px;
            margin-bottom: 10px;
            box-shadow:3px 4px white;
            opacity: .9;
            border-radius:4%;
        }
input[type="email"]{
           
    font-size:25px;
      height:50px;
    margin-bottom: 10px;        
    box-shadow:3px 4px white ;
            opacity: .9;
        border-radius:4%;
        }
        input[type="submit"]{
           
    font-size:25px;
      height:50px;
            margin-left:-110px;
            box-shadow:3px 4px white;
            opacity: .9;
        border-radius:4%;
            width:188px;
            margin-bottom: 10px;
        }
        input[type="file"]{
            width:150px;
    font-size:25px;
      height:50px;
            overflow: hidden;
            margin-left:-149px;         
            opacity: .9;
        border-radius:4%;
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body style="padding:0px;margin:0px;" >
    <div style="margin:0px auto;padding:0px auto;max-width:1310px;">
<header style="background-color:#654543 ;font-size:1.5em;padding:3vh;width:98%;margin-top:0px;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;"><h1 style="color:#867563;
"><u>Ait chat</u><span style="font-size:20px;color:white;font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;">Serve your dreams</span></h1> <p style="margin-left:0px;font-weight:bolder;color:white;padding:2px;font-family:'licida grande',tahoma,sans-serif,verdana;background-color:#657687;width:auto;height:auto;float:right;">
</header>

<div id="form">
  <a href="index.php" style="color:white;">login</a></span>
 <center>
         
<form  style="margin-top:10px;margin-left:0PX auto;padding-bottom:10px;min-width:200px;max-width:300px; " action="" method="post" enctype="multipart/form-data">
    <p style="font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;content-align:center;font-size:30px;color:
            #546677;">JOIN US<br><span style="">
    <input type="text" name="name"   placeholder=" Name" id="name" required /><br>
    <input type="email" name="email" placeholder=" Email" id="email" required/><br>
    <input type="file" style="" name="upload" alt="choose a profile" id="file" ><br>
    <input type="submit" name="submit" value="signup" id="submit" /><br>
        
</form>
         <p style="font-family: 'lucida grande',tahoma,sans-serif,verdana,arial;content-align:center;font-size:30px;color:
            ;">Already have an account <a href="index.php" style="color:#564;">login</a><br><span style="">
        </center>
</div>
<?php

if(isset($_POST['submit']))
{
     $imgname = $_FILES['upload']['name'];
            $size = $_FILES['upload']['size'];
            $temp = $_FILES['upload']['tmp_name'];     
            $name = $_POST['name'];
           $e = $_POST['email'];
          $email = trim(strtolower($e));
$ext = explode('.',$imgname);
    $extension = strtolower(end($ext));
    if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg '  || $extension == ''){
    
       $uni = substr(uniqid(),5,5);
       $destinati = "http://tweetgro.xp3.biz/ftp/".$imgname;

       $move =  move_uploaded_file($temp,$destinati);

    $query = mysqli_query($db,"SELECT email,password,img FROM log  where email='$email' ");
     while($row = mysqli_fetch_array($query))
     {
        $femail = $row['email'];
         
          $fpass = $row['password'];
     }
      $count = mysqli_num_rows($query);
    if($count>0){
    echo "<p style='color:white;padding:3px;background-color:#657754;'>sorry this mail has already been signdup</p>";
    header('refresh:4,url=""');
    }
    
    else {

$pa = uniqid();
        
       
  $password =    trim( substr($pa,1,8));
$subject = "trust";
$headers = "From:itsmesachin987@gmail.com";

$msg = $password.": is  your password for varification of your email kindely reset your password";
$mail =  mail($email,$subject,$msg,$headers);
    $sth=mysqli_query($db,"INSERT INTO log(name,email,password,img) VALUES ('$name','$email','$password','$destinati')");
    $to = $email;
    echo "<script>alert('you will get an authantication mail   ');</script> ";
header('refresh:2;url="reset.php"');
}
    } 
  else {
  echo "<p style='color:red;'>you can upload only in  .jpg , .png and .jpeg format img files</p>";
  header('refresh:4,url="index.php"');
}  
}

?>
<!--<div id="foot" style="color:white;background-color:black;">
<center style="padding-bottom:0px; padding:40px;">Published by the  Edevine Team...........   AUTHOR: <a  style="color:grey;" href="mailto:itsmesachin987@gmail.com">  itsmesachin987@gmail.com</a></center>

</div>-->
    </div>
    
</body>
</html>
