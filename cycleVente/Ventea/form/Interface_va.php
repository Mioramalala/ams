<?php
include '../../../connexion.php';
$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10');
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
	tr_18=document.getElementById("tr_case18");
	tr_19=document.getElementById("tr_case19");
	tr_20=document.getElementById("tr_case20");
	tr_21=document.getElementById("tr_case21");
	tr_22=document.getElementById("tr_case22");
	tr_23=document.getElementById("tr_case23");
	tr_24=document.getElementById("tr_case24");
	tr_25=document.getElementById("tr_case25");
	tr_26=document.getElementById("tr_case26");
	tr_27=document.getElementById("tr_case27");
	tr_28=document.getElementById("tr_case28");
	tr_29=document.getElementById("tr_case29");
	tr_30=document.getElementById("tr_case30");
	tr_31=document.getElementById("tr_case31");
	tr_32=document.getElementById("tr_case32");
	tr_33=document.getElementById("tr_case33");
	tr_34=document.getElementById("tr_case34");
	tr_35=document.getElementById("tr_case35");
	tr_36=document.getElementById("tr_case36");
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
	var td25 = document.createElement('td');
	var td26 = document.createElement('td');
	var td27 = document.createElement('td');
	var td28 = document.createElement('td');
	var td29 = document.createElement('td');
	var td30 = document.createElement('td');
	var td31 = document.createElement('td');
	var td32 = document.createElement('td');
	var td33 = document.createElement('td');
	var td34 = document.createElement('td');
	var td35 = document.createElement('td');
	var td36 = document.createElement('td');
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
	tr_25.appendChild(td25);
	tr_26.appendChild(td26);
	tr_27.appendChild(td27);
	tr_28.appendChild(td28);
	tr_29.appendChild(td29);
	tr_30.appendChild(td30);
	tr_31.appendChild(td31);
	tr_32.appendChild(td32);
	tr_33.appendChild(td33);
	tr_34.appendChild(td34);
	tr_35.appendChild(td35);
	tr_36.appendChild(td36);
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
	var x24=document.createElement("input");
	var x25=document.createElement("input");
	var x26=document.createElement("input");
	var x27=document.createElement("input");
	var x28=document.createElement("input");
	var x29=document.createElement("input");
	var x30=document.createElement("input");
	var x31=document.createElement("input");
	var x32=document.createElement("input");
	var x33=document.createElement("input");
	var x34=document.createElement("input");
	var x35=document.createElement("input");
	var x36=document.createElement("select");
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
	x24.setAttribute("type","checkbox");
	x25.setAttribute("type","checkbox");
	x26.setAttribute("type","checkbox");
	x27.setAttribute("type","checkbox");
	x28.setAttribute("type","checkbox");
	x29.setAttribute("type","checkbox");
	x30.setAttribute("type","checkbox");
	x31.setAttribute("type","checkbox");
	x32.setAttribute("type","checkbox");
	x33.setAttribute("type","checkbox");
	x34.setAttribute("type","checkbox");
	x35.setAttribute("type","checkbox");
	var selectOption = new Array(new Option("Faible", "Faible", false, false),new Option("Moyen", "Moyen", false, false),new Option("Elevé", "Elevé", false, false));
	for (i=0;i<selectOption.length;i++)
	{
		x36.options.add(selectOption[i]);
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
	td25.appendChild(x25);
	td26.appendChild(x26);
	td27.appendChild(x27);
	td28.appendChild(x28);
	td29.appendChild(x29);
	td30.appendChild(x30);
	td31.appendChild(x31);
	td32.appendChild(x32);
	td33.appendChild(x33);
	td34.appendChild(x34);
	td35.appendChild(x35);
	td36.appendChild(x36);
}
function choix_poste_cle(){
 var sd=1;
 var poste_cle=$("#id_choix_poste_cle_va option:selected").html();
 $("#id_choix_poste_cle_va option:selected").remove();
// alert(poste_cle);
 document.getElementById("id_choix_poste_cle_va").setAttribute("enable","enable");
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
	//alert(sd);
	ajout_case();
	//Enregistrement + reload
	mission_id=document.getElementById("txt_mission_id").value;
	entrepiseId=<?php echo $entrepiseId; ?>;
	$.ajax({
		type:'POST',
		url:'cycleVente/Ventea/php/ajout_poste_cycle.php',
		data:{text:poste_cle, mission_id:mission_id, entrepiseId:entrepiseId},
		success:function(e){
				//alert("Poste_cycle_enregistre:"+e);
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventea/form/Interface_va_Secondaire.php',
					data:{mission_id:mission_id, entrepiseId:entrepiseId},
					success:function(e){
						//alert("reload")
							$('#contva').html(e).show();
							$('#contPosteVa').hide();
					}
				});
		}
	});
}
$(function(){
	$('#Int_va_Retour').click(function(){
		$('#message_Fermeture_va').show();
		closedButva();
	});
        $('#bouton-popup-va').click(function(){
            $('#element_to_pop_up_va').fadeIn("slow");
	    });

    $('#bouton-popup-va-suppr').click(function(){
        	mission_id=document.getElementById("txt_mission_id").value;
			entrepiseId=<?php echo $entrepiseId; ?>;

            $.ajax({
            	type:'POST',
            	url:'postes_concernes/int_suppression_poste.php',
            	data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:"vente", 
            	lien:"cycleVente/Ventea/form/Interface_va_Secondaire.php", conteneur:'#contva'},
            	success:function(e){
            		$('#supprimer_poste_va').html(e).show();
            	}
            });
    });

        $('.bouton-close').click(function(){
                $('#element_to_pop_up_va').fadeOut("slow");
        });
		$('#enregistrer_poste_va').click(function(){
			var nom_poste=$('#nom_poste_va').val();
			var titulaire=$('#titulaire_va').val();
			var eseId=<?php echo $entrepiseId; ?>;
			if( nom_poste.length<1 || titulaire.length<1 ){
				alert("Veuillez remplir tous les champs.");
			}
			else{
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventea/php/enregistrer_poste_cle.php',
					data:{nom_poste:nom_poste,titulaire:titulaire,eseId:eseId},
					success:function(e){
						if(e==0){
							alert("Le poste a ete enregistre avec succes.");
							$('#id_choix_poste_cle_va').append('<option value="">'+nom_poste+'</option>');
	                		$('#element_to_pop_up_va').fadeOut("slow");
	                	} else{
	                		alert("Le poste existe deja.");
	                	}
                	}
				});
			}
		});
	$('#Int_va_Suivant').click(function(){
	mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Ventea/php/det_res_va.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					$.ajax({
						type:'POST',
						url:'cycleVente/Ventea/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventea/php/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox_va').show();
										$('#mess_vide_va').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cycleVente/Ventea/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:10},
											success:function(e){
												eo=""+e+"";
												//alert(e);
												doc=eo.split('*');
												document.getElementById("txt_Synthese_va").value=doc[0];
												document.getElementById("rd_Synthese_va_Moyen").checked=false;
												document.getElementById("rd_Synthese_va_Faible").checked=false;
												document.getElementById("rd_Synthese_va_Eleve").checked=false;
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_va_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_va_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_va_Eleve").checked=true;
												}
												$('#message_Synthese_va').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_va').show();
											}
										});
									}
								}
							});
						}
					});
				}
				else{
					$('#fancybox_va').show();
					$('#mess_vide_va').show();
				}
			}
		});
		// mission_id=document.getElementById("txt_mission_id").value;
		// $.ajax({
			// type:'POST',
			// url:'cycleVente/Ventea/php/countColA.php',
			// data:{mission_id:mission_id, cycleName:'vente'},
			// success:function(e){
				// if(e==1){
					// getSynthese(mission_id, "1");
					// $('#fancybox_va').show();
					// $('#message_Synthese_va').show();
				// }
				// else{
					// $('#mess_vide_va').show();
					// $('#fancybox_va').show();
				// }
			// }
		// });
	});
});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleVente/Ventea/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_va").value=doc[0];
			document.getElementById("rd_Synthese_va_Faible").checked=false;
			document.getElementById("rd_Synthese_va_Moyen").checked=false;
			document.getElementById("rd_Synthese_va_Eleve").checked=false;
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_va_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_va_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_va_Eleve").checked=true;
			}
		}
	});
}
function closedButva(){
	document.getElementById("Int_va_Retour").disabled=true;
	document.getElementById("Int_va_Suivant").disabled=true;
}
function openButva(){
	document.getElementById("Int_va_Retour").disabled=false;
	document.getElementById("Int_va_Suivant").disabled=false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div id="int_va">
<!-- POPUP -->
<!-- <button id="bouton-test">Test Reload</button> -->
<button id="bouton-popup-va" class="bouton">Ajouter un poste cle</button>
<button id="bouton-popup-va-suppr" class="bouton"> Supprimer un personnel concern&eacute </button>
		<div id="element_to_pop_up_va" style="display:none">
		    	<form>
		    		<input type="text" placeholder="Nom du poste" id="nom_poste_va" required/>
		       		<input type="text" placeholder="Titulaire" id="titulaire_va" required/>
		       		<input type="button" id="enregistrer_poste_va" value="Accepter"/>
		       		<input type="button" value="x" class="bouton-close"/>		       		
		    	<form>
		</div>
<div id="supprimer_poste_va"></div>
<!-- POPUP -->
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="900" class="sous_Titre" align="center">Personnes concernées/Intervenants</td>
		<td width="500" class="sous_Titre" align="center"><p id="ajoutPersonnel">Ajouter personnels concernés</p></td>
        <td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
	   	<select id = "id_choix_poste_cle_va" onchange="choix_poste_cle()">
		<?php
		$reponse1 = $bdd->query('SELECT POSTE_CLE_NOM, POSTE_CLE_ID FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.'
		AND POSTE_CLE_ID NOT IN
		(SELECT tab_poste_cle.POSTE_CLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID
		WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND tab_poste_cycle.POSTE_CYCLE_NOM="vente")
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
	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="vente"');
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
<div id="table_Interface_va">
<table  class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Traitement des commandes</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_1.php'; ?></td>
	</tr>
	<tr>
		<td width="380">2 Examen de la solvabilité des clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_2.php'; ?></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Facturation</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_3.php'; ?></td>
	</tr>
	<tr>
		<td width="380">4 Contrôle bon de livraison - facture</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_4.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Contrôle commande - facture</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_5.php'; ?></td>
	</tr>
	<tr>
		<td width="380">6 Tenue du journal des ventes</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_6.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Vérification de la continuité des numéros de factures comptabilisées</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_7.php'; ?></td>
	</tr>
	<tr>
		<td width="380">8 Liste des bons de sortie non facturés</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_8.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Tenue des comptes clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_9.php'; ?></td>
	</tr>
	<tr>
		<td width="380">10 Établissement de la balance clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_10.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Etablissement de la balance clients par ancienneté de solde</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_11.php'; ?></td>
	</tr>
	<tr>
		<td width="380">12 Rapprochement balance clients - compte collectif</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_12.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Centralisation des ventes</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_13.php'; ?></td>
	</tr>
	<tr>
		<td width="380">14 Détermination des conditions de paiement</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_14.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15 Relevé des chèques reçus au courrier</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_15.php'; ?></td>
	</tr>
	<tr>
		<td width="380">16 Détention des effets à recevoir</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_16.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">17 Tenue du journal des effets à recevoir</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_17.php'; ?></td>
	</tr>
	<tr>
		<td width="380">18 Inventaire des effets à recevoir</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_18.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">19 Accès à la comptabilité générale</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_19.php'; ?></td>
	</tr>
	<tr>
		<td width="380">20 Tenue du journal de trésorerie</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_20.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">21 Émission d'avoirs</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_21.php'; ?></td>
	</tr>
	<tr>
		<td width="380">22 Approbation des avoirs</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_22.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">23 Établissement des relevés clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_23.php'; ?></td>
	</tr>
	<tr>
		<td width="380">24 Envoi des relevés aux clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_24.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">25 Comparaison des relevés avec les comptes</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_25.php'; ?></td>
	</tr>
	<tr>
		<td width="380">26 Comparaison de la balance clients avec les comptes individuels</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_26.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">27 Confirmation des comptes clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_27.php'; ?></td>
	</tr>
	<tr>
		<td width="380">28 Relance des clients</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_28.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">29 Prolongation des conditions de paiement</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_29.php'; ?></td>
	</tr>
	<tr>
		<td width="380">30 Accord d'escomptes</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_30.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">31 Autorisation de passer en pertes des créances</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_31.php'; ?></td>
	</tr>
	<tr>
		<td width="380">32 Détention de la liste des clients passés en perte</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_32.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">33 Tenue des comptes débiteurs divers</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_33.php'; ?></td>
	</tr>
	<tr>
		<td width="380">34 Expédition des produits finis</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_34.php'; ?></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">35 Surveillance des stocks</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_va_Check_Fonction_35.php'; ?></td>
	</tr>
	<tr>
		<td width="380">Niveaux de risque</td>
		<td width="900"><?php include '../../../cycleVente/Ventea/load/Load_Risque_va.php'; ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_va_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_va_Suivant" />
		</td>
	</tr>
</table>
</div>
</div>
<div id="fancybox_va"></div>
<div id="message_Synthese_va" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleVente/Ventea/form/Interface_va_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cycleVente/Ventea/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleVente/Ventea/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleVente/Ventea/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_va"><?php include '../../../cycleVente/Ventea/sms/Message retour va.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_va"><?php include '../../../cycleVente/Ventea/sms/Mess_vide_synth_va.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_va"><?php include '../../../cycleVente/Ventea/sms/mess_vide_va.php'; ?></div>
<style>
#bouton-popup-va-suppr{
	position: absolute;
}
#ajoutPersonnel{
	position: absolute;
    top: 2%;
    left: 78%;
}
</style>