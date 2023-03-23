let test1;
let test2;

function alertSuccess(contentAlert) {
    const alertSuccess = document.getElementById("alertSuccess");
    alertSuccess.textContent += contentAlert;
    document.getElementById('alertSuccess').style.display = 'block';
    document.getElementById('progress').style.display = 'flex';
    $('#myModal').modal('hide');
    function deleteAlert() {
        document.getElementById('alertSuccess').style.display = 'none';
        document.getElementById('progress').style.display = 'none';
    }
    setTimeout(deleteAlert, 3000)
}
function alertFail() {
    const alertFail = document.getElementById("alertFail");
    alertFail.textContent += "Oups, il y a eu une erreur";
    document.getElementById('alertFail').style.display = 'block';
    document.getElementById('progress').style.display = 'flex';
    $('#myModal').modal('hide');
    function deleteAlert() {
        document.getElementById('alertFail').style.display = 'none';
        document.getElementById('progress').style.display = 'none';
    }
    setTimeout(deleteAlert, 3000)
}
function ajaxProduct() {
    const form = $('#addProduct1')[0];
    const formData = new FormData(form);
    console.log(formData);
    console.log(form);
    jQuery.ajax({
        type: "POST",
        url: "/product/traitementproduct",
        enctype: 'multipart/form-data',
        data: formData,
        processData: false, //Important!
        contentType: false,
        cache: false,
        async: false
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        let productDone;
        return productDone = false;
        console.log(jqXHR, textStatus, errorThrown);
    })
    .done(function(data, textStatus, jqXHR) {
        let productDone;
        return productDone = true;
    })
}
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener("DOMContentLoaded", (event) => {
        $('.paginate_button').click(function(){
            changement();
        });
        changement();
    });
    function changement(){
        $("input[name='new']").change(function(e)
        {
            console.log(e);
            $.ajax({
                type: "GET",
                url: "/product/traitementModifNew",
                enctype: 'multipart/form-data',
                data: 'id=' + e.target.id + '&checked=' + e.target.checked,

                processData: false, //Important!
                contentType: false,
                cache: false
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                    alert('fail');
                    console.log(jqXHR, textStatus, errorThrown);
                })
            .done(function(data, textStatus, jqXHR) {
                // success(true, true)
            })
        });                
    }
    

    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        if(d.Type === 'ecig'){
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Puissance : '+d.a+'</td>'+
                    '<td>Batterie : '+d.b+'</td>'+
                    '<td>Autonomie : '+d.c+'</td>'+
                    '<td>Fonctionnement : '+d.d+'</td>'+
                    '<td>Hauteur : '+d.e+'</td>'+
                    '<td>Poid : '+d.f+'</td>'+
                    '<td>Largeur : '+d.g+'</td>'+
                '</tr><tr>'+
                    '<td>Poid : '+d.h+'</td>'+
                    '<td>Matière : '+d.i+'</td>'+
                    '<td>Nombre de batterie : '+d.j+'</td>'+
                    '<td>Type de batterie : '+d.k+'</td>'+
                    '<td>Rechargeable par USB : '+d.l+'</td>'+
                    '<td>Connecteur de chargement : '+d.m+'</td>'+
                    '<td>Puissance Max : '+d.n+'</td>'+
                '</tr><tr>'+
                    "<td>Voltage d'entré : "+d.o+'</td>'+
                    '<td>Voltage de sortie : '+d.p+'</td>'+
                    '<td>Voltage de charge : '+d.q+'</td>'+
                    '<td>Puissance de chargement : '+d.r+'</td>'+
                    '<td>Résistance compatible : '+d.s+'</td>'+
                '</tr>'+
        '</table>';
        }else if(d.Type === 'eliquid')
        {
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Notes dominantes : '+d.a+'</td>'+
                    '<td>Saveur : '+d.b+'</td>'+
                    '<td>Taux de nicotine : '+d.c+'</td>'+
                    '<td>Capacité : '+d.d+'</td>'+
                    '<td>Origine : '+d.e+'</td>'+
                    '<td>PG : '+d.f+'</td>'+
                    '<td>VG : '+d.g+'</td>'+
                '</tr><tr>'+
                    '<td>Type de nicotine : '+d.h+'</td>'+
                    "<td>Type d'arome : "+d.i+'</td>'+
                    "<td>Présence d'alcool ajouté : "+d.j+'</td>'+
                    "<td>Présence d'eau ajouté : "+d.k+'</td>'+
                    '<td>Dosage recommendé : '+d.l+'</td>'+
                    '<td>Temps de maturation : '+d.m+'</td>'+
                    '<td>Collection : '+d.n+'</td>'+
                '</tr>'+
        '</table>';
        }else if(d.Type === 'ato')
        {
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Capacité : '+d.a+'</td>'+
                    '<td>Longueur : '+d.b+'</td>'+
                    '<td>Diametre : '+d.c+'</td>'+
                    '<td>Résistance : '+d.d+'</td>'+
                    '<td>Remplissage : '+d.e+'</td>'+
                    '<td>Airflow : '+d.f+'</td>'+
                '</tr>'+
        '</table>';
        }else if(d.Type === 'diy')
        {
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Notes dominantes : '+d.a+'</td>'+
                    '<td>Saveur : '+d.b+'</td>'+
                    '<td>Taux de nicotine : '+d.c+'</td>'+
                    '<td>Capacité : '+d.d+'</td>'+
                    '<td>Origine : '+d.e+'</td>'+
                    '<td>PG : '+d.f+'</td>'+
                    '<td>VG : '+d.g+'</td>'+
                '</tr><tr>'+
                    '<td>Type de nicotine : '+d.h+'</td>'+
                    "<td>Type d'arome : "+d.i+'</td>'+
                    "<td>Présence d'alcool ajouté : "+d.j+'</td>'+
                    "<td>Présence d'eau ajouté : "+d.k+'</td>'+
                    '<td>Dosage recommendé : '+d.l+'</td>'+
                    '<td>Temps de maturation : '+d.m+'</td>'+
                '</tr>'+
        '</table>';
        }else if(d.Type === 'fullKit')
        {
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Puissance : '+d.a+'</td>'+
                    '<td>Batterie : '+d.b+'</td>'+
                    '<td>Autonomie : '+d.c+'</td>'+
                    '<td>Fonctionnement : '+d.d+'</td>'+
                    '<td>Hauteur : '+d.e+'</td>'+
                    '<td>Poid : '+d.f+'</td>'+
                    '<td>Largeur : '+d.g+'</td>'+
                '</tr><tr>'+
                    '<td>Poid : '+d.h+'</td>'+
                    '<td>Matière : '+d.i+'</td>'+
                    '<td>Nombre de batterie : '+d.j+'</td>'+
                    '<td>Type de batterie : '+d.k+'</td>'+
                    '<td>Rechargeable par USB : '+d.l+'</td>'+
                    '<td>Connecteur de chargement : '+d.m+'</td>'+
                    '<td>Puissance Max : '+d.n+'</td>'+
                '</tr><tr>'+
                    "<td>Voltage d'entré : "+d.o+'</td>'+
                    '<td>Voltage de sortie : '+d.p+'</td>'+
                    '<td>Voltage de charge : '+d.q+'</td>'+
                    '<td>Puissance de chargement : '+d.r+'</td>'+
                    '<td>Résistance compatible : '+d.s+'</td>'+
                    '<td>Capacité : '+d.t+'</td>'+
                    '<td>Longueur : '+d.u+'</td>'+
                '</tr><tr>'+
                    "<td>Diametre : "+d.v+'</td>'+
                    '<td>Résistance : '+d.w+'</td>'+
                    '<td>Remplissage: '+d.x+'</td>'+
                    '<td>Airflow : '+d.y+'</td>'+
                    // '<td>Résistance compatible : '+d.z+'</td>'+
                '</tr>'+
        '</table>';
        }
    }

    const table = $('#myTable').DataTable({
        "language": {
            "searchPlaceholder": "Recherche",
            "search":"",
            "paginate":{
                "previous":"Précédant",
                "next":"Suivant",
            },
            "info":"Affiche _START_ sur _END_ total _TOTAL_",
            "lengthMenu":"Affiche _MENU_ lignes"
        },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            {"data": "id"},
            {"data": "Type"},
            {"data": "Prix"},
            {"data": "Image"},
            {"data": "Nouveauté"},
            {"data": "Modifier"},
            {"data": "Supprimer"},
            {"data": "a"},
            {"data": "b"},
            {"data": "c"},
            {"data": "d"},
            {"data": "e"},
            {"data": "f"},
            {"data": "g"},
            {"data": "h"},
            {"data": "i"},
            {"data": "j"},
            {"data": "k"},
            {"data": "l"},
            {"data": "m"},
            {"data": "n"},
            {"data": "o"},
            {"data": "p"},
            {"data": "q"},
            {"data": "r"},
            {"data": "s"},
            {"data": "t"},
            {"data": "u"},
            {"data": "v"},
            {"data": "w"},
            {"data": "x"},
            {"data": "y"},
            {"data": "z"},
        ],
    });
    $('#myTable tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected');
        const pos = table.row(this).index();
        const row = table.row(pos).data();
    });
      // Add event listener for opening and closing details
    $('#myTable tbody').on('click', 'td.details-control', function () {
        const tr = $(this).closest('tr');
        const row = table.row(tr);

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
    $('#button').click(function() {
        const oData = table.rows('.selected').data();

        let data = '';
        for (let i = 0; i < oData.length; i++) {
            data += i + '=' + oData[i]["id"] + '&'
        }
        $.ajax({
            type: "GET",
            url: "/product/deleteSome",
            enctype: 'multipart/form-data',
            data: data,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown){
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            alertSuccess("Tous les produits séléctionné ont été supprimé !");
            setTimeout(function() {
                document.location.href = "/products/show";
            }, 3000)
        })
    })
    document.getElementById('eliquid_submit').addEventListener('click', function(event) {
        event.preventDefault();
        const form2 = $('#eliquidForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        $.ajax({
            type: "POST",
            url: "/product/traitementeliquid",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    });
    document.getElementById('ecig_submit').addEventListener('click', function(event) {
        event.preventDefault();
        const form2 = $('#ecigForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        $.ajax({
            type: "POST",
            url: "/product/traitementecig",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    });
    document.getElementById('ato_submit').addEventListener('click', function(event) {
        event.preventDefault();
        const form2 = $('#atoForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        $.ajax({
            type: "POST",
            url: "/product/traitementato",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    });
    document.getElementById('accessory_submit').addEventListener('click', function(event) {
        event.preventDefault();
        const form2 = $('#accessoryForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        // console.log(productDone);
        $.ajax({
            type: "POST",
            url: "/product/traitementaccessory",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false,
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    });
    document.getElementById('diy_submit').addEventListener('click', function(event) 
    {
        event.preventDefault();
        const form2 = $('#diyForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        $.ajax({
            type: "POST",
            url: "/product/traitementdiy",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            alertFail();
            console.log(jqXHR, textStatus, errorThrown);
        })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    });
    $("#fullkit_addIndividual").change(function() {
        if(this.checked) {
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Nom Ecig</label><input type="text" name="EcigName" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Prix Ecig</label><input type="text" name="EcigPrice" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Marque Ecig</label><input type="text" name="EcigBrand" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Image Ecig</label><div class="custom-file"><input type="file" multiple="multiple" name="EcigImage[]" class="custom-file-input"></input><label lang="en" class="custom-file-label">Choisissez un fichier</label></div></div>');
            $('#fullkit_submit').parent().before('<div class="form-group"><div class="custom-control custom-switch" data-children-count="1"><input type="checkbox" id="EcigNew" name="EcigNew" class="custom-control-input" value="1"></input><label for="EcigNew" class="switch-custom custom-control-label">Nouveauté Ecig</label></div></div>');

           
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Nom Ato</label><input type="text" name="AtoName" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Prix Ato</label><input type="text" name="AtoPrice" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Marque Ato</label><input type="text" name="AtoBrand" class="form-control"></input></div>');
            $('#fullkit_submit').parent().before('<div class="form-group" data-children-count="1"><label>Image Ato</label><div class="custom-file"><input type="file" multiple="multiple" name="AtoImage[]" class="custom-file-input"></input><label lang="en" class="custom-file-label">Choisissez un fichier</label></div></div>');
            $('#fullkit_submit').parent().before('<div class="form-group"><div class="custom-control custom-switch" data-children-count="1"><input type="checkbox" id="AtoNew" name="AtoNew" class="custom-control-input" value="1"></input><label for="AtoNew" class="switch-custom custom-control-label">Nouveauté Ato</label></div></div>');


        }
    });
    document.getElementById('fullkit_submit').addEventListener('click', function(event)
    {
        event.preventDefault();
        if( $('#fullkit_addIndividual').is(':checked') ){
            ajaxProduct();
            ajaxProduct();
        }
        const form2 = $('#fullkitForm')[0];
        const formData2 = new FormData(form2);
        ajaxProduct();
        $.ajax({
            type: "POST",
            url: "/product/traitementfullkit",
            enctype: 'multipart/form-data',
            data: formData2,
            processData: false, //Important!
            contentType: false,
            cache: false
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
                alertFail();
                console.log(jqXHR, textStatus, errorThrown);
            })
        .done(function(data, textStatus, jqXHR) {
            if(productDone === true){
                alertSuccess("Le produit a bien été ajouté");
            }else{
                alertFail();
            }
        })
    })
    
    window.addEventListener("DOMContentLoaded", (event) => {
        $('.paginate_button').click(function(){
            modification();
        });
        modification();
    });
    function modification()
    {
        for (let i = 0; i < $('.update').length; i++) {
            // console.log($('#modif' + $('.update')[i].id.substr(5)));
            $('#modif' + $('.update')[i].id.substr(5)).on('shown.bs.modal', function(e) {
                document.getElementById('updatemodalsubmit' + $('.update')[i].id.substr(5)).addEventListener('click', function() {
                    const id = document.getElementById('updatemodalsubmit' + $('.update')[i].id.substr(5)).getAttribute('productId');
                    const updateForm = $('#editProduct' + $('.update')[i].id.substr(5))[0];
                    const updateFormData = new FormData(updateForm);
                    $.ajax({
                        type: "POST",
                        url: "/product/traitementUpdate",
                        enctype: 'multipart/form-data',
                        data: updateFormData,
                        processData: false, //Important!
                        contentType: false,
                        cache: false
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        alertFail();
                        console.log(jqXHR, textStatus, errorThrown);
                    })
                    .done(function(data, textStatus, jqXHR) {
                        const updateFormSpe = $('#editSpe' + $('.update')[i].id.substr(5))[0];
                        const updateFormSpeData = new FormData(updateFormSpe);
                        $.ajax({
                            type: "POST",
                            url: "/product/traitementUpdateSpe",
                            enctype: 'multipart/form-data',
                            data: updateFormSpeData,
                            processData: false, //Important!
                            contentType: false,
                            cache: false
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            alertFail();
                            console.log(jqXHR, textStatus, errorThrown);
                        })
                        .done(function(data, textStatus, jqXHR) {
                            alertSuccess("Le produit a bien été modifié");
                            setTimeout(function() {
                                document.location.href = "/products/show";
                            }, 3000)
                        })
                    })  
                });
            });
        }
    }
    function deleteOne(){
        document.getElementsByName('delete').forEach(element => {
            // if (document.getElementById('delete') != null) {
                element.addEventListener('click', function() {
                    const id = element.getAttribute('productid');
                    if (confirm('Etes-vous sûr de vouloir supprimmer ce produit ?')) {
                        $.ajax({
                            type: "POST",
                            url: "/product/delete/" + id,
                            enctype: 'multipart/form-data',
                            data: '',
                            processData: false, //Important!
                            contentType: false,
                            cache: false
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            alert('fail');
                            console.log(jqXHR, textStatus, errorThrown);
        
                        })
                        .done(function(data, textStatus, jqXHR) {
                            alertSuccess('La suppression de ce produit a bien été effectué !')
                        })
                        setTimeout(function() {
                            document.location.href = "/products/show";
                        }, 3000)
                    }
                });
            // }
        });
    }
    deleteOne();
    document.querySelectorAll('.paginate_button').forEach(element => {
        element.addEventListener('click', function(){
            deleteOne();
        })
    })
});