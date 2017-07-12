<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse3=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['RDC_COMMENTAIRE'];
$qcm3=$donnees3['RDC_REPONSE'];

$reponse4=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="C" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

$donnees4=$reponse4->fetch();

$commentaire4=$donnees4['RDC_COMMENTAIRE'];
$qcm4=$donnees4['RDC_REPONSE'];

?>

<html>
<head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
</head>
<script>
	//$(function(){
		$('#bt_retour').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#bt_retour_1').click(function(){
			$("#contenue").load("RDC/charge_fournisseur/index.php");
		});
		$('#revue').click(function(){
			$('#bt_retour_1').hide();
			$('#contenue_question').show();
			$('#bt_suiv_retour').show();
			$('#contenue_rdc').show();
			$('#contenue_travail').load("RDC/charge_fournisseur/C_regularite/table_F7.php");
		});
		
		$('#bt_suivant').click(function(){
			var reponse3=$('#qcm3').val();
			var commentaire3=$('#comment3').val();
			var reponse4=$('#qcm4').val();
			var commentaire4=$('#comment4').val();
			if((reponse3=="non" && commentaire3=="") || (reponse4=="non" && commentaire4=="") || reponse3=="" || reponse4==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse3,commentaire3,'charge_fournisseur','C',3,<?php echo $mission_id; ?>);
				add_Data(reponse4,commentaire4,'charge_fournisseur','C',4,<?php echo $mission_id; ?>);
				//enregistrerTableF6();
				 i = $("tr[id^=trBlEtr]:last").attr('id') ;
            	/([0-9]+)/.exec(i);
            	i = RegExp.$1 ;
            	i = parseFloat(i) +1 ;
				for(var x = 1 ; x<i ; x++){
					var reference = 'BalAuxFrnsEtr1' ;
					var compte = $("#BlAuxEtr1Cpt"+x).val() ;
					var libelle = $("#BlAuxEtr1Lbl"+x).val() ;
					var solde = $("#BlAuxtEtr1Sol"+x).val() ;
					var justification = $("#BlAuxtEtr1Just"+x).val() ;
					//alert(compte) ;
					$.ajax({
                    type:'POST',
                    url:'RDC/charge_fournisseur/C_regularite/addDataTableF7.php',
                    data:{reference:reference, compte:compte, libelle:libelle, solde:solde, justification:justification, mission_id:<?php echo $mission_id; ?>},
                    success:function(e){
                    	//alert(e) ;
                    }
                });
				}
				////////////////////////////////////////////////////
				 i = $("tr[id^=trBlGpe]:last").attr('id') ;
            	/([0-9]+)/.exec(i);
            	i = RegExp.$1 ;
            	i = parseFloat(i) +1 ;
				for( x = 1 ; x<i ; x++){
					reference = 'BalAuxFrnsGpe' ;
					compte = $("#BlAuxGpeCpt"+x).val() ;
					libelle = $("#BlAuxGpeLbl"+x).val() ;
					solde = $("#BlAuxtGpeSol"+x).val() ;
					justification = $("#BlAuxtGpeJust"+x).val() ;
					
					$.ajax({
                    type:'POST',
                    url:'RDC/charge_fournisseur/C_regularite/addDataTableF7.php',
                    data:{reference:reference, compte:compte, libelle:libelle, solde:solde, justification:justification, mission_id:<?php echo $mission_id; ?>},
                    success:function(e){
                    	
                    }
                });
				}
				////////////////////////////////////////////////////
				 i = $("tr[id^=BlAuxEtr2]:last").attr('id') ;
            	/([0-9]+)/.exec(i);
            	i = RegExp.$1 ;
            	i = parseFloat(i) +1 ;
				for( x = 1 ; x<i ; x++){
					reference = 'BalAuxFrnsEtr2' ;
					compte = $("#BlAuxEtr2Cpt"+x).val() ;
					libelle = $("#BlAuxEtr2Lbl"+x).val() ;
					solde = $("#BlAuxtEtr2Sol"+x).val() ;
					justification = $("#BlAuxtEtr2Just"+x).val() ;
					
					$.ajax({
                    type:'POST',
                    url:'RDC/charge_fournisseur/C_regularite/addDataTableF7.php',
                    data:{reference:reference, compte:compte, libelle:libelle, solde:solde, justification:justification, mission_id:<?php echo $mission_id; ?>},
                    success:function(e){
                    	
                    }
                });
				}
				////////////////////////////////////////////////////
				 i = $("tr[id^=trBlLoc1]:last").attr('id') ;
            	/([0-9]+)/.exec(i);
            	i = RegExp.$1 ;
            	i = parseFloat(i) +1 ;
				for (x = 1 ; x<i ; x++){
					reference = 'BalAuxFrnsLoc1' ;
					compte = $("#BlAuxLoc1Cpt"+x).val() ;
					libelle = $("#BlAuxLoc1Lbl"+x).val() ;
					solde = $("#BlAuxtLoc1Sol"+x).val() ;
					justification = $("#BlAuxtLoc1Just"+x).val() ;
					
					$.ajax({
                    type:'POST',
                    url:'RDC/charge_fournisseur/C_regularite/addDataTableF7.php',
                    data:{reference:reference, compte:compte, libelle:libelle, solde:solde, justification:justification, mission_id:<?php echo $mission_id; ?>},
                    success:function(e){
                    	
                    }
                });
				}
				////////////////////////////////////////////////////
				i = $("tr[id^=BlAuxLoc2]:last").attr('id') ;
            	/([0-9]+)/.exec(i);
            	i = RegExp.$1 ;
            	i = parseFloat(i) +1 ;
				for(x = 1 ; x<i ; x++){
					reference = 'BalAuxFrnsLoc2' ;
					compte = $("#BlAuxLoc2Cpt"+x).val() ;
					libelle = $("#BlAuxLoc2Lbl"+x).val() ;
					solde = $("#BlAuxtLoc2Sol"+x).val() ;
					justification = $("#BlAuxtLoc2Just"+x).val() ;
					
					$.ajax({
                    type:'POST',
                    url:'RDC/charge_fournisseur/C_regularite/addDataTableF7.php',
                    data:{reference:reference, compte:compte, libelle:libelle, solde:solde, justification:justification, mission_id:<?php echo $mission_id; ?>},
                    success:function(e){
                    	
                    }
                });
				}
				////////////////////////////////////////////////////
				$("#contenue").load("RDC/charge_fournisseur/index.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/C_regularite/index.php");
		});
		
		$('#bt_oui').click(function(){
		
		});
	
