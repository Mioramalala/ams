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
$mission_id=@$_SESSION['idMission'];
//echo $mission_id;
?>
<script type="text/javascript" src="js/automatic-calculation.js"></script>
<script type="text/javascript">

function calcul_Vnette1(eltVbrute,eltAmorti)
{
	$("#"+idelt+".v_nette").val(eval(eltVbrute.val()-eltAmorti.val()));
}

function press_vbrute()
{
	idelt=$(this).attr("id");
	eltamortissement=$("#"+idelt+".amortissement");
	calcul_Vnette1($(this),eltamortissement)

}
function  press_amortissement()
{
		idelt=$(this).attr("id");
		eltVbrute=$("#"+idelt+".v_brute");

		calcul_Vnette1(eltVbrute,$(this))
}


function press_vbruteAmortissement2()
{
	idelt=$(this).attr("id");
	eltcompte=$("#"+idelt+".numero_compte");
	numcompte=eltcompte.val();
	numcompte=eval(numcompte.substring(0,2));

	elt_soldeBL=$("#"+idelt+".import_solde");
	elt_ecart=$("#"+idelt+".ecart_bg_amortissement");

	eltv_brute2=$("#"+idelt+".v_brute2");
	eltamortissement2=$("#"+idelt+".amortissement2");
	if(numcompte==28)
	{

		elt_ecart.val(eval(elt_soldeBL.val()-eltamortissement2.val()));

	}else
	{
		elt_ecart.val(eval(elt_soldeBL.val()-eltv_brute2.val()));
	}

	//calcul_Vnette1($(this),eltamortissement)

}



$(function  () 
{


		$("#frmRDC_immo .v_brute").keypress(press_vbrute);
		$("#frmRDC_immo .v_brute").keyup(press_vbrute);

		$("#frmRDC_immo .amortissement").keypress(press_amortissement);
		$("#frmRDC_immo .amortissement").keyup(press_amortissement);





		$("#frmRDC_immo .v_brute2").keypress(press_vbruteAmortissement2);
		$("#frmRDC_immo .v_brute2").keyup(press_vbruteAmortissement2);

		$("#frmRDC_immo .amortissement2").keypress(press_vbruteAmortissement2);
		$("#frmRDC_immo .amortissement2").keyup(press_vbruteAmortissement2);
		
		
		$("#saveEntree").click(function ()
		{


			datatransfert=$("#frmRDC_immo").serialize();
			$.ajax({
				type: "POST",
				url: "RDC/immobilisationCorpIncorp/A_coherence/saveEntreeRdcImmo2.php",
				data:datatransfert,
				success: function(e){
					//alert(e);
					//if(e == "ok")
					 alert("Enregistrement Fait");
				}
			});

		});

		





	});



</script>

</script>
<div align="left">
<label>Rapprochement fichier d'immobilisations avec la comptabilité</label><br/>
<input id="saveEntree"  style="background: #00698d;color:#fff;height: 40px;font-size:14px" type="button" value="Enregistrer les remarques">
<div style="overflow: auto;height: 90%;width: 100%;">
<div id="result"></div>
<div style="width:300%;">


<form id="frmRDC_immo">
<table border="1px" id="table">
<thead>
		<tr bgcolor="#ccc">
			<td colspan="4">ETATS FINANCIERS</td>
			<td class="separateur"> &nbsp&nbsp&nbsp </td>
			<td  colspan="5">BALANCE GENERALE</td>
			<td class="separateur"> &nbsp&nbsp&nbsp </td>
			<td colspan="3">TABLEAU D'AMORTISSEMENT</td>
			<td class="separateur"> &nbsp&nbsp&nbsp </td>
			<td></td>
		</tr>
		<tr bgcolor="#ccc">
			
			
			
			<td >Libellé</td>
			<td >V. Brute</td>
			<td >Amortissement</td>
			<td >V.Nette</td>
			
			<td class="separateur"></td>
	<!-------------------------------- Balance ------------------------------------------>
			<td >Compte</td>
			<td >Libellé</td>
			<td >Débit</td>
			<td >Crédit</td>
			<td >Solde (2)</td>
	<!--------------------------------  ------------------------------------------>
			
			<td class="separateur"></td>

			<td >Valeur Brute (3)</td>
			<td >Amortissements cumulés(4)</td>
			<td >Dotation de l'exercice(5)</td>
			<td class="separateur"></td>
			<td >ECART BG /Tab amort.<br>B=(2)-(3) ou -(4)</td>
		</tr>
</thead>
<tbody>
		<!-------------------------------- essay boucle for ------------------------------------------>
		<?php 
			include "$project_path/connexion.php";
			//////////////////////////////////compte cycle B///////////////////////////
			$sql = "SELECT t1.import_comptes, t1.import_intitules, t1.import_debit, t1.import_credit, t1.import_solde,
					t2.id_,t2.libelle, t2.v_brute, t2.amortissement, t2.v_nette, t2.v_brute2, t2.amortissement_cumule, t2.dotation_exercice, t2.ecart_bg_amortissement 
					from tab_importer t1 
					left join tab_rdc_immo_partie2 t2 on t1.mission_id = t2.mission_id and t1.import_comptes = t2.numero_compte
					where t1.import_cycle = 'B- Immobilisations incorporelles et corporelles' 
					and t1.mission_id =".$mission_id;
			$reponse = $bdd->query($sql);
			$rowCount = $reponse->rowCount();
			$i = 0;
			if($rowCount > 0) 
			{
				while ($donnees=$reponse->fetch()) 
				{ 
				?>
			
						<tr style="font-size:10pt;">
							<td style="width:182px;"><textarea name="libelle[]" class = "entree" id="element<?php echo $i; ?>"><?php echo $donnees['libelle'];?></textarea></td>
							<td style="width:182px;"><textarea name="v_brute[]" class = "v_brute entree" id="element<?php echo $i; ?>"><?php echo $donnees['v_brute'];?></textarea></td>
							<td style="width:182px;"><textarea name="amortissement[]" class = "amortissement entree" id="element<?php echo $i; ?>"><?php echo $donnees['amortissement'];?></textarea></td>
							<td style="width:182px;"><textarea name="v_nette[]" class = "v_nette entree" id="element<?php echo $i; ?>"><?php echo $donnees['v_nette'];?></textarea></td>
							<td class="separateur"> &nbsp&nbsp&nbsp </td>
							<!-------------------------------- donnees Balance ------------------------------------------>
							
							<input type="hidden"  class="numero_compte" id="element<?php echo $i; ?>" name="numero_compte[]" value="<?php echo $donnees['import_comptes'];?>"  >
							<input type="hidden"  name="import_intitules[]" value="<?php echo $donnees['import_intitules'];?>"  >
							<input type="hidden"  name="import_debit[]" value="<?php echo $donnees['import_debit'];?>"  >
							<input type="hidden"  name="import_credit[]" value="<?php echo $donnees['import_credit'];?>"  >
							<input type="hidden" class="import_solde" name="import_solde[]" id="element<?php echo $i; ?>" value="<?php echo $donnees['import_solde'];?>"  >
							
							<td style="width:75px;white-space:nowrap;text-align:right;" class = "entree" id="element<?php echo $i.'8'; ?>" value="<?php echo $donnees['import_comptes'];?>"><?php echo number_format ( floatval($donnees['import_comptes']), 0, "", " " ); ?></td>
							<td style="width:182px;"><?php echo $donnees['import_intitules'];?></td>
							<td style="width:150px;white-space:nowrap;text-align:right;"><?php echo $donnees['import_debit']; ?></td>
							<td style="width:182px;"><?php echo $donnees['import_credit'];?></td>
							<td style="width:150px;white-space:nowrap;text-align:right;" id="solde2_<?php echo $i; ?>"><?php echo $donnees['import_solde'];?></td>
							<!-------------------------------- ------------------------------------------>

							<td class="separateur"> &nbsp&nbsp&nbsp </td>
							<td style="width:182px;"><input name="v_brute2[]" class="v_brute2 entree" value="<?php print ($donnees['v_brute2']); ?>" id="element<?php echo $i; ?>"/></td> <!--  colonne 3  -->
							<td style="width:182px;"><input name="amortissement2[]" class="amortissement2 entree"  value="<?php print ($donnees['amortissement_cumule']); ?>"  id="element<?php echo $i; ?>"/></td> <!--  colonne 4  -->
							<td style="width:182px;"><input name="dotation_exercice[]" class="dotation_exercice entree" value="<?php echo $donnees['dotation_exercice'];?>" id="element<?php echo $i; ?>" /></td><!--  colonne 5  -->
							<td class="separateur"> &nbsp&nbsp&nbsp </td><!--  separateur  -->
							<td style="width:182px;"><input name="ecart_bg_amortissement[]" class = "ecart_bg_amortissement entree" value="<?php echo $donnees['ecart_bg_amortissement'];?>" id="element<?php echo $i; ?>" /></td><!--  colonne 7  -->
							
						</tr>
						<input type="hidden" name="id_[]" value="<?php print ($donnees["id_"]); ?>">
				<?php	
					$i++;
				}
			} else 
			{
				$sql = "SELECT t1.import_comptes, t1.import_intitules, t1.import_debit, t1.import_credit, t1.import_solde
						FROM tab_importer t1 
						WHERE t1.import_cycle = 'B- Immobilisations incorporelles et corporelles' 
						AND t1.mission_id =".$mission_id;
				$reponse = $bdd->query($sql);
				while ($donnees=$reponse->fetch()) { 
			?>
			
				<tr style="font-size:10pt;">
					<td><textarea class = "entree" id="element<?php echo $i.'0'; ?>"><?php echo $donnees['libelle'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'1'; ?>"><?php echo $donnees['v_brute'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'2'; ?>"><?php echo $donnees['amortissement'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'3'; ?>"><?php echo $donnees['v_nette'];?></textarea></td>
					<td></td>
					<!-------------------------------- donnees Balance ------------------------------------------>

					<td class = "entree" id="element<?php echo $i.'8'; ?>" value="<?php echo number_format ( $donnees['import_comptes'], 2, ",", " " );?>"><?php echo $donnees['import_comptes'];?></td>
					<td><?php echo $donnees['import_intitules'];?></td>
					<td><?php echo number_format( $donnees['import_debit'], 2, ",", " " );?></td>
					<td><?php echo $donnees['import_credit'];?></td>
					<td><?php echo $donnees['import_solde'];?></td>
					<!-------------------------------- ------------------------------------------>

					<td></td>
					<td><textarea class = "entree" id="element<?php echo $i.'4'; ?>"><?php echo $donnees['v_brute2'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'5'; ?>"><?php echo $donnees['amortissement_cumule'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'6'; ?>"><?php echo $donnees['dotation_exercice'];?></textarea></td>
					<td><textarea class = "entree" id="element<?php echo $i.'7'; ?>"><?php echo $donnees['ecart_bg_amortissement'];?></textarea></td>
					
				</tr>
			<?php	
				$i++;
			}
		}	
			?>
</tbody>
</table>

</form>
	</div>
	<input id="rowCount" type="hidden" value="<?php echo $i; ?>">
		</div>

</div>
</div>
<style>
#table2 textarea{
	width:100%;
	height:100%;
}
.separateur{
	width:15px;
	background-color:#757575;
    box-shadow: -2px 2px 4px black;
}
</style>
