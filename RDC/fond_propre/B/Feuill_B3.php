<?php
	session_start ();
	include '../../../connexion.php';
	//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='B' AND RDC_CYCLE='Fond propre' AND RDC_RANG=4 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["RDC_REPONSE"];
		$coment1=$don["RDC_COMMENTAIRE"];
	

	if (isset($reponse) && isset($coment1))
	{
	 $goUrl="B3_update.php";
	}
	else
		{
		 $goUrl="B3Post.php"; 
		}
	
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		
		
		
		<script>
			$(function(){
								
				$("#btn_ret").click(function(){

					$("#contenue").load("RDC/fond_propre/B/B_REG3.php");
				});
			
			});
		
		</script>
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

	                    $("#repA").attr('disabled', result);
	                    $("#CmtA").attr('disabled', result);
	                }
	            }
	        );
	        
			$(function(){
			
				$("#enregistre").click(function(){
				
					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();
					var cmt_B3=$("#frmcommentaire").serialize();	

					transfert=cmt_B3+"&rep1="+rep1+"&cmt1="+cmt1;
			
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{

						//alert(transfert);
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/B/<?php echo $goUrl;?>",
							data:transfert,
							success:function(e){
								//alert(e);
							
									$("#contenue").load("RDC/fond_propre/accFP.php");
							
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
		
		</script>
	</head>
	<body>
		<div >
			<label class="btn" id="enregistre">>I</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
				<div id="Travail_B2">	
				<p>JUSTIFICATION DES SOLDES DE LA "CLASSE 1"</p>
				<form id="frmcommentaire">
				<table id="balanceC1">
					<tr style="background-color:#B0C4DE">
						<center>
							<th>Compte</th>
							<th>Libellé</th>
							<th>Débit</th>
							<th>Crédit</th>
							<th>Commentaires</th>
						</center>
					</tr>
				<?php 
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$sql="SELECT DISTINCT(GL_GEN_COMPTES),GL_GEN_ID,GL_GEN_LIBELLE,GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_COMMENTAIRE

						 FROM 
						tab_gl_gen WHERE
						GL_GEN_CYCLE='A- Fonds propres' AND GL_GEN_COMPTES like '1%' AND MISSION_ID=".$_SESSION['idMission'];
						$rep=$bdd->query($sql);
						while($don=$rep->fetch())
						{
							$GL_GEN_ID=$don["GL_GEN_ID"];

							$compte=$don["GL_GEN_COMPTES"];
							$libelet=$don["GL_GEN_LIBELLE"];
							$SolDN=$don["GL_GEN_DEBIT"];
							$SolCN=$don["GL_GEN_CREDIT"];
							$cmt_B3=$don["GL_GEN_COMMENTAIRE"];
							
							
							
							?>
							
								<tr>	
									
									<td><?php echo $compte;?></td>
									<td><?php echo $libelet;?></td>
									<td><?php if(empty($SolDN)){}else{echo number_format($SolDN, 2, '.', ' ');}?></td>
									<td><?php if(empty($SolCN)){}else{echo number_format($SolCN, 2, '.', ' ');}?></td>
									<td><textarea name="cmt_B3[]" id="cmt_B3"><?php echo $cmt_B3; ?></textarea><input type="hidden"  name="GL_GEN_ID[]"  value="<?php print($GL_GEN_ID); ?>"></td>
									
								</tr>
									<?php

						 } ?>
					
					
				</table>
				</form>
				</div>	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p>Les opérations enregistrées concernant </br>la classe 1 sont-elles justifiées ?
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
