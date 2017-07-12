function Listtache_entreprise(transfert_tache)
{

    transfert_tache = $("#Frm_tacheETEND").serialize();
    lienTrans = "../entreprise/listetache_entreprise.php?" + transfert_tache;
    //alert(lienTrans);
    $.get(lienTrans, function (res)
    {
        $("#liste-tache").html(res);
    });

}


$(function ()
{

    //DEBUT REPARTITION DES TACHES MissionETEND
    $(document).on("click", ".tacheETEND", function (e)
    {

        var transfert = "";
        tacheETEND = $(this).val();

        //alert($(this).prop('checked'));
        if ($(this).prop('checked') == true)
        {
            transfert = "tacheETEND=" + tacheETEND + "&check=checked";

        } else
        {
            transfert = "tacheETEND=" + tacheETEND + "&check=unchecked";
        }


        lienTrans = "../entreprise/Enreg_repartitionEtendue.php?" + transfert;
        //alert(lienTrans);
        $.get(lienTrans, function (res)
        {
            //alert(res);
            if (res = "OK_enregTacheetendue")
                ;
            Listtache_entreprise(transfert);


        });

    }
    );
    //FIN REPARTITION DES TACHES MissionETEND







    //recupération de l'idMission
    var idMission = $("#idMission").val();
    $(".selectpicker").selectpicker();

    //initialisation des dropdown et des drag&drop
    $("#liste-tache").accordion({
        collapsible: true
    });
    $("#liste-auditeur").accordion({
        collapsible: true,
        heightStyle: "fill"
    });

    $("#accordion-resizer").resizable({
        minHeight: 140,
        minWidth: 200,
        resize: function () {
            $("#liste-auditeur").accordion("refresh");
        }
    });

    $("#liste-tache li").draggable({
        appendTo: "body",
        helper: "clone"
    });

    $("#liste-auditeur li").draggable({
        appendTo: "body",
        helper: "clone"
    });

    $("#liste-auditeur ul").droppable({
        accept: ":not(.ui-sortable-helper)",
        drop: function (event, ui) {
            var idAuditeur = $(this).attr('idAuditeur'),
                    idTache = ui.draggable.attr('idTache');

            $(this).find(".placeholder").remove(); //supprime le placeholder
            ui.draggable.attr('idAuditeur', idAuditeur).appendTo(this);
            ajouterTache(idAuditeur, idTache);
        }
    });

    $("#liste-tache ul").droppable({
        accept: 'li', //ze tache ao am le fonction iany
        drop: function (event, ui) {
            ui.draggable.appendTo(this);
            retirerTache(ui.draggable.attr('idAuditeur'), ui.draggable.attr('idTache'));
        }
    });

//recupération de la repartition de tache
    var repartitionTache = new Array(),
            tacheUnitaire = new Array();
    var recupFromTable = true;

    if (recupFromTable) {
        getRepTacheFromTable();
        recupFromTable = false;
    }

    function ajouterTache(auditeur, tache) {
        //console.log(auditeur+' dia manao '+tache);
        tacheUnitaire = {'auditeur': auditeur, 'tache': tache};
        repartitionTache.push(tacheUnitaire);
        console.log(repartitionTache);
    }

    function retirerTache(auditeur, tache)
    {
        //console.log(auditeur+' dia tsy manao '+tache+' intsony');
        if (auditeur !== undefined)
        {
            var index = $.map(repartitionTache, function (obj, index) {
                if (obj.auditeur == auditeur && obj.tache == tache) {
                    return index;
                }
            });
            if (index != "")
                repartitionTache.splice(index, 1);
            else
                console.log('Aucune tache trouvé');
            console.log(repartitionTache);
        }
    }

    function getRepTacheFromTable()
    {
        $("#liste-auditeur li").each(function () {
            ajouterTache($(this).attr("idAuditeur"), $(this).attr("idTache"));
        });
    }

//ajout et suppression d'intervenant
    function retirerAuditeur(idAuditeur) {
        var nIteration = repartitionTache.length;
        for (var i = 0; i < nIteration; i++) {
            var taches = $.map(repartitionTache, function (obj, index) {
                if (obj.auditeur == idAuditeur) {
                    return index;
                }
            });
            if (taches != "") {
                repartitionTache.splice(taches[0], 1);
                console.log(repartitionTache);
            } else {
                console.log("Cet auditeur n'a aucune tâche");
                break;
            }
        }
        console.log(repartitionTache);
    }

    $(".glyphicon-remove").click(function ()
    {
        if (confirm("Voulez vous vraiment retirer cet auditeur?")) {
            retirerAuditeur($(this).attr("idAuditeur"));
            $.ajax({
                type: "post",
                url: "entreprise/save_repartition_tache.php",
                data: {idMission: idMission, repartitionTache: repartitionTache, idAuditeur: $(this).attr("idAuditeur"), action: "supprimer"},
                success: function (msg) {
                    //alert(msg);
                    locationReload(idMission);
                }
            });
        }
    });

    $("#addAuditeur").click(function () {
        var idAuditeur = $("select[name='auditeur'] option:selected").val(),
                nomAuditeur = $("select[name='auditeur'] option:selected").text();
        if (confirm("Voulez-vous vraiment ajouter " + nomAuditeur + " à la mission")) {
            console.log("ok");
            $.ajax({
                type: "post",
                url: "entreprise/save_repartition_tache.php",
                data: {idMission: idMission, repartitionTache: repartitionTache, idAuditeur: idAuditeur, action: "ajouter"},
                success: function () {
                    locationReload(idMission);
                }
            });
        }
        ;
    });

//modification du superviseur
    var select = $("#selectSuperviseur"),
            idSuperviseur, nomSuperviseur;

    select.on("change", function () {
        nomSuperviseur = $("#selectSuperviseur option:selected").text();
        idSuperviseur = select.val();
    });

    $("#modifSuperviseur").click(function () {
        if (confirm("Voulez-vous vous vraiment modifier le superviseur de la mission?")) {
            $.ajax({
                type: "post",
                url: "entreprise/modify_superviseur.php",
                data: {idMission: idMission, idSuperviseur: idSuperviseur, nomSuperviseur: nomSuperviseur},
                success: function (msg) {
                    alert(msg);
                    locationReload(idMission);
                }
            })
        }
    });

//validation et enregistrement de la répartition des taches
    var messageValider = "";
    if (repartitionTache.length < 59) {
        messageValider = "Voulez-vous enregistrer cette réparition des tâches?";

    } else {
        messageValider = "Toutes les tache on été bien enregistré. Continuer quand même?";
    }

    $("#btnValider").click(function () {
        if (!confirm(messageValider)) {
            console.log("Annulé");
        } else {
            console.log("Confirmé");
            $.ajax({
                type: 'post',
                url: 'entreprise/save_repartition_tache.php',
                data: {idMission: idMission, repartitionTache: repartitionTache},
                success: function (msg) {
                    alert(msg);
                    location.reload();
                }
            });
        }
        console.log("lasa");
    });

//annulation et retour
    $("#btnAnnuler").click(function () {
        retourAccueil();
    });

    function retourAccueil() {
        if (confirm("Voulez-vous vraiment quitter cette page? Toutes les modifications non enregistrée seront perdues. Continuer quand même?")) {
            location.reload();
        }
    }

//fonction de location.reload()
    function locationReload(idMission) {
        $.ajax({
            type: "post",
            url: "entreprise/repartition_tache.php",
            data: {idMission: idMission},
            success: function (e) {
                $("#Acc").html(e).show();
            }
        });
    }
});