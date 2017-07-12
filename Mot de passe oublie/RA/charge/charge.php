<?php
	session_start();
	$_SESSION['objectif']='Charge';
	// $mission_id=@$_GET['mission_id'];
	$mission_id=$_SESSION['idMission'];
	
	include '../../connexion.php';
	$reponse=$bdd->query('Select MISSION_DATE_DEBUT,MISSION_DATE_CLOTURE,MISSION_ANNEE from tab_mission where MISSION_ID ='.$mission_id);
	$donnees=$reponse->fetch();
	$mission_debut=$donnees['MISSION_DATE_DEBUT'];
	$mission_fin=$donnees['MISSION_DATE_CLOTURE'];
	$mission_annee=$donnees['MISSION_ANNEE'];
	$mission_anneeN1=$mission_annee-1;
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			// Formulaire draggable
			$('#dv_synthese_charge').draggable();
			$('#dv_conclusion_charge').draggable();
		});
		$(function(){
				$('#id_retour_charge').click(function(){
					$('#contenue').load('../RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
				});
		});
		
		$(function(){
				$('#bt_synthese_charge').click(function(){
					$('#dv_synthese_charge').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/charge/fixationsynthesecharge.php',
						data:{mission_id:mission_id},
						success:function(e){
							//alert(e);
							document.getElementById("txt_synthese_charge").value=e;
						}
					});
				});
				
				$("#id_annuler_synthese_charge").click(function(){
					$('#dv_synthese_charge').hide();
				
				});
		});
		
		$(function(){
				$('#bt_conclusion_charge').click(function(){
					$('#dv_conclusion_charge').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/charge/fixationconclusioncharge.php',
						data:{mission_id:mission_id},
						success:function(e){
							document.getElementById("txt_conclusion_charge").value=e;
						}
					});
				});
				
				$("#id_annuler_conclusion_charge").click(function(){
					$('#dv_conclusion_charge').hide();
				
				});
		});
		
		$(function(){
				$('#fermeture_synthese_charge').click(function(){
					$('#dv_synthese_charge').hide();
				});
		
				$('#fermeture_conclusion_charge').click(function(){
					$('#dv_conclusion_charge').hide();
				});
				$('#fermeture_import_charge').click(function(){
					$('#id_renvoie_charge').hide();
				});
		});
		function valider_synthese_charge(){
			//alert("manakory");
			var synthese_charge=document.getElementById('txt_synthese_charge').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/charge/validersynthesecharge.php',
				data:{synthese_charge:synthese_charge,mission_id:mission_id},
					success:function(e){
						$('#dv_synthese_charge').hide();
						// $("#contenue").html(e);
						//alert(e);
						alert('Synth\350ses bien enregistr\351es');
						// $('#contenue').load('RA/charge/charge.php?mission_id='+<?php echo $mission_id; ?>);	
					}
			});
		}
		 
		 function conclusion_charge(){
			var conclusion_charge=document.getElementById('txt_conclusion_charge').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/charge/conclusioncharge.php',
				data:{conclusion_charge:conclusion_charge,mission_id:mission_id},
					success:function(e){
						$("#contenue").html(e);
						alert('Conclusions bien enregistr\351es');
						$('#contenue').load('RA/charge/charge.php?mission_id='+<?php echo $mission_id; ?>);	
					}
			});
		 }
		function addcommentcharge(id, numerocompte, compte){
			var comment_charge=$('#commentcharge'+compte).val();
			var mission_id=<?php echo $mission_id;?>;
			if(comment_charge!=""){
				$.ajax({
					type:'POST',
					url:'RA/charge/commentairecharge.php',
					data:{numerocompte:numerocompte, mission_id:mission_id , comment_charge:comment_charge, objectif:'charge},
					success:function(){
						alert("Commentaire bien enregistr\351"); 
					}
				});
			}
			else{
				alert("Veuillez remplir le commentaire");
			}
		}
		function addRenvoiecharge(id,compte){
			$('#id_renvoie_charge').show();
			// alert(compte);
		}
		
		function enregistrer_tableau_charge(){
			var i = 0;
				for(i=0;i<18;i++){
					var enregistrer_tableau_import1=$('#import1'+i).val();
					var enregistrer_tableau_import2=$('#import2'+i).val();	
					var enregistrer_tableau_import3=$('#import3'+i).val();	
					var enregistrer_tableau_import4=$('#import4'+i).val();
					
					var enregistrer_tableau_import5=$('#soldefinaldebit'+i).val();	
					alert(enregistrer_tableau_import5);
					var enregistrer_tableau_import6=$('#soldefinalcredit'+i).val();

					var enregistrer_tableau_import7=$('#soldedebitN1'+i).val();	
					var enregistrer_tableau_import8=$('#soldecreditN1'+i).val();
		
					var enregistrer_tableau_import9=$('#soldeVariationDebitFin'+i).val();
					var enregistrer_tableau_import10=$('#soldeVariationCreditFin'+i).val();	
					var enregistrer_tableau_import11=$('#pourcentagedebitfin'+i).val();	
					var enregistrer_tableau_import12=$('#pourcentagecreditfin'+i).val();
					var enregistrer_tableau_import13=$('#commentcharge'+i).val();
					
					var mission_id=<?php echo $mission_id;?>
					
					$.ajax({
							type:'POST',
							url:'RA/charge/tableaucharge.php',
							data:{a:enregistrer_tableau_import1,
							b:enregistrer_tableau_import2,
							c:enregistrer_tableau_import3,
							d:enregistrer_tableau_import4,
							e:enregistrer_tableau_import5,
							f:enregistrer_tableau_import6,
							g:enregistrer_tableau_import7,
							h:enregistrer_tableau_import8,
							i:enregistrer_tableau_import9,
							j:enregistrer_tableau_import10,
							k:enregistrer_tableau_import11,
							l:enregistrer_tableau_import12,
							m:enregistrer_tableau_import13,
							n:mission_id},
								success:function(e){
									 alert('Chardes bien enregistr\351s');	
								
								}
					 });
				}
			 $('#contenue').load('/RA/revue.php?mission_id='+<?php echo $mission_id; ?>);
		}
		
		</script>
	</head>
	
	<body>
	<?php
		include '../../connexion.php';		
		
		$conclusioncharge=0;
		
		$reponse=$bdd->query('select CONCLUSION_RA_ID from  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="charge"');
		
		$donnees=$reponse->fetch();
		
		$conclusioncharge=$donnees['CONCLUSION_RA_ID'];	

	?>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
			<tr>
				<td><center><label class="grand_Titre" style="color:white;">VERIFICATION DE LA VARIATION DES CHARGES FOURNISSEURS</label></center></td>
			</tr>
	</table>
		<div id="bt_milahatra">
			<input type="button" value="Retour" id="id_retour_charge" style="width:80"/>
			<input type="button" value="Synth&egrave;se" id="bt_synthese_charge" style="width:80">
			<input type="button" name="btconclusion" value="Conclusion" id = "bt_conclusion_charge" style="width:80"/>
			<input type ="button" value = "Enregistrer" onclick="enregistrer_tableau_charge();" style="width:80;"/>
		</div><br/>
			<label id = "dv_labelako">P&eacute;riode du:<b><?php echo ' '.$mission_debut.' ';?></b> au<b> <?php echo ' '.$mission_fin;?></b> </label><br/>
			<br /><br /><br />
		
		<label style="position:relative;left:50px;"><?php echo ' '.$mission_annee.' '?>{N}</label>
		<label style="position:relative;left:200px;"><?php echo ' '.$mission_anneeN1.' '?>{N-1}</label>
		<label style="position:relative;left:300px;">Variation {N-(N-1)}</label>
	<div id="">
	<div id="" style="float:left;width:490px;height:500px;">
		<table border="1" width="490"">
			<tr height="70">
				<td width="50" style="background-color:white;">Comptes</td>
				<td width="200" style="background-color:white;">Lib&eacute;ll&eacute;s</td>
				<td width="80" style="background-color:white;">D&eacute;bits</td>
				<td width="80" style="background-color:white;">Cr&eacute;dits</td>
				<td width="80" style="background-color:white;">SoldesN</td>
			</tr>
			<?php
				include '../../connexion.php';
				$com1=0;
				$numerodecompte='';
				$reponse=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE FROM  tab_importer where IMPORT_CYCLE = "F- Charges fournisseurs" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
				
				while($donnees=$reponse->fetch()){
							$import1=$donnees['IMPORT_COMPTES'];
							$import2=$donnees['IMPORT_INTITULES'];
							$import3=$donnees['IMPORT_DEBIT'];
							$import4=$donnees['IMPORT_CREDIT'];
							$importS=$donnees['IMPORT_SOLDE'];
					
				$numerodecompte=$numerodecompte.'*'.$donnees['IMPORT_ID'];
			?>
			<tr height="70" id="idBalGen<?php echo $com1;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
				<input type ="text" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
				
				<td width="50"><?php echo $import1;?> </td>
				<input type="text" id="import1<?php echo $com1;?>" value="<?php echo $import1;?>" style="display:none;"/>
				
				<td width="200"><?php echo $import2;?> </td>
				<input type="text" id="import2<?php echo $com1;?>" value="<?php echo $import2;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import3; ?></td>
				<input type="text" id="import3<?php echo $com1;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import4;?></td>
				<input type="text" id="import4<?php echo $com1;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				
				<td width="80"><?php echo $importS;?></td>
				<input type="text" id="importS<?php echo $com1;?>" value="<?php echo $importS;?>" style="display:none;"/>
				
			</tr>
			<?php
			$com1++;
				}
			?>
		</table>
	</div>
	<div id="" style="float:left;width:100px;height:500px;">
		<table border="1" width="70%">
			<tr height="70">
				<td width="100" style="background-color:white;">SoldesN1</td>
			</tr>
			<?php
				$reponse1=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE FROM  tab_importer where IMPORT_CYCLE = "F- Charges fournisseurs" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N-1"');
				$com2=0;
		
				$pourcentageN1='';
				
				while($donnees1=$reponse1->fetch()){
				$importS1=$donnees1['IMPORT_SOLDE'];
				
			?>
			<tr height="70" id="idBalGen<?php echo $com2;?>" onclick="makaid(<?php echo $donnees1['IMPORT_ID'];?>)" value="<?php echo $donnees1['IMPORT_ID'];?>">
			
				<td width="70"><?php echo $importS1;?></td>
				<input type="text" id="soldedebitN1<?php echo $com2;?>" value="<?php echo $importS1;?>" style="display:none;"/>
				
				<?php 
					$pourcentageN1=$pourcentageN1.'*'.$importS1; 
									
				?>
			</tr>
			<?php
				$com2++;
				}
			?>
		</table>	
	</div>
		<input type="text" value="<?php echo $importS;?>" style="display:none;" />
		<input type="text" value="<?php echo $importS1;?>" style="display:none;" />
		
	<div id="" style="float:right;width:160px;height:500px;position:absolute;top:-220px;left:750px;" />
		<table border="1">
			<tr height="70">
	
				<td style="background-color:white;">Variation</td>
				<td style="background-color:white;">%</td>
				<td style="background-color:white;">Commentaires</td>
				<td style="background-color:white;">Renvoies</td>
			</tr>
			<?php
				$com3=0;
		
				$soldeVariationN=explode('*',$importS);
				$soldeVariationN1=explode('*',$importS1);
	
				$pourcentage=explode('*',$pourcentageN1);
				
				$numerodecomptefin=explode('*',$numerodecompte);
	
				for($i=1; $i<count($soldeVariationN1); $i++){
				$soldeVariationFin=$soldeVariationN[$i]-$soldeVariationN1[$i];
				
				//REPONSE POURCENTAGE
				 if($importS==0){
					$pourcentagefin=0;
				 }
				 else $pourcentagefin=$soldeVariationFin/$importS[$i];
				 
			?>
			<tr height="70" id="idBalGen<?php echo $com3;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
			
				<td width="80"><?php echo $soldeVariationFin;?></td>
				<input type="text" id="soldeVariationFin<?php echo $com3;?>" value="<?php echo $soldeVariationFin;?>" style="display:none;"/>
				
				<td width="80"><?php echo $pourcentagefin;?></td>
				<input type="text" id="pourcentagefin<?php echo $com3;?>" value="<?php echo $pourcentagefin;?>" style="display:none;"/>
				
				<td width="90">
					<textarea cols="5" rows="1" id="commentcharge<?php echo $com3?>"></textarea>
					<img src="../RA/image/add.jpg" id="com3<?php echo $com3; ?>" onclick="addcommentcharge(this.id,<?php echo $numerodecomptefin[$i];?>,<?php echo $com3;?>)" width="20" height="20"/>
				</td>
				<td width="90"><input type="button" id="btn<?php echo $com3;?>" onclick="addRenvoiecharge(this.id, <?php echo $com3;?>)" value="ok" /></td>
			</tr>
			
			<div id="id_renvoie_charge" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:200px;display:none">
				<form method = "post" enctype="multipart/form-data" action = "RA/charge/importcharge.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $numerodecomptefin[$i]; ?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_charge" name = "file_Import_charge"/>
					<input type="submit" name="Importercharge" value="Upload" id = "id_Importercharge"/>
					<?php
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="charge" AND IMPORT_ID='.$numerodecomptefin[$i]);					
						$renvoielien='';
						while($donnees2=$reponse2->fetch()){
							$renvoielien=$donnees2['RENVOIE_LIEN'];
						}
					?>
					<a href="" ><?php echo $renvoielien;?></a>
				</form>
				<div id="fermeture_import_charge" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			<?php
				$com3++;
				}
			?>
		</table>
</div>

<div id="centre_charge" align="center">
			<!------------------------------------------------------------synthese----------------------------------------------->
		<div id="dv_synthese_charge" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
		<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
		<table width="500" bgcolor="#00698d">
				<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_charge" cols="40" rows="20"  ></textarea>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="button" id="bt_valider_synthese_charge" value="Enregistrer" class="bouton" onclick="valider_synthese_charge();"/>&nbsp;&nbsp;&nbsp;
					<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_charge"/>
				</td>
			</tr>
		</table>
		<div id="fermeture_synthese_charge" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
	</div>
		</div>
		<!------------------------------------------------------------conclusion----------------------------------------------->
		
		<div id="dv_conclusion_charge" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />CONCLUSION</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_conclusion_charge" cols="40" 
					rows="20" <?php// if($conclusionimmo!=0) echo 'disabled'; ?>></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="bt_valider_conclusion_charge" value="Valider" class="bouton" 
						onclick="conclusion_charge();"  <?php// if($conclusioncharge!=0) echo 'disabled'; ?>>&nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_conclusion_charge"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_conclusion_charge" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
		</div>

	</body>
</html>