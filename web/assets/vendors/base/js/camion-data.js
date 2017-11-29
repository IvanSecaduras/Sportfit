var Datatable = function () {
    var t = function () {
        var t = $(".tabla_camion").mDatatable({

            data: {
                type: "remote",
                source: {
                    read: {
                        url: "get/camiones"
                    }
                },
                pageSize: 10,
                saveState: {cookie: !0, webstorage: !0},
                serverPaging: !0,
                serverFiltering: !0,
                serverSorting: !0
            },
            layout: {theme: "default", class: "", scroll: !1, footer: !1},
            sortable: !0,
            filterable: !1,
            pagination: !0,
            columns: [{
                field: "id",
                title: "#",
                width: 50,
                sortable: !1,
                selector: !1,
                textAlign: "center",
                template: function (row) {
                    return row.getIndex() + 1;
                }
            }, {
                field: "marca",
                title: "Marca"
            }, {
                field: "modelo",
                title: "Modelo"
            }, {
                field: "matricula",
                title: "Matrícula"
            }, {
                field: "usuario",
                title: "Usuario",
                template: function (data) {
                    if (data.usuario != null) {
                        return data.usuario;
                    } else {
                        return 'Ninguno';
                    }
                }
            }, {
                field: "Actions",
                width: 110,
                title: "Acciones",
                sortable: !1,
                overflow: "visible",
                template: function (data) {
                    return '\t\t\t\t\t\t<a href="#" onclick="edit_ajax(' + data.id + ')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">' +
                        '\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>' +
                        '\t\t\t\t\t\t<a href="camion/eliminar/' + data.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Borrar">' +
                        '\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'
                }
            }],
            translate: {
                records: {processing: "Cargando...", noRecords: "No se encontraron camiones."},
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: "Primero",
                                prev: "Anterior",
                                next: "Siguiente",
                                last: "Último",
                                more: "Más páginas",
                                input: "Número de página",
                                select: "Seleccionar tamaño de página"
                            }, info: "Viendo {{start}} - {{end}} de {{total}} registros"
                        }
                    }
                }
            }

        }),e = t.getDataSourceQuery();
        $("#generalSearch").on("keyup", function (e) {
            var a = t.getDataSourceQuery();
            a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
        }).val(e.generalSearch)
    };

    return {
        init: function () {
            t()
        }
    }
}();
jQuery(document).ready(function () {
    Datatable.init();
});

function edit_ajax(id){
    $.ajax({
        type: "GET",
        url: "camion/editar/" + id,
        success: function (r) {
            $("#editar_camion").html(r);
            $("#editar_camion").modal("show");
        }
    });
}