<?php
	@session_start();
	include '../../../connexion.php';

	$synthese = '';

	$req = $bdd->query(" SELECT SYNTHESE FROM tab_synthese_rsci WHERE CYCLE = 'info' AND MISSION_ID =".$_SESSION['idMission']." ");
	$ligne = $req->rowCount();

	if( $ligne != 0 ){
		$donnee = $req->fetch();
		$synthese = $donnee['SYNTHESE'];
	}
?>
<script>
$(function(){
	$('#Synthese_concl_Precedent').click(function(){
		$('#message_Synthese_concl').hide();
		$('#fancybox_concl').hide();
	});
	$('#Synthese_concl_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_concl").value=="") || (document.getElementById("rd_Synthese_concl_Faible").checked==false && document.getElementById("rd_Synthese_concl_Moyen").checked==false && document.getElementById("rd_Synthese_concl_Eleve").checked==false)){
			// alert("vide");
			$('#mess_vide_synthese_concl').show();
			$('#message_Synthese_concl').hide();
		}
		else{
			//alert("non vide");
			$('#message_concl_Synthese_Terminer').show();
			$('#message_Synthese_concl').hide();
		}
	});
	$('#fermer_Synthese_concl').click(function(){
		$('#message_Synthese_concl').hide();
		$('#fancybox_concl').hide();
	});
});

</script>
<div id="int_Synhtese_concl">
	<table width="500">
		<tr>
			<td>
				<table width="139">
					<tr style="height:20px;" bgcolor="#05abe1">
						<td class="label_Question" align="center">
							Niveau de risque :<br /><br />
							<table>
								<tr>
									<td class="label_Question">
										<input type="radio" id="rd_Synthese_concl_Faible" name="rd_Synthese_concl" />Faible<br />
										<input type="radio" id="rd_Synthese_concl_Moyen" name="rd_Synthese_concl"  />Moyen<br />
										<input type="radio" id="rd_Synthese_concl_Eleve" name="rd_Synthese_concl" />Elevé
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="234"></td>
					</tr>
				</table>
			</td>
			<td>
				<table>
					<tr>
						<td class="td_Titre_Question"><textarea id="txt_Synthese_concl" cols="40" rows="20" placeholder="Saisissez votre conclusion ici ..."><?php echo $synthese; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="Synthese_concl_Precedent" value="Annuler" class="bouton" />&nbsp;&nbsp;&nbsp;
				<input type="button" id="Synthese_concl_Terminer" value="Terminer" class="bouton" <?php //if($conclusionId!=0) echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
<div id="fermer_Synthese_concl"></div>
</div>