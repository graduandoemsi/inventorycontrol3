var SaidaProdutoService={
    
        add:function(data,callback) {
        
        $.ajax({
			type: 'POST',
			contentType: 'application/json',
			url: '../api/outPutProducts',
			dataType: "json",
			data: JSON.stringify(data),
			success: function (data) {
				
				callback(data);
			},
			error: function () {
				//console.log('Error: ' + textStatus);
				callback(null);
			}
		});
        
        
    } 
    
}