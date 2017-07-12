<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width: 100%;height: 100%;font-size: 8pt;}
			input{width: 100%;font-size: 8pt;}
		</style>
		
	</head>
	<body>
		<center>
			<p class="titreRenvoie">Rapprochement soldes GL/Balance</p>
		</center>
		<div class="cadre">
			<table class="h3">
				<tr  class="sous-titre">
					<td width="200px">Compte</td>
					<td width="200px">Libellé</td>
					<td width="200px">Solde balance (1)</td>
					<td width="200px">Solde GL (2)</td>
					<td width="200px">Ecart (1) - (2)</td>
					<td width="200px">Observation</td>
				</tr>
			</table>
			<span id="resultat"></span>
		</div>
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
      <script>
			$(document).ready(function(){
				$("#waiting").show();						
				$.ajax({
					type:"post",
					url:"RDC/paie/paieB/requetB1.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
						$("#waiting").hide();
					}				
				});
			});
		</script>