<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<style>
#RA{
border-collapse:collapse;
font-size:12px;
}
#RA td{
border:1px solid;
}
.ttr{
background-color:#6495ED;
color:#fff;
height:10px;
}
.cldiv{
width:400px;
height:150px;
border:1px solid #6495ED;
}
.cltxt{
width:350px;
height:90px;
}
#syntCon{
background-color:#6495ED;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">

  <div width="100%" height="70%">
		<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES IMMOBILISATIONS FINANCIERES</label>
		<div style="width:100%; height:230px; overflow:auto;">
			<table width="100%" id="RA">
				<tr class="ttr">
					<td width="7%" height="20px" align="center">Compte</td>
					<td width="7%" align="center">Libellé</td>
					<td width="7%" align="center">Débit</td>
					<td width="7%" align="center">Crédit</td>
					<td width="7%" align="center">Solde N</td>
					<td width="7%" align="center">Solde N-1</td>
					<td width="7%" align="center">Variation</td>
					<td width="7%" align="center">Pourcentage</td>
					<td width="7%" align="center">Commentaire</td>
				</tr>
			
   <?php
    include '../../../connexion.php';
  
    $reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where (RA_COMPTE like '26%' OR RA_COMPTE like '27%'
    OR RA_COMPTE like '296%' OR RA_COMPTE like '297%' OR RA_COMPTE like '78%') AND RA_CYCLE='immofi' AND MISSION_ID=".$mission_id." ORDER BY RA_COMPTE");
  
   	while($donnees=$reponse->fetch()){
		$compte=$donnees['RA_COMPTE'];
		$intitule=$donnees['RA_LIBELLE'];
		$debit=$donnees['RA_D'];
		$credit=$donnees['RA_C'];
		$soldeN=$donnees['RA_SOLDE_N'];
		$soldeN1=$donnees['RA_SOLDE_N1'];
		$variation=$donnees['RA_VARIATION'];
		$pourcentage=$donnees['RA_POURCENTAGE'];
		$commentaire=$donnees['RA_COMMENTAIRE'];
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $compte;?></td>
						<td width="7%"><?php echo $intitule;?></td>
						<td width="7%"><?php if(empty($debit)){}else{echo number_format($debit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($credit)){}else{echo number_format($credit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN)){}else{echo number_format($soldeN, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN1)){}else{echo number_format($soldeN1, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($variation)){}else{echo number_format($variation, 2, '.', ' ');}?></td>
						<td width="7%"><?php echo $pourcentage;?>%</td>
						<td width="7%"><?php echo $commentaire?></td>
					</tr>
			<?php
				}
			?>
   </table>
  </div>
   <?php
    $reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='immofi' AND MISSION_ID=".$mission_id);
  
    $Synt=$reponseS->fetch();
    
    $reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra  where CONCLUSION_OBJECTIF='immofi' AND MISSION_ID=".$mission_id);
  
    $Conc=$reponseC->fetch();
   ?>
  
  <div id="syntCon">
  <center>
   <table >
    <tr>
     <td>
      <div  div="synth" class="cldiv">
       <table>
        <tr>
         <td height="15px"><center><label>Synthèse</label></center></td>
        </tr>
        <tr>
         <td><textarea id="txtsynth" class="cltxt" readonly><?php echo $Synt["SYNTHESE"] ?></textarea></td>
        </tr>
       </table>
      </div>
     </td>
     <td>
      <div id="con" class="cldiv">
       <table>
        <tr>
         <td height="15px"><center><label>Conclusion</label></center></td>
        </tr>
        <tr>
         <td><textarea id="txtcon" class="cltxt" readonly><?php echo $Conc["CONCLUSION"] ?></textarea></td>
        </tr>
       </table>
      </div>
     </td>
    </tr>
   </table>
  </center>
  </div>
  </div>