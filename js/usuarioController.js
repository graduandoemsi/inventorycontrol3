
var UsuarioController={
    init:function(){
        UsuarioController.setForm();
    },
    setForm:function(){
        var form= document.querySelector('form');
         form.addEventListener('submit', function(event) {
          UsuarioController.getData();
          event.preventDefault();
          });
        
    },
    getData:function(){
        var usuario ={
          login:$('#login').val(),
          senha:$('#senha').val()                    
      }
       var callback=function (result){
            //EntradaProdutoController.showResult(result);
           // alert("teste");
            }; 
            
       UserService.login(usuario,callback);
    }
    
    
}
UsuarioController.init();


