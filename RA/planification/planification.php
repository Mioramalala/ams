<?php
	@session_start();
	$_SESSION['fonction'] = 'Planification';
	$mission_id           = $_SESSION['idMission'];
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript">
		
			$(function() {//DEBUT 
						
				jQuery('#id_Importer_Planif_gen_submit').click(function()
				{
					if($('#form_load_planif > input').get(0).files.length !=0){

						var formulaire = new FormData(document.getElementById('form_load_planif'));
						$.ajax({
							url  : 'RA/planification/import_planification_gen.php', //script qui traitera l'envoi du fichier
							type : 'POST',
							xhr  : function() { // xhr qui traite la barre de progression
								myXhr = $.ajaxSettings.xhr();
								if(myXhr.upload) { // vérifie si l'upload existe
									myXhr.upload.addEventListener('progress',afficherAvancement, false); // Pour ajouter l'évènement progress sur l'upload de fichier
								}
								return myXhr;
							},
							
							//Traitements AJAX
							beforeSend  : traitementAvantEnvois,
							success     : traitementSiReussite,
							error       : traitementSiEchec,
							//Données du formulaire envoyé
							data        : formulaire,
							//Options signifiant à jQuery de ne pas s'occuper du type de données
							cache       : false,
							contentType : false,
							processData : false
						});

					}
					
				});
				function afficherAvancement(e){
					//alert('iiii');
					if(e.lengthComputable){
						$('#progress').attr({value:e.loaded,max:e.total});
					}
				}
				function traitementSiReussite(e){
					$('#progress').attr({value:100,max:100});
					//alert(e);
								$('#icone_visualisation_planification').html("<a href=\"http://docs.google.com/viewerng/viewer?url=<?php echo $_SERVER["HTTP_HOST"] ?>" + e + "\" target=\"_blank\"><img src=\"img/visualiser.svg\" width=73 height=73 /></a>");
							$('td#validate_pg').css({"background-color":"#65c122","background-image":"url(img/check.svg)","background-repeat":"no-repeat","background-size":"73px 73px","background-position":"center"});
					$('#id_renvoie_immo_bg').hide();
				}
				function traitementSiEchec(e){
					alert('echec');
				}
				function traitementAvantEnvois(e){
				}
				$.ajax({ //Debut verificaton existance planification general
					type    : 'POST',
					url     : 'RA/planification/verificaton_planif_gen.php',
					data    : {},
					success : function(e) {
						if(e) {
							$('div#validate_pg').find('#font_label').empty();
							$('div#validate_pg').css({"width":"55px"});
							$('td#validate_pg').css({"background-color":"#65c122","background-image":"url(img/check.svg)","background-repeat":"no-repeat","background-size":"73px 73px","background-position":"center"});
					
							$("#existance_planif_gen").show();
							$("#lien_doc").attr("href",e);
							if(e != '') {
								$('#icone_visualisation_planification').html("<a href=\"http://docs.google.com/viewerng/viewer?url=<?php echo $_SERVER["HTTP_HOST"] ?>" + e + "\" target=\"_blank\"><img src=\"img/visualiser.svg\" width=73 height=73 /></a>");
							}
								
						}
					}
				});//fn verif planif general
/*
				$('#id_Importer_Planif_gen').click(function() {
					$('#form_load_planif').ajaxForm({  
						beforeSend     : function() {},  
						uploadProgress : function(event, position, total, percentComplete) {},  
						complete       : function(xhr) {  
							$('#id_renvoie_immo_bg').hide();
							$.ajax({ //Debut verificaton existance planification general
								type    : 'POST',
								url     : 'RA/planification/verificaton_planif_gen.php',
								data    : {},
								success : function(e) {
									if(e) {
										$('div#validate_pg').find('#font_label').empty();
										$('div#validate_pg').css({"width":"55px"});
										$('td#validate_pg').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
										$("#existance_planif_gen").show();
										$("#lien_doc").attr("href",e);
									}
								}
							});//fn verif planif general

							return false;
					   }
					});
				});
				*/
				$('#fermeture_import_immo').click(function() {
					$('#id_renvoie_immo_bg').hide();
				});
/*
				$('#id_renvoie_immo_bg').click(function() {
					$('#id_renvoie_immo_bg').hide();
				});
*/
				function disablePlanif() {
					if(confirm("Etes-vous sûr de vouloir valider ?")) {
						$.ajax({
							type    : 'POST',
							url     : 'RA/planification/saveValidation.php',
							data    : {},
							success : function(e) {
								alert("Validation effectuee.");
							}
						});
					}
				}

			});//FIN

			function addRenvoieimmo() {
				$.ajax({ //Debut verificaton existance planification general
					type    : 'POST',
					url     : 'RA/planification/verificaton_planif_gen.php',
					data    : {},
					success : function(e) {
						if(e) {
							var confirmer = confirm ('Un planification générale existe déja Vouler-vous supprimer?');
							if(confirmer == true) $("#id_renvoie_immo_bg").show();
						} else $('#id_renvoie_immo_bg').show();
					}
				});//fn verif planif general*/
			}		


			function click_sousMenuePlanification(lien_)
			{
				//alert(lien_);
				$("#contenue").load(lien_);
			}

		</script>
	</head>
	
	<body>
	<input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />	
	<table width="70%" height="50" style="text-align:left;background-color:#FFFFFF;margin-bottom:10px">
			<tr>
				<td style="color:#0099FF">
					<div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;">		
						<table>
							<tr>
								<td width="20%" style="left:15%;top:2px;margin-left:15%"><img src="../../img/iconswidgets/planification.png" height="48" width="48"/></td>
								<td width="50%" style="color:#89CCF8;font-size:1.5em;font-family:font_TE;font-weight:bold;">Planification</td>
							</tr>
						
						</table>
					</div>
					</td>
				
			</tr>
			
	</table>
	
	<table  width="70%" style="background-color:#FFFFFF">
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=A&PLANIF_CYCLE=fond')">
					<div style="float:left"><img height="70px" src="img/alphabet/A.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Fonds propres.</label></div>
					</td>
					<td colspan="3" class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=B&PLANIF_CYCLE=immo')">
							<div style="float:left"><img height="70px"src="img/alphabet/B.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Immobilisations corporelles et incorporelles</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1">
					<td class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=C&PLANIF_CYCLE=immofi')">
						<div style="float:left"><img height="70px"src="img/alphabet/C.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label> Immobilisation Financieres.</label></div>
					</td>	
					<td colspan="3" class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=D&PLANIF_CYCLE=stock')">
								<div style="float:left"><img height="70px"src="img/alphabet/D.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Stocks.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1">
					<td class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=E&PLANIF_CYCLE=tresorerie')">
					<div style="float:left"><img height="70px" src="img/alphabet/E.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Tresorerie.</label></div>
					</td>
					<td colspan="3" class="td_Image"  width="50%" onClick="	javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=F&PLANIF_CYCLE=charge')">
						<div style="float:left"><img height="70px"src="img/alphabet/F.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Charges fournisseurs.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1">
					<td class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=G&PLANIF_CYCLE=vente')">
						<div style="float:left"><img height="70px" src="img/alphabet/g.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Ventes-Clients.</label></div>
					</td>
					<td colspan="3" class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=H&PLANIF_CYCLE=paie')">
					<div style="float:left"><img height="70px"src="img/alphabet/h.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Paie-Personnel.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1">
					<td class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=I&PLANIF_CYCLE=impot')">
						<div style="float:left"><img height="70px"src="img/alphabet/i.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Impôts et taxes.</label></div>
					</td>
					<td colspan="3" class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=J&PLANIF_CYCLE=emprunt')">
					<div style="float:left"><img height="70px"src="img/alphabet/j.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label> Emprunts et dettes financières.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1">
					<td class="td_Image"  width="50%" onClick="javascript:click_sousMenuePlanification('/RA/planification/objectif_panificationRA.php?CYCLE=K&PLANIF_CYCLE=dcd')">
						<div style="float:left"><img height="70px"src="img/alphabet/K.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>Débiteurs et créditeurs divers.</label></div>
					</td>
					<td class="td_Image"  width="50%">
						<a href="javascript:click_sousMenueREvue('/RA/planification/planif_gen/planif_gen.php',$('#missId').val())" style="color:#89CCF8;font-family:font_TE;font-weight:bold;font-size:20px;">Planification générale</a>
					</td>
					<td style="background : #00aaff;color : white; padding: 0 5px 0 5px;" id="icone_visualisation_planification">
					</td>
					<td class="tdb_button" id="validate_pg"  onclick="addRenvoieimmo()">
						<div id="validate_pg" class="label_valid"><label id="font_label">Validation</label></div>
			<!--<input type="button" value="Validation" id="validate_vb" class="bouton" />-->
					</td>
				
				<!--<input type="button" value="Validation" id="validate_vb" class="bouton" />
						<!--<a onclick="disablePlanif();" style="color:blue;margin-left:30px;cursor: pointer;">Valider</a>
						<div id="validate_vb" class="label_valid">
							<label id="font_label">Validation</label>
						<img src="RA/image/up.png" style="cursor:pointer;" alt="upload" id="upload" width="30px" onclick="addRenvoieimmo()">
						<a id="lien_doc" TARGET="_BLANK"><img src="RA/image/file.png" width="30px" id="existance_planif_gen" style="display:none;"></a>
						<div>-->
					
				</tr>
			</table>
		</div>	
		<div id="id_renvoie_immo_bg" style="position:absolute;top:0px;left:0px;width : 100%; height : 100%;background-color:rgba(0,0,0,0.7); font-family:font_TE;display:none;">
			<div id="id_renvoie_immo" style="background-color:#fff; font-family:font_TE;width:300px;height:200px;border-radius : 5px; box-shadow : 0 0 12px rgba(0,0,0,0.7);">
				<div id="fermeture_import_immo" style="margin-top:-10px;margin-left:280px;position:absolute;"><img src="RA/image/Fermer.png" /></div>
				<p> Veuillez charger la version originale signée de la planification générale</p>
				<form id="form_load_planif" enctype="multipart/form-data">
					<input id="fichier" name="file_Planif_gen" type="file" />
					<!--<img src="RA/image/up.png" style="cursor:pointer;" alt="upload" id = "id_Importer_Planif_gen" id="upload" width="30px">-->
					<a class="btn default" value="Upload" id="id_Importer_Planif_gen_submit">Upload</a>
				</form>
				<progress id="progress" value="0" style="margin : auto;"></progress>
			</div>
		</div>		
	</body>
	
</html>