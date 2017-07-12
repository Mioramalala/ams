<?php
@session_start();
include '../../../connexion.php';

// $reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=100000');

// $donnees=$reponse->fetch();

// $conclusionId=$donnees['CONCLUSION_ID'];

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
        $("#Int_id_Suivant").attr('disabled', result);
    }
});

$(function(){
	$('#message_Synthese_id').draggable();
	$('#Int_id_Retour').click(function(){
		$('#message_Fermeture_id').show();	
		closedButid();
	});
	
	//SUIVANT
	$('#Int_id_Suivant').click(function(){
		
		mission_id=document.getElementById("txt_mission_id").value;	
		//alert(mission_id);		
				$.ajax({
				type:'POST',
					url:'cycleInfo/Infod/php/getSynth.php',
					data:{mission_id:mission_id, cycleId:34},
					success:function(e){
							eo=""+e+"";
							doc=eo.split('*');
							document.getElementById("txt_Synthese_id").value=doc[0];
							document.getElementById("rd_Synthese_id_Moyen").checked=false;
							document.getElementById("rd_Synthese_id_Faible").checked=false;
							document.getElementById("rd_Synthese_id_Eleve").checked=false;
								if(doc[1]=='faible'){
									document.getElementById("rd_Synthese_id_Faible").checked=true;
								}
								else if(doc[1]=='moyen'){
									document.getElementById("rd_Synthese_id_Moyen").checked=true;
								}
								else if(doc[1]=='eleve'){
									document.getElementById("rd_Synthese_id_Eleve").checked=true;
								}
						$('#message_Synthese_id').show();
						$('#message_id_Synthese_Terminer').hide();
						$('#message_Slide').hide();
						$('#fancybox_id').show();
					}										
										
				});

	});
	//SUIVANT

});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleInfo/Infod/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_id").value=doc[0];
			document.getElementById("rd_Synthese_id_Faible").checked=false;
			document.getElementById("rd_Synthese_id_Moyen").checked=false;
			document.getElementById("rd_Synthese_id_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_id_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_id_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_id_Eleve").checked=true;
			}
		}
	});
}
function closedButid(){
	document.getElementById("Int_id_Retour").disabled=true;
	document.getElementById("Int_id_Suivant").disabled=true;
}
function openButid(){
	document.getElementById("Int_id_Retour").disabled=false;
	document.getElementById("Int_id_Suivant").disabled=false;
}
function select_risque(question_id, id_risque){
		risque=document.getElementById(id_risque).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infod/php/detect_risque_id_existant_id.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infod/php/enregistrer_risque_id.php',
						data:{risque:risque, question_id:question_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infod/php/update_risque_id.php',
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
			url:'cycleInfo/Infod/php/detect_risque_id_existant_id.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infod/php/enregistrer_reponse_id.php',
						data:{reponse:reponse, question_id:question_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infod/php/update_reponse_id.php',
						data:{question_id:question_id, reponse:reponse},
						success:function(){
						}
					});
				}
			}
		
		});
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="int_id">
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Questions</td>
		<td width="300" class="sous_Titre" align="center">Reponses</td>
		<td width="300" class="sous_Titre" align="center">Risque</td>
	</tr>
</table>
<div id="table_Interface_id">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1. <b>Organisation et structure :<b/><br/>- La séparation des fonctions est-elle adaptée au système ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=463');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_1' onchange="select_reponse(463, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_1' onchange="select_risque(463, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">2. Les phases de développement et d’exploitation sont-elles bien définies ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=464');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_2' onchange="select_reponse(464, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_2' onchange="select_risque(464, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">3. <b>Modification de logiciels :<b/><br/>- Les modifications par les utilisateurs sont-elles nombreuses ?
</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=465');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_3' onchange="select_reponse(465, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_3' onchange="select_risque(465, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">4. - Les modifications par les SSII sont-elles nombreuses ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=466');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_4' onchange="select_reponse(466, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_4' onchange="select_risque(466, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5. - La phase de modification est-elle bien définie ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=467');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_5' onchange="select_reponse(467, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_5' onchange="select_risque(467, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">6. <b>Maintenance (voir le contrat) :</b><br/>- L’assistance est-elle bien définie ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=468');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_6' onchange="select_reponse(468, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_6' onchange="select_risque(468, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7. - Les mises à jour sont-elles prévues ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=469');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_7' onchange="select_reponse(469, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_7' onchange="select_risque(469, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">8. - Les mises à niveau sont-elles régulières ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=470');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_8' onchange="select_reponse(470, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_8' onchange="select_risque(470, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9.- Les délais d’intervention sont-ils corrects ?</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=471');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_9' onchange="select_reponse(471, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_9' onchange="select_risque(471, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">10. <b>Formation sur les logiciels d’exploitation :</b><br/>
- Faite par stage ?
</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=472');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_10' onchange="select_reponse(472, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_10' onchange="select_risque(472, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11. - Formation autodidacte correcte ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=473');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_11' onchange="select_reponse(473, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_11' onchange="select_risque(473, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">12. <b>Formation sur les logiciels systèmes et leur utilisation :</b><br/>
- Faite par stage ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=474');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_12' onchange="select_reponse(474, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_12' onchange="select_risque(474, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13. - Formation autodidacte correcte ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=475');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_13' onchange="select_reponse(475, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_13' onchange="select_risque(475, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">14.<b>Existence de procédures écrites</b>
    <br/><b>Existence d’une documentation relative :</b><br/>- Aux analyses ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=476');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_14' onchange="select_reponse(476, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_14' onchange="select_risque(476, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15.- A la programmation ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=477');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_15' onchange="select_reponse(477, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_15' onchange="select_risque(477, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">16.- A l’exécution des traitements ? </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=478');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_16' onchange="select_reponse(478, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_16' onchange="select_risque(478, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
		<tr bgcolor="#efefef">
		<td width="380">17. Les mesures liées à la sécurité logique (codes ou mot de passe) sont-elles :<br/>
- bien définies ?
 </td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=479');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_17' onchange="select_reponse(479, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_17' onchange="select_risque(479, this.id)">
				<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
		</select>
		</td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">18. - Régulièrement mises à jour ?
 		</td>
		<td width="300" align="center">
		<?php 
			$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=34 AND QUESTION_ID=480');
			$donnees=$reponse->fetch();
		?>
			<select id='reponse_id_18' onchange="select_reponse(480, this.id)">
				<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
				<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
			</select>
		</td>
		<td width="300" align="center">
		<select id='risque_id_18' onchange="select_risque(480, this.id)">
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
			<input type="button" class="bouton" value="Retour"id="Int_id_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_id_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_id"></div>
<div id="message_Synthese_id" data-options="handle:'#dicgg'" align="center">
<div id="dicgg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleInfo/Infod/form/Interface_id_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_id_Synthese_Terminer" align="center"><?php include '../../../cycleInfo/Infod/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleInfo/Infod/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleInfo/Infod/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_id"><?php include '../../../cycleInfo/Infod/sms/Message retour id.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_id"><?php include '../../../cycleInfo/Infod/sms/Mess_vide_synth_id.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_id"><?php include '../../../cycleInfo/Infod/sms/mess_vide_id.php'; ?></div>
