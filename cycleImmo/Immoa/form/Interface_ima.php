<?php

include '../../../connexion.php';

// tinay editer: AND CYCLE_ACHAT_ID=10 par defaut que je vais changer en AND CYCLE_ACHAT_ID=1000.
//$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10');
$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1000');

$donnees=$reponse->fetch();

$conclusionId=$donnees['CONCLUSION_ID'];

?>

<script>
	tr_1=document.getElementById("tr_case1");
	tr_2=document.getElementById("tr_case2");
	tr_3=document.getElementById("tr_case3");
	tr_4=document.getElementById("tr_case4");
	tr_5=document.getElementById("tr_case5");
	tr_6=document.getElementById("tr_case6");
	tr_7=document.getElementById("tr_case7");
	tr_8=document.getElementById("tr_case8");
	tr_9=document.getElementById("tr_case9");
	tr_10=document.getElementById("tr_case10");
	tr_11=document.getElementById("tr_case11");
	tr_12=document.getElementById("tr_case12");

	// Tinay Editer

	// Droit cycle by Tolotra
    // Page : RSCI -> Cycle achat
    // Tâche : Revue Contrôles Achats, numéro 1
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 1},
        success: function (e) {
            var result = 0 === Number(e);
            $("#bouton-popup-suppr").prop('disabled', result);
            $("#bouton-popup-im").prop('disabled', result);
            $("#Int_ima_Suivant").prop('disabled', result);
        }
    });
	
	function choix_poste_cle(){
		 var sd=1;
		 var poste_cle=$("#id_choix_poste_cle_im option:selected").html();
	 	$("#id_choix_poste_cle_im option:selected").remove();
		// alert(poste_cle);
		 document.getElementById("id_choix_poste_cle_im").setAttribute("enable","enable");
		//$("#id_check"+sd).val(poste_cle);
		 
			tr_input=document.getElementById("tr_ajout_input");
			var td_input=document.createElement('td');
			tr_input.appendChild(td_input);
			var x_input=document.createElement("input");
			x_input.setAttribute("type","text");
			x_input.setAttribute("id","id_check"+sd);
			x_input.setAttribute("value",poste_cle);
			sd++;
			td_input.appendChild(x_input);
			//alert (sd);
			ajout_case();

			//Enregistrement + reload
			mission_id=document.getElementById("txt_mission_id").value;
			entrepiseId="<?php echo $entrepiseId; ?>";
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoa/php/ajout_poste_cycle.php',
				data:{text:poste_cle, mission_id:mission_id, entrepiseId:entrepiseId},
				success:function(e){
						//alert("Poste_cycle_enregistre:"+e);
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immoa/form/Interface_ima_Secondaire.php',
							data:{mission_id:mission_id, entrepiseId:entrepiseId},
							success:function(e){
								//alert("reload")
								$('#contima').html(e).show();
							}
						});
				}
			});

		}

