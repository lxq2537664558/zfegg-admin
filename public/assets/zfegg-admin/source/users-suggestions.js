define(
    [
        'kendo',
        'zfegg/config',
        'zfegg/kendo/restful-data-source'
    ],
    function(kendo, config, Restful) {
        'use strict';

        var restUrl = config.baseUrl + '/zfegg-admin/users/suggestions';
        return new Restful({
            url: restUrl,
            schema: {
                model: {
                    id: "user_id",
                    fields: {
                        user_id: {type: "number", editable: false, nullable: true},
                        username: {validation: {required: true}},
                        real_name: {validation: {required: true}},
                        email: {validation: {email: true, required: true}},
                        status: {defaultValue: 0}
                    }
                }
            },
        });
    });