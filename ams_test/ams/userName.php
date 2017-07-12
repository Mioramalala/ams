<?php 
	include 'connexion.php';
	session_start();
	$userName=$_SESSION["nom"];
	?>
	
	<p><div id="NomUser2" ><center><?php echo $userName; ?></center></div></p>
