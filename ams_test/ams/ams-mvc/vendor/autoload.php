<?php

// autoload.php @generated by Composer
// session_start();
if(!isset($_SESSION['idMission'])){
		header("Location: ../../../index.php");
}
require_once __DIR__ . '/composer' . '/autoload_real.php';

return ComposerAutoloaderInitad06049b6b59d01a2dc0ba9f57b0cbb9::getLoader();