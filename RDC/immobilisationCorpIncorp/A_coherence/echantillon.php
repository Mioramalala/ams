<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
	include "$project_path/connexion.php";
?>
<script>

		function sezam(){
			console.log("e");
				$("#btn_tel").show();
		}

	$(function(){
		$("#btn_tel").click(function(){
			  valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
			  $.ajax({
				type:"POST",
				url:"RDC/immobilisationCorpIncorp/A_coherence/GetEchant_GL.php",
				data:valTransfert,
				success:function(e){
					//alert(e);
					$('#SELECT_echantillon').hide();
					$('#contenue_question').show();
					$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");	
				}
			 });
		});
		//Renvoi B5.2
		$('#afficheEchantillon').click(function(){
			$('#SELECT_echantillon').hide();
			$('#contenue_question').show();
			$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");
			$("#contenue_travail").css("height","350px");
		});
	});
</script>

	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><label class="grand_Titre" style="color:#fff;">PRELEVEMENT DES ECHANTILLON DU GRAND LIVRE </label></td>
		</tr>
	</table>

	<div id="echant_GL" style="width:auto" >
		<table id="tbl_ech">
			<tr>
				<td></td>
				<td width="90px">Compte</td>
				<td width="265px">Date</td>
				<td width="265px">Journal</td>
				<td width="265px">Reference</td>
				<td width="265px">Libelle</td>
				<td width="265px">Débit</td>
				<td width="265px">Crédit</td>
				<td width="265px">Solde</td>
			</tr>
			<?php 
				$reponse=$bdd->query("SELECT GL_GEN_ID,GL_GEN_COMPTES ,GL_GEN_DATE ,GL_GEN_JL,GL_GEN_REF, GL_GEN_LIBELLE, GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE,GL_GEN_CYCLE 

   			 	FROM tab_gl_gen

     			WHERE GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']." UNION 

			     SELECT GL_GENC2_ID,GL_GENC2_COMPTES ,GL_GENC2_DATE ,GL_GENC2_JL,GL_GENC2_REF, GL_GENC2_LIBELLE,
			    GL_GENC2_DEBIT,GL_GENC2_CREDIT,GL_GENC2_SOLDE,GL_GENC2_CYCLE FROM tab_gl_genc2 WHERE GL_GENC2_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."

			    UNION 
			    SELECT GL_GENC3_ID,GL_GENC3_COMPTES ,GL_GENC3_DATE ,GL_GENC3_JL,GL_GENC3_REF, GL_GENC3_LIBELLE,
			    GL_GENC3_DEBIT,GL_GENC3_CREDIT,GL_GENC3_SOLDE,GL_GENC3_CYCLE FROM tab_gl_genc3 WHERE GL_GENC3_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC4_ID,GL_GENC4_COMPTES ,GL_GENC4_DATE ,GL_GENC4_JL,GL_GENC4_REF, GL_GENC4_LIBELLE,
			    GL_GENC4_DEBIT,GL_GENC4_CREDIT,GL_GENC4_SOLDE,GL_GENC4_CYCLE FROM tab_gl_genc4 WHERE GL_GENC4_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC5_ID,GL_GENC5_COMPTES ,GL_GENC5_DATE ,GL_GENC5_JL,GL_GENC5_REF, GL_GENC5_LIBELLE,
			    GL_GENC5_DEBIT,GL_GENC5_CREDIT,GL_GENC5_SOLDE,GL_GENC5_CYCLE FROM tab_gl_genc5 WHERE GL_GENC5_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC6_ID,GL_GENC6_COMPTES ,GL_GENC6_DATE ,GL_GENC6_JL,GL_GENC6_REF, GL_GENC6_LIBELLE,
			    GL_GENC6_DEBIT,GL_GENC6_CREDIT,GL_GENC6_SOLDE,GL_GENC6_CYCLE FROM tab_gl_genc6 WHERE GL_GENC6_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			UNION
			    SELECT GL_GENC7_ID,GL_GENC7_COMPTES ,GL_GENC7_DATE ,GL_GENC7_JL,GL_GENC7_REF, GL_GENC7_LIBELLE,
			    GL_GENC7_DEBIT,GL_GENC7_CREDIT,GL_GENC7_SOLDE,GL_GENC7_CYCLE FROM tab_gl_genc7 WHERE GL_GENC7_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']);
			  

				while($donnees=$reponse->fetch())
				{
						$id=$donnees['GL_GEN_ID'];
						$Comp=$donnees['GL_GEN_COMPTES'];
						$date=$donnees['GL_GEN_DATE'];
						$jl=$donnees['GL_GEN_JL'];
						$ref=$donnees['GL_GEN_REF'];
						$libelle=$donnees['GL_GEN_LIBELLE'];
						$debit=$donnees['GL_GEN_DEBIT'];
						$crd=$donnees['GL_GEN_CREDIT'];
						$sold=$donnees['GL_GEN_SOLDE'];

						$sql="select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl	
						from tab_ehantillon_gl 
						where
						compt_ech_gl='$Comp' AND  id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' and ref_ech_gl='$ref'
						ORDER BY compt_ech_gl
						" ;

						
						$rps_echantcheck=$bdd->query($sql);
						$don=$rps_echantcheck->fetch();
					   ?>
					<tr>
						<td><input <?php if($don!=null){?> checked <?php } ?> type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="listId[]" onchange="sezam()"/></td>
						<td><?php echo $Comp;?></td>
						<td><?php echo $date;?></td>
						<td><?php echo $jl;?></td>
						<td><?php echo $ref;?></td>
						<td><?php echo $libelle;?></td>
						<td><?php echo $debit;?></td>
						<td><?php echo $crd;?></td>
						<td><?php echo $sold;?></td>
					</tr>
		   <?php } ?>
		</table>
	  
	</div> 
	<input id="btn_tel" style="display:none;" value="Telecharger les echantillons">
	<input type="button" id="afficheEchantillon" value="Afficher les échantillons">
	</div>