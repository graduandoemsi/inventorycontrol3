var UserService = {
    add: function (user, callback) {
        
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: '../api/users/register',
            dataType: "json",
            data: JSON.stringify(user),
            success: function (user) {
                console.log('User added successfully');
                callback(user);
            },
            error: function () {
                //console.log('Error: ' + textStatus);
                callback(null);
            }
        });


   },
    login: function (usuario,callback) {
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/users/login',
            dataType: "json",
            data: JSON.stringify(usuario),
            success: function (usuario) {
                console.log('User connected successfully');
                callback(usuario);
            },
            error: function () {
                //console.log('Error: ' + textStatus);
                callback(null);
            }
        });

    },
    getCategoryUser:function (callback){
            $.ajax({
            type: 'GET',
	    url: '../api/categories/user',
	    dataType: "json", 
	    success: function(response) {
            callback(response);
            
            },
            error:function (){
                callback(null);
            }
           
         });
    }

};