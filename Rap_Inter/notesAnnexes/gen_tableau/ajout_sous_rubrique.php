<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	//$mission_id = 18;
	// $rb_cycle = @$_GET['p'];
	$rubrique = @$_GET['rubrique'];

if($rubrique !="")
{

	$sql = "select sous_id, rubrique_libelle,rubrique_id
			FROM tab_rubrique_sous
			WHERE `rubrique_id` =".$rubrique;
	$req = $bdd->query($sql) or die($sql);
	while($data = $req->fetch())
	{
		 echo "
		<tr id='sremove".$data['sous_id']."'>
		 	<td >".$data['rubrique_libelle']."</td>
		 	<td width='50em' >
			<button class='btn btn-danger splus' index='".$data['sous_id']."' title='supprimer cette rubrique'>
				<span class='glyphicon glyphicon-remove'></span>
			</button>
			</td>
		</tr>";
		// echo "succe";
		
	}
}
?>
<script type="text/javascript">
	<!--
$(function(){

	$(".splus ").click(function(){
		ligne = $(this).attr("index");
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/removerubrique.php",
			data: { ide:ligne, rubtyp: 2},				
			success: function(e){
				 if(e == 0)
					$("#sremove"+ligne).hide("slow");
				else
					alert("Il y a une erreur!");
			},
			error: function(){
				alert("error");
			}
		});
	});


});
//-->
  </script>