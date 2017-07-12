<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
	$reponse1=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and MISSION_ID='.$mission_id.' and RDC_RANG=3');

	$donnees=$reponse1->fetch();

	$commentaire1=$donnees['RDC_COMMENTAIRE'];
	$qcm1=$donnees['RDC_REPONSE'];

	$reponse2=$bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="H" and MISSION_ID='.$mission_id.' and RDC_RANG=4');

	$donnees2=$reponse2->fetch();

	$commentaire2=$donnees2['RDC_COMMENTAIRE'];
	$qcm2=$donnees2['RDC_REPONSE'];

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
		$('#bt_retour1').click(function(){
				$("#contenue").load("RDC/prod_client/H_information/information2.php");
		});
		
		$('#revue').click(function(){
			$('#bt_precedent').show();
			$('#bt_suivant').show();
			$('#contenue_rdc').show();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/prod_client/H_information/table_G9.php");
		});
		
		$('#bt_suivant').click(function(){
			$('#progressbarRDC').show();
			var reponse2=$('#qcm2').val();
			var commentaire2=$('#comment2').val();
			if((reponse2=="non" && commentaire2=="") || reponse2==""){ 
				alert('Des réponses obligatoires ont été omises!');
			} 
			else{
				add_Data(reponse2,commentaire2,'prod_client','H',4,<?php echo $mission_id; ?>);
				enregistrerTableG9();
				$('#contenue').load("RDC/prod_client/index.php");
			}
		});
		
		$('#bt_non').click(function(){
			$("#contenue").load("RDC/prod_client/index.php");
		});
		
		$('#bt_oui').click(function(){
			alert("ok");
		});
		$('#bt_precedent').click(function(){
			$("#contenue").load("RDC/prod_client/H_information/information3.php");
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
	
	function enregistrerTableG9(){
		var compte=parseInt($('#nbLignes').val());
		console.log(compte);
		
		//for(i=0;i<compte;i++){
			var a=$('#ventil_nature_').text();
			var a2=$('#ventil_note_').val();
			var b=$('#engage_nature_').text();
			var b2=$('#engage_note_').val();
			var c=$('#clause_nature_').text();
			var c2=$('#clause_note_').val();
			var d=$('#op_nature_').text();
			var d2=$('#op_note_').val();
			var e=$('#effet_nature_').text();
			var e2=$('#effet_note_').val();
			//var f=$('#autre_nature_').val();
			//var f2=$('#autre_note_').val();

			addData(a,a2);
			addData(b,b2);
			addData(c,c2);
			addData(d,d2);
			addData(e,e2);
			//addData(f,f2);

			for(i=1;i<compte;i++){
				var g=$('#autre_nature_'+i).val();
				var g2=$('#autre_note_'+i).val();
				console.log("Ajout de nature "+g+", annexe "+g2);
				addData(g,g2);
			}
		//}
	}
	function addData(nature, donnees){
	$.ajax({
		type:'POST',
		url:'RDC/prod_client/H_information/ajout_note_G9.php',
		data:{nature:nature, donnees:donnees, mission_id:mission_id},
		success:function(){
		}
	});	
}
	function choixqcm2(){
		var reponse2=$('#qcm2').val();
		var commentaire2=$('#comment2').val();
		if(reponse2=="non" && commentaire2==""){
			alert('Des commentaires obligatoires ont été omis!');
		}
	}
	
</script>
<body>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre">I - INFORMATIONS ET PRESENTATION PARTIE :III</label></center></td>
		</tr>
	</table>
	<div style="overflow:auto;" >
		<table width="100%" height="470">
			<tr>
				<td width="72.5%">
				<div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
					<label><strong>Travaux à faire :</strong>
					<br/>Vérifier les informations données en annexe : ventilation des créances, effets escomptés non échus, clause de réserve de propriété, opérations avec des entreprises liées, effets à recevoir, ventilation du chiffre d'affaires net,…</label>
					<br/><br/><br/>
					
					<label><strong>Documents et infos à obtenir</strong></label><br/>
						<label><strong>.</strong>Autres informations liées au cycle.</label><br/><br/>
						<label><strong>.</strong>Etats financiers et notes annexes</label><br/><br/><br/>
						
					<label><strong>Question :</strong></label><br/>
				<label>Confirmez - vous que les détails des comptes clients sont présentés en annexes ?</label><br/><br/><br/>
						
					<label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">Elements en annexes</label>	
				</div>
				</td>
				<td width="27.5%">
				<div id="contenue_question" style="overflow;height:450px;" >
					<input type="button" id="bt_suivant" value=">I" class="bouton" style="float:right;display:none" />
					<input type="button" id="bt_retour1" value="<" class="bouton" style="float:right;" />
					
					<div id="contenue_rdc" 
						<?php 
							if(@$_GET["information_visible"]!='OK')
							print 'style="display:none;"'
						?> >
						
						<label><strong>Question :</strong></label><br />
						<label>Confirmez - vous que les détails des comptes clients sont présentés en annexes ?</label>
						<select id="qcm2" onchange="choixqcm2()">
							<option value=""></option>
							<option value="oui" <?php if($qcm2=="oui") echo 'selected'; ?> >Oui</option>
							<option value="na" <?php if($qcm2=="na") echo 'selected'; ?> >N/A</option>
							<option value="non" <?php if($qcm2=="non") echo 'selected'; ?> >Non</option>
						</select><br /><br />
						<label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br />
						<textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2;?></textarea><br />
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
	<div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
			<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
		</div>
</body>
</html>
