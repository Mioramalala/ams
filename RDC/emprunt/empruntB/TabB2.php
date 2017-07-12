<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{
				width: 100%;
				height: 100%;
				font-size: 8pt;
			}
		</style>
<script>
$(function(){
		var ligne = document.getElementById('nbLignes').value;

		$('#bt_supp').click(function(){
			if(parseInt(ligne)>1){
				var date = document.getElementById('date_'+ligne).value;
				var libelle = document.getElementById('libelle_'+ligne).value;	
				var montant = document.getElementById('montant_'+ligne).value;
				var compte = document.getElementById('compte_'+ligne).value;
				var commentaire = document.getElementById('commentaire_'+ligne).value;
				delete_Input(date, libelle, montant, compte, commentaire, <?php echo $mission_id; ?>);

				deleterow('tabB2');
				ligne = parseInt(ligne)-1;
				document.getElementById('nbLignes').value = ligne;
			}
		});
		
		$('#bt_ajout').click(function(){
			ligne = parseInt(ligne)+1;
			var tableau = document.getElementById('tabB2');

			row=document.createElement('tr');

			cell1=document.createElement('td');
			cell2=document.createElement('td');
			cell3=document.createElement('td');
			cell4=document.createElement('td');
			cell5=document.createElement('td');


   			text1=document.createElement('textarea');
   			text2=document.createElement('textarea');
   			text3=document.createElement('textarea');   		
   			text4=document.createElement('textarea');
   			text5=document.createElement('textarea');
  	

   			text1.id = "date_"+ligne;
   			text2.id = "libelle_"+ligne;
   			text3.id = "montant_"+ligne;
   			text4.id = "compte_"+ligne;
   			text5.id = "commentaire_"+ligne;

   			cell1.appendChild(text1);    
   			cell2.appendChild(text2);    
   			cell3.appendChild(text3);    
   			cell4.appendChild(text4);    
    		cell5.appendChild(text5);      			
   

			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			row.appendChild(cell4);
			row.appendChild(cell5);			


			tableau.appendChild(row);
			document.getElementById('nbLignes').value = ligne;
		});
});
	function delete_Input(date, libelle, montant, compte, commentaire, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/emprunt/empruntB/delete_Input_B2.php',
			data:{date:date, libelle:libelle, montant:montant, 
			compte:compte, commentaire:commentaire, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function deleterow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    table.deleteRow(rowCount -1);
}
</script>
	</head>
	<body>
		<center>
			<p class="titreRenvoie">Justification et correct comptabilisation des charges d'intérêts</p>
		</center>
		<div class="cadre">
			<table id="tabB2">
				<tr class="sous-titre">
					<td width="100px">Date</td>
					<td width="200px">Libellé</td>
					<td width="100px">Montant</td>
					<td width="100px">Comptabilisation/Compte</td>
					<td width="200px">Commentaires</td>
				</tr>
				<?php
					include '../../../connexion.php';
			
					$reponse=$bdd->query('select * FROM tab_j3 where MISSION_ID='.$mission_id);
					(int)$ligne=1;

					while($donnees=$reponse->fetch()){
				?>

				<tr bgcolor="white">
					<td><textarea cols="48" id="<?php echo "date_".$ligne ?>"><?php echo $donnees['DATE'] ;?></textarea></td>
					<td><textarea cols="48" id="<?php echo "libelle_".$ligne ?>"><?php echo $donnees['LIBELLE'] ;?></textarea></td>	
					<td><textarea cols="48" id="<?php echo "montant_".$ligne ?>"><?php echo $donnees['MONTANT'] ;?></textarea></td>	
					<td><textarea cols="48" id="<?php echo "compte_".$ligne ?>"><?php echo $donnees['COMPTE'] ;?></textarea></td>	
					<td><textarea cols="48" id="<?php echo "commentaire_".$ligne ?>"><?php echo $donnees['COMMENTAIRE'] ;?></textarea></td>	
				</tr>
				<?php
						$ligne = $ligne +1;
					}
				?>
</table>
<div style="float:right;">
	<input type="button" id="bt_ajout" value="+" class="bouton" style="color:white; background-color:black;"/>
	<input type="button" id="bt_supp" value="-" class="bouton"  style="color:white; background-color:black;"/>
	<input type="hidden" id="nbLignes" value="<?php echo ($ligne-1)?>"/>
</div>
		</div>
		
	</body>