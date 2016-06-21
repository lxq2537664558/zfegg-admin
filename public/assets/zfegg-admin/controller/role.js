define([
        'kendo',
        'zfegg/config',
        '../source/roles',
        '../source/role-resources',
        'text!./role.html',
        'text!./assign-resource.html',
        'zfegg/kendo/binder-window-center'
    ],
    function (kendo, config, roles, RoleResourcesAssigner, tpl, assignResourceTpl) {
        'use strict';

        var kGrid;
        var view = new kendo.View(tpl, {
            model: {
                roles: roles.hierarchicalDataSource,
                isAssignDisabled: true,
                isVisible: true,
                selectedNode: null,
                onSelect: function (e) {
                    var kTree = e.sender.element.data('kendoTreeView');
                    this.selectedNode = kTree.dataItem(e.node);
                    this.set('isAssignDisabled', false);
                },
                onClickAssign: function (e) {
                    var resourcesAssigner = new RoleResourcesAssigner(this.selectedNode);

                    resourcesAssigner.fetchItems(function (items) {
                        var view = new kendo.View(assignResourceTpl,
                            {
                                model: {
                                    isVisible: true,
                                    onCheckResource: function (e) {
                                        var resource = e.sender.dataItem(e.node);
                                        resourcesAssigner.assign(resource);
                                    },
                                    onWindowClose: function (e) {
                                        e.sender.destroy();
                                    },
                                    onButtonSubmit: function (e) {
                                        e.preventDefault();
                                        resourcesAssigner.dataSource.sync().then(function () {
                                            $(e.target).closest('[data-role=window]').data('kendoWindow').close();
                                        });
                                    },
                                    onButtonCancel: function (e) {
                                        e.preventDefault();
                                        $(e.target).closest('[data-role=window]').data('kendoWindow').close();
                                    },
                                    resources: items
                                }
                            }
                        );

                        view.render();
                    });
                }
            },
            init: function () {
                var $tree = this.element.children('[data-role=treeview]'),
                    kTree = $tree.data('kendoTreeView');

                kTree.options.template = kendo.template('<span>#:item.name#</span>  <span class="k-icon k-add"></span> <span class="k-icon k-delete"></span>');

                $tree.on('click', '.k-delete', function () {
                    var node  = $(this).closest('.k-item'),
                        item = kTree.dataItem(node),
                        nodes = node.find('.k-item').andSelf();

                    nodes.each(function () {
                        var n = roles.dataSource.get(kTree.dataItem(this).role_id);
                        if (n) {
                            roles.dataSource.remove(n);
                        }
                    });
                    roles.dataSource.sync().then(function () {
                        kTree.remove(node);
                    });
                });

                $tree.on('click', '.k-add', function () {
                    var node  = $(this).closest('.k-item'),
                        item = kTree.dataItem(node),
                        name = window.prompt('请输入角色名');

                    if (name) {
                        roles.dataSource.add({name: name, parent_id: item.role_id});
                        roles.dataSource.sync().then(function () {
                            var newItem = roles.dataSource.data().slice(-1)[0];
                            kTree.append(newItem.toJSON(), node);
                        });
                    }
                });
            }
        });

        return {
            title:  '角色管理',
            content: view.render()
        };
    });