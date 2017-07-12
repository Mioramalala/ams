
<?php 
@session_start();

$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';

$id_rubbrique=array();
$tauxammorti=array();
$obs_=array();

$id_rubbrique=$_POST["id_rubbrique"];
$obs_=$_POST["obs_"];
$tauxammorti=$_POST["tauxammorti"];

$i=0;
foreach ($id_rubbrique as $id_rubvalue) 
{
	
		$sqlrub="";
		$obsval=$obs_[$i];
		$tauxammortival=$tauxammorti[$i];

		$sql="SELECT * FROM tblrdc_tauxammorti where MISSION_ID='$mission_id' and  id_rubbrique='$id_rubvalue'";
		//print ($sql);
		$req_=$bdd->query($sql);
		$don =$req_->fetch();
		//print ($don);
		
		if($don==null)
		{
			$sqlrub="insert into tblrdc_tauxammorti(id_rubbrique,MISSION_ID,taux_amortappliquer,obs) values('$id_rubvalue','$mission_id','$tauxammortival','$obsval')";


		}else

		{
			$sqlrub="update  tblrdc_tauxammorti 
					SET taux_amortappliquer='$tauxammortival',obs='$obsval'

					Where id_rubbrique='$id_rubvalue' and MISSION_ID='$mission_id'";
		}
		$req_=$bdd->query($sqlrub);
		$i++;

}


?>