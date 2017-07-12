	<?php
	@session_start();
	include '../connexion.php';
	//$_SESSION["dernie_denom"];
	?>
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="../js/NewEntrepreise.js"></script>

<style>
#case_upload
{
margin-top:-25px;
height:450px;
border:3px solid #efefef;
background-color:#FFF8DC;
padding-top:10px;
overflow:hidden;
}
#Nom_doc
{
width:150px;
height:20px;
border-radius:4px;

}
#plus_up{
	 background: none repeat scroll 0 0 #FF0000;
    border-radius: 4px;
    color: #FFFF00;
    font-size: 15px;
    height: 30px;
    padding-left: 50px;
    padding-top: 4px;
    width: 110px;
}
#plus_up:hover{
cursor:pointer;
}
#ttrCr2{
margin-bottom:5px;
color:#009afc;
font-size:16px;
}
</style>
<div id="case_upload">
<form method = "post" enctype="multipart/form-data"  action ="Doc_up.php">
	<table>
		<tr>
			<td width="100"><div id="plus_up">Upload</div></td>
			<td><input type="file" id="docFileId" style="display:none" name="nameDoc"></td>
			<td><input type="submit" value="Enregistrer" id="btnRecDoc" name="btnRecDocName" /></td>
		</tr>
	</table>
</form>
<div id="list_doc">
<center>
	<table>
		<tr>
		<?php

			if(isset($_SESSION['dernie_denom'])){	
			$nbr=count($_SESSION['dernie_denom']);?>
			<td>les documents  <?php   echo $_SESSION['dernie_denom'][$nbr-1]; }?> &nbsp;&nbsp;&nbsp;: </td>
		</tr>
		<?php 
		if(isset($_SESSION['dernie_denom'])){	
			$nbr=count($_SESSION['dernie_denom']);
		
		 $sqlList="SELECT Name_doc,Chemain_doc FROM tab_doc_permanent WHERE Entre_Name='".$_SESSION['dernie_denom'][$nbr-1]."'";
			//	echo $sqlList;
				$reponseAct=$bdd->query($sqlList) or die(mysql_error());
				 while($donnee=$reponseAct->fetch()){
					$nom=$donnee["Name_doc"];
					$chemin=$donnee["Chemain_doc"];
		?>
		<tr>
			<td>  <?php echo $nom;?> </td>
			<td> <a href="../<?php echo $chemin;?>">télécharger</a></td>
		</tr>
		<?php 
		}
		}
		?>
	</table>
	</center>
</div>
</div>