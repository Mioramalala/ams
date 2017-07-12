<?php
@session_start();

// tinay editer
//include $_SERVER["DOCUMENT_ROOT"]."/Connexion.php";
include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";
$mission_id=$_SESSION['idMission'];
$reponse=$bdd->query('SELECT count(CONCLUSION_ID) as nb  FROM tab_conclusion WHERE CYCLE_ACHAT_ID=33 AND MISSION_ID='.$mission_id);
$donnees=$reponse->fetch();
$conclusionId=$donnees['nb'];
$validInfoC=$conclusionId;

?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

<script>

// Droit cycle by Tolotra
// Page : RSCI -> Cycle système d'information
// Tâche : Synthèse risque système d'information, numéro 46
$.ajax({
    type: 'POST',
    url: 'droitCycle.php',
    data: {task_id: 46},
    success: function (e) {
        var result = 0 === Number(e);
        $("select").attr('disabled', result);
        $("#Int_ic_Suivant").attr('disabled', result);
		<?php
		//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
		if($validInfoC==1)
		{

		?>

		$('select').attr('disabled',true);

		<?php
		}
		//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
		?>
    }
});

$(function(){
	// $('#message_Synthese_ic').draggable();

	//REMPLIR LA BASE
	// for(var i=1, id=448; id<463; i++, id++){
	// 	ecrire_reponse(id, 'reponse_ic_'+i);
	// }
	// for(var i=1, id=448; id<463; i++, id++){
	// 	ecrire_risque(id, 'risque_ic_'+i);
	// }

	$('#Int_ic_Retour').click(function(){
		$('#message_Fermeture_ic').show();	
		closedButic();
		$('#int_ic').hide();
	});
	
	//SUIVANT
	$('#Int_ic_Suivant').click(function(){
		//se rediriger vers calcul score
			$.ajax({
				type:'POST',
				url:'cycleInfo/Infoc/php/select_score_ic.php',
				data:{mission_id:mission_id ,cycleId:33},
				success:function(e){
					$("#echo_score_ic").html(e);
				}			
			});
		mission_id=document.getElementById("txt_mission_id").value;	
		//alert(mission_id);		
				$.ajax({
				type:'POST',
					url:'cycleInfo/Infoc/php/getSynth.php',
					data:{mission_id:mission_id, cycleId:33},
					success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("txt_Synthese_ic").value=doc[0];
							document.getElementById("rd_Synthese_ic_Moyen").checked=false;
							document.getElementById("rd_Synthese_ic_Faible").checked=false;
							document.getElementById("rd_Synthese_ic_Eleve").checked=false;
								if(doc[1]=='faible'){
									document.getElementById("rd_Synthese_ic_Faible").checked=true;
								}
								else if(doc[1]=='moyen'){
									document.getElementById("rd_Synthese_ic_Moyen").checked=true;
								}
								else if(doc[1]=='eleve'){
									document.getElementById("rd_Synthese_ic_Eleve").checked=true;
								}
						$('#message_Synthese_ic').show();
						$('#message_ic_Synthese_Terminer').hide();
						$('#message_Slide').hide();
						$('#fancybox_ic').show();

						$.ajax({
						type:'POST',
						url:'cycleInfo/Infoc/php/score_ic.php',
						data:{mission_id:mission_id, cycleId:33},
							success:function(e){
								//alert(e);
							}
						});
					}														
				});

	});
	//SUIVANT

});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoc/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_ic").value=doc[0];
			document.getElementById("rd_Synthese_ic_Faible").checked=false;
			document.getElementById("rd_Synthese_ic_Moyen").checked=false;
			document.getElementById("rd_Synthese_ic_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_ic_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_ic_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_ic_Eleve").checked=true;
			}
		}
	});
}
function closedButic(){
	document.getElementById("Int_ic_Retour").disabled=true;
	document.getElementById("Int_ic_Suivant").disabled=true;
}
function openButic(){
	document.getElementById("Int_ic_Retour").disabled=false;
	document.getElementById("Int_ic_Suivant").disabled=false;
}
function select_risque(question_id, id_risque){
		risque=document.getElementById(id_risque).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoc/php/detect_risque_id_existant_ic.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoc/php/enregistrer_risque_ic.php',
						data:{risque:risque, question_id:question_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoc/php/update_risque_ic.php',
						data:{question_id:question_id, risque:risque},
						success:function(){
						}
					});
				}
			}
		
		});
}
function select_reponse(question_id, id_reponse){
	reponse=document.getElementById(id_reponse).value;
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infoc/php/enregistrer_reponse_ic.php',
		data:{reponse:reponse, question_id:question_id},
		success:function(){
		}
	});		
}
function ecrire_risque(question_id, id_risque){
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoc/php/detect_risque_id_existant_ic.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){

				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoc/php/update_risque_ic.php',
						data:{question_id:question_id, risque:"faible"},
						success:function(){
						}
					});
				}
			}
		
		});
}
function ecrire_reponse(question_id, id_reponse){
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infoc/php/detect_risque_id_existant_ic.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infoc/php/enregistrer_reponse_ic.php',
						data:{reponse:"OUI", question_id:question_id},
						success:function(){
						}
					});
				}
			}
		
		});
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="int_ic">
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Questions</td>
		<td width="300" class="sous_Titre" align="center">Reponses</td>
		<td width="300" class="sous_Titre" align="center">Risque</td>
	</tr>
