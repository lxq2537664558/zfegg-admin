/**
 * Created by xiemaomao on 2016/6/16.
 */
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
            //console.log(action);
            require(['zfegg-admin/controller/' + action], function (result) {
                console.log(result);
                result && App.layout.renderContent(result);
            });
        });
    };
});