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
	<script type="text/javascript" src="..RA/jquery.js"></script>

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
			  height:750px;
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
                        url:"/RA/circularisation/frns/exportgatway.php",
                        data: data,
                        success:function(e){
                            // alert(id);
                            $("#input-"+id).append('<a href="RA/circularisation/frns/frns-'+id+'.docx">Telecharger</a>');
                            // $(this).find($('a')).click();
                        }
                    });
                });
                $("#btn_retour").click(function(){
                  $('#contenue').load("/RA/circularisation/frns/frns.php");
                });

               // grid.on("iggridpagingpageindexchanged", function (e, ui) {
                //    pageNumber.val(ui.pageIndex);
                //});

                //grid.on("iggridpagingpagesizechanged", function (e, ui) {
                //    pageSize.val(ui.pageSize);
                //    pageNumber.val(0);
                //});
            });
        </script>
</head>
<body>
    <p id="btn_retour"> Retour </p>
    <div style="overflow:auto; height: 660px;">
    <?php for ($i=0; $i < $_POST['nbr']; $i++) { ?>
    <form id="form-<?= $i ?>" method="post" class='export' action="/RA/circularisation/frns/exportgatway.php" onsubmit="return false">
        <div id="lettre">
           	<br/>
					
					<div style="display:block;">
                        <p>Antananarivo, le <?= date('d-m-Y')?></p>
						<div id='headerText'><?php echo $_POST['nom-'.$i]; ?><br/><?php echo $_POST['coordonnees-'.$i]; ?></div>
					</div>
					
					<label style="margin-left:-700px;">Messieurs,</label><br/><br/>
					
					<p style="margin-left:40px;">A la demande de notre Auditeur, le Cabinet Gérard CATEIN, nous vous serions reconnaissants <br/>de bien vouloir lui retourner à l’adresse citée ci-dessous à l’aide de l’enveloppe timbrée ci- jointe :</p><br/>
					<p style="margin-left:340px;"><b>Cabinet Gérard CATEIN</b></p>
					<p style="margin-left:395px;"><b>Expert Comptable et Financier</b></p>
					<p style="margin-left:333px;">135 Bis, Route Circulaire</p>
					<p style="margin-left:250px;">Ankorahotra</p>
					<p style="margin-left:224px;">BP 1611</p>
					<p style="margin-left:283px;">Antananarivo 101</p></br>
					
						<p style="margin-left:-120px;">-un relevé détaillé de notre compte dans vos livres, à la date du 31/12/2010 et le cas échéant,</p>
						<p style="margin-left:-245px;">-le montant et l’échéance des effets que nous avons acceptés à votre ordre.</p>
				
					<ul>
					<br/>
					<p style="margin-left:29px;"> Nous tenons à préciser que la présente demande a uniquement pour objectif le contrôle de nos comptes au 31/12/2010.</p>
					
					<p style="margin-left:50px;"> Nous vous remercions de votre collaboration et vous prions d’agréer, Messieurs, l’expression de nos sentiments distingués.</p>
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