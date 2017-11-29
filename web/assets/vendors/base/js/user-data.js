var Datatable = function () {
    var t = function () {
        var t = $(".tabla_usuario").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        url: "get/usuarios"
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
                field: "username",
                title: "Nombre"
            }, {
                field: "email",
                title: "Email",
                responsive: {visible: "lg"}
            }, {
                field: "telefono",
                title: "Teléfono"
            }, {
                field: "roles",
                title: "Cargo",
                responsive: {visible: "lg"},
                template: function (data) {
                    if (data.roles == 'ROLE_CHOFER') {
                        return 'Chofer';
                    } else if (data.roles == 'ROLE_LOGISTICA') {
                        return 'Logística';
                    } else {
                        return 'Error';
                    }
                }
            }, {
                field: "camion",
                title: "Camión",
                template: function (data) {
                    if (data.camion == null) {
                        return 'Ninguno';
                    } else {
                        return data.camion;
                    }
                }
            }, {
                field: "lastLogin",
                title: "Último acceso",
                template: function (data) {
                    if (data.lastLogin == null) {
                        return 'Nunca';
                    } else {
                        var fecha = new moment(data.lastLogin.date);
                        return fecha.format('DD/MM/YYYY h:mm:ss');
                    }
                }
            }, {
                field: "Actions",
                width: 110,
                title: "Acciones",
                sortable: !1,
                overflow: "visible",
                template: function (data) {
                    return '\t\t\t\t\t\t<a href="usuario/editar/' + data.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Editar">' +
                        '\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>' +
                        '\t\t\t\t\t\t<a href="usuario/eliminar/' + data.id + '" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Borrar">' +
                        '\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'
                }
            }],
            translate: {
                records: {processing: "Cargando...", noRecords: "No se encontraron usuarios."},
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

        }), e = t.getDataSourceQuery();
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
    moment.locale('es');
    Datatable.init();
});