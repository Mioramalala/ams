<?php
	session_start();
	include '../../../connexion.php';

	$reqSyn=$bdd->query("SELECT * FROM tab_synthese_ra WHERE SYNTHESE_OBJECTIF = 'paie' AND MISSION_ID='".$_SESSION['idMission']."'");
	$syn = $reqSyn->fetch();
	$reqCon=$bdd->query("SELECT * FROM tab_conclusion_ra WHERE CONCLUSION_OBJECTIF = 'paie' AND MISSION_ID='".$_SESSION['idMission']."'");
	$con = $reqCon->fetch();
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width: 100%;height: 100%;font-size: 8pt;}
			.cadre1{width: 930px;height: 310px;overflow:hidden;}
			.cadre2{width: 930px;height: 120px;overflow:hidden;}
			.cadre1:hover,.cadre2:hover{overflow:auto;}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				waiting();								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieA/requetA1.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
						stopWaiting();
					}				
				});
			});
		</script>
	</head>
	<body>
		<center><p class="titreRenvoie">Revue analitique</p></center>
		<div class="cadre">
			<div class="cadre1">
				<table class="h1">
					<tr class="sous-titre">
						<td width="100px">Compte</td>
						<td width="200px">Libellé</td>
						<td width="100px">Débits</td>
						<td width="100px">Crédits</td>
						<td width="100px">Soldes N</td>
						<td width="100px">Soldes N-1</td>
						<td width="100px">Variation</td>
						<td width="100px">Pourcentage</td>
						<td width="200px">Commentaires</td>
					</tr>
				</table>
				<span id="resultat"></span>
			</div>
			<div class="cadre2">
				<table width="910px">
					<tr class="sous-titre">
						<td>S Y N T H E S E</td>
						<td>C O N C L U S I O N</td>
					</tr>
					<tr>
						<td height="100px"><textarea id="synthese" placeholder="Votre synthèse" readonly><?php echo $syn['SYNTHESE'];?></textarea></td>
						<td height="100px"><textarea id="conclusion" placeholder="Votre commentaire" readonly><?php echo $con['CONCLUSION'];?></textarea></td>
					</tr>
				</table>
			</div>
		</div>
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>