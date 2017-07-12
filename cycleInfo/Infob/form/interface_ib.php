<?php
	@session_start();
	include '../../../connexion.php';
	$mission_id=$_SESSION['idMission'];
	$reponse=$bdd->query('SELECT count(CONCLUSION_ID) as nb  FROM tab_conclusion WHERE CYCLE_ACHAT_ID=32 AND MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$conclusionId=$donnees['nb'];
	$validInfoB=$conclusionId;
?>
<script type="text/javascript" src="cycleAchat/plugins/jquery.easyui.min.js"></script>

<script>

	$(function(){

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
		        $("#Int_ib_Suivant").attr('disabled', result);

						<?php
						//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
						if($validInfoB==1)
						{

						?>

						$('select').attr('disabled',true);

						<?php
						}
						//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
						?>
		    }
		});


		var nb=parseInt(<?php echo $conclusionId;?>);
		if(nb!=0){
			$(':input[type=text]').attr('disabled',true);
			$('SELECT').attr('disabled',true);
		}

		$('#message_Synthese_ib').draggable();

		// tinay editer

		//REMPLIR LA BASE
		// Il ne faut pas changer, ça marche: tinay editer
		for(var i=1, id=431; id<448; i++, id++){
			ecrire_reponse(id, 'reponse_ib_'+i);
		}
		for(var i=1, id=431; id<448; i++, id++){
			ecrire_risque(id, 'risque_ib_'+i);
		}

		$('#Int_ib_Retour').click(function(){
			$('#message_Fermeture_ib').show();	
			closedButib();
		});
		
		//SUIVANT
		$('#Int_ib_Suivant').click(function(){
			if(document.getElementById('effectif').value=="" || document.getElementById('formation').value=="" ||document.getElementById('cout').value==""){
				$("#mess_vide_ib").show();
			}
			else{
				//se rediriger vers calcul score
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infob/php/select_score_ib.php',
					data:{mission_id:mission_id ,cycleId:32},
					success:function(e){
						$("#echo_score_ib").html(e);
					}			
				});

				save_prise_contact();
			
				mission_id=document.getElementById("txt_mission_id").value;	
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infob/php/getSynth.php',
					data:{mission_id:mission_id, cycleId:32},
					success:function(e){
						eo=""+e+"";
						doc=eo.split('*');
						document.getElementById("txt_Synthese_ib").value=doc[0];
						document.getElementById("rd_Synthese_ib_Moyen").checked=false;
						document.getElementById("rd_Synthese_ib_Faible").checked=false;
						document.getElementById("rd_Synthese_ib_Eleve").checked=false;
						if(doc[1]=='faible'){
							document.getElementById("rd_Synthese_ib_Faible").checked=true;
						}
						else if(doc[1]=='moyen'){
							document.getElementById("rd_Synthese_ib_Moyen").checked=true;
						}
						else if(doc[1]=='eleve'){
							document.getElementById("rd_Synthese_ib_Eleve").checked=true;
						}
						$('#message_Synthese_ib').show();
						$('#message_ib_Synthese_Terminer').hide();
						$('#message_Slide').hide();
						$('#fancybox_ib').show();
					}															
				});
			}
		});
		//SUIVANT
	});

	function getSynthese(mission_id, cycleId){
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/getSynth.php',
			data:{mission_id:mission_id, cycleId:cycleId},
			success:function(e){
				eo=""+e+"";
				doc=eo.split('*');
				document.getElementById("txt_Synthese_ib").value=doc[0];
				document.getElementById("rd_Synthese_ib_Faible").checked=false;
				document.getElementById("rd_Synthese_ib_Moyen").checked=false;
				document.getElementById("rd_Synthese_ib_Eleve").checked=false;
				
				if(doc[1]=="faible"){
					document.getElementById("rd_Synthese_ib_Faible").checked=true;
				}
				else if(doc[1]=="moyen"){
					document.getElementById("rd_Synthese_ib_Moyen").checked=true;
				}
				else if(doc[1]=="eleve"){
					document.getElementById("rd_Synthese_ib_Eleve").checked=true;
				}
			}
		});
	}
	function save_prise_contact(){
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/detectContactExistant.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/enregContact.php',
						data:{	val1:document.getElementById('effectif').value,
								val2:document.getElementById('formation').value,
								val3:document.getElementById('cout').value
							},
						success:function(){
						}
					});
				}else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/updateContact.php',
						data:{	val1:document.getElementById('effectif').value, 
								val2:document.getElementById('formation').value,
								val3:document.getElementById('cout').value,
								mission_id: mission_id
							},
						success:function(){
						}
					});
				}
			}
		
		});
	}
	function closedButib(){
		document.getElementById("Int_ib_Retour").disabled=true;
		document.getElementById("Int_ib_Suivant").disabled=true;
	}
	function openButib(){
		document.getElementById("Int_ib_Retour").disabled=false;
		document.getElementById("Int_ib_Suivant").disabled=false;
	}

	// tinay editer
	function select_risque(question_id, id_risque){ 
		risque= document.getElementById(id_risque).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/detect_risque_id_existant_ib.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/enregistrer_risque_ib.php',
						data:{risque:risque, question_id:question_id}, // tinay 
						success:function(e){
						}
					});

				}else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/update_risque_ib.php',
						data:{question_id:question_id, risque:risque, mission_id:mission_id}, // tinay
						success:function(e){
						}
					});
				}


			}
		});
	}

	// tinay editer
	function select_reponse(question_id, id_reponse){
		reponse=document.getElementById(id_reponse).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/enregistrer_reponse_ib.php',
			data:{reponse:reponse, question_id:question_id},
			success:function(){
			}
		});		
	}

	//tinay editer
	function ecrire_risque(question_id, id_risque){
		var risque= '';
		var temp= document.getElementById(id_risque).value;
		if( temp != ''){
			risque= temp;
		}

		$.ajax({
			type:'POST',
			url:'cycleInfo/Infob/php/detect_risque_id_existant_ib.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/enregistrer_risque_ib.php',
						// tinay editer
						//data:{question_id:question_id, risque:"faible"},
						data:{question_id:question_id, risque:risque},
						success:function(){
						}
					});
				}else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/Infob/php/update_risque_ib.php',
						// tinay editer
						//data:{question_id:question_id, risque:"faible"},
						data:{question_id:question_id, risque:risque},
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
				url:'cycleInfo/Infob/php/detect_risque_id_existant_ib.php',
				data:{question_id:question_id},
				success:function(e){
					if(e==0){
						$.ajax({
							type:'POST',
							url:'cycleInfo/Infob/php/enregistrer_reponse_ib.php',
							data:{reponse:"OUI", question_id:question_id}, // on met oui par defaut au debut.
							success:function(){
							}
						});
					}
				}
			
			});
	}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="int_ib">
