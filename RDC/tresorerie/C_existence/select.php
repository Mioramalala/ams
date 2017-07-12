<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
?>

<script>
	$(function(){
		$("#btn_tel").click(function(){
				var idChecked = [];
				 $("#tbl_ech tr input[type='checkbox']:checked").each(
					  function() {
						 idChecked.push($(this).attr('id'));
					  }); 
					  //alert(idChecked);
					  var valTransfert = new Array();
					  valTransfert="valTransfert=true";
					  valTransfert = valTransfert+'&listId[]='+idChecked;
					  //alert(valTransfert);
					  //valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
					  $.ajax({
						type:"POST",
						url:"RDC/tresorerie/C_existence/postExost.php",
						data:valTransfert,
						success:function(e){
							//alert(e);
							$('#contenue_travail').load("RDC/tresorerie/C_existence/table_E6.php");
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
<center>
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td><center><label class="grand_Titre" style="color:#fff;">PRELEVEMENT DES ECHANTILLON DE LA BALANCE GENERALE </label></center></td>
		</tr>
	</table>
	
	 <table id="tet">
		<tr>
			<td width="20px"></td>
			<td width="90px">Compte</td>
			<td width="280px">Libellé</td>
			<td width="110px">Débit</td>
			<td width="110px">Crédit</td>
		
		</tr>
	</table>
	<div id="echant_GL">
		<table id="tbl_ech">
			<?php 
				$reponse=$bdd->query("select IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,
				IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE from tab_importer where IMPORT_COMPTES like '5%' AND MISSION_ID=".$mission_id);
				while($donnees=$reponse->fetch()){
				$id=$donnees['IMPORT_ID'];
				$Comp=$donnees['IMPORT_COMPTES'];
				$libelle=$donnees['IMPORT_INTITULES'];
				$debit=$donnees['IMPORT_DEBIT'];
				$crd=$donnees['IMPORT_CREDIT'];
			
			   ?>
			<tr>
				<td width="20px"><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="listId[]"/></td>
				<td width="90px" ><?php echo $Comp;?></td>
				<td width="280px"><?php echo $libelle;?></td>
				<td width="110px"><?php echo $debit;?></td>
				<td width="110px"><?php echo $crd;?></td>
			</tr>
		   <?php } ?>
		</table>
	  
	</div> 
	<p id="btn_tel">Télécharger les échantillons</p>
	</center>
</div>