var ProdutoController ={
    //método de inicialização da página
    init:function(){
        ProdutoController.setForm(); 
        ProdutoController.showCategory();
        ProdutoController.showStatus();
    },
    //método para configurar paramentros da página
    setForm:function(){
        
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          ProdutoController.register();
          event.preventDefault();
      });
    },
    //método de chamada para cadastrar produto na base de dados
    register:function(){
          var produto = {
		descricao: $("#descricao").val(),
		status: $("#status").children(":selected").attr("id"),
                categoria:$('#categories').children(":selected").attr("id")
            };
            var callback=function (result){
                ProdutoController.showResult(result);
            }; 
            
            ProdutoService.add(produto,callback);
       
        
    },
    //Método de chamada para obter a lista de categorias de produtos
    showCategory:function (){
            CategoriaService.GetCategory(function(categories) {
            ProdutoController.addToHTML(categories,"#categories");
       });      
    },
      showStatus:function (){
            StatusService.getStatus(function(status) {
            ProdutoController.addToHTML(status,"#status");
       });      
    },
    
    //Método para popular a lista de categorias
    addToHTML: function (data,id) {        
            $select = $(id);           
            $.each(data, function(key,val){
                 $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
            });
	},
    showResult:function (data){
          
            document.getElementById("result").innerHTML = data.mensagem;  
        }
    
};
ProdutoController.init();


