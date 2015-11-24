var ActiveProductController = {
    init: function () {
        ActiveProductController.setForm();
        ActiveProductController.showProducts();
    },
    setForm: function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            ActiveProductController.put(form);
            event.preventDefault();
        });

    },
    put: function (form) {
       
            var id= $("#products").children(":selected").attr("id");

        
        var callback = function (result) {
            ActiveProductController.showProducts();
            ActiveProductController.showResult(result);
        };

        ProdutoService.update(id, callback);
        form.reset();

    },
    showProducts: function () {
        ProdutoService.getProductsInactive(function (products) {
            ActiveProductController.addToHTML(products, "#products");
        });
    },
    addToHTML: function (data, id) {
        $select = $(id);
         $('#products option[value!=""]').remove();
        $.each(data, function (key, val) {
            $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
        });
    },
    showResult: function (data) {

        document.getElementById("result").innerHTML = data;
    }

}

ActiveProductController.init();

