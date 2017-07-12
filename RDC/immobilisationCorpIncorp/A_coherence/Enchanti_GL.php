<?php
    include '../../../connexion.php';
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	?>
 
<script>
	$(function(){
		$("#btn_tel").click(function(){
				var idChecked = [];
				 $("#tbl_ech tr input[type='checkbox']:checked").each(
					  function() {
						 idChecked.push($(this).attr('id'));
					  }); 
					  // alert(idChecked);
					  var valTransfert = new Array();
					  valTransfert="valTransfert=true";
					  valTransfert = valTransfert+'&listId[]='+idChecked;
					  // alert(valTransfert);
					  $.ajax({
						type:"POST",
						url:"RDC/immobilisationCorpIncorp/A_coherence/GetEchant_GL.php",
						data:valTransfert,
						success:function(e){
							alert(e);
							// $('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/table_B52.php");
							$('#contenue').load("RDC/immobilisationCorpIncorp/A_coherence/coherence6.php");
							
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
		height:330px;
		width:400px;
		}
		#btn_tel{
		border:1px solid #ccc;
		background-color:#efefef;
		border-radius:8px;
		width:200px;
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
	<center>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre" style="color:#fff;">PRELEVEMENT DES ECHANTILLON DU GRAND LIVRE </label></center></td>
		</tr>
	</table>
	
	 <table id="tet">
		<tr>
			<td width="20px"></td>
			<td width="90px">Compte</td>
			<td width="265px">Date</td>
			<td width="265px">Journal</td>
			<td width="265px">Reference</td>
			<td width="265px">Débit</td>
			<td width="265px">Crédit</td>
			<td width="265px">Solde</td>
		</tr>
	</table>
	<div id="echant_GL">
		<table id="tbl_ech">
			<?php 
				$reponse=$bdd->query("select GL_GEN_ID,GL_GEN_COMPTES ,GL_GEN_DATE	,GL_GEN_JL,GL_GEN_REF, GL_GEN_LIBELLE,
				GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE from tab_gl_gen where GL_GEN_CYCLE='A- Fonds propres' AND MISSION_ID=".$mission_id);
				while($donnees=$reponse->fetch()){
				$id=$donnees['GL_GEN_ID'];
				$Comp=$donnees['GL_GEN_COMPTES'];
				$date=$donnees['GL_GEN_DATE'];
				$jl=$donnees['GL_GEN_JL'];
				$ref=$donnees['GL_GEN_REF'];
				$libelle=$donnees['GL_GEN_LIBELLE'];
				$debit=$donnees['GL_GEN_DEBIT'];
				$crd=$donnees['GL_GEN_CREDIT'];
				$sold=$donnees['GL_GEN_SOLDE'];
			   ?>
			<tr>
				<td><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="chackGL[]"/></td>
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
	<p id="btn_tel">Telecharger les echantillons</p>
	</center>