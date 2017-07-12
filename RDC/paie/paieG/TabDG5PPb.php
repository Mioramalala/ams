
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			input{width: 100%;font-size: 8pt;}
		</style>
		<script>
			$(document).ready(function(){								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieG/requet5bCnaps.php",
					data:{},
					success:function(e){
						$("#resultatCnaps").html(e);
					}				
				});								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieG/requet5bSmids.php",
					data:{},
					success:function(e){
						$("#resultatSmids").html(e);
					}				
				});
			});	
			function partEmploye(arg,taux1,taux2){
				totalPlusPart();
				var partReel = ($(arg).val() == "") ? 0.00 : parseFloat($(arg).val());
				/(([0-9]+)$)/.exec($(arg).attr('id'));
				var indice = RegExp.$1;
				var valTaux1 = parseFloat(taux1) * 0.01; 
				var valTaux2 = parseFloat(taux2) * 0.01;
				valTaux1 *= partReel;
				valTaux2 *= partReel;

				$("#PECNAPS1T"+indice).text(valTaux1.toFixed(2));
				$("#PECNAPS13T"+indice).text(valTaux2.toFixed(2));
			}
			function partEmployeSmids(arg,taux1,taux2){
				totalPlusPartSMIDS();
				var partReel = ($(arg).val() == "") ? 0.00 : parseFloat($(arg).val());
				/(([0-9]+)$)/.exec($(arg).attr('id'));
				var indice = RegExp.$1;
				var valTaux1 = parseFloat(taux1) * 0.01; 
				var valTaux2 = parseFloat(taux2) * 0.01;
				valTaux1 *= partReel;
				valTaux2 *= partReel;

				$("#PESMIDS1T"+indice).text(valTaux1.toFixed(2));
				$("#PESMIDS5T"+indice).text(valTaux2.toFixed(2));
				$("#TPET"+indice).text((valTaux2+valTaux1).toFixed(2));
			}
			function total(agr){
				var total = 0.00;
				for (var i = 1; i <= 4; i++) {
					total += ($("#NP"+agr+i).val() == "") ? 0.00 : parseFloat($("#NP"+agr+i).val());
				};
				$("#totalNP"+agr).text(total.toFixed(2));
			}
			function totalPlusPart(){
				var totalP = 0.00;
				var part1 = 0.00;
				var part2 = 0.00;
				for (var i = 1; i <= 4; i++) {
					totalP += ($("#plafone"+i).val() == "") ? 0.00 : parseFloat($("#plafone"+i).val());
					part1 += ($("#PECNAPS1T"+i).text() == "") ? 0.00 : parseFloat($("#PECNAPS1T"+i).text());
					part2 += ($("#PECNAPS13T"+i).text() == "") ? 0.00 : parseFloat($("#PECNAPS13T"+i).text());
				};
				//
				$("#totalPCNAPS").text(totalP.toFixed(2));
				$("#totalPECNAPS1").text(part1.toFixed(2));
				$("#totalPECNAPS13").text(part2.toFixed(2));
			}
			function totalPlusPartSMIDS(){
				var tota = 0.00;
				var part1 = 0.00;
				var part2 = 0.00;
				for (var i = 1; i <= 4; i++) {
					part1 += ($("#PESMIDS1T"+i).text() == "") ? 0.00 : parseFloat($("#PESMIDS1T"+i).text());
					part2 += ($("#PESMIDS5T"+i).text() == "") ? 0.00 : parseFloat($("#PESMIDS5T"+i).text());
					tota += ($("#TPET"+i).text() == "") ? 0.00 : parseFloat($("#TPET"+i).text());
				};
				//
				$("#totalPESMIDS1").text(part1.toFixed(2));
				$("#totalPESMIDS5").text(part2.toFixed(2));
				$("#totalTPE").text(tota.toFixed(2));
			}
			function ecartByThis(arg){
				var reg=new RegExp("^(compt)", "g");
				var tableau = $(arg).attr('id').split(reg);
				var name = tableau[2];
				var compte = ($(arg).val() == "") ? 0.00 : parseFloat($(arg).val());
				var total = parseFloat($("#total"+name).text());
				var ecart = total - compte;

				$('#ecart'+name).text(ecart.toFixed(2));
			}
			function ecartByName(arg){
				var result = arg.indexOf('SMIDS');// recherche de SMIDS dans arg
				
				if(result == -1) total('CNAPS');
				else total('SMIDS');

				var reg=new RegExp("^(compt)", "g");
				var tableau = arg.split(reg);
				var name = tableau[2];
				var compte = ($("#"+arg).val() == "") ? 0.00 : parseFloat($("#"+arg).val());
				var tota = parseFloat($("#total"+name).text());
				var ecart = tota - compte;

				$('#ecart'+name).text(ecart.toFixed(2));
			}
		</script>
	</head>
	<body>
		<div class="cadre">
			<center>
					<p class="titreRenvoie">
						Cadrage des salaires bruts déclarés à la CNaPS
					</p>
			</center>
			<span id="resultatCnaps"></span>
			<center>
				<p class="titreRenvoie">Cadrage des salaires bruts déclarés au SMIDS</p>
			</center>
			<span id="resultatSmids"></span>
		</div>
		
		
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>