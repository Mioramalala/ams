<html>
<body>
<?php  
include "connexion.php";
session_start(); 

		$requete="update tab_utilisateur set statut_connexion='0' where util_id='".$_SESSION['id']."'";
		$bdd->exec($requete);

session_unset();
session_destroy();

?>
<script type="text/javascript">
   window.location.href="index.php";
</script>
</body>        
</html>