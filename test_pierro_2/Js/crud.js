$(function() {
    load_datatable()
    handlers()

})

function handlers() {
    //---------------------------------------------Handler pour supprimer une recette
    $('body').on('click', '.supp', (e) => {
        //console.log('bouton supp')
        let id = $(e.currentTarget).attr('data-id')
        console.log(id)
        $.post("ajax/ajax.php", {
            a: 'supprimer_recette',
            id: id,

        }, (data) => {
            if (data) {
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")

    })
    //------------------------------------------------------------Handler pour lister les patissier lors de l'ajout
    $('body').on('click', '.ajoutRec', (e) => {

        $.post("ajax/ajax.php", {
            a: 'liste_patissier',

        }, (data) => {
            if (data) {
                aff =''
                aff += '<select name="patissier" class= "patissier form-control" id="pat-select">'
                $(data).each(function(i,e) {
                    aff +='<option value="'+e.id+'">'+e.nom+'</option>'
                });
                $('.patissierAjout').html(aff)
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")
    })
    //------------------------------------------------------------Handler pour ajouter une recette
    $('body').on('click', '.ajouterRecette', (e) => {
        $('.modal-title').text('Ajouter une recette')
        //console.log('bouton ajouter re cette')
        let nom = $('.nom').val()
        let type = $('.type').val()
        let recette = $('.recette').val()
        if (recette === '') {
            recette = "-"
        }
        let farine = $('.farine').val()
        if (farine === '') {
            farine = "-"
        }
        let patissier = $('.patissier').val()
        if (patissier === '') {
            patissier = "-"
        }

        $.post("ajax/ajax.php", {
            a: 'ajouter_recette',
            nom: nom,
            type: type,
            recette: recette,
            farine: farine,
            patissier: patissier,

        }, (data) => {
            if (data) {
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")
        $.post("ajax/ajaxAdmin.php", {
            a: 'infos_patissier',

        }, (data) => {
            if (data) {
                aff =''
                aff += '<select name="patissier" class= "form-control" id="pat-select">'
                $(data.nomPatissier).each(function(i,e) {
                    aff +='<option value="'+e.id+'">'+e.nom+'</option>'
                });
                $('.patissierAjout').html(aff)
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")

    })
    //--------------------------------------------------------Handler pour recuperer les infos d'une recette
    $('body').on('click', '.myBtn-edit', (e) => {
        let id = $(e.currentTarget).attr('data-id')
        //console.log('je click sur le bouton edit' +id)
        $('.modal-edit').css("display", "block")
        $.post("ajax/ajax.php", {
            a: 'infos_recette',
            id: id,

        }, (data) => {
            if (data) {
console.log(data)
                aff =''
                aff += '<select name="patissier" class= "patissierEditer form-control" id="pat-select">'
                $(data.nomPatissier).each(function(i,e) {
                    var selected = (data.patissierId === e.id) ? "selected" : ""
                    aff +='<option value="'+e.id+'" '+selected+'>'+e.nom+'</option>'
                });
                aff += '</select>'
                $('.divCachee').val(data.id)
                $('.nomEditer').val(data.nom)
                $('.typeEditer').val(data.type)
                $('.recetteEditer').val(data.recette)
                $('.farineEditer').val(data.farine)
                $('.patissierEditer').html(aff)
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")


    })
    //----------------------------------------------------------------------
    $('body').on('click', '.close-edit', (e) => {
        let id = $(e.currentTarget).attr('data-id')
        $('.modal-edit').css("display", "none")
    })
    //--------------------------------------------------------Handler pour editer une recette
    $('body').on('click', '.edit-Recette', (e) => {

        let id = $('.divCachee').val()
        let nom = $('.nomEditer').val()
        let type = $('.typeEditer').val()
        let recette = $('.recetteEditer').val()
        if (recette === '') {
            recette = "-"
        }
        let farine = $('.farineEditer').val()
        if (farine === '') {
            farine = "-"
        }
        let patissier = $('.patissierEditer :selected').val()


        $.post("ajax/ajax.php", {
            a: 'editer_recette',
            id: id,
            nom: nom,
            type: type,
            recette: recette,
            farine: farine,
            patissier: patissier,

        }, (data) => {
            if (data) {
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")
        $('.modal-edit').css("display", "none")
    })
}
// récuperation des données pour le datatable

function load_datatable() {
    let idSession = $('#getIdSession').val()
    //console.log(idSession)
    $('#datatable').DataTable({

        ajax: {
            url: "ajax/ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                a: 'getAllrecette'
            },

            dataType: 'json',
            render: function(data, type, row) {

            }

        },
        createdRow: function(row, data, dataIndex) {
            //console.log(data)
            if (data.patissierId == idSession) {
                $(row).addClass('bg-secondary');
            }
        },

        //dataType: 'json',
        columns: [

            {
                "title": "ID",
                "data": "id"
            },
            {
                "title": "Nom",
                "data": "nom"
            },
            {
                "title": "Type",
                "data": "type"
            },
            {
                "title": "Recette",
                "data": "recette"
            },
            {
                "title": "Farine",
                "data": "farine"
            },
            {
                "title": "Patissier",
                "data": "nomPatissier"
            },
            {
                "title": "Editer",
                "data": "id"
            },
            {
                "title": "Supprimer",
                "data": "id"
            },
        ],
        columnDefs: [
            {
                targets: 6,
                createdCell: function(td, cellData, rowData, row, col) {

                    $(td).html('<button id="" type="button" class="btn btn-success btn-sm edit myBtn-edit" data-id="' + rowData.id + '">Editer</button>')
                }
            },

            {
                targets: 7,
                createdCell: function(td, cellData, rowData, row, col) {

                    $(td).html('<div class="btn btn-danger supp btn-sm" data-id="' + rowData.id + '">Supprimer</div>')
                }
            }
        ]

    });

}