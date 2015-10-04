<html>

<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<meta http-equiv='Refresh' content='10; url=main-old.php'/>

<script type="text/javascript">
function validate(theform)
{ if (theform.msg==null || theform.msg.value=="")
    {	    alert("ERROR: Please enter Message"); return false;	}
    else
    {	return true;	}
}
</script>
</head>

<body>

<div id="container" style="width:500px">

<div id="header" style="background-color:white;">
<img src="IC Logo.png" /></div>

<div id="menu" style="background-color:blue;color:red;height:200px;width:100px;float:left;">
<b>Users</b><br>
<p>&nbsp;</p>
<?	error_reporting(E_ALL ^ E_NOTICE); echo $_SESSION['user']; ?>
<p>&nbsp;</p>
Still in Beta
</div>

<div id="content" style="background-color:white;height:200px;width:400px;float:left;">
<?	session_start();	
	if ($_SESSION['user'] == "") 
	{  header("Location: /IEcookieError.html"); }

	$con = mysql_connect("localhost","enio","password");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_select_db("chat", $con);
	
	$UT = time();
	
	if (!($_POST['msg'] == ""))
	{	$msg =  mysql_real_escape_string($_POST[msg]);
		$D = date("Y/m/d");
		$T = date("H:i");
		$sql="INSERT INTO msgs(Date, Time, UnixTime, USER, MSG) VALUES
			('$D','$T', '$UT', '$_SESSION[user]', '$msg')";
		if (!mysql_query($sql,$con)) die('Error: ' . mysql_error());
	}
	
	$result = mysql_query("SELECT * FROM msgs ORDER BY UnixTime ASC");
	while($row = mysql_fetch_array($result))
	{	if ($_SESSION['login'] - $row['UnixTime'] < 1000 )
		{ 	echo $row['Time']." ".$row['User']." : ".$row['Msg']."<br>";
		}
	}

	mysql_close($con);
?>
</div>

<div id="footer" style="background-color:yellow;clear:both;text-align:center;">
<form name="input" onsubmit="return validate(this)" action="main.php" method="post">
Message: <input type="text" name="msg" size="50" />
<input type="submit" value="Send" />
</form>
Copyright © 2011 SmartTalk.tk</div>

</div>
 
</body>
</html>