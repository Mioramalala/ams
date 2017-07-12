<html>
<body>
<?php
include "connexion.php";
session_start();
        $datetime=date("Y-m-d H:i:s");
		$requete="update tab_utilisateur set date_connect='$datetime', statut_connexion='0' where util_id='".$_SESSION['id']."'";
		$bdd->exec($requete);


$temps =0;
setcookie('tpscon_noactif', NULL, -1);

session_unset();
session_destroy();


setcookie ("tpscon_noactif", $temps, time() + 0);

?>
<script type="text/javascript">
   window.location.href="index.php";
</script>
</body>        
</html>