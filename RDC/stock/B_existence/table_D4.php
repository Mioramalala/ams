<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$cpt=1;

$tab_tr=array();
$nbr=2;
$lignes=0;

$rq = 'select COUNT(*) AS COMPTE from  tab_rdc_st_d4 where mission_id='.$mission_id;
$rep = $bdd->query($rq);
$d = $rep->fetch();

$lignes = $d["COMPTE"];
$lignes+=1;

for($i=2;$i<$lignes;$i++){

	$nbr=$nbr+1;
	
	$queryAffiche='select * from  tab_rdc_st_d4 where mission_id='.$mission_id.' and cpt='.$nbr;
	
	$reponseAffiche=$bdd->query($queryAffiche);
	$donneesAffiche=$reponseAffiche->fetch();
	
	$tab_tr[$i]='<tr id="tr_ligne'.$i.'" bgcolor="white" height="20px" data-uid="'.$nbr.'">
					<td width="10%"><textarea id="categorie'.$nbr.'" cols="15" rows="5">'.$donneesAffiche['categorie'].'</textarea></td>
					<td width="10%"><textarea id="produit'.$nbr.'" cols="15" rows="5">'.$donneesAffiche['produit'].'</textarea></td>
					<td width="20%"><textarea id="designation'.$nbr.'" cols="15" rows="5">'.$donneesAffiche['designation'].'</textarea></td>
					<td width="10%"><textarea id="etat_theorique'.$nbr.'" cols="15" rows="5" class="rdc-existence-solde-etat-theorique">'.$donneesAffiche['etat_theorique'].'</textarea></td>
					<td width="10%"><textarea id="etat_inventaire'.$nbr.'" cols="15" rows="5" class="rdc-existence-solde-etat-inventaire">'.$donneesAffiche['etat_inventaire'].'</textarea></td>
					<td width="10%"><textarea id="ecart'.$nbr.'" cols="15" rows="5">'.$donneesAffiche['ecart'].'</textarea></td>
					<td width="20%"><textarea id="observation'.$nbr.'" cols="15" rows="5">'.$donneesAffiche['observation'].'</textarea></td>
					<td width="10%">
					<label style="color:#6495ED;" id="ajoutLigne" onclick="enregistreTableD4('.$nbr.')">Enregistrer</label><br />
					<label style="color:#6495ED;" id="ajoutLigne" onclick="ajoutLigne('.$nbr.')">Ajout</label><br />
					<label style="color:#6495ED;" id="modifLigne" onclick="modifLigneD4('.$nbr.')">Modif</label><br />
					<label style="color:#6495ED;" id="supprLigne" onclick="supprLigne('.$nbr.')">Sup</label></td>
				</tr>';

	//print_r($tab_tr[$i]);
}
?>
<link rel="stylesheet" type="text/css" href="../css_stock.css">
<script>
	var cpt;
	function ajoutLigne(cpt){
		var html = '<tr id="tr_ligne'+(cpt*1+1)+'" bgcolor="white" height="20px" data-uid="'+(cpt*1+1)+'">'+
						'<td width="10%"><textarea id="categorie'+(cpt*1+1)+'" cols="15" rows="5"></textarea></td>'+
						'<td width="10%"><textarea id="produit'+(cpt*1+1)+'" cols="15" rows="5"></textarea></td>'+
						'<td width="20%"><textarea id="designation'+(cpt*1+1)+'" cols="15" rows="5"></textarea></td>'+
						'<td width="10%"><textarea id="etat_theorique'+(cpt*1+1)+'" cols="15" rows="5" class="rdc-existence-solde-etat-theorique"></textarea></td>'+
						'<td width="10%"><textarea id="etat_inventaire'+(cpt*1+1)+'" cols="15" rows="5" class="rdc-existence-solde-etat-inventaire"></textarea></td>'+
						'<td width="10%"><textarea id="ecart'+(cpt*1+1)+'" cols="15" rows="5"></textarea></td>'+
						'<td width="20%"><textarea id="observation'+(cpt*1+1)+'" cols="15" rows="5"></textarea></td>'+
						'<td width="10%">'+
						'<label style="color:#6495ED;" id="ajoutLigne" onclick="enregistreTableD4('+(cpt*1+1)+')">enregistrer</label><br />'+
						'<label style="color:#6495ED;" id="ajoutLigne" onclick="ajoutLigne('+(cpt*1+1)+')">Ajout</label><br />'+
						'<label style="color:#6495ED;" id="modifLigne" onclick="modifLigneD4('+(cpt*1+1)+')">Modif</label><br />'+
						'<label style="color:#6495ED;" id="supprLigne" onclick="supprLigne('+(cpt*1+1)+')">Sup</label></td>'+
					'</tr>';
	$('.container-table').append(html);
		// alert(cpt);
		$('#tr_ligne'+cpt).show();
		enregistreTableD4(cpt);
	}
	
	function supprLigne(cpt){
		supprimerTableD4(cpt);
		// cpt=cpt-1;		
		$('#tr_ligne'+cpt).hide();
	}
	function enregistreTableD4(cpt){
		var categorie=$("#categorie"+cpt).val();
		var produit=$("#produit"+cpt).val();
		var designation=$("#designation"+cpt).val();
		var etat_theorique=$("#etat_theorique"+cpt).val();
		var etat_inventaire=$("#etat_inventaire"+cpt).val();
		var ecart=$("#ecart"+cpt).val();
		var observation=$("#observation"+cpt).val();
		
		$.ajax({
			type:'POST',
			url:'RDC/stock/B_existence/addDataTableD4.php',
			data:{categorie:categorie, produit:produit, designation:designation, etat_theorique:etat_theorique, etat_inventaire:etat_inventaire, ecart:ecart, observation:observation, mission_id:<?php echo $mission_id;?>, cpt:cpt},
			success:function(){
				document.getElementById("categorie"+cpt).disabled=true;
				document.getElementById("produit"+cpt).disabled=true;
				document.getElementById("designation"+cpt).disabled=true;
				document.getElementById("etat_theorique"+cpt).disabled=true;
				document.getElementById("etat_inventaire"+cpt).disabled=true;
				document.getElementById("ecart"+cpt).disabled=true;
				document.getElementById("observation"+cpt).disabled=true;
			}
		});
	}
	function supprimerTableD4(cpt){
		$.ajax({
			type:'POST',
			url:'RDC/stock/B_existence/supprDataTableD4.php',
			data:{mission_id:<?php echo $mission_id?>, cpt:cpt},
			success:function(){
			}
		});
	}
	function modifLigneD4(cpt){
		document.getElementById("categorie"+cpt).disabled=false;
		document.getElementById("produit"+cpt).disabled=false;
		document.getElementById("designation"+cpt).disabled=false;
		document.getElementById("etat_theorique"+cpt).disabled=false;
		document.getElementById("etat_inventaire"+cpt).disabled=false;
		document.getElementById("ecart"+cpt).disabled=false;
		document.getElementById("observation"+cpt).disabled=false;
	}
