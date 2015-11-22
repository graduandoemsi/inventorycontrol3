

var RelatorioService = {
    
    minimumInventory:function(callback){
            $.ajax({
                    type: 'GET',
                    url: '../api/report/minimuminventory',
                    dataType: "json",
                    success: function (response) {
                       callback(response);
                    },
                    error: function () {
                        callback(null);
                    }

                });
    }
    
};


