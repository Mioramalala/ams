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
		<script>
			function calculEcart(arg,indice){
				if($(arg).val() != ""){
					if( !isNaN($(arg).val()) ){
						
						$(arg).css("background-color","");
						var budget = parseFloat($(arg).val());
						/*(([0-9]+)$)/.exec($(arg).attr('id'));*/
						//var indice = parseFloat(RegExp.$1);
						//alert(indice);
						var montant = parseFloat($("#montant"+indice).text());
						//alert(montant);
						var ecart = montant - budget;
						//alert(ecart);
						$('#ecart'+indice).html(ecart);
					}
					else{
						$(arg).css("background-color","red");
					}
				}
			}
			$(document).ready(function(){
				$("#waiting").show();								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieA/requetA2.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
						$("#waiting").hide();
					}				
				});
			});
		</script>
	</head>
	<body>
		<center>
			<p class="titreRenvoie">
				Rapprochement des charges de personnel réelles avec le budget						
			</p>
		</center>
		<div class="cadre">
			<table class="h2" border="0">
				<tr class="sous-titre">
					<td width="200px">Compte</td>
					<td width="200px">Libellé</td>
					<td width="200px">Montant (1)</td>
					<td width="200px">Budgétisé (2)</td>
					<td width="200px">Ecart (1) - (2)</td>
					<td width="200px">Commentaires</td>
				</tr>
			</table>
			<div id="resultat"></div>
		</div>

		
		
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>