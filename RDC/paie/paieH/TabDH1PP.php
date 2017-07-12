<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			#cnaps,#irsa{
				width: 100%;
				height: 100%;
				margin: 0;
				font-size: 8pt;
				text-align: right;
			}
			#ecart{
				font-weight: bold;
				font-size: 8pt;
				text-align: right;	
			}
		</style>
		<script>
			$(function(){
				function calculEcart(ecart,soustrait,soustrayant){
					var A = parseFloat($(soustrait).val()); // conversion en type nombre des valeurs
					var B = parseFloat($(soustrayant).val());
					var E = parseFloat($(ecart).text());

					if( !isNaN(A) ){
						if($(soustrait).val() == ""){
							A = 0;
						}
						if($(soustrayant).val() == "" || isNaN(B)){
							B = 0;
						}
						E = A - B;
						if (isNaN(E)) E = 0.00;
						$(soustrait).css('background-color','white');
						$(ecart).empty();
						$(ecart).append(E);
					}
					else{
						$(soustrait).css('background-color','#eeb9b9');
						$(ecart).empty();
						$(ecart).append(ecar);
					}
				}
				$("#cnaps").blur(function(){
					calculEcart('#ecart','#cnaps','#irsa');
				});
				$("#irsa").blur(function(){
					calculEcart('#ecart','#irsa','#cnaps');
				});
			});
		
		</script>
	</head>
	<body>

<!--<input type="button" id="btn_retD1PP" value="Miverina"/>-->
		<center> <p class="titreRenvoie">Rapprochement salaires bruts IRSA/CNaPS	
</p> </center>
		<div class="cadre">
			<table class="h8">
					<tr height="55px">
						<td width="200px">Salaires bruts <strong>IRSA</strong></td>
						<td width="200px"><input id="cnaps" style="height:55px"/></td>
					</tr>
					<tr height="55px">
						<td>Salaires bruts <strong>CNaPS</strong></td>
						<td><input id="irsa" style="height:55px" /></td>
					</tr>
					<tr height="55px">
						<td>Ecart</td>
						<td id="ecart">0.00</td>
					</tr>
			</table>
		</div>
		
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>