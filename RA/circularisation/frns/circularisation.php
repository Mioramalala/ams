<?php
include './../../../connexion.php';
@session_start();
$mission_id = @$_SESSION['idMission'];

$tab_id = @$_POST['tab_id'];


$sql = "SELECT tab_bal_aux.BAL_AUX_ID,BAL_AUX_CODE,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE
        FROM tab_bal_aux
        WHERE BAL_AUX_COMPTE LIKE '40%' AND MISSION_ID=" . $mission_id;
$count = count($tab_id);
if ($count > 0) {
    if ($count == 1) {
        $sql .= " AND ( tab_bal_aux.BAL_AUX_ID = " . $tab_id[0] . ")";
    } else {
        for ($i = 0; $i < count($tab_id); $i++) {
            if ($i == 0)
                $sql .= " AND ( tab_bal_aux.BAL_AUX_ID = " . $tab_id[$i];
            else if ($i == count($tab_id) - 1)
                $sql .= " OR tab_bal_aux.BAL_AUX_ID = " . $tab_id[$i] . ")";
            else
                $sql .= " OR tab_bal_aux.BAL_AUX_ID = " . $tab_id[$i];
        }
    }
}

$sql .= " ORDER BY BAL_AUX_COMPTE,BAL_AUX_CODE ASC";

$reponse = $bdd->query($sql);
$sql2 = "SELECT * FROM tab_circularisation_fichier WHERE fileCategory= 'frns' AND fileIdMission = " . $mission_id;
$reponseFrns = $bdd->query($sql2);
//echo '<pre>' . print_r($sql, true) . '</pre>';

if ($reponse) {
    $i = 0;
    while ($donnees = $reponse->fetch()) {
        $id = $donnees['BAL_AUX_ID'];
        $Comp = $donnees['BAL_AUX_COMPTE'];
        $annexe = $donnees['BAL_AUX_LIBELLE'];
        $code = $donnees['BAL_AUX_CODE'];
        $sold = number_format((double)$donnees['BAL_AUX_SOLDE'], 2, ',', ' ');
        $fnrs = $reponseFrns->fetch();
        ?>
        <tr>
            <td width="100px"><?php echo $Comp; ?></td>
            <td width="200px"><?php echo $code; ?></td>
            <td width="200px"><?php echo $annexe; ?></td>
            <td width="200px"><?php echo $sold; ?></td>

            <td><input class="entree nom" type='text' name='nomFrns' value="<?= $fnrs['fileDestName'] ?>"/></td>
            <td><input class="entree coord" type='text' name='CoordFrns' value="<?= $fnrs['fileDestCoord'] ?>"/></td>

            <td><input class='generer' id="<?php echo $fnrs['bal_aux_id'] ?>" type='button' value='Generer'
                       onclick="lettreFrns(this)"></td>
            <td></td>
            <td class="down"><a href="RA/circularisation/frns/<?= $fnrs['fileName'] ?>"><img
                        src="../icone/les_words.png"/></a></td>
        </tr>
    <?php }
} ?>