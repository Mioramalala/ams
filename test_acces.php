<?php 
	 @session_start();
	 
	 $req='select UTIL_ID from tab_distribution_tache where tache_id='.$_SESSION['tache'].' and MISSION_ID='.$_SESSION['idMission'];
	 $reponse1=$bdd->query($req);
	 $donnees1=$reponse1->fetch();
	 $result=$donnees1['UTIL_ID'];
	 $res1=$_SESSION['id'];
	 //echo $req;
	// echo "util_id=".$result."  session_id=".$res1;
	 if($result!=$res1){
	 
	 	//if($_SESSION['tache']==7){
			echo('<script>
					$(".verrou_tache1").attr("disabled","disabled");
					$(".verrou_tache2").attr("disabled","disabled");
					$(".verrou_tache3").attr("disabled","disabled");
					$(".verrou_tache4").attr("disabled","disabled");
					$(".verrou_tache5").attr("disabled","disabled");
					$(".verrou_tache6").attr("disabled","disabled");
					$(".verrou_tache7").attr("disabled","disabled");
					$(".verrou_tache8").attr("disabled","disabled");
					$(".verrou_tache9").attr("disabled","disabled");
					$(".verrou_tache10").attr("disabled","disabled");
					$(".verrou_tache11").attr("disabled","disabled");
					$(".verrou_tache12").attr("disabled","disabled");
					$(".verrou_tache13").attr("disabled","disabled");
					$(".verrou_tache14").attr("disabled","disabled");
					$(".verrou_tache15").attr("disabled","disabled");
					$(".verrou_tache16").attr("disabled","disabled");
					$(".verrou_tache17").attr("disabled","disabled");
					$(".verrou_tache18").attr("disabled","disabled");
					$(".verrou_tache19").attr("disabled","disabled");
					$(".verrou_tache20").attr("disabled","disabled");
					$(".verrou_tache21").attr("disabled","disabled");
					$(".verrou_tache22").attr("disabled","disabled");
					$(".verrou_tache23").attr("disabled","disabled");
					$(".verrou_tache24").attr("disabled","disabled");
					$(".verrou_tache25").attr("disabled","disabled");
					$(".verrou_tache26").attr("disabled","disabled");
					$(".verrou_tache27").attr("disabled","disabled");
					$(".verrou_tache28").attr("disabled","disabled");
					$(".verrou_tache29").attr("disabled","disabled");
					$(".verrou_tache30").attr("disabled","disabled");
					$(".verrou_tache31").attr("disabled","disabled");
					$(".verrou_tache32").attr("disabled","disabled");
					$(".verrou_tache33").attr("disabled","disabled");
					$(".verrou_tache34").attr("disabled","disabled");
					$(".verrou_tache35").attr("disabled","disabled");
					$(".verrou_tache36").attr("disabled","disabled");
					$(".verrou_tache37").attr("disabled","disabled");
					$(".verrou_tache38").attr("disabled","disabled");
					$(".verrou_tache39").attr("disabled","disabled");
					$(".verrou_tache40").attr("disabled","disabled");
					$(".verrou_tache41").attr("disabled","disabled");
					$(".verrou_tache42").attr("disabled","disabled");
					$(".verrou_tache43").attr("disabled","disabled");
					
					</script>');
		//}
	 		
	 			/*if ($_SESSION['tache']=="1"){
					echo('<script>
					$(".verrou_tache1").attr("disabled","disabled");
					
					</script>');
				}
				if ($_SESSION['tache']=="7"){
					echo('<script>
					
					$(".verrou_tache7").attr("disabled","disabled");
					</script>');
				}*/
	 }
	
?>