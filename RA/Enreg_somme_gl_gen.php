 <?php
		@session_start();
		include '../connexion.php';
		$UTIL_ID=$_SESSION['id'];
		$mission_id=@$_SESSION['idMission'];


		$queryDel='delete from tab_somme_gl_gen where MISSION_ID='.$mission_id;
		$reponseDel=$bdd->exec($queryDel);

		//$sql_='select  IMPORT_COMPTES,IMPORT_INTITULES from tab_importer where MISSION_ID='.$mission_id.' and IMPORT_CYCLE="F- Charges fournisseurs" and IMPORT_CHOIX_ANNEE="N" and  order by IMPORT_COMPTES asc';
		//$sqlGen4="select GL_GENC4_COMPTES as 'IDcompte',SUM(GL_GENC4_DEBIT) as 'somme_debit',SUM(GL_GENC4_CREDIT) as 'somme_credit' from tab_gl_genc4 where MISSION_ID='53' and GL_GENC4_CYCLE='F- Charges fournisseurs'";
        $sqlGen4="select GL_GENC4_COMPTES as 'IDcompte',SUM(GL_GENC4_DEBIT) as 'somme_debit',SUM(GL_GENC4_CREDIT) as 'somme_credit',GL_GENC4_CYCLE as 'cycle'
         from tab_gl_genc4 
        			where MISSION_ID='$mission_id' 
                   GROUP by GL_GENC4_COMPTES,GL_GENC4_CYCLE";

        $req=$bdd->query($sqlGen4);
        while($reponse=$req->fetch())
        {
        		$idcompte=$reponse["IDcompte"];
        		$CPTdebit=$reponse["somme_debit"];
        		$CPTcredit=$reponse["somme_credit"];
        		$SOLDECPT=$CPTdebit-$CPTcredit;
        		$cycle=$reponse["cycle"];

        		$sqlinsert="insert into
        					 tab_somme_gl_gen(MISSION_ID,GL_GEN_SOMME_COMPTE,GL_GEN_SOMME_CYCLE,GL_GEN_SOMME_SOLDE,GL_GEN_SOMME_DEBIT,GL_GEN_SOMME_CREDIT) 
        					 values('$mission_id','$idcompte','$cycle','$SOLDECPT','$CPTdebit','$CPTcredit')";
        		
        		$bdd->query($sqlinsert);
        		//print($sqlinsert."<br>");

        		$file = '../fichier/save_mission/mission.sql';
					file_put_contents($file, $sqlinsert.";", FILE_APPEND | LOCK_EX);

        }

?>