/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2023 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

define('views/fields/followers', ['views/fields/link-multiple'], function (Dep) {

    return Dep.extend({

        foreignScope: 'User',

        portionSize: 6,

        setup: function () {
            Dep.prototype.setup.call(this);

            this.portionSize = this.getConfig().get('recordFollowersLoadLimit') || this.portionSize;

            this.limit = this.portionSize;

            this.listenTo(this.model, 'change:isFollowed', () => {
                let idList = this.model.get(this.idsName) || [];

                if (this.model.get('isFollowed')) {
                    if (!~idList.indexOf(this.getUser().id)) {
                        idList.unshift(this.getUser().id);

                        var nameMap = this.model.get(this.nameHashName) || {};

                        nameMap[this.getUser().id] = this.getUser().get('name');

                        this.model.trigger('change:' + this.idsName);

                        this.reRender();
                    }

                    return;
                }

                let index = idList.indexOf(this.getUser().id);

                if (~index) {
                    idList.splice(index, 1);

                    this.model.trigger('change:' + this.idsName);

                    this.reRender();
                }
            });

            this.events['click [data-action="showMoreFollowers"]'] = function (e) {
                this.showMoreFollowers();

                $(e.currentTarget).remove();
            };
        },

        reloadFollowers: function () {
            this.getCollectionFactory().create('User', (collection) => {
                collection.url = this.model.name + '/' + this.model.id + '/followers';
                collection.offset = 0;
                collection.maxSize = this.limit;

                this.listenToOnce(collection, 'sync', () => {
                    var idList = [];
                    var nameMap = {};

                    collection.forEach(user => {
                        idList.push(user.id);
                        nameMap[user.id] = user.get('name');
                    });

                    this.model.set(this.idsName, idList);
                    this.model.set(this.nameHashName, nameMap);

                    this.reRender();
                });

                collection.fetch();
            });
        },

        showMoreFollowers: function () {
            this.getCollectionFactory().create('User', (collection) => {
                collection.url = this.model.name + '/' + this.model.id + '/followers';
                collection.offset = this.ids.length || 0;
                collection.maxSize = this.portionSize;
                collection.data.select = ['id', 'name'].join(',');
                collection.orderBy = null;
                collection.order = null;

                this.listenToOnce(collection, 'sync', () => {
                    var idList = this.model.get(this.idsName) || [];
                    var nameMap = this.model.get(this.nameHashName) || {};

                    collection.forEach(user => {
                        idList.push(user.id);
                        nameMap[user.id] = user.get('name');
                    });

                    this.limit += this.portionSize;

                    this.model.trigger('change:' + this.idsName);

                    this.reRender();
                });

                collection.fetch();
            });
        },

        getValueForDisplay: function () {
            if (this.mode === 'detail' || this.mode === 'list') {
                var list = [];

                this.ids.forEach(id =>{
                    list.push(this.getDetailLinkHtml(id));
                });

                var str = null;

                if (list.length) {
                    str = '' + list.join(', ') + '';
                }

                if (list.length >= this.limit) {
                    str += ', <a role="button" data-action="showMoreFollowers">...</a>';
                }

                return str;
            }
        },
    });
});
