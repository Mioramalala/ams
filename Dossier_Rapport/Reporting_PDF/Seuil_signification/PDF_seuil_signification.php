<?php
	@session_start();
	include("../../../connexion.php");
//Connexion base de donnees

//===================initialisation===============
/*
$capitaux_ppre="";
$immo_corpot_inco="";
$immo_fin="";
$stock="";
$vente_cli="";
$tresorie_devise="";
$proviion_chgr="";
$achat_frs="";
$impot_taxe="";
$paie_pers="";
$pds_chrg="";
$autres_actif="";
$autres_passif="";
$intercomp="";
$autre_pre="";*/
//========REQUETE SQL VERS LA BASE============================

//=====================HEADER PAGE===================================
//===================================================================
?>

<html><head><link rel="stylesheet" type="text/css" href="css_taux_Sondag.css" /></head><body>



<!--  tableau form CATEIN  --> 
     <div id="conteneur" style="margin-left:50px">
			<div class="salarie">
	            <img src="images/logo.png" />                          
	            
            </div>
         
          	<!--  tableau form SOCIETE  -->
          	<div class="societe">
	          
	                          <p>Soci&eacute;t&eacute;: 
							  		<?php $reps="select DISTINCT(m.ENTREPRISE_ID),m.MISSION_ANNEE,e.ENTREPRISE_DENOMINATION_SOCIAL 
										 from tab_mission m,tab_entreprise e,tab_objectif o
										  where m.MISSION_ID='".$_SESSION['idMission']."' 
												and m.ENTREPRISE_ID=e.ENTREPRISE_ID
												and o.MISSION_ID=m.MISSION_ID
												";
											
									  $rps=$bdd->query($reps);
										$donnee=$rps->fetch();
										$soc=$donnee['ENTREPRISE_DENOMINATION_SOCIAL'];
										echo $soc;
									?>
							  </p>
						      <p>Exercice clos au : 
							  		<?php $reps="select MISSION_DATE_CLOTURE
										 from tab_mission 
										  where MISSION_ID='".$_SESSION['idMission']."'";
									  $rps=$bdd->query($reps);
										$donnee=$rps->fetch();
										$soc=$donnee['MISSION_DATE_CLOTURE'];
										echo $soc;
									?>
							  </p>

			</div>
		
		<p><u>TAUX DE SONDAGE</u></p>
			
		<table class="table" border="1">
			<col style="width: 5%" >
			<col style="width: 50%">
			<col style="width: 45%">
			
			<thead>
				<tr >
					<th  colspan="2" class="th">El&eacute;ments communs</th>
					<th colspan="3" style="font-size: 16px;" class="th">
						Taux					</th>
				</tr>
			</thead>
			<tr>
				<td >A</td>
				<td >Fonds propres </td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='fond' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?>
				</td>
			</tr>
			<tr>
				<td >B</td>
				<td >Immobilisations corporelles et incorporelles</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='immo' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >C</td>
				<td >Immobilisations financi&egrave;res</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='immofi' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >D</td>
				<td >Stocks</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='stock' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >E</td>
				<td >Tr&eacute;sorerie</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='tresorerie' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >F</td>
				<td >Charge fournisseurs </td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='charge' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >G</td>
				<td >Ventes-clients </td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='vente' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >H</td>
				<td >Paie-Personnel</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='paie' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >I</td>
				<td >Imp&ocirc;ts et taxes</td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='impot' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >J</td>
				<td >Emprunts et dettes financi&egrave;res </td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='emprunt' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >K</td>
				<td >D&eacute;biteurs et cr&eacute;diteurs divers </td>
				<td><?php $reps="SELECT SEUIL_SIGN FROM tab_planification_ra WHERE PLANIF_CYCLE='dcd' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['SEUIL_SIGN'];
					echo $seuil;
					?>
				</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
		<br>
	<p><i>Cabinet GERARD CATEIN</i></p>	

  </div>



</body>
<?php
///==================================================================

///====================FOOTER PAGE===================================

?>