var RemoveUserController = {
    init: function () {
        RemoveUserController.setForm();
        RemoveUserController.showUsers();
    },
    setForm: function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            RemoveUserController.remove(form);
            event.preventDefault();
        });

    },
    remove: function (form) {
       
            var id= $("#users").children(":selected").attr("id");

        
        var callback = function (result) {
            RemoveUserController.showUsers();
            RemoveUserController.showResult(result);
        };

        UserService.remove(id, callback);
        form.reset();

    },
    showUsers: function () {
        UserService.getUsers(function (user) {
            RemoveUserController.addToHTML(user, "#users");
        });
    },
    addToHTML: function (data, id) {
        $select = $(id);
         $('#users option[value!=""]').remove();
        $.each(data, function (key, val) {
            $select.append('<option id="' + val.id + '">' + val.login + '</option>');
        });
    },
    showResult: function (data) {

        document.getElementById("result").innerHTML = data;
    }

}

RemoveUserController.init();

