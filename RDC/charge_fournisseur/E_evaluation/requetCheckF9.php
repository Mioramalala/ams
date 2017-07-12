<head>
	<script type='text/javascript'>
		$(function(){
			$("#contentAfterCheckTab").scroll(function(){
	           // alert("tafiditra");
	           $("#check_titre").scrollLeft($(this).scrollLeft());
	        });
		});
	</script>
</head>
<body>
<?php
	@session_start();
	include '../../../connexion.php';
//POINTAGE; REGULARITE_PJ; OBSERVATION
	if( isset($_POST['tabCompte']) ){
		$tabCompte = $_POST['tabCompte'];
		$tabNum = $_POST['tabNum'];
		$obs = '';

		echo '
		<div class="titreSelect">Vérification de l\'éxhaustivité/Régularité des enregistrements.</div>
			<div class="contentTab">
				<div id="check_titre">
					<table style="width:1200px;color:white;background-color:#025387;">
						<tr style="font-size:9pt;font-weight:bold;">
							<td width="100px" style="text-align: center;border:0;">Compte</td>
							<td width="200px" style="text-align: center;border:0;">Libellé</td>
							<td width="100px" style="text-align: center;border:0;">Solde en euro</td>
							<td width="100px" style="text-align: center;border:0;">Cours de cloture</td>
							<td width="100px" style="text-align: center;border:0;">Solde/Cours de cloture en MGA</td>
							<td width="100px" style="text-align: center;border:0;">Solde comptable en MGA</td>
							<td width="100px" style="text-align: center;border:0;">Ecart de conversion total</td>
							<td width="100px" style="text-align: center;border:0;">Actif</td>
							<td width="100px" style="text-align: center;border:0;">Passif</td>
							<td width="200px" style="text-align: center;border:0;">Observations</td>
						</tr>
					</table>
				</div>
				<div class="contentAfterCheckTab" id="contentAfterCheckTab" style="width:930px;">
				<table id="tabPostChecked" alt="'.count($tabCompte).'" style="width:1200px;">';

		echo "<tr style='background-color:#4EA9A0;'>
			<td width='100px' height='20px' colspan='10' style='font-weight:bold;'>Fournisseurs créditeurs</td>
		</tr>";
		$detecteurFSS = 0;
		$A = $B = $C = $D = $E = $F = $G =0;
		for($i=0; $i<count($tabCompte); $i++){
			$reponse = $bdd->query('SELECT * FROM tab_rdc_cf_f9 WHERE COMPTE = "'.$tabCompte[$i].'" AND MISSION_ID="'.$_SESSION['idMission'].'"');
			$ligne = $reponse->rowCount();

			if( $ligne != 0 ){
				$donnees = $reponse->fetch();
				$obs = $donnees['OBSERVATION'];
			}
			else{
				$reponse2 = $bdd->query('SELECT * FROM tab_rdc_cf_f9 WHERE COMPTE = "'.$tabCompte[$i].'"  AND MISSION_ID=""');
				$donnees = $reponse2->fetch();
			}
			if($donnees['FSS_ETRANGER'] == 'd'){
				break;
			}
			$j = $i+1;
			$couleur = ( $i%2 == 0 ) ? '#BFBFBF' : 'white';
			echo "<tr style='background-color:".$couleur.";'>
					<td width='100px' height='40px' id='compte".$j."' alt='".$tabNum[$i]."''>".$tabCompte[$i]."</td>
					<td width='200px' height='40px'>".$donnees['LIBELLE']."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_EURO'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['CDC_EURO'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_CDC_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_CPBLE_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['ECART_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['ACTIF'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['PASSIF'], 2,'.',' ')."</td>
					<td width='200px' height='40px'><textarea id='obs".$j."'>".$obs."</textarea></td>
				</tr>";
			$detecteurFSS +=1;
			$A += $donnees['SOLDE_EURO'];
			$B += $donnees['CDC_EURO'];
			$C += $donnees['SOLDE_CDC_MGA'];
			$D += $donnees['SOLDE_CPBLE_MGA'];
			$E += $donnees['ECART_MGA'];
			$F += $donnees['ACTIF'];
			$G += $donnees['PASSIF'];
		}
		echo "<tr style='background-color:#009AFC;'>
				<td width='100px' height='20px' colspan='2' style='font-weight:bold;'>Total fournisseurs débiteurs</td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($A,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' ></td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($C,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($D,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($E,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($F,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' >".number_format($G,2,'.',' ')."</td>
				<td width='100px' height='20px' style='font-weight:bold;' ></td>
			</tr>
			<tr style='background-color:#4EA9A0;'>
				<td width='100px' height='20px' colspan='10' style='font-weight:bold;' alt='".$detecteurFSS."'>Fournisseurs créditeurs</td>
			</tr>";

		$Ap = $Bp = $Cp = $Dp = $Ep = $Fp = $Gp =0;
		for($k=$detecteurFSS; $k<count($tabCompte); $k++){
			$reponse = $bdd->query('SELECT * FROM tab_rdc_cf_f9 WHERE COMPTE = "'.$tabCompte[$k].'" AND MISSION_ID="'.$_SESSION['idMission'].'"');
			$ligne = $reponse->rowCount();

			if( $ligne != 0 ){
				$donnees = $reponse->fetch();
				$obs = $donnees['OBSERVATION'];
			}
			else{
				$reponse2 = $bdd->query('SELECT * FROM tab_rdc_cf_f9 WHERE COMPTE = "'.$tabCompte[$k].'"  AND MISSION_ID=""');
				$donnees = $reponse2->fetch();
			}
			$j = $k+1;
			$couleur = ( $k%2 == 0 ) ? '#BFBFBF' : 'white';
			echo "<tr style='background-color:".$couleur.";'>
					<td width='100px' height='40px' id='compte".$j."' alt='".$tabNum[$k]."''>".$tabCompte[$k]."</td>
					<td width='200px' height='40px'>".$donnees['LIBELLE']."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_EURO'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['CDC_EURO'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_CDC_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['SOLDE_CPBLE_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['ECART_MGA'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['ACTIF'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".number_format($donnees['PASSIF'], 2,'.',' ')."</td>
					<td width='200px' height='40px'><textarea id='obs".$j."'>".$obs."</textarea></td>
				</tr>";
			$Ap += $donnees['SOLDE_EURO'];
			$Bp += $donnees['CDC_EURO'];
			$Cp += $donnees['SOLDE_CDC_MGA'];
			$Dp += $donnees['SOLDE_CPBLE_MGA'];
			$Ep += $donnees['ECART_MGA'];
			$Fp += $donnees['ACTIF'];
			$Gp += $donnees['PASSIF'];
		}
		$TA = $A - $Ap;
		$TB = $B - $Bp;
		$TC = $C - $Cp;
		$TD = $D - $Dp;
		$TE = $E - $Ep;
		$TF = $F - $Fp;
		$TG = $G - $Gp;
		echo "	<tr style='background-color:#009AFC;'>
					<td width='100px' height='20px' style='font-weight:bold;' colspan='2'>Total fournisseurs créditeurs</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Ap,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' ></td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Cp,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Dp,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Ep,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Fp,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($Gp,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' ></td>
				</tr>
				<tr style='background-color:##ECE8BE;'>
					<td width='100px' height='20px' style='font-weight:bold;' colspan='2'>Total fournisseurs étrangers</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TA,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' ></td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TC,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TD,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TE,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TF,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' >".number_format($TG,2,'.',' ')."</td>
					<td width='100px' height='20px' style='font-weight:bold;' ></td>
				</tr>
				</table>
			</div>
		</div>";
	}
	else{
		echo '<div class="titreSelect">Vérification de l\'éxhaustivité/Régularité des enregistrements.</div>
			<div class="contentTab">
					<center><h4 style="color:red;">Vous n\'avez rien séléctionné dans le tableau d\'échantillonnages.</h4></center>
			</div>
		';
	}

?>
</body>