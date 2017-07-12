<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and MISSION_ID='.$mission_id.' and RDC_RANG=1');

$donnees=$reponse1->fetch();

$commentaire1=$donnees['RDC_COMMENTAIRE'];
$qcm1=$donnees['RDC_REPONSE'];
?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/prod_client/css.css">
<script>
	
		

	// Droit cycle by Tolotra
    // Page : RDC -> Produits clients
    // Tâche : Produits clients, 42
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 42},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled', result);
                $("#comment1").attr('disabled', result);
            }
        }
    );

	$(function(){
		$('#bt_retour_pc').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#revue').click(function(){
		// alert("cc");
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').show();
			$('#contenue_question').show();
			$('#upload').show();
			//$('#contenue_travail').load("RDC/prod_client/H_information/table_G8.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse1=$('#qcm1').val();
			var commentaire1=$('#comment1').val();
			if((reponse1=="non" && commentaire1=="") || reponse1==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse1,commentaire1,'prod_client','H',1,<?php echo $mission_id; ?>);
				enregistreTableG8();
				$('#contenue').load("RDC/prod_client/H_information/information2.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/H_information/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});
	}
	function enregistrerSynthese(){
		var synthese=$('#syntheseG1').val();
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/H_information/addSyntheseRa.php',
			data:{synthese:synthese, mission_id:<?php echo $mission_id;?>, cycle:'prod_client', objectif:'H', reference:'G1'},
			success:function(){
			}
		});
	}
