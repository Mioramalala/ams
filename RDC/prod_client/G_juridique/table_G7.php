<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
//echo $mission_id;
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
 </style>
<script>
$(function(){
		var ligne = document.getElementById('nbLignes').value;

		$('#bt_supp').click(function(){
		//alert("moins o");
			if(parseInt(ligne)>1){
				var date= document.getElementById("date_"+ligne).value;
				var facture = document.getElementById("facture_"+ligne).value;
				var client = document.getElementById("client_"+ligne).value;
				var montant = document.getElementById("montant_"+ligne).value;
				var tva = document.getElementById("tva_"+ligne).value;
				var observation = document.getElementById("observation_"+ligne).value;
				delete_Input(date, facture,client,montant,tva,observation, <?php echo $mission_id; ?>);

				deleterow('tab_date');
				ligne = parseInt(ligne)-1;
				document.getElementById('nbLignes').value = ligne;
			}
		});
		
		$('#bt_ajout').click(function(){
		//alert("plus o");
			ligne = parseInt(ligne)+1;

			var tableau = document.getElementById('tab_date');
			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var td6 = document.createElement("td");
			var td7 = document.createElement("td");
			var text1 = document.createElement("textarea");
			var text2 = document.createElement("textarea");
			var text3 = document.createElement("textarea");
			var text4 = document.createElement("textarea");
			var text5 = document.createElement("textarea");
			var text6 = document.createElement("textarea");

			tr.style.backgroundColor = "white";

			text1.cols = "15";
			text2.cols = "15";
			text3.cols = "15";
			text4.cols = "15";
			text5.cols = "15";
			text6.cols = "15";
			

			text1.id = "date_"+ligne;
			text2.id = "facture_"+ligne;
			text3.id = "client_"+ligne;
			text4.id = "montant_"+ligne;
			text5.id = "tva_"+ligne;
			text6.id = "observation_"+ligne;

			td1.appendChild(text1);
			td2.appendChild(text2);
			td3.appendChild(text3);
			td4.appendChild(text4);
			td5.appendChild(text5);
			td6.appendChild(text6);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			tr.appendChild(td5);
			tr.appendChild(td6);
			tr.appendChild(td7);
			tableau.appendChild(tr);

			document.getElementById('nbLignes').value = ligne;

		});
});
	function delete_Input(date,facture,client,montant,tva,observation,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/F_rattachement/delete_Input_G7.php',
			data:{date:date,facture:facture,client:client,montant:montant,tva:tva,observation:observation,mission_id:mission_id},
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
<div align="center">
<label>CHRONOLOGIE DES FACTURES DE VENTES</label>
<div style="overflow:auto;height:360px;">
<table width="100%" id="tab_date">
	<tr id="tettd">
		<td align="center">Date</td>
		<td align="center">N° facture</td>
		<td align="center">Clients</td>
		<td align="center">Montant HTVA</td>
		<td align="center">TVA</td>
		<td align="center">Observations</td>

	</tr>
	<?php
		include '../../../connexion.php';
		
		$reponse=$bdd->query('select * FROM tab_g7 where MISSION_ID='.$mission_id);
				
		$ligne=0;

		while($donnees=$reponse->fetch()){
	?>
	<tr bgcolor="white">
		<td width="100"><input type="text" id="date_<?php echo $ligne?>" value=""/></td>
		<td width="100"><input type="text" id="facture_<?php echo $ligne?>" value=""/></td>
		<td width="100"><input type="text" id="client_<?php echo $ligne?>" value=""/></td>
		<td width="100"><input type="text" id="montant_<?php echo $ligne?>" value=""/></td>
		<td width="100"><input type="text" id="tva_<?php echo $ligne?>" value=""/></td>
		<td width="100"><input type="text" id="observation_<?php echo $ligne?>" value="<?php echo $donnees['G7_OBSERVATION'];?>"/></td>
	</tr>
	<?php
			$ligne ++;
		}
	?>
	 <input type ="text" id="makacompte" value="<?php echo $ligne ?>" style="display:none;"/>
</table>

<div style="float:left;">
	<input type="button" id="bt_ajout" value="+" class="bouton" /><br/>
	<input type="button" id="bt_supp" value="-" class="bouton"  />
	<input type="hidden" id="nbLignes" value="<?php echo ($ligne-1)?>"/>
</div>

</div>
</div>