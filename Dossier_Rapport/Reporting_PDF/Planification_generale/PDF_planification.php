<?php

	@session_start();
	include("../../../connexion.php");
?>

<html><head><link rel="stylesheet" type="text/css" href="css_taux_Sondag.css" />

<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
    h1 {color: #000033}
    h2 {color: #000055}
    h3 {color: #000077}

    div.niveau
    {
        padding-left: 5mm;
  padding-top:75px;
    } 
 .niveau0
    {
        padding-left: 5mm;
  padding-top:110px;
    }
 table
 {
 border-collapse:collapse;
 border :1px solid black;
 }
-->
</style>

</head>
<body>
 <page_header>
      <div style="padding-left:20px">
      <table width="706" height="112"  border="1" class="table">
        <tr>
          <td width="201" rowspan="2"><img src="images/HEADER.png" alt="haha" width="195" height="103"  /></td>
          <td width="489" height="64" align="left"><strong>Soci&eacute;t&eacute; : <span style="color: CMYK(0, 0, 100%, 0)"><b> <?php $reps="select DISTINCT(m.ENTREPRISE_ID),m.MISSION_ANNEE,e.ENTREPRISE_DENOMINATION_SOCIAL 
										 from tab_mission m,tab_entreprise e,tab_objectif o
										  where m.MISSION_ID='".$_SESSION['idMission']."' 
												and m.ENTREPRISE_ID=e.ENTREPRISE_ID
												and o.MISSION_ID=m.MISSION_ID
												";
											
									  $rps=$bdd->query($reps);
										$donnee=$rps->fetch();
										$soc=$donnee['ENTREPRISE_DENOMINATION_SOCIAL'];
										echo $soc;
									?></b></span></strong></td>
        </tr>
        <tr>
          <td height="40" align="left">Exercice clos au : <?php $rer='SELECT MISSION_DATE_CLOTURE FROM tab_mission'; 
																$rps1=$bdd->query($rer);
																$donnee=$rps1->fetch();
																$dat=$donnee['MISSION_DATE_CLOTURE'];
																echo $dat;
															?>
		  </td>
        </tr>
    </table>
 </div>
</page_header>
<br><br>

<!--  tableau form CATEIN  --> 
     <div id="conteneur" style="margin-top:200px">
       <!--  tableau form SOCIETE  -->

		
		<p><u>TAUX DE SONDAGE</u></p>
			
		<table class="table" border="1">
			<col style="width: 5%" >
			<col style="width: 50%">
			<col style="width: 45%">
			
			<thead>
				<tr >
					<th  colspan="2" class="th">Cycles</th>
					<th colspan="3" style="font-size: 16px;" class="th">
						Planification					</th>
				</tr>
			</thead>
			<tr>
				<td >A</td>
				<td >Fonds propres </td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='fond' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >B</td>
				<td >Immobilisations corporelles et incorporelles</td>
				<td> <?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='immo' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >C</td>
				<td >Immobilisations financi&egrave;res</td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='immofi' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >D</td>
				<td >Stocks</td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='stock' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >E</td>
				<td >Tr&eacute;sorerie</td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='tresorerie' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >F</td>
				<td >Charge fournisseurs </td>
				<td> <?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='charge' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?></td>
			</tr>
			<tr>
				<td >G</td>
				<td >Ventes-clients </td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='vente' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >H</td>
				<td >Paie-Personnel</td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='paie' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >I</td>
				<td >Imp&ocirc;ts et taxes</td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='impot' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >J</td>
				<td >Emprunts et dettes financi&egrave;res </td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='emprunt' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
			</tr>
			<tr>
				<td >K</td>
				<td >D&eacute;biteurs et cr&eacute;diteurs divers </td>
				<td><?php $reps="SELECT PLANIF_GEN FROM tab_planification_ra WHERE PLANIF_CYCLE='dcd' 
					AND MISSION_ID='".$_SESSION['idMission']."' order by PLANIF_ID desc"; 
					$rps1=$bdd->query($reps);
					$donnee=$rps1->fetch();
					$seuil=$donnee['PLANIF_GEN'];
					echo $seuil;
					?> </td>
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