<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10000');

$donnees=$reponse->fetch();

$conclusionId=$donnees['CONCLUSION_ID'];

?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

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
	tr_13=document.getElementById("tr_case13");
	tr_14=document.getElementById("tr_case14");
	tr_15=document.getElementById("tr_case15");
	tr_16=document.getElementById("tr_case16");
	tr_17=document.getElementById("tr_case17");

	//tinay editer

	// Droit cycle by Tolotra
    // Page : RSCI -> Cycle achat
    // Tâche : Revue Contrôles Achats, numéro 1
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 1},
        success: function (e) {
            var result = 0 === Number(e);
            $("#bouton-popup-pa-suppr").prop('disabled', result);
            $("#bouton-popup-pa").prop('disabled', result);
            $("#Int_pa_Suivant").prop('disabled', result);
        }
    });
	
	function choix_poste_cle(){
		 var sd=1;
		 var poste_cle=$("#id_choix_poste_cle_pa option:selected").html();
		 $("#id_choix_poste_cle_pa option:selected").remove();
		 //alert(poste_cle);
		 document.getElementById("id_choix_poste_cle_pa").setAttribute("enable","enable");
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
			entrepiseId=<?php echo $entrepiseId; ?>;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiea/php/ajout_poste_cycle.php',
				data:{text:poste_cle, mission_id:mission_id, entrepiseId:entrepiseId},
				success:function(e){
						//alert("Poste_cycle_enregistre:"+e);
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiea/form/Interface_pa_Secondaire.php',
							data:{mission_id:mission_id, entrepiseId:entrepiseId},
							success:function(e){
								//alert("reload")
								$('#contpa').html(e).show();
							}
						});
				}
			});
	}
	
	// $(document).ready(function() {
	// 	$('#message_Synthese_pa').draggable();
	// 	$('#interface_pa_ Conclusion_Superviseur').draggable();
	// $('a[rel*=facebox]').facebox();
	// });
$(function(){

	$('#Int_pa_Retour').click(function(){
		$('#message_Fermeture_pa').show();	
		closedButpa();
	});

    $('#bouton-popup-pa').click(function(){
             //$('#element_to_pop_up_pa').bPopup();
            $('#element_to_pop_up_pa').fadeIn("slow");
            //alert("boo");
    });

    $('#bouton-popup-pa-suppr').click(function(){
        	mission_id=document.getElementById("txt_mission_id").value;
			entrepiseId=<?php echo $entrepiseId; ?>;

            $.ajax({
            	type:'POST',
            	url:'postes_concernes/int_suppression_poste.php',
            	data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:"paie", 
            	lien:"cyclePaie/Paiea/form/Interface_pa_Secondaire.php", conteneur:'#contpa'},
            	success:function(e){
            		$('#supprimer_poste_pa').html(e).show();
            	}
            });
    });

    $('.bouton-close').click(function(){
            $('#element_to_pop_up_pa').fadeOut("slow");
    });

	$('#enregistrer_poste_pa').click(function(){
		var nom_poste=$('#nom_poste_pa').val();
		var titulaire=$('#titulaire_pa').val();
		var eseId=<?php echo $entrepiseId; ?>;
		if( nom_poste.length<1 || titulaire.length<1 ){
			alert("Veuillez remplir tous les champs.");
		}
		else{
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_a/php/enregistrer_poste_cle.php',
				data:{nom_poste:nom_poste,titulaire:titulaire,eseId:eseId},
				success:function(e){
					if(e==0){
					alert("Le poste a ete enregistre avec succes."+e);
					$('#id_choix_poste_cle_pa').append('<option value="">'+nom_poste+'</option>');
            		$('#element_to_pop_up_pa').fadeOut("slow");
            		} else{
            		alert("Le poste existe deja.");
            		}
            	}
			});
		}
	});

	var sd=1;
	$('#Int_pa_Suivant').click(function(){		
	mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiea/php/det_res_pa.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){	
					$.ajax({
						type:'POST',
						url:'cyclePaie/Paiea/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;	
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiea/php/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox_pa').show();
										$('#mess_vide_pa').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cyclePaie/Paiea/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:10000},
											success:function(e){
												eo=""+e+"";
												doc=eo.split('*');
												document.getElementById("txt_Synthese_pa").value=doc[0];
												document.getElementById("rd_Synthese_pa_Moyen").checked=false;
												document.getElementById("rd_Synthese_pa_Faible").checked=false;
												document.getElementById("rd_Synthese_pa_Eleve").checked=false;
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_pa_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_pa_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_pa_Eleve").checked=true;
												}
												$('#message_Synthese_pa').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_pa').show();
											}										
										});
									}
								}
							});
						}
					});
				}	
				else{
					$('#fancybox_pa').show();
					$('#mess_vide_pa').show();
				}
			}
		});

		// mission_id=document.getElementById("txt_mission_id").value;
		// $.ajax({
			// type:'POST',
			// url:'cyclePaie/Paiea/php/countColA.php',
			// data:{mission_id:mission_id, cycleName:'paie'},
			// success:function(e){
				// if(e==1){
					// getSynthese(mission_id, "1");
					// $('#fancybox_pa').show();
					// $('#message_Synthese_pa').show();
				// }
				// else{
					// $('#mess_vide_pa').show();
					// $('#fancybox_pa').show();
				// }
			// }
		// });
	});
});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paiea/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_pa").value=doc[0];
			document.getElementById("rd_Synthese_pa_Faible").checked=false;
			document.getElementById("rd_Synthese_pa_Moyen").checked=false;
			document.getElementById("rd_Synthese_pa_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_pa_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_pa_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_pa_Eleve").checked=true;
			}
		}
	});
}
function closedButpa(){
	document.getElementById("Int_pa_Retour").disabled=true;
	document.getElementById("Int_pa_Suivant").disabled=true;
}
function openButpa(){
	document.getElementById("Int_pa_Retour").disabled=false;
	document.getElementById("Int_pa_Suivant").disabled=false;
}

