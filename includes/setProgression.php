<?php
/* Calcul de pourcent
 * (Chargé / Total) * 100
 */
 
$total = 42;
for($charge = 0; $charge < $total; $charge++) {
    sleep(1);
    $pourcent = round(($charge / $total) * 100, 2);
    file_put_contents('progress.txt', $pourcent);
}
 
unlink('progress.txt');
?>