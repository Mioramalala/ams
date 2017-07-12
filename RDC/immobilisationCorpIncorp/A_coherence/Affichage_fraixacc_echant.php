<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 30/08/2016
 * Time: 12:28
 */
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 /*
 Ce fichier etant inclut par un autre, il n'est plus necessaire d'inclure l'agent de connexion
 */
 
 
$mission_id=@$_SESSION['idMission'];
include "$project_path/connexion.php";



$cout=$_GET["cout"];
//elect nom_frais_acc,id_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id
$sql_="select nom_frais_acc  from tbl_detaillefraix_acc,tab_Frais_Accessoire
        where tbl_detaillefraix_acc.id_frais_acc=tab_Frais_Accessoire.id_frais_acc  and tab_Frais_Accessoire.id_mission='$mission_id' and type_fraixacc='$cout'";
$req=$bdd->query($sql_);



$listFraixacc="";
while ($res_=$req->fetch())
{
    if($listFraixacc=="")
        $listFraixacc=$res_["nom_frais_acc"];
    else
        $listFraixacc=$listFraixacc."/".$res_["nom_frais_acc"];



}



$sqlEchant="select id_echantillon_GL,libelle_ech_gl,type_fraixacc
 			from tab_ehantillon_gl_fraixacc 
 			where id_mission='$mission_id' AND objectif='A5' and  (type_fraixacc='$cout' or type_fraixacc=''  ) and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'" ;
$reqEchant=$bdd->query($sqlEchant);
?>
<table>
    <tr><td width="30"></td><td  width="200">LIBELLE ECHANTILLION</td><td width="400">FRAIX ACCESSOIRES</td> </tr>
    <?php
    while($res_Echant=$reqEchant->fetch())
    {
        ?> <tr >
            <td width="30" height="40" ><input type="checkbox" <?php  if($res_Echant["type_fraixacc"]!=""){?>checked<?php } ?> class="checked_fraixaccEchant" name="id_echantillon_GL[]" value="<?php print ($res_Echant["id_echantillon_GL"]); ?>"></td>
            <td height="50"><?php print ($res_Echant["libelle_ech_gl"]); ?></td>
            <td><?php print ($listFraixacc); ?></td>

        </tr><?php
    }
    ?>


</table>
