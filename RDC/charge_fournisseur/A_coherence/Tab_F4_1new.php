<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$idAchat=array();
$idFrais=array();

$compte=$_POST['compte'];
//$idAchat=$_POST['idAchat'];
//$idFrais=$_POST['idFrais'];
//$mission_id=$_POST['mission_id'];

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
   function addDataTableF4_2()
   {
        var compteAchat=$('#compteAchat').val();
        var compteFrais=$('#compteFrais').val();
        
        for(i=0;i<compteAchat;i++)
        {
            var cptLbl=$('#CPT'+i).val();
            var lbl=$('#LBL'+i).val();
            var CPTN0=$('#CPTN0'+i).val();
            var CPTN1=$('#CPTN1'+i).val();
            var CPTN2=$('#CPTN2'+i).val();
            var CPTN3=$('#CPTN3'+i).val();
            var CPTN4=$('#CPTN4'+i).val();
            $.ajax({
                type:'POST',
                url:'RDC/charge_fournisseur/A_coherence/addDataTableF4_1.php',
                data:{cptLbl:cptLbl, lbl:lbl, CPTN0:CPTN0, CPTN1:CPTN1,CPTN2:CPTN2, CPTN3:CPTN3, CPTN4:CPTN4, mission_id:<?php echo $mission_id; ?>, reference:'achat'},
                success:function(){
                }
            });
        }
        for(i=0;i<compteFrais;i++)
        {
            var cptLbl=$('#CPTFRAI'+i).val();
            var lbl=$('#LBLFRAI'+i).val();
            var CPTN0=$('#FRAIN0'+i).val();
            var CPTN1=$('#FRAIN1'+i).val();
            var CPTN2=$('#FRAIN2'+i).val();
            var CPTN3=$('#FRAIN3'+i).val();
            var CPTN4=$('#FRAIN4'+i).val();
            $.ajax({
                type:'POST',
                url:'RDC/charge_fournisseur/A_coherence/addDataTableF4_1.php',
                data:{cptLbl:cptLbl, lbl:lbl, CPTN0:CPTN0, CPTN1:CPTN1,CPTN2:CPTN2, CPTN3:CPTN3, CPTN4:CPTN4, mission_id:<?php echo $mission_id; ?>, reference:'frais'},
                success:function(){
                }
            });
        }
    }
    /*$(function(){
        $('#Redownload').click(function(){
           $('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F4.php");
        });
    });*/
</script>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
	<center><label style="font-size:12px;">ANALYSE DE LA MARGE BRUTE (F4)</label></center>
