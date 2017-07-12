<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$cpt=1;

$tab_tr=array();
$nbr=2;
for($i=2;$i<100;$i++){

	$nbr=$nbr+1;
	
	$queryAffiche='select * from  tab_rdc_tr_e2 where mission_id='.$mission_id.' and cpt='.$nbr.' and reference="E2"';
	$reponseAffiche=$bdd->query($queryAffiche);
	$donneesAffiche=$reponseAffiche->fetch();
	
	$tab_tr[$i]='<tr bgcolor="white" id="tr_ligne_E2'.$i.'" style="display:none;">
		<td><textarea id="avis'.$nbr.'"  cols="16" rows="5">'.$donneesAffiche['avis'].'</textarea></td>
		<td><textarea id="date'.$nbr.'"  cols="10" rows="1">'.$donneesAffiche['date'].'</textarea></td>
		<td><textarea id="nature'.$nbr.'"  cols="25" rows="5">'.$donneesAffiche['nature'].'</textarea></td>
		<td><textarea id="compta'.$nbr.'"  cols="15" rows="5">'.$donneesAffiche['compta'].'</textarea></td>
		<td><textarea id="observation'.$nbr.'"  cols="25" rows="5">'.$donneesAffiche['observation'].'</textarea></td>
		<td>
		<label style="color:#6495ED;font-size:10px;" id="ajoutLigneE2" onclick="ajoutLigneE2('.$nbr.')">Ajout</label><br />
		<label style="color:#6495ED;font-size:10px;" id="modifLigneE2" onclick="modifLigneE2('.$nbr.')">Modif</label><br />
		<label style="color:#6495ED;font-size:10px;" id="supprLigneE2" onclick="supprLigneE2('.$nbr.')">Sup</label></td>
	</tr>';
}
?>
<script>
	function ajoutLigneE2(cpt){
		$('#tr_ligne_E2'+cpt).show();
		enregistreTableE2(cpt);
	}
	
	function supprLigneE2(cpt){
		supprimerTableE2(cpt)
		cpt=cpt-1;		
		$('#tr_ligne_E2'+cpt).hide();
	}
	function enregistreTableE2(cpt){
		var avis=$("#avis"+cpt).val();
		var date=$("#date"+cpt).val();
		var nature=$("#nature"+cpt).val();
		var compta=$("#compta"+cpt).val();
		var observation=$("#observation"+cpt).val();
		
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/B_regularite/addDataTableE2.php',
			data:{avis:avis, date:date, nature:nature, compta:compta, observation:observation, mission_id:<?php echo $mission_id;?>, cpt:cpt, reference:'E2'},
			success:function(){
				document.getElementById("avis"+cpt).disabled=true;
				document.getElementById("date"+cpt).disabled=true;
				document.getElementById("nature"+cpt).disabled=true;
				document.getElementById("compta"+cpt).disabled=true;
				document.getElementById("observation"+cpt).disabled=true;
			}
		});
	}
	function supprimerTableE2(cpt){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/B_regularite/supprDataTableE2.php',
			data:{mission_id:<?php echo $mission_id?>, cpt:cpt, reference:'E2'},
			success:function(){
			}
		});
	}
	function modifLigneE2(cpt){
		document.getElementById("avis"+cpt).disabled=false;
		document.getElementById("date"+cpt).disabled=false;
		document.getElementById("nature"+cpt).disabled=false;
		document.getElementById("compta"+cpt).disabled=false;
		document.getElementById("observation"+cpt).disabled=false;
	}
</script>
<link rel="stylesheet" href="../RDC/tresorerie/css_tresorerie.css">

<div class="titre_table"style="width:920px;" >Vérification des écritures de caisse(E2)</div>
<div style="overflow:auto;height:400px;">
<table width="100%">
	<tr class="tr_table_D1" style="background-color:#6495ED;">
		<td style="color:white;">Bon de Caisse</td>
		<td style="color:white;">Date</td>
		<td style="color:white;">Nature opération</td>
		<td style="color:white;">Correct comptabilisation</td>
		<td style="color:white;">Observations</td>
		<td></td>
	</tr>
	<?php
	
		$queryAffiche='select * from  tab_rdc_tr_e2 where mission_id='.$mission_id.' and cpt=2 and reference="E2"';
		$reponseAffiche=$bdd->query($queryAffiche);
		$donneesAffiche=$reponseAffiche->fetch();
	
	?>
	<tr bgcolor="white">
		<td><textarea id="avis2"  cols="16" rows="5"><?php echo $donneesAffiche['avis']; ?></textarea></td>
		<td><textarea id="date2"  cols="10" rows="1"><?php echo $donneesAffiche['date']; ?></textarea></td>
		<td><textarea id="nature2"  cols="25" rows="5"><?php echo $donneesAffiche['nature']; ?></textarea></td>
		<td><textarea id="compta2"  cols="15" rows="5"><?php echo $donneesAffiche['compta']; ?></textarea></td>
		<td><textarea id="observation2"  cols="25" rows="5"><?php echo $donneesAffiche['observation']; ?></textarea></td>
		<td>
		<label style="color:#6495ED;font-size:10px;" id="ajoutLigneE2" onclick="ajoutLigneE2(2)">Ajout</label><br />
		<label style="color:#6495ED;font-size:10px;" id="modifLigneE2" onclick="modifLigneE2(2)">Modif</label><br /><label style="color:#6495ED;font-size:10px;" id="supprLigneE2" onclick="supprLigneE2(2)">Sup</label>
		</td>
	</tr>
	<?php 
		for($j=2;$j<100;$j++){
			echo $tab_tr[$j];
		}
	?>
</table>
</div>