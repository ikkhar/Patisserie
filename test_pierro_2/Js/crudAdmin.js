$(function() {
    load_datatableAdmin()
    handlers()

})

function handlers() {
    //---------------------------------------------Handler pour supprimer une recette
    $('body').on('click', '.suppPat', (e) => {
        console.log('bouton supp')
        let id = $(e.currentTarget).attr('data-id')
        console.log(id)
        $.post("ajax/ajaxAdmin.php", {
            a: 'supprimer_patissier',
            id: id,

        }, (data) => {
            if (data) {
                $('#datatableAdmin').DataTable().ajax.reload();
            } else {
                $('#datatableAdmin').DataTable().ajax.reload();
            }
        }, "json")

    })
    //------------------------------------------------------------Handler pour ajouter un patissier
    $('body').on('click', '.ajouterPatissier', (e) => {
        $('.modal-title').text('Ajouter une recette')
        //console.log('bouton ajouter re cette')
        let nom = $('.nom').val()
        let status = $('.status').val()
        let motDePasse = $('.motDePasse').val()

        switch (status) {
            case 'Admin':
                status = "1"
                break;
            default:
                status = "2"
                break;
        }


        $.post("ajax/ajaxAdmin.php", {
            a: 'ajouter_patissier',
            nom: nom,
            status: status,
            motDePasse: motDePasse


        }, (data) => {
            if (data.ajout == true) {
                $('#datatableAdmin').DataTable().ajax.reload();
            } else {
                $('#datatableAdmin').DataTable().ajax.reload();
            }
        }, "json")

    })

    //--------------------------------------------------------Handler pour recuperer les infos d'un patissier
    $('body').on('click', '.myBtn-editPat', (e) => {
        let id = $(e.currentTarget).attr('data-id')
        //console.log('je click sur le bouton edit' +id)
        $('.editPat-modal').css("display", "block")
        $.post("ajax/ajaxAdmin.php", {
            a: 'infos_patissier',
            id: id,

        }, (data) => {
            if (data) {
                switch (data.status) {

                    case '1':
                        data.status = "Admin"
                        break;
                    default:
                        data.status = "Patissier"
                        break;
                }
                $('.divCachee').val(data.id)
                $('.nomEditerPat').val(data.nom)
                $('.statusEditerPat').val(data.status)
                $('#datatable').DataTable().ajax.reload();
            } else {
                $('#datatable').DataTable().ajax.reload();
            }
        }, "json")


    })
    //----------------------------------------------------------------------
    $('body').on('click', '.close-editPat', (e) => {
        let id = $(e.currentTarget).attr('data-id')
        $('.editPat-modal').css("display", "none")
    })
    //--------------------------------------------------------Handler pour editer un patissier
    $('body').on('click', '.edit-Pat', (e) => {
        $('.modal-content-editPat').css("display", "none")
        let id = $('.divCachee').val()
        let nom = $('.nomEditerPat').val()
        let status = $('.statusEditerPat').val()
        switch (status) {
            case "Admin":
                status = "1"
                break;

            default:
                status = "2"
                break;

        }

        $.post("ajax/ajaxAdmin.php", {
            a: 'editer_patissier',
            id: id,
            nom: nom,
            status: status,



        }, (data) => {
            if (data) {
                $('#datatableAdmin').DataTable().ajax.reload();
            } else {
                $('#datatableAdmin').DataTable().ajax.reload();
            }
        }, "json")
        $('.modal-edit').css("display", "none")
    })
}

function load_datatableAdmin() {
    console.log('dans load datatable')
    //let idSession = $('#getIdSession').val()
    //console.log(idSession)
    $('#datatableAdmin').DataTable({

        ajax: {
            url: "ajax/ajaxAdmin.php",
            dataSrc: '',
            type: "POST",
            data: {
                a: 'getAllPatissier'
            },

            dataType: 'json',
            render: function(data, type, row) {

            }

        },

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
                "title": "Status",
                "data": "status"
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
        columnDefs: [{
            targets: 2,
            createdCell: function(td, cellData, rowData, row, col) {
                switch (rowData.status) {
                    case '1':
                        $(td).html('<div>Admin</div>')
                        break;
                    case '2':
                        $(td).html('<div>Patissier</div>')
                        break;
                    default:
                        $(td).html('<div>-</div>')
                        break;
                }
            }
        },

            {
                targets: 3,
                createdCell: function(td, cellData, rowData, row, col) {

                    $(td).html('<button id="" type="button" class="btn btn-success btn-sm editPat myBtn-editPat" data-id="' + rowData.id + '">Editer</button>')
                }
            },

            {
                targets: 4,
                createdCell: function(td, cellData, rowData, row, col) {

                    $(td).html('<div class="btn btn-danger suppPat btn-sm" data-id="' + rowData.id + '">Supprimer</div>')
                }
            }
        ]

    });

}