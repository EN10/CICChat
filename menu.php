<html>

<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<script type="text/javascript">
function refresh()	// JS onload event
{	// loop every 5s
var t=setTimeout("refresh()",10000);
  // code for IE7+, Firefox, Chrome, Opera, Safari
  var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("users").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getusers.php",true);	// faster than POST
xmlhttp.send();
}
</script>
</head>

<body onload="refresh()">
<div id="menu" style="background-color:blue;color:red">
<b>Users</b> <i>1000s</i> <br>
<p>&nbsp;</p>

<div id="users"></div>

<p>&nbsp;</p>
Still in BETA Testing!
</div>
</body>
</html>