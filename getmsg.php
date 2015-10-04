<?	session_start();	

	$con = mysql_connect("localhost","enio","password");
	if (!$con) die('Could not connect: ' . mysql_error());
	mysql_select_db("chat", $con);
	
	$result = mysql_query("SELECT * FROM msgs ORDER BY UnixTime ASC");
	echo "<br>";
	while($row = mysql_fetch_array($result))
	{	if ($_SESSION['login'] - $row['UnixTime'] < 1000 )
		{ 	echo " &nbsp; &nbsp; &nbsp; ".$row['Time']." : ".$row['User']." : ".$row['Msg']."<br>";
		}
	}
	mysql_close($con);
?>