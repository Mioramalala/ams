<?php

@session_start();
$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';
?>
<style>
	div.action {
		color:#6495ED;
		font-size:10px;
		cursor : pointer;
	}
</style>
<script>
	var nbLignes = 0;
	
	var ligneInfo = {
		id    : ['avis', 'date', 'nature', 'compta', 'observation'],
		cols  : [    16,     10,       25,       15,            25],
		rows  : [     5,      1,        5,        5,             5],
		label : ['Ajout', 'Modif', 'Sup', 'Enregistrer']
	};
	
	function removeElement(e) {
		return e.parentNode.removeChild(e);
	}
	
	function chargerDonnee(nb, callback) {
		$.ajax({
			type      : "POST",
			url       : "RDC/tresorerie/B_regularite/table_E2_donnees_JSON.php",
			dataType  : 'json',
			data      : {
				nbr        : nb, 
				reference  : 'E21', 
				mission_id : <?php echo $mission_id;?>
			},
			success   : function(data){
				callback(data);
			},
			error     : function(msg){
				alert( "Error !: " + msg );
			}
		});
	}
	
	function creerNouvelleLigne(nb) {
		var ligne = document.createElement('tr');
		ligne.className = "ligne";
		if(nbLignes < nb) nbLignes = nb;
		var nbl = nbLignes;
		for(var i = 0; i < 6; i++) {
			var cellule = document.createElement('td');
			if(i < 5) {
				var textarea  = document.createElement('textarea');
				textarea.id   = ligneInfo.id[i] + nbLignes;
				textarea.cols = ligneInfo.cols[i];
				textarea.rows = ligneInfo.rows[i];
				cellule.appendChild(textarea);
					
				if(i==0) {
					var input = document.createElement('input');
					input.type  = "hidden";
					input.value = nbl;
					cellule.appendChild(input);
				}
				
			} else {
				var labelAjout       = document.createElement('div');
				var labelModif       = document.createElement('div');
				var labelSup         = document.createElement('div');
				var labelEnregistrer = document.createElement('div');
				
				labelAjout.onclick = function() {
					ajoutLigneE2(nbLignes++);
				}
				
				labelModif.onclick = function() {
					modifLigneE2(nbLignes);
				}
				
				labelSup.onclick = function() {
					supprimerTableE2(nbl);
					removeElement(ligne);
				}
				
				labelEnregistrer.onclick = function() {
					enregistreTableE2(getData(ligne));
				}
				
				labelAjout.innerHTML       = 'Ajout';
				labelModif.innerHTML       = 'Modif';
				labelSup.innerHTML         = 'Sup';
				labelEnregistrer.innerHTML = 'Enregistrer';
				
				labelAjout.className       = "action";
				labelModif.className       = "action";
				labelSup.className         = "action";
				labelEnregistrer.className = "action";
				
				cellule.appendChild(labelAjout);
				cellule.appendChild(labelModif);
				cellule.appendChild(labelSup);
				cellule.appendChild(labelEnregistrer);
				
			}
			ligne.appendChild(cellule);
		}
				
		chargerDonnee(nbLignes, function(donnee) {
			if(typeof donnee.avis !== 'undefined') {
				ligne.childNodes[0].childNodes[0].value = donnee.avis;
				ligne.childNodes[0].childNodes[1].value = donnee.cpt;
				ligne.childNodes[1].childNodes[0].value = donnee.date;
				ligne.childNodes[2].childNodes[0].value = donnee.nature;
				ligne.childNodes[3].childNodes[0].value = donnee.compta;
				ligne.childNodes[4].childNodes[0].value = donnee.observation;
			}
		});
		
		return ligne;
	}
	
	function getData(ligne) {
		return {
			avis        : ligne.childNodes[0].childNodes[0].value, 
			date        : ligne.childNodes[1].childNodes[0].value, 
			nature      : ligne.childNodes[2].childNodes[0].value, 
			compta      : ligne.childNodes[3].childNodes[0].value, 
			observation : ligne.childNodes[4].childNodes[0].value,
			cpt         : ligne.childNodes[0].childNodes[1].value
		};
	}
	
	function ajoutLigneE2(cpt){
		document.getElementById('table_veb').appendChild(creerNouvelleLigne(cpt));
	}
	
<?php
	$query = 'select cpt from tab_rdc_tr_e2 where mission_id='.$mission_id.' and reference="E21"';
	$response = $bdd->query($query);
	$i = 0;

	while($donnees = $response->fetch()) {
		echo 'ajoutLigneE2('.$donnees['cpt'].');';
		$i++;
	}
	
	if($i == 0) 
		echo 'ajoutLigneE2(0);';
?>
	
	function supprLigneE2(cpt){
		supprimerTableE2(cpt)
		cpt=cpt-1;		
		$('#tr_ligne_E2'+cpt).hide();
	}
	function enregistreTableE2(donnee){
		if(donnee.avis != '' || donnee.date != '' || donnee.nature != '' || donnee.compta != '' || donnee.observation != '') {
			$.ajax({
				type:'POST',
				url:'RDC/tresorerie/B_regularite/addDataTableE2.php',
				data:{avis : donnee.avis, date : donnee.date, nature : donnee.nature, compta : donnee.compta, observation : donnee.observation, mission_id:<?php echo $mission_id;?>, cpt : donnee.cpt, reference : 'E21'},
				success:function(){/*
					document.getElementById("avis"+cpt).disabled=true;
					document.getElementById("date"+cpt).disabled=true;
					document.getElementById("nature"+cpt).disabled=true;
					document.getElementById("compta"+cpt).disabled=true;
					document.getElementById("observation"+cpt).disabled=true;*/
				}
			});
		}
	}
	function supprimerTableE2(cpt){
		$.ajax({
			type:'POST',
			url:'RDC/tresorerie/B_regularite/supprDataTableE2.php',
			data:{mission_id:<?php echo $mission_id?>, cpt:cpt, reference:'E21'},
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

<div class="titre_table"style="width:920px;" >Vérification des écritures de banques(E2)</div>
<div style="overflow:auto;height:400px;">
<table width="100%" id="table_veb">
	<tr class="tr_table_D1" style="background-color:#6495ED;">
		<td style="color:white;">Avis d'opération</td>
		<td style="color:white;">Date</td>
		<td style="color:white;">Nature opération</td>
		<td style="color:white;">Correct comptabilisation</td>
		<td style="color:white;">Observations</td>
		<td></td>
	</tr>
</table>
<!--center><input type="button" value="Enregistrer"></center-->
</div>