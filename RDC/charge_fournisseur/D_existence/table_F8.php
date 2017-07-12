<?php
@session_start();

$mission_id = @$_SESSION['idMission'];
?>
<style>
    #tet {
        margin-left: -17px;
        margin-top: 20px;
        border-collapse: collapse;
    }

    #tettd {
        border: 1px solid #ccc;
        background-color: #0074bf;
        color: #fff;
    }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'connexion.php';
$type = 'four';

//SELECT *
$sql = "SELECT * FROM tab_circularisation_fichier 
        LEFT JOIN tab_bal_aux 
        ON tab_bal_aux.BAL_AUX_ID = tab_circularisation_fichier.bal_aux_id 
        WHERE fileCategory LIKE '%$type%'";
$query = $bdd->query($sql);
$result = $query->fetchAll(\PDO::FETCH_OBJ); ?>

<!-----------------------------------------------table 1---------------------------------------->
<div align="center">
    <label>SUIVI DE LA CIRCULARISATION DES COMPTES FOURNISSEURS
    </label>
    <div style="overflow:auto;height:360px;">
        <table  width="100%" class="tab" id="tet">
            <tr id="tettd">
                <td width="7%">Compte</td>
                <td width="7%">Libellé</td>
                <td width="7%">Solde Comptable(1)</td>
                <td width="7%">Date de circularisation</td>
                <td width="7%">Date de la reponse</td>
                <td width="7%">Solde circularisé</td>
                <td width="7%">Ecart (1)-(2)</td>
                <td width="7%">Observations</td>
            </tr>
            <?php if ($result): ?>
                <?php foreach ($result as $item): ?>
                    <tr>
                        <td><?= $item->BAL_AUX_CODE ?></td>
                        <td><?= $item->BAL_AUX_LIBELLE ?></td>
                        <td class="solde"><?= $item->BAL_AUX_SOLDE ?></td>
                        <td><?= $item->fileTimeCreation ?></td>
                        <td><input type="text" placeholder="Date de réponse"/></td>
                        <td><input type="text" placeholder="Solde circularisé" oninput="updateSolde(this)"/></td>
                        <td><input class="ecart" type="text" value="<?= $item->BAL_AUX_SOLDE ?>" disabled/></td>
                        <td><input type="text" placeholder="Obsérvation"/></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </table>
    </div>
</div>

<script>

    /**
     * Number.prototype.format(n, x, s, c)
     *
     * @param  dec: length of decimal
     * @param  whole: length of whole part
     * @param  section: sections delimiter
     * @param  delim: decimal delimiter
     */
    Number.prototype.format = function (dec,whole,section,delim) {
        var re = '\\d(?=(\\d{' + (whole || 3) + '})+' + (dec > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0,~~dec));
        return (delim ? num.replace('.',delim) : num).replace(new RegExp(re,'g'),'$&' + (section || ','));
    };
ù
    var updateSolde = function (input) {
        var parent = input.parentNode.parentNode;
        var solde1 = replace(parent.querySelector('td.solde').innerHTML);
        var solde2 = Number(input.value) | 0;
        var ecartItem = parent.querySelector('input.ecart');
        ecartItem.value = (solde1 - solde2).format(3,3,' ',',');
    }

    var replace = function (str) {
        if (!str || str.length <= 0) return 0;
        var ret = '';
        for (var i = 0; i < str.length; i++) {
            if (str[i] !== ',') {
                ret += str[i];
            }
        }
        return parseFloat(ret);
    }

</script>