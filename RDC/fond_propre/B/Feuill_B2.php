<?php
	session_start ();
	include '../../../connexion.php';
	//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE,RDC_COMMENTAIRE_RESP_COND FROM  tab_rdc WHERE RDC_OBJECTIF='B' AND RDC_CYCLE='Fond propre' AND RDC_RANG=2 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
	$reponse=$don["RDC_REPONSE"];
	$coment1=$don["RDC_COMMENTAIRE"];
	$trav_B2=$don["RDC_COMMENTAIRE_RESP_COND"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT  RDC_COMMENTAIRE, RDC_REPONSE,RDC_COMMENTAIRE_RESP_COND FROM  tab_rdc  WHERE RDC_OBJECTIF='B' AND RDC_CYCLE='Fond propre' AND RDC_RANG=3 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
	$reponse2=$don2["RDC_REPONSE"];
	$coment2=$don2["RDC_COMMENTAIRE"];
	$trav_B2=$don["RDC_COMMENTAIRE_RESP_COND"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if(isset($reponse) && isset($coment1) && isset($reponse2) && isset($coment2) ){ 
		$goUrl="B2_update.php";
	}
	else{
		$goUrl="B2Post1.php"; 
	}

	
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		
		
		<script>
			// Droit cycle by Tolotra
	        // Page : RDC -> Fonds propres
	        // Tâche : A-Fonds propres, 47
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 47},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    editable = !result;

	                    $("#repA").attr('disabled', result);
	                    $("#repA2").attr('disabled', result);
	                    $("#CmtA").attr('disabled', result);
	                    $("#CmtA2").attr('disabled', result);
	                }
	            }
	        );
			$(function(){
								
				$("#btn_ret").click(function(){

					$("#contenue").load("RDC/fond_propre/B/B_REG2.php");
				});
				
				$("#enregistre").click(function(){
				
					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();				
					var rep2=$("#repA2").val();				
					var cmt2=$("#CmtA2").val();		
					var trav_B2=$("#Trav_B2").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2=="")
					{ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						//alert("<?php echo $goUrl;?>");
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/B/<?php echo $goUrl;?>",
							data:{rep1:rep1,cmt1:cmt1,rep2:rep2,cmt2:cmt2,trav_B2:trav_B2},
							success:function(e){
								// alert(e);
								$("#contenue").load("RDC/fond_propre/B/B_REG3.php");
							
							}
			
						});
					}
										
				});
			
			});
			function choixrep1(){
				var rep1=$("#repA").val();				
				var cmt1=$("#CmtA").val();	
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
			function choixrep2(){
			var rep2=$("#repA2").val();				
			var cmt2=$("#CmtA2").val();	
			if(rep2=="non" && cmt2==""){
				alert('Des commentaires obligatoires ont été omis!');
			}
		}
		</script>
	</head>
	<body>
		<div >
			<label class="btn" id="enregistre">></label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
				<div id="Travail_B2">	
				<p>RESPECT DES CONDITIONS DE DISTRIBUTION DE DIVIDENDES ET DES AVANCES SUR DIVIDENDES</p>
				<center>
					<textarea id="Trav_B2" placeholder="Entrer votre commentaire"><?php echo $trav_B2; ?></textarea></br>
					<!--input type="button" value="Enregister" id="Tav_B2_Eng"/-->
					<form id="pj_form">
						<label>Piece jointe</label>
						<input type="file" id="piec_j" name="piec_j"/>
					</form>
					<?php
					/*
					Solution temporaire pour la sauvegarde du fichier
					
					*/					
					?>
					<div id="lien_piece_j"></div>
					<script>
					load_pj();
					$("#piec_j").unbind("change");
					$("#piec_j").change(function(){
						console.log("saving");
						save_pj();
					});
					function save_pj(){
						var d=new FormData(document.getElementById("pj_form"));
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/B/save_pj.php",
							data:d,
							cache       : false,
							contentType : false,
							processData : false,
							success:function(e){
								load_pj();
							}
			
						});
					}
					function load_pj(){
						$("#lien_piece_j").load("RDC/fond_propre/B/get_pj.php");
						
					}
					</script>
					
				
				</center>
				</div>	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p>Les conditions requises pour pouvoir distribuer des dividendes sont-elles remplies?
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
						
						<h5><u>Question 2</u></h5>
						Les formalités relatives à l'octroi d'acompte sur dividendes sont-elles bien respectées?
							<select id="repA2" onchange="choixrep2()">
								<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse2=="non") echo 'selected';?>> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA2"><?php echo $coment2;?></textarea>
						
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
