<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

?>

<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script src="../js/jquery.multi-select.js" type="text/javascript"></script>
<link href="../css/multi-select.css" media="screen" rel="stylesheet" type="text/css">


<script>
	var ajaxLoading = false;

	// Droit cycle by Tolotra
    // Page : RSCI -> Cycle Trésorerie
    // Tâche : Revue Cotrôles Trésorerie, numéro 26
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 26},
        success: function (e) {
            var result = 0 === Number(e);
            $("#suivPstra").attr('disabled', result);
            $("#bouton-popup").attr('disabled', result);
        }
    });

	$(function(){
	//$('#optGrpPoste').multiSelect({ selectableOptgroup: true });
		$('#optgroup').multiSelect({
		  selectableHeader: "<div class='custom-header'>Postes clés </div>",
		  selectionHeader: "<div class='custom-header'>Personnels concérnés </div>"

		});

		//Eto izy mety
		// $('#optgroup').multiSelect({ selectableOptgroup: true });

        $('#bouton-popup').bind('click', function(e) {
                $('#element_to_pop_up').fadeIn("slow");
        });

        $('.bouton-close').bind('click', function(e) {
                $('#element_to_pop_up').fadeOut("slow");
        });

		$('#enregistrer_poste').click(function(){
			var nom_poste=$('#nom_poste').val();
			var titulaire=$('#titulaire').val();
			var eseId=$('#entrepiseId').val();
			if( nom_poste.length<1 || titulaire.length<1 ){
				alert("Veuillez remplir tous les champs.");
			}
			else{
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettea/php/enregistrer_poste_cle.php',
					data:{nom_poste:nom_poste,titulaire:titulaire,eseId:eseId},
					success:function(e){
						if(e==0){
						alert("Le poste a ete enregistre avec succes."+e);
                		$('#element_to_pop_up').fadeOut("slow");
                		mission_id=$('#mission_id_poste').val();
                			$.ajax({
								type:'POST',
								url:'cycleRecette/Recettea/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteRa').html(e).show();
								}
							});
						}
						else{alert("Le poste existe deja.");}
                	}
				});
			}
		});


		$('#retPstra').click(function(){
			// $('#contRecette').load('../cycleRecette/Recette.php?missionId='+<?php echo $mission_id; ?>);
			$('#contPosteRa').hide();
			$('#contRsciRecette').show();
		});

		$('#suivPstra').click(function(){
			text=$('#optgroup').val();
			mission_id=$('#mission_id_poste').val();
			entrepiseId=$('#entrepiseId').val();
			text=""+text+"";
			if(text=="null"){$('#messPosteVide').show();}
			//SINON
			else{
			if (ajaxLoading==false) {
				// alert("FALSE");
					$.ajax({
						type:'POST',
						url:'cycleRecette/Recettea/php/enregPosteCycle.php',
						data:{text:text, mission_id:mission_id, entrepiseId:entrepiseId},
						success:function(e){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recettea/form/Interface_ra_Secondaire.php',
								data:{mission_id:mission_id, entrepiseId:entrepiseId},
								success:function(e1){
									$('#contPosteRa').hide();
									$('#contra').show();
									$('#contra').html(e1);
								}
							});
						}
					});
					ajaxLoading = true;
				}
			}
		});
	});
</script>

<div id="postra"><br />
<label><strong>Veuillez selectionner les personnels concernés rar le cycle</strong></label><br /><br />
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
		<input type="button" id="retPstra" value="Retour" class="bouton" />&nbsp;&nbsp;&nbsp;
		<input type="button" id="suivPstra" value="Suivant" class="bouton" />
		<!-- POPUP -->
		<button id="bouton-popup" class="bouton">Ajouter un poste cle</button>
				<div id="element_to_pop_up" display="none">
				    	<form>
				    		<input type="text" placeholder="Nom du poste" id="nom_poste" required/>
				       		<input type="text" placeholder="Titulaire" id="titulaire" required/>
				       		<input type="button" id="enregistrer_poste" value="Accepter"/>
		       				<input type="button" value="x" class="bouton-close"/>
				    	<form>
				</div>
		<!-- POPUP -->
	<!--div id="messPoste"><?php //include '../../cycleRecette/Recettea/sms/messPoste.php';?></div-->
	<!-- <div id="messPosteVide"></div> -->
  </div>
    	<div id="messPosteVide"><?php include '../../../cycleRecette/Recettea/sms/messPoste.php';?></div>

