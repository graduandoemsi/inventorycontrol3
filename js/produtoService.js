var ProdutoService = {
    add: function (data, callback) {

        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: '../api/products',
            dataType: "json",
            data: JSON.stringify(data),
            success: function (data) {
                console.log('Product created successfully');
                callback(data);
            },
            error: function () {
                //console.log('Error: ' + textStatus);
                callback(null);
            }
        });


   },
    getProductsInactive: function (callback) {
        $.ajax({
            type: 'GET',
	    url: '../api/products/inactive',
	    dataType: "json", 
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         }); 

    },
   
    getProductsActive: function (callback) {
        $.ajax({
            type: 'GET',
	    url: '../api/products',
	    dataType: "json", 
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         }); 

    },
     getProductsCategory: function (callback,categoryId) {
        $.ajax({
            type: 'GET',
	    url: '../api/products/category'+'/'+categoryId,
	    dataType: "json", 
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         }); 

    },
    update:function (id,callback){
         $.ajax({
            type: 'PUT',
	    url: '../api/products/enable/'+id,	    
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         }); 
    }




};


