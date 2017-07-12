<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

///////////////////////////////Affichage des données de vente ///////////////////////////////////////////////////
$queryVente='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="vente"';
$reponseVente=$bdd->query($queryVente);
$donneesVente=$reponseVente->fetch();

///////////////////////////////Affichage des données de vente marchandise //////////////////////////////////////
$queryVenteMarch='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="vente_marchandise"';
$reponseVenteMarch=$bdd->query($queryVenteMarch);
$donneesVenteMarch=$reponseVenteMarch->fetch();

///////////////////////////////Affichage des données de cout marchandise /////////////////////////////////////////
$queryCoutMarch='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="cout_marchandise"';
$reponseCoutMarch=$bdd->query($queryCoutMarch);
$donneesCoutMarch=$reponseCoutMarch->fetch();

///////////////////////////////Affichage des données de stock initiaux //////////////////////////////////////////
$queryStockInit='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="stock_initiaux"';
$reponseStockInit=$bdd->query($queryStockInit);
$donneesStockInit=$reponseStockInit->fetch();

///////////////////////////////Affichage des données de achat marchandises /////////////////////////////////
$queryAchatMarch='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="achat_marchandise"';
$reponseAchatMarch=$bdd->query($queryAchatMarch);
$donneesAchatMarch=$reponseAchatMarch->fetch();

///////////////////////////////Affichage des données de stock final /////////////////////////////////
$queryStockFin='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="stock_final"';
$reponseStockFin=$bdd->query($queryStockFin);
$donneesStockFin=$reponseStockFin->fetch();

///////////////////////////////Affichage des données de marge brute ///////////////////////////////////////////
$queryMargBrut='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="marge_brute"';
$reponseMargBrut=$bdd->query($queryMargBrut);
$donneesMargBrut=$reponseMargBrut->fetch();

///////////////////////////////Affichage des données de marge vente ///////////////////////////////////////////
$queryMargVente='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="marge_vente"';
$reponseMargVente=$bdd->query($queryMargVente);
$donneesMargVente=$reponseMargVente->fetch();

///////////////////////////////Affichage des données de marge sur achat ///////////////////////////////////////////
$queryMargAchat='select N0, N1, N2, N3, N4 from tab_rdc_cf_f4_1 where mission_id='.$mission_id.' and libelle="marge_achat"';
$reponseMargAchat=$bdd->query($queryMargAchat);
$donneesMargAchat=$reponseMargAchat->fetch();

?>
<script>
	function addDataFraisAcces(cpt){
		// var tab_fraisAcces=new Array();
		// for(k=0;k<cpt;k++){

			// if(document.getElementById("checkBoxCpt"+k).checked==true){
				// var compte=$('#compteF4'+k).val();
				// var libelle=$('#libelleF4'+k).val();
				// for(i=0;i<5;i++){
					// tab_fraisAcces[i]=$('#fraisaccesN'+i+''+k).val();
				// }
				// $.ajax({
					// type:'POST',
					// url:'RDC/charge_fournisseur/A_coherence/addCheckBoxF4.php',
					// data:{tab_fraisAcces:tab_fraisAcces, compte:compte, libelle:libelle, mission_id:<?php echo $mission_id; ?>},
					// success:function(){
					// }
				// });
			// }
		// }
	}
	function deselectCheck(cpt){	
	
		// var compte=$('#compteF4'+cpt).val();
		// if(document.getElementById("checkBoxCpt"+cpt).checked==false){
			// $.ajax({
				// type:'POST',
				// url:'RDC/charge_fournisseur/A_coherence/supprDataTableF4.php',
				// data:{compte:compte, mission_id:<?php echo $mission_id;?>},
				// success:function(){
					// for(i=0;i<5;i++){
						// $('#fraisaccesN'+i+''+cpt).val("0");
					// }
				// }
			// });
		// }			
	}
