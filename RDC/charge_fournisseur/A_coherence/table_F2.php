<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryBalGen='select IMPORT_COMPTES, IMPORT_INTITULES, IMPORT_SOLDE from  tab_importer where IMPORT_CYCLE="F- Charges fournisseurs"  and MISSION_ID='.$mission_id.' and IMPORT_CHOIX_ANNEE="N" order by IMPORT_COMPTES asc';
$reponseBalGen=$bdd->query($queryBalGen);

?>
<script type="text/javascript" src="js/automatic-calculation.js"></script>
<script>
	var testEnreg=0;
	function soustraction2Nombres(id1,id2,idresult){
		testEnreg=0;
		testNombreNegatif(id1);
		var testId2=testEntier(id2);
		
		if(testId2==1){		
			var somme=parseInt(document.getElementById(id1).value) - parseInt(document.getElementById(id2).value);
			document.getElementById(idresult).value=somme;
			if(document.getElementById(idresult).value=="NaN")
				document.getElementById(idresult).value=0;
			testNombreNegatif(idresult);
			testEnreg=1;
		}	
		return testEnreg;
	}


	function testEntier(id){
		test=1;	
		for(k=0;k<document.getElementById(id).value.length;k++){
			for(i=0;i<10;i++){
				var caract=document.getElementById(id).value.charAt(k);
				if(caract==0 || caract==1 || caract==2 || caract==3 || caract==4 || caract==5 || caract==6 || caract==7 || caract==8 || caract==9){test=1;}
				else if(document.getElementById(id).value.charAt(0)=="-"){test=1;}
				else
				{
					test=0;
					break;
				}
			}
		}
		if(test==0){
			document.getElementById(id).style.backgroundColor="red";
		}
		else{
			document.getElementById(id).style.backgroundColor="white";
		}
		return test;
	}
	function testNombreNegatif(id){
		if(document.getElementById(id).value.charAt(0)=="-"){
			document.getElementById(id).style.backgroundColor="yellow";
		}
		else{
			document.getElementById(id).style.backgroundColor="#efefef";
		}
	}

	$(function() {
		var nbLignes = $("#rapprochement-depenses-reelles > tbody > tr").get().length;
		var expressions = "";

		for(var i = 0; i < nbLignes; i++) {
			if(i > 0) expressions += ";"
			expressions += "{4," + i + "} = {2," + i + "} - {3," + i + "}";
		}

		$("#rapprochement-depenses-reelles").automaticCalculation({
			expressions : expressions
		});
	});
</script>
<div>
<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
	<center><label style="font-size:12px;"><label>RAPPROCHEMENT DES DEPENSES REELLES AVEC LE BUDGET (F2)</label></center>
</div>
<div style="height:300px;">

<form id="frmRDCcoherence">
	<table width="99.8%" bgcolor="#6495ED" id="rapprochement-depenses-reelles">
		<thead>
			<tr class="tr_table_text_entete" align="center">
				<td>Compte</td>
				<td>Libellé</td>
				<td>Montant (1)</td>
				<td>Budgétisé (2)</td>
				<td style="color:white;">Ecart (1) - (2)</td>
				<td>Commentaires</td>
			</tr>
		</thead>
		<tbody>

		 
		<?php
			$cpt=0;
			while($donneesBalGen=$reponseBalGen->fetch())
			{
			
				//////Affichage du budget1 et du commentaire dans la table tab_rdc_cf_f2////////
				$queryF2='select budget, commentaires, ecart from tab_rdc_cf_f2 where mission_id='.$mission_id.' and cycle="charges_fournisseurs" and compte="'.$donneesBalGen['IMPORT_COMPTES'].'"';
				$reponseF2=$bdd->query($queryF2);
				$donneesF2=$reponseF2->fetch();
				
				$budget=$donneesF2['budget'];
				$commentaire=$donneesF2['commentaires'];
				$comptes=$donneesBalGen['IMPORT_COMPTES'];
				$intitules=$donneesBalGen['IMPORT_INTITULES'];
				$solde=$donneesBalGen['IMPORT_SOLDE'];
				$ecart=$solde-$budget;
			?>		
			<tr class="tr_table_text_champ">
				<td>
					<input  id="compteF2<?php echo $cpt; ?>" value="<?php echo $comptes; ?>" size="10px" disabled="disabled" >
					<input type="hidden"  name="compteF2[]"  value="<?php echo $comptes; ?>" >					
				</td>
				<td>
					<input  id="labelleF2<?php echo $cpt; ?>" value="<?php echo $intitules; ?>" disabled="disabled" />
					<input type="hidden" name="labelleF2[]"  value="<?php echo $intitules; ?>"  />
				</td>
				<td>
					<input    id="montantF2<?php echo $cpt; ?>" value="<?php if(empty($solde)){}else{echo number_format($solde, 2, '.', ' ');}?>" disabled="disabled" />
					<input type="hidden" name="montantF2[]"  value="<?php if(empty($solde)){}else{echo number_format($solde, 2, '.', ' ');}?>"  >
				</td>
				<td align="center"><input   name="budgetF2[]"  id="budgetF2<?php echo $cpt; ?>" value="<?php echo $budget;?>"/></td>
				<td align="center"><input  name="ecartF2[]" id="ecartF2<?php echo $cpt; ?>" value="<?php echo $ecart;?>"/></td>
				<td align="center"><textarea   name="commentF2[]" id="commentF2<?php echo $cpt; ?>" cols="15" rows="3"><?php echo $commentaire; ?></textarea></td>
			</tr>
			<?php
			 $cpt++;
			}
		?>
		
		</tbody>
	</table>	

	</form>
	<input type="Text" value="<?php echo $cpt; ?>" id="compteF2" style="display:none;" />
</div>
</div>