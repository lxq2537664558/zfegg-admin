define(
    [
        'kendo',
        'zfegg/config',
        '../source/resources',
        'text!./resource.html'
    ],
    function (kendo, config, resources, tpl) {
        'use strict';

        var view = new kendo.View(
            tpl,
            {
                model: {
                    dataSource: resources
                }
            }
        );

        return {
            title:  '资源管理',
            content: view.render()
        };
    });