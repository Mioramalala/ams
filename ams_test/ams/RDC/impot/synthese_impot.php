<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{
				width: 100%;
				height: 100%;
				font-size: 8pt;
			}
		</style>
<script src="RDC/js/synthese.js"></script>
<script>
function disableButtons() {
	document.getElementById('id_enregistrer_impot').disabled      = true;
	document.getElementById('bt_valider_synthese_impot').disabled = true;
	document.getElementById('bt_ajout').disabled                       = true;
	document.getElementById('bt_supp').disabled                        = true;
}

$(function(){
		var ligne = document.getElementById('nbLignes').value;

		$('#bt_supp').click(function(){
			if(parseInt(ligne)>1){
				var obs = document.getElementById('obs_'+ligne).value;
				var risque = document.getElementById('risque_'+ligne).value;	
				var recom = document.getElementById('recom_'+ligne).value;
				delete_Input(obs, risque, recom, <?php echo $mission_id; ?>);

				deleterow('tabB2');
				ligne = parseInt(ligne)-1;
				document.getElementById('nbLignes').value = ligne;
			}
		});
		
		$('#bt_ajout').click(function(){
			ligne = parseInt(ligne)+1;
			var tableau = document.getElementById('tabB2');

			row=document.createElement('tr');

			cell1=document.createElement('td');
			cell2=document.createElement('td');
			cell3=document.createElement('td');
			
   			text1=document.createElement('textarea');
   			text2=document.createElement('textarea');
   			text3=document.createElement('textarea');   		
   			
   			text1.id = "obs_"+ligne;
   			text2.id = "risque_"+ligne;
   			text3.id = "recom_"+ligne;


   				text1.setAttribute("name","obs_[]");
   				text2.setAttribute("name","risque_[]");
   				text3.setAttribute("name","recom_[]");




   			inputsynthese=document.createElement('input');
   			inputsynthese.setAttribute("type","hidden");
   			inputsynthese.setAttribute("name","SYNTHESE_ID[]");
   			inputsynthese.setAttribute("value","");

   			cell1.appendChild(inputsynthese); 	
   			
   			cell1.appendChild(text1);    
   			cell2.appendChild(text2);    
   			cell3.appendChild(text3);    
   			    			
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);	

			tableau.appendChild(row);
			document.getElementById('nbLignes').value = ligne;
		});
		getValidationSynthese('paie', <?php echo $mission_id;?>, function(e) {
			if(e === 'validee') {
				disableButtons();
			}
		});
});
	function delete_Input(obs, risque, recom, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/charge_fournisseur/delete_Input_charge.php',
			data:{obs:obs, risque:risque, recom:recom, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function deleterow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    table.deleteRow(rowCount -1);
	}
	
	function enregistrer_impot()
	{

		
		datatransfert=$("#frmenvoyersynthese").serialize();
		
			$.ajax({
				type:'GET',
				url:'RDC/impot/tableauimpot.php',
				data:datatransfert,
					success:function(e){
						//alert(e);
						alert('Synthèses bien enregistrées');
						//$('#dv_synthese_impot').hide();
					}
			});
		//}
		//alert('Synth\350ses bien enregistr\351es');
	}
	$(function(){
		$('#id_retour_impot').click(function(){
			waiting();$('#contenue').load('RDC/impot/feuille.php?mission_id='+<?php echo $mission_id; ?>,stopWaiting);		
		});
		
		$('#bt_validation_impot').click(function(){
			$('#dv_synthese_impot').fadeIn();
			getSynthese('impot', <?php echo $mission_id;?>, function(e) {
				document.getElementById("txt_synthese_impot").value = e;
			});
		});
				
		$("#id_annuler_synthese_impot").click(function(){
			$('#dv_synthese_impot').hide();
				
		});
		
		$('#fermeture_synthese_impot').click(function(){
			$('#dv_synthese_impot').hide();
		});
	});
	
	function valider_synthese_impot(){
			var synthese_impot=document.getElementById('txt_synthese_impot').value;

			validerSynthese('impot', <?php echo $mission_id;?>, synthese_impot, function(e) {
				$('#dv_synthese_impot').hide();
				alert('Synth\350ses bien enregistr\351es');
				disableButtons();
			});
		}
</script>
</head>
<body>

<form method="post"  id="frmenvoyersynthese">

	<table style="text-align:center;background-color:#00698d;color:white;width:100%;padding-top:5px;">
		<tr>
			<td><label>SYNTHESE IMPOTS ET TAXES</label></td>
		</tr>
	</table>
	
		<div id="bt_milahatra">
				<input type="button" value="Retour" id="id_retour_impot" style="width:100px;height:30px;float:right"/><br/><br/>
				<input type="button" value="Enregistrer" id="id_enregistrer_impot" onclick="enregistrer_impot()"  style="width:100px;height:30px;float:right"/><br/><br/>
				<input type="button" value="Validation" id="bt_validation_impot" style="width:100px;height:30px;float:right"><br/>
				
				
		</div><br/>

		 <div class="cadre">
			<table id="tabB2">
			
				<tr class="sous-titre">
					<td width="200px">Observations</td>
					<td width="200px">Risques</td>
					<td width="200px">Recommendations</td>
				</tr>
				
				<?php
					include '../../connexion.php';
			
					$reponse=$bdd->query('select * FROM tab_synthese_feuille_rdc where SYNTHESE_CYCLE="impot" AND  MISSION_ID='.$mission_id);
					(int)$ligne=1;

					while($donnees=$reponse->fetch())
					{
						?>

						<tr bgcolor="white">
							<td>
							<input type="hidden" name="SYNTHESE_ID[]" value="<?php print($donnees['SYNTHESE_ID']); ?>">
							<textarea cols="48" name="obs_[]"  id="obs_<?php echo $ligne ?>"><?php echo $donnees['SYNTHESE_OBS'] ;?></textarea></td>
							<td><textarea cols="48" name="risque_[]" id="risque_<?php echo $ligne ?>"><?php echo $donnees['SYNTHESE_RISQUE'] ;?></textarea></td>	
							<td><textarea cols="48" name="recom_[]" id="recom_<?php echo $ligne ?>"><?php echo $donnees['SYNTHESE_RECOM'] ;?></textarea></td>	
						</tr>
						<?php
						$ligne = $ligne +1;
					}
				?>
			</table>
			<div style="float:right;">
				<input type="button" id="bt_ajout" value="+" class="bouton" style="color:white; background-color:black;"/>
				<input type="button" id="bt_supp" value="-" class="bouton"  style="color:white; background-color:black;"/>
				<input type="hidden" id="nbLignes" value="<?php echo ($ligne-1)?>"/>
			</div>
		</div>


		</form>

<!------------------------------------------------------------synthese----------------------------------->
		<div id="dv_synthese_impot" data-options="handle:'#dragg_c'" align="center" style="display:none;position:absolute;top:150px;left:350px;width:500px;height:395px;background-color:#05abe1;border:5px solid #ccc;">
			<div id="dragg_c" class="td_Titre_Question"><br />SYNTHESE</div>
				<table width="500" bgcolor="#00698d">
					<tr>
						<td class="td_Titre_Question" align="center"><textarea id="txt_synthese_impot" cols="40" style=" width:400px;height:300px"></textarea></td>
					</tr>
					<tr>
						<td align="center">
							<input type="button" id="bt_valider_synthese_impot" value="Enregistrer" class="bouton" onclick="valider_synthese_impot();"/>&nbsp;&nbsp;&nbsp;
							<input type="button" value="Annuler" class="bouton" id="id_annuler_synthese_impot"/>
						</td>
					</tr>
				</table>
				<div id="fermeture_synthese_impot" style="top:-20px;left:490px;position:absolute;"><img src="../cycle_achat_image/Fermer.png" /></div>
			</div>
		</div>
		



</body>