</div>
<!--div style="width:99.8%"-->
    <div style="overflow:auto;height:390px;width:100%;">
	<table width="100%" bgcolor="#00698d">
		<tr class="tr_table_text_entete" bgcolor="#6495ED">
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
			<td colspan="2" class="text_droite"><u>Ventes totals</u></td>
			<td style="background-color:#ccc;" align="center" colspan="5"><input type="Text" id="venteTot0" value="<?php echo number_format($donneesVente['N0']+$donneesVente['N1']+$donneesVente['N2']+$donneesVente['N3']+$donneesVente['N4']+$donneesVenteMarch['N0']+$donneesVenteMarch['N1']+$donneesVenteMarch['N2']+$donneesVenteMarch['N3']+$donneesVenteMarch['N4'], 2, ',', ' ');?>" size="10px" disabled /></td>                           
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
			<td colspan="2" class="text_droite"><u>Achat de marchandises</u></td>
		</tr>
		<?php
                        $achatTotN0=0;
                        $achatTotN1=0;
                        $achatTotN2=0;
                        $achatTotN3=0;
                        $achatTotN4=0;
                         (compt_ech_gl

				$queryTabImportN0="select IMPORT_ID,IMPORT_COMPTES, IMPORT_SOLDE, IMPORT_INTITULES,N2, N3, N4 
									from tab_importer,tab_ehantillon_gl,tab_rdc_cf_f4_1 
									where tab_importer.MISSION_ID='$mission_id' 
										  and tab_rdc_cf_f4_1.mission_id=tab_importer.MISSION_ID
										  and tab_importer.MISSION_ID=tab_ehantillon_gl.MISSION_ID 
										  and 
										  
										  and tab_ehantillon_gl.objectif='B5'

										  and IMPORT_CHOIX_ANNEE='N' 
										  and IMPORT_CYCLE='F- Charges fournisseurs'

										  and tab_importer.IMPORT_COMPTES=tab_rdc_cf_f4_1.compte
										  and reference='achat'";

				$reponseN0=$bdd->query($queryTabImportN0);
				while ($donneeN0=$reponseN0->fetch()) 
				{
															
						$queryTabImportN1="select IMPORT_COMPTES, IMPORT_SOLDE from tab_importer where IMPORT_ID='".$donneeN0["IMPORT_ID"]."' and IMPORT_CHOIX_ANNEE='N-1'";

			//for($i=0;$i<count($idAchat);$i++)
			//{
			
						/////////////Selection de l'information de la table import::import compte,libellé, N1 et N2 ///////
						
						
						
						$reponseN1=$bdd->query($queryTabImportN1);
						
						
						$donneeN1=$reponseN1->fetch();
			
			
                       // $queryF4N='select N2, N3, N4 from tab_rdc_cf_f4_2 where mission_id='.$mission_id.' and compte="'.$donneeN0['IMPORT_COMPTES'].'" ;
                       // $reponseF4N=$bdd->query($queryF4N);
                        //$donneesF4N=$reponseF4N->fetch();                        
                        
						?>
						<tr bgcolor="#ccc">
							<td><input name="COMPTE_ID[]" value="<?php echo $donneeN0['IMPORT_COMPTES']; ?>" id="CPT<?php echo $i; ?>" size="10px" disabled /></td>
		                    <td><input name="IMPORT_INTITULES[]" value="<?php echo $donneeN0['IMPORT_INTITULES']; ?>" id="LBL<?php echo $i; ?>" size="30px"  disabled/></td>
		                    <td align="center"><input  name="IMPORT_SOLDE[]" value="<?php if($donneeN0['IMPORT_SOLDE']=="") echo '0'; else echo $donneeN0['IMPORT_SOLDE']; ?>" id="CPTN0<?php echo $i; ?>" size="10px" disabled /></td>
							<td align="center"><input type="Text" value="<?php if($donneeN1['IMPORT_SOLDE']=="") echo '0'; else echo $donneeN1['IMPORT_SOLDE']; ?>" id="CPTN1<?php echo $i; ?>" size="10px" disabled/></td>
		                    <td align="center"><input type="Text" id="CPTN2<?php echo $i; ?>" <?php if($idAchat[0]==0) echo 'disabled'; ?> size="10px" value="<?php if($donneeN0['N2']=="") echo '0'; else echo $donneesF4N['N2']; ?>" /></td>
		                    <td align="center"><input type="Text" id="CPTN3<?php echo $i; ?>" <?php if($idAchat[0]==0) echo 'disabled'; ?> size="10px" value="<?php if($donneeN0['N3']=="") echo '0'; else echo $donneeN0['N3']; ?>" ></td>
							<td align="center"><input type="Text" id="CPTN4<?php echo $i; ?>" <?php if($idAchat[0]==0) echo 'disabled'; ?> size="10px" value="<?php if($donneeN0['N4']=="") echo '0'; else echo $donneeN0['N4']; ?>" /></td>
						</tr>
						<?php	
                            $achatTotN0=$achatTotN0+$donneeN0['IMPORT_SOLDE'];
                            $achatTotN1=$achatTotN1+$donneeN1['IMPORT_SOLDE'];
                            $achatTotN2=$achatTotN2+$$donneeN0['N2'];
                            $achatTotN3=$achatTotN3+$$donneeN0['N3'];
                            $achatTotN4=$achatTotN4+$$donneeN0['N4'];
			}	
                        $compteAchat=$i;
		?>
                <tr>				
			<td colspan="2" class="text_droite"><u>Achat totals</u></td>
			<td style="background-color:#ccc;" align="center"><input type="Text" id="AchatTot0" value="<?php echo number_format($achatTotN0, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="AchatTot1" value="<?php echo number_format($achatTotN1, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="AchatTot2" value="<?php echo number_format($achatTotN2, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="AchatTot3" value="<?php echo number_format($achatTotN3, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="AchatTot4" value="<?php echo number_format($achatTotN4, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                       
		</tr>
                <input type="Text" id="compteAchat" value="<?php echo $compteAchat; ?>" style="display:none;" />
                <tr>
                    <td colspan="2" class="text_droite"><u>Frais accessoires</u></td>
		</tr>             
            <?php
             $fraisTotalN0=0;
             $fraisTotalN1=0;
             $fraisTotalN2=0;
             $fraisTotalN3=0;
             $fraisTotalN4=0;
			for($i=0;$i<count($idFrais);$i++)
			{
			
						/////////////Selection de l'information de la table import::import compte,libellé, N1 et N2 ///////
						$queryTabImportN0='select IMPORT_COMPTES, IMPORT_SOLDE, IMPORT_INTITULES from tab_importer where IMPORT_ID='.$idFrais[$i].' and IMPORT_CHOIX_ANNEE="N"';
						$queryTabImportN1='select IMPORT_COMPTES, IMPORT_SOLDE from tab_importer where IMPORT_ID='.$idFrais[$i].' and IMPORT_CHOIX_ANNEE="N-1"';
						
						$reponseN0=$bdd->query($queryTabImportN0);
						$reponseN1=$bdd->query($queryTabImportN1);
						
						$donneeN0=$reponseN0->fetch();
						$donneeN1=$reponseN1->fetch();
						
						
						$queryF4N1='select N2, N3, N4 from tab_rdc_cf_f4_2 where mission_id='.$mission_id.' and compte="'.$donneeN0['IMPORT_COMPTES'].'" and reference="frais"';
			            $reponseF4N1=$bdd->query($queryF4N1);
			            $donneesF4N1=$reponseF4N1->fetch(); 
                        
						?>
							<tr bgcolor="#ccc">
								<td><input name="COMPTE_ID[]" value="<?php echo $donneeN0['IMPORT_COMPTES']; ?>" id="CPTFRAI<?php echo $i; ?>"  size="10px" disabled /></td>
			                    <td><input name="IMPORT_INTITULES[]" value="<?php echo $donneeN0['IMPORT_INTITULES']; ?>" id="LBLFRAI<?php echo $i; ?>"  size="30px" disabled /></td>
								<td align="center"><input type="Text" value="<?php if($donneeN0['IMPORT_SOLDE']=="") echo '0'; else echo $donneeN0['IMPORT_SOLDE']; ?>" id="FRAIN0<?php echo $i; ?>"  size="10px" disabled /></td>
			                                        <td align="center"><input type="Text" value="<?php if($donneeN1['IMPORT_SOLDE']=="") echo '0'; else echo $donneeN1['IMPORT_SOLDE']; ?>" id="FRAIN1<?php echo $i; ?>" size="10px" disabled /></td>
								<td align="center"><input type="Text" id="FRAIN2<?php echo $i; ?>" size="10px" <?php if($donneeN0['IMPORT_COMPTES']=="") echo 'disabled'; ?> value="<?php if($donneesF4N1['N2']=="") echo '0'; else echo $donneesF4N1['N2']; ?>" /></td>
								<td align="center"><input type="Text" id="FRAIN3<?php echo $i; ?>" size="10px" <?php if($donneeN0['IMPORT_COMPTES']=="") echo 'disabled'; ?> value="<?php if($donneesF4N1['N3']=="") echo '0'; else echo $donneesF4N1['N3']; ?>" /></td>
								<td align="center"><input type="Text" id="FRAIN4<?php echo $i; ?>" size="10px" <?php if($donneeN0['IMPORT_COMPTES']=="") echo 'disabled'; ?> value="<?php if($donneesF4N1['N4']=="") echo '0'; else echo $donneesF4N1['N4']; ?>" /></td>
							</tr>
						<?php	
                            $fraisTotalN0=$fraisTotalN0+$donneeN0['IMPORT_SOLDE'];
                            $fraisTotalN1=$fraisTotalN1+$donneeN1['IMPORT_SOLDE'];
                            $fraisTotalN2=$fraisTotalN2+$donneesF4N1['N2'];
                            $fraisTotalN3=$fraisTotalN3+$donneesF4N1['N3'];
                            $fraisTotalN4=$fraisTotalN4+$donneesF4N1['N4'];
			}
            $compteFrais=$i;
		?>
                <tr>				
			<td colspan="2" class="text_droite"><u>Frais totals</u></td>
			<td style="background-color:#ccc;" align="center"><input type="Text" id="FraisTot0" value="<?php echo number_format($fraisTotalN0, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="FraisTot1" value="<?php echo number_format($fraisTotalN1, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="FraisTot2" value="<?php echo number_format($fraisTotalN2, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="FraisTot3" value="<?php echo number_format($fraisTotalN3, 2, ',', ' '); ?>" size="10px" disabled /></td> 
                        <td style="background-color:#ccc;" align="center"><input type="Text" id="FraisTot4" value="<?php echo number_format($fraisTotalN4, 2, ',', ' '); ?>" size="10px" disabled /></td> 
		</tr>               
                <input type="Text" id="compteFrais" value="<?php echo $compteFrais; ?>"  style="display:none;"/>              
		<tr bgcolor="white">
			<td colspan="2" class="text_droite">Stock final (-)
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
		<tr bgcolor="white">
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
    <!--center><input type="Button" value="Retélécharger" id="Redownload" class="bouton" /></center-->
<!--/div-->
