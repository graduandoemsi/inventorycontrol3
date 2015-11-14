var StatusService ={
    
    getStatus:function (callback){
         $.ajax({
            type: 'GET',
	    url: '../api/statusProducts',
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