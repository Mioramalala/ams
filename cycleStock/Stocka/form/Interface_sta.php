<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=111');
$donnees=$reponse->fetch();
$conclusionId=0;
$entrepiseId=@$_POST['entrepiseId'];

$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=111 AND MISSION_ID='.$mission_id;
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$nbRES=$res_["nb"];

?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

<script language="javascript">

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($nbRES==1)
	{


	?>
	$(document).ready(function (e)
	{
		$('textarea').attr('disabled',true);
		$(':input[type=radio]').attr('disabled',true);
		$(':input[type=checkbox]').attr('disabled',true);
		$('select').attr('disabled',true);
		$('#Synthese_sta_Terminer').attr('disabled',true);



	});

	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER

	?>

	// $(document).ready(function() {
	// 	$('#message_Synthese_sta').draggable();
	// 	$('#interface_sta_ Conclusion_Superviseur').draggable();
	// $('a[rel*=facebox]').facebox();
	// });
	
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
	
			function choix_poste_cle(){
				var sd=1;
				 var poste_cle=$("#id_choix_poste_cle_sta option:selected").html();
				 $("#id_choix_poste_cle_sta option:selected").remove();
				 alert(poste_cle);
				 document.getElementById("id_choix_poste_cle_sta").setAttribute("enable","enable");
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
				alert (sd);
				ajout_case();
		
				//Enregistrement + reload
				mission_id=document.getElementById("txt_mission_id").value;
				entrepiseId=<?php echo $entrepiseId; ?>;
				$.ajax({
					type:'POST',
					url:'cycleStock/Stocka/php/ajout_poste_cycle.php',
					data:{text:poste_cle, mission_id:mission_id, entrepiseId:entrepiseId},
					success:function(e){
							//alert("Poste_cycle_enregistre:"+e);
							$.ajax({
								type:'POST',
								url:'cycleStock/Stocka/form/Interface_sta_Secondaire.php',
								data:{mission_id:mission_id, entrepiseId:entrepiseId},
								success:function(e){
									//alert("reload")
									$('#contsta').html(e).show();
								}
							});
					}
				});		
			}
$('#Int_sta_Retour').click(function(){
					$('#message_Fermeture_sta').show();	
					//closedButsta();
				});
$(document).ready(function(e) {

				
	

				$('#bouton-popup-sta').click(function(){
						$('#element_to_pop_up_sta').fadeIn("slow");
				});

				$('#bouton-popup-sta-suppr').click(function(){
						mission_id=document.getElementById("txt_mission_id").value;
						entrepiseId=<?php echo $entrepiseId; ?>;
			
						$.ajax({
							type:'POST',
							url:'postes_concernes/int_suppression_poste.php',
							data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:"stock", 
							lien:"cycleStock/Stocka/form/Interface_sta_Secondaire.php", conteneur:'#contsta'},
							success:function(e){
								$('#supprimer_poste_sta').html(e).show();
							}
						});
				});

				$('.bouton-close').click(function(){
						$('#element_to_pop_up_sta').fadeOut("slow");
				});

		$('#enregistrer_poste_sta').click(function(){
			var nom_poste=$('#nom_poste_sta').val();
			var titulaire=$('#titulaire_sta').val();
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
							alert("Le poste a ete enregistre avec succes. (Interface sta)");
							$('#id_choix_poste_cle_sta').append('<option value="">'+nom_poste+'</option>');
	                		$('#element_to_pop_up_sta').fadeOut("slow");                 	
                		}
                		else{
                			alert("Le poste existe deja. (Interface sta)");
                		}
                	}
				});
				//alert('cici');
			}
		});

	var sd=1;


	$('#Int_sta_Suivant').click(function() {
		//DEBUT Int_sta_Suivant
		
		var mission_id=$("#txt_mission_id").val();
		//alert("MANDE V???"+mission_id)
		$.ajax({
			type:'POST',
			url:'cycleStock/Stocka/php/det_res_sta.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					
					$.ajax({
						type:'POST',
						url:'cycleStock/Stocka/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;	
							//alert("1MANDE V???"+eseId);
							
							$.ajax({
								type:'POST',
								url:'cycleStock/Stocka/php/countColFunct.php',
								data:{entrepriseId:eseId,missionId:mission_id},
								success:function(e1){
									//alert("2MANDE V???"+e1);
									if(e1==0){
										$('#fancybox_sta').show();
										$('#mess_vide_sta').show();
										//alert("TAFA 0");

									}else{

										$.ajax({
											type:'POST',
											url:'cycleStock/Stocka/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:111},
											success:function(e){
												//alert("3MANDE V???"+e)
												eo=""+e+"";
												doc=eo.split('*');
												document.getElementById("txt_Synthese_sta").value=doc[0];
												document.getElementById("rd_Synthese_sta_Moyen").checked=false;
												document.getElementById("rd_Synthese_sta_Faible").checked=false;
												document.getElementById("rd_Synthese_sta_Eleve").checked=false;
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_sta_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_sta_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_sta_Eleve").checked=true;
												}
												$('#message_Synthese_sta').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_sta').show();
											}										
										});
									}//FIN else
									
								}
							});//FIN AJAX
						}
					});//FIN AJAX
				}	
				else{
					//alert("TAFA 12");
					$('#fancybox_sta').show();
					$('#mess_vide_sta').show();
				}
			}
		});//FIN AJAX
		
		
	});//FIN Int_sta_Suivant
		// mission_id=document.getElementById("txt_mission_id").value;
		// $.ajax({
			// type:'POST',
			// url:'cycleStock/Stocka/php/countColA.php',
			// data:{mission_id:mission_id, cycleName:'stock'},
			// success:function(e){
				// if(e==1){
					// getSynthese(mission_id, "1");
					// $('#fancybox_sta').show();
					// $('#message_Synthese_sta').show();
				// }
				// else{
					// $('#mess_vide_sta').show();
					// $('#fancybox_sta').show();
				// }
			// }
		// });
		
		
		
});
	
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleStock/Stocka/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split(',');
			document.getElementById("txt_Synthese_sta").value=doc[0];
			document.getElementById("rd_Synthese_sta_Faible").checked=false;
			document.getElementById("rd_Synthese_sta_Moyen").checked=false;
			document.getElementById("rd_Synthese_sta_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_sta_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_sta_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_sta_Eleve").checked=true;
			}
		}
	});
}
function closedButsta(){
	document.getElementById("Int_sta_Retour").disabled=true;
	document.getElementById("Int_sta_Suivant").disabled=true;
}
function openButsta(){
	document.getElementById("Int_sta_Retour").disabled=false;
	document.getElementById("Int_sta_Suivant").disabled=false;
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
	var x14=document.createElement("select");
	
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

	var selectOption = new Array(new Option("Faible", "Faible", false, false),new Option("Moyen", "Moyen", false, false),new Option("Elevé", "Elevé", false, false));
	for (i=0;i<selectOption.length;i++)
	{
		x14.options.add(selectOption[i]);
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
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<div id="int_sta">
<!-- POPUP -->
<!-- <button id="bouton-test">Test Reload</button> -->
<button id="bouton-popup-sta" class="bouton">Ajouter un poste cle</button>
<button id="bouton-popup-sta-suppr" class="bouton"> Supprimer un personnel concern&eacute </button>
		<div id="element_to_pop_up_sta" style="display:none">
		    	<form>
		    		<input type="text" placeholder="Nom du poste" id="nom_poste_sta" required/>
		       		<input type="text" placeholder="Titulaire" id="titulaire_sta" required/>
		       		<input type="button" id="enregistrer_poste_sta" value="Accepter"/>
		       		<input type="button" value="x" class="bouton-close"/>		       		
		    	<form>
		</div>
<div id="supprimer_poste_sta"></div>
<!-- POPUP -->
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="900" class="sous_Titre" align="center">Personnels concernés</td>
		<td width="500" class="sous_Titre" align="center"><p id="ajoutPersonnel">Ajouter personnels concernés</p></td>
        <td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
	   <select id = "id_choix_poste_cle_sta" onchange="choix_poste_cle()">
		<?php
		$reponse1 = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.'
		AND POSTE_CLE_ID NOT IN
		(SELECT tab_poste_cle.POSTE_CLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID 
		WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND tab_poste_cycle.POSTE_CYCLE_NOM="stock")	
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

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="stock"');
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
<div id="table_Interface_sta">
<table  class="label">
	<tr bgcolor="#efefef" id="tr_case1">
		<td width="380">1 Magasin</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_1.php'; ?></td>
	</tr>
	<tr id="tr_case2">
		<td width="380">2 Réception</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_2.php'; ?></td>
	</tr>
	<tr  bgcolor="#efefef" id="tr_case3">
		<td width="380">3 Expédition</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_3.php'; ?></td>
	</tr>
	<tr id="tr_case4">
		<td width="380">4 Tenue de fiches de stocks en quantités</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_4.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef" id="tr_case5">
		<td width="380">5 Tenue de l'inventaire permanent</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_5.php'; ?></td>
	</tr>
	<tr id="tr_case6">
		<td width="380" id="tr_case1">6 Responsable de l'inventaire physique</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_6.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef" id="tr_case7">
		<td width="380">7 Rapprochement inventaire physique - inventaire permanent</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_7.php'; ?></td>
	</tr>
	<tr id="tr_case8">
		<td width="380">8 Approbation des ajustements après inventaire</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_8.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef" id="tr_case9">
		<td width="380">9 Rapport sur les stocks obsolètes, inutilisables, etc.</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_9.php'; ?></td>
	</tr>
	<tr id="tr_case10">
		<td width="380">10 Autorisation de cession des stocks détériorés ou inutilisés</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_10.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef" id="tr_case11">
		<td width="380">11 Rapprochement comptabilité générale/ analytique</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_11.php'; ?></td>
	</tr>
	<tr id="tr_case12">
		<td width="380">12 Définition des prix de revient</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_12.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef" id="tr_case13">
		<td width="380">13 Comparaison prix de revient/prix de vente</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_sta_Check_Fonction_13.php'; ?></td>
	</tr>	
	<tr id="tr_case14">
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../../cycleStock/Stocka/load/Load_Risque_sta.php'; ?></td>
	</tr>
	<tr id="tr_case">
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_sta_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_sta_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_sta"></div>
<div id="message_Synthese_sta" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleStock/Stocka/form/Interface_sta_Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--****************************************Interface A Synthese A terminer********************************-->
<!-- tinay editer -->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cycleStock/Stocka/sms/Message_synthese_termine.php';?></div>
<!--*******************************************************************************************************-->



<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleStock/Stocka/sms/Message_slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleStock/Stocka/sms/Message_donnees_perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_sta"><?php include '../../../cycleStock/Stocka/sms/Message_retour_sta.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_sta"><?php include '../../../cycleStock/Stocka/sms/Mess_vide_synth_sta.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_sta"><?php include '../../../cycleStock/Stocka/sms/mess_vide_sta.php'; ?></div>
<style>
#bouton-popup-sta-suppr{
	position: absolute;
}
#ajoutPersonnel{
	position: absolute;
    top: 2%;
    left: 78%;
}
</style>