var EntradaProdutoController ={
    
    init:function(){
        EntradaProdutoController.setForm();
        EntradaProdutoController.setSelect();
       // SaidaProdutoController.showProducts();
        EntradaProdutoController.showCategory();
      
    },
    setForm:function(){
          var form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
          EntradaProdutoController.decrementInventory(form);
          event.preventDefault();
          });
          
    },
    setSelect:function(){
      var select = document.getElementById("catProdutos");
      
      select.addEventListener('change',function(event){
         var categoryId= $('#catProdutos').children(":selected").attr("id");
         EntradaProdutoController.showProducts(categoryId);
      });
    },
    decrementInventory:function(form){
      var saidaProduto ={
          idProduto:$('#products').children(":selected").attr("id"),
          quantidade:$('#quantidade').val(),
          data:$('#data').val()          
      }
       var callback=function (result){
            EntradaProdutoController.showResult(result);
            }; 
            
       EntradaProdutoService.add(saidaProduto,callback);
    },
    showResult:function(){
        
    },
     showCategory:function (){
            CategoriaService.GetCategory(function(categories) {
            EntradaProdutoController.addToHTML(categories,"#catProdutos");
       });      
    },
    showProducts:function (categoryId){
         $('#products option[value!=""]').remove();
            ProdutoService.getProductsCategory(function(products) {
            EntradaProdutoController.addToHTML(products,"#products");
       },categoryId);      
    },
    addToHTML: function (data,id) {        
            $select = $(id);  
           
            $.each(data, function(key,val){
                 $select.append('<option id="' + val.id + '">' + val.descricao + '</option>');
            });
    }
        
}

EntradaProdutoController.init();