<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_ib" style="display:none;" />
<h4 align="center">PRISE DE CONNAISSANCE</h4>
														

										<!-- Tinay editer -->
									<!-- Ordre insertion contact Info -->
									<!-- Prendre les ids par ordre d'insertion:
										1e: effectif
										2è: drègres
										3è: cout
									-->
<table  class="label" align="center">	
	<tr bgcolor="#efefef">
		<?php  
			// prendre les Ids.
			$rep= $bdd->query(' SELECT id FROM `tab_sys_info1` WHERE `MISSION_ID`= "' .$mission_id .'" ORDER BY id ASC');
			$data= $rep->fetch();
		?>		
			<?php 
				if($data){
					$rep= $bdd->query(' SELECT * FROM `tab_sys_info1` WHERE `MISSION_ID`= "' .$mission_id .'" ORDER BY id ASC');
					$count = 1;
					while($data= $rep->fetch()){
			?>			
						<?php if($count == 1){ ?>
							<td width="300" height="40" align="center">
								Effectif&nbsp;&nbsp;<input id="effectif" type="text" value="<?php echo stripslashes($data['VAL']);?>"/>
							</td>
						<?php } ?>
					
						<?php if($count == 2){ ?>
							<td width="300" height="40" align="center">
								Degre de Formation&nbsp;&nbsp;<input id="formation" type="text" value="<?php echo stripslashes($data['VAL']); ?>"/>
							</td>
						<?php } ?>

						<?php if($count == 3){ ?>
							<td width="300" height="40" align="center">
								Cout&nbsp;&nbsp;<input id="cout" type="text" value="<?php echo stripslashes($data['VAL']);?>"/>
							</td>
						<?php } ?>
						
					<?php 
							$count++;
						} 
					?>
			<?php }else{?>

							<td width="300" height="40" align="center">
								Effectif&nbsp;&nbsp;<input id="effectif" type="text" value="2"/>
							</td>
							<td width="300" height="40" align="center">
								Degre de Formation&nbsp;&nbsp;<input id="formation" type="text" value="100"/>
							</td>
							<td width="300" height="40" align="center">
								Cout&nbsp;&nbsp;<input id="cout" type="text" value="100000"/>
							</td>

			<?php
				}
			?>
	</tr>
	
</table>
<h4 align="center">ANALYSE DES RISQUES</h4>
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Questions</td>
		<td width="300" class="sous_Titre" align="center">Reponses</td>
		<td width="300" class="sous_Titre" align="center">Risque</td>
	</tr>
</table>



<div id="table_Interface_ib">

	<table  class="label">
		
		<tr bgcolor="#efefef">
			<td width="380">1. La direction générale exerce-t-elle un contrôle sur le service informatique : - Contrôle renforcé ?</td>
			<td width="300" align="center">
			<?php 																										//CYCLE_ACHAT_ID, QUESTION_ID, MISSION_ID
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=431 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_1' onchange="select_reponse(431, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_1' onchange="select_risque(431, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">2. La direction générale exerce-t-elle un contrôle sur le service informatique : - Contrôle des objectifs ?</td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=432 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_2' onchange="select_reponse(432, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_2' onchange="select_risque(432, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">3. Est-elle impliquée dans les décisions informatiques ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=433 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_3' onchange="select_reponse(433, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_3' onchange="select_risque(433, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">4. Tous les services utilisateurs sont-ils consultés pour les décisions informatiques qui les concernent ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=434 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_4' onchange="select_reponse(434, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_4' onchange="select_risque(434, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">5. La conception interne est-elle : -	intégrale ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=435 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_5' onchange="select_reponse(435, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_5' onchange="select_risque(435, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">6. La conception interne est-elle : -	partielle ?</td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=436 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_6' onchange="select_reponse(436, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_6' onchange="select_risque(436, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">7. La conception interne est-elle : -	inexistante ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=437 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_7' onchange="select_reponse(437, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_7' onchange="select_risque(437, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">8. La conception externe est-elle :  -	intégrale ?
	 </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=438 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_8' onchange="select_reponse(438, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_8' onchange="select_risque(438, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">9. La conception externe est-elle : -	partielle ?</td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=439 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_9' onchange="select_reponse(439, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_9' onchange="select_risque(439, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">10. La conception externe est-elle : -	inexistante ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=440 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_10' onchange="select_reponse(440, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_10' onchange="select_risque(440, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">11. L’exploitation interne est-elle :
	-	intégrale ?
	 </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=441 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_11' onchange="select_reponse(441, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_11' onchange="select_risque(441, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">12. L’exploitation interne est-elle : -	intégrale ?
	 </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=442 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_12' onchange="select_reponse(442, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_12' onchange="select_risque(442, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">13. L’exploitation interne est-elle : -	partielle ?
	 </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=443 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_13' onchange="select_reponse(443, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_13' onchange="select_risque(443, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">14. L’exploitation interne est-elle :  -	inexistante ?
	 </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=444 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_14' onchange="select_reponse(444, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_14' onchange="select_risque(444, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">15. L’exploitation externe est-elle : -	intégrale ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=445 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_15' onchange="select_reponse(445, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_15' onchange="select_risque(445, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="silver">
			<td width="380">16.L’exploitation externe est-elle : -	partielle ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=446 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_16' onchange="select_reponse(446, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_16' onchange="select_risque(446, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="faible" <?php if($donnees['OBJECTIF_RISQUE']=="f") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees['OBJECTIF_RISQUE']=="m") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees['OBJECTIF_RISQUE']=="e") echo 'selected'; ?> >Elevé</option>
			</select>
			</td>
		</tr>
		<tr bgcolor="#efefef">
			<td width="380">17.L’exploitation externe est-elle : -	inexistante ? </td>
			<td width="300" align="center">
			<?php 
				$reponse=$bdd->query('SELECT OBJECTIF_QCM, OBJECTIF_RISQUE FROM tab_objectif WHERE CYCLE_ACHAT_ID=32 AND QUESTION_ID=447 AND MISSION_ID = "' .$mission_id .'"');
				$donnees=$reponse->fetch();
			?>
				<select id='reponse_ib_17' onchange="select_reponse(447, this.id)">
					<option value="" selected disabled="disabled"></option>
					<option value="OUI" <?php if($donnees['OBJECTIF_QCM']=="OUI") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($donnees['OBJECTIF_QCM']=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="NON" <?php if($donnees['OBJECTIF_QCM']=="NON") echo 'selected'; ?> >Non</option>
				</select>
			</td>
			<td width="300" align="center">
			<select id='risque_ib_17' onchange="select_risque(447, this.id)">
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
				<input type="button" class="bouton" value="Retour"id="Int_ib_Retour" />&nbsp;&nbsp;
				<input type="button" class="bouton" value="Suivant" id="Int_ib_Suivant" />
			</td>
		</tr>
	</table>

</div>
</div>
<div id="fancybox_ib"></div>
<div id="message_Synthese_ib" data-options="handle:'#dibgg'" align="center">
<div id="dibgg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleInfo/Infob/form/Interface_ib_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_ib_Synthese_Terminer" align="center"><?php include '../../../cycleInfo/Infob/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleInfo/Infob/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleInfo/Infob/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_ib"><?php include '../../../cycleInfo/Infob/sms/Message retour ib.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_ib"><?php include '../../../cycleInfo/Infob/sms/Mess_vide_synth_ib.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_ib"><?php include '../../../cycleInfo/Infob/sms/mess_vide_ib.php'; ?></div>
