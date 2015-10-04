<html>

<head>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<meta http-equiv='Refresh' content='3; url=main.php'/>
</head>

<body>

<div id="container" style="width:500px">

<div id="header" style="background-color:white;">
<img src="IC Logo.png" /></div>

<div id="content"; align="center"; style="background-color:white;height:200px;width:400px;float:left;">

<? 	session_start();

	$con = mysql_connect("localhost","enio","password");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_select_db("chat", $con);
	
	date_default_timezone_set("Europe/London");
	$un =  mysql_real_escape_string($_POST['username']);
	$_SESSION['user'] = $un;
	$_SESSION['login'] = time();
	$DT = date("Y/m/d H:i");
	$UT = time();
	
	$result = mysql_query("SELECT * FROM users WHERE Username = '$un'");
		$exists="no";
		while($row = mysql_fetch_array($result))
		{	if (($row['Username'] == $un) && ($row['Online'] == 1) && ($row['IP'] == $_SERVER['REMOTE_ADDR'])) $exists="yes"; }
	if ($exists=="yes") 
	{	// echo "ERROR: User ".$un." already exists";
		$sql = "UPDATE users SET LastOnline = '$DT', UnixTime = '$UT'
			WHERE Username = '$un' AND IP = '$_SERVER[REMOTE_ADDR]'";
		if (!mysql_query($sql,$con)) die('Error: ' . mysql_error());
	}
	if ($exists=="no")
	{	$sql="INSERT INTO users(Username, IP, Browser, Online, LastOnline, UnixTime) VALUES
		('$un','$_SERVER[REMOTE_ADDR]', '$_SERVER[HTTP_USER_AGENT]', 1, '$DT', '$UT')";
		if (!mysql_query($sql,$con)) die('Error: ' . mysql_error());
	}
	?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<?
	// echo "Exists : ".$exists."<br>";
	echo "Logging you in ".$_SESSION['user'].".";
	mysql_close($con);
?>

</div>

<div id="footer" style="background-color:yellow;clear:both;text-align:center;">
Copyright © 2011 SmartTalk.tk</div>

</div>
 
</body>
</html>