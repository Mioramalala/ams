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
			  height:700px;
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
            $(function () {
            //     var grid = $("#grid1"),
            //         pageSize = $("#pageSize"),
            //         pageNumber = $("#pageNumber");

            //     pageNumber.val(0);
            //     pageSize.val(0);

            //     grid.on("iggridrendered", function (e, ui) {
            //         pageSize.val(grid.igGridPaging("option", "pageSize"));
            //         pageNumber.val(grid.igGridPaging("option", "currentPageIndex"));
            //     });

            //     grid.on("iggridpagingpageindexchanged", function (e, ui) {
            //         pageNumber.val(ui.pageIndex);
            //     });

            //     grid.on("iggridpagingpagesizechanged", function (e, ui) {
            //         pageSize.val(ui.pageSize);
            //         pageNumber.val(0);
            //     });
            // });
                $(".export").submit(function(){

                    var data = $(this).serialize();
                    var id= $(this).find('input[name="num"]').val();
                    // alert(id);
                    $.ajax({
                        type:"POST",
                        url:"/RA/circularisation/banque/exportgatway.php",
                        data: data,
                        success:function(e){
                            // $("#input-"+id).append('<a href="RA/circularisation/banque/banque-'+id+'.docx">Telecharger</a>');
                            $("#form-"+id+" #btnSubmit").replaceWith('<a href="RA/circularisation/banque/banque-'+id+'.docx">Telecharger</a>');
                            // $(this).find($('a')).click();
                        }
                    });
                });
                $("#btn_retour").click(function(){
                  $('#contenue').load("/RA/circularisation/banque/banque.php");
               });
        });
        </script>
</head>
<body>
    <p id="btn_retour"> Retour </p>
    <div style="overflow:auto; height: 660px;">
    <?php for ($i=0; $i < $_POST['nbr']; $i++) { ?>
    <form id="form-<?= $i ?>" method="post" class='export' action="/RA/circularisation/banque/exportgatway.php" onsubmit="return false">
        <div id="lettre">
           	<br/>
					<div style="display:block;">
                        <p>Antananarivo, le <?= date('d-m-Y')?></p>
						<div id='headerText'><?php echo $_POST['nom-'.$i]; ?><br/><?php echo $_POST['coordonnees-'.$i]; ?></div>
					</div>
					<label style="margin-left:-700px;">Messieurs,</label><br/><br/>
					<p style="margin-left:16px;">Dans le cadre de la vérification de nos états financiers au <?= $date ?>, notre Auditeur,</p> 
					<p style="margin-left:5px;"><b>Cabinet GERARD CATEIN, Expert comptable et Financier,</b>désire recevoir les renseignements ci-dessous,</p> 
					<p style="margin-left:-692px;">à cette date :</p><br/>
					
						<p style="margin-left:-67px;">1 – Le solde des divers comptes, de dépôts ou autres, ouverts  à notre nom dans votre établissement,<br/> indiquant les restrictions éventuelles prévues pour leur fonctionnement.</p>
						<p style="margin-left:-2px;">2 – Le montant des intérêts, commissions et frais à cette date qui n’avait pas encore été pris en considération </br>pour déterminer le solde des comptes.</p>
						<p style="margin-left:14px;">3 – Le nom des personnes habilitées, seules ou conjointement, à signer pour le fonctionnement de ces comptes.</p>
						<p style="margin-left:-360px;">4 – Toute autre information que vous jugeriez nécessaire.</p>
					<br/>
					<p style="margin-left:-82px;">Nous vous remercions de préciser dans votre réponse la mention NEANT s’il y a lieu.</p>
					
					<p style="margin-left:73px;">Nous vous serions obligés d’adresser cette pièce directement à notre Auditeur à l’aide de l’enveloppe jointe.</p>
					
					<p style="margin-left:-174px;">Veuillez agréer, Messieurs, l’expression de nos salutations distinguées.</p>
					<h4><u>LA DIRECTION</u> </h4>
					
					<div id='input-<?= $i ?>' class="button-container">
                        <input type='hidden' name='num' value='<?= $i ?>'/>
                        <input type='hidden' name='nom' value='<?= $_POST['nom-'.$i] ?>'/>
                        <input type='hidden' name='adresse' value='<?= $_POST['coordonnees-'.$i] ?>'/>
                        <input type='hidden' name='dateCloture' value='<?= $date ?>'/>

                        <input id="btnSubmit" type="submit" value="Export word" />
					</div>
         </div>
    </form>
    <?php } ?>     
    </div>
     
</body>
</html>