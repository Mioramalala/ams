<html>
	<head>
		<link rel = "stylesheet" href = "../css/styleNewUser.css"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	</head>
	<body>
		<!--img src="../img/exit-retour.png" id="fermer" class="boutonFerme" title="Fermer"/-->
		
		<div id="cadreUtilisateur">	
			<div id="listUtil">
				<div id="titreUser">La liste des utilisateurs</div>
				<table style="width:875px;background-color:#007FFF;box-shadow:2px 10px 10px #ccc;">
					<tr style="height:30px;font-size: 10pt;font-weight: bold;">
						<td style="width:250px;"><label style="color:white;">Nom</label></td>
						<td width="200px"><label style="color:white;">Login</label></td>
						<td width="150px"><label style="color:white;">Titre</label></td>
						<td width="100px"><label style="color:white;">Statut</label></td>
					</tr>
				</table>
				<div id="pllist" style="height:430px;">
					<table id="listUser">
						<?php
							include '../connexion.php';
							$sql="SELECT UTIL_ID,UTIL_NOM,UTIL_LOGIN,UTIL_ACTIF,UTIL_STATUT FROM   tab_utilisateur order by UTIL_NOM ASC ";
								$rep=$bdd->query($sql);
								$compt=0;
								while($donnee=$rep->fetch()){
									$idUtil=$donnee['UTIL_ID'];
									$nomU=$donnee['UTIL_NOM'];
									$logU=$donnee['UTIL_LOGIN'];
									$actif=$donnee['UTIL_ACTIF'];
									$statu=$donnee['UTIL_STATUT'];
									
						?>
									<tr height="50px" id="ligne<?php echo $compt;?>">
										<td width="250px">
										
											<?php echo $nomU ;?>
										</td>
										<td width="200px"><?php echo $logU; ?></td>
										<td width="150px">
										<?php
											if($statu==0){ echo 'Auditeur';}
											elseif($statu==1){echo 'Superviseur';}
											else{echo 'Administrateur';}
										?>
										</td>
										<?php
											if($actif=="Actif"){
										?>
												<td width="100px" style="color:#12c300;"><?php echo $actif ;?></td>
										<?php
											}
											else {
										?>
												<td width="100px" style="color:red;"><?php echo $actif ;?></td>
										<?php
											}
										?>
										
									</tr>
						<?php	
									$compt++;
								}
				
						?>
					</table>
				</div>
			</div>
			
			
		</div>

	</body>
</html>