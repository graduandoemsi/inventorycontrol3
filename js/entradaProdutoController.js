var EntradaProdutoController = {
    init: function () {
        EntradaProdutoController.setForm();
        EntradaProdutoController.setSelect();
        EntradaProdutoController.showCategory();

    },
    setForm: function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            EntradaProdutoController.decrementInventory(form);
            event.preventDefault();
        });
        document.form.reset();
    },
    setSelect: function () {
        var select = document.getElementById("catProdutos");

        select.addEventListener('change', function (event) {
            var categoryId = $('#catProdutos').children(":selected").attr("id");
            EntradaProdutoController.showProducts(categoryId);
        });
    },
    decrementInventory: function (form) {
        var saidaProduto = {
            idProduto: $('#products').children(":selected").attr("id"),
            quantidade: $('#quantidade').val(),
            data: $('#data').val()
        }
        var callback = function (result) {
            EntradaProdutoController.showResult(result);
        };

        EntradaProdutoService.add(saidaProduto, callback);
    },
    showResult: function (data) {
        document.getElementById("resposta").innerHTML = data.mensagem;
    },
    showCategory: function () {
        CategoriaService.GetCategory(function (categories) {
            EntradaProdutoController.addToHTML(categories, "#catProdutos");
        });
    },
    showProducts: function (categoryId) {
        $('#products option[value!=""]').remove();
        ProdutoService.getProductsCategory(function (products) {
            EntradaProdutoController.addToHTML(products, "#products");
        }, categoryId);
    },
    addToHTML: function (data, id) {
        $select = $(id);
        
        $select.append('<option id="0">Selecione</option>');
        $.each(data, function (key, val) {
            $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
        });
    },
    parentPage: function () {

        if (window.opener != null && !window.opener.closed) {
            window.opener.location.reload();
        }


    }

}

EntradaProdutoController.init();


