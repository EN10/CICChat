<?	session_start();

	$con = mysql_connect("localhost","enio","password");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_select_db("chat", $con);
	
	$UT = time();
	$result = mysql_query("SELECT * FROM users WHERE Online = 1");
	while($row = mysql_fetch_array($result))
	{	if ($UT - $row['UnixTime'] < 1000 )
		{ 	echo $row['Username']."<p>";
		}
	}
	
	mysql_close($con);
?>