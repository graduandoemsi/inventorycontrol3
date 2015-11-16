var EstoqueServices = {
    get: function (callback) {
        $.ajax({
            type: 'GET',
            url: '../api/inventories',
            dataType: "json",
            success: function (response) {
                callback(response);

            },
            error: function () {
                callback(null);
            }

        });

    }

}