<?php
    include './../../../connexion.php';
    @session_start();
    $mission_id=@$_SESSION['idMission'];

    $sql = "SELECT MISSION_DATE_CLOTURE FROM tab_mission WHERE MISSION_ID = ".$mission_id;
	
	
	//print  $sql;
	
	//exit();
    $reponse=$bdd->query($sql);
    $donnees=$reponse->fetch();
    $date = $donnees['MISSION_DATE_CLOTURE'];

    $sql2= "SELECT * FROM tab_circularisation_fichier WHERE fileCategory= 'avocat' AND fileIdMission = ".$mission_id;
    $reponseLettre=$bdd->query($sql2);
 ?>

<script type="text/javascript" src="../RA/jquery.js"></script>
<script>
function lettreAvocat (){

        var id = $(this).parent().parent().attr('id');
        var nom = $(this).parent().parent().find('.nom').val();
        var coord = $(this).parent().parent().find('.coord').val();
        var dateCloture = '<?= $date ?>';

        data = {nomAvocat : nom , CoordAvocat : coord, dateCloture: dateCloture};

        $.ajax({
            type:"POST",
            url:"/RA/circularisation/avocat/exportgatway.php",
            data: {nomAvocat : nom , CoordAvocat : coord, dateCloture: dateCloture},
            success:function(e){
                $("#"+id+" .down").html('<a href="RA/circularisation/avocat/'+e+'"><img src="../icone/les_words.png" /></a>');
            }
        });

    }

$(function(){
    $( ".generer" ).bind( "click", lettreAvocat);

    // $("#formulaire_lettre").submit(function(e){
    //     var data = $(this).serialize();
    //     $.ajax({
    //         type:"POST",
    //         url:"RA/circularisation/avocat/export_word.php",
    //         data: data,
    //         success:function(e){
    //             $('#contenue').html(e);
    //         }
    //     });
    // });
    $(".btn_retour").click(function(){
        $('#contenue').load("RA/circularisation/circularisation.php");
    });
});

function ajout(){
    $(".ajout").hide();
    var nbr = $("#nombreAvocat").val();
    nbr= parseInt(nbr);
    nbr++;
    $("#nombreAvocat").val(nbr);
    var newForm = "<tr id='avocat"+nbr+"'>";
    newForm+="<td><input class='entree nom' type='text' name='nomAvocat'/></td>";
    newForm+="<td><input class='entree coord' type='text' name='CoordAvocat'/></td>";
    newForm+="<td><input class='generer' type='button' value='Generer'></td>";
    newForm+="<td><input class='ajout' type='button' onclick='ajout()' value='+'></td><td class='down'></td></tr>";
    $('#listeAvocat tbody').append(newForm);
    $( ".generer" ).bind( "click", lettreAvocat);
}
// function generer(){
//     alert($(this).val());
    
//     // $.ajax({
//     //     type:"POST",
//     //     url:"/RA/circularisation/avocat/exportgatway.php",
//     //     data: data,
//     //     success:function(e){
//     //         // alert(id);
//     //         $("#form-"+id+" #btnSubmit").replaceWith('<a href="RA/circularisation/avocat/avocat-'+id+'.docx">Telecharger</a>');
//     //         // $(this).find($('a')).click();
//     //     }
//     // });
// }
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
  height:330px;
  width:800px;
  }
  #btn_tel{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:200px;
  height:auto;
  }
  #btn_tel:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff;  
  }
  #btn_lettre, .btn_retour{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:300px;
  height:25px;
  margin-top: 10px;

  }
  #btn_lettre:hover, .btn_retour:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff; 
  }
  #lettre{
  background-color:white;
  width:1000px;
  height:550px;
  }
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
  #listeAvocat td input{
    height: 40px;
  }
  #listeAvocat .entree{
    width: 250px;
  }

  
 </style>
 <table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td style="color:white"><center>AVOCAT</center></td>
	</tr>
</table>
 <div id="corps_avocat">
	  <table width="900">
	  <tr id="tettd">
<!-- 			<td width="300px">Compte</td>
			<td width="300px">Annexe</td>
			<td width="300px">Solde</td> -->
	  </tr>
	   <?php 
		$reponse=$bdd->query("select ECH_BAL_AUX_ID,ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE  
		from tab_echantillon_bal_aux
		where ECH_BAL_AUX_CYCLE='avocat' AND MISSION_ID=".$mission_id);
		$compte=0;
		while($donnees=$reponse->fetch()){
	   ?>
	   <tr id="tbl_ech" style="width:900px">
		  <td width="300px"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_COMPTE'];?>"/></td>
		  <td width="300px"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_LIBELLE'];?>"/></td>
		  <td width="300px"><input type="text" id="id_solde_<?php echo $compte?>" value=" <?php echo $donnees['ECH_BAL_AUX_SOLDE'];?>"/></td>
		  
		 </tr>
	   <?php
	   $compte++;
		}
	   ?>
	   <input type ="text" id="makacompte" value="<?php echo $compte ?>" style="display:none;"/>
	   </table>
	  </div>

    <form method="post" id="formulaire_lettre" onsubmit="return false">
        <input type='hidden' name='nombreAvocat' id='nombreAvocat' value='1'>
        <table id="listeAvocat">
            <thead>
                <tr>
                    <th>Nom de l'avocat</th>
                    <th>Coordonnées</th>
                </tr>
            </thead>
            <?php 
                $i=1;
                while ($donnees=$reponseLettre->fetch()) {
                    ?>
                    <tr id="avocat<?= $i++ ?>">
                        <td><input class="entree nom" type='text' name='nomAvocat' value="<?= $donnees['fileDestName'] ?>" /></td>
                        <td><input class="entree coord" type='text' name='CoordAvocat' value="<?= $donnees['fileDestCoord'] ?>" /></td>
                        <td><input class='generer' type='button' value='Generer'></td>
                        <td></td>
                        <td class="down"><a href="RA/circularisation/avocat/<?= $donnees['fileName'] ?>"><img src="../icone/les_words.png" /></a></td>
                    </tr>
                    <?php
                }
            ?>
            <tr id="avocat<?= $i++ ?>">
              <td><input class="entree nom" type='text' name='nomAvocat'/></td>
              <td><input class="entree coord" type='text' name='CoordAvocat'/></td>
              <td><input class='generer' type='button' value='Generer'></td>
              <td><input class='ajout' type='button' onclick="ajout()" value='+'></td>
              <td class="down"></td>
            </tr>
      </table>      
    </form>
    <td><p class="btn_retour">Retour</p></td>
	</div>
	
 