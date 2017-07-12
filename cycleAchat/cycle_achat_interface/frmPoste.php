<?php

include '../../connexion.php';

$mission_id=$_POST['mission_id'];

?>

<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
<script src="../../js/jquery.multi-select.js" type="text/javascript"></script>
<link href="../../css/multi-select.css" media="screen" rel="stylesheet" type="text/css">


<script>
	$(function(){
	//$('#optGrpPoste').multiSelect({ selectableOptgroup: true });
		$('#optgroup').multiSelect({
		  selectableHeader: "<div class='custom-header'>Postes clés </div>",
		  selectionHeader: "<div class='custom-header'>Personnels concérnés </div>"
		  
		});
		
		//Eto izy mety
		// $('#optgroup').multiSelect({ selectableOptgroup: true });
		
		$('#retPst').click(function(){
			$('#contenue_rsci').show();
			$('#contenue_poste_a').hide();
		});
		
		$('#suivPst').click(function(){
			text=$('#optgroup').val();
			// text=""+text+"";
			// var tab=text.split(',');
			mission_id=$('#mission_id_poste').val();
			entrepiseId=$('#entrepiseId').val();
			text=""+text+"";
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/enregPosteCycle.php',
				data:{text:text, mission_id:mission_id, entrepiseId:entrepiseId},
				success:function(){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_interface/Interface_A_Secondaire.php',
						data:{mission_id:mission_id, entrepiseId:entrepiseId},
						success:function(e){
							$('#contenue_objectif_A').html(e).show();
							$('#contenue_poste_a').hide();
						}	
					});	
				}
			});
				
		});
	});	
</script>

<div id="postA"><br />
<label><strong>Veuillez selectionner les personnels concernés par le cycle</strong></label><br /><br />
		<select id='optgroup' multiple='multiple'>
			<optgroup label=' '>
			<?php

			$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

			$donnees=$reponse->fetch();

			$eseId=$donnees['ENTREPRISE_ID'];

			$reponse1=$bdd->query('SELECT POSTE_CLE_ID,POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$eseId);

			while($donnees1=$reponse1->fetch()){

			?>
				<option value="<?php echo $donnees1['POSTE_CLE_ID'];?>"><?php echo $donnees1['POSTE_CLE_NOM'];?></option>
			<?php
			}
			?>
		</optgroup>
	</select><br />
		<input type="text" id="entrepiseId" value="<?php echo $eseId;?>" style="display:none;" />
		<input type="text" id="mission_id_poste" value="<?php echo $mission_id;?>" style="display:none;" />
		<input type="button" id="retPst" value="Retour" class="bouton" />&nbsp;&nbsp;&nbsp;
		<input type="button" id="suivPst" value="Suivant" class="bouton" />
	<!--div id="messPoste"><?php //include '../../cycleAchat/cycle_achat_message/messPoste.php';?></div-->
	<div id="messPosteVide"></div>
  </div>
  