function ajout_case(){
	
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
	var td13 = document.createElement('td');
	var td14 = document.createElement('td');
	var td15 = document.createElement('td');
	var td16 = document.createElement('td');
	var td17 = document.createElement('td');
	
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
	tr_13.appendChild(td13);
	tr_14.appendChild(td14);
	tr_15.appendChild(td15);
	tr_16.appendChild(td16);
	tr_17.appendChild(td17);
	
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
	var x12=document.createElement("input");
	var x13=document.createElement("input");
	var x14=document.createElement("input");
	var x15=document.createElement("input");
	var x16=document.createElement("input");
	var x17=document.createElement("select");
	
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
	x12.setAttribute("type","checkbox");
	x13.setAttribute("type","checkbox");
	x14.setAttribute("type","checkbox");
	x15.setAttribute("type","checkbox");
	x16.setAttribute("type","checkbox");
	
	var selectOption = new Array(new Option("Faible", "Faible", false, false),new Option("Moyen", "Moyen", false, false),new Option("Elevé", "Elevé", false, false));
	for (i=0;i<selectOption.length;i++)
	{
		x17.options.add(selectOption[i]);
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
	td13.appendChild(x13);
	td14.appendChild(x14);
	td15.appendChild(x15);
	td16.appendChild(x16);
	td17.appendChild(x17);
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="int_pa">
<!-- POPUP -->
<button id="bouton-popup-pa" class="bouton">Ajouter un poste cle</button>
<button id="bouton-popup-pa-suppr" class="bouton"> Supprimer un personnel concern&eacute </button>
		<div id="element_to_pop_up_pa" style="display:none">
		    	<form>
		    		<input type="text" placeholder="Nom du poste" id="nom_poste_pa" required/>
		       		<input type="text" placeholder="Titulaire" id="titulaire_pa" required/>
		       		<input type="button" id="enregistrer_poste_pa" value="Accepter"/>
		   		    <input type="button" value="x" class="bouton-close"/>
		    	<form>
		</div>
<div id="supprimer_poste_pa"></div>
<!-- POPUP -->
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="900" class="sous_Titre" align="center">Personnels concernés</td>
		<td width="500" class="sous_Titre" align="center"><p id="ajoutPersonnel">Ajouter personnels concernés</p></td>
        <td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
   <select id = "id_choix_poste_cle_pa" onchange="choix_poste_cle()">
    <?php
    $reponse1 = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.'
	AND POSTE_CLE_ID NOT IN
	(SELECT tab_poste_cle.POSTE_CLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID 
	WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND tab_poste_cycle.POSTE_CYCLE_NOM="paie")	
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
	<tr>
		<td width="380"></td>
		<td width="900" class="titre"><?php //include 'cycleAchat/cycle_achat_load/Load_A_Persll_adt.php'?>
		<table>
	<tr id="tr_ajout_input">
<?php
	include '../../../connexion.php';

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="paie"');
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
<div id="table_Interface_pa">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Approbation des entrées ou sorties de personnel</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_1.php'; ?></td>
	</tr>
	<tr>
		<td width="380">2 Détermination des niveaux de rémunérations</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_2.php'; ?></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Autorisation des primes</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_3.php'; ?></td>
	</tr>
	<tr>
		<td width="380">4 Mise à jour du fichier permanent</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_4.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Approbation des heures travaillées</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_5.php'; ?></td>
	</tr>
	<tr>
		<td width="380">6 Préparation de la paie</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_6.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Vérification des calculs</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_7.php'; ?></td>
	</tr>
	<tr>
		<td width="380">8 Approbation finale de la paie après sa préparation</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_8.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Préparation des enveloppes de paie</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_9.php'; ?></td>
	</tr>
	<tr>
		<td width="380">10 Distribution des enveloppes</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_10.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Signature des chèques ou virements de salaires</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_11.php'; ?></td>
	</tr>
	<tr>
		<td width="380">12 Rapprochement de banque du compte bancaire réservé aux salaires</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_12.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Centralisation de la paie</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_13.php'; ?></td>
	</tr>	
	<tr>
		<td width="380">14 Détention des dossiers individuels du personnel</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_14.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15 Comparaison périodique du journal de paie avec les dossiers individuels</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_15.php'; ?></td>
	</tr>
	<tr>
		<td width="380">16 Autorisation d'acomptes ou avances</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_pa_Check_Fonction_16.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../../cyclePaie/Paiea/load/Load_Risque_pa.php'; ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_pa_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_pa_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_pa"></div>
<div id="message_Synthese_pa" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cyclePaie/Paiea/form/Interface_pa_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cyclePaie/Paiea/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cyclePaie/Paiea/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cyclePaie/Paiea/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_pa"><?php include '../../../cyclePaie/Paiea/sms/Message retour pa.php'?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_pa"><?php include '../../../cyclePaie/Paiea/sms/Mess_vide_synth_pa.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_pa"><?php include '../../../cyclePaie/Paiea/sms/mess_vide_pa.php'; ?></div>
<style>
#bouton-popup-pa-suppr{
	position: absolute;
}
#ajoutPersonnel{
	position: absolute;
    top: 2%;
    left: 78%;
}
</style>