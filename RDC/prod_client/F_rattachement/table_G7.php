<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';
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
 <script type="text/javascript">
 	
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
			

			text1.name = "date[]";
			text2.name = "facture[]";
			text3.name = "client[]";
			text4.name = "montant[]";
			text5.name = "tva[]";
			text6.name = "observation[]";

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

			ligne = parseInt(ligne)+1;
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

$('#bt_enregistrer').click(function(){
	res = $("#tableau").serialize() ;
	
	//alert(res) ;
	
	$.ajax({
		type : 'GET' ,
		url : 'RDC/prod_client/F_rattachement/ajout_stockage_G7.php',
		data : res,
		success : function(){
			alert('Enregistre') ;
		}
	});
});
</script>

<div align="center">
<label>CHRONOLOGIE DES FACTURES DE VENTES</label>
<form method="post"  id="tableau">
<div style="overflow:auto;height:360px;width : 100%;">
<table width="100%" id="tab_date">
	<thead>
	<tr id="tettd">
		<td align="center">Date</td>
		<td align="center">N° facture</td>
		<td align="center">Clients</td>
		<td align="center">Montant HTVA</td>
		<td align="center">TVA</td>
		<td align="center">Observations</td>

	</tr>
	</thead>
	<tbody>

	<?php
		include '../../../connexion.php';
		
		$reponse=$bdd->query('select * FROM tab_g7 where MISSION_ID='.$mission_id);
				
		$ligne=0;

		while($donnees=$reponse->fetch()){
	?>
	<tr bgcolor="white">
		<td width="100"><input type="text" name="date_[]" value="<?php echo $donnees['G7_DATE'];?>"/></td>
		<td width="100"><input type="text" name="facture_" value="<?php echo $donnees['G7_FACTURE'];?>"/></td>
		<td width="100"><input type="text" name="client_" value="<?php echo $donnees['G7_CLIENT'];?>"/></td>
		<td width="100"><input type="text" name="montant_" value="<?php echo number_format((double)$donnees['G7_MONTANT'], 2, '.', ' ');?>"/></td>
		<td width="100"><input type="text" name="tva_" value="<?php echo $donnees['G7_TVA'];?>"/></td>
		<td width="100"><input type="text" name="observation_" value="<?php echo $donnees['G7_OBSERVATION'];?>"/></td>
	</tr>
	<?php
			$ligne ++;
		}
	?>
	 <input type ="text" id="makacompte" value="<?php echo $ligne ?>" style="display:none;"/>
	 </tbody>
</table>

<div style="float:left;">
	<input type="button" id="bt_ajout" value="+" class="bouton" /><br/>
	<input type="button" id="bt_supp" value="-" class="bouton"  />
	<input type="hidden" id="nbLignes" value="<?php echo ($ligne)?>"/>
</div>
<input type="button" id="bt_enregistrer" value="Enregistrer" class="bouton" style="float:center"  /><br/>


</form>
</div>
</div>