<div></div><?php
@session_start();
include '../../../connexion.php';

// $reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=100000');

// $donnees=$reponse->fetch();

// $conclusionId=$donnees['CONCLUSION_ID'];

?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

<script>
$(function(){
	// $('#message_Synthese_ia').draggable();

	//REMPLIR LA BASE
	// for(var i=1, id=431; id<448; i++, id++){
	// 	ecrire_reponse(id, 'reponse_ia_'+i);
	// }
	// for(var i=1, id=431; id<448; i++, id++){
	// 	ecrire_risque(id, 'risque_ia_'+i);
	// }

	$('#Int_ia_Retour').click(function(){
		$('#message_Fermeture_ia').show();	
		closedButia();
	});
	
	//SUIVANT
	$('#Int_ia_Suivant').click(function(){
		
		mission_id=document.getElementById("txt_mission_id").value;	
		// $.ajax({
		// 	type:'POST',
		// 	url:'cycleInfo/Infoa/php/countBox.php',
		// 		success:function(e1){
		// 			if(e1<6){
		// 				$('#mess_vide_synthese_ia').show();
		// 			}
		// 			else{
						$.ajax({
						type:'POST',
							url:'cycleInfo/Infoa/php/getSynth.php',
							data:{mission_id:mission_id, cycleId:100000000},
							success:function(e){
									eo=""+e+"";
									doc=eo.split('*');
									document.getElementById("txt_Synthese_ia").value=doc[0];
									document.getElementById("rd_Synthese_ia_Moyen").checked=false;
									document.getElementById("rd_Synthese_ia_faible").checked=false;
									document.getElementById("rd_Synthese_ia_Eleve").checked=false;
										if(doc[1]=='faible'){
											document.getElementById("rd_Synthese_ia_faible").checked=true;
										}
										else if(doc[1]=='moyen'){
											document.getElementById("rd_Synthese_ia_Moyen").checked=true;
										}
										else if(doc[1]=='eleve'){
											document.getElementById("rd_Synthese_ia_Eleve").checked=true;
										}
								$('#message_Synthese_ia').show();
								$('#message_ia_Synthese_Terminer').hide();
								$('#message_Slide').hide();
								$('#fancybox_ia').show();
												}										
										
							});
					
				// }
			// });		
			
	});
	//SUIVANT

});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoa/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_ia").value=doc[0];
			document.getElementById("rd_Synthese_ia_faible").checked=false;
			document.getElementById("rd_Synthese_ia_Moyen").checked=false;
			document.getElementById("rd_Synthese_ia_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_ia_faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_ia_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_ia_Eleve").checked=true;
			}
		}
	});
}
function closedButia(){
	document.getElementById("Int_ia_Retour").disabled=true;
	document.getElementById("Int_ia_Suivant").disabled=true;
}
function openButia(){
	document.getElementById("Int_ia_Retour").disabled=false;
	document.getElementById("Int_ia_Suivant").disabled=false;
}
function uncheck(n1,n2){
	document.getElementById("check_comp_"+n1).checked=false;
	document.getElementById("check_comp_"+n2).checked=false;
}

function select_complexite(cycle_nom, complexite, checkbox_id){
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoa/php/detect_risque_id_existant_ia.php',
			data:{cycle_nom:cycle_nom},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoa/php/enregistrer_risque_ia.php',
						data:{complexite:complexite, cycle_nom:cycle_nom},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoa/php/update_risque_ia.php',
						data:{complexite:complexite, cycle_nom:cycle_nom},
						success:function(){
						}
					});
				}
			}
		
		});
}

			

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h4>I.	TRAITEMENTS AUTOMATISES DES CYCLES</h4>
<div id="int_ia">
<div id="table_Interface_ia">
<table  class="label">
	<tr bgcolor="silver">
			<td width="380" class="sous_Titre" align="center"></td>
		<td width="300" class="sous_Titre" align="center">Simple</td>
		<td width="300" class="sous_Titre" align="center">Complexe</td>
		<td width="300" class="sous_Titre" align="center">Tres Complexe</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">1. Achat</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="achat" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_1" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('achat', 's', this.id); 
			uncheck(2,3);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_2" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('achat', 'c', this.id);
			uncheck(1,3);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_3" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('achat', 't', this.id);
			uncheck(2,1);" />
		</td>
	</tr>

	<tr bgcolor="#efefef">
	<td width="380">2. Vente</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="vente" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_4" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('vente', 's', this.id); 
			uncheck(5,6);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_5" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('vente', 'c', this.id);
			uncheck(4,6);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_6" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('vente', 't', this.id);
			uncheck(4,5);" />
		</td>
	</tr>

		<tr bgcolor="#efefef">
		<td width="380">3. Trésorerie</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="tresorerie" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_7" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('tresorerie', 's', this.id); 
			uncheck(8,9);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_8" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('tresorerie', 'c', this.id);
			uncheck(7,9);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_9" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('tresorerie', 't', this.id);
			uncheck(7,8);" />
		</td>
	</tr>

		<tr bgcolor="#efefef">
		<td width="380">4. Comptabilité</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="comptabilite" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_10" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('comptabilite', 's', this.id); 
			uncheck(11,12);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_11" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('comptabilite', 'c', this.id);
			uncheck(10,12);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_12" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('comptabilite', 't', this.id);
			uncheck(10,11);" />
		</td>
	</tr>	

		<tr bgcolor="#efefef">
		<td width="380">5. Paie</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="paie" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_13" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('paie', 's', this.id); 
			uncheck(14,15);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_14" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('paie', 'c', this.id);
			uncheck(13,15);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_15" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('paie', 't', this.id);
			uncheck(13,14);" />
		</td>
	</tr>	

			<tr bgcolor="#efefef">
		<td width="380">6. Stock</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT COMPLEXITE FROM tab_sys_info WHERE NOM_CYCLE="stock" AND MISSION_ID='.$_SESSION['idMission']);
			$donnees=$reponse->fetch();
		?>
			<input type="checkbox" id="check_comp_16" <?php if($donnees['COMPLEXITE']=="s") echo 'checked';  ?>
			onclick="select_complexite('stock', 's', this.id); 
			uncheck(17,18);" />
		</td>
		<td width="300" align="center">
			<input type="checkbox" id="check_comp_17" <?php if($donnees['COMPLEXITE']=="c") echo 'checked';  ?> 
			onclick="select_complexite('stock', 'c', this.id);
			uncheck(16,18);" />
		</td>
		<td width="300" align="center" >
			<input type="checkbox" id="check_comp_18" <?php if($donnees['COMPLEXITE']=="t") echo 'checked';  ?>
			onclick="select_complexite('stock', 't', this.id);
			uncheck(16,17);" />
		</td>
	</tr>	

	<tr>
		<td></td>
		<br/>
		<td width="500">
			<input type="button" class="bouton" value="Retour"id="Int_ia_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_ia_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_ia"></div>
<div id="message_Synthese_ia" data-options="handle:'#diagg'" align="center">
<div id="diagg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleInfo/Infoa/form/Interface_ia_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_ia_Synthese_Terminer" align="center"><?php include '../../../cycleInfo/Infoa/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleInfo/Infoa/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleInfo/Infoa/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_ia"><?php include '../../../cycleInfo/Infoa/sms/Message retour ia.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_ia"><?php include '../../../cycleInfo/Infoa/sms/Mess_vide_synth_ia.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_ia"><?php include '../../../cycleInfo/Infoa/sms/mess_vide_ia.php'; ?></div>
