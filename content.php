<html>

<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<script type="text/javascript">
function refresh()	// JS onload event
{	// loop every 5s
var t=setTimeout("refresh()",5000);
  // code for IE7+, Firefox, Chrome, Opera, Safari
  var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("message").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmsg.php",true);	// faster than POST
xmlhttp.send();
}
</script>
</head>

<body onload="refresh()" >

<div align="left" id="message"></div>

</body>
</html>