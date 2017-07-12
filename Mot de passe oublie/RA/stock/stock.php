<?php
	session_start();
	$_SESSION['objectif']='Stock';
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
			$('#dv_synthese_stock').draggable();
			$('#dv_conclusion_stock').draggable();
		});
		$(function(){
				$('#id_retour_stock').click(function(){
					$('#contenue').load('../RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
				});
		});
		
		$(function(){
				$('#bt_synthese_stock').click(function(){
					$('#dv_synthese_stock').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/stock/fixationsynthesestock.php',
						data:{mission_id:mission_id},
						success:function(e){
							document.getElementById("txt_synthese_stock").value=e;
						}
					});
				});
				
				$("#id_annuler_synthese_stock").click(function(){
					$('#dv_synthese_stock').hide();
				
				});
		});
		
		$(function(){
				$('#bt_conclusion_stock').click(function(){
					$('#dv_conclusion_stock').fadeIn();
					var mission_id=<?php echo $mission_id;?>;
					$.ajax({
						type:'POST',
						url:'RA/stock/fixationconclusionstock.php',
						data:{mission_id:mission_id},
						success:function(e){
							document.getElementById("txt_conclusion_stock").value=e;
						}
					});
				});
				
				$("#id_annuler_conclusion_stock").click(function(){
					$('#dv_conclusion_stock').hide();
				
				});
		});
		
		$(function(){
				$('#fermeture_synthese_stock').click(function(){
					$('#dv_synthese_stock').hide();
				});
		
				$('#fermeture_conclusion_stock').click(function(){
					$('#dv_conclusion_stock').hide();
				});
				$('#fermeture_import_stock').click(function(){
					$('#id_renvoie_stock').hide();
				});
		});
		function valider_synthese_stock(){
			//alert("manakory");
			var synthese_stock=document.getElementById('txt_synthese_stock').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/stock/validersynthesestock.php',
				data:{synthese_stock:synthese_stock,mission_id:mission_id},
					success:function(e){
						$('#dv_synthese_stock').hide();
						// $("#contenue").html(e);
						//alert(e);
						alert('Synth\350ses bien enregistr\351es');
						// $('#contenue').load('RA/stock/stock.php?mission_id='+<?php echo $mission_id; ?>);	
					}
			});
		}
		 
		 function conclusion_stk(){
			var conclusion_stock=document.getElementById('txt_conclusion_stock').value;
			var mission_id=<?php echo $mission_id;?>;
			$.ajax({
				type:'POST',
				url:'RA/stock/conclusionstock.php',
				data:{conclusion_stock:conclusion_stock,mission_id:mission_id},
					success:function(e){
						$("#contenue").html(e);
						alert('Conclusions bien enregistr\351es');
						$('#contenue').load('RA/stock/stock.php?mission_id='+<?php echo $mission_id; ?>);	
					}
			});
		 }
		function addcommentstock(id, numerocompte, compte){
			var comment_stock=$('#commentstock'+compte).val();
			var mission_id=<?php echo $mission_id;?>;
			if(comment_stock!=""){
				$.ajax({
					type:'POST',
					url:'RA/stock/commentairestock.php',
					data:{numerocompte:numerocompte, mission_id:mission_id , comment_stock:comment_stock, objectif:'stock'},
					success:function(){
						alert("Commentaire bien enregistr\351"); 
					}
				});
			}
			else{
				alert("Veuillez remplir le commentaire");
			}
		}
		function addRenvoiestock(id,compte){
			$('#id_renvoie_stock').show();
			// alert(compte);
		}
		function enregistrer_tableau_stock(){
			var i = 0;
				for(i=0;i<6;i++){
					var enregistrer_tableau_import1=$('#import1'+i).val();
					var enregistrer_tableau_import2=$('#import2'+i).val();	
					var enregistrer_tableau_import3=$('#import3'+i).val();	
					var enregistrer_tableau_import4=$('#import4'+i).val();
					var enregistrer_tableau_import5=$('#soldefinaldebit'+i).val();	
					var enregistrer_tableau_import6=$('#soldefinalcredit'+i).val();
					
					var enregistrer_tableau_import1=$('#import11'+i).val();
					var enregistrer_tableau_import2=$('#import22'+i).val();	
					var enregistrer_tableau_import3=$('#import33'+i).val();	
					var enregistrer_tableau_import4=$('#import44'+i).val();
					var enregistrer_tableau_import5=$('#soldefinaldebit6'+i).val();	
					var enregistrer_tableau_import6=$('#soldefinalcredit6'+i).val();

					var enregistrer_tableau_import7=$('#soldedebitN1'+i).val();	
					var enregistrer_tableau_import8=$('#soldecreditN1'+i).val();
					
					var enregistrer_tableau_import7=$('#soldedebitN61'+i).val();	
					var enregistrer_tableau_import8=$('#soldecreditN61'+i).val();
		
					var enregistrer_tableau_import9=$('#soldeVariationDebitFin'+i).val();
					var enregistrer_tableau_import10=$('#soldeVariationCreditFin'+i).val();	
					var enregistrer_tableau_import11=$('#pourcentagedebitfin'+i).val();	
					var enregistrer_tableau_import12=$('#pourcentagecreditfin'+i).val();
					var enregistrer_tableau_import13=$('#commentimmo'+i).val();
					
					var enregistrer_tableau_import9=$('#soldeVariationDebitFin6'+i).val();
					var enregistrer_tableau_import10=$('#soldeVariationCreditFin6'+i).val();	
					var enregistrer_tableau_import11=$('#pourcentagedebitfin6'+i).val();	
					var enregistrer_tableau_import12=$('#pourcentagecreditfin6'+i).val();
					var enregistrer_tableau_import13=$('#commentimmo6'+i).val();
					
					
					var mission_id=<?php echo $mission_id;?>
					
					$.ajax({
							type:'POST',
							url:'RA/stock/tableaustock.php',
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
									 alert('Stocks bien enregistr\351s');	
								
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
		
		$conclusionstock=0;
		
		$reponse=$bdd->query('select CONCLUSION_RA_ID from  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="stock"');
		
		$donnees=$reponse->fetch();
		
		$conclusionstock=$donnees['CONCLUSION_RA_ID'];	

	?>
		<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
			<tr>
				<td><center><label class="grand_Titre" style="color:white;">VERIFICATION DE LA VARIATION DES STOCKS</label></center></td>
			</tr>
		</table>
		<div id="bt_milahatra">
			<input type="button" value="Retour" id="id_retour_stock" style="width:80"/>
			<input type="button" value="Synth&egrave;se" id="bt_synthese_stock" style="width:80">
			<input type="button" name="btconclusion" value="Conclusion" id = "bt_conclusion_stock" style="width:80"/>
			<input type ="button" value = "Enregistrer" onclick="enregistrer_tableau_stock();" style="width:80;"/>
		</div><br/>
			<label id = "dv_labelako">P&eacute;riode du:<b><?php echo ' '.$mission_debut.' ';?></b> au<b> <?php echo ' '.$mission_fin;?></b> </label><br/><br/><br/>
			<br />
		
		<label style="position:relative;left:50px;"><?php echo ' '.$mission_annee.' '?>{N}</label>
		<label style="position:relative;left:200px;"><?php echo ' '.$mission_anneeN1.' '?>{N-1}</label>
		<label style="position:relative;left:300px;">Variation {N-(N-1)}</label>
	<div id="">
	<div id="" style="float:left;width:600px;height:500px;">
		<table border="1" width="570">
			<tr height="70">
				<td width="50" style="background-color:white;">Comptes</td>
				<td width="200" style="background-color:white;">Lib&eacute;ll&eacute;s</td>
				<td width="80" style="background-color:white;">D&eacute;bits</td>
				<td width="80" style="background-color:white;">Cr&eacute;dits</td>
				<td width="80" style="background-color:white;">Soldes d&eacute;biteurs</td>
				<td width="80" style="background-color:white;">Soldes cr&eacute;diteurs</td>
			</tr>
			<!-------------------------------------------------------like3 N------------------------------------------------------------------------------>
			<?php
				include '../../connexion.php';
				$com1=0;
				$soldedebitN='';
				$soldecreditN='';
				$soldefinalcredit=0;
				$soldefinaldebit=0;
				$numerodecompte='';
				$reponse=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE
					FROM  tab_importer where IMPORT_COMPTES like "3%" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
					
				while($donnees=$reponse->fetch()){
							$import1=$donnees['IMPORT_COMPTES'];
							$import2=$donnees['IMPORT_INTITULES'];
							$import3=$donnees['IMPORT_DEBIT'];
							$import4=$donnees['IMPORT_CREDIT'];
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
				
				<td width="50"><?php echo $import1;?> </td>
				<input type="text" id="import1<?php echo $com1;?>" value="<?php echo $import1;?>" style="display:none;"/>
				
				<td width="200"><?php echo $import2;?> </td>
				<input type="text" id="import2<?php echo $com1;?>" value="<?php echo $import2;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import3; ?></td>
				<input type="text" id="import3<?php echo $com1;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import4;?></td>
				<input type="text" id="import4<?php echo $com1;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				
				<td width="80"><?php echo $soldefinaldebit;?></td>
				<input type="text" id="soldefinaldebit<?php echo $com1;?>" value="<?php echo $soldefinaldebit;?>" style="display:none;"/>
				
				<td width="80"><?php echo $soldefinalcredit;?></td>
				<input type="text" id="soldefinalcredit<?php echo $com1;?>" value="<?php echo $soldefinalcredit;?>" style="display:none;"/>
			</tr>
			<?php
			$com1++;
				}
			?>
		</table>
		<!-------------------------------------------------------like603 N------------------------------------------------------------------------------>
		<table border="1" width="570">
			<?php
			include '../../connexion.php';
				$com2=0;
				$soldedebitN6='';
				$soldecreditN6='';
				$soldefinalcredit6=0;
				$soldefinaldebit6=0;
				$numerodecompte6='';
				$reponse2=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE 
					FROM  tab_importer where IMPORT_COMPTES like "603%" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N"');
					
				while($donnees2=$reponse2->fetch()){
							$import11=$donnees2['IMPORT_COMPTES'];
							$import22=$donnees2['IMPORT_INTITULES'];
							$import33=$donnees2['IMPORT_DEBIT'];
							$import44=$donnees2['IMPORT_CREDIT'];
					if($donnees2['IMPORT_SOLDE']<0){
						$soldefinalcredit6=$donnees2['IMPORT_SOLDE'];
						$soldefinaldebit6=0;
						$soldedebitN6=$soldedebitN6.'*'.$soldefinaldebit6;
						$soldecreditN6=$soldecreditN6.'*'.$soldefinalcredit6;
					}
					else{
						$soldefinalcredit6=0;
						$soldefinaldebit6=$donnees2['IMPORT_SOLDE'];
						$soldedebitN6=$soldedebitN6.'*'.$soldefinaldebit6;
						$soldecreditN6=$soldecreditN6.'*'.$soldefinalcredit6;
					}
					$numerodecompte6=$numerodecompte6.'*'.$donnees2['IMPORT_ID'];
			?>
			<tr height="70" id="idBalGen<?php echo $com2;?>" onclick="makaid(<?php echo $donnees2['IMPORT_ID'];?>)" value="<?php echo $donnees2['IMPORT_ID'];?>">
				<input type ="text" value="<?php echo $donnees2['IMPORT_ID']?>"  style="display:none"/>
				
				<td width="50"><?php echo $import11;?> </td>
				<input type="text" id="import11<?php echo $com2;?>" value="<?php echo $import1;?>" style="display:none;"/>
				
				<td width="200"><?php echo $import22;?> </td>
				<input type="text" id="import22<?php echo $com2;?>" value="<?php echo $import2;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import33; ?></td>
				<input type="text" id="import33<?php echo $com2;?>" value="<?php echo $import3;?>" style="display:none;"/>
				
				<td width="80"><?php echo $import44;?></td>
				<input type="text" id="import44<?php echo $com2;?>" value="<?php echo $import4;?>" style="display:none;"/>
				
				
				<td width="80"><?php echo $soldefinaldebit6;?></td>
				<input type="text" id="soldefinaldebit6<?php echo $com2;?>" value="<?php echo $soldefinaldebit6;?>" style="display:none;"/>
				
				<td width="80"><?php echo $soldefinalcredit6;?></td>
				<input type="text" id="soldefinalcredit6<?php echo $com2;?>" value="<?php echo $soldefinalcredit6;?>" style="display:none;"/>
			</tr>
			<?php
			$com2++;
				}
			?>
		</table>
	</div>
	<div id="" style="float:left;width:200px;height:500px;">
	<!-------------------------------------------------------like3 N-1------------------------------------------------------------------------------>
		<table border="1" width="70%">
			<tr height="70">
				<td width="100" style="background-color:white;">Soldes <br />d&eacute;biteurs</td>
				<td width="100" style="background-color:white;">Soldes <br />cr&eacute;diteurs</td>
			</tr>
			<?php
				$reponse1=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE
					FROM  tab_importer where IMPORT_COMPTES like "3%" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N-1"');
				$com3=0;
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
			?>
			<tr height="70" id="idBalGen<?php echo $com3;?>" onclick="makaid(<?php echo $donnees1['IMPORT_ID'];?>)" value="<?php echo $donnees1['IMPORT_ID'];?>">
			
			
				<td width="70"><?php echo $soldedebitN1;?></td>
				<input type="text" id="soldedebitN1<?php echo $com3;?>" value="<?php echo $soldedebitN1;?>" style="display:none;"/>
				
				<td width="70"><?php echo $soldecreditN1;?></td>
				<input type="text" id="soldecreditN1<?php echo $com3;?>" value="<?php echo $soldecreditN1;?>" style="display:none;"/>
				
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
		<!-------------------------------------------------------like603 N-1------------------------------------------------------------------------------>
		<table border="1" width="160">
			<?php
				$reponse4=$bdd->query('SELECT IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CHOIX_ANNEE
					FROM  tab_importer where IMPORT_COMPTES like "603%" AND MISSION_ID='.$mission_id.' AND IMPORT_CHOIX_ANNEE="N-1"');
				$com4=0;
				$soldedebit61='';
				$soldecredit61='';
				$soldedebitN61=0;
				$soldecreditN61=0;
				$pourcentagedebitN61='';
				$pourcentagecreditN61='';
				while($donnees4=$reponse4->fetch()){
				if($donnees4['IMPORT_SOLDE']<0){
					$soldedebitN61=0;
					$soldecreditN61=$donnees4['IMPORT_SOLDE'];
					$soldedebit61=$soldedebit61.'*'.$soldedebitN61;
					$soldecredit61=$soldecredit61.'*'.$soldecreditN61;
				}
				else{
					$soldedebitN61=$donnees4['IMPORT_SOLDE'];
					$soldecreditN61=0;
					$soldedebit61=$soldedebit61.'*'.$soldedebitN61;
					$soldecredit=$soldecredit61.'*'.$soldecreditN61;
				}
			?>
			<tr height="70" id="idBalGen<?php echo $com4;?>" onclick="makaid(<?php echo $donnees4['IMPORT_ID'];?>)" value="<?php echo $donnees4['IMPORT_ID'];?>">
			
			
				<td width="70"><?php echo $soldedebitN61;?></td>
				<input type="text" id="soldedebitN61<?php echo $com4;?>" value="<?php echo $soldedebitN61;?>" style="display:none;"/>
				
				<td width="70"><?php echo $soldecreditN61;?></td>
				<input type="text" id="soldecreditN61<?php echo $com4;?>" value="<?php echo $soldecreditN61;?>" style="display:none;"/>
				
				<?php 
					$pourcentagedebitN61=$pourcentagedebitN61.'*'.$soldedebitN61; 
					$pourcentagecreditN61=$pourcentagecreditN61.'*'.$soldecreditN61;				
				?>
			</tr>
			<?php
				$com4++;
				}
			?>
		</table>
	</div>
		
	<div id="" style="float:right;width:260px;height:500px;position:absolute;top:-220px;left:750px;" />
	<!-------------------------------------------------------variation table 1------------------------------------------------------------------------------>
		<table border="1">
			<tr height="70">
				<td style="background-color:white;">Variation <br />d&eacute;bit</td>
				<td style="background-color:white;">Variation <br />cr&eacute;dit</td>
				<td style="background-color:white;">%D</td>
				<td style="background-color:white;">%C</td>
				<td style="background-color:white;">Commentaires</td>
				<td style="background-color:white;">Renvoies</td>
			</tr>
			<?php
				$com5=0;
				$soldeVariationdebitN=explode('*',$soldedebitN);
				$soldeVariationcreditN=explode('*',$soldecreditN);
				$soldeVariationdebitN1=explode('*',$soldedebit);
				$soldeVariationcreditN1=explode('*',$soldecredit);
				
				$pourcentagedebit=explode('*',$pourcentagedebitN1);
				$pourcentagecredit=explode('*',$pourcentagecreditN1);
				
				$numerodecomptefin=explode('*',$numerodecompte);
								
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
			?>
			<tr height="70" id="idBalGen<?php echo $com5;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
			
				<td width="80"><?php echo $soldeVariationDebitFin;?></td>
				<input type="text" id="soldeVariationDebitFin<?php echo $com5;?>" value="<?php echo $soldeVariationDebitFin;?>" style="display:none;"/>
				
				<td width="80"><?php echo $soldeVariationCreditFin;?></td>
				<input type="text" id="soldeVariationCreditFin<?php echo $com5;?>" value="<?php echo $soldeVariationCreditFin;?>" style="display:none;"/>
				
				<td width="80"><?php echo $pourcentagedebitfin;?></td>
				<input type="text" id="pourcentagedebitfin<?php echo $com5;?>" value="<?php echo $pourcentagedebitfin;?>" style="display:none;"/>
				
				<td width="80"><?php echo $pourcentagecreditfin;?></td>
				<input type="text" id="pourcentagecreditfin<?php echo $com5;?>" value="<?php echo $pourcentagecreditfin;?>" style="display:none;"/>
				<td width="90">
					<textarea cols="5" rows="1" id="commentstock<?php echo $com5 ?>"></textarea>
					<img src="../RA/image/add.jpg" id="com5<?php echo $com5; ?>" onclick="addcommentstock(this.id,<?php echo $numerodecomptefin[$i]; ?>,<?php echo $com5;?>)" width="20" height="20"/>
				</td>
				<td width="90"><input type="button" id="btn<?php echo $com5;?>" onclick="addRenvoiestock(this.id, <?php echo $com5;?>)" value="ok" /></td>
			</tr>
			
			<div id="id_renvoie_stock" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:200px;display:none">
				<form method = "post" enctype="multipart/form-data" action = "RA/stock/importstock.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $numerodecomptefin[$i]; ?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_stock" name = "file_Import_stock"/>
					<input type="submit" name="Importerstock" value="Upload" id = "id_Importerstock"/>
					<?php
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="stock" AND IMPORT_ID='.$numerodecomptefin[$i]);					
						$renvoielien='';
						while($donnees2=$reponse2->fetch()){
							$renvoielien=$donnees2['RENVOIE_LIEN'];
						}
					?>
					<a href="" ><?php echo $renvoielien;?></a>
				</form>
				<div id="fermeture_import_stock" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			<?php
				$com5++;
				}
			?>
		</table>
		<!-------------------------------------------------------variation table2------------------------------------------------------------------------------>
		<table border="1">
			<?php
				$com6=0;
				$soldeVariationdebitN6=explode('*',$soldedebitN6);
				$soldeVariationcreditN6=explode('*',$soldecreditN6);
				$soldeVariationdebitN61=explode('*',$soldedebit61);
				$soldeVariationcreditN61=explode('*',$soldecredit61);
				
				$pourcentagedebit6=explode('*',$pourcentagedebitN61);
				$pourcentagecredit6=explode('*',$pourcentagecreditN61);
				
				$numerodecomptefin6=explode('*',$numerodecompte6);
								
				
				for($i=1; $i<count($soldeVariationcreditN61); $i++){
				$soldeVariationDebitFin6=$soldeVariationdebitN6[$i]-$soldeVariationdebitN61[$i];
				$soldeVariationCreditFin6=$soldeVariationcreditN6[$i]-$soldeVariationcreditN61[$i];
				
				//REPONSE POURCENTAGE
				 
				 if($soldedebit61==0){
					$pourcentagedebitfin6=0;
				 }
				 else $pourcentagedebitfin6=$soldeVariationDebitFin6/$soldedebit61[$i];
				 
				 if($soldecredit61==0){
					$pourcentagecreditfin6=0;
				 }
				else $pourcentagecreditfin6=$soldeVariationCreditFin6/$soldecredit61[$i];
			?>
			<tr height="70" id="idBalGen<?php echo $com6;?>" onclick="makaid(<?php echo $donnees4['IMPORT_ID'];?>)" value="<?php echo $donnees4['IMPORT_ID'];?>">
			
				<td width="80"><?php echo $soldeVariationDebitFin6;?></td>
				<input type="text" id="soldeVariationDebitFin6<?php echo $com6;?>" value="<?php echo $soldeVariationDebitFin6;?>" style="display:none;"/>
				
				<td width="80"><?php echo $soldeVariationCreditFin6;?></td>
				<input type="text" id="soldeVariationCreditFin6<?php echo $com6;?>" value="<?php echo $soldeVariationCreditFin6;?>" style="display:none;"/>
				
				<td width="80"><?php echo $pourcentagedebitfin6;?></td>
				<input type="text" id="pourcentagedebitfin6<?php echo $com6;?>" value="<?php echo $pourcentagedebitfin6;?>" style="display:none;"/>
				
				<td width="80"><?php echo $pourcentagecreditfin6;?></td>
				<input type="text" id="pourcentagecreditfin6<?php echo $com6;?>" value="<?php echo $pourcentagecreditfin6;?>" style="display:none;"/>
				<td width="90">
					<textarea cols="5" rows="1" id="commentstock6<?php echo $com6 ?>"></textarea>
					<img src="../RA/image/add.jpg" id="com6<?php echo $com6; ?>" onclick="addcommentstock(this.id,<?php echo $numerodecomptefin6[$i]; ?>,<?php echo $com6;?>)" width="20" height="20"/>
				</td>
				<td width="90"><input type="button" id="btn<?php echo $com6;?>" onclick="addRenvoiestock(this.id, <?php echo $com6;?>)" value="ok" /></td>
			</tr>
			
			<div id="id_renvoie_stock" style="position:absolute;top:180px;left:392px;background-color:#ccc;width:300px;height:200px;display:none">
				<form method = "post" enctype="multipart/form-data" action = "RA/stock/importstock.php?mission_id=<?php echo $mission_id;?>&importid=<?php echo $numerodecomptefin6[$i]; ?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_stock" name = "file_Import_stock"/>
					<input type="submit" name="Importerstock" value="Upload" id = "id_Importerstock"/>
					<?php
						$reponse2=$bdd->query('select RENVOIE_LIEN from tab_renvoie where MISSION_ID='.$mission_id.' AND RENVOIE_OBJECTIF="stock" AND IMPORT_ID='.$numerodecomptefin6[$i]);					
						$renvoielien='';
						while($donnees2=$reponse2->fetch()){
							$renvoielien=$donnees2['RENVOIE_LIEN'];
						}
					?>
					<a href="" ><?php echo $renvoielien;?></a>
				</form>
				<div id="fermeture_import_stock" style="top:-18px;left:280px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div> 
			<?php
				$com6++;
				}
			?>
		</table>
	</div>
	
</div>

<div id="centre_stock" align="center">
			<!------------------------------------------------------------synthese----------------------------------------------->
		<div id="dv_synthese_stock" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
		<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
		<table width="500" bgcolor="#00698d">
				<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_stock" cols="40" rows="20" <?php// if($conclusionstock!=0) echo 'disabled'; ?> ></textarea>
				</td>
			</tr>
			<tr>
				<td align="center">
					<input type="button" id="bt_valider_synthese_stock" value="Enregistrer" class="bouton" onclick="valider_synthese_stock();" <?php //if($conclusionstock!=0) echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
					<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_stock"/>
				</td>
			</tr>
		</table>
		<div id="fermeture_synthese_stock" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
	</div>
		</div>
		<!------------------------------------------------------------conclusion----------------------------------------------->
		
		<div id="dv_conclusion_stock" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />CONCLUSION</div>
			<table width="500" bgcolor="#00698d">
					<td class="td_Titre_Question" align="center"><textarea id="txt_conclusion_stock" cols="40" rows="20" <?php// if($conclusionstock!=0) echo 'disabled'; ?>></textarea>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="button" id="bt_valider_conclusion_stock" value="Valider" class="bouton" onclick="conclusion_stk();"  <?php// if($conclusionstock!=0) echo 'disabled'; ?>>&nbsp;&nbsp;&nbsp;
						<input type="button" value="Annuler" class="bouton" id="id_annuler_conclusion_stock"/>
					</td>
				</tr>
			</table>
			<div id="fermeture_conclusion_stock" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
		</div>

	</body>
</html>