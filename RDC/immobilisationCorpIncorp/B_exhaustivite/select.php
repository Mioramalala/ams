<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
?>

<script>
	$(function(){
		$("#btn_tel").click(function(){
			
			valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
			$.ajax({
				type:"POST",
				url:"RDC/immobilisationCorpIncorp/B_exhaustivite/postExost.php",
				data:valTransfert,
				success:function(e){
					$('#contenue_travail').load("RDC/immobilisationCorpIncorp/B_exhaustivite/table_B6.php");
					$('#contenue_rdc').show();
				}
			 });
		});
	
	});

</script>

	
	<style>
		#tbl_ech{
		border-collapse:collapse;
		}
		#tbl_ech td{
			border:1px solid;
			background-color:#FFFAFA;
			
		}
		#echant_GL{
		overflow:auto;
		height:200px;
		width:100%;
		}
		#btn_tel{
		border:1px solid #ccc;
		background-color:#efefef;
		border-radius:8px;
		width:150px;
		height:auto;
		}
		#btn_tel:hover
		{
		cursor:pointer;
		background-color:#0074bf;
		color:#fff;		}
		#tet{
		margin-left:-17px;
		margin-top:20px;
		border-collapse:collapse;
		}
		#tet td{
			border:1px solid #ccc;
			background-color:#0074bf;
			color:#fff;
		}
		
	</style>
<div align="center">
<label>VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS 3. Détermination du coût d'acquisition/production</label>
	<center>
	
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre" style="color:#fff;">PRELEVEMENT DES ECHANTILLON DU GRAND LIVRE </label></center></td>
		</tr>
	</table>
	<div id="echant_GL">
		<table id="tbl_ech">
			<tr id="tet">
			<td width="20px"></td>
			<td width="90px">Compte</td>
			<td width="100px">Date</td>
			<td width="50px">Journal</td>
			<td width="50px">Reference</td>
			<td width="280px">Libellé</td>
			<td width="110px">Débit</td>
			<td width="110px">Crédit</td>
		
		</tr>
			<?php 
				$reponse=$bdd->query("select GL_GEN_ID,GL_GEN_COMPTES ,GL_GEN_DATE	,GL_GEN_JL,GL_GEN_REF, GL_GEN_LIBELLE,
				GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE from tab_gl_gen where  GL_GEN_COMPTES like '2%' AND MISSION_ID=".$mission_id);
				while($donnees=$reponse->fetch()){
				$id=$donnees['GL_GEN_ID'];
				$Comp=$donnees['GL_GEN_COMPTES'];
				$date=$donnees['GL_GEN_DATE'];
				$jl=$donnees['GL_GEN_JL'];
				$ref=$donnees['GL_GEN_REF'];
				$libelle=$donnees['GL_GEN_LIBELLE'];
				$debit=$donnees['GL_GEN_DEBIT'];
				$crd=$donnees['GL_GEN_CREDIT'];
			
			   ?>
			<tr>
				<td width="20px"><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="listId[]"/></td>
				<td width="90px" ><?php echo $Comp;?></td>
				<td width="100px"><?php echo $date;?></td>
				<td width="80px"><?php echo $jl;?></td>
				<td width="70px"><?php echo $ref;?></td>
				<td width="280px"><?php echo $libelle;?></td>
				<td width="110px"><?php echo $debit;?></td>
				<td width="110px"><?php echo $crd;?></td>
				
			</tr>
		   <?php } ?>
		</table>
	  
	</div> 
	<p id="btn_tel">Télécharger les echantillons</p>
	</center>
</div>