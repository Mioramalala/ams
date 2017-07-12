<?php
	session_start();
	$mission_id=$_SESSION['idMission'];
	
	include '../../connexion.php';
	include '../fonctions_requetes.php';
	$reponse=$bdd->query('Select MISSION_DATE_DEBUT,MISSION_DATE_CLOTURE,MISSION_ANNEE from tab_mission where MISSION_ID ='.$mission_id);
	$donnees=$reponse->fetch();
	$mission_debut=$donnees['MISSION_DATE_DEBUT'];
	$mission_fin=$donnees['MISSION_DATE_CLOTURE'];
	$mission_annee=$donnees['MISSION_ANNEE'];
	$mission_anneeN1=$mission_annee-1;
	
	$reponse2=$bdd->query('SELECT count(IMPORT_ID) AS COMPTE FROM tab_importer where IMPORT_CYCLE ="H- Paie et Personnel"');
	$donnees2=$reponse2->fetch();
	$a=$donnees2['COMPTE']; 
	//echo $a; 
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<link rel="stylesheet" type="text/css" href="css/ra_parcycle.css">
		<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>
		<style type="text/css">
			textarea{ font-size: 8pt;width: 80%;}
		</style>
		<script type="text/javascript">
		$(document).ready(function()
		{
			<?php
			if(conclusion_existante("paie", $mission_id)==true)
			{
			?>
			disable_boutons();
			<?php
			}
			?>
			$('#dv_synthese_paie').draggable();
			$('#dv_conclusion_paie').draggable();
		});
		function disable_boutons(){

			$("#enregistrer_page").attr("disabled", "disabled");
			$( "#bt_synthese_paie" ).addClass( "disabled" );
			$( "#bt_conclusion_paie" ).addClass( "disabled" );
			$( "#enregistrer_page" ).addClass( "disabled" );

			$("textarea").attr("disabled", "disabled");
			$("#bt_valider_conclusion_paie").attr("disabled", "disabled");
			$("#bt_valider_synthese_paie").attr("disabled", "disabled");
		}
		$(function()
		{
				$('#id_retour_paie').click(function(){
					$('#contenue').load('../RA/revue.php?mission_id='+<?php echo $mission_id; ?>);			
				});



				$('.form_upload').submit(function ( e ) {
					waiting();
					e.preventDefault();
					var formData = new FormData(this);
					console.log("Lasa ny form");
					console.log($(this).attr('action'));
					var fileInput = $(this).children(":first").toggleClass("file_Import_paie");
					var file = fileInput;
					console.log(file);
					formData.append('file_Import_paie', file);

					var xhr = new XMLHttpRequest();
					xhr.open('POST', this.getAttribute('action'), true);
					xhr.send(formData);
					$('#contenue').load('../RA/paie/paie.php?mission_id='+<?php echo $mission_id; ?>, function(){
						stopWaiting();
					});	
					return false;

				});

				$('#bt_synthese_paie').click(function(){
					$('#dv_synthese_paie').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/paie/fixationsynthesepaie.php',
						data:{mission_id:mission_id},
						success:function(e)
						{
							if(e.trim()!="") document.getElementById("txt_synthese_paie").value=e;
							else $("#txt_synthese_paie").attr("placeholder", "Redigez votre synthese ici");	
						}
					});
				});
				
				$("#id_annuler_synthese_paie").click(function(){
					$('#dv_synthese_paie').hide();
				
				});
		});
		
		$(function(){
				$('#bt_conclusion_paie').click(function(){

					
					$('#dv_conclusion_paie').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/paie/fixationconclusionpaie.php',
						data:{mission_id:mission_id},
						success:function(e){
							if(e.trim()!="") document.getElementById("txt_conclusion_paie").value=e;
							else $("#txt_conclusion_paie").attr("placeholder", "Redigez votre conclusion ici");	
						}
					});
				});
				
				$("#id_annuler_conclusion_paie").click(function(){
					$('#dv_conclusion_paie').hide();
				
				});
		});
		
		$(function(){
				$('#fermeture_synthese_paie').click(function(){
					$('#dv_synthese_paie').hide();
				});
		
				$('#fermeture_conclusion_paie').click(function(){
					$('#dv_conclusion_paie').hide();
				});
				$('.fermeture_import_paie').click(function(){
					$(this).parent().hide();
				});
		});
		function valider_synthese_paie(){
			var synthese_paie=document.getElementById('txt_synthese_paie').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/paie/validersynthesepaie.php',
				data:{synthese_paie:synthese_paie,mission_id:mission_id},
					success:function(e){
							$('#dv_synthese_paie').hide();
							$("#bt_synthese_paie").attr("class","disabled");
							$("#bt_synthese_paie").attr("disabled");
							
							$("#enregistrer_page").removeClass("disabled");
							$("#enregistrer_page").removeAttr("disabled");

						
							alert('Synth\350ses bien enregistr\351es');
					}
			});
		}
		 
		 function conclusion_paiepers(){
			var conclusion_paie=document.getElementById('txt_conclusion_paie').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/paie/conclusionpaie.php',
				data:{conclusion_paie:conclusion_paie,mission_id:mission_id},
					success:function(e)
					{
						
						$('#dv_conclusion_paie').hide();
						alert('Conclusions bien enregistr\351es');
						disable_boutons();
					}
			});
		 }
		function addcommentpaie(i)
		{
					var enregistrer_tableau_import1=$('#import_compteN'+i).val();
					var enregistrer_tableau_import2=$('#import_intituleN'+i).val();	
					var enregistrer_tableau_import3=$('#import_debitN'+i).val();	
					var enregistrer_tableau_import4=$('#import_creditN'+i).val();
					var enregistrer_tableau_import5=$('#import_soldeN'+i).val();	
					
					var enregistrer_tableau_import6=$('#import_soldeN1'+i).val();

					var enregistrer_tableau_import7=$('#import_variation'+i).val();	
					var enregistrer_tableau_import8=$('#pourcentages'+i).val();
		
					var enregistrer_tableau_import9=$('#commentpaie'+i).val();
					var mission_id=<?php echo $mission_id;?>;
			
					if(enregistrer_tableau_import9!="")
					{
							$.ajax({
									type:'POST',
									url:'RA/paie/tableaupaie.php',
									data:{a:enregistrer_tableau_import1,
									b:enregistrer_tableau_import2,
									c:enregistrer_tableau_import3,
									d:enregistrer_tableau_import4,
									e:enregistrer_tableau_import5,
									f:enregistrer_tableau_import6,
									g:enregistrer_tableau_import7,
									h:enregistrer_tableau_import8,
									i:enregistrer_tableau_import9,
									j:mission_id},
										success:function(e){
											 alert("Le commentaire a bien ete enregistre");
										
										}
							 });
					}
					else
					{
						alert("Veuillez remplir le commentaire");
					}
		}

		function addRenvoiepaie(id,compte){
			$('#id_renvoie_paie'+compte).show();
		}
		
		function enregistrer_tableau_paie()
		{
					
					var transferdata=$("#frm_Revuecyletab").serialize();
					$.ajax({
							type:'POST',
							url:'RA/paie/tableaupaie.php',
							data:transferdata,
								success:function(e)
								{
									 	
										$("#enregistrer_page").attr("class","disabled");
										$("#enregistrer_page").attr("disabled");
							
										$("#bt_conclusion_paie").removeClass("disabled");
										$("#bt_conclusion_paie").removeAttr("disabled");

										$('#progressbarRACycle').hide();


								}
					 });
			 
		}


		function  supprimer_tableau_paie(){
		var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/paie/supprPaie.php',
				data:{mission_id:mission_id},
					success:function(e){
							alert("Suppr"); 
					}
			 });	
		}
		
		$(function(){
			$('#enregistrer_page').click(function(){
			$('#progressbarRACycle').show();
			});
		});

		function fileSubmit(num){
			$('#id_renvoie_paie'+num).hide();
			if($("#paie_form_upload"+num+" > input").get(0).files.length !=0 ){
				$("#paie_form_upload"+num).submit();
			}
		}
		</script>
	</head>
	
	<body>
	<?php
		include '../../connexion.php';		
		
		$conclusionpaie=0;
		
		$reponse=$bdd->query('select CONCLUSION_RA_ID from  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="paie"');
		
		$donnees=$reponse->fetch();
		
		$conclusionpaie=$donnees['CONCLUSION_RA_ID'];	

	?>
	<table width="100%"  style="text-align:center;">
			<tr>
				<td height="50" bgcolor="#00698d"><center><label class="grand_Titre" style="color:white;">VERIFICATION DE LA VARIATION DU PAIE ET PERSONNEL</label></center></td>
			</tr>
			<tr>
				<td height="5" ><label style="color:black; font-size:16px;">Etapes a suivre</label></td>
			</tr>
			<tr>
				<td>
					<center>
						<ul style="list-style:none; text-align:left; width: 530px;padding: 0px;margin: 0px">
							<li style="display:inline-block">1-Rédiger les commentaires</li>
							<li style="display:inline-block">2-Synthèse</li>
							<li style="display:inline-block">3-Enregistrer</li>
							<li style="display:inline-block">4-Conclusion</li>

						</ul>
					</center>

				</td>
			</tr>
	</table>

	<div id="bt_milahatra" style="position:relative ; top:-40px">
			<input type="button" value="Retour" id="id_retour_paie" style="width:80"/>
			<input type="button" <?php if(conclusion_existante("paie", $mission_id)==true){echo " class='disabled' ";}?>  value="Synth&egrave;se" id="bt_synthese_paie" style="width:80">
			<input type="button" <?php ?>  class='disabled' name="btconclusion" value="Conclusion" id = "bt_conclusion_paie" style="width:80"/>
			<input type ="button" <?php if(conclusion_existante("paie", $mission_id)==true){echo "disabled class='disabled' ";}?> value = "Enregistrer" id="enregistrer_page" onclick="enregistrer_tableau_paie();" style="width:80;"/>
	</div>

	<label id = "dv_labelako" style = "position: relative; right: -64px;">P&eacute;riode allant du:<b><?php echo ' '.$mission_debut.' ';?></b> au<b> <?php echo ' '.$mission_fin;?></b> </label>
	
	<div id="" style="width:1200px; position:relative; top:-50px" >
		<table class="table_parcycle" style="width:1200px;">
			<tr class="reference">
				<td style="width:50px;border:0px"></td>
				<td width="150px" style="border:0px;"></td>
				<td width="150px" style="border:0px;"></td>
				<td width="150px" style="border:0px;"></td>
				<td width="150px" style="border:0px;" class="non_vide"><?php echo ' '.$mission_annee.' '?>{N}</td>
				<td width="150px" style="border:0px;" class="non_vide"><?php echo ' '.$mission_anneeN1.' '?>{N-1}</td>
				<td width="80px" style="border:0px;" class="non_vide" colspan="2">Variation {N-(N-1)}</td>
				<td width="200px" style="border:0px;"></td>
				<td width="70px" style="border:0px;"></td>
			</tr>
			<tr>
				<td class="entete" style="width:50px">Comptes</td>
				<td class="entete" width="150px" >Libéllés</td>
				<td class="entete" width="150px">Débits</td>
				<td class="entete" width="150px">Crédits</td>
				<td class="entete" width="150px">Soldes N</td>
				<td class="entete" width="150px">Soldes N-1</td>
				<td class="entete" width="150px">Variation</td>
				<td class="entete" width="80px">Pourcentage</td>
				<td class="entete" width="200px">Commentaires</td>
				<td class="entete" width="70px">Renvois</td>
			</tr>
		</table>
	</div>


	<div id="" style="overflow:auto;overflow-x:hidden;width:1210px;height:300px;position:relative; top:-50px" >
	<form id="frm_Revuecyletab" method="post">
		<table class="table_parcycle" width="1200px">
			<?php
				include '../../connexion.php';
				$com1=0;
				$numerodecompte=array();
				
				$reponse=remplir_tab_par_cycle('H- Paie et Personnel',$mission_id);
				
				while($donnees=$reponse->fetch()){
							$import_compteN=$donnees['COMPTE'];
							$import_intituleN=utf8_decode($donnees['INTITULE']);
							$import_debitN=$donnees['IMPORT_DEBIT'];
							$import_creditN=$donnees['IMPORT_CREDIT'];
							$import_soldeN=$donnees['IMPORT_SOLDE'];
							$import_soldeN1=$donnees['IMPORTN1_SOLDE'];
							//$import_anneeN=$donnees['IMPORT_CHOIX_ANNEE'];
							$import_variation=round($donnees['VARIATION'],2);
							if($import_variation=="") $import_variation=0;

							$numerodecompte=$donnees['IMPORT_ID'];
				
						$comp=count($import_soldeN1);
							for($i=0; $i<$comp; $i++){
							
							if($import_soldeN1==0){
							$pourcentages =0;
							}
							else {
							$pourcentages =round(($import_variation/$import_soldeN1)*100,2);
							}
		
			?> 
			<tr height="70" id="idBalGen<?php echo $com1;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
				<input type ="hidden" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
				
				<td style="width:50px"><?php echo $import_compteN;?> </td>
				<input type="hidden" name="import_compteN[]" class="import_compteN" id="import_compteN<?php echo $com1;?>" value="<?php echo $import_compteN;?>"/>
				
				<td width="150px" style="max-width:200px;"><?php echo $import_intituleN;?> </td>
				<input type="hidden" name="import_intituleN[]" class="import_intituleN" id="import_intituleN<?php echo $com1;?>" value="<?php echo $import_intituleN;?>"/>
				
				<td width="150px"><?php if(empty($import_debitN)){}else{echo number_format($import_debitN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_debitN[]" class="import_debitN" id="import_debitN<?php echo $com1;?>" value="<?php echo $import_debitN;?>"/>
				
				<td width="150px"><?php if(empty($import_creditN)){}else{echo number_format($import_creditN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_creditN[]" class="import_creditN" id="import_creditN<?php echo $com1;?>" value="<?php echo $import_creditN;?>"/>
				
				<td width="150px"><?php if(empty($import_soldeN)){}else{echo number_format($import_soldeN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_soldeN[]" class="import_soldeN" id="import_soldeN<?php echo $com1;?>" value="<?php echo $import_soldeN;?>"/>
				
				<td width="150px"><?php if(empty($import_soldeN1)){}else{echo number_format($import_soldeN1, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_soldeN1[]" class="import_soldeN1" id="import_soldeN1<?php echo $com1;?>" value="<?php echo $import_soldeN1;?>"/>
				
				<td width="150px"><?php if(empty($import_variation)){}else{echo number_format($import_variation, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_variation[]" class="import_variation" id="import_variation<?php echo $com1;?>" value="<?php echo $import_variation;?>"/>
				
				<td width="80px"><?php echo $pourcentages;?>%</td>
				<input type="hidden" name="pourcentages[]" class="pourcentages" id="pourcentages<?php echo $com1;?>" value="<?php echo $pourcentages;?>"/>
				
				<td width="200px">

					<textarea name="commentaire[]" cols="5" rows="4" <?php //if(conclusion_existante("paie", $mission_id)==true){echo "disabled class='disabled' ";}?> id="commentpaie<?php echo $com1?>"><?php echo afficherCommentaire($import_compteN, 'paie', $mission_id)?></textarea>
					
					<img src="../RA/image/add.jpg" style="cursor:pointer;" id="com1<?php echo $com1; ?>" onclick="addcommentpaie(<?php echo $com1;?>)" width="20" height="20"/>
				</td>
				<td width="70px">
					<?php
						
						include '../../connexion.php';
						
						$renvoielien="";
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="paie" AND IMPORT_ID='.$donnees['IMPORT_ID']);
					
						while($res=$reponse2->fetch()){
						$renvoielien=$res['RENVOIE_LIEN'];
						}		
					?>
					<?php echo '<a href="'.$renvoielien.'" target="_blank">'.$renvoielien.'</a>'; ?>
				
					<img src="RA/image/up.png" alt="upload" style="cursor:pointer;" id="btn<?php echo $com1;?>" onclick="addRenvoiepaie(this.id, <?php echo $com1;?>)"/></td>
			</tr>
			<td>
			<!-- first form in table is deleted so I created this -->
			<form class="created">
			</form>
			<div class="modal_upload" id="id_renvoie_paie<?php echo $com1;?>" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:100px;display:none">
				<form id="paie_form_upload<?php echo $com1;?>"  class="form_upload" method = "post" enctype="multipart/form-data" action = "RA/paie/importpaie.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $donnees['IMPORT_ID']; ?>">
					<input type = "file" required class = "file_Import_paie" name="file_Import_paie"/>
					<a onclick="fileSubmit(<?php echo $com1;?>)" class="btn default" style="top: 34px;position: relative;">Upload</a>
					<?php
						
						include '../../connexion.php';
						
						$renvoielien="";
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="paie" AND IMPORT_ID='.$donnees['IMPORT_ID']);
					
						while($res=$reponse2->fetch()){
						$renvoielien=$res['RENVOIE_LIEN'];
						}		
					?>
					<?php echo '<a href="'.$renvoielien.'" target="_blank">'.$renvoielien.'</a>'; ?>
				</form>
				<div class="fermeture_import_paie" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			</td>
			<?php
				}
					$com1++;
					}
			?>
		</table>

		</form>
		
</div>

<div id="centre_fond" align="center">
			<!-- ------------------------------------------------------------synthese---------------------------------- -->
		<div id="dv_synthese_paie" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
		<div id="dragg_c" class="td_Titre_Question"><br/>SYNTHESE</div>
		
		<table width="500" bgcolor="#00698d">
			<tr>
				<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_paie" cols="40" rows="20" ></textarea></td>
			</tr>
			<tr>
				<td align="center">
					<input type="button" id="bt_valider_synthese_paie" value="Enregistrer" class="bouton" onclick="valider_synthese_paie();" <?php //if($conclusionpaie!=0) echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
					<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_paie"/>
				</td>
			</tr>
		</table>

		<div id="fermeture_synthese_paie" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
	</div>
		</div>
		<!-- ------------------------------------------------------------conclusion---------------------------------------------- -->
		
		<div id="dv_conclusion_paie" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />CONCLUSION</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_conclusion_paie" cols="40" rows="20"></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="bt_valider_conclusion_paie" value="Valider" class="bouton" onclick="conclusion_paiepers();">&nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_conclusion_paie"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_conclusion_paie" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
		</div>
		<div id="progressbarRACycle" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/Loader.gif" /></center>
	</div>
	</body>
</html>