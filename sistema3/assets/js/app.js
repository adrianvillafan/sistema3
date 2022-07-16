 Util = {
    createGrid: function(id, options) {        
        var toolButons = options.toolButons || '';
        var extraOptions = options.extraOptions || {};
        
        var configGrid = {
            "destroy": true,
            "language": {
                "loadingRecords": '<img src="images/profile-loading.gif">',
                "zeroRecords": "No se Encontraron Resultados",
                paginate: {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "search": "",
                searchPlaceholder: 'Buscar..',
                "info": '<div style="margin:0px 0px 0px 0px;">Mostrando p&aacute;gina _PAGE_ de _PAGES_</div>',
                "infoEmpty": "No se encontraron resultados",
                "lengthMenu": '<div> ' + toolButons +
                '<select id="selPagination" style="display:inline-block;margin-top:0px;margin-left:5px;padding:6px;border:1px #E1E1E1 solid;">' +
                '<option value="6">6</option>' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select> </div>'
            },
            "ajax": {
                "url": options.url,
                "dataSrc": ""
            },
            "fnDrawCallback": options.fnDrawCallback || function(oSettings) {

            },
            "aoColumns": options.columns
        };

        $.extend(configGrid, extraOptions);

        var datatable = $(id).dataTable(configGrid);

        $(id + ' tbody').on('click', 'tr', function() {

            $('.selectedRowTable').each(function() {
                $(this).removeClass('selectedRowTable');
            });

            $(this).find('td').addClass('selectedRowTable');

        });
        
        return datatable;
    }
};