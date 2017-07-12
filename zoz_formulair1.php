<html>
	<head>
	<title>azertyuiop</title>
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<meta charset="utf-8"/>
	<script>
	
	// $(function(){
	
		// $("#btn").click(function(){
				// var fonction=$("#fonction").val();
				// var pros=$("#processor").val();
				// var cycle=$("#cycle").val();
				// var obj=$("#objectif").val();
				// var formulation=$("#formulation").val();
				// $.ajax({
					// type:'post',
					// url:'zoz_poste.php',
					// data:{fonction1:fonction,pros1:pros,cycle1:cycle,obj1:obj,formulation1:formulation},
					// success:function(ret){
					// alert(ret);
						// $("#fonction").val("");
						// $("#processor").val("");
						// $("#cycle").val("");
						// $("#objectif").val("");
						// $("#formulation").val("");
					// },
					// error:function(){
						// alert("probleme de transfere");
					// }
				
				// });
			// });
	// });
	</script>
	</head>
	<Body>
		
		<table>
			<tr>
				<td>Fonction</td>
				<td><input type="text" id="fonction"/></td>
			</tr>
			<tr>
				<td>Processus</td>
				<td><input type="text" id="processor"/></td>
			</tr>
			<tr>
				<td>Cycle</td>
				<td><input type="text" id="cycle"/></td>
			</tr>
			<tr>
				<td>Objectif</td>
				<td><input type="text" id="objectif"/></td>
			</tr>
			<tr>
				<td>Formulation</td>
				<td><input type="text" id="formulation"/></td>
			</tr>
			<tr>
				<td><input type="button" id="btn" value="enregistrer tache"/></td>
			</tr>
		</table>
	</body>
</html>