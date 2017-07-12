<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

?>
<script>
	$(function(){
		$('#DownloadF4').click(function(){
			var compte=$('#compteF41').val();
			var idAchat=new Array();
			var idFrais=new Array();
			var p=0;
			var k=0;
			for(i=0;i<compte;i++){
				if(document.getElementById("checkCpt"+i).checked==true){
					idAchat[p]=$('#idAchat'+i).val();
					p++;
				}
				if(document.getElementById("checkFrais"+i).checked==true){
					idFrais[k]=$('#idFrais'+i).val();
					k++;
				}
			}
                        if(k==0)idFrais[0]=0;
                        if(p==0)idAchat[0]=0;
			$.ajax({
				type:'POST',
				url:'RDC/charge_fournisseur/A_coherence/table_F4_1.php',
				data:{idAchat:idAchat, idFrais:idFrais, mission_id:<?php echo $mission_id; ?>, compte:compte},
				success:function(e){
					$('#contenue_travail').html(e);
				}
			});
		});
	});
</script>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
	<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
		<center><label style="font-size:12px;">ANALYSE DE LA MARGE BRUTE (F4)</label></center>
	</div>
	<label style="font-size:18px;">
		Veuillez sélectionner les comptes concérnés
	</label>
	<div style="height:320px;">
	<table bgcolor="#00698d" width="100%">
		<tr style="text-align:center;color:white;">
			<td colspan="3" style="text-align:center;color:white;">Achats</td>
			<td colspan="3" style="text-align:center;color:white;font-weight:normal;">Frais accessoires/achats</td>
		</tr>
        </table>        
        <table bgcolor="#00698d" width="100%">
            <tr>
                <td width="50%">
                    <table width="100%">
                            <tr class="tr_tete_F6">
                                    <td width="6%"></td>
                                    <td style="color:white;" width="20.5%"><label>Comptes</label></td>			
                                    <td style="color:white;font-weight:normal;"><label>Libellés</label></td>		
                            </tr>
                    </table>
                    <div style="overflow:auto;height:240px">
                        <table bgcolor="#00698d" width="100%">
                        <?php
                            $selectTabImport='select IMPORT_ID, IMPORT_COMPTES, IMPORT_INTITULES from tab_importer where MISSION_ID='.$mission_id.' and IMPORT_CHOIX_ANNEE="N" and IMPORT_CYCLE="F- Charges fournisseurs" order by IMPORT_COMPTES asc'; 
                            $reponse=$bdd->query($selectTabImport);
                            $cpt=0;
                            while($donnees=$reponse->fetch()){
                        ?>                        
                            <tr bgcolor="white" style="font-size:12px;">
                                    <td><input type="Checkbox" id="checkCpt<?php echo $cpt; ?>" />
                                            <input type="Text" value="<?php echo $donnees['IMPORT_ID']; ?>" style="display:none;" id="idAchat<?php echo $cpt; ?>"/>
                                    </td>
                                    <td><?php echo $donnees['IMPORT_COMPTES']; ?></td>
                                    <td><?php echo $donnees['IMPORT_INTITULES']; ?></td>
                            </tr>
                        <?php
                        $cpt++;
                            }
                        ?>
                        </table>
                    </div>
                </td>
                <td width="50%">
                    <table width="100%">
                            <tr class="tr_tete_F6">
                                    <td width="6%"></td>
                                    <td style="color:white;" width="20.5%"><label>Comptes</label></td>			
                                    <td style="color:white;font-weight:normal;"><label>Libellés</label></td>		
                            </tr>
                    </table>
                    <div style="overflow:auto;height:240px">
                        <table bgcolor="#00698d" width="100%">
                        <?php
                            $selectTabImport='select IMPORT_ID, IMPORT_COMPTES, IMPORT_INTITULES from tab_importer where MISSION_ID='.$mission_id.' and IMPORT_CHOIX_ANNEE="N" and IMPORT_CYCLE="F- Charges fournisseurs" order by IMPORT_COMPTES asc'; 
                            $reponse=$bdd->query($selectTabImport);
                            $cpt=0;
                            while($donnees=$reponse->fetch()){
                        ?>                        
                            <tr bgcolor="white" style="font-size:12px;">
                                    <td><input type="CheckBox" id="checkFrais<?php echo $cpt; ?>" />
                                            <input type="Text" value="<?php echo $donnees['IMPORT_ID']; ?>" style="display:none;" id="idFrais<?php echo $cpt; ?>"/>
                                    </td>
                                    <td><?php echo $donnees['IMPORT_COMPTES']; ?></td>
                                    <td><?php echo $donnees['IMPORT_INTITULES']; ?></td>
                            </tr>
                        <?php
                        $cpt++;
                            }
                        ?>
                        </table>
                </td>
            </tr>
        </table>
	<input type="Text" value="<?php echo $cpt; ?>" id="compteF41" style="display:none;" />
	</div>
<center><input type="Button" id="DownloadF4" value="Télécharger" class="bouton"/></center>
