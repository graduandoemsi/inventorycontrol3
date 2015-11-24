
var UsuarioController={
    init:function(){
        UsuarioController.setForm();
    },
    setForm:function(){
        var form= document.querySelector('form');
         form.addEventListener('submit', function(event) {
          UsuarioController.getData(form);
          event.preventDefault();
          });
        
    },
    getData:function(form){
        var usuario ={
          login:$('#login').val(),
          senha:$('#senha').val()                    
        }
        var callback=function (result){
            if(result.resposta==false){
                UsuarioController.showResult(result);

            }else{
                  UsuarioController.redirect(result);
            }
    }; 
            
       UserService.login(usuario,callback);
      form.reset();
    },
    showResult:function (data){
         document.getElementById("response").innerHTML = data.mensagem;  
    },
    redirect:function (result){
         window.location=result.url;
    }
    
    
}
UsuarioController.init();


