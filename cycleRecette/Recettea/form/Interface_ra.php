<?php

	include '../../../connexion.php';

	@session_start();

	$mission_id=$_SESSION['idMission'];

	$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=100');

	$donnees=$reponse->fetch();

	$conclusionId=$donnees['CONCLUSION_ID'];
	$entrepiseId=$_POST['entrepiseId'];



	$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=100 AND MISSION_ID='.$mission_id;
	$verif=$bdd->query($sql);
	$res_=$verif->fetch();
	$validatRecetteA=$res_["nb"];
?>
<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->
<script language="javascript">

	



	// $(document).ready(function() {
	// 	$('#message_Synthese_ra').draggable();
	// 	$('#interface_ra_ Conclusion_Superviseur').draggable();
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
	tr_15=document.getElementById("tr_case15");
	tr_16=document.getElementById("tr_case16");
	tr_17=document.getElementById("tr_case17");
	tr_18=document.getElementById("tr_case18");
	tr_19=document.getElementById("tr_case19");
	tr_20=document.getElementById("tr_case20");
	tr_21=document.getElementById("tr_case21");
	tr_22=document.getElementById("tr_case22");
	tr_23=document.getElementById("tr_case23");
	tr_24=document.getElementById("tr_case24");
	
	$(function() {

		<?php
			//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
			if($validatRecetteA==1){
		?>
				// $('textarea').attr('disabled',true);
				// $(':input[type=radio]').attr('disabled',true);
				// $(':input[type=checkbox]').attr('disabled',true);
				// $('select').attr('disabled',true);
				// $('#Synthese_ra_Terminer').attr('disabled',true);

				$('#contra textarea').attr('disabled',true);
				$('#contra:input[type=radio]').attr('disabled',true);
				$('#contra:input[type=checkbox]').attr('disabled',true);
				$('#contra select').attr('disabled',true);
				$('#contra #Synthese_ra_Terminer').attr('disabled',true);

		<?php
			}
			//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDE
		?>

		$('#Int_ra_Retour').click(function(){
			$('#message_Fermeture_ra').show();	
			closedButra();
			// besoin de load??
		});

		$('#bouton-popup-ra').bind('click', function(e) {
			e.preventDefault();
			$('#element_to_pop_up_ra').fadeIn("slow");
			alert('ajouter moi');
		});

		$('#bouton-popup-ra-suppr').click(function() {
			mission_id=document.getElementById("txt_mission_id").value;
			entrepiseId=<?php  echo $entrepiseId; ?>;
			$.ajax({
				type:'POST',
				url:'postes_concernes/int_suppression_poste.php',
				data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:"recette", 
				lien:"cycleRecette/Recettea/form/Interface_ra_Secondaire.php", conteneur:'#contra'},
				success:function(e){
					$('#supprimer_poste_ra').html(e).show();
				}
			});
		});

		$('.bouton-close').click(function(){
			$('#element_to_pop_up_ra').fadeOut("slow");
		});

		$('#enregistrer_poste_ra').click(function(){
			var nom_poste=$('#nom_poste_ra').val();
			var titulaire=$('#titulaire_ra').val();
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
						$('#id_choix_poste_cle_ra').append('<option value="">'+nom_poste+'</option>');
	            		$('#element_to_pop_up_ra').fadeOut("slow");
	            		}
	            		else{
	            		alert("Le poste existe deja.");
	            		}
	            	}
				});
			}
		});

		
		var sd=1;

		$('#Int_ra_Suivant').click(function(){
			
			mission_id=document.getElementById("txt_mission_id").value;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettea/php/det_res_ra.php',
				data:{mission_id:mission_id},
				success:function(e){
					
					if(e==1){
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettea/php/getEseIdMissId.php',
							data:{mission_id:mission_id},
							success:function(e)
							{
								
								eseId=e;	
								$.ajax(
									{
									type:'POST',
									url:'cycleRecette/Recettea/php/countColFunct.php',
									data:{entrepriseId:eseId},
									success:function(e1)
									{
										//alert(e1+"DDD");
										
										if(e1==0){
											$('#fancybox_ra').show();
											$('#mess_vide_ra').show();
										}
										else
											{
														$.ajax({
															type:'POST',
															url:'cycleRecette/Recettea/php/getSynth.php',
															data:{ cycleId:100},
															success:function(e){
																doc=e.split('*');
																//alert(doc);
																document.getElementById("txt_Synthese_ra").value=doc[0];
																document.getElementById("rd_Synthese_ra_Moyen").checked=false;
																document.getElementById("rd_Synthese_ra_Faible").checked=false;
																document.getElementById("rd_Synthese_ra_Eleve").checked=false;
																if(doc[1]=='faible'){
																	document.getElementById("rd_Synthese_ra_Faible").checked=true;
																}
																else if(doc[1]=='moyen'){
																	document.getElementById("rd_Synthese_ra_Moyen").checked=true;
																}
																else if(doc[1]=='eleve'){
																	document.getElementById("rd_Synthese_ra_Eleve").checked=true;
																}
																$('#message_Synthese_ra').show();
																$('#message_ra_Synthese_Terminer').hide();
																$('#message_Slide').hide();
																$('#fancybox_ra').show();
															}
														});
										   }//FIN ELSE
									  }
								     });
							}
						});
					}
					else{
						$('#fancybox_ra').show();
						$('#mess_vide_ra').show();
					}
				}
			});

		});//FIN FONCTION CLICK
	});//FIN FUNCTION
	
	function choix_poste_cle(){
	 var sd=1;
		 var poste_cle=$("#id_choix_poste_cle_ra option:selected").html();
		 $("#id_choix_poste_cle_ra option:selected").remove();
		 //alert(poste_cle);
		 document.getElementById("id_choix_poste_cle_ra").setAttribute("enable","enable");
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
				url:'cycleRecette/Recettea/php/ajout_poste_cycle.php',
				data:{text:poste_cle, mission_id:mission_id, entrepiseId:entrepiseId},
				success:function(e){
						//alert("Poste_cycle_enregistre:"+e);
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettea/form/Interface_ra_Secondaire.php',
							data:{mission_id:mission_id, entrepiseId:entrepiseId},
							success:function(e){
								//alert("reload")
								$('#contra').html(e).show();
							}
						});
				}
			});

	}

	function getSynthese(mission_id, cycleId){
		alert("mission_id"+mission_id+" cycleId "+cycleId);

				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettea/php/getSynth.php',
					data:{mission_id:mission_id, cycleId:cycleId},
					success:function(e){
						eo=""+e+"";
						doc=eo.split('*');
						document.getElementById("txt_Synthese_ra").value=doc[0];
						document.getElementById("rd_Synthese_ra_Faible").checked=false;
						document.getElementById("rd_Synthese_ra_Moyen").checked=false;
						document.getElementById("rd_Synthese_ra_Eleve").checked=false;
						
						if(doc[1]=="faible"){
							document.getElementById("rd_Synthese_ra_Faible").checked=true;
						}
						else if(doc[1]=="moyen"){
							document.getElementById("rd_Synthese_ra_Moyen").checked=true;
						}
						else if(doc[1]=="eleve"){
							document.getElementById("rd_Synthese_ra_Eleve").checked=true;
						}
					}
				});
	}





	function closedButra(){
				document.getElementById("Int_ra_Retour").disabled=true;
				document.getElementById("Int_ra_Suivant").disabled=true;
	}
	function openButra(){
				document.getElementById("Int_ra_Retour").disabled=false;
				document.getElementById("Int_ra_Suivant").disabled=false;
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
		var td18 = document.createElement('td');
		var td19 = document.createElement('td');
		var td20 = document.createElement('td');
		var td21 = document.createElement('td');
		var td22 = document.createElement('td');
		var td23 = document.createElement('td');
		var td24 = document.createElement('td');

		
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
		tr_18.appendChild(td18);
		tr_19.appendChild(td19);
		tr_20.appendChild(td20);
		tr_21.appendChild(td21);
		tr_22.appendChild(td22);
		tr_23.appendChild(td23);
		tr_24.appendChild(td24);
		
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
		var x17=document.createElement("input");
		var x18=document.createElement("input");
		var x19=document.createElement("input");
		var x20=document.createElement("input");
		var x21=document.createElement("input");
		var x22=document.createElement("input");
		var x23=document.createElement("input");
		var x24=document.createElement("select");
		
		
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
		x17.setAttribute("type","checkbox");
		x18.setAttribute("type","checkbox");
		x19.setAttribute("type","checkbox");
		x20.setAttribute("type","checkbox");
		x21.setAttribute("type","checkbox");
		x22.setAttribute("type","checkbox");
		x23.setAttribute("type","checkbox");
		
		var selectOption = new Array(new Option("Faible", "Faible", false, false),new Option("Moyen", "Moyen", false, false),new Option("Elevé", "Elevé", false, false));
		for (i=0;i<selectOption.length;i++)
		{
			x24.options.add(selectOption[i]);
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
		td18.appendChild(x18);
		td19.appendChild(x19);
		td20.appendChild(x20);
		td21.appendChild(x21);
		td22.appendChild(x22);
		td23.appendChild(x23);
		td24.appendChild(x24);
	}

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<div id="int_ra">
<!-- POPUP -->
<!-- <button id="bouton-test">Test Reload</button> -->
<button id="bouton-popup-ra" class="bouton">Ajouter un poste cle</button>
<button id="bouton-popup-ra-suppr" class="bouton"> Supprimer un personnel concern&eacute </button>
		<div id="element_to_pop_up_ra" style="display:none">
		    	<form>
		    		<input type="text" placeholder="Nom du poste" id="nom_poste_ra" required/>
		       		<input type="text" placeholder="Titulaire" id="titulaire_ra" required/>
		       		<input type="button" id="enregistrer_poste_ra"  value="Accepter"/>
		    		<input type="button" value="x" class="bouton-close"/>
		    	<form>
		</div>
<div id="supprimer_poste_ra"></div>
<!-- POPUP -->

<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="900" class="sous_Titre" align="center">Personnels concernés</td>
		<td width="500" class="sous_Titre" align="center"><p id="ajoutPersonnel">Ajouter personnels concernés</p></td>
			<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
	   <select id = "id_choix_poste_cle_ra" onchange="choix_poste_cle()">
		<?php
		$reponse1 = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CLE_ID NOT IN
		(SELECT tab_poste_cle.POSTE_CLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID 
		WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND tab_poste_cycle.POSTE_CYCLE_NOM="recette")	
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

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="recette"');
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
<div id="table_Interface_ra">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Tenue de la caisse</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_1.php'; ?></td>
	</tr>
	<tr>
		<td width="380">2 Détention de titres</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_2.php'; ?></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Détention des chèques reçus des clients</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_3.php'; ?></td>
	</tr>
	<tr>
		<td width="380">4 Autorisation d'avance aux employés</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_4.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Détention des carnets de chèques</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_5.php'; ?></td>
	</tr>
	<tr>
		<td width="380">6 Préparation des chèques</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_6.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Approbation des pièces justificatives</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_7.php'; ?></td>
	</tr>
	<tr>
		<td width="380">8 Signature des chèques</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_8.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Annulation des pièces justificatives</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_9.php'; ?></td>
	</tr>
	<tr>
		<td width="380">10 Envoi des chèques</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_10.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Tenue du journal de trésorerie</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_11.php'; ?></td>
	</tr>
	<tr>
		<td width="380">12 Liste des chèques reçus au courrier</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_12.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Dépôts en banque des chèques ou espèces</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_13.php'; ?></td>
	</tr>	
	<tr>
		<td width="380">14 Tenue des comptes clients</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_14.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15 Tenue des comptes fournisseurs</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_15.php'; ?></td>
	</tr>
	<tr>
		<td width="380">16 Émission d'avoirs</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_16.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">17 Approbation des avoirs</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_17.php'; ?></td>
	</tr>
	<tr >
		<td width="380">18 Réception des relevés bancaires</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_18.php'; ?></td>
	</tr>	
	<tr bgcolor="#efefef">
		<td width="380">19 Préparation des rapprochements de banque</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_19.php'; ?></td>
	</tr>
	<tr>
		<td width="380">20 Comparaison de la liste des chèques reçus au courrier avec les bordereaux de remise en banque et avec le journal de trésorerie</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_20.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">21 Accès à la comptabilité générale</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_21.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">22 Tenue du journal des ventes</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_22.php'; ?></td>
	</tr>	
	<tr>
		<td width="380">23 Préparation des factures clients</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_ra_Check_Fonction_23.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../../cycleRecette/Recettea/load/Load_Risque_ra.php'; ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_ra_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_ra_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_ra"></div>
<div id="message_Synthese_ra" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleRecette/Recettea/form/Interface_ra_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_ra_Synthese_Terminer" align="center"><?php include '../../../cycleRecette/Recettea/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleRecette/Recettea/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleRecette/Recettea/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_ra"><?php include '../../../cycleRecette/Recettea/sms/Message retour ra.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_ra"><?php include '../../../cycleRecette/Recettea/sms/Mess_vide_synth_ra.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_ra"><?php include '../../../cycleRecette/Recettea/sms/mess_vide_ra.php'; ?></div>
<style>
#bouton-popup-ra-suppr{
	position: absolute;
}
#ajoutPersonnel{
	position: absolute;
    top: 2%;
    left: 78%;
}
</style>