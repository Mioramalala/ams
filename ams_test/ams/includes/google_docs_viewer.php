<?php
	$id = trim($_GET['id']);
	$nomfichier = stripslashes($_GET['nomfichier']);
	$url = 'http://'.$_SERVER["HTTP_HOST"].'/'; // dynamiquement
	// $url = 'http://ams.tms-consulting.pro/'; // pour le serveur OVH
	// $url = 'http://41.188.17.140/'; // pour le serveur TELMA
	$serveur = $_SERVER["HTTP_HOST"];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualisation de document</title>
	<link href="../css/google-viewer.css" rel="stylesheet" type="text/css" />
</head>
<body class="body-google-viewer">
	<a href="<?php echo $url.$id ?>" class="bouton">T&eacute;l&eacute;charger le document</a>
	<?php if($serveur != 'localhost'){ ?>
		<iframe src="http://docs.google.com/viewer?url=<?php echo $url.$id;?>&embedded=true" width="1000px" height="650px" style="border:none;"></iframe>
	<?php } else { ?>
		<img src="<?php echo $url.$id;?>" width="1000px" height="650px" style="border:none;" alt= "Impossible de visualiser ce document sur le serveur local mais vous pouvez le T&eacute;l&eacute;charger">
	<?php } ?>
</body>
</html>




