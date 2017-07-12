<?php session_start();
	include '../../connexion.php';
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../RDC/paie/paie.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript">

			// Droit cycle by Tolotra
	        // Page : RDC -> Paie
	        // Tâche : Paie, 25
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 25},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#synthese_feuille").attr('disabled', result);
	                }
	            }
	        );
		
			$("#RPP").click(function(){
				waiting();$("#contenue").load("RDC/paie/accPP.php",stopWaiting);
			});
			
			$('#synthese_feuille').click(function(){
				waiting();$('#contenue').load("RDC/paie/synthese_paie.php",stopWaiting);
			});
			$('#coh1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP1.php?coherence_visible=OK",stopWaiting);
			});
			$('#coh11').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP1.php?coherence_visible=OK",stopWaiting);
			});
			$('#coh2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP2.php?coherence_visible=OK",stopWaiting);
			});
			$('#coh22').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP2.php?coherence_visible=OK",stopWaiting);
			});
			$('#coh3').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP3.php?coherence_visible=OK",stopWaiting);
			});
			$('#coh33').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieA/cohPrComAPP3.php?coherence_visible=OK",stopWaiting);
			});
			$('#exhaust1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieB/cohPrComBPP1.php?exhaustivte_visible=OK",stopWaiting);
			});
			$('#exhaust2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieB/cohPrComBPP2.php?exhaustivte_visible=OK",stopWaiting);
			});
			$('#exhaust22').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieB/cohPrComBPP2.php?exhaustivte_visible=OK",stopWaiting);
			});
			$('#reg1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieC/cohPrComCPP1.php?regularite_visible=OK",stopWaiting);
			});
			$('#reg2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieC/cohPrComCPP2a.php?regularite_visible=OK",stopWaiting);
			});
			$('#reg3').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieC/cohPrComCPP2b.php?regularite_visible=OK",stopWaiting);
			});
			$('#reg33').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieC/cohPrComCPP2b.php?regularite_visible=OK",stopWaiting);
			});
			$('#exist1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieD/cohPrComDPP1.php?existence_visible=OK",stopWaiting);
			});
			$('#exist2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieD/cohPrComDPP1a.php?existence_visible=OK",stopWaiting);
			});
			$('#exist22').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieD/cohPrComDPP1a.php?existence_visible=OK",stopWaiting);
			});
			$('#eval1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieE/cohPrComEPP1.php?evaluation_visible=OK",stopWaiting);
			});
			$('#rattach1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieF/cohPrComFPP1.php?rattachement_visible=OK",stopWaiting);
			});
			$('#jurid1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP1.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP2.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid3').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP3.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid4').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP4.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid5').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5a.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid55').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5a.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid6').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5b.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid66').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5b.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid7').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5c.php?juridique_visible=OK",stopWaiting);
			});
			$('#jurid77').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieG/cohPrComGPP5c.php?juridique_visible=OK",stopWaiting);
			});
			$('#info1').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieH/cohPrComHPP1.php?information_visible=OK",stopWaiting);
			});
			$('#info11').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieH/cohPrComHPP1.php?information_visible=OK",stopWaiting);
			});
			$('#info2').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieH/cohPrComHPP2a.php?information_visible=OK",stopWaiting);
			});
			$('#info22').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieH/cohPrComHPP2a.php?information_visible=OK",stopWaiting);
			});
			$('#info222').click(function(){
				waiting();$('#contenue').load("RDC/paie/paieH/cohPrComHPP2a.php?information_visible=OK",stopWaiting);
			});
		</script>
	</head>

	<body>
		<div id="GranTitre">FEUILLE MAITRESSE</div>
		<div class="fm-titre">
			<table width="100%">
				<tr class="sous-titre">
					<td width="20%">Objectifs d'audit</td>
					<td width="40%">Questions/Tests</td>
					<td width="10%">Réponses</td>
					<td width="30%">Commentaires</td>
				</tr>
			</table>
		</div>
		<?php
			$i = 8;
			$key = 'Z';
			while($i != 0){
				switch ($i) {
					case 1:
						$key = 'A';
						$rpA = array();
						$cmtA = array();
						break;
					case 2:
						$key = 'B';
						$rpB = array();
						$cmtB = array();
						break;
					case 3:
						$key = 'C';
						$rpC = array();
						$cmtC = array();
						break;
					case 4:
						$key = 'D';
						$rpD = array();
						$cmtD = array();
						break;
					case 5:
						$key = 'E';
						$rpE = array();
						$cmtE = array();
						break;
					case 6:
						$key = 'F';
						$rpF = array();
						$cmtF = array();
						break;
					case 7:
						$key = 'G';
						$rpG = array();
						$cmtG = array();
						break;
					case 8:
						$key = 'H';
						$rpH = array();
						$cmtH = array();
						break;
					default:
						break;
				}
				$rp = array();
				$cmt = array();
				$sql="SELECT * FROM tab_rdc WHERE RDC_OBJECTIF='".$key."' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie' ORDER BY RDC_RANG ASC";
				$rep=$bdd->query($sql);
				while($don = $rep->fetch()){
					$rp[] = $don['RDC_REPONSE'];
					$cmt[] = $don['RDC_COMMENTAIRE'];
				}
				switch ($i) {
					case 1:
						$rpA = $rp;
						$cmtA = $cmt;
						break;
					case 2:
						$rpB = $rp;
						$cmtB = $cmt;
						break;
					case 3:
						$rpC = $rp;
						$cmtC = $cmt;
						break;
					case 4:
						$rpD = $rp;
						$cmtD = $cmt;
						break;
					case 5:
						$rpE = $rp;
						$cmtE = $cmt;
						break;
					case 6:
						$rpF = $rp;
						$cmtF = $cmt;
						break;
					case 7:
						$rpG = $rp;
						$cmtG = $cmt;
						break;
					case 8:
						$rpH = $rp;
						$cmtH = $cmt;
						break;
					default:
						break;
				}
				$i--;
			}

		?>
		<div class="fm">
			<table width="100%">
				<!-- Objectif A -->
				<tr>
					<td width="10%" rowspan="6" class="fm_objectif">A - COHERENCE ET PRINCIPES COMPTABLES</td>
					<td width="42%" class="fm_qst"><div id="coh1" style="color:blue"><u>A - t - on effectué une revue analytique des charges de personnel par rapport à l'exercice précédent ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[0])){}else{echo $rpA[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[0])){}else{echo $cmtA[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="coh11" style="color:blue"><u>Les écarts significatifs sont - ils tous justifiés et expliqués ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[1])){}else{echo $rpA[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[1])){}else{echo $cmtA[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="coh2" style="color:blue"><u>A-t-on effectué une analyse des charges par rapport au budget?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[2])){}else{echo $rpA[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[2])){}else{echo $cmtA[2];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="coh22" style="color:blue"><u>Les écarts significatifs sont-ils tous justifiés et expliqués ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[3])){}else{echo $rpA[3];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[3])){}else{echo $cmtA[3];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="coh3" style="color:blue"><u>Le mode de calcul des congés payés est-il conforme aux dispositions prévues par le code de travail ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[4])){}else{echo $rpA[4];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[4])){}else{echo $cmtA[4];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="coh33" style="color:blue"><u>Assurez-vous que la constatation d'une provision (non obligatoire) de départ à la retraite respecte les normes IAS ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpA[5])){}else{echo $rpA[5];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtA[5])){}else{echo $cmtA[5];} ?></td>
				</tr>
				<!-- Objectif B -->
				<tr>
					<td width="10%" rowspan="3" class="fm_objectif">B - EXHAUSTIVITE DES ENREGISTREMENTS</td>
					<td width="42%" class="fm_qst"><div id="exhaust1" style="color:blue"><u>Les soldes des grand-livres/balance générale sont-ils conformes entre eux ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpB[0])){}else{echo $rpB[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtB[0])){}else{echo $cmtB[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="exhaust2" style="color:blue"><u>A-t-on obtenu l'état récapitulant les assurances sociales allouées aux membres du personnel ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpB[1])){}else{echo $rpB[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtB[1])){}else{echo $cmtB[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="exhaust22" style="color:blue"><u>Les assurances sociales ont-été-t-il comptabilisées correctement ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpB[2])){}else{echo $rpB[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtB[2])){}else{echo $cmtB[2];} ?></td>
				</tr>
				<!-- Objectif C -->
				<tr>
					<td width="10%" rowspan="4" class="fm_objectif">C - REGULARITE DES ENREGISTREMENTS</td>
					<td width="42%" class="fm_qst"><div id="reg1" style="color:blue"><u>L'établissement de la paie est-il correct ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpC[0])){}else{echo $rpC[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtC[0])){}else{echo $cmtC[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="reg2" style="color:blue"><u>Le calcul des provisions pour congés payés est-il exact ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpC[1])){}else{echo $rpC[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtC[1])){}else{echo $cmtC[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="reg3" style="color:blue"><u>Assurez-vous l'absence d'incohérence entre le montant des provisions pour congés payés de l'état de calcul et celui dans la comptabilité ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpC[2])){}else{echo $rpC[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtC[2])){}else{echo $cmtC[2];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="reg33" style="color:blue"><u>Sinon, l'écart est-il justifié ou régularisé ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpC[3])){}else{echo $rpC[3];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtC[3])){}else{echo $cmtC[3];} ?></td>
				</tr>
				<!-- Objectif D -->
				<tr>
					<td width="10%" rowspan="3" class="fm_objectif">D -  EXISTENCE DES SOLDES</td>
					<td width="42%" class="fm_qst"><div id="exist1" style="color:blue"><u>Les soldes des comptes de salaires au bilan sont-ils justifiés par rapport aux dernières déclarations sociales et fiscales ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpD[0])){}else{echo $rpD[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtD[0])){}else{echo $cmtD[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="exist2" style="color:blue"><u>Le compte "421 rémunérations dues" est-il soldé ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpD[1])){}else{echo $rpD[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtD[1])){}else{echo $cmtD[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="exist22" style="color:blue"><u>Les avances au personnel sont-elles toutes justifiées ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpD[2])){}else{echo $rpD[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtD[2])){}else{echo $cmtD[2];} ?></td>
				</tr>
				</tr>
				<!-- Objectif E -->
				<tr>
					<td width="10%" class="fm_objectif">E - EVALUATION DES SOLDES</td>
					<td width="42%" class="fm_qst"><div id="eval1" style="color:blue"><u>Assurez-vous qu'aucun litige à caractère social ne subsiste ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpE[0])){}else{echo $rpE[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtE[0])){}else{echo $cmtE[0];} ?></td>
				</tr>
				<!-- Objectif F -->
				<tr>
					<td width="22%" class="fm_objectif">F - RATTACHEMENT DES OPERATIONS</td>
					<td width="42%" class="fm_qst"><div id="rattach1" style="color:blue"><u>Assurez-vous que toutes les commissions et gratifications de l'exercice ont été comptabilisées ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpF[0])){}else{echo $rpF[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtF[0])){}else{echo $cmtF[0];} ?></td>
				</tr>
				<!-- Objectif G -->
				<tr>
					<td width="10%" rowspan="10" class="fm_objectif">G - JURIDIQUE, FISCAL ET DIVERS</td>
					<td width="42%" class="fm_qst"><div id="jurid1" style="color:blue"><u>Confirmez-vous que les dotations aux provisions pour congés payés et autres avantages non déclarés à l'IRSA ont été réintégrés lors de la détermination du résultat fiscal, et les reprises déduites ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[0])){}else{echo $rpG[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[0])){}else{echo $cmtG[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid2" style="color:blue"><u>Assurez-vous que toutes rémunérations et avantages alloués aux dirigeants et mandataires ont été déclarés à l'IRSA ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[1])){}else{echo $rpG[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[1])){}else{echo $cmtG[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid3" style="color:blue"><u>Assurez-vous qu'aucune disposition de la convention collective n'a été violée ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[2])){}else{echo $rpG[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[2])){}else{echo $cmtG[2];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid4" style="color:blue"><u>Assurez-vous que tous les saisies arrêts ont été excécutés et traités correctement ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[3])){}else{echo $rpG[3];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[3])){}else{echo $cmtG[3];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid5" style="color:blue"><u>Confirmez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux comptabilisés ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[4])){}else{echo $rpG[4];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[4])){}else{echo $cmtG[4];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid5" style="color:blue"><u>Sinon, l'écart est-il justifié ou régularisé ?</u></div></td>
					<td width="42%" class="fm_rep"><div id="jurid55"><?php if(empty($rpG[5])){}else{echo $rpG[5];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[5])){}else{echo $cmtG[5];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid6" style="color:blue"><u>Confirmez-vous que les charges sociales patronales relatives aux déclarations sociales correspondent avec la comptabilité ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[6])){}else{echo $rpG[6];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[6])){}else{echo $cmtG[6];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid66" style="color:blue"><u>Sinon, l'écart est-il justifié ou régularisé ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[7])){}else{echo $rpG[7];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[7])){}else{echo $cmtG[7];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid7" style="color:blue"><u>Assurez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux à la CNaPS ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[8])){}else{echo $rpG[8];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[8])){}else{echo $cmtG[8];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="jurid77" style="color:blue"><u>Sinon, l'écart est-il justifié ou régularisé ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpG[9])){}else{echo $rpG[9];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtG[9])){}else{echo $cmtG[9];} ?></td>
				</tr>
				<!-- Objectif H -->
				<tr>
					<td width="10%" rowspan="5" class="fm_objectif">H - INFORMATION ET PRESENTATION</td>
					<td width="42%" class="fm_qst"><div id="info1" style="color:blue"><u>Assurez-vous qu'aucune compensation n'existe entre les soldes débiteurs et créditeurs ?</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpH[0])){}else{echo $rpH[0];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtH[0])){}else{echo $cmtH[0];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst" style="border-right:0;"><div id="info11" style="color:blue"><u>Confirmez-vous que les informations suivantes sont présentes en annexe :</u></div></td>
					<td width="10%" class="fm_rep" style="border-left:0;border-right:0;"></td>
					<td width="32%" class="fm_cmt" style="border-left:0;border-right:0;"></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="info2" style="color:blue"><u>- Détails et mode de calcul des indemnités de départ à la retraite</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpH[1])){}else{echo $rpH[1];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtH[1])){}else{echo $cmtH[1];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="info22" style="color:blue"><u>- Effecitf</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpH[2])){}else{echo $rpH[2];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtH[2])){}else{echo $cmtH[2];} ?></td>
				</tr>
				<tr>
					<td width="42%" class="fm_qst"><div id="info222" style="color:blue"><u>- Rémunérations des dirigeants</u></div></td>
					<td width="10%" class="fm_rep"><?php if(empty($rpH[3])){}else{echo $rpH[3];} ?></td>
					<td width="32%" class="fm_cmt"><?php if(empty($cmtH[3])){}else{echo $cmtH[3];} ?></td>
				</tr>
			</table>
		</div>
		<input type="submit" class="bouton" value="Retour" id="RPP" />
		<input type="button" value="synthèse" id="synthese_feuille" class="bouton">
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>