<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
	include "$project_path/connexion.php";
$mission_id=@$_SESSION['idMission'];
?>
<script type="text/javascript">
	
	 $(function()
	{
		$("#tbl_B52 .inputcheckbox").click(function (res)
		{
			id_echantillon_GL=$(this).val();
			alphabe_echant=$(this).attr("id");
			cocher_chantillion=0;


			if($(this).is(':checked'))
			{
				cocher_chantillion=1;
			}

			$.post("RDC/immobilisationCorpIncorp/A_coherence/update_checkedEchantillion.php",{alphabe_echant:alphabe_echant,cocher_chantillion:cocher_chantillion,id_echantillon_GL:id_echantillon_GL},function (e)
			{
				//alert(e);
			});

		});
			$("#RETOUR_relevmntEchant").click(function ()
			{
				//alert("retout");
				$('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/echantillon.php");
			});
	});
</script>
<div >
<input type="button" style="font-size: 18px;color: white;background-color: #00698d" value="RETOUR RELEVEMENT DES ECHANTILLON" id="RETOUR_relevmntEchant" ><br>
<label>PRINCIPES DE COMPTABILISATION </label><br/>
<b>2. Appréciation des différents critères</b>
	<ul>
		<li>A- Porteur d'avantages économiques futurs ?</li>
		<li>B- Eléments contrôlés ?</li>
		<li>C- Son coût est évalué avec une fiabilité suffisante ?</li>
		<li>D- Dont l'entité attend qu'il soit utilisé au-delà de l'exercice en cours ?</li>
		<li>E - Dont l'entité attend qu'il soit utilisé au-delà de l'exercice en cours ?</li>
	</ul>
<style>
	#tbl_B52{
	border-collapse:collapse;
	}
	#tbl_B52 td {
	border:2px solid #025387;

	}
	#b52{
	margin-left:100px;
	overflow:auto;
	}
</style>
<div id="b52" style="display:block;">
	<table id="tbl_B52">
			<tr>
				<td width="400px"></td>
				<td width="30px">A</td>
				<td width="30px">B</td>
				<td width="30px">C</td>
				<td width="30px">D</td>
				<td width="30px">E</td>
			</tr>

			</table>

</div>			
<div id="b52" style="display:inline-block;overflow-y: scroll;max-height: 200px;">
			<table id="tbl_B52">
			<?php 
				$sql="select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl,A,B,C,D,E
			 		from  tab_ehantillon_gl
				 	where  objectif='A5' AND GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND id_mission='$mission_id'
					ORDER BY compt_ech_gl
				";

				
				$reponse=$bdd->query($sql);
				while($donnees=$reponse->fetch())
				{
				?>
			
					<tr>
						<td width="400px"><?php echo $donnees['libelle_ech_gl'];?></td>
						<td width="30px"><input class="inputcheckbox"  id="A"    <?php if($donnees["A"]==1) {?>checked<?php } ?> type="checkbox" name="radName[]" multiple='multiple' id="<?php echo 'A'.$donnees['id_echantillon_GL'];?>" value="<?php echo $donnees['id_echantillon_GL'];?>"/></td>
						<td width="30px"><input class="inputcheckbox"  id="B"   <?php if($donnees["B"]==1) {?>checked<?php } ?> type="checkbox" name="radName[]" multiple='multiple' id="<?php echo 'B'.$donnees['id_echantillon_GL'];?>" value="<?php echo $donnees['id_echantillon_GL'];?>"/></td>
						<td width="30px"><input class="inputcheckbox"  id="C"   <?php if($donnees["C"]==1) {?>checked<?php } ?> type="checkbox" name="radName[]" multiple='multiple' id="<?php echo 'C'.$donnees['id_echantillon_GL'];?>" value="<?php echo $donnees['id_echantillon_GL'];?>"/></td>
						<td width="30px"><input class="inputcheckbox"  id="D"   <?php if($donnees["D"]==1) {?>checked<?php } ?> type="checkbox" name="radName[]" multiple='multiple' id="<?php echo 'D'.$donnees['id_echantillon_GL'];?>" value="<?php echo $donnees['id_echantillon_GL'];?>"/></td>
						<td width="30px"><input class="inputcheckbox"  id="E"   <?php if($donnees["E"]==1) {?>checked<?php } ?> type="checkbox" name="radName[]" multiple='multiple' id="<?php echo 'E'.$donnees['id_echantillon_GL'];?>" value="<?php echo $donnees['id_echantillon_GL'];?>"/></td>
						
					</tr>
			
			<?php } ?>
		</table>
</div>
	
