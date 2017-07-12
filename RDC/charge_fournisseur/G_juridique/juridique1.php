<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';

	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="G" and MISSION_ID='.$mission_id.' and RDC_RANG=1');
	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/G_juridique/table_F6.css">
		<script>
			// Droit cycle by Tolotra
	        // Page : RDC ->  F-Charges Fournisseurs
	        // Tâche :  Revue comptes Charges Fournisseurs, 37
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 6},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#qcm1").attr('disabled', result);
	                    $("#comment1").attr('disabled', result);
	                }
	            }
	        );
			$(function(){
				$('#btn_approuver').click(function(){
					waiting();
					var compteur = 0;
					var tabCompte = [];
					var tabLibelle = [];
					var tabNum = [];//Tableau contenant le numero des lignes cochées
					var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));

					for (var i = 1; i <= nbrLigneTab; i++) {
						var testChecked = $('#check'+i).is(':checked');

						if(testChecked){
							compteur++; // compte le nombre de check
							var numCompte = $('#compte'+i).text();
							var numLibelle = $('#libelle'+i).text();

							tabCompte.push(numCompte);
							tabLibelle.push(numLibelle);
							tabNum.push(''+i);
						}
					}
					//Envoi du tableau
					$.post("RDC/charge_fournisseur/G_juridique/requetCheckF6.php",{'tabCompte':tabCompte,'tabLibelle':tabLibelle,'tabNum':tabNum})
						.done(function( data ) {
							$('#contenue_aprouve').hide();
							$('#contenue_question').show();
							$('#contenue_travail').html(data);
							stopWaiting();
						});
				});
				$('#bt_retour_a').click(function(){
					$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique1.php");
				});
				$('#bt_retour').click(function(){
					waiting();
					$('#contenue_question').show();
					//$('#contenue_aprouve').show();

					var tabNum = [];
					var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));

					for (var i = 1; i <= nbrLigneTab; i++) {
						var numNum = $('#compte'+i).attr('alt');

						tabNum.push(numNum);
					}
					
					$.post("RDC/charge_fournisseur/G_juridique/table_F6.php")
						.done(function( data ) {
							$('#contenue_travail').html(data);
							for (var i = 1; i <= nbrLigneTab; i++){
								$('input#check'+tabNum[i-1]).attr('checked','checked');
							}
							stopWaiting();
						});
				});
				$('#revue').click(function(){
					$('#contenue_rdc').show();
					$('#bt_retour_1').hide();
					$('#contenue_question').show();
					$.ajax({
						url:'RDC/charge_fournisseur/G_juridique/table_F6.php',
						success:function(e){
							$('#contenue_travail').html(e);
						}
					});	
				});
				$('#bt_retour_1').click(function(){
					$("#contenue").load("RDC/charge_fournisseur/index.php");
				});
				
				$('#bt_suivant').click(function(){
					var reponse1=$('#qcm1').val();
					var commentaire1=$('#comment1').val();
					var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));
					if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						add_Data(reponse1,commentaire1,'charge_fournisseur','G',1,<?php echo $mission_id; ?>);
					
						for (var i = 1; i <= nbrLigneTab; i++) {
							var numCompte = $('#compte'+i).text();
							var numLibelle = $('#libelle'+i).text();
							var obs = $('#obs'+i).val();

							$.post("RDC/charge_fournisseur/G_juridique/saveF6.php",{'compte':numCompte,'libelle':numLibelle,'obs':obs});

						}
						$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique1_part2.php");
					}
				});
			});
			function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
				$.ajax({
					type:'POST',
					url:'RDC/charge_fournisseur/G_juridique/add_Data.php',
					data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
					success:function(){
					}
				});	
			}
			function choixqcm1(){
				var reponse1=$('#qcm1').val();
				var commentaire1=$('#comment1').val();
				if(reponse1=="non" && commentaire1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		</script>
	</head>
	<body>
		<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
			<tr>
				<td class="grand_Titre"><center><label style="font-weight:bold;">G - JURIDIQUE FISCAL ET DIVERS PARTIE : I</label></center></td>
			</tr>
		</table>
		<div style="overflow:auto;" >
			<table width="100%" height="470px">
				<tr>
					<td width="72.5%">
						<div id="contenue_travail" style="height:450px;width:930px;">
							<label><strong>Travaux à faire :</strong></label>
								<p style="margin-left:15px;margin-top:5px;">Contrôler le traitement fiscal des charges n’ayant pas de lien direct avec l’exploitation.</p>
							<label><strong>Documents et infos à obtenir</strong></label><br/>
							<ul>
								<li>GL des comptes de charges</li>
								<li>PJ des opérations testées</li>
							</ul>
							<label><strong>Question :</strong></label>
								<p style="margin-left:15px;margin-top:5px;">Par pointage aux PJ, avez-vous constaté des opérations n'ayant pas de lien direct avec l'exploitation de la société ?</p>		
							<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;font-weight:bold;"> Vérification de l'éxhaustivité/Régularité des enregistrements</label>
						</div>
					</td>
					<td width="27.5%">
						<input type="button" id="bt_retour_1" value="Retour" class="bouton" style="display:block;top:-210px;float:right;position:relative;"/>
						<!--div id="contenue_aprouve" style="overflow:auto;height:450px;display:none">
							<input type="button" value="Approuver" id="btn_approuver" class="bouton" style="float:right;" />
							<input type="button" id="bt_retour_a" value="Retour" class="bouton" style="float:right;" />
						</div-->
						<div id="contenue_question" style="overflow:auto;height:450px;">
							<input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;" />
							<input type="button" id="bt_retour" value="Retour" class="bouton" style="float:right;" />

							<div id="contenue_rdc" 
								<?php 
									if(@$_GET["juridique_visible"]!='OK')
									print 'style="display:none;"'
								?>  >
								<label><strong>Question :</strong></label><br />
								<label>Par pointage aux PJ, avez-vous constaté des opérations n'ayant pas de lien direct avec l'exploitation de la société ?</label>
								<select id="qcm1" onchange="choixqcm1()">
									<option value=""></option>
									<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
									<option value="N/A" <?php if($qcm1=="N/A") echo 'selected'; ?> >N/A</option>
									<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
								</select><br />
								<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
								<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br />
							</div>
						</div>
					</td>
				</tr>
			</table>
			<div id="sms_retour" style="display:none;">
				<table>
					<tr align="center">
						<td height="60">Voulez-vous enregistrer</td>
					</tr>
					<tr>
						<td>
							<input type="button" id="bt_oui" value="Oui" class="bouton" />&nbsp;&nbsp;&nbsp;
							<input type="button" id="bt_non" value="Non" class="bouton" />
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
