define(
    [
        'kendo',
        'zfegg/config',
        'zfegg/kendo/restful-data-source'
    ],
    function(kendo, config, Restful) {
        'use strict';

        var restUrl = config.baseUrl + '/zfegg-admin/resources';
        return new Restful({
            url: restUrl,
            schema: {
                model: {
                    id: "resource",
                    fields: {
                        resource: {editable: false},
                        type: {editable: false},
                        description: {},
                        methods: {},
                        actions: {}
                    }
                }
            }
        });
    });