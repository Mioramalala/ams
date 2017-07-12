<?php
	@session_start();
	$_SESSION['fonction']='Synthèse';
	$mission_id=@$_GET['mission_id'];
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
		$(function(){
			$('#dv_retour').click(function(){
			$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
			});
		});
		
		//declaration var immo
		var choix_immo='';
		var choix_exhaust='';
		var choix_realit='';
		var choix_propriet='';
		var choix_evaluat='';
		var choix_enregist='';
		var choix_imput='';
		var choix_calcul='';
		
		//declaration var stock
		var choix_immo2=0;
		var choix_exhaust2=0;
		var choix_realit2=0;
		var choix_propriet2= 0;
		var choix_evaluat2=0;
		var choix_enregist2=0;
		var choix_imput2=0;
		var choix_calcul2=0;
		
		//declaration var vente
		var choix_immo3=0;
		var choix_exhaust3=0;
		var choix_realit3=0;
		var choix_propriet3= 0;
		var choix_evaluat3=0;
		var choix_enregist3=0;
		var choix_imput3=0;
		var choix_calcul3=0;
		
		//declaration var tresorerie
		var choix_immo4=0;
		var choix_exhaust4=0;
		var choix_realit4=0;
		var choix_propriet4= 0;
		var choix_evaluat4=0;
		var choix_enregist4=0;
		var choix_imput4=0;
		var choix_calcul4=0;
		
		//declaration var achat
		var choix_immo5=0;
		var choix_exhaust5=0;
		var choix_realit5=0;
		var choix_propriet5= 0;
		var choix_evaluat5=0;
		var choix_enregist5=0;
		var choix_imput5=0;
		var choix_calcul5=0;
		
		//declaration var paie
		var choix_immo6=0;
		var choix_exhaust6=0;
		var choix_realit6=0;
		var choix_propriet6= 0;
		var choix_evaluat6=0;
		var choix_enregist6=0;
		var choix_imput6=0;
		var choix_calcul6=0;
		
		//declaration var sous
		var choix_immo7=0;
		var choix_exhaust7=0;
		var choix_realit7=0;
		var choix_propriet7= 0;
		var choix_evaluat7=0;
		var choix_enregist7=0;
		var choix_imput7=0;
		var choix_calcul7=0;
		
		//function immo rehetra
		
			
			function choixImmo()
			{
				choix_immo=$('#dv_immo').val();				
				
			}
			function choixexhaust(){
				choix_exhaust=$('#dv_exhaust').val();
			}
			
			function choixrealit(){
			choix_realit=$('#dv_realit').val();
			}
			function choixpropriet(){
			choix_propriet=$('#dv_propriet').val();
			}
			function choixevaluat(){
			choix_evaluat=$('#dv_evaluat').val();
			}
			function choixenregist(){
			choix_enregist=$('#dv_enregist').val();
			}
			
			function choiximput(){
			choix_imput=$('#dv_imput').val();
			}
			
			
			function choixcalcul(){
			choix_calcul=$('#dv_calcul').val();
			$('#dv_res').html("");
			var chaine="";
			var chaine2="";
			comparaison(chaine,chaine2);
			if($("#txt_immo2").val()!=""){
				$('#dv_res').css('background','red');
				$('#dv_res').prepend("<option value=0>"+$("#txt_immo1").val()+"</option><option value=1>"+$("#txt_immo2").val()+"</option>");
			}
			else{
				$('#dv_res').css('background','green');
				$('#dv_res').prepend("<option value=0>"+$("#txt_immo1").val()+"</option>");
			}
			// $.ajax({
				// type:"POST",
				// url:"RA/tableau.php",
				// data:{choix_immo:choix_immo,choix_exhaust:choix_exhaust, choix_realit:choix_realit, choix_propriet:choix_propriet, choix_evaluat:choix_evaluat, choix_enregist:choix_enregist, choix_imput:choix_imput }
				// success:function(){
					// comparaison();
					// }
			// });
			}
			
			function comparaison(chaine, chaine2){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo==0){
					count0=1;
				}
				else if(choix_immo==1){
					count1=1;
				}
				else if(choix_immo==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust==0){
					count00++;
				}
				else if(choix_exhaust==1){
					count11++;
				}
				else if(choix_exhaust==2){
					count22++;
				}
				
				if(choix_realit==0){
					count00++;
				}
				else if(choix_realit==1){
					count11++;
				}
				else if(choix_realit==2){
					count22++;
				}
				
				if(choix_propriet==0){
					count00++;
				}
				else if(choix_propriet==1){
					count11++;
				}
				else if(choix_propriet==2){
					count22++;
				}
				
				if(choix_evaluat==0){
					count00++;
				}
				else if(choix_evaluat==1){
					count11++;
				}
				else if(choix_evaluat==2){
					count22++;
				}
				
				if(choix_enregist==0){
					count00++;
				}
				else if(choix_enregist==1){
					count11++;
				}
				else if(choix_enregist==2){
					count22++;
				}
				
				if(choix_imput==0){
					count00++;
				}
				else if(choix_imput==1){
					count11++;
				}
				else if(choix_imput==2){
					count22++;
				}
				
				if(choix_calcul==0){
					count00++;
				}
				else if(choix_calcul==1){
					count11++;
				}
				else if(choix_calcul==2){
					count22++;
				}
				
				
				 var maximum =Math.max(count00,count11,count22);
				 
				 if(maximum == count00){
					chaine="faible";
				 }
				 else if(maximum == count11){
					chaine="moyen";
				 }
				 else if(maximum == count22){
					chaine="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="elevé";
				 }
				 
				 document.getElementById("txt_immo2").value=chaine2;
				 document.getElementById("txt_immo1").value=chaine;
			}
			
			
			
			//fonction stock rehetra
			function choixImmo2()
			{
				choix_immo2=$('#dv_immo2').val();				
			}
			
			function choixexhaust2(){
				choix_exhaust2=$('#dv_exhaust2').val();
			}
			
			function choixrealit2(){
				choix_realit2=$('#dv_realit2').val();
			}
			function choixpropriet2(){
				choix_propriet2=$('#dv_propriet2').val();
			}
			function choixevaluat2(){
				choix_evaluat2=$('#dv_evaluat2').val();
			}
			function choixenregist2(){
				choix_enregist2=$('#dv_enregist2').val();
			
			}
			function choiximput2(){
				choix_imput2=$('#dv_imput2').val();
			
			}
			
		
 			function choixcalcul2(){
				choix_calcul2=$('#dv_calcul2').val();
				$('#dv_res2').html("");
				var chaine3="";
				var chaine4="";
				comparaison2(chaine3,chaine4);
				if($("#txt_stock2").val()!=""){
					$('#dv_res2').css('background','red');
					$('#dv_res2').prepend("<option value=0>"+$("#txt_stock1").val()+"</option><option value=1>"+$("#txt_stock2").val()+"</option>");
				}
				else{
					$('#dv_res2').css('background','green');
					$('#dv_res2').prepend("<option value=0>"+$("#txt_stock1").val()+"</option>");
				}
			}
			
			function comparaison2(chaine, chaine2){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo2==0){
					count0=1;
				}
				else if(choix_immo2==1){
					count1=1;
				}
				else if(choix_immo2==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust2==0){
					count00++;
				}
				else if(choix_exhaust2==1){
					count11++;
				}
				else if(choix_exhaust2==2){
					count22++;
				}
				
				if(choix_realit2==0){
					count00++;
				}
				else if(choix_realit2==1){
					count11++;
				}
				else if(choix_realit2==2){
					count22++;
				}
				
				if(choix_propriet2==0){
					count00++;
				}
				else if(choix_propriet2==1){
					count11++;
				}
				else if(choix_propriet2==2){
					count22++;
				}
				
				if(choix_evaluat2==0){
					count00++;
				}
				else if(choix_evaluat2==1){
					count11++;
				}
				else if(choix_evaluat2==2){
					count22++;
				}
				
				if(choix_enregist2==0){
					count00++;
				}
				else if(choix_enregist2==1){
					count11++;
				}
				else if(choix_enregist2==2){
					count22++;
				}
				
				if(choix_imput2==0){
					count00++;
				}
				else if(choix_imput2==1){
					count11++;
				}
				else if(choix_imput2==2){
					count22++;
				}
				
				if(choix_calcul2==0){
					count00++;
				}
				else if(choix_calcul2==1){
					count11++;
				}
				else if(choix_calcul2==2){
					count22++;
				}
				 var maximum =Math.max(count00,count11,count22);

				 

				 if(maximum == count00){
					chaine="faible";
				 }
				 else if(maximum == count11){
					chaine="moyen";
				 }
				 else if(maximum == count22){
					chaine="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="elevé";
				 }
				 
				 document.getElementById("txt_stock2").value=chaine2;
				 document.getElementById("txt_stock1").value=chaine;
			
			}
			
			//function vente rehetra
			function choixImmo3()
			{
				choix_immo3=$('#dv_immo3').val();				
				
			}
			function choixexhaust3(){
				choix_exhaust3=$('#dv_exhaust3').val();
			}
			
			function choixrealit3(){
				choix_realit3=$('#dv_realit3').val();
			}
			function choixpropriet3(){
				choix_propriet3=$('#dv_propriet3').val();
			}
			function choixevaluat3(){
				choix_evaluat3=$('#dv_evaluat3').val();
			}
			function choixenregist3(){
				choix_enregist3=$('#dv_enregist3').val();
			}
			
			function choiximput3(){
				choix_imput3=$('#dv_imput3').val();
			}
			
			function choixcalcul3(){
				choix_calcul3=$('#dv_calcul3').val();
				$('#dv_res3').html("");
				var chaine5="";
				var chaine6="";
				comparaison3(chaine5,chaine6);
				if($("#txt_vente2").val()!=""){
					$('#dv_res3').css('background','red');
					$('#dv_res3').prepend("<option value=0>"+$("#txt_vente1").val()+"</option><option value=1>"+$("#txt_vente2").val()+"</option>");
				}
				else{
					$('#dv_res3').css('background','green');
					$('#dv_res3').prepend("<option value=0>"+$("#txt_vente1").val()+"</option>");
				}
				// $.ajax({
					// type:"POST",
					// url:"RA/tableau.php",
					// data:{choix_immo:choix_immo,choix_exhaust:choix_exhaust, choix_realit:choix_realit, choix_propriet:choix_propriet, choix_evaluat:choix_evaluat, choix_enregist:choix_enregist, choix_imput:choix_imput }
					// success:function(){
						// comparaison();
						// }
				// });
			}
			
			function comparaison3(chaine5, chaine6){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo3==0){
					count0=1;
				}
				else if(choix_immo3==1){
					count1=1;
				}
				else if(choix_immo3==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust3==0){
					count00++;
				}
				else if(choix_exhaust3==1){
					count11++;
				}
				else if(choix_exhaust3==2){
					count22++;
				}
				
				if(choix_realit3==0){
					count00++;
				}
				else if(choix_realit3==1){
					count11++;
				}
				else if(choix_realit3==2){
					count22++;
				}
				
				if(choix_propriet3==0){
					count00++;
				}
				else if(choix_propriet3==1){
					count11++;
				}
				else if(choix_propriet3==2){
					count22++;
				}
				
				if(choix_evaluat3==0){
					count00++;
				}
				else if(choix_evaluat3==1){
					count11++;
				}
				else if(choix_evaluat3==2){
					count22++;
				}
				
				if(choix_enregist3==0){
					count00++;
				}
				else if(choix_enregist3==1){
					count11++;
				}
				else if(choix_enregist3==2){
					count22++;
				}
				
				if(choix_imput3==0){
					count00++;
				}
				else if(choix_imput3==1){
					count11++;
				}
				else if(choix_imput3==2){
					count22++;
				}
				
				if(choix_calcul3==0){
					count00++;
				}
				else if(choix_calcul3==1){
					count11++;
				}
				else if(choix_calcul3==2){
					count22++;
				}
				 var maximum =Math.max(count00,count11,count22);

				 

				 if(maximum == count00){
					chaine5="faible";
				 }
				 else if(maximum == count11){
					chaine5="moyen";
				 }
				 else if(maximum == count22){
					chaine5="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine6="moyen";
					chaine5="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine6="elevé";
					chaine5="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine6="eleve";
					chaine5="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine6="faible";
					chaine5="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine6="faible";
					chaine5="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine6="moyen";
					chaine5="elevé";
				 }
				 
				 document.getElementById("txt_vente2").value=chaine6;
				 document.getElementById("txt_vente1").value=chaine5;
			}
			
			//fonction  tresorerie rehetra
			function choixImmo4()
			{
				choix_immo4=$('#dv_immo4').val();				
				
			}
			
			function choixexhaust4(){
				choix_exhaust4=$('#dv_exhaust4').val();
				
			}
			
			function choixrealit4(){
			choix_realit4=$('#dv_realit4').val();
			}
			function choixpropriet4(){
			choix_propriet4=$('#dv_propriet4').val();
			}
			function choixevaluat4(){
			choix_evaluat4=$('#dv_evaluat4').val();
			}
			function choixenregist4(){
			choix_enregist4=$('#dv_enregist4').val();
			}
			
			function choiximput4(){
			choix_imput4=$('#dv_imput4').val();
			}
		
 			function choixcalcul4(){
			choix_calcul4=$('#dv_calcul4').val();
			$('#dv_res4').html("");
			var chaine7="";
			var chaine8="";
			comparaison4(chaine7,chaine8);
					if($("#txt_tres2").val()!=""){
					$('#dv_res4').css('background','red');
					$('#dv_res4').prepend("<option value=0>"+$("#txt_tres1").val()+"</option><option value=1>"+$("#txt_tres2").val()+"</option>");
					
					}
				else{
					$('#dv_res4').css('background','green');
					$('#dv_res4').prepend("<option value=0>"+$("#txt_tres1").val()+"</option>");
				}
			}
			
			function comparaison4(chaine7, chaine8){
				count3=0;
				count4=0;
				count5=0;
				if(choix_immo4==0){
					count3=1;
				}
				else if(choix_immo4==1){
					count4=1;
				}
				else if(choix_immo4==2){
					count5=1;
				}
				count33=count3;
				count44=count4;
				count55=count5;
				if(choix_exhaust4==0){
					count33++;
				}
				else if(choix_exhaust4==1){
					count44++;
				}
				else if(choix_exhaust4==2){
					count55++;
				}
				
				if(choix_realit4==0){
					count33++;
				}
				else if(choix_realit4==1){
					count44++;
				}
				else if(choix_realit4==2){
					count55++;
				}
				
				if(choix_propriet4==0){
					count33++;
				}
				else if(choix_propriet4==1){
					count44++;
				}
				else if(choix_propriet4==2){
					count55++;
				}
				
				if(choix_evaluat4==0){
					count33++;
				}
				else if(choix_evaluat4==1){
					count44++;
				}
				else if(choix_evaluat4==2){
					count55++;
				}
				
				if(choix_enregist4==0){
					count33++;
				}
				else if(choix_enregist4==1){
					count44++;
				}
				else if(choix_enregist4==2){
					count55++;
				}
				
				if(choix_imput4==0){
					count33++;
				}
				else if(choix_imput4==1){
					count44++;
				}
				else if(choix_imput4==2){
					count55++;
				}
				
				if(choix_calcul4==0){
					count33++;
				}
				else if(choix_calcul4==1){
					count44++;
				}
				else if(choix_calcul4==2){
					count55++;
				}
				 var maximum =Math.max(count33,count44,count55);

				 

				 if(maximum == count33){
					chaine7="faible";
				 }
				 else if(maximum == count44){
					chaine7="moyen";
				 }
				 else if(maximum == count55){
					chaine7="elevé";
				 }
				 
				 if ((Math.max(count33,count44,count55)==count33) && (Math.max(count33,count44,count55)==count44)){
					chaine8="moyen";
					chaine7="faible";
				 }
				 else if ((Math.max(count33,count44,count55)==count33) && (Math.max(count33,count44,count55)==count55)){
					chaine8="elevé";
					chaine7="faible";
				 }
				 else if ((Math.max(count33,count44,count55)==count44) && (Math.max(count33,count44,count55)==count55)){
					chaine8="elevé";
					chaine7="moyen";
				 }
				 else if ((Math.max(count33,count44,count55)==count44) && (Math.max(count33,count44,count55)==count33)){
					chaine8="faible";
					chaine7="moyen";
				 }
				 else if ((Math.max(count33,count44,count55)==count55) && (Math.max(count33,count44,count55)==count33)){
					chaine8="faible";
					chaine7="elevé"
				 }
				 else if ((Math.max(count33,count44,count55)==count55) && (Math.max(count33,count44,count55)==count44)){
					chaine8="moyen";
					chaine7="elevé";
				 }
				 
				 document.getElementById("txt_tres2").value=chaine8;
				 document.getElementById("txt_tres1").value=chaine7;
			
			}
			
			
			//function achat rehetra
			function choixImmo5()
			{
				choix_immo5=$('#dv_immo5').val();				
				
			}
			function choixexhaust5(){
				choix_exhaust5=$('#dv_exhaust5').val();
			}
			
			function choixrealit5(){
			choix_realit5=$('#dv_realit5').val();
			}
			function choixpropriet5(){
			choix_propriet5=$('#dv_propriet5').val();
			}
			function choixevaluat5(){
			choix_evaluat5=$('#dv_evaluat5').val();
			}
			function choixenregist5(){
			choix_enregist5=$('#dv_enregist5').val();
			}
			
			function choiximput5(){
			choix_imput5=$('#dv_imput5').val();
			}
			
			
			function choixcalcul5(){
				choix_calcul5=$('#dv_calcul5').val();
				$('#dv_res5').html("");
				var chaine="";
				var chaine2="";
				comparaison5(chaine,chaine2);
				if($("#txt_achat2").val()!=""){
				$('#dv_res5').css('background','red');
				$('#dv_res5').prepend("<option value=0>"+$("#txt_achat1").val()+"</option><option value=1>"+$("#txt_achat2").val()+"</option>");
				
				}
					else{
						$('#dv_res5').css('background','green');
						$('#dv_res5').prepend("<option value=0>"+$("#txt_achat1").val()+"</option>");
					}
				// $.ajax({
					// type:"POST",
					// url:"RA/tableau.php",
					// data:{choix_immo:choix_immo,choix_exhaust:choix_exhaust, choix_realit:choix_realit, choix_propriet:choix_propriet, choix_evaluat:choix_evaluat, choix_enregist:choix_enregist, choix_imput:choix_imput }
					// success:function(){
						// comparaison();
						// }
				// });
			}
			
			function comparaison5(chaine, chaine2){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo5==0){
					count0=1;
				}
				else if(choix_immo5==1){
					count1=1;
				}
				else if(choix_immo5==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust5==0){
					count00++;
				}
				else if(choix_exhaust5==1){
					count11++;
				}
				else if(choix_exhaust5==2){
					count22++;
				}
				
				if(choix_realit5==0){
					count00++;
				}
				else if(choix_realit5==1){
					count11++;
				}
				else if(choix_realit5==2){
					count22++;
				}
				
				if(choix_propriet5==0){
					count00++;
				}
				else if(choix_propriet5==1){
					count11++;
				}
				else if(choix_propriet5==2){
					count22++;
				}
				
				if(choix_evaluat5==0){
					count00++;
				}
				else if(choix_evaluat5==1){
					count11++;
				}
				else if(choix_evaluat5==2){
					count22++;
				}
				
				if(choix_enregist5==0){
					count00++;
				}
				else if(choix_enregist5==1){
					count11++;
				}
				else if(choix_enregist5==2){
					count22++;
				}
				
				if(choix_imput5==0){
					count00++;
				}
				else if(choix_imput5==1){
					count11++;
				}
				else if(choix_imput5==2){
					count22++;
				}
				if(choix_calcul5==0){
					count00++;
				}
				else if(choix_calcul5==1){
					count11++;
				}
				else if(choix_calcul5==2){
					count22++;
				}
			
				 var maximum =Math.max(count00,count11,count22);
				 
				 if(maximum == count00){
					chaine="faible";
				 }
				 else if(maximum == count11){
					chaine="moyen";
				 }
				 else if(maximum == count22){
					chaine="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="elevé";
				 }
				 
				 document.getElementById("txt_achat2").value=chaine2;
				 document.getElementById("txt_achat1").value=chaine;
			}
			
			//function paie rehetra
			function choixImmo6()
			{
				choix_immo6=$('#dv_immo6').val();				
				
			}
			function choixexhaust6(){
			choix_exhaust6=$('#dv_exhaust6').val();
			}
			
			function choixrealit6(){
			choix_realit6=$('#dv_realit6').val();
			}
			function choixpropriet6(){
			choix_propriet6=$('#dv_propriet6').val();
			}
			function choixevaluat6(){
			choix_evaluat6=$('#dv_evaluat6').val();
			}
			function choixenregist6(){
			choix_enregist6=$('#dv_enregist6').val();
			}
			function choiximput6(){
			choix_imput6=$('#dv_imput6').val();
			}
			
			function choixcalcul6(){
			choix_calcul6=$('#dv_calcul6').val();
			$('#dv_res6').html("");
			var chaine="";
			var chaine2="";
			comparaison6(chaine,chaine2);
				if($("#txt_paie2").val()!=""){
			$('#dv_res6').css('background','red');
			$('#dv_res6').prepend("<option value=0>"+$("#txt_paie1").val()+"</option><option value=1>"+$("#txt_paie2").val()+"</option>");
			}
				else{
					$('#dv_res6').css('background','green');
					$('#dv_res6').prepend("<option value=0>"+$("#txt_paie1").val()+"</option>");
				}
			// $.ajax({
				// type:"POST",
				// url:"RA/tableau.php",
				// data:{choix_immo:choix_immo,choix_exhaust:choix_exhaust, choix_realit:choix_realit, choix_propriet:choix_propriet, choix_evaluat:choix_evaluat, choix_enregist:choix_enregist, choix_imput:choix_imput }
				// success:function(){
					// comparaison();
					// }
			// });
			}
			
			function comparaison6(chaine, chaine2){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo6==0){
					count0=1;
				}
				else if(choix_immo6==1){
					count1=1;
				}
				else if(choix_immo6==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust6==0){
					count00++;
				}
				else if(choix_exhaust6==1){
					count11++;
				}
				else if(choix_exhaust6==2){
					count22++;
				}
				
				if(choix_realit6==0){
					count00++;
				}
				else if(choix_realit6==1){
					count11++;
				}
				else if(choix_realit6==2){
					count22++;
				}
				
				if(choix_propriet6==0){
					count00++;
				}
				else if(choix_propriet6==1){
					count11++;
				}
				else if(choix_propriet6==2){
					count22++;
				}
				
				if(choix_evaluat6==0){
					count00++;
				}
				else if(choix_evaluat6==1){
					count11++;
				}
				else if(choix_evaluat6==2){
					count22++;
				}
				
				if(choix_enregist6==0){
					count00++;
				}
				else if(choix_enregist6==1){
					count11++;
				}
				else if(choix_enregist6==2){
					count22++;
				}
				
				if(choix_imput6==0){
					count00++;
				}
				else if(choix_imput6==1){
					count11++;
				}
				else if(choix_imput6==2){
					count22++;
				}
				
				if(choix_calcul6==0){
					count00++;
				}
				else if(choix_calcul6==1){
					count11++;
				}
				else if(choix_calcul6==2){
					count22++;
				}
				 var maximum =Math.max(count00,count11,count22);

				 

				 if(maximum == count00){
					chaine="faible";
				 }
				 else if(maximum == count11){
					chaine="moyen";
				 }
				 else if(maximum == count22){
					chaine="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine2="eleve";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="elevé";
				 }
				 
				 document.getElementById("txt_paie2").value=chaine2;
				 document.getElementById("txt_paie1").value=chaine;
			}
			
			//function sous rehetra
			function choixImmo7()
			{
				choix_immo7=$('#dv_immo7').val();				
				
			}
			function choixexhaust7(){
				choix_exhaust7=$('#dv_exhaust7').val();
			}
			
			function choixrealit7(){
			choix_realit7=$('#dv_realit7').val();
			}
			function choixpropriet7(){
			choix_propriet7=$('#dv_propriet7').val();
			}
			function choixevaluat7(){
			choix_evaluat7=$('#dv_evaluat7').val();
			}
			function choixenregist7(){
			choix_enregist7=$('#dv_enregist7').val();
			}
			
			function choiximput7(){
			choix_imput7=$('#dv_imput7').val();
			}
			function choixcalcul7(){
			choix_calcul7=$('#dv_calcul7').val();
			$('#dv_res7').html("");
			var chaine="";
			var chaine2="";
			comparaison7(chaine,chaine2);
			if($("#txt_sous2").val()!=""){
			$('#dv_res7').css('background','red');
			$('#dv_res7').prepend("<option value=0>"+$("#txt_sous1").val()+"</option><option value=1>"+$("#txt_sous2").val()+"</option>");
			}
				else{
					$('#dv_res7').css('background','green');
					$('#dv_res7').prepend("<option value=0>"+$("#txt_sous1").val()+"</option>");
				}
			// $.ajax({
				// type:"POST",
				// url:"RA/tableau.php",
				// data:{choix_immo:choix_immo,choix_exhaust:choix_exhaust, choix_realit:choix_realit, choix_propriet:choix_propriet, choix_evaluat:choix_evaluat, choix_enregist:choix_enregist, choix_imput:choix_imput }
				// success:function(){
					// comparaison();
					// }
			// });
			}
			
			function comparaison7(chaine, chaine2){
				count0=0;
				count1=0;
				count2=0;
				if(choix_immo7==0){
					count0=1;
				}
				else if(choix_immo7==1){
					count1=1;
				}
				else if(choix_immo7==2){
					count2=1;
				}
				count00=count0;
				count11=count1;
				count22=count2;
				if(choix_exhaust7==0){
					count00++;
				}
				else if(choix_exhaust7==1){
					count11++;
				}
				else if(choix_exhaust7==2){
					count22++;
				}
				
				if(choix_realit7==0){
					count00++;
				}
				else if(choix_realit7==1){
					count11++;
				}
				else if(choix_realit7==2){
					count22++;
				}
				
				if(choix_propriet7==0){
					count00++;
				}
				else if(choix_propriet7==1){
					count11++;
				}
				else if(choix_propriet7==2){
					count22++;
				}
				
				if(choix_evaluat7==0){
					count00++;
				}
				else if(choix_evaluat7==1){
					count11++;
				}
				else if(choix_evaluat7==2){
					count22++;
				}
				
				if(choix_enregist7==0){
					count00++;
				}
				else if(choix_enregist7==1){
					count11++;
				}
				else if(choix_enregist7==2){
					count22++;
				}
				
				if(choix_imput7==0){
					count00++;
				}
				else if(choix_imput7==1){
					count11++;
				}
				else if(choix_imput7==2){
					count22++;
				}
				
				if(choix_calcul7==0){
					count00++;
				}
				else if(choix_calcul7==1){
					count11++;
				}
				else if(choix_calcul7==2){
					count22++;
				}
				 var maximum =Math.max(count00,count11,count22);

				 

				 if(maximum == count00){
					chaine="faible";
				 }
				 else if(maximum == count11){
					chaine="moyen";
				 }
				 else if(maximum == count22){
					chaine="elevé";
				 }
				 
				 if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count00) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="faible";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count22)){
					chaine2="elevé";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count11) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="moyen";
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count00)){
					chaine2="faible";
					chaine="elevé"
				 }
				 else if ((Math.max(count00,count11,count22)==count22) && (Math.max(count00,count11,count22)==count11)){
					chaine2="moyen";
					chaine="elevé";
				 }
				 
				 document.getElementById("txt_sous2").value=chaine2;
				 document.getElementById("txt_sous1").value=chaine;
			}
			
			// $(function(){
				// $('#dv_retour').click(function(){
					// window.location="index.php";
				// });
			// });
		// function enregistrer(){
			// alert('Données bien enregistrées');
			// $.ajax({
			// type:"POST",
			// url:"./RA/donnees_financiers.php",
			// success: function(e){
			// $("#contenue").html(e);
			 // }
		// });
			
	// }
			$(function(){
				$('#dv_enregistr').click(function(){
					alert("Données bien enregistrées");
					$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);		
				});
			});
		</script>
	</head>
	
	<body>
		<div>
			<br/>
			<b><label>Ce tableau permet d’affecter un niveau de risque aux objectifs de chaque domaine.
				L’évaluation du risque peut être réalisée à partir des critères suivants :</b><br/>
				<b>Risque faible (F) &nbsp; &nbsp; &nbsp;
				Risque moyen (M) &nbsp; &nbsp; &nbsp;
				Risque elevé (E)</b>
			</label><br/>
			
		<div id= "dv_scroll" style="width:980px; height:120px;" border = "1" >
			<table>
				<tr>
					<td id ="id_structure" style = "position:relative; border:1px solid black; width:210px; height:50px;">DOMAINE</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Caractère Signification Fonction</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Exhaustivité</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Réalité</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Propriété</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Evaluation correcte</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Enregistrement bonne période</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Imputation correcte</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Totalisation</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Bonne information</td>
					<td style = "position:relative; border:1px solid black; width:86px; height:50px;">Risque global fonction</td>
				</tr>
			</table>	
		<div id= "dv_scroll_table" style="overflow:auto; width:975px; height:120px;border:1px solid black; ">
			<table>
				<tr>
					<td class ="td_structure">IMMOBILISATIONS Corporelles , incorp. , financières</td>
					<td class ="td_structure">
						<select id = 'dv_immo' onchange = "choixImmo()">
							
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust' onchange="choixexhaust()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit" onchange="choixrealit()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet" onchange="choixpropriet()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat" onchange="choixevaluat()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist" onchange="choixenregist()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput" onchange="choiximput()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $immo1=""; $immo2=""?>
						<input type = "button" id ="dv_calcul" value ="Calculer" onclick = "choixcalcul()">
						<input type = "text" id = "txt_immo1" value = "<?php echo $immo1;?>" style= "display:none;">
						<input type = "text" id = "txt_immo2" value = "<?php echo $immo2;?>" style= "display:none;">
						<select id = "dv_res"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				
				</tr>
				<tr>
				
					<td class ="td_structure">STOCK</td>
					<td class ="td_structure">
						<select id = 'dv_immo2' onchange = "choixImmo2()">
							
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust2' onchange="choixexhaust2()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit2" onchange="choixrealit2()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet2" onchange="choixpropriet2()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat2" onchange="choixevaluat2()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist2" onchange="choixenregist2()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput2" onchange="choiximput2()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $stock1=""; $stock2=""?>
						<input type = "button" id ="dv_calcul2" value ="Calculer" onclick = "choixcalcul2()">
						<input type = "text" id = "txt_stock1" value = "<?php echo $stock1;?>" style= "display:none;">
						<input type = "text" id = "txt_stock2" value = "<?php echo $stock2;?>" style= "display:none;">
						<select id = "dv_res2"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				
				</tr>
				
				<tr>
					<td class ="td_structure">VENTES - CLIENTS</td>
					<td class ="td_structure">
						<select id = 'dv_immo3' onchange = "choixImmo3()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust3' onchange="choixexhaust3()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit3" onchange="choixrealit3()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet3" onchange="choixpropriet3()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat3" onchange="choixevaluat3()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist3" onchange="choixenregist3()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput3" onchange="choiximput3()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $vente1=""; $vente2=""?>
						<input type = "button" id ="dv_calcul3" value ="Calculer" onclick = "choixcalcul3()">
						<input type = "text" id = "txt_vente1" value = "<?php echo $vente1;?>" style= "display:none;">
						<input type = "text" id = "txt_vente2" value = "<?php echo $vente2;?>" style= "display:none;">
						<select id = "dv_res3"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				</tr>
					
				<tr>
					<td class ="td_structure">TRESORERIE</td>
					<td class ="td_structure">
						<select id = 'dv_immo4' onchange = "choixImmo4()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust4' onchange="choixexhaust4()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit4" onchange="choixrealit4()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet4" onchange="choixpropriet4()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat4" onchange="choixevaluat4()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist4" onchange="choixenregist4()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput4" onchange="choiximput4()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $tres1=""; $tres2=""?>
						<input type = "button" id ="dv_calcul4" value ="Calculer" onclick = "choixcalcul4()">	
						<input type = "text" id = "txt_tres1" value = "<?php echo $tres1;?>" style= "display:none;">
						<input type = "text" id = "txt_tres2" value = "<?php echo $tres2;?>" style= "display:none;">
						<select id = "dv_res4"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td class ="td_structure">ACHATS -FOURNISSEURS</td>
					<td class ="td_structure">
						<select id = 'dv_immo5' onchange = "choixImmo5()">
							
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust5' onchange="choixexhaust5()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit5" onchange="choixrealit5()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet5" onchange="choixpropriet5()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat5" onchange="choixevaluat5()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist5" onchange="choixenregist5()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput5" onchange="choiximput5()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $achat1=""; $achat2=""?>
						<input type = "button" id ="dv_calcul5" value ="Calculer" onclick = "choixcalcul5()">	
						<input type = "text" id = "txt_achat1" value = "<?php echo $achat1;?>" style= "display:none;">
						<input type = "text" id = "txt_achat2" value = "<?php echo $achat2;?>" style= "display:none;">
						<select id = "dv_res5"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				
				</tr>

				<tr>
					<td class ="td_structure">PAIE -PERSONNEL</td>
					<td class ="td_structure">
						<select id = 'dv_immo6' onchange = "choixImmo6()">
							
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust6' onchange="choixexhaust6()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit6" onchange="choixrealit6()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet6" onchange="choixpropriet6()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat6" onchange="choixevaluat6()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist6" onchange="choixenregist6()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput6" onchange="choiximput6()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $paie1=""; $paie2=""?>
						<input type = "button" id ="dv_calcul6" value ="Calculer" onclick = "choixcalcul6()">	
						<input type = "text" id = "txt_paie1" value = "<?php echo $paie1;?>" style= "display:none;">
						<input type = "text" id = "txt_paie2" value = "<?php echo $paie2;?>" style= "display:none;">
						<select id = "dv_res6"></select>
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td class ="td_structure">SOUS TRAITANCE</td>
					<td class ="td_structure">
						<select id = 'dv_immo7' onchange = "choixImmo7()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id='dv_exhaust7' onchange="choixexhaust7()">
							<option value="0">Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_realit7" onchange="choixrealit7()" >
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_propriet7" onchange="choixpropriet7()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_evaluat7" onchange="choixevaluat7()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_enregist7" onchange="choixenregist7()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select id="dv_imput7" onchange="choiximput7()">
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select >
					</td>
					
					<td class ="td_structure" bgcolor="white"><?php $sous1=""; $sous2=""?>
						<input type = "button" id ="dv_calcul7" value ="Calculer" onclick = "choixcalcul7()">	
						<input type = "text" id = "txt_sous1" value = "<?php echo $sous1;?>" style= "display:none;">
						<input type = "text" id = "txt_sous2" value = "<?php echo $sous2;?>" style= "display:none;">
						<select id = "dv_res7">
						
						</select>
					
					</td>
					
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>
					<td class ="td_structure">
						<select>
							<option value="0" >Faible</option>
							<option value="1">Moyen</option>
							<option value="2">Elevé</option>
						</select>
					</td>	
				</tr>	
			</table>
		</div>
			<input type="text" id="tx_miss_id" value="<?php echo $mission_id;?>" style="display:none;"  /> 
			<input type ="button" name= "btRetour" value= "Retour" id = "dv_retour" onclick ="dv_retour()">
			<input type ="button" name= "btEnregistrer" value= "Enregistrer" onclick = "enregistrer()" id= "dv_enregistr">
		</div>
	</body>
</html>
			