//	});
	function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/C_regularite/add_Data.php',
			data:{reponse:reponse, commentaire:commentaire, cycle:cycle, objectif:objectif, rang:rang, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function enregistrerTableF6(){
		var compte=$('#makacompte').val();
		for(i=0;i<compte;i++){
			var id_compte=$('#id_compte_'+i).val();
			var id_libelle=$('#id_libelle_'+i).val();
			var id_res=$('#id_res_'+i).val();
			var id_justification=$('#id_justification_'+i).val();
			var id_observation=$('#id_observation_'+i).val();
		
			$.ajax({
				type:'POST',
				url:'RDC/charge_fournisseur/C_regularite/ajout_stockage_F6.php',
				data:{id_compte:id_compte,id_libelle:id_libelle, id_res:id_res,id_justification:id_justification,id_observation:id_observation,mission_id:<?php echo $mission_id;?>},
				success:function(e){
					//alert(e);
				}
			});
			
		}
	}
	function choixqcm3(){
		var reponse3=$('#qcm3').val();
		var commentaire3=$('#comment3').val();
		if(reponse3=="non" && commentaire3==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
	function choixqcm4(){
		var reponse4=$('#qcm4').val();
		var commentaire4=$('#comment4').val();
		if(reponse4=="non" && commentaire4==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td class="grand_Titre"><center><label>C - REGULARITE DES ENREGISTREMENTS : Partie 3 - VALIDATION DES FOURNISSEURS A SOLDE DEBITEUR</label></center></td>
	</tr>
</table>
<div style="overflow:auto;" >
<table width="100%" height="470">
	<tr>
		<td width="72.5%">
		<div id="contenue_travail" style="height:400px;width:900px;">
			<label><strong>Travaux à faire :</strong>
			<br /><br />Contrôler la régularité des enregistrements.</label><br /><br /><br /><br />
			<label><strong>Documents et infos à obtenir</strong></label><br /><br />
			<label><strong>.</strong>Factures/pièces justificatives/bons de commande/bons de livraison des opérations sélectionnées dans le grand livre de charges (Si possible par la méthode du 20/80)</label><br /><br /><br />
			<label><strong>.</strong>Grand livre auxiliaire des comptes de fournisseurs</label><br /><br /><br /><br />
			<label><strong>Question 1 :</strong></label><br /><br />
			<label>Les achats et les paiements ont-ils été enregistrés aux tiers correspondants ?</label><br /><br /><br /><br />	
			<label><strong>Question 2 :</strong></label><br /><br />
			<label>Avez-vous contrôlé le bon traitement des avances et acomptes?</label><br /><br /><br /><br />	
			<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Validation des fournisseurs à solde debiteur</label>	
		</div>
		</td>
		<div id="bt_suiv_retour" style="display:none;">
			<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;width:175px;" />
			<input type="button" id="bt_retour" value="<" class="bouton" style="float:right;width:175px;" />	
		</div>
		<td width="27.5%">
		<input type="button" id="bt_retour_1" value="<" class="bouton" style="display:block;top:-210px;float:right;position:relative;width:175px;"/>
		<div id="contenue_question" style="overflow:auto;height:450px;">
					
			<div id="contenue_rdc" 
			<?php 
				if(@$_GET["regularite_visible"]!='OK')
				print 'style="display:none;"'
			?>>
				<label><strong>Question 1 :</strong></label><br />
				<label>Les achats et les paiements ont-ils été enregistrés aux tiers correspondants ?</label>
				<select id="qcm3" onchange="choixqcm3()">
					<option value=""></option>
					<option value="oui" <?php if($qcm3=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm3=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm3=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3;?></textarea><br />
				<label><strong>Question 2 :</strong></label><br />
				<label>Avez-vous contrôlé le bon traitement des avances et acomptes?</label>
				<select id="qcm4" onchange="choixqcm4()">
					<option value=""></option>
					<option value="oui" <?php if($qcm4=="oui") echo 'selected'; ?> >Oui</option>
					<option value="N/A" <?php if($qcm4=="N/A") echo 'selected'; ?> >N/A</option>
					<option value="non" <?php if($qcm4=="non") echo 'selected'; ?> >Non</option>
				</select><br />
				<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
				<textarea id="comment4" cols="35" rows="10"><?php echo $commentaire4;?></textarea><br />
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
<div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br/>Veuillez patienter s'il vous plaît</center>
	</div>
</body>
</html>
