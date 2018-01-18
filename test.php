<!DOCTYPE html>
<html>
<head>
	<title>chat</title>
	 <script src="jquery-1.12.4.min-1.js" type="text/javascript"></script>
	 <script type="text/javascript">
	function ajax(){
  

var req = new XMLHttpRequest();
  req.onreadystatechange = function(){

if(req.readyState ==4  && req.status==200){
	document.getElementById('sol').innerHTML=req.responseText;
}



  }

  req.open('POST','php.php',true);
  req.send();

			} 	


setInterval(function(){ajax();},2000);

	 </script>
</head>

<body onload="">
<div id="sol"></div>
	
<input type="text" name="name"/>
<input type="submit"  name="submit"     onclick="ajax();" />
</body>
</html>