<html>
<head>
<link rel="stylesheet" href="../RDC/tresorerie/css.css">
<script>
	$(function(){
		$('#bt_retour').click(function(){
			$('#contenue').load("RDC/tresorerie/index.php");
		});
	});
</script>
</head>
<body>
	feuille maitresse<br />
	<input type="button" value="Retour" id="bt_retour" class="bouton"/>
</body>
</html>