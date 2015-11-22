
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
           if(result.resposta==false){
               UsuarioController.showResult(result);
        
       }else{
             UsuarioController.redirect(result);
       }
            }; 
            
       UserService.login(usuario,callback);
    },
    showResult:function (data){
         document.getElementById("response").innerHTML = data.mensagem;  
    },
    redirect:function (result){
         window.location=result.url;
    }
    
    
}
UsuarioController.init();


