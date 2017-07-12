<?php
    include '../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 $cycle = "F- Charges Fournisseurs";

 ?>

<script>

</script>

 
 <style>
  #tbl_ech{
  border-collapse:collapse;
  }
  #tbl_ech td{
   border:1px solid;
   background-color:#FFFAFA;
   
  }
  #echant_GL{
  overflow:auto;
  height:330px;
  width:800px;
  }
  #btn_tel{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:200px;
  height:auto;
  }
  #btn_tel:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff;  }
  #tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
  #tettd td{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
  
 </style>
 
 <table width="100%" height="50" style="text-align:left;">
  <tr>
   <td><center><label style="color:black;">VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS												
 </label></center></td>
  </tr>
 </table>

<div style="width:100%;overflow:auto;heigth:600px">

  <table width="500px">
  <tr id="tettd">
    <td width="50">Compte</td>
    <td width="50">Date</td>
    <td width="50">Journal</td>
    <td width="50">Reference</td>
    <td width="50">Libellé</td>
    <td width="50">Débit</td>
    <td width="50">Crédit</td>
    <td width="50">Solde</td>
    <td width="50">Pointage</td>
    <td width="50">"Régularité des PJ (20.06.18)"</td>
    <td width="50">BC</td>
    <td width="50">BL</td>
    <td width="50">Observations</td>
    <td width="50">Renvoi</td>
  </tr>
  <?php 
   $sql="select id_echantillon_GL,compt_ech_gl ,date_ech_gl,journal_ech_gl,ref_ech_gl, libelle_ech_gl,
      debit_ech_gl,crd_ech_gl,sold_ech_gl, pointage, regularite_pj, observation, renvoi, bc, bl

       from tab_ehantillon_gl 
       where
      GL_GEN_CYCLE='$cycle' AND id_mission='$mission_id'";
      //print ($sql);
      $reponse=$bdd->query($sql)or die(mysql_error());

      $comptes = "";
      $references = "";
      $i = 0;

      while($donnees=$reponse->fetch())
       {

        $id      = $donnees['id_echantillon_GL'];
        $Comp    = $donnees['compt_ech_gl'];
        $date    = $donnees['date_ech_gl'];
        $jl      = $donnees['journal_ech_gl'];
        $ref     = $donnees['ref_ech_gl'];
        $libelle = $donnees['libelle_ech_gl'];
        $debit   = $donnees['debit_ech_gl'];
        $crd     = $donnees['crd_ech_gl'];
        $sold    = $donnees['sold_ech_gl'];



        $pointage    = $donnees['pointage'];
        $regularite  = $donnees['regularite_pj'];
        $observation = $donnees['observation'];
        $renvoi      = $donnees['renvoi'];
        $bc          = $donnees['bc'];
        $bl          = $donnees['bl'];

 //print($renvoi);
       //if($renvoi != "")
          //$extension = pathinfo($renvoi)['extension'];




        if($i > 0) {
          $comptes .= "/";
          $references .= "/";
        }
        else $i++;
        $comptes .= $Comp;
        $references .= $ref;
 

  ?>
      <tr>
        <td><?php echo $Comp ;?></td>
        <td><?php echo $date ;?></td>
        <td><?php echo $jl ;?></td>
        <td><?php echo $ref ;?></td>
        <td><?php echo $libelle ;?></td>
        
        <td><?php echo number_format((double)$debit, 2, '.', ' ');?></td> 
        <td><?php echo number_format((double)$crd, 2, '.', ' ');?></td>
        <td><?php echo number_format((double)$sold, 2, '.', ' ');?></td>
        <td><textarea name="bc_<?php echo $Comp.'_'.$ref ;?>"><?php echo $bc ;?></textarea></td>
        <td><textarea name="bl_<?php echo $Comp.'_'.$ref ;?>"><?php echo $bl ;?></textarea></td>
        <td><textarea name="pointage_<?php echo $Comp.'_'.$ref ;?>"><?php echo $pointage ;?></textarea></td>
        <td><textarea name="regularite_<?php echo $Comp.'_'.$ref ;?>"><?php echo $regularite ;?></textarea></td>
        <td><textarea name="observation_<?php echo $Comp.'_'.$ref ;?>"><?php echo $observation ;?></textarea></td>
        <td>
          <input type="file" name="renvoi_<?php echo $Comp.'_'.$ref ;?>" /><br>
<?php
  if($renvoi != "") {
?>
          <a href="renvoi_echantillon/<?php echo 'renvoi_'.$mission_id.'_'.$cycle.'_'.$Comp.'_'.$ref.'.'.$extension;?>" target="_blank" ><?php echo $renvoi ;?></a>
<?php
  }
?>
        </td>
        
      </tr>

      <?php

      ?>
    </tbody>
    
    <?php 

    }


     ?>
  </table>
  </div>

  <input type="hidden" name="comptes" value="<?php echo $comptes ;?>" />
  <input type="hidden" name="references" value="<?php echo $references ;?>" />
  <input type="hidden" name="cycle" value="<?php echo $cycle ;?>" />
  <input type="button" name="submit" id="enregistrer_echantillon" value="enregistrer" id="submit" />

</form>

<?php


?>

<script type="text/javascript">
  $("#enregistrer_echantillon").click(function() {
    var formData = new FormData(document.getElementById("form"));

    $.ajax({
      url  : "RDC/enregistrerEchantillonInfo.php", //script qui traitera l'envoi du fichier
      type : 'POST',
      //dataType : 'json',
      xhr  : function() { // xhr qui traite la barre de progression
        myXhr = $.ajaxSettings.xhr();
        if(myXhr.upload) { // vérifie si l'upload existe
          myXhr.upload.addEventListener('progress',function(e) {
            if(e.lengthComputable);
          }, false); // Pour ajouter l'évènement progress sur l'upload de fichier
        }
        return myXhr;
      },
      
      //Traitements AJAX
      //beforeSend  : traitementAvantEnvois,
      success     : function(e) {
        alert("Modification réussite.");
      },
      error       : function(e) {
        alert('error : ' + e);
      },
      //Données du formulaire envoyé
      data        : formData,
      //Options signifiant à jQuery de ne pas s'occuper du type de données
      cache       : false,
      contentType : false,
      processData : false
    });
  });
</script>

</div>
</div>


   <input type ="text" id="makacompte" value="<?php //echo $compte ?>" style="display:none;"/>
   </table>
  </div>
 