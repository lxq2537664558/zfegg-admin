define(['jquery', 'zfegg/kendo/restful-data-source'], function ($, RestDataSource) {
    return function (App) {
        $.extend(App.options, {
            menusDataSource: new RestDataSource({
                transport: {
                    read: {
                        url: App.options.baseUrl + '/zfegg-admin/menus'
                    }
                }
            })
        });
        App.router.route('/zfegg/admin/:action', function (action) {
            require(['zfegg-admin/controller/' + action], function (result) {
                result && App.layout.renderContent(result);
            });
        });
    };
});