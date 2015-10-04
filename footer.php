<?	session_start();	
	if ($_SESSION['user'] == "") 
	{  header("Location: /IEcookieError.html"); }

	$con = mysql_connect("localhost","enio","password");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_select_db("chat", $con);
	
	date_default_timezone_set("Europe/London");
	$UT = time();

	error_reporting(E_ALL ^ E_NOTICE);	// Notice: Undefined index: msg 
	if (!($_POST['msg'] == ""))
	{	$msg =  mysql_real_escape_string($_POST['msg']);
		$D = date("Y/m/d");
		$T = date("H:i");
		$sql="INSERT INTO msgs(Date, Time, UnixTime, User, Msg) VALUES
			('$D','$T', '$UT', '$_SESSION[user]', '$msg')";
		if (!mysql_query($sql,$con)) die('Error: ' . mysql_error());
	}
	mysql_close($con);
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<script type="text/javascript">
function validate(theform)
{	if (theform.msg==null || theform.msg.value=="")
    {	alert("ERROR: Please enter Message"); return false;	}
    else
    {	return true;	}
}
</script>
</head>

<body>
<div id="footer" style="background-color:yellow;clear:both;text-align:center;">
<form method="POST" onsubmit="return validate(this)" action="footer.php">
Message: <input type="text" name="msg" size="50" />
<input type="submit" value="Send" />
</form>
Copyright © 2011 Enio.tk </div>
</div>
</body>
</html>		