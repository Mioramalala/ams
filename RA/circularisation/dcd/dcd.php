<?php
    include './../../../connexion.php';
    @session_start();
    $mission_id=@$_SESSION['idMission'];

    $sql = "SELECT MISSION_DATE_CLOTURE FROM tab_mission WHERE MISSION_ID = ".$mission_id;
    $reponse=$bdd->query($sql);
    $donnees=$reponse->fetch();
    $date = $donnees['MISSION_DATE_CLOTURE'];

    $sql2= "SELECT * FROM tab_circularisation_fichier WHERE fileCategory= 'dcd' AND fileIdMission = ".$mission_id;
    $reponseDcd=$bdd->query($sql2);
?>
<script>

	function lettreDcd (){

        var id = $(this).parent().parent().attr('id');
        var nom = $(this).parent().parent().find('.nom').val();
        var coord = $(this).parent().parent().find('.coord').val();
        var dateCloture = '<?= $date ?>';

        data = {nomDcd : nom , CoordDcd : coord, dateCloture: dateCloture};

        $.ajax({
            type:"POST",
            url:"/RA/circularisation/dcd/exportgatway.php",
            data: {nomDcd : nom , CoordDcd : coord, dateCloture: dateCloture},
            success:function(e){
                $("#"+id+" .down").html('<a href="RA/circularisation/dcd/'+e+'"><img src="../icone/les_words.png" /></a>');
            }
        });
    }

    function ajout(){
	    $(".ajout").hide();
	    var nbr = $("#nombreDcd").val();
	    nbr= parseInt(nbr);
	    nbr++;
	    $("#nombreDcd").val(nbr);
	    var newForm = "<tr id='dcd"+nbr+"'>";
	    newForm+="<td><input class='entree nom' type='text' name='nomDcd'/></td>";
	    newForm+="<td><input class='entree coord' type='text' name='CoordDcd'/></td>";
	    newForm+="<td><input class='generer' type='button' value='Generer'></td>";
	    newForm+="<td><input class='ajout' type='button' onclick='ajout()' value='+'></td><td class='down'></td></tr>";
	    $('#listeDcd tbody').append(newForm);
	    $( ".generer" ).bind( "click", lettreDcd);
	}

$(function(){
	$(".btn_retour").click(function(){
		$('#contenue').load("RA/circularisation/circularisation.php");
	});

	$( ".generer" ).bind( "click", lettreDcd);
	// $("#btn_tel").click(function(){
	// 	// $('#progressbarRA').show();
	// 	var listChecked = [];
	// 	$("#tbl_ech tr input[type='checkbox']:checked").each(function(){
	// 		listChecked.push($(this).attr('alt'));
	// 	}); 
	// 	// alert(listChecked);

	// 	$.ajax({
	// 		type:"POST",
	// 		// url:"RA/circularisation/dcd/GetEchant_GL.php",
	// 		url:"RA/circularisation/dcd/table_new_dcd.php",
	// 		data:{valTransfert: true, listId: listChecked},
	// 		success:function(e){
	// 			// alert(e);
	// 			$('#contenue').html(e);
	// 		}

	// 	});
	// });
});

</script>
 <style>
  #tbl_ech{
  border-collapse:collapse;
  }
  #tbl_ech td{
   border:1px solid;
   background-color:#FFFAFA;
   
  }
  #echant_GL{
  overflow:auto;
  height:220px;
  width:800px;
  }
  #btn_tel, .btn_retour{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:300px;
  height:auto;
  }
  #btn_tel:hover, .btn_retour:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff; 
  }
   
  #tet{
  margin-left:-17px;
  margin-top:20px;
  }
  #tet td{
   border:1px solid #black;
   background-color:#0074bf;
   color:#fff;
  }
  
 </style>
 <div width="100%" style="height:530px; overflow:auto";>
 <table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td style="color:white"><center>DEBITEURS ET CREDITEURS DIVERS : Comptes 45 et 46</center></td>
	</tr>
</table>
 <center>
<table width="100%" height="50" style="text-align:left;">
	<tr>
		 <td><center><b><label style="color:blue;">Sélectionner débiteurs et créditeurs divers à circulariser									
		 </label></b></center></td>
	 </tr>
</table>

 
  <table style="border:1px solid #blue;width:900px">
	  <tr id="tet">
	    <td width="20px"></td>
		<td width="300px">Compte</td>
		<td width="300px">Code</td>
		<td width="300px">Annexe</td>
		<td width="280px">Solde</td>
	  </tr>
  </table>
    <div style="max-height:300px;width:900px;overflow:auto;">
	<table id="tbl_ech" style="width:900px;">
	<?php 
	/*
		$reponse=$bdd->query("select IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_SOLDE from  tab_importer where (IMPORT_COMPTES like '45%' OR IMPORT_COMPTES like '46%') AND MISSION_ID=".$mission_id);
		while($donnees=$reponse->fetch()){
		$id=$donnees['IMPORT_ID'];
		$Comp=$donnees['IMPORT_COMPTES'];
		$annexe=$donnees['IMPORT_INTITULES'];
		$sold=number_format((double)$donnees['IMPORT_SOLDE'], 2, ',', ' ');
	*/
		$reponse=$bdd->query("select BAL_AUX_ID,BAL_AUX_CODE,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where (BAL_AUX_COMPTE like '45%' OR BAL_AUX_COMPTE like '46%') AND MISSION_ID=".$mission_id);
		while($donnees=$reponse->fetch()){
			$id=$donnees['BAL_AUX_ID'];
			$Comp=$donnees['BAL_AUX_COMPTE'];
			$annexe=$donnees['BAL_AUX_LIBELLE'];
			$code=$donnees['BAL_AUX_CODE'];
			$sold=number_format((double)$donnees['BAL_AUX_SOLDE'], 2, ',', ' ');
	?>
	   <tr>
			<td width="20px"><input type="checkbox" id="<?php echo $id;?>" alt="<?= $annexe ?>" value="<?php echo $id;?>" multiple='multiple' name="chackGL[]"/></td>
			<td width="300px"><?php echo $Comp;?></td>
			<td width="300px"><?php echo $code;?></td>
			<td width="300px"><?php echo $annexe;?></td>
			<td width="280px"><?php echo $sold;?></td>
	   </tr>
	   <?php } ?>
	  </table>
   </div>
  


<form method="post" id="formulaire_lettre" onsubmit="return false">
		<input type='hidden' name='nombreDcd' id='nombreDcd' value='1'>
		<table id="listeDcd">
			<thead>
				<tr>
					<th>Nom de la dcd</th>
					<th>Coordonnées</th>
				</tr>
			</thead>
			<?php 
				$i=1;
				while ($donnees=$reponseDcd->fetch()) {
					?>
					<tr id="dcd<?= $i++ ?>">
						<td><input class="entree nom" type='text' name='nomDcd' value="<?= $donnees['fileDestName'] ?>" /></td>
						<td><input class="entree coord" type='text' name='CoordDcd' value="<?= $donnees['fileDestCoord'] ?>" /></td>
						<td><input class='generer' type='button' value='Generer'></td>
						<td></td>
						<td class="down"><a href="RA/circularisation/dcd/<?= $donnees['fileName'] ?>"><img src="../icone/les_words.png" /></a></td>
					</tr>
					<?php
				}
			?>
			<tr id="dcd<?= $i++ ?>">
			  <td><input class="entree nom" type='text' name='nomDcd'/></td>
			  <td><input class="entree coord" type='text' name='CoordDcd'/></td>
			  <td><input class='generer' type='button' value='Generer'></td>
			  <td><input class='ajout' type='button' onclick="ajout()" value='+'></td>
			  <td class="down"></td>
			</tr>
	  </table>      
	</form>

</center>
	<td><p class="btn_retour">Retour</p></td>
	
 <div id="progressbarRA" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>  
 </div>