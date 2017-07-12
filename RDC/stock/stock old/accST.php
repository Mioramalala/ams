<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<link rel="stylesheet" href="../../../class/css.css"/>
		<script>
			$(function(){
					$("#AST").click(function(){
						//alert('mander ver???');
						$("#contenue").load("RDC/stock/cohPrComST.php");
					
					});
					
					$("#BST").click(function(){
						// alert("B io zao");
						$("#contenue").load("RDC/stock/CoPriComBST.php");
					});
			
			
			});
		
		</script>
	</head>

	<body>
		<center>
		<div id="GranTitre">Cycle stocks</div>
		<table id="tblFP1">
			<tr>
				<td>
					<div id="AST" class="clAccFP">
						<center>A COHERENCES ET PRINCIPES COMPTABLES</center>
					</div>
				</td>
				<td>
					<div id="BST" class="clAccFP">
							<center>B EXISTENCE DES SOLDES</center>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="CST" class="clAccFP">
							<center>C EVALUATION DES SOLDES</center>
					</div>
				</td>
				<td>
					<div id="DST" class="clAccFP">
							<center>D RATTACHEMENT DES OPERATIONS</center>
					</div>
				<td>
			</tr>
			<tr>
				<td id="EST"  class="clAccFP">
						<center>E JURIDIQUE FISCAL ET DIVERS</center>
				</td>
				
				<td id="FST" class="clAccFP">
					<center> F INFORMATION ET PRESENTATION</center>
				</td>
			</tr>
			
		</table>	
		<input type="button" id="bt_retour" value="Retour" class="bouton" />
		</center>
	</body>
</html>