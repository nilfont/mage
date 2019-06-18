jQ(document).ready(function () {
    let adminRolesDatatable = jQ('#mage-roles-datatable');
    adminRolesDatatable.DataTable({
        processing: true,
        serverSide: true,
        ajax: route('mage.roles.list').url(),
        deferRender: true,
        rowId: 'id',
        language: { 'url': route('mage.datatables.i18n') },
        paging: true,
        lengthChange: true,
        lengthMenu: [10, 25, 50, 100],
        pageLength: 50,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        scrollX: true,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: null, searchable: false, orderable: false, render: function(data, type, row) {
                return "" +
                "<div class=\"btn-group\" role=\"group\">" +
                  "<a href=\"" + route('mage.roles.show', { id: data.id }) + "\">" +
                    "<button type=\"button\" class=\"btn btn-default btn-sm\" data-toggle=\"tooltip\">\n" +
                      "<i class=\"fa fa-eye\"></i>" +
                    "</button>" +
                  "</a>" +
                  "<a href=\"" + route('mage.roles.edit', { id: data.id }) + "\">" +
                    "<button type=\"button\" class=\"btn btn-default btn-sm\" data-toggle=\"tooltip\">\n" +
                      "<i class=\"fa fa-pen\"></i>" +
                    "</button>" +
                  "</a>" +
                  "<a class=\"mage-roles-delete-btn\" data-id=\"" + data.id + "\">" +
                    "<button type=\"button\" data-id=\"" + data.id + "\" class=\"btn btn-default btn-sm\" data-toggle=\"tooltip\">\n" +
                      "<i data-id=\"" + data.id + "\" class=\"fa fa-trash\"></i>" +
                    "</button>" +
                  "</a>" +
                "</div>";
                }
            }
        ]
    });

    jQadminRolesDatatable.on('click', '.mage-roles-delete-btn', function(e) {
        let id = jQ(e.target).attr('data-id');
        let locale = adminRolesDatatable.dataTableSettings[0].oLanguage.sweetAlert.roles;

        mage.deleteAlert(id, adminRolesDatatable, 'mage.roles.destroy', locale);
    });
});
