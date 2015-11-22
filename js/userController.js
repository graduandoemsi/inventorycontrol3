var registerUserController = {
    init: function () {
         registerUserController.showCategory();
        registerUserController.setForm();
       
    },
    setForm: function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            registerUserController.adicionar(form);
            event.preventDefault();
        });
    },
    adicionar: function (form) {
        var user = {
            
            login: form.login.value,
            senha: form.password.value,
            categoria_id: $("#catUsers").children(":selected").attr("id"),

        };
        form.reset();
        var callback = function (result) {
            registerUserController.showResult(result);
        };


     UserService.add(user, callback);
    },
    showCategory: function () {
        UserService.getCategoryUser(function (categories) {
            registerUserController.addToHTML(categories, "#catUsers");
        });
  },
    showResult: function (data) {
        document.getElementById("resposta").innerHTML = data.mensagem;
    },
    /*showProducts:function (){
     ProdutoService.getProductsActive(function(products) {
     CadastroUsuario.addToHTML(products,"#products");
     });      
     },*/


    addToHTML: function (data, id) {
        $select = $(id);
        $.each(data, function (key, val) {
            $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
        });
    }

}

registerUserController.init();

