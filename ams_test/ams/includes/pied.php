<div id="msg">
123456789
</div>


<?php 

	@session_start();
	$non=@$_SESSION["NomEntr"];


		///////////////////////////////////// tokony mande fa tokony jerena ////////////////////////////////////////////////////////////////////
						$sqlListEntreprise='SELECT LOGO FROM  tab_entreprise Where ENTREPRISE_ID='.$ID;
						$reponseList=$bdd->query($sqlListEntreprise);
						$donnee_list=$reponseList->fetch();
						$logo=$donnee_list['LOGO'];
		/////////////////////////////////////////////////////////////////////////////////////////////////////////
		
			?>
			
<div class="editor_canvas" id="statut_societe">
	<div id="logo_societe"><!--img src="../<?php// if(@$logo!=""){echo $logo;} else{ echo "icone/logo_ams_blanc.png";}?>" height="100%" width="100%" /--></div>
	<div id="nom_societe"><span></span></div>
	<!--<canvas  class="canvas" id="canvasElem_editor" width="30" height="100%"> ici canvas</canvas>-->
</div>
<div id="chemin_navig">
		<div id="nom_mission">
			<div class="bord_ fin"></div>
			<span></span>
			<div class="bord_ debut"></div>
		</div>
	<div id="nom_process">
		<div class="bord_ fin"></div>
		<span></span>
	</div>
	<div id="nom_cycle"><span></span></div>
</div>

<div id="statut_utilisateur">
	<div id="btn_power"><a href="#fermer" class="Gest" id="power"> <img src="icone/btn_power.png"id="power" class="iconebr" title="Déconnecter<?php echo ' '.$userName;?> "/> </a></div>
	
	<div id="nom_utilisateur"><span><?php echo $userName;?></span></div>
</div>
<div id="accesoires">

	<div id="acc_msg"></div>
	<div id="acc_word" onclick="overWord()"></div>
	<div id="acc_exel"></div>

</div>

