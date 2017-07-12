<?php 
    include './../../../connexion.php';
    @session_start();
    $mission_id=@$_SESSION['idMission'];

    $sql = "SELECT MISSION_DATE_CLOTURE FROM tab_mission WHERE MISSION_ID = ".$mission_id;
    $reponse=$bdd->query($sql);
    $donnees=$reponse->fetch();
    $date = $donnees['MISSION_DATE_CLOTURE'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<script type="text/javascript" src="../RA/jquery.js"></script>

    <style type="text/css">
        .export-word-sample fieldset {
            margin: 5px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #CCCCCC;
        }

            .export-word-sample fieldset label {
                display: block;
                margin-bottom: 3px;
            }

            .export-word-sample fieldset input {
                margin-bottom: 5px;
                float: left;
                clear: left;
            }

            .export-word-sample fieldset label {
                float: left;
                width: 160px;
                padding-top: 2px;
            }

            .export-word-sample fieldset fieldset {
                display: inline-block;
                vertical-align: middle;
                width: auto;
            }

        #grid1_container {
            margin: 15px auto;
        }

         #lettre{
			  background-color:white;
			  width:1000px;
			  height:550px;
			  padding-bottom:30px;
              overflow: auto;
		}
		.ligne_adress{
			border-bottom:1px solid black;
			width:200px;
			margin-left:10px;
		}
        #btn_retour{
            border:1px solid #ccc;
            background-color:#efefef;
            border-radius:8px;
            width:300px;
            height:auto;
        }
        #btn_retour:hover
        {
            cursor:pointer;
            background-color:#0074bf;
            color:#fff; 
        }
    </style>
    <script type="text/javascript">
        $(".export").submit(function(){

            var data = $(this).serialize();
            var id= $(this).find('input[name="num"]').val();
            // alert(id);
            $.ajax({
                type:"POST",
                url:"/RA/circularisation/avocat/exportgatway.php",
                data: data,
                success:function(e){
                    // alert(id);
                    $("#form-"+id+" #btnSubmit").replaceWith('<a href="RA/circularisation/avocat/avocat-'+id+'.docx">Telecharger</a>');
                    // $(this).find($('a')).click();
                }
            });
        });
        $("#btn_retour").click(function(){
                  $('#contenue').load("/RA/circularisation/avocat/avocat.php");
               });
        </script>
</head>
<body>
    <p id="btn_retour"> Retour </p>
     <div style="overflow:auto; height: 660px;">
        <div id="lettre">
        <?php for ($i=1; $i <= $_POST['nombreAvocat']; $i++) { ?>
            <form id="form-<?= $i ?>" method="post" class='export' action="/RA/circularisation/avocat/exportgatway.php" onsubmit="return false">
           	<br/>
				<div style="display:block;">
                    <div id='headerText'><?php echo $_POST['nomAvocat-'.$i]; ?><br/><?php echo $_POST['CoordAvocat-'.$i]; ?></div>
				</div>
				<label style="margin-left:-700px;">Maître,</label><br/><br/>
				<p style="margin-left:-136px;">Nous vous serions obligés de bien vouloir communiquer à notre commissaire aux comptes,</p> 
				<p style="margin-left:43px;"><b>le cabinet Cabinet CATEIN Gérard,sis au 135 Bis, Route Circulaire Ankorahotra BP 1611 Antananarivo 101,</b></p> 
				<p style="margin-left:-54px;">avec copie à nous-mêmes, les informations en votre possession à la date de la présente et concernant :</p><br/>
				
					<p style="margin-left:-187px;">-les litiges et procès en cours ou éventuels où notre société se trouverait impliquée,</p>
					<p style="margin-left:-358px;">-les réclamations et passifs déposés contre notre société,</p>
					<p style="margin-left:-150px;">-vos notes d'honoraires et de débours non encore réglés à la date du <?= $date ?></p>
				<br/>
				<p style="margin-left:-46px;">En vous remerciant pour votre coopération, veuillez agréer, Maître, l'expression de nos sentiments distingués.</p>
				<h4><u>LA DIRECTION</u> </h4>
				<div class="button-container" style="margin-bottom:30px;" >
                    <input type='hidden' name='num' value='<?= $i ?>'/>
					<input type='hidden' name='nomAvocat' value='<?= $_POST['nomAvocat-'.$i] ?>'/>
                    <input type='hidden' name='CoordAvocat' value='<?= $_POST['CoordAvocat-'.$i] ?>'/>
                    <input type='hidden' name='dateCloture' value='<?= $date ?>'/>

					<input id="btnSubmit" type="submit" value="Export word" />
					
				</div>
		    </form>
        <?php } ?>
        </div>
    </div>
</body>
</html>