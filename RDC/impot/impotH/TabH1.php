<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			input{width: 100%;height: 100%;font-size: 8pt;}
		</style>
		<script>
			/*$(function(){
				function calculTotal(total,val1,val2){
					var A = parseFloat($(val1).val()); // conversion en type nombre des valeurs
					var B = parseFloat($(val2).val());
					var E = parseFloat($(total).text());

					if( !isNaN(A) ){
						if($(val1).val() == ""){
							A = 0;
						}
						if($(val2).val() == "" || isNaN(B)){
							B = 0;
						}
						E = A + B;
						if (isNaN(E)) E = 0.00;
						$(val1).css('background-color','white');
						$(total).empty();
						$(total).append(E);
					}
					else{
						$(val1).css('background-color','#eeb9b9');
						$(total).empty();
						$(total).append(ecar);
					}
				}
				$("#ida1").blur(function(){
					calculTotal('#ida','#ida1','#ida2');
				});
				$("#ida2").blur(function(){
					calculTotal('#ida','#ida2','#ida1');
				});
			});*/
		</script>
</head>
<body>
	<center><p class="titreRenvoie">DETAIL DES IDA</p></center>
	<div class="cadre">
		<table class="i2">
			<tr class="sous-titre">
				<td width="100px">Période</td>
				<td width="100px">Perte fiscale</td>
				<td width="100px">Taux IR</td>
				<td width="150px">IDA 1</td>
				<td width="200px">Investissement</td>
				<td width="150px">IDA 2</td>
				<td width="200px">Total IDA</td>
			</tr>
			<tr>
				<td><input type="text" /></td>
				<td></td>
				<td></td>
				<td id="ida1"></td>
				<td><input type="text" /></td>
				<td id="ida2"></td>
				<td id="ida"></td>
			</tr>
			<tr>
				<td><input type="text" /></td>
				<td></td>
				<td></td>
				<td id="ida1"></td>
				<td><input type="text" /></td>
				<td id="ida2"></td>
				<td id="ida"></td>
			</tr>
		</table>
		
	</div>
	
</body>