</script>

<link rel="stylesheet" href="../RDC/stock/css_stock.css">
<div style="1098px;">
<div class="titre_table">
	<label>Rapprochement de l'état théorique avec le résultat des inventaires physiques des stocks (D4)</label>
</div>
<table width="100%" class="container-table">
	<tr style="background-color:#6495ED;color:white;">
		<td width="10%" style="color:white;text-align:center;">Catégorie</td>
		<td width="10%" style="color:white;text-align:center;">Produit</td>
		<td width="20%" style="color:white;text-align:center;">Désignation *</td>
		<td width="10%" style="color:white;text-align:center;">Etat théorique</td>
		<td width="10%" style="color:white;text-align:center;">Etat d'inventaire</td>
		<td width="10%" style="color:white;text-align:center;">Ecart</td>
		<td width="20%" style="color:white;text-align:center;">Observations</td>
		<td width="10%"></td>
	</tr>
	<?php
	
		$queryAffiche='select * from  tab_rdc_st_d4 where mission_id='.$mission_id.' and cpt=2';
		$reponseAffiche=$bdd->query($queryAffiche);
		$donneesAffiche=$reponseAffiche->fetch();
	
	?>
	<tr id="tr_ligne" bgcolor="white" height="20px" data-uid="2">
		<td width="10%"><textarea id="categorie2" cols="15" rows="5" ><?php echo $donneesAffiche['categorie'];?></textarea></td>
		<td width="10%"><textarea id="produit2" cols="15" rows="5"><?php echo $donneesAffiche['produit'];?></textarea></td>
		<td width="20%"><textarea id="designation2" cols="15" rows="5"><?php echo $donneesAffiche['designation'];?></textarea></td>
		<td width="10%"><textarea id="etat_theorique2" cols="15" rows="5" class="rdc-existence-solde-etat-theorique"><?php echo $donneesAffiche['etat_theorique'];?></textarea></td>
		<td width="10%"><textarea id="etat_inventaire2" cols="15" rows="5" class="rdc-existence-solde-etat-inventaire"><?php echo $donneesAffiche['etat_inventaire'];?></textarea></td>
		<td width="10%"><textarea id="ecart2" cols="15" rows="5"><?php echo $donneesAffiche['ecart'];?></textarea></td>
		<td width="20%"><textarea id="observation2" cols="15" rows="5"><?php echo $donneesAffiche['observation'];?></textarea></td>
		<td width="10%">
		<label style="color:#6495ED;" id="ajoutLigne" onclick="enregistreTableD4(2)">enregistrer</label><br />
		<label style="color:#6495ED;" id="ajoutLigne" onclick="ajoutLigne(2)">Ajout</label><br />
		<label style="color:#6495ED;" id="modifLigne" onclick="modifLigneD4(2)">Modif</label><br />
		<label style="color:#6495ED;" id="supprLigne" onclick="supprLigne(2)">Sup</label></td>
	</tr>
	<?php 
		for($j=2;$j<$lignes;$j++){
			echo $tab_tr[$j];
		}
	?>
</table>
</div>