</script>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
	<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
		<center><label style="font-size:12px;">ANALYSE DE LA MARGE BRUTE (F4)</label></center>
	</div>
	<div style="overflow:auto;height:300px;">
		<table width="99.8%" bgcolor="#6495ED">
			<tr class="tr_table_text_entete">
				<td></td>
				<td></td>
				<td style="color:white;text-align:center;">N</td>
				<td style="color:white;text-align:center;">N-1</td>
				<td style="color:white;text-align:center;">N-2</td>
				<td style="color:white;text-align:center;">N-3</td>
				<td style="color:white;text-align:center;">N-4</td>
			</tr>
			<tr>				
				<td colspan="2" class="text_droite">Ventes</td>
				<td style="background-color:white;" align="center"><input type="Text" id="venteN0" value="<?php echo $donneesVente['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="venteN1" value="<?php echo $donneesVente['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="venteN2" value="<?php echo $donneesVente['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="venteN3" value="<?php echo $donneesVente['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="venteN4" value="<?php echo $donneesVente['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Ventes de marchandises</td>
				<td style="background-color:white;" align="center"><input type="Text" id="ventemarchN0" value="<?php echo $donneesVenteMarch['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="ventemarchN1" value="<?php echo $donneesVenteMarch['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="ventemarchN2" value="<?php echo $donneesVenteMarch['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="ventemarchN3" value="<?php echo $donneesVenteMarch['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="ventemarchN4" value="<?php echo $donneesVenteMarch['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Coùt de marchandise vendues</td>
				<td style="background-color:white;" align="center"><input type="Text" id="coutmarchN0" value="<?php echo $donneesCoutMarch['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="coutmarchN1" value="<?php echo $donneesCoutMarch['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="coutmarchN2" value="<?php echo $donneesCoutMarch['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="coutmarchN3" value="<?php echo $donneesCoutMarch['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="coutmarchN4" value="<?php echo $donneesCoutMarch['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Stock initiaux (+)</td>
				<td style="background-color:white;" align="center"><input type="Text" id="stockinitN0" value="<?php echo $donneesStockInit['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="stockinitN1" value="<?php echo $donneesStockInit['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="stockinitN2" value="<?php echo $donneesStockInit['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="stockinitN3" value="<?php echo $donneesStockInit['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="stockinitN4" value="<?php echo $donneesStockInit['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Achats (+)</td>
			</tr>
			<tr>				
				<td><input type="Text" id="compteachat" value="607000" disabled="disabled" size="10px"/></td>
				<td class="text_droite">Achat de marchandises</td>				
				<td style="background-color:white;" align="center"><input type="Text" id="achatmarchN0" value="<?php echo $donneesAchatMarch['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="achatmarchN1" value="<?php echo $donneesAchatMarch['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="achatmarchN2" value="<?php echo $donneesAchatMarch['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="achatmarchN3" value="<?php echo $donneesAchatMarch['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="achatmarchN4" value="<?php echo $donneesAchatMarch['N4'];?>" size="10px"/></td>
			</tr>
			<tr>				
				<td class="text_droite" colspan="2">Frais accessoires sur achat (F.A.)</td>
			</tr>
			<?php
				$queryCompteLibelle='select IMPORT_COMPTES, IMPORT_INTITULES from  tab_importer where MISSION_ID='.$mission_id.' and IMPORT_CYCLE="F- Charges fournisseurs" and IMPORT_COMPTES like "6%" and IMPORT_CHOIX_ANNEE="N" order by IMPORT_COMPTES asc';
				$reponseCompteLibelle=$bdd->query($queryCompteLibelle);
				$cpt=0;
				while($donnneesCompteLibelle=$reponseCompteLibelle->fetch()){			
				
				///////Selection du frais accessoires dans la table tab_rdc_cf_f4_2//////
				$queryFraisAcces='select id, N0, N1, N2, N3, N4 from tab_rdc_cf_f4_2 where mission_id='.$mission_id.' and compte ="'.$donnneesCompteLibelle['IMPORT_COMPTES'].'"';
				$data0=0;
				$data1=0;
				$data2=0;
				$data3=0;
				$data4=0;
				$reponseFraisAcces=$bdd->query($queryFraisAcces);
				$donneesFraisAcces=$reponseFraisAcces->fetch();
				$data0=$donneesFraisAcces['N0'];
				$data1=$donneesFraisAcces['N1'];
				$data2=$donneesFraisAcces['N2'];
				$data3=$donneesFraisAcces['N3'];
				$data4=$donneesFraisAcces['N4'];
				
				if($data0=="")$data0=0;
				if($data1=="")$data1=0;
				if($data2=="")$data2=0;
				if($data3=="")$data3=0;
				if($data4=="")$data4=0;
			?>
			<tr>
				<td style="background-color:white;">
				<input type="checkbox" id="checkBoxCpt<?php echo $cpt; ?>"<?php if($donneesFraisAcces['id']!=0) echo 'checked';?> onchange="deselectCheck(<?php echo $cpt;?>)"/>
				<input type="Text" id="compteF4<?php echo $cpt; ?>" value="<?php echo $donnneesCompteLibelle['IMPORT_COMPTES']; ?>" disabled="disabled" size="10px"/></td>
				<td><input type="Text" id="libelleF4<?php echo $cpt; ?>" value="<?php echo $donnneesCompteLibelle['IMPORT_INTITULES']; ?>" disabled="disabled" size="22px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="fraisaccesN0<?php echo $cpt; ?>" value="<?php echo $data0; ?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="fraisaccesN1<?php echo $cpt; ?>" value="<?php echo $data1; ?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="fraisaccesN2<?php echo $cpt; ?>" value="<?php echo $data2; ?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="fraisaccesN3<?php echo $cpt; ?>" value="<?php echo $data3; ?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="fraisaccesN4<?php echo $cpt; ?>" value="<?php echo $data4; ?>" size="10px"/></td>				
			</tr>
			<?php
				$cpt++;
				}
			?>
			<input type="Text" id="compteF4" value="<?php echo $cpt;?>" style="display:none;" />
			<tr>
				<td colspan="2" class="text_droite">Stock final (-)
					<input type="Text" id="cpt" value="<?php echo $cpt; ?>" style="display:none;" />
				</td>
				<td align="center"><input type="Text" id="stockfinN0" value="<?php echo $donneesStockFin['N0']?>" size="10px"/></td>
				<td align="center"><input type="Text" id="stockfinN1" value="<?php echo $donneesStockFin['N1']?>" size="10px"/></td>
				<td align="center"><input type="Text" id="stockfinN2" value="<?php echo $donneesStockFin['N2']?>" size="10px"/></td>
				<td align="center"><input type="Text" id="stockfinN3" value="<?php echo $donneesStockFin['N3']?>" size="10px"/></td>
				<td align="center"><input type="Text" id="stockfinN4" value="<?php echo $donneesStockFin['N4']?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Marge brute</td>
				<td style="background-color:white;" align="center"><input type="Text" id="margebruteN0" value="<?php echo $donneesMargBrut['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margebruteN1" value="<?php echo $donneesMargBrut['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margebruteN2" value="<?php echo $donneesMargBrut['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margebruteN3" value="<?php echo $donneesMargBrut['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margebruteN4" value="<?php echo $donneesMargBrut['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Marge sur ventes en pourcentage</td>
				<td align="center"><input type="Text" id="margeventeN0" value="<?php echo $donneesMargVente['N0'];?>" size="10px"/></td>
				<td align="center"><input type="Text" id="margeventeN1" value="<?php echo $donneesMargVente['N1'];?>" size="10px"/></td>
				<td align="center"><input type="Text" id="margeventeN2" value="<?php echo $donneesMargVente['N2'];?>" size="10px"/></td>
				<td align="center"><input type="Text" id="margeventeN3" value="<?php echo $donneesMargVente['N3'];?>" size="10px"/></td>
				<td align="center"><input type="Text" id="margeventeN4" value="<?php echo $donneesMargVente['N4'];?>" size="10px"/></td>
			</tr>
			<tr>
				<td colspan="2" class="text_droite">Marge sur achat en pourcentage</td>
				<td style="background-color:white;" align="center"><input type="Text" id="margeachatN0" value="<?php echo $donneesMargAchat['N0'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margeachatN1" value="<?php echo $donneesMargAchat['N1'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margeachatN2" value="<?php echo $donneesMargAchat['N2'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margeachatN3" value="<?php echo $donneesMargAchat['N3'];?>" size="10px"/></td>
				<td style="background-color:white;" align="center"><input type="Text" id="margeachatN4" value="<?php echo $donneesMargAchat['N4'];?>" size="10px"/></td>
			</tr>
		</table>
	</div>