var CategoriaService={
    
    GetCategory:function(callback){
    
    
    //method get 

    $.ajax({
            type: 'GET',
	    url: '../api/categories',
	    dataType: "json", 
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         });    
    
    },
    AddCategory:function(category, callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: '../api/category',
            dataType: "json",
            data: JSON.stringify({descricao:category}),
            success: function (data) {
                console.log('Categoria criada com sucesso!');
                callback(data);
            },
            error: function () {
                //console.log('Error: ' + textStatus);
                callback(null);
            }
        });        
        
    }
}
