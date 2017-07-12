<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';
?>
<script>
	var testEntier=0;
	function testEntierExact(id){
		test=1;	
		testEntier=0;
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
			testEntier=1;
		}
		return test;
	}
</script>
	<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
		<center><label style="font-size:12px;">VALIDATION DES FOURNISSEURS A SOLDE DEBITEUR</label></center>
	</div>
    <div style="overflow:auto;height:400px;">
	<table bgcolor="#00698d" width="99.8%">
		<tr class="tr_table_text_entete">
			<td>Compte</td>
			<td>Libellé</td>
			<td>Solde balance (1)</td>
			<td>Solde GL(2)</td>
			<td>Solde balance auxiliaire (3)</td>
			<td>Ecart (1)-(2)</td>
			<td>Obsérvations</td>
			<td>ECART (1)-(3)</td>
			<td>Obsérvations</td>
		</tr>
		<?php
		
                $queryBalGen='select IMPORT_SOLDE, IMPORT_COMPTES, IMPORT_INTITULES from tab_importer where MISSION_ID='.$mission_id.' and IMPORT_CYCLE="F- Charges fournisseurs" and IMPORT_CHOIX_ANNEE="N" and IMPORT_COMPTES like "4%" order by IMPORT_COMPTES asc';
                $reponseBalGen=$bdd->query($queryBalGen);
                $SoldeBalGen=0;
                $cpt=0;
                while($donneeBalGen=$reponseBalGen->fetch()){
                    
                        $comptePp=$donneeBalGen['IMPORT_COMPTES'];
                        $SoldeBalGen=$donneeBalGen['IMPORT_SOLDE'];
                        $libelleBalGen=$donneeBalGen['IMPORT_INTITULES'];

                        $queryGl='select GL_GEN_SOMME_COMPTE, GL_GEN_SOMME_SOLDE from tab_somme_gl_gen where MISSION_ID='.$mission_id.' and GL_GEN_SOMME_CYCLE="F- Charges fournisseurs" and GL_GEN_SOMME_COMPTE="'.$comptePp.'" and GL_GEN_SOMME_COMPTE like "4%" order by GL_GEN_SOMME_COMPTE asc';
                        $reponseGl=$bdd->query($queryGl);                        
                        $soldeGl=0;
                        $ecart1=0;
                        while($donneesGl=$reponseGl->fetch()){

                                $soldeGl=$donneesGl['GL_GEN_SOMME_SOLDE'];
                                //////////Comparaison de entre le solde de la balance générale et le grand livre/////////
                                $queryGlAux='select GL_AUX_SOMME_SOLDE from tab_somme_gl_aux where GL_AUX_SOMME_COMPTE="'.$donneesGl['GL_GEN_SOMME_COMPTE'].'" and MISSION_ID='.$mission_id.' and GL_AUX_SOMME_CYCLE ="F- Charges fournisseurs" and GL_AUX_SOMME_COMPTE="'.$comptePp.'"';
                                $reponseGlAux=$bdd->query($queryGlAux);
                                $soldeGlAux=0;
                                
                                while($donneesGlAux=$reponseGlAux->fetch()){
                                        $soldeGlAux=$donneesGlAux['GL_AUX_SOMME_SOLDE'];
                                }	

                                ///////Affichage des données dans la table  tab_rdc_cf_f5///////////////
                                $queryF5='select observation1, observation2 from  tab_rdc_cf_f5 where compte="'.$donneesGl['GL_GEN_SOMME_COMPTE'].'" and mission_id='.$mission_id;
                                $reponseF5=$bdd->query($queryF5);
                                $donneesF5=$reponseF5->fetch();
                                $obs1=$donneesF5['observation1'];
                                $obs2=$donneesF5['observation2'];

                                $ecart1=$SoldeBalGen-$soldeGl;
                                $ecart2=$SoldeBalGen-$soldeGlAux;
                                //$queryAux='select '


                                //$ecart2=$soldeGl-$soldeAux;

                        ?>
                                <tr>
                                        <td bgcolor="#ccc"><input type="Text" id="compteF5<?php echo $cpt; ?>" value="<?php echo $donneesGl['GL_GEN_SOMME_COMPTE']; ?>" size="10px" disabled="disabled" /></td>
                                        <td bgcolor="#ccc"><input type="Text" id="libelleF5<?php echo $cpt; ?>" value="<?php echo $libelleBalGen; ?>"  size="10px" disabled="disabled"/></td>
                                        <td style="background-color:white;" align="center">
                                                <input type="Text" id="soldeBalF5<?php echo $cpt; ?>" value="<?php echo $SoldeBalGen; ?>" size="10px" disabled="disabled" />
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <input type="Text" id="soldeGLF5<?php echo $cpt; ?>" value="<?php echo $donneesGl['GL_GEN_SOMME_SOLDE']; ?>" size="10px" disabled="disabled"/>
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <input type="Text" id="soldeAuxF5<?php echo $cpt; ?>" value="<?php echo $soldeGlAux; ?>" size="10px" disabled="disabled"/>
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <input type="Text" id="ecartF5<?php echo $cpt; ?>" value="<?php echo $ecart1; ?>" size="10px" onkeyup="testEntierExact(this.id)" disabled="disabled"/>
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <textarea id="observationF5<?php echo $cpt; ?>" rows="5" cols="10"><?php echo $obs1; ?></textarea>
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <input type="Text" id="ecart2F5<?php echo $cpt; ?>" value="<?php echo $ecart2; ?>" size="10px" disabled="disabled"/>
                                        </td>
                                        <td style="background-color:white;" align="center">
                                                <textarea id="observation2F5<?php echo $cpt; ?>" rows="5" cols="10"><?php echo $obs2; ?></textarea>
                                        </td>
                                </tr>
                                <?php  
                                $cpt++;
                                }                         
                }
                ?>				
	</table>
    </div>
	<input type="Text" value="<?php echo $cpt;?>" id="compteF5" style="display:none;" />