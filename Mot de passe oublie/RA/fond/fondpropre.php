<?php
	session_start();
	$_SESSION['objectif']='Fond propre';
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
		$('#synthese_fond').draggable();
		$('#dv_conclusion_fond').draggable();
		
		});
		$(function(){
				$('#bt_retour_fond').click(function(){
					$('#contenue').load('../RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
				});
		});
		
		$(function(){
				$('#bt_synthese_fond').click(function(){
					$('#synthese_fond').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/fond/fixationsynthesefond.php',
						data:{mission_id:mission_id},
						success:function(e){
							//alert(e);
							document.getElementById("txt_synthese_fond").value=e;
						}
					});
				});
				
				$("#id_annuler_synthese_fond").click(function(){
					$('#synthese_fond').hide();
				
				});
		});
		
		$(function(){
				$('#bt_conclusion_fond').click(function(){
					$('#dv_conclusion_fond').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/fond/fixationconclusionfond.php',
						data:{mission_id:mission_id},
						success:function(e){
							document.getElementById("txt_conclusion_fond").value=e;
						}
					});
				});
				
				$("#id_annuler_conclusion_fond").click(function(){
					//$("#txt_conclusion_fond").val(" ");
					$('#dv_conclusion_fond').hide();
				
				});
		});
		
		$(function(){
				$('#fermeture_synthese_fond_propre').click(function(){
					$('#synthese_fond').hide();
				});
		});
		
		$(function(){
				$('#fermeture_conclusion_fond_propre').click(function(){
					$('#dv_conclusion_fond').hide();
				});
		});
		$('#fermeture_import_fond').click(function(){
					$('#id_renvoie_fond').hide();
				});
		
		
		function valider_synthese_fond(){
			//alert("manakory");
			var synthese_fond=document.getElementById('txt_synthese_fond').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/fond/validersynthesefond.php',
				data:{synthese_fond:synthese_fond,mission_id:mission_id},
					success:function(e){
						$('#synthese_fond').hide();
						// $("#contenue").html(e);
						alert('Synthèses bien enregistrées');
						//$('#contenue').load('RA/fond/fondpropre.php?mission_id='+<?php echo $mission_id; ?>);
					}
			});
		 }
		 
		 function conclusion_fondpropre(){
			var conclusion_fond=document.getElementById('txt_conclusion_fond').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/fond/conclusionfond.php',
				data:{conclusion_fond:conclusion_fond,mission_id:mission_id},
					success:function(e){
						//$("#contenue").html(e);
						alert('Conclusions bien enregistrées');
						$('#contenue').load('RA/fond/fondpropre.php?mission_id='+<?php echo $mission_id; ?>);	
					}
			});
		 }
		 
		function addcommentfond(id, numerocompte, compte){
			var comment_fond=$('#commentfond'+compte).val();
			var mission_id=<?php echo $mission_id;?>;
			if(comment_fond!=""){
				$.ajax({
					type:'POST',
					url:'RA/fond/commentairefond.php',
					data:{numerocompte:numerocompte, mission_id:mission_id , comment_fond:comment_fond, objectif:'fond'},
					success:function(){
						alert("Commentaire bien enregistr\351"); 
					}
				});
			}
			else{
				alert("Veuillez remplir le commentaire");
			}
		}
		function addRenvoiefond(id,compte){
			$('#id_renvoie_fond').show();
			// alert(compte);
		}
		 
		function enregistrer_tableau_fond(){
			var i = 0;
				for(i=0;i<2;i++){
					var enregistrer_tableau_import1=$('#import1'+i).val();
					var enregistrer_tableau_import2=$('#import2'+i).val();	
					var enregistrer_tableau_import3=$('#import3'+i).val();	
					var enregistrer_tableau_import4=$('#import4'+i).val();
					var enregistrer_tableau_import5=$('#import3'+i).val();	
					var enregistrer_tableau_import6=$('#import4'+i).val();	
					var enregistrer_tableau_resultat1=$('#resultat1'+i).val();	
					var enregistrer_tableau_resultat2=$('#resultat2'+i).val();	
					var	enregistrer_tableau_fondpropre=$('#txt_enregistrerfond'+i).val();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
							type:'POST',
							url:'RA/fond/tableaufond.php',
							data:{a:enregistrer_tableau_import1,
							b:enregistrer_tableau_import2,
							c:enregistrer_tableau_import3,
							d:enregistrer_tableau_import4,
							e:enregistrer_tableau_import5,
							f:enregistrer_tableau_import6,
							g:enregistrer_tableau_resultat1,
							h:enregistrer_tableau_resultat2,
							i:enregistrer_tableau_fondpropre,
							j:mission_id},
								success:function(e){
									alert(e);
									 //alert('Fonds propres bien enregistr\351s');	
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
		
		$conclusionfond=0;
		
		$reponse=$bdd->query('select CONCLUSION_RA_ID from  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="fond"');
		
		$donnees=$reponse->fetch();
		
		$conclusionfond=$donnees['CONCLUSION_RA_ID'];	
		
	?>
		<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
			<tr>
				<td><center><label class="grand_Titre" style="color:white;">VERIFICATION DE LA VARIATION DES FONDS PROPRES</label></center></td>
			</tr>
		</table>
		<div id="bt_milahatra">
			<input type = "button" id="bt_retour_fond" value = "Retour" style="width:80"/>
			<input type = "button" id="bt_synthese_fond" value = "Synth&egrave;se" style="width:80"/>
			<input type="button" name="btconclusion" value="Conclusion" id = "bt_conclusion_fond" style="width:80" />
			<input type="button" value="Enregistrer" id = "bt_enregistrer_tableau_fond" onclick="enregistrer_tableau_fond();" style="width:80" />
		</div><br/>
		<label id = "dv_labelako">Période du:<b><?php echo ' '.$mission_debut.' ';?></b> au<b> <?php echo ' '.$mission_fin;?></b> </label><br/><br/>
		<label style="position:relative;left:2px;"><?php echo ' '.$mission_annee.' '?>{N}</label>
		<label style="position:relative;left:120px;"><?php echo ' '.$mission_anneeN1.' '?>{N-1}</label>
		<label style="position:relative;left:200px;">Variation {N-(N-1)}</label>
			
		<div id= "dv_revue" >
		<table border = "1" width="1000" >
			<tr style="background-color:white;">
				<td width="100">Compte</td>
				<td width="280" >Libellé</td>
				<td width="100">Solde débiteur</td>
				<td width="80">Solde Créditeur</td>
				<td width="80">Solde débiteur</td>
				<td width="80">Solde Créditeur</td>
				<td width="70">Solde débiteur</td>
				<td width="70">Solde Créditeur</td>
				<td style="width:20">%</td>
				<td width="100">Commentaires</td>
				<td width="80">Renvois</td>
			</tr>
			<?php
				include '../../connexion.php';
				$reponse = $bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_SOLDE FROM tab_importer where IMPORT_CYCLE="A- Fonds propres" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
				$compte=0;
				$numerodecompte='';
					while ($donnees = $reponse->fetch())
						{
							$numerodecompte=$donnees['IMPORT_ID'];
							$import1=$donnees['IMPORT_COMPTES'];
							$import2=$donnees['IMPORT_INTITULES'];
							$import3=$donnees['IMPORT_SOLDE'];
							$comptBal3=$import3;
							$import4=0;
								if($comptBal3<0){
									$import4=$import3*-1;
									$import3=0;
								}
								
								$mon_premier_chiffre = $import3; 
								$mon_deuxieme_chiffre = $import4;
								$resultat1 = $mon_premier_chiffre - $mon_premier_chiffre; 
								$resultat2 = $mon_deuxieme_chiffre - $mon_deuxieme_chiffre;
			?>	
			<tr id="idBalGen<?php echo $compte;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
				<input type ="text" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
				
				<td width="100"><?php echo $import1;?> </td>
				<input type="text" id="import1<?php echo $compte;?>" value="<?php echo $import1;?>" style="display:none;"/>
				
				<td width="280"><?php echo $import2;?> </td>
				<input type="text" id="import2<?php echo $compte;?>" value="<?php echo $import2;?>" style="display:none;"/>
				
				<td width="100"><?php echo $import3; ?></td>
				<input type="text" id="import3<?php echo $compte;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import4;?></td>
				<input type="text" id="import4<?php echo $compte;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import3;?></td>
				<input type="text" id="import3<?php echo $compte;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import4;?></td>
				<input type="text" id="import4<?php echo $compte;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				<td width="70"><?php echo $resultat1;?></td>
				<input type="text" id="resultat1<?php echo $compte;?>" value="<?php echo $resultat1;?>" style="display:none;"/>
				
				<td width="70"><?php echo $resultat2;?></td>
				<td width="20"></td>
				<input type="text" id="resultat2<?php echo $compte;?>" value="<?php echo $resultat2;?>" style="display:none;"/>
				
				<td width="100">
					<textarea cols="5" rows="1" id="commentfond<?php echo $compte; ?>"></textarea>
					<img src="../RA/image/add.jpg" id="compte<?php echo $compte; ?>" onclick="addcommentfond(this.id,<?php echo $numerodecompte; ?>,<?php echo $compte;?>)" width="20" height="20"/>
				</td>
				<td width="80"><input type="button" id="btn<?php echo $compte;?>" onclick="addRenvoiefond(this.id, <?php echo $compte;?>)" value="ok" /></td>

				<div id="id_renvoie_fond" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:200px;display:none">
				<form method = "post" enctype="multipart/form-data" action = "RA/fond/importfond.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $numerodecompte; ?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_fond" name = "file_Import_fond"/>
					<input type="submit" name="Importerfond" value="Upload" id = "id_Importerfond"/>
					<?php
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="fond"');					
						$renvoielien='';
						while($donnees2=$reponse2->fetch()){
							$renvoielien=$donnees2['RENVOIE_LIEN'];
						}
					?>
					<a href="" ><?php echo $renvoielien;?></a>
				</form>
				<div id="fermeture_import_fond" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			<?php
				$compte++;
				}
			?>
			</tr>
		</table>
						
	</div>
	
	<div id="centre" align="center">
			<!------------------------------------------------------------synthese----------------------------------------------->
		<div id="synthese_fond" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_fond" cols="40" rows="20" /><?php// if($conclusionfond!=0) echo 'disabled'; ?> </textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="id_valider_synthese_fond" value="Enregistrer" class="bouton" onclick="valider_synthese_fond();"/> <?php //if($conclusionfond!=0) echo 'disabled'; ?> &nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_fond"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_synthese_fond_propre" style="top:-20px;left:490px;position:absolute;">
			<img src="../cycle_achat_image/Fermer.png" /></div>
		</div>
	</div>
	
	<!------------------------------------------------------------conclusion----------------------------------------------->
		
		<div id="dv_conclusion_fond" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />CONCLUSION</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_conclusion_fond" cols="40" rows="20" /><?php// if($conclusionfond!=0) echo 'disabled'; ?></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="bt_valider_conclusion_fond" value="Valider" class="bouton" onclick="conclusion_fondpropre();"/> <?php// if($conclusionfond!=0) echo 'disabled'; ?>&nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_conclusion_fond"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_conclusion_fond_propre" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
		</div>
	
	
<body>
</html>