</table>
<div id="table_Interface_ic">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1. Les capacités sont-elles suffisantes ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=448 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_1' onchange="select_reponse(448, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_1' onchange="select_risque(448, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">2. Les sauvegardes sont-elles exploitables et sûres :<br/> -	Les informations sont-elles sauvegardées intégralement ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=449 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_2' onchange="select_reponse(449, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_2' onchange="select_risque(449, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">3. Les sauvegardes sont-elles exploitables et sûres :<br/>-	Des essais de restauration ont-ils été réalisés récemment ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=450 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_3' onchange="select_reponse(450, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_3' onchange="select_risque(450, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">4. Les sauvegardes sont-elles exploitables et sûres :<br/>-	S’est-on assuré qu’aucune perte d’informations n’est intervenue ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=451 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_4' onchange="select_reponse(451, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_4' onchange="select_risque(451, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5. Les sauvegardes sont-elles exploitables et sûres : <br/>-	La périodicité des sauvegardes est-elle satisfaisante ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=452 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_5' onchange="select_reponse(452, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_5' onchange="select_risque(452, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">6. Existe-t-il une conservation hors site des sauvegardes ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=453 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_6' onchange="select_reponse(453, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_6' onchange="select_risque(453, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7. Maintenance du matériel :<br/>- Les charges d’entretien sont-elles bien définies ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=454 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_7' onchange="select_reponse(454, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_7' onchange="select_risque(454, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">8. Maintenance du matériel :<br/>- Le délai d’intervention est-il convenable ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=455 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_8' onchange="select_reponse(455, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_8' onchange="select_risque(455, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9.Maintenance du matériel :<br/>- Les procédures de dépannage sont-elles prévues ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=456 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_9' onchange="select_reponse(456, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_9' onchange="select_risque(456, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">10. Assurances :<br/>- Assurance Bris de machine spécifique ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=457 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_10' onchange="select_reponse(457, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_10' onchange="select_risque(457, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11. Assurances :<br/>- Assurance Protection des logiciels ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=458 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_11' onchange="select_reponse(458, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_11' onchange="select_risque(458, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">12. Assurances :<br/>- Assurance Perte d’exploitation ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=459 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_12' onchange="select_reponse(459, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_12' onchange="select_risque(459, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13. Sécurités : <br/>- Dégât des eaux ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=460 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_13' onchange="select_reponse(460, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_13' onchange="select_risque(460, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">14. Sécurités:<br/>- Vol ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=461 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_14' onchange="select_reponse(461, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_14' onchange="select_risque(461, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15. Sécurités: <br/>- Accès aux locaux informatiques ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=33 AND QUESTION_ID=462 AND MISSION_ID= "'.$_SESSION['idMission'] .'"');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_ic_15' onchange="select_reponse(462, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_ic_15' onchange="select_risque(462, this.id)">
				<option value="" selected disabled="disabled"></option>
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<br/>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_ic_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_ic_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_ic"></div>
<div id="message_Synthese_ic" data-options="handle:'#dicgg'" align="center">
<div id="dicgg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleInfo/Infoc/form/Interface_ic_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_ic_Synthese_Terminer" align="center"><?php include '../../../cycleInfo/Infoc/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleInfo/Infoc/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleInfo/Infoc/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_ic"><?php include '../../../cycleInfo/Infoc/sms/Message retour ic.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_ic"><?php include '../../../cycleInfo/Infoc/sms/Mess_vide_synth_ic.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_ic"><?php include '../../../cycleInfo/Infoc/sms/mess_vide_ic.php'; ?></div>
