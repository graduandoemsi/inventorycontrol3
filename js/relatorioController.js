var RelatorioController = {
    init: function () {

        RelatorioController.setForm();
    },
    setForm: function () {
        RelatorioController.getReport();
        google.load("visualization", "1.1", {packages: ["bar"]});
       // google.setOnLoadCallback(addToHtml);
    },
    getReport: function () {

        RelatorioService.minimumInventory(function (response) {
            RelatorioController.addToHtml(response);
        });



    },
    addToHtml: function (response) {
        var Data = new google.visualization.DataTable();

        Data.addColumn('string', 'Descrição');
        Data.addColumn('string', 'Quantidade');

        for (var i = 0; i < response.length; i++) {
            Data.addRow([response[i].descricao, response[i].quantidade]);
        }

        var options = {
            title: 'Estoque mínimo',
            width: 900,
            legend: {position: 'none'},
            chart: {subtitle: 'Produtos por quantidade'},
            axes: {
                x: {
                    0: {side: 'top', label: 'Estoque'} // Top x-axis.
                }
            },
            bar: {groupWidth: "90%"}
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(Data, google.charts.Bar.convertOptions(options));

    },
}
RelatorioController.init();

