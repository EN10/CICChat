<html>
<? 	session_start();
	if ($_SESSION['user'] == "") 
	{  header("Location: IEcookieError.html"); }
?>
<frameset rows="*,70%,*">
  <frame src="header.htm" />
  <frameset cols="20%,*">
    <frame src="menu.php" />
    <frame src="content.php" />
  </frameset>
    <frame src="footer.php" />
</frameset>

</html>