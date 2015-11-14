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
        alert("aqui");
        
        var callback=function (result){
            CadastroCategoriaController.showResult(result);
        }; 
            
        CategoriaService.add(categoria,callback); 
    },
    showResult:function(){
        
    }
   
    
    
}

CadastroCategoriaController.init();
