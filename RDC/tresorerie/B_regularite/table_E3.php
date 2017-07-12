<?php
	
	@session_start();

	$mission_id=@$_SESSION['idMission'];

	include '../../../connexion.php';
	
	//J'active le requette qui recupere les données de la table import du balance générale de compte classe 5
	$queryBalance='select id_echantillon_bl,compt_ech_bl,libelle_ech_bl,debit_ech_bl,crd_ech_bl,sold_ech_bl from tab_echantillon_bl where BL_GEN_CYCLE="E- Tresoreries" AND id_mission='.$mission_id;
	$reponseBalance=$bdd->query($queryBalance);	


?>
<link rel="stylesheet" href="../RDC/tresorerie/css_tresorerie.css">
<script>
var charnombre = ['1','2','3','4','5','6','7','8','9','.']
function calculSolde(cpt)
{
	//var testsolde=testNombre(document.getElementById("soldeE3"+cpt).value, "soldeE3"+cpt);	
	//var testtaux=testNombre(document.getElementById("tauxE3"+cpt).value, "tauxE3"+cpt);
	//alert(testsolde);
	/*if(testsolde==0 || testtaux==0)
	{
		document.getElementById("solde_reevalE3"+cpt).value=0;
	}
	else if(testsolde==1 && testtaux==1){
		var total=parseInt(document.getElementById("soldeE3"+cpt).value)*parseInt(document.getElementById("tauxE3"+cpt).value);
		//alert(total);
		document.getElementById("solde_reevalE3"+cpt).value=total;
		document.getElementById("soldeE3"+cpt).style.backgroundColor="white";
		document.getElementById("tauxE3"+cpt).style.backgroundColor="white";
	}*/

eltSold=$("#soldeE3"+cpt);
eltTaux=$("#tauxE3"+cpt);
//document.getElementById("tauxE3"+cpt).value;

//alert(eltSold.val());
//alert(eltTaux.val());
//if(eltSold.val()=="");
//{
	//eltSold.val("0");
//}

//if(eltTaux.val()=="");
//{
	//eltTaux.val("0");
//}

	//var total=parseInt(document.getElementById("soldeE3"+cpt).value)*parseInt(document.getElementById("tauxE3"+cpt).value);
		//alert(total);
		var total=eval(eltTaux.val()*eltSold.val());
		//document.getElementById("solde_reevalE3"+cpt).value=total;
		$(".solde_reevalE3"+cpt).val(total);
		document.getElementById("soldeE3"+cpt).style.backgroundColor="white";
		document.getElementById("tauxE3"+cpt).style.backgroundColor="white";
}
function calculCompta(cpt)
{
	/*var testreeval=testNombre(document.getElementById("solde_comptaE3"+cpt).value, "solde_comptaE3"+cpt);
	if(testreeval==0)
	{
		document.getElementById("differenceE3"+cpt).value=0;
	}
	else if(testreeval==1)
	{*/
		eltsolde_reevalE3=$("#solde_reevalE3"+cpt);
		eltsolde_comptaE3=$("#solde_comptaE3"+cpt);
		var total=eval(eltsolde_reevalE3.val()-eltsolde_comptaE3.val());
		$(".differenceE3"+cpt).val(total);
		//document.getElementById("differenceE3"+cpt).value=total;
		document.getElementById("solde_comptaE3"+cpt).style.backgroundColor="white";
	//}
}
function testNombre(nombre, id){
	var test=1;
	for(i=0;i<nombre.length;i++)
	{
		if(charnombre.indexOf(nombre[i]) < 0)
		{
			test=0;
			break;
		}
	}
	if(test==0)
	{
		document.getElementById(id).style.backgroundColor="white";
	}
	else
	{
		document.getElementById(id).style.backgroundColor="white";
	}
	return test;
}
</script>
<div class="titre_table" style="width:897px;" >Réévaluation des comptes de trésorerie libellés en devises (E3)</div>
<div style="overflow:auto;height:430px;width:897px;">
<form id="formenregistre">
<table width="100%" >
	<tr class="tr_table_D1" style="background-color:#6495ED;">
		<td style="color:white;">Compte</td>
		<td style="color:white;">Solde en devise(1)</td>
		<td style="color:white;">Devise</td>
		<td style="color:white;">Taux de clôture(2)</td>
		<td style="color:white;">Solde reévalué<br />(3)=(1)*(2)</td>
		<td style="color:white;">Solde comptable(4)</td>
		<td style="color:white;">Difference<br />(3)-(4)</td>
		<td style="color:white;">Observations</td>
	</tr>
	<?php
		$cpt=0;
		while ($donneesBalance=$reponseBalance->fetch())
		{
			?>
			<tr bgcolor="white">
				<td>
				<input name="compteE3[]"   type="hidden" id="compteE3<?php echo $cpt; ?>" value="<?php echo $donneesBalance['compt_ech_bl']; ?>" size="20px" />
				<input   id="compteE3<?php echo $cpt; ?>" value="<?php echo $donneesBalance['compt_ech_bl']; ?>" size="20px" disabled="disabled"/></td>
			<?php
				$query1='select * from tab_rdc_tr_e3 where rang='.$cpt.' and cycle="tresorerie" and mission_id='.$mission_id;
				$reponse=$bdd->query($query1);
				$donnees=$reponse->fetch();
			?>
				<td><input  name="soldeE3[]" id="soldeE3<?php echo $cpt; ?>" value="<?php echo $donnees['solde']; ?>" size="20px" onkeyup="calculSolde(<?php echo $cpt; ?>)"/></td>
				<td><input  name="deviseE3[]" id="deviseE3<?php echo $cpt; ?>" value="<?php echo $donnees['devise']; ?>" size="20px" /></td>
				<td><input  name="tauxE3[]" id="tauxE3<?php echo $cpt; ?>" value="<?php echo $donnees['taux']; ?>" size="20px" onkeyup="calculSolde(<?php echo $cpt; ?>)" /></td>
				<td>
				<input class="solde_reevalE3<?php echo $cpt; ?>" type="hidden"  name="solde_reevalE3[]"  value="<?php echo $donnees['solde_reeval']; ?>" size="20px"  />
				<input id="solde_reevalE3<?php echo $cpt; ?>" class="solde_reevalE3<?php echo $cpt; ?>"   value="<?php echo $donnees['solde_reeval']; ?>" size="20px" disabled="disabled" /></td>
				<td><input  name="solde_comptaE3[]" id="solde_comptaE3<?php echo $cpt; ?>" value="<?php echo $donnees['solde_compta']; ?>" size="20px" onkeyup="calculCompta(<?php echo $cpt; ?>)"/></td>
				<td>

				<input class="differenceE3<?php echo $cpt; ?>" type="hidden"  name="differenceE3[]"  value="<?php echo $donnees['difference']; ?>" size="20px"  />
				<input class="differenceE3<?php echo $cpt; ?>"   id="differenceE3<?php echo $cpt; ?>" value="<?php echo $donnees['difference']; ?>" size="20px" disabled="disabled" /></td>
				<td><textarea name="observationE3[]" id="observationE3<?php echo $cpt; ?>" cols="28" rows="5"><?php echo $donnees['observation']; ?></textarea>
				</td>
			</tr>
	<?php
		$cpt++;
	}
	?>
</table>
</form>
<input type="Text" value="<?php echo $cpt;?>" id="cpt_ligne" style="display:none;"/>
</div>