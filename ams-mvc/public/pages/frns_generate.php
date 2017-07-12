<?php

/*
 * Generate the word report for Circularisations
 * */

require '../../vendor/autoload.php';

use App\Helpers\Debugger;
use App\Reporting\WordReporting;

/* Parameters
 * $_GET : type, name, adresse, idBalAux
 * $_SESSION : idMission
 * */
date_default_timezone_set('UTC');
$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

$result = array('result' => null, 'error' => true);

session_start();

$type = array(40 => 'fournisseur', 41 => 'client', 42 => 'banque', 43 => 'avocat', 44 => 'dcd');

$fileType = (isset($type[$_GET['type']])) ? $type[$_GET['type']] : 'fournisseur';

if (isset($_GET['name']) && isset($_GET['adresse']) && isset($_GET['idBalAux'])) {

    $now = new DateTime();
    if ($fileType == 'avocat' || $fileType == 'dcd') {
        $name = array($_GET['name'], $_SESSION['idMission']);
    } else {
        $name = array($_SESSION['idMission'], $_GET['idBalAux']);
    }

    $model = new \App\Model\CircularisationModel();

    $solde = $model->getSolde($_GET['idBalAux']);

    // TODO : Change the date info's to real data
    $options = array(
        'compte' => $solde > 0 ? 'débiteur' : 'créditeur',
        'dateLimite' => $model->getDateLimite($_SESSION['idMission']),
        'solde' => number_format(abs($solde), 2, ',', ' '),
        'date' => ucwords(strftime("%d " . $mois[(int)date("m", time()) - 1] . " %Y", time())),
        'nom' => $_GET['name'],
        'coordonnees' => $_GET['adresse'],
        'template' => 'template_lettre_' . $fileType,
        'type' => $fileType
    );

    $result = WordReporting::render($name, $options, $fileType);
}

if ($result && $result['error'] !== true) {

    $result['id'] = $_GET['idBalAux'];
    // Insert data into database
    $data = array(
        'fileName' => str_replace('\\', '/', $result['result']),
        'fileIdMission' => $_SESSION['idMission'],
        'fileDestName' => $_GET['name'],
        'fileDestCoord' => $_GET['adresse'],
        'fileCategory' => $fileType,
        'fileTimeCreation' => $now->format('Y-m-d'),
        'bal_aux_id' => $_GET['idBalAux']
    );

    $model = new \App\Model\CircularisationModel();
    if ($fileType == 'avocat' || $fileType == 'dcd') {
        if ($id = $model->existByName($fileType, $_GET['name'])) {
            $result['error'] = $model->update($data, 'idFile=' . $id);
            $result['action'] = 'UPDATE';
        } else {
            $result['error'] = $model->insert($data);
            $result['action'] = 'INSERT';
        }
    } else if ($fileType == 'banque') {
        $data['banque_id'] = $_GET['idBalAux'];
        $data['bal_aux_id'] = 0;

        $modelBanque = new \App\Model\BanqueModel();
        $result['fileType'] = $fileType;
        if ($modelBanque->exists($_GET['idBalAux'])) {
            $result['error'] = $model->update($data, 'banque_id=' . $_GET['idBalAux']);
            $result['action'] = 'UPDATE';
        } else {
            $result['error'] = $model->insert($data);
            $result['action'] = 'INSERT';
        }
    } else {
        $result['fileType'] = $fileType;
        if ($model->exists($_GET['idBalAux'])) {
            $result['error'] = $model->update($data, 'bal_aux_id=' . $_GET['idBalAux']);
            $result['action'] = 'UPDATE';
        } else {
            $result['error'] = $model->insert($data);
            $result['action'] = 'INSERT';
        }
    }
    header($result['result'], false, 200);

} else {
    //header('Error for generating file', false, 404);
}

Debugger::json($result);