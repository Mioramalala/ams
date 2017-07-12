<?php
include '../connexion.php';
$num=$_POST['id'];
//echo $num;

$reponse=$bdd->query('SELECT BALANCE_GENERAL_ID, BALANCE_GENERAL_CYCLE FROM  tab_balance_general WHERE BALANCE_GENERAL_ID='.$num);

$res=$reponse->fetch();
//echo($res['BALANCE_GENERAL_COMPTE_CONCERNE']);



?>


<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="evenement.js"></script>
		<script type="text/javascript">
			
		 function modifier(){
		 var num = $('#dv_txt1').val();
		 var id = $('#dv_txt0').val();
			$.ajax({
				type:"post",
				url:'RA/modifiekocycle.php',
				data:{num:num,id:id},
				success:function(e){
				$("#contenue").html(e);
				alert ("votre mis à jours est accepté");
				}
			});
		}
	
		</script>
	</head>
	
	<body>

		<table style="border:1px solid black; width:500px; height:80; background-color:#efefef;">	
			
			<tr>
				<td><input style = "display:none" type="text" id= "dv_txt0" value = "<?php echo ($res['BALANCE_GENERAL_ID']); ?>"/></td>
				<td>Modifier cycle:</td>
				<td><input type = "text" id ="dv_txt1" name = 'txtnum' value = "<?php echo($res['BALANCE_GENERAL_CYCLE']); ?>"/></td>
				<td><input type = "button" id ="dv_modif" value = "ENREGISTRER" onclick =" modifier()"/></td>
			</tr>
		</table>
	</body>
</html>
