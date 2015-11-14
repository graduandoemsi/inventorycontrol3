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
    
    }
}
