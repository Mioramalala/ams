<?php
@session_start();
$_SESSION['fonction'] = 'synthese';
$mission_id = $_SESSION['idMission'];
?>
<html>
<head>
    <link rel="stylesheet" href="../RA/css_RA.css"/>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="/js/js_RA.js"></script>
</head>

<body>

<table width="70%" height="50" style="text-align:left;background-color:#FFFFFF;margin-bottom:10px">
    <tr>
        <td style="color:#0099FF">
            <div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;">
                <table>
                    <tr>
                        <td width="20%" style="left:15%;top:2px;margin-left:15%"><img
                                src="../../img/iconswidgets/planification.png" height="48" width="48"/></td>
                        <td width="50%" style="color:#89CCF8;font-size:1.5em;font-family:font_TE;font-weight:bold;">
                            Circularisation
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>

<table width="70%" style="background-color:#FFFFFF">
    <tr class="label_Evaluation" height="110">
        <td class="td_Image" width="50%"
            onClick="openCircularisation('avocat')">
            <input type="text" id="missId" value="<?php echo $mission_id; ?>" style="display:none;"/>
            <div style="float:left"><img src="img/alphabet/A.png"/></div>
            <div style="float:left;padding-top:30px;text-align:center;padding-left:10%"><label>Avocat.</label></div>
        </td>
        <td class="td_Image" width="50%"
            onClick="openCircularisation('banque')">
            <div style="float:left"><img src="img/alphabet/B.png"/></div>
            <div style="float:left;padding-top:30px;text-align:center;padding-left:10%"><label>Banques.</label></div>
        </td>
    </tr>

    <!--    onClick="click_sousMenueREvue('/RA/circularisation/frns/frns.php',$('#missId').val())">-->
    <tr class="label_Evaluation" height="110">
        <td class="td_Image" width="50%"
            onClick="openCircularisation('fournisseur')">
            <div style="float:left"><img src="img/alphabet/C.png"/></div>
            <div style="float:left;padding-top:30px;text-align:center;padding-left:10%"><label>Fournisseurs.</label>
            </div>
        </td>
        <td class="td_Image" width="50%"
            onClick="openCircularisation('client')">
            <div style="float:left"><img src="img/alphabet/D.png"/></div>
            <div style="float:left;padding-top:30px;text-align:center;padding-left:10%"><label>Clients.</label></div>
        </td>
    </tr>

    <tr class="label_Evaluation" height="110">
        <center>
            <td class="td_Image" width="50%"
                onClick="openCircularisation('dcd')">
                <div style="float:left"><img src="img/alphabet/E.png"/></div>
                <div style="float:left;padding-top:30px;text-align:center;padding-left:10%"><label>Débiteurs et créditeurs divers.</label></div>
            </td>
        </center>
    </tr>
</table>
</div>

<script>
    function openCircularisation(type) {
        window.open('ams-mvc/index.php?type=' + type, '_blank');
    }
</script>
</body>
</html>