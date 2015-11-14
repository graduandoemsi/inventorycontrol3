var registerUser ={
    
    init:function(){
        registerUser.setForm();
        //CadastroUsuario.showProducts();
         
    },
    setForm:function(){
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          registerUser.adicionar(form);
          event.preventDefault();
          });
    },
    adicionar:function(form){
      var user ={
            //idUsuario:form.,
            login:form.login.value,
            password:form.password.value, 
            category:form.category.value
            
        };
      //alert(login.value + "\n" + password.value + "\n" + category.value);
       var callback=function (result){
            registerUser.showResult(result);
            }; 
            
       UserService.add(user,callback);
    },
    showResult:function(){
        
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

