<?php
@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$bdd = new PDO('mysql:host=localhost;dbname=tmsconsuams', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>

<html>
    <head>
        <link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
        <script>
           $("#ajoutFrnsEtrange1").click(function(){
            var i = $("tr[id^=trBlEtr]:last").attr('id') ;
            /([0-9]+)/.exec(i);
            i = RegExp.$1 ;
            i = parseFloat(i)+1 ;
            var ligne = " <tr id='trBlEtr"+i+"'><td><input type='Text' id='BlAuxEtr1Cpt"+i+"'  value='' /></td><td><input type='Text' id='BlAuxEtr1Lbl"+i+"' value='' /></td><td><input type='text' id='BlAuxtEtr1Sol"+i+"' value='' /></td><td><textarea id='BlAuxtEtr1Just"+i+"' rows='2' cols='25'></textarea></td></tr>" ;
            $("tr[id^=trBlEtr]:last").after(ligne) ;
            //alert(ligne) ;
             }) ;
            $("#supprFrnsEtrange1").click(function(){
            $("tr[id^=trBlEtr]:last").remove() ;
            }) ;


           $("#ajoutFrnGpe").click(function(){
            var i = $("tr[id^=trBlGpe]:last").attr('id') ;
            /([0-9]+)/.exec(i);
            i = RegExp.$1 ;
            i = parseFloat(i)+1 ;
            var ligne = " <tr id='trBlGpe"+i+"'><td><input type='Text' id='BlAuxGpeCpt"+i+"'  value='' /></td><td><input type='Text' id='BlAuxGpeLbl"+i+"' value='' /></td><td><input type='text' id='BlAuxtGpeSol"+i+"' value='' /></td><td><textarea id='BlAuxtGpeJust"+i+"' rows='2' cols='25'></textarea></td></tr>" ;
            $("tr[id^=trBlGpe]:last").after(ligne) ;
            //alert(ligne) ;
             }) ;
           $("#supprFrnsGpe").click(function(){
            $("tr[id^=trBlGpe]:last").remove() ; }) ;

            
            $("#ajoutFrnLoc1").click(function(){
            var i = $("tr[id^=trBlLoc1]:last").attr('id') ;
            /([0-9]+)/.exec(i);
            i = RegExp.$1 ;
            i = parseFloat(i)+1 ;
            var ligne = " <tr id='trBlLoc1"+i+"'><td><input type='Text' id='BlAuxLoc1Cpt"+i+"'  value='' /></td><td><input type='Text' id='BlAuxLoc1Lbl1"+i+"' value='' /></td><td><input type='text' id='BlAuxtLoc1Sol"+i+"' value='' /></td><td><textarea id='BlAuxtLoc1Just"+i+"' rows='2' cols='25'></textarea></td></tr>" ;
            $("tr[id^=trBlLoc1]:last").after(ligne) ;
            //alert(ligne) ;
             }) ;
            $("#supprFrnsLoc1").click(function(){
            $("tr[id^=trBlLoc1]:last").remove() ; }) ;

            $("#ajoutFrnEtrg2").click(function(){
            var i = $("tr[id^=BlAuxEtr2]:last").attr('id') ;
            /([0-9]+)/.exec(i);
            i = RegExp.$1 ;
            i = parseFloat(i)+1 ;
            var ligne = " <tr id='BlAuxEtr2"+i+"'><td><input type='Text' id='BlAuxEtr2Cpt"+i+"'  value='' /></td><td><input type='Text' id='BlAuxEtr2Lbl"+i+"' value='' /></td><td><input type='text' id='BlAuxtEtr2Sol"+i+"' value='' /></td><td><textarea id='BlAuxtEtr2Just"+i+"' rows='2' cols='25'></textarea></td></tr>" ;
            $("tr[id^=BlAuxEtr2]:last").after(ligne) ;
            //alert(ligne) ;
             }) ;
            $("#supprFrnsEtrg2").click(function(){
            $("tr[id^=BlAuxEtr2]:last").remove() ; }) ;

            $("#ajoutFrnLoc2").click(function(){
            var i = $("tr[id^=BlAuxLoc2]:last").attr('id') ;
            /([0-9]+)/.exec(i);
            i = RegExp.$1 ;
            i = parseFloat(i)+1 ;
            var ligne = " <tr id='BlAuxLoc2"+i+"'><td><input type='Text' id='BlAuxLoc2Cpt"+i+"'  value='' /></td><td><input type='Text' id='BlAuxLoc2Lbl"+i+"' value='' /></td><td><input type='text' id='BlAuxtLoc2Sol"+i+"' value='' /></td><td><textarea id='BlAuxtLoc2Just"+i+"' rows='2' cols='25'></textarea></td></tr>" ;
            $("tr[id^=BlAuxLoc2]:last").after(ligne) ;
            //alert(ligne) ;
             }) ;
            $("#supprFrnsLoc2").click(function(){
            $("tr[id^=BlAuxLoc2]:last").remove() ; }) ;
        </script>
    </head>
    <body>
        <div id="titreObjectif">
            <center><label>VALIDATION DES FOURNISSEURS A SOLDE DEBITEUR</label></center>
        </div>
        <div>
            <table width="100%" bgcolor="blue">
                <tr class="titreBalAux">
                    <td>Compte</td>
                    <td>Libellé</td>
                    <td>Solde débiteur</td>
                    <td>Justification</td>
                    <td></td>
                </tr>
			</table >
			<table id="etrangers1" width="100%">
                <tr>
                    <td colspan="5" class="enteteBalAux">BALANCE AUXILIAIRE COMPTE 4010 FOURNISSEURS ETRANGERS</td>
                </tr>
                <?php
                $i = 1 ;
                $test = $bdd->query("select count(*) as isHere from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsEtr1'") ;
                $test = $test->fetch() ;
                if($test['isHere'] == 0){ ?>
                    <tr class="backWhite" id="trBlEtr<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxEtr1Cpt<?php echo $i; ?>" value="" />
                    </td>
                    <td><input type="Text" id="BlAuxEtr1Lbl<?php echo $i; ?>" value="" /></td>
                    <td><input type="Text" id="BlAuxtEtr1Sol<?php echo $i; ?>" value="" /></td>
                    <td><textarea id="BlAuxtEtr1Just<?php echo $i; ?>" rows="2" cols="25"></textarea></td>
                    
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnsEtrange1" class="bouton" style="width:100px;" />
                        <input type="Button" value="Supprimer" id="supprFrnsEtrange1" class="bouton" style="width:100px;"/>
                    </td>
                    
                </tr> 
                
            </table>
                <?php } else{
                 

                 $sql2 = "select * from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsEtr1' ";
                
                $sql2 = $bdd->query($sql2) ;
                
                while($sql3 = $sql2->fetch())
                {



                ?>
                <tr class="backWhite" id="trBlEtr<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxEtr1Cpt<?php echo $i; ?>" value="<?php echo $sql3['compte'] ; ?>" />
                    </td>
                    <td><input type="Text" id="BlAuxEtr1Lbl<?php echo $i; ?>" value="<?php echo $sql3['libelle'] ; ?>" /></td>
                    <td><input type="Text" id="BlAuxtEtr1Sol<?php echo $i; ?>" value="<?php echo $sql3['soldeDebit'] ; ?>" /></td>
                    <td><textarea id="BlAuxtEtr1Just<?php echo $i; ?>" rows="2" cols="25"><?php echo $sql3['justification'] ; ?></textarea></td>
                    <?php if($i==1){ ?>
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnsEtrange1" class="bouton" style="width:100px;" />
                        <input type="Button" value="Supprimer" id="supprFrnsEtrange1" class="bouton" style="width:100px;"/>
                    </td>
                    <?php } ?>
                </tr> 
                <?php $i++ ; } }?>
            </table>
            <table id="groupe1"> 
                
                <tr>
                    <td colspan="5" class="enteteBalAux">BALANCE AUXILIAIRE DU COLLECTIF 4015 FOURNISSEURS GROUPE</td>
                </tr>  
                 <?php
                 $i = 1 ;
                  $test = $bdd->query("select count(*) as isHere from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsGpe'") ;
                $test = $test->fetch() ;
                if($test['isHere'] == 0){ ?>
                    <tr class="backWhite" id="trBlGpe<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxGpeCpt<?php echo $i; ?>" value="" />
                    </td>
                    <td><input type="Text" id="BlAuxGpeLbl<?php echo $i; ?>" value="" /></td>
                    <td><input type="Text" id="BlAuxtGpeSol<?php echo $i; ?>" value="" /></td>
                    <td><textarea id="BlAuxtGpeJust<?php echo $i; ?>" rows="2" cols="25"></textarea></td>
                    
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnGpe" class="bouton"  style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsGpe" class="bouton" style="width:100px;"/>
                    </td>
                    
                </tr>
                
            </table><?php }else{
                  $sql5 = "select * from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsGpe' ";
                $sql5 = $bdd->query($sql5) ;
                
                while($sql = $sql5->fetch()){



                ?>
                <tr class="backWhite" id="trBlGpe<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxGpeCpt<?php echo $i; ?>" value="<?php echo $sql['compte'] ; ?>" />
                    </td>
                    <td><input type="Text" id="BlAuxGpeLbl<?php echo $i; ?>" value="<?php echo $sql['libelle'] ; ?>" /></td>
                    <td><input type="Text" id="BlAuxtGpeSol<?php echo $i; ?>" value="<?php echo $sql['soldeDebit'] ; ?>" /></td>
                    <td><textarea id="BlAuxtGpeJust<?php echo $i; ?>" rows="2" cols="25"><?php echo $sql['justification'] ; ?></textarea></td>
                    <?php if($i==1){ ?>
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnGpe" class="bouton"  style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsGpe" class="bouton" style="width:100px;"/>
                    </td>
                    <?php } ?>
                </tr>
                <?php $i++ ; } }?>
            </table>
            <table id="locaux1">
                <tr>
                    <td colspan="5" class="enteteBalAux">BALANCE AUXILIAIRE DU COLLECTIF 4019 FOURNISSEURS LOCAUX</td>
                </tr> 
                <?php
                $i = 1 ;
                $test = $bdd->query("select count(*) as isHere from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsLoc1'") ;
                $test = $test->fetch() ;
                if($test['isHere'] == 0){ ?>
                <tr class="backWhite" id="trBlLoc1<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxLoc1Cpt<?php echo $i; ?>" value="" />
                    </td>
                    <td><input type="Text" id="BlAuxLoc1Lbl<?php echo $i; ?>" value="" /></td>
                    <td><input type="Text" id="BlAuxtLoc1Sol<?php echo $i; ?>" value="" /></td>
                    <td><textarea id="BlAuxtLoc1Just<?php echo $i; ?>" rows="2" cols="25"></textarea></td>
                    
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnLoc1" class="bouton" style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsLoc1" class="bouton" style="width:100px;"/>
                    </td>
                    
                </tr>
                 
            </table><?php }else {
                 $sql6 = "select * from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsLoc1' ";
                $sql6 = $bdd->query($sql6) ;
                
                while($sql = $sql6->fetch()){



                ?>
                <tr class="backWhite" id="trBlLoc1<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxLoc1Cpt<?php echo $i; ?>" value="<?php echo $sql['compte'] ; ?>" />
                    </td>
                    <td><input type="Text" id="BlAuxLoc1Lbl<?php echo $i; ?>" value="<?php echo $sql['libelle'] ; ?>" /></td>
                    <td><input type="Text" id="BlAuxtLoc1Sol<?php echo $i; ?>" value="<?php echo $sql['soldeDebit'] ; ?>" /></td>
                    <td><textarea id="BlAuxtLoc1Just<?php echo $i; ?>" rows="2" cols="25"><?php echo $sql['justification'] ; ?></textarea></td>
                    <?php if($i==1){ ?>
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnLoc1" class="bouton" style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsLoc1" class="bouton" style="width:100px;"/>
                    </td>
                    <?php } ?>
                </tr>
                <?php $i++ ; } } ?>
            </table>
            <table id="etangers2">
                <tr>
                    <td colspan="5" class="enteteBalAux"> BALANCE AUXILIAIRE DU COLLECTIF 4090 FOURNISSEURS ETRANGERS</td>
                </tr> 
                <?php
                $i = 1 ;
                $test = $bdd->query("select count(*) as isHere from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsEtr2'") ;
                $test = $test->fetch() ;
                if($test['isHere'] == 0){ ?>
                <tr class="backWhite" id="BlAuxEtr2<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxEtr2Cpt<?php echo $i; ?>" value="" /></td>                    
                    <td><input type="Text" id="BlAuxEtr2Lbl<?php echo $i; ?>" value="" /></td>
                    <td><input type="Text" id="BlAuxtEtr2Sol<?php echo $i; ?>" value="" /></td>
                    <td><textarea id="BlAuxtEtr2Just<?php echo $i; ?>" rows="2" cols="25"></textarea></td>
                    
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnEtrg2" class="bouton" style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsEtrg2" class="bouton" style="width:100px;" />
                    </td>
                    
                </tr>
                
            </table> <?php }else { 
                 $sql7 = "select * from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsEtr2' ";
                $sql7 = $bdd->query($sql7) ;
                
                while($sql = $sql7->fetch()){



                ?>
                <tr class="backWhite" id="BlAuxEtr2<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxEtr2Cpt<?php echo $i; ?>" value="<?php echo $sql['compte'] ; ?>" /></td>                    
                    <td><input type="Text" id="BlAuxEtr2Lbl<?php echo $i; ?>" value="<?php echo $sql['libelle'] ; ?>" /></td>
                    <td><input type="Text" id="BlAuxtEtr2Sol<?php echo $i; ?>" value="<?php echo $sql['soldeDebit'] ; ?>" /></td>
                    <td><textarea id="BlAuxtEtr2Just<?php echo $i; ?>" rows="2" cols="25"><?php echo $sql['justification'] ; ?></textarea></td>
                    <?php if($i==1){ ?>
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnEtrg2" class="bouton" style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsEtrg2" class="bouton" style="width:100px;" />
                    </td>
                    <?php } ?>
                </tr>
                <?php $i++ ; } }?>
            </table>

            

            <table id="locaux2">
                <tr>
                    <td colspan="5" class="enteteBalAux"> BALANCE AUXILIAIRE DU COLLECTIF 4099 FOURNISSEURS LOCAUX</td>
                </tr> 
                <?php
                $i = 1 ;
                $test = $bdd->query("select count(*) as isHere from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsLoc2'") ;
                $test = $test->fetch() ;
                if($test['isHere'] == 0){ ?>
                <tr class="backWhite" id="BlAuxLoc2<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxLoc2Cpt<?php echo $i; ?>" value="" /></td>                    
                    <td><input type="Text" id="BlAuxLoc2Lbl<?php echo $i; ?>" value="" /></td>
                    <td><input type="Text" id="BlAuxtLoc2Sol<?php echo $i; ?>" value="" /></td>
                    <td><textarea id="BlAuxtLoc2Just<?php echo $i; ?>" rows="2" cols="25"></textarea></td>
                    
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnLoc2" class="bouton"  style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsLoc2" class="bouton"  style="width:100px;"/>
                    </td>
                    
                </tr>
                
                
            </table><?php }else{ 
                 $sql8 = "select * from tab_rdc_cf_f7 where MISSION_ID = $mission_id AND reference = 'BalAuxFrnsLoc2' ";
                $sql8 = $bdd->query($sql8) ;
                
                while($sql = $sql8->fetch()){



                ?>
                <tr class="backWhite" id="BlAuxLoc2<?php echo $i; ?>">
                    <td><input type="Text" id="BlAuxLoc2Cpt<?php echo $i; ?>" value="<?php echo $sql['compte'] ; ?>" /></td>                    
                    <td><input type="Text" id="BlAuxLoc2Lbl<?php echo $i; ?>" value="<?php echo $sql['libelle'] ; ?>" /></td>
                    <td><input type="Text" id="BlAuxtLoc2Sol<?php echo $i; ?>" value="<?php echo $sql['soldeDebit'] ; ?>" /></td>
                    <td><textarea id="BlAuxtLoc2Just<?php echo $i; ?>" rows="2" cols="25"><?php echo $sql['justification'] ; ?></textarea></td>
                    <?php if($i==1){ ?>
                    <td>
                        <input type="Button" value="Ajouter" id="ajoutFrnLoc2" class="bouton"  style="width:100px;"/>
                        <input type="Button" value="Supprimer" id="supprFrnsLoc2" class="bouton"  style="width:100px;"/>
                    </td>
                    <?php } ?>
                </tr>
                <?php $i++ ; } }?>
                
            </table>
        </div>
    </body>
</html>