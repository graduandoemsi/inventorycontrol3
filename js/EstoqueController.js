var EstoqueController = {
    init: function () {
        EstoqueController.getEstoque();
        EstoqueController.setButton();
    },
    setButton: function () {
        var btnEntradaProduto = document.getElementById('entrada');
        btnEntradaProduto.addEventListener("click", function() {
            EstoqueController.showPoupUp("../html/entrada_produto.html")
            
        });
        
        var btnSaidaProduto = document.getElementById('saida');
        btnSaidaProduto.addEventListener("click", function() {
            EstoqueController.showPoupUp("../html/saida_produto.html")
            
        });

    },
    getEstoque: function () {
         $('#estoque').empty();
         
        
         EstoqueServices.get(function(estoque){
             EstoqueController.addToHtml(estoque);
         });
        
    },
    addToHtml: function (data) {

        for (var i = 0; data.length > i; i++) {
            //Adicionando registros retornados na tabela
            $('#estoque').append('<tr><td>' + data[i].descricao + '</td><td>' + data[i].quantidade + '</td></tr>');
        } 
        
       // $('#estoque').DataTable(data);

    },
    showPoupUp:function (url){
        popup = window.open(url, "Popup", "toolbar=no,scrollbars=no,location=no,statusbar=no,menubar=no,resizable=0,width=876,height=440,left = 490,top = 262");
        popup.focus();
    }

}

EstoqueController.init();