
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
			$(document).ready(function(){	
				$("#waiting").show();						
				$.ajax({
					type:"post",
					url:"RDC/paie/paieC/requetC2b.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
						$("#waiting").hide();
					}				
				});
			});
			function formatMoney(num , localize,fixedDecimalLength){  
				num=num+"";  
				var str=num;  
				var reg=new RegExp(/(\D*)(\d*(?:[\.|,]\d*)*)(\D*)/g)  
				if(reg.test(num)){   
					var pref=RegExp.$1;  
					var suf=RegExp.$3;  
					var part=RegExp.$2;  
					if(fixedDecimalLength/1)part=(part/1).toFixed(fixedDecimalLength/1);  
					if(localize)part=(part/1).toLocaleString();  
					str= pref +part.match(/(\d{1,3}(?:[\.|,]\d*)?)(?=(\d{3}(?:[\.|,]\d*)?)*$)/g ).join(' ')+suf ;  
				};  
				return str;  
			} 
			function calculEcart(arg){
					if( !isNaN($(arg).val()) ){
						
						$(arg).css("background-color","");
						var soldeCP = ($(arg).val() == "") ? 0.00 : parseFloat($(arg).val());
						//alert(soldeCP);
						/(([0-9]+)$)/.exec($(arg).attr('id'));
						var indice = RegExp.$1;
						var soldeBL = parseFloat($("#soldeBL"+indice).text().replace(/ /g,""));
						var ecart = soldeBL - soldeCP;

						$('#ecart'+indice).text(ecart.toFixed(2));
					}
					else{
						$(arg).css("background-color","red");
					}
			}
		</script>
	</head>
	<body>
		<center> 
			<p class="titreRenvoie">Rapprochement état congés Payes/Balance</p>
		</center>
		<div class="cadre">
			<table class="h5">
				<tr class="sous-titre">
					<td width="200px">Compte</td>
					<td width="200px">Libellé</td>
					<td width="200px">Solde balance (1)</td>
					<td width="200px">Etat CP (2)</td>
					<td width="200px">Ecart (1) - (2)</td>
					<td width="200px">Observations</td>
					<td width="200px">Renvoi</td>
				</tr>
			</table>
			<span id="resultat"></span>
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