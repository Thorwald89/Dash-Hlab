  
<?php
if (isset($_POST['printbc'])){
	$zplFile="zpal.txt";
      copy($zplFile, "192.168.4.103/ZDesigner TLP 2844");
      print file_get_contents($zplFile);
		print "<script>window.print()</script>";

//serve a deletare il file     unlink($zplFile);
}
?>

<html>
<body>
	<form action="printzebra.php" method="post">
		<input type="submit" name="printbc" value="Print ZPL">
	</form>
	
	
	
</body>
</html>
