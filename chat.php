

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css" type="text/css"/>
	<title>chat</title>
	</head>
<body >
<?php 

 include"connection.php";
 $query = "SELECT * FROM chat_in ORDER BY id DESC ";
 $run   =  mysqli_query($db,$query);
 while($row = mysqli_fetch_array($run)) {
 ?>

<div id="chat_data" style="background-color:rgba(5,,66,0.9);text-align:justify;text-justify:inter-word;max-width:300px;margin-top:20px;font-size:20px;padding:30px;padding-left:10px;min-width:100px;height:auto;font-family:'lucida grande',tahoma,arial,verdana,sans-serif;color:rgba(12,68,45,.8);border-radius:15px;box-shadow:2px 5px 8px  rgba(41,68,55,.9);content-align:justify;margin:0px auto; ">
<span style="font-size:20px; color:#657689;overflow:hidden;float:left;" ><?php  $sub = $row['msg'];   $revo  = strrev($sub);  $expo  = explode(":",$revo);  $revt = end($expo); 
echo strrev($revt).":"; ?></span><br/>
<span style="font-size:20px; color:white;background-color:#588965;padding:2px;overflow:hidden;border-radius:15%;" ><?php  $sub = $row['msg'];   $exp =explode(":",$sub);  echo  end($exp);  ?></span>
<span  style="color:black;font-size:15px;float:right;"><?php echo formatDate( $row['date']); ?></span>
	
</div>
<?php 
}

?>
</body >
</html>
 