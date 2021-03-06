var SaidaProdutoController ={
    
    init:function(){
        SaidaProdutoController.setForm();
        SaidaProdutoController.setSelect();
        SaidaProdutoController.showCategory();
      
    },
    setForm:function(){
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          SaidaProdutoController.decrementInventory(form);
          event.preventDefault();
          });
          
    },
    setSelect:function(){
      var select = document.getElementById("catProdutos");
      
      select.addEventListener('change',function(event){
         var categoryId= $('#catProdutos').children(":selected").attr("id");
         SaidaProdutoController.showProducts(categoryId);
      });
    
    },
    decrementInventory:function(form){
      var saidaProduto ={
          idProduto:$('#products').children(":selected").attr("id"),
          quantidade:$('#quantidade').val(),
          data:$('#data').val()          
      }
       var callback=function (result){
            SaidaProdutoController.showResult(result);
            }; 
            
       SaidaProdutoService.add(saidaProduto,callback);
         form.reset();
    },
    showResult:function(data){
         document.getElementById("resposta").innerHTML = data.mensagem;
    },
     showCategory:function (){
            CategoriaService.GetCategory(function(categories) {
            SaidaProdutoController.addToHTML(categories,"#catProdutos");
       });      
    },
    showProducts:function (categoryId){
         $('#products option[value!=""]').remove();
            ProdutoService.getProductsCategory(function(products) {
            SaidaProdutoController.addToHTML(products,"#products");
       },categoryId);      
    },
    addToHTML: function (data,id) {        
            $select = $(id);  
            $select.append('<option id="0">Selecione</option>');
            $.each(data, function(key,val){
                 $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
            });
    }
        
}

SaidaProdutoController.init();

