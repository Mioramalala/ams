<?php
	session_start();
	include '../../../connexion.php';

	$req=$bdd->query("SELECT * FROM tab_reslt_fiscal WHERE MISSION_ID='".$_SESSION['idMission']."'");
	$tab=$req->fetch();
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/impot/impot.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width:98%;height:100px;margin: 10px auto;}
		</style>
</head>
<body>
	<center>
		<p class="titreRenvoie">RESULTAT FISCAL</p>
	</center>
	<div class="cadre">
		<textarea id="redaction" placeholder="Veuillez rédiger votre commentaire ici ..."><?php echo $tab['REDACTION']; ?></textarea><br />

		<div id="uploadJustification">
			<iframe style="display:none;" name="uploadFrame"></iframe>
			<?php 
				$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'impot_taxe_C1'";
				$rep =$bdd->query($sql);
				
				if($donnee = $rep->fetch()) {
			?>
				<a href="<?php echo "pieces_justificatives/pj_impot_taxe_C1_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
			<?php
				}
			?>
			<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
				<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
				<input type="hidden" name="pour" value="impot_taxe_C1" />
				<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
				<input type="file" id="fichier" name="fichier"/>
				<input id="submit" type="submit" value="Upload" />
			</form>
		</div>
	</div>
	
	<div id="fermer" style="display:none;">
		<center>
		    <p> Voulez vous vraiment fermer l'application ?</p>
		    <p>
		    	<input type="button" value="Valider" id="okferme"/>
		    </p>
		</center>
    </div>
</body>