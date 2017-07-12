<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES IMMOBILISATIONS CORPORELLES ET INCORPORELLES</label>
<div style="overflow:auto;height:360px;">
<table width="100%">
	<?php
		include '../../../connexion.php';
		
		$reponse=$bdd->query('select RA_COMPTE,libelle,debit,credit,soldeN,soldeN_1,variation,variationEnPourcent,commentaires from table_a_b1 order by compte');
		$entete="";
		$i=0;
		$j=0;
	?>
		<tr bgcolor="#ccc">
		<td width="7%">Compte</td>
		<td width="7%">Libellé</td>
		<td width="7%">Débit</td>
		<td width="7%">Crédit</td>
		<td width="7%">Solde N</td>
		<td width="7%">Solde N-1</td>
		<td width="7%">Variation</td>
		<td width="7%">% de variation C</td>
		<td width="7%">Commentaires</td>
	</tr>
	<?php
		while($donnees=$reponse->fetch())
		{
			if($i==0 OR $j==0)
			{
				if($donnees['compte'][0]==2)			
				{
					if($i==0 AND $donnees['compte'][1]>=0 AND $donnees['compte'][1]<=5)
					{
						$entete="IMMOBILISATIONS";
						$i=1;
					}
					if($j==0 AND ($donnees['compte'][1]==8 OR $donnees['compte'][1]==9))
					{
						if($donnees['compte'][2]>=0 AND $donnees['compte'][2]<=5)
						{
							$entete="AMORTISSEMENTS  & PROVISIONS";
							$j=1;
						}
					}
				}
			}

			if($entete!="")
			{
		?>
				<tr bgcolor="white">
				<td width="3%"></td>
				<td width="7%"><strong><?php echo $entete; ?></strong></td>
				<td width="7%"></td>
				<td width="7%"></td>
				<td width="7%"></td>
				<td width="7%"></td>
				<td width="7%"></td>
				<td width="7%"></td>
				<td width="7%" ></td>
			</tr>
			<tr bgcolor="white">
				<td width="3%"><?php echo $donnees['compte'];?></td>
				<td width="7%"><?php echo $donnees['libelle'];?></td>
				<td width="7%"><?php echo number_format((double)$donnees['debit'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['credit'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['soldeN'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['soldeN_1'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['variation'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['variationEnPourcent'],2,","," ");?></td>
				<td width="7%" ><input type="text" value="<?php echo $donnees['commentaires'];?>"/></td>
			</tr>
		<?php

			}			
			else
			{
		?>
			<tr bgcolor="white">
				<td width="3%"><?php echo $donnees['compte'];?></td>
				<td width="7%"><?php echo $donnees['libelle'];?></td>
				<td width="7%"><?php echo number_format((double)$donnees['debit'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['credit'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['soldeN'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['soldeN_1'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['variation'],2,","," ");?></td>
				<td width="7%"><?php echo number_format((double)$donnees['variationEnPourcent'],2,","," ");?></td>
				<td width="7%" ><input type="text" value="<?php echo $donnees['commentaires'];?>"/></td>
			</tr>
		<?php			
			}
			$entete="";
		}
		?>
</table>

</div>
</div>