$(function(){

    $('#bouton-popup-im').click(function(){
            //e.preventDefault();
            $('#element_to_pop_up_im').fadeIn("slow");
           	//console.log("ajouter");
    });

    $('#bouton-popup-suppr-im').click(function(){
    	
        	mission_id=document.getElementById("txt_mission_id").value;
			entrepiseId=<?php echo json_encode($entrepiseId); ?>;

            $.ajax({
            	type:'POST',
            	url:'postes_concernes/int_suppression_poste.php',
            	data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:"immo", 
            	lien:"cycleImmo/Immoa/form/Interface_ima_Secondaire.php", conteneur:'#contima'},
            	success:function(e){
            		$('#supprimer_poste_im').html(e).show();
            	}
            });
        
        console.log("supprimer");
    });

    $('.bouton-close').click(function(){
			console.log("fermeture");
            $('#element_to_pop_up_im').fadeOut("slow");
    });

	$('#enregistrer_poste_im').click(function(){
		
		var nom_poste=$('#nom_poste_im').val();
		var titulaire=$('#titulaire_im').val();
		var eseId="<?php echo $entrepiseId; ?>";

		if( nom_poste.length<1 || titulaire.length<1 ){
			alert("Veuillez remplir tous les champs.");
		}else{
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immoa/php/enregistrer_poste_cle.php',
				data:{nom_poste:nom_poste,titulaire:titulaire,eseId:eseId},
				success:function(e){
					if(e==0){
						alert("Le poste a ete enregistre avec succes."+e);
						$('#id_choix_poste_cle_im').append('<option value="">'+nom_poste+'</option>');
	            		$('#element_to_pop_up_im').fadeOut("slow");

            		}else{
            			alert("Le poste existe deja.");
            		}
            	}
			});
		}
	});


	$('#Int_ima_Retour').click(function(){
		$('#message_Fermeture_ima').show();	
		closedButima();
	});
	var sd=1;

	$('#Int_ima_Suivant').click(function(){
		mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoa/php/det_res_ima.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoa/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;	
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoa/php/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox_ima').show();
										$('#mess_no_question').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cycleImmo/Immoa/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:1000},
											success:function(e){
												eo=""+e+"";
												doc=eo.split('*');
												document.getElementById("rd_Synthese_ima_Faible").checked=false;
												document.getElementById("rd_Synthese_ima_Moyen").checked=false;
												document.getElementById("rd_Synthese_ima_Eleve").checked=false;
												document.getElementById("txt_Synthese_ima").value=doc[0];
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_ima_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_ima_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_ima_Eleve").checked=true;
												}
												$('#message_Synthese_ima').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_ima').show();
											}										
										});
									}
								}
							});
						}
					});
				}	
				else{
					$('#fancybox_ima').show();
					$('#mess_no_question').show();
				}
			}
		});
		// mission_id=document.getElementById("txt_mission_id").value;
		// $.ajax({
			// type:'POST',
			// url:'cycleImmo/Immoa/php/countColA.php',
			// data:{mission_id:mission_id, cycleName:'immo'},
			// success:function(e){
				// if(e==1){
					// getSynthese(mission_id, "1");
					// $('#fancybox_ima').show();
					// $('#message_Synthese_ima').show();
				// }
				// else{
					// $('#mess_vide_ima').show();
					// $('#fancybox_ima').show();
				// }
			// }
		// });
	});
});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleImmo/Immoa/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_ima").value=doc[0];
			document.getElementById("rd_Synthese_ima_Faible").checked=false;
			document.getElementById("rd_Synthese_ima_Moyen").checked=false;
			document.getElementById("rd_Synthese_ima_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_ima_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_ima_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_ima_Eleve").checked=true;
			}
		}
	});
}
function closedButima(){
	document.getElementById("Int_ima_Retour").disabled=true;
	document.getElementById("Int_ima_Suivant").disabled=true;
}
function openButima(){
	document.getElementById("Int_ima_Retour").disabled=false;
	document.getElementById("Int_ima_Suivant").disabled=false;
}

function ajout_case(){
	tr_1=document.getElementById("tr_case1");
	tr_2=document.getElementById("tr_case2");
	tr_3=document.getElementById("tr_case3");
	tr_4=document.getElementById("tr_case4");
	tr_5=document.getElementById("tr_case5");
	tr_6=document.getElementById("tr_case6");
	tr_7=document.getElementById("tr_case7");
	tr_8=document.getElementById("tr_case8");
	tr_9=document.getElementById("tr_case9");
	tr_10=document.getElementById("tr_case10");
	tr_11=document.getElementById("tr_case11");
	tr_12=document.getElementById("tr_case12");
	
	var td1 = document.createElement('td');
	var td2 = document.createElement('td');
	var td3 = document.createElement('td');
	var td4 = document.createElement('td');
	var td5 = document.createElement('td');
	var td6 = document.createElement('td');
	var td7 = document.createElement('td');
	var td8 = document.createElement('td');
	var td9 = document.createElement('td');
	var td10 = document.createElement('td');
	var td11 = document.createElement('td');
	var td12 = document.createElement('td');

	tr_1.appendChild(td1);
	tr_2.appendChild(td2);
	tr_3.appendChild(td3);
	tr_4.appendChild(td4);
	tr_5.appendChild(td5);
	tr_6.appendChild(td6);
	tr_7.appendChild(td7);
	tr_8.appendChild(td8);
	tr_9.appendChild(td9);
	tr_10.appendChild(td10);
	tr_11.appendChild(td11);
	tr_12.appendChild(td12);
	
	var x1=document.createElement("input");
	var x2=document.createElement("input");
	var x3=document.createElement("input");
	var x4=document.createElement("input");
	var x5=document.createElement("input");
	var x6=document.createElement("input");
	var x7=document.createElement("input");
	var x8=document.createElement("input");
	var x9=document.createElement("input");
	var x10=document.createElement("input");
	var x11=document.createElement("input");
	var x12=document.createElement("select");
	
	x1.setAttribute("type","checkbox");
	x2.setAttribute("type","checkbox");
	x3.setAttribute("type","checkbox");
	x4.setAttribute("type","checkbox");
	x5.setAttribute("type","checkbox");
	x6.setAttribute("type","checkbox");
	x7.setAttribute("type","checkbox");
	x8.setAttribute("type","checkbox");
	x9.setAttribute("type","checkbox");
	x10.setAttribute("type","checkbox");
	x11.setAttribute("type","checkbox");
	
	var selectOption = new Array(new Option("Faible", "Faible", false, false),new Option("Moyen", "Moyen", false, false),new Option("Elevé", "Elevé", false, false));
	for (i=0;i<selectOption.length;i++)
	{
		x12.options.add(selectOption[i]);
	}
	td1.appendChild(x1);
	td2.appendChild(x2);
	td3.appendChild(x3);
	td4.appendChild(x4);
	td5.appendChild(x5);
	td6.appendChild(x6);
	td7.appendChild(x7);
	td8.appendChild(x8);
	td9.appendChild(x9);
	td10.appendChild(x10);
	td11.appendChild(x11);
	td12.appendChild(x12);
}

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Tinay editer -->
<!--<p>/cycleImmo/Immoa/form/Interface_ima.php</p>-->

<div id="int_ima">
	<!-- POPUP -->
	<button id="bouton-popup-im" class="bouton">Ajouter un poste cle</button>
	<button id="bouton-popup-suppr-im" class="bouton"> Supprimer un personnel concern&eacute </button>
			<div id="element_to_pop_up_im" style="display:none;">
			    <!--<a class="bouton-close">x<a/>-->
			    	<form>
			    		<input type="text" placeholder="Nom du poste" id="nom_poste_im" required/>
			       		<input type="text" placeholder="Titulaire" id="titulaire_im" required/>
			       		<input type="button" id="enregistrer_poste_im" value="Accepter"/>
			       		<input type="button" value="x" class="bouton-close"/>
			    	<form>
			</div>
	<div id="supprimer_poste_im"></div>

	<!-- POPUP -->
	<table>
		<tr>
			<td width="380" class="sous_Titre" align="center">Fonctions</td>
			<td width="900" class="sous_Titre" align="center">Personnels concernés</td>
			<td width="500" class="sous_Titre" align="center"><p id="ajoutPersonnel">Ajouter personnels concernés</p></td>
	        <td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
	   <select id = "id_choix_poste_cle_im" onchange="choix_poste_cle()">
	    <?php
	    $reponse1 = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.'
		AND POSTE_CLE_ID NOT IN
		(SELECT tab_poste_cle.POSTE_CLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID 
		WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND tab_poste_cycle.POSTE_CYCLE_NOM="immo")	
		');
	    while ($donnees1 = $reponse1->fetch())
	    {
	     $poste_cle_nom=$donnees1['POSTE_CLE_NOM'];
	    ?>
	     <option value=""><?php echo $poste_cle_nom; ?></option>
	    <?php
	    }
	    ?>
	    <option selected disabled>Selectionnez un poste</option>
	   </select> 
	  </td>
		</tr>
	</table>

	<table>
		<tr height="10">
			<td width="380"></td>
			<td width="900" class="titre"><?php //include 'cycleAchat/cycle_achat_load/Load_A_Persll_adt.php'?>
			<table>
		<tr id="tr_ajout_input">
	<?php
		include '../../../connexion.php';

		$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="immo"');
		$nbrTot=0;
		while ($donnees = $reponse->fetch())
		{
		?>	
			<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['POSTE_CLE_NOM']; ?></td>
	<?php
		$nbrTot++;
	}
	?>
		</tr>
	</table>
		<input type="text" id="nbrTot" value="<?php echo $nbrTot; ?>" style="display:none;" />
			</td>
		</tr>
	</table>
	<div id="table_Interface_ima">
		<table  class="label">
			<tr bgcolor="#efefef">
				<td width="380">1 Approbation des budgets</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_1.php'; ?></td>
			</tr>
			<tr>
				<td width="380">2 Approbation des dépassements par rapport aux budgets</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_2.php'; ?></td>
			</tr>
			<tr  bgcolor="#efefef">
				<td width="380">3 Émission de commandes d'achats</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_3.php'; ?></td>
			</tr>
			<tr>
				<td width="380">4 Approbation finale des factures</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_4.php'; ?></td>
			</tr>
			<tr bgcolor="#efefef">
				<td width="380">5 Tenue des fiches individuelles d'immobilisations</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_5.php'; ?></td>
			</tr>
			<tr>
				<td width="380">6 Rapprochement des fiches avec la comptabilité</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_6.php'; ?></td>
			</tr>
			<tr bgcolor="#efefef">
				<td width="380">7 Inventaire physique</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_7.php'; ?></td>
			</tr>
			<tr>
				<td width="380">8 Responsabilité du matériel</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_8.php'; ?></td>
			</tr>
			<tr bgcolor="#efefef">
				<td width="380">9 Rapprochement des fiches avec l'inventaire physique</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_9.php'; ?></td>
			</tr>
			<tr>
				<td width="380">10 Approbation des ajustements de comptes après inventaire</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_10.php'; ?></td>
			</tr>
			<tr bgcolor="#efefef">
				<td width="380">11 Mise à jour du fichier informatique</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_ima_Check_Fonction_11.php'; ?></td>
			</tr>
			<tr>
				<td width="380">Niveaux de risque</td>
				<td width="900"><?php include '../../../cycleImmo/Immoa/load/Load_Risque_ima.php'; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="button" class="bouton" value="Retour"id="Int_ima_Retour" />&nbsp;&nbsp;
					<input type="button" class="bouton" value="Suivant" id="Int_ima_Suivant" />
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="fancybox_ima"></div>
<div id="message_Synthese_ima" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleImmo/Immoa/form/Interface_ima_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cycleImmo/Immoa/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleImmo/Immoa/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleImmo/Immoa/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_ima"><?php include '../../../cycleImmo/Immoa/sms/Message retour ima.php' ?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_ima"><?php include '../../../cycleImmo/Immoa/sms/Mess_vide_synth_ima.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_ima"><?php include '../../../cycleImmo/Immoa/sms/mess_vide_ima.php'; ?></div>
<div id="mess_no_question"><?php include '../../../cycleImmo/Immoa/sms/mess_no_question.php'; ?></div>

<style>
	#bouton-popup-suppr-im{
		position: absolute;
	}
	#ajoutPersonnel{
		position: absolute;
	    top: 6%;
	    left: 78%;
	}
</style>