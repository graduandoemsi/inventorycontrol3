var registerUser ={
    
    init:function(){
        registerUser.setForm();
         
    },
    setForm:function(){
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          registerUser.adicionar(form);
          event.preventDefault();
          });
    },
     setSelect: function () {
        var select = document.getElementById("catUsers");

        select.addEventListener('change', function (event) {
            var categoryId = $('#catUsers').children(":selected").attr("id");
            EntradaProdutoController.showProducts(categoryId);
        });
    },   
    adicionar:function(form){
      var user ={
            //idUsuario:form.v,
            login:form.login.value,
            password:form.password.value,
            categoria:form.categoria.value
            
        };
      form.reset();
       var callback = function(result){
            registerUser.showResult(result);
       }; 
        
          
       userService.add(user,callback);
    },
    showResult:function(){
        document.getElementById("resposta").innerHTML = data.mensagem;
    }
    
    /*showProducts:function (){
            ProdutoService.getProductsActive(function(products) {
            CadastroUsuario.addToHTML(products,"#products");
       });      
    },*/
    /*
    addToHTML: function (data,id) {        
            $select = $(id);           
            $.each(data, function(key,val){
                 $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
            });
    }*/
        
}

registerUser.init();

