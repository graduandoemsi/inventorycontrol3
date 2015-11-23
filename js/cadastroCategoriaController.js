var CadastroCategoriaController = {
    init: function(){
        CadastroCategoriaController.setForm();
    },
    setForm:function(){
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          CadastroCategoriaController.add(form);
          event.preventDefault();
          });        
    },
    add:function(){
        var categoria = document.getElementById("descricao").value;
       
        
        var callback=function (result){
            CadastroCategoriaController.showResult(result);
        }; 
            
        CategoriaService.AddCategory(categoria,callback); 
        document.form.reset();
    },
    showResult:function(data){
        document.getElementById("resposta").innerHTML = data.mensagem; 
    }
   
    
    
}

CadastroCategoriaController.init();
