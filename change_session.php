<?php 
	@session_start();
	$_SESSION['tache']=$_POST['sess'];
	echo $_SESSION['tache'];
	//verification
?>