<?php
	session_start();
	$_SESSION['objectif']='Impots et taxes';
	// $mission_id=@$_GET['mission_id'];
	$mission_id=$_SESSION['idMission'];
	
	include '../../connexion.php';
	$reponse=$bdd->query('Select MISSION_DATE_DEBUT,MISSION_DATE_CLOTURE,MISSION_ANNEE from tab_mission where MISSION_ID ='.$mission_id);
	$donnees=$reponse->fetch();
	$mission_debut=$donnees['MISSION_DATE_DEBUT'];
	$mission_fin=$donnees['MISSION_DATE_CLOTURE'];
	$mission_annee=$donnees['MISSION_ANNEE'];
	$mission_anneeN1=$mission_annee-1;
	
	$reponse2=$bdd->query('SELECT count(IMPORT_ID) AS COMPTE FROM tab_importer where IMPORT_CYCLE ="I- Imp&ocirc;ts et taxes"');
	$donnees2=$reponse2->fetch();
	$a=$donnees2['COMPTE']; 
	//echo $a;
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<link rel="stylesheet" type="text/css" href="css/ra_parcycle.css">
		<style type="text/css">
			textarea{ font-size: 8pt;width: 80%;}
		</style>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			// Formulaire draggable
			$('#dv_synthese_impot').draggable();
			$('#dv_conclusion_impot').draggable();
		});
		$(function(){
				$('#id_retour_impot').click(function(){
					waiting();$('#contenue').load('../RA/index.php?mission_id='+<?php echo $mission_id; ?>,stopWaiting);			
				});
		});
		
		$(function(){
				$('#bt_synthese_impot').click(function(){
					$('#dv_synthese_impot').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/impot/fixationsyntheseimpot.php',
						data:{mission_id:mission_id},
						success:function(e){
							//alert(e);
							document.getElementById("txt_synthese_impot").value=e;
						}
					});
				});
				
				$("#id_annuler_synthese_impot").click(function(){
					$('#dv_synthese_impot').hide();
				
				});
		});
		
		$(function(){
				$('#bt_conclusion_impot').click(function(){
					$('#dv_conclusion_impot').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/impot/fixationconclusionimpot.php',
						data:{mission_id:mission_id},
						success:function(e){
							document.getElementById("txt_conclusion_impot").value=e;
						}
					});
				});
				
				$("#id_annuler_conclusion_impot").click(function(){
					$('#dv_conclusion_impot').hide();
				
				});
		});
		
		$(function(){
				$('#fermeture_synthese_impot').click(function(){
					$('#dv_synthese_impot').hide();
				});
		
				$('#fermeture_conclusion_impot').click(function(){
					$('#dv_conclusion_impot').hide();
				});
				$('#fermeture_import_impot').click(function(){
					$('#id_renvoie_impot').hide();
				});
		});
		function valider_synthese_impot(){
			//alert("manakory");
			var synthese_impot=document.getElementById('txt_synthese_impot').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/impot/validersyntheseimpot.php',
				data:{synthese_impot:synthese_impot,mission_id:mission_id},
					success:function(e){
						$('#dv_synthese_impot').hide();
						// $("#contenue").html(e);
						//alert(e);
						alert('Synth\350ses bien enregistr\351es');
						// waiting();$('#contenue').load('RA/impot/impot.php?mission_id='+<?php echo $mission_id; ?>,stopWaiting);	
					}
			});
		}
		 
		 function conclusion_impot1(){
			var conclusion_impot=document.getElementById('txt_conclusion_impot').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/impot/conclusionimpot.php',
				data:{conclusion_impot:conclusion_impot,mission_id:mission_id},
					success:function(e){
						$("#contenue").html(e);
						alert('Conclusions bien enregistr\351es');
						waiting();$('#contenue').load('RA/impot/impot.php?mission_id='+<?php echo $mission_id; ?>,stopWaiting);	
					}
			});
		 }
		function addcommentimpot(id, numerocompte, compte){
			var comment_impot=$('#commentimpot'+compte).val();
			var mission_id=<?php echo $mission_id;?>;
			if(comment_impot!=""){
				$.ajax({
					type:'POST',
					url:'RA/impot/commentaireimpot.php',
					data:{numerocompte:numerocompte, mission_id:mission_id , comment_impot:comment_impot, objectif:'impot'},
					success:function(){
						alert("Commentaire bien enregistr\351"); 
					}
				});
			}
			else{
				alert("Veuillez remplir le commentaire");
			}
		}
		function addRenvoieimpot(id,compte){
			$('#id_renvoie_impot').show();
			// alert(compte);
		}
		
		function enregistrer_tableau_impot(){
			var i = 0;
				for(i=0;i<<?php echo $a;?>;i++){
					var enregistrer_tableau_import1=$('#import1'+i).val();
					var enregistrer_tableau_import2=$('#import2'+i).val();	
					var enregistrer_tableau_import3=$('#import3'+i).val();	
					var enregistrer_tableau_import4=$('#import4'+i).val();
					var enregistrer_tableau_import5=$('#soldefinaldebit'+i).val();	
					var enregistrer_tableau_import6=$('#soldefinalcredit'+i).val();

					var enregistrer_tableau_import7=$('#soldedebitN1'+i).val();	
					var enregistrer_tableau_import8=$('#soldecreditN1'+i).val();
		
					var enregistrer_tableau_import9=$('#soldeVariationDebitFin'+i).val();
					var enregistrer_tableau_import10=$('#soldeVariationCreditFin'+i).val();	
					var enregistrer_tableau_import11=$('#pourcentagedebitfin'+i).val();	
					var enregistrer_tableau_import12=$('#pourcentagecreditfin'+i).val();
					var enregistrer_tableau_import13=$('#commentimpot'+i).val();
					
					var mission_id=<?php echo $mission_id;?>
					
					$.ajax({
							type:'POST',
							url:'RA/impot/tableauimpot.php',
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
									 //alert('Impots et taxes bien enregistr\351s');
								
								}
					 });
				}
			 waiting();$('#contenue').load('/RA/revue.php?mission_id='+<?php echo $mission_id; ?>,stopWaiting);
		}
		$(function(){
			$('#enregistrer_page').click(function(){
			$('#progressbarRACycle').show();
		});
		});
		</script>
	</head>
	
	<body>
	<?php
		include '../../connexion.php';		
		
		$conclusionimpot=0;
		
		$reponse=$bdd->query('select CONCLUSION_RA_ID from  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="impot"');
		
		$donnees=$reponse->fetch();
		
		$conclusiondcdivers=$donnees['CONCLUSION_RA_ID'];	

	?>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
			<tr>
				<td><center><label class="grand_Titre" style="color:white;">VERIFICATION DE LA VARIATION DES IMPOTS ET TAXES</label></center></td>
			</tr>
	</table>
		<div id="bt_milahatra">
			<input type="button" value="Retour" id="id_retour_impot" style="width:80"/>
			<input type="button" value="Synth&egrave;se" id="bt_synthese_impot" style="width:80">
			<input type="button" name="btconclusion" value="Conclusion" id = "bt_conclusion_impot" style="width:80"/>
			<input type ="button" value = "Enregistrer" id="enregistrer_page" onclick="enregistrer_tableau_impot();" style="width:80;"/>
		</div><br/>
			<label id = "dv_labelako">P&eacute;riode du:<b><?php echo ' '.$mission_debut.' ';?></b> au<b> <?php echo ' '.$mission_fin;?></b> </label>
	<div id="" style="width:1200px;" >
		<table class="table_parcycle" style="width:1200px;">
			<tr class="reference">
				<td width="100px" style="border:0px;"></td>
				<td width="200px" style="border:0px;"></td>
				<td width="100px" style="border:0px;"></td>
				<td width="100px" style="border:0px;"></td>
				<td width="100px" style="border:0px;" class="non_vide"><?php echo ' '.$mission_annee.' '?>{N}</td>
				<td width="100px" style="border:0px;" class="non_vide"><?php echo ' '.$mission_anneeN1.' '?>{N-1}</td>
				<td width="200px" style="border:0px;" class="non_vide" colspan="2">Variation {N-(N-1)}</td>
				<td width="200px" style="border:0px;"></td>
				<td width="100px" style="border:0px;"></td>
			</tr>
			<tr>
				<td class="entete" width="100px">Comptes</td>
				<td class="entete" width="200px">Libéllés</td>
				<td class="entete" width="100px">Débits</td>
				<td class="entete" width="100px">Crédits</td>
				<td class="entete" width="100px">Soldes N</td>
				<td class="entete" width="100px">Soldes N-1</td>
				<td class="entete" width="100px">Variation</td>
				<td class="entete" width="100px">Pourcentage</td>
				<td class="entete" width="200px">Commentaires</td>
				<td class="entete" width="100px">Renvoies</td>
			</tr>
		</table>
	</div>
	<div id="" style="overflow:auto;width:1200px;height:350px;" >
		<table class="table_parcycle" width="600px">
			<?php
				include '../../connexion.php';
				$com1=0;
				$soldedebitN='';
				$soldecreditN='';
				$soldefinalcredit=0;
				$soldefinaldebit=0;
				$numerodecompte='';
				// $reponse=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE 
				// FROM  tab_importer 
				// where IMPORT_COMPTES like "4%" AND IMPORT_COMPTES not like "40%" AND IMPORT_COMPTES not like "41%" AND IMPORT_COMPTES not like "42%" AND IMPORT_COMPTES not like "43%" AND IMPORT_COMPTES not like "44%" AND IMPORT_COMPTES not like "48%" AND IMPORT_COMPTES not like "49%" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
				
				
				$reponse=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE 
				FROM  tab_importer 
				where IMPORT_CYCLE="I- Imp&ocirc;ts et taxes" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
				
				
				while($donnees=$reponse->fetch()){	
						$import1=$donnees['IMPORT_COMPTES'];
						$import2=$donnees['IMPORT_INTITULES'];
						$import3=$donnees['IMPORT_DEBIT'];
						$import4=$donnees['IMPORT_CREDIT'];
						$soldeDC= $donnees['IMPORT_DEBIT']-$donnees['IMPORT_CREDIT'];
					if($donnees['IMPORT_SOLDE']<0){
						$soldefinalcredit=$donnees['IMPORT_SOLDE'];
						$soldefinaldebit=0;
						$soldedebitN=$soldedebitN.'*'.$soldefinaldebit;
						$soldecreditN=$soldecreditN.'*'.$soldefinalcredit;
					}
					else{
						$soldefinalcredit=0;
						$soldefinaldebit=$donnees['IMPORT_SOLDE'];
						$soldedebitN=$soldedebitN.'*'.$soldefinaldebit;
						$soldecreditN=$soldecreditN.'*'.$soldefinalcredit;
					}
					$numerodecompte=$numerodecompte.'*'.$donnees['IMPORT_ID'];
			?>
			<tr height="70" id="idBalGen<?php echo $com1;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
				<input type ="text" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
				
				<td width="100px"><?php echo $import1;?> </td>
				<input type="text" id="import1<?php echo $com1;?>" value="<?php echo $import1;?>" style="display:none;"/>
				
				<td width="200px" style="max-width:200px;"><?php echo $import2;?> </td>
				<input type="text" id="import2<?php echo $com1;?>" value="<?php echo $import2;?>" style="display:none;"/>
				
				<td width="100px"><?php echo $import3; ?></td>
				<input type="text" id="import3<?php echo $com1;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="100px"><?php echo $import4;?></td>
				<input type="text" id="import4<?php echo $com1;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				
				<td width="100px"><?php echo $soldeDC;?></td>
				<input type="text" id="soldefinaldebit<?php echo $com1;?>" value="<?php echo $soldefinaldebit;?>" style="display:none;"/>
				<input type="text" id="soldefinalcredit<?php echo $com1;?>" value="<?php echo $soldefinalcredit;?>" style="display:none;"/>
			</tr>
			<?php
			$com1++;
				}
			?>
		</table>
		<table  class="table_parcycle" width="100px">
			<?php
				$reponse1=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE 
				FROM  tab_importer 
				where IMPORT_CYCLE="I- Imp&ocirc;ts et taxes" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N-1"');
				$com2=0;
				$soldedebit='';
				$soldecredit='';
				$soldedebitN1=0;
				$soldecreditN1=0;
				$pourcentagedebitN1='';
				$pourcentagecreditN1='';
				while($donnees1=$reponse1->fetch()){
				if($donnees1['IMPORT_SOLDE']<0){
					$soldedebitN1=0;
					$soldecreditN1=$donnees1['IMPORT_SOLDE'];
					$soldedebit=$soldedebit.'*'.$soldedebitN1;
					$soldecredit=$soldecredit.'*'.$soldecreditN1;
				}
				else{
					$soldedebitN1=$donnees1['IMPORT_SOLDE'];
					$soldecreditN1=0;
					$soldedebit=$soldedebit.'*'.$soldedebitN1;
					$soldecredit=$soldecredit.'*'.$soldecreditN1;
				}
				$soldeCDN1 = $soldedebitN1 - $soldecreditN1;
			?>
			<tr height="70" id="idBalGen<?php echo $com2;?>" onclick="makaid(<?php echo $donnees1['IMPORT_ID'];?>)" value="<?php echo $donnees1['IMPORT_ID'];?>">
			
			
				<td width="100px"><?php echo $soldeCDN1;?></td>
				<input type="text" id="soldedebitN1<?php echo $com2;?>" value="<?php echo $soldedebitN1;?>" style="display:none;"/>
				<input type="text" id="soldecreditN1<?php echo $com2;?>" value="<?php echo $soldecreditN1;?>" style="display:none;"/>
				
				<?php 
					$pourcentagedebitN1=$pourcentagedebitN1.'*'.$soldedebitN1; 
					$pourcentagecreditN1=$pourcentagecreditN1.'*'.$soldecreditN1;				
				?>
			</tr>
			<?php
				$com2++;
				}
			?>
		</table>	
			<input type="text" value="<?php echo $soldedebitN;?>" style="display:none;" />
			<input type="text" value="<?php echo $soldecreditN;?>" style="display:none;" />
			<input type="text" value="<?php echo $soldedebit;?>" style="display:none;" />
			<input type="text" value="<?php echo $soldecredit;?>" style="display:none;" />
		<table  class="table_parcycle" width="482px">
			<?php
			
				// $tabsoldecompN1=(explode('*',$numcomp1));
				$com3=0;
				$soldeVariationdebitN=explode('*',$soldedebitN);
				$soldeVariationcreditN=explode('*',$soldecreditN);
				$soldeVariationdebitN1=explode('*',$soldedebit);
				$soldeVariationcreditN1=explode('*',$soldecredit);
				
				$pourcentagedebit=explode('*',$pourcentagedebitN1);
				$pourcentagecredit=explode('*',$pourcentagecreditN1);
				
				$numerodecomptefin=explode('*',$numerodecompte);
								
				$com=0;
				for($i=1; $i<count($soldeVariationcreditN1); $i++){
				$soldeVariationDebitFin=$soldeVariationdebitN[$i]-$soldeVariationdebitN1[$i];
				$soldeVariationCreditFin=$soldeVariationcreditN[$i]-$soldeVariationcreditN1[$i];
				
				//REPONSE POURCENTAGE
				 
				 if($soldedebit==0){
					$pourcentagedebitfin=0;
				 }
				 else $pourcentagedebitfin=$soldeVariationDebitFin/$soldedebit[$i];
				 
				 if($soldecredit==0){
					$pourcentagecreditfin=0;
				 }
				else $pourcentagecreditfin=$soldeVariationCreditFin/$soldecredit[$i];

				$variations = ($soldeVariationDebitFin-$soldeVariationCreditFin);
				$poucentages = ($pourcentagedebitfin+$pourcentagecreditfin)/2;
			?>
			<tr height="70" id="idBalGen<?php echo $com3;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
			
				<td width="100px"><?php echo $variations;?></td>
				<input type="text" id="soldeVariationDebitFin<?php echo $com3;?>" value="<?php echo $soldeVariationDebitFin;?>" style="display:none;"/>
				<input type="text" id="soldeVariationCreditFin<?php echo $com3;?>" value="<?php echo $soldeVariationCreditFin;?>" style="display:none;"/>
				
				<td width="100px"><?php echo $poucentages;?></td>
				<input type="text" id="pourcentagedebitfin<?php echo $com3;?>" value="<?php echo $pourcentagedebitfin;?>" style="display:none;"/>
				<input type="text" id="pourcentagecreditfin<?php echo $com3;?>" value="<?php echo $pourcentagecreditfin;?>" style="display:none;"/>
				<td width="200px">
					<textarea cols="5" rows="1" id="commentimpot<?php echo $com3 ?>"></textarea>
					<img src="../RA/image/add.jpg" id="com3<?php echo $com3; ?>" onclick="addcommentimpot(this.id,<?php echo $numerodecomptefin[$i]; ?>,<?php echo $com;?>)" width="20" height="20"/>
				</td>
				<td width="100px"><input type="button" id="btn<?php echo $com3;?>" onclick="addRenvoieimpot(this.id, <?php echo $com3;?>)" value="ok" /></td>
			</tr>
			
			<div id="id_renvoie_impot" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:100px;display:none">
				<form method = "post" enctype="multipart/form-data" action = "RA/impot/importimpot.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $numerodecomptefin[$i]; ?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_impot" name = "file_Import_impot"/>
					<input type="submit" name="Importerimpot" value="Upload" id = "id_Importerimpot"/>
					<?php
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="impot" AND IMPORT_ID='.$numerodecomptefin[$i]);					
						$renvoielien='';
						while($donnees2=$reponse2->fetch()){
							$renvoielien=$donnees2['RENVOIE_LIEN'];
						}
					?>
					<a href="" ><?php echo $renvoielien;?></a>
				</form>
				<div id="fermeture_import_impot" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			<?php
				$com3++;
				}
			?>
		</table>
	</div>
	
</div>

<div id="centre_impot" align="center">
			<!------------------------------------------------------------synthese----------------------------------------------->
		<div id="dv_synthese_impot" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
		<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
		<table width="500" bgcolor="#00698d">
				<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_impot" cols="40" rows="20" <?php// if($conclusionimpot!=0) echo 'disabled'; ?> ></textarea>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="button" id="bt_valider_synthese_impot" value="Enregistrer" class="bouton" onclick="valider_synthese_impot();" <?php //if($conclusionimpot!=0) echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
					<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_impot"/>
				</td>
			</tr>
		</table>
		<div id="fermeture_synthese_impot" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
	</div>
		</div>
		<!------------------------------------------------------------conclusion----------------------------------------------->
		
		<div id="dv_conclusion_impot" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />CONCLUSION</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_conclusion_impot" cols="40" rows="20" <?php// if($conclusionimpot!=0) echo 'disabled'; ?>></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="bt_valider_conclusion_impot" value="Valider" class="bouton" onclick="conclusion_impot1();">&nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_conclusion_impot"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_conclusion_impot" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
		</div>
		<div id="progressbarRACycle" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
	</div>
	</body>
</html>