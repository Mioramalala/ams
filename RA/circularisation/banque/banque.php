<?php
    include './../../../connexion.php';
    @session_start();
    $mission_id=@$_SESSION['idMission'];

    $sql = "SELECT MISSION_DATE_CLOTURE FROM tab_mission WHERE MISSION_ID = ".$mission_id;
    $reponse=$bdd->query($sql);
    $donnees=$reponse->fetch();
    $date = $donnees['MISSION_DATE_CLOTURE'];

    $sql2= "SELECT * FROM tab_circularisation_fichier WHERE fileCategory= 'banque' AND fileIdMission = ".$mission_id;
    $reponseBanque=$bdd->query($sql2);
 ?>
<script>

 	function lettreBanque (){

        var id = $(this).parent().parent().attr('id');
        var nom = $(this).parent().parent().find('.nom').val();
        var coord = $(this).parent().parent().find('.coord').val();
        var dateCloture = '<?= $date ?>';

        data = {nomBanque : nom , CoordBanque : coord, dateCloture: dateCloture};

        $.ajax({
            type:"POST",
            url:"/RA/circularisation/banque/exportgatway.php",
            data: {nomBanque : nom , CoordBanque : coord, dateCloture: dateCloture},
            success:function(e){
                $("#"+id+" .down").html('<a href="RA/circularisation/banque/'+e+'"><img src="../icone/les_words.png" /></a>');
            }
        });
    }

    function ajout(){
	    $(".ajout").hide();
	    var nbr = $("#nombreBanque").val();
	    nbr= parseInt(nbr);
	    nbr++;
	    $("#nombreBanque").val(nbr);
	    var newForm = "<tr id='banque"+nbr+"'>";
	    newForm+="<td><input class='entree nom' type='text' name='nomBanque'/></td>";
	    newForm+="<td><input class='entree coord' type='text' name='CoordBanque'/></td>";
	    newForm+="<td><input class='generer' type='button' value='Generer'></td>";
	    newForm+="<td><input class='ajout' type='button' onclick='ajout()' value='+'></td><td class='down'></td></tr>";
	    $('#listeBanque tbody').append(newForm);
	    $( ".generer" ).bind( "click", lettreBanque);
	}

	$(function(){
		$(".btn_retour").click(function(){
			$('#contenue').load("RA/circularisation/circularisation.php");
		});

		$( ".generer" ).bind( "click", lettreBanque);

		// $("#btn_tel").click(function(){
		// 	// $('#progressbarRA').show();

		// 	var listChecked = [];

		// 	$("#list tr input[type='checkbox']:checked").each(function() {
		// 		listChecked.push($(this).attr('value'));
		// 	}); 
		// 	$.ajax({
		// 		type:"POST",
		// 		// url:"RA/circularisation/banque/GetEchant_GL.php",
		// 		url:"RA/circularisation/banque/table_new_banque.php",
		// 		data:{valTransfert: true, listId: listChecked},
		// 		success:function(e){
		// 			//alert(e);
		// 			// $('#contenue').load("RA/circularisation/banque/table_new_banque.php");
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
  #btn_tel:hover, .btn_retour:hover{
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
		<td style="color:white"><center>BANQUE : Compte 512</center></td>
	</tr>
</table>
 <center>
<table width="100%" height="50" style="text-align:left;">
		
	<tr>
		 <td><center><b><label style="color:blue;">Liste des banques								
		 </label></b></center></td>
	</tr>
</table>
 
  <table style="border:1px solid #blue;width:900px">
	  <tr id="tet">
		<!-- <td width="20px"></td> -->
		<td width="300px">Compte</td>
		<td width="300px">Annexe</td>
		<td width="280px">Solde</td>
	  </tr>
  </table>
	<div style="height:300px;width:900px;overflow:auto;">
	<table id="tbl_ech" style="width:900px;">
	<?php 
	$reponse=$bdd->query("select IMPORT_ID,IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_SOLDE from tab_importer where IMPORT_COMPTES like '51%' AND MISSION_ID=".$mission_id);
		while($donnees=$reponse->fetch()){
			$id=$donnees['IMPORT_ID'];
			$Comp=$donnees['IMPORT_COMPTES'];
			$annexe=$donnees['IMPORT_INTITULES'];
			$sold=number_format((double)$donnees['IMPORT_SOLDE'], 2, ',', ' ');
		
	?>
	   <tr>
			<!-- <td width="20px"><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="chackGL[]"/></td> -->
			<td width="300px"><?php echo $Comp;?></td>
			<td width="300px"><?php echo $annexe;?></td>
			<td width="280px"><?php echo $sold;?></td>
	   </tr>
	   <?php } ?>
	  </table>
   </div>
	<center><b><label style="color:blue;">Liste des banques à circulariser								
		 </label></b></center>
   <form method="post" id="formulaire_lettre" onsubmit="return false">
		<input type='hidden' name='nombreBanque' id='nombreBanque' value='1'>
		<table id="listeBanque">
			<thead>
				<tr>
					<th>Nom de la banque</th>
					<th>Coordonnées</th>
				</tr>
			</thead>
			<?php 
				$i=1;
				while ($donnees=$reponseBanque->fetch()) {
					?>
					<tr id="banque<?= $i++ ?>">
						<td><input class="entree nom" type='text' name='nomBanque' value="<?= $donnees['fileDestName'] ?>" /></td>
						<td><input class="entree coord" type='text' name='CoordBanque' value="<?= $donnees['fileDestCoord'] ?>" /></td>
						<td><input class='generer' type='button' value='Generer'></td>
						<td></td>
						<td class="down"><a href="RA/circularisation/banque/<?= $donnees['fileName'] ?>"><img src="../icone/les_words.png" /></a></td>
					</tr>
					<?php
				}
			?>
			<tr id="banque<?= $i++ ?>">
			  <td><input class="entree nom" type='text' name='nomBanque'/></td>
			  <td><input class="entree coord" type='text' name='CoordBanque'/></td>
			  <td><input class='generer' type='button' value='Generer'></td>
			  <td><input class='ajout' type='button' onclick="ajout()" value='+'></td>
			  <td class="down"></td>
			</tr>
	  </table>      
	</form>

 </center>

  
	<!-- <td><p id="btn_tel">Enregistrer les éléments cochées</p></td> -->
	<td><p class="btn_retour">Retour</p></td>
	</div>
 <div id="progressbarRA" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>