function enregistreTableG8(){
	var tab_ca_tax_0=new Array();
	var tab_ca_tax_20=new Array();
	var tab_ca_nt=new Array();
	var tab_ca_tax_18=new Array();
	var tab_ca_taxable=new Array();
	var tab_ca_ntax=new Array();
	
	var tab_total_ca_nt=new Array();
	var tab_total_ca=new Array();
	var tab_tvac_20=new Array();
	var tab_tvac_18=new Array();
	var tab_tvac_autres=new Array();
	var tab_total_tvac=new Array();
	
	var tab_tvad_locaux_biens=new Array();
	var tab_tvad_locaux_equip=new Array();
	var tab_tvad_locaux_autres_biens=new Array();
	var tab_tvad_locaux_services=new Array();
	var tab_tvad_import_biens=new Array();
	var tab_tvad_import_equip=new Array();
	
	var tab_tvad_import_autres_biens=new Array();
	var tab_tvad_import_services=new Array();
	var tab_total_tvad=new Array();
	var tab_taxed_fin_prorata=new Array();
	var tab_taxed_prorata=new Array();
	var tab_calcul_tvad_prorata=new Array();
	
	var tab_tvad_periode=new Array();
	var tab_report_credit=new Array();
	var tab_solde_regulariser=new Array();
	var tab_tva_paye=new Array();
	var tab_credit_tva=new Array();
	var tab_remboursement_credit_tva=new Array();
	
	var tab_credit_tva_reporter=new Array();
	var tab_credit_demande=new Array();
	
	
		for(i=0;i<13;i++){
			tab_ca_tax_0[i]=$('#CA_tax_0_'+i).val();
			tab_ca_tax_20[i]=$('#CA_tax_20_'+i).val();
			tab_ca_nt[i]=$('#CA_NT_'+i).val();
			tab_ca_tax_18[i]=$('#CA_tax_18_'+i).val();
			tab_ca_taxable[i]=$('#total_ca_taxable_'+i).val();
			tab_ca_ntax[i]=$('#CA_NTax_'+i).val();
			
			tab_total_ca_nt[i]=$('#total_ca_NT_'+i).val();
			tab_total_ca[i]=$('#total_CA_'+i).val();
			tab_tvac_20[i]=$('#TVAC_20_'+i).val();
			tab_tvac_18[i]=$('#TVAC_18_'+i).val();
			tab_tvac_autres[i]=$('#TVAC_Autres_'+i).val();
			tab_total_tvac[i]=$('#total_TVAC_'+i).val();
			
			tab_tvad_locaux_biens[i]=$('#TVAD_locaux_biens_'+i).val();
			tab_tvad_locaux_equip[i]=$('#TVAD_locaux_equip_'+i).val();
			tab_tvad_locaux_autres_biens[i]=$('#TVAD_locaux_autres_biens_'+i).val();
			tab_tvad_locaux_services[i]=$('#TVAD_locaux_services_'+i).val();
			tab_tvad_import_biens[i]=$('#TVAD_import_biens_'+i).val();
			tab_tvad_import_equip[i]=$('#TVAD_import_equip_'+i).val();
			
			tab_tvad_import_autres_biens[i]=$('#TVAD_import_autres_biens_'+i).val();
			tab_tvad_import_services[i]=$('#TVAD_import_services_'+i).val();
			tab_total_tvad[i]=$('#total_TVAD_'+i).val();
			tab_taxed_fin_prorata[i]=$('#TaxeD_fin_prorata_'+i).val();
			tab_taxed_prorata[i]=$('#TaxeD_prorata_'+i).val();
			tab_calcul_tvad_prorata[i]=$('#calcul_TVAD_prorata_'+i).val();
			
			tab_tvad_periode[i]=$('#TVAD_periode_'+i).val();
			tab_report_credit[i]=$('#report_credit_'+i).val();
			tab_solde_regulariser[i]=$('#solde_regulariser_'+i).val();
			tab_tva_paye[i]=$('#TVA_paye_'+i).val();
			tab_credit_tva[i]=$('#credit_TVA_'+i).val();
			tab_remboursement_credit_tva[i]=$('#remboursement_credit_TVA_'+i).val();
			
			tab_credit_tva_reporter[i]=$('#credit_TVA_reporter_'+i).val();
			tab_credit_demande[i]=$('#credit_demande_'+i).val();
			
		}
		
	$.ajax({
		type:'POST',
		url:'RDC/prod_client/H_information/ajout_stockage_G8.php',
		data:{tab0:tab_ca_tax_0, tab1:tab_ca_tax_20, tab2:tab_ca_nt, tab3:tab_ca_tax_18, tab4:tab_ca_taxable, tab5:tab_ca_ntax,
				tab6:tab_total_ca_nt,tab7:tab_total_ca,tab8:tab_tvac_20,tab9:tab_tvac_18,tab10:tab_tvac_autres,tab11:tab_total_tvac,
				tab12:tab_tvad_locaux_biens,tab13:tab_tvad_locaux_equip,tab14:tab_tvad_locaux_autres_biens,tab15:tab_tvad_locaux_services,
				tab16:tab_tvad_import_biens,tab17:tab_tvad_import_equip,tab18:tab_tvad_import_autres_biens,tab19:tab_tvad_import_services,
				tab20:tab_total_tvad,tab21:tab_taxed_fin_prorata,tab22:tab_taxed_prorata,tab23:tab_calcul_tvad_prorata,
				tab24:tab_tvad_periode,tab25:tab_report_credit,tab26:tab_solde_regulariser,tab27:tab_tva_paye,tab28:tab_credit_tva,
				tab29:tab_remboursement_credit_tva,tab30:tab_credit_tva_reporter,tab31:tab_credit_demande,periode:'totale'},
		success:function(e){
			//alert(e);
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
<body>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre">I - INFORMATIONS ET PRESENTATION PARTIE :I</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>S'assurer de la non compensation entre soldes débiteurs et créditeurs.</label><br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br/>
						<label><strong>.</strong>Balance auxiliaire comptes clients</label><br/><br/>
						<label><strong>.</strong>Bilan : détail actif</label><br/><br/><br/>
						
					<label><strong>Question :</strong></label><br/>
						<label>Les comptes clients à solde débiteur sont ils présentés à l'actif courant du bilan et ceux à solde créditeur au passif courant du bilan ?</label><br/><br/><br/>
						
					<label id="label"><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Questionnaires</label>
					<div id="upload" style="display:none;">
						<form method = "post" enctype="multipart/form-data" action="uploader_fichier.php" target="uploadFrame">
						<form>
							<label style="color:blue;"><strong>Pièce justificative :</strong></label><br/>
							<input type = "file" id = "file_upload" name = "file_upload"/>
							<input type="submit" name="import" value="Upload" id = "id_impotdoc"/>
							<br/><br/>
						</form>
						<iframe style="display:none;" name="uploadFrame"></iframe>
						
					</div>
				</div>
				</td>
				<td width="27.5%">
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;" />
					<input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;" />
					<br />			
					<div id="contenue_rdc" 
						<?php 
							if(@$_GET["information_visible"]!='OK')
							print 'style="display:none;"'
						?> >
						<label><strong>Question 1 :</strong></label><br />
						<label>Les comptes clients à solde débiteur sont ils présentés à l'actif courant du bilan et ceux à solde créditeur au passif courant du bilan ?</label>
						<select id="qcm1" onchange="choixqcm1()">
							<option value=""></option>
							<option value="oui" <?php if($qcm1=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm1=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm1=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1;?></textarea><br /><br />
			
					</div>
				</div>
				</td>
			</tr>
		</table>
			<div id="boite_retour" style="display:none;top:-18px">
				<table border="1">
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
