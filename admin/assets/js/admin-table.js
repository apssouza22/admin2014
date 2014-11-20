/* 
 * Script que cuida das tabelas de listagens
 */
var Adm = Adm || {};

;
(function ($) {
    'use strict';

    var Table = function (options) {
        var publicMethods = {};
        var defaultOptions = {};

        var settings = $.extend({}, defaultOptions, options);


        function AddEventListener() {

        }
        ;

        return publicMethods;

    };


    var InputSearch = function (options) {
        var publicMethods = {};
        var defaultOptions = {
            callback: function (r) {
                console.log(r)
            },
            remoteSource: "../../ajax.php",
            input: '.inputsearch',
            source: 'local',
            dataSource: [{name: 'alex', idade: 22}, {name: 'souza', idade: 32}, ]

        };

        var localResult = [];

        var settings = $.extend({}, defaultOptions, options);

        var valueSearch = "";
        var lastValueSearch = "";
        var keyTimeout = 0;
        var keyTimeoutLength = 500;

        publicMethods.getResult = function () {
            valueSearch = $(settings.input).val();

            if (valueSearch === lastValueSearch) {
                return;
            }

            lastValueSearch = valueSearch;
            if (settings.source === "local") {
                searchInLocalData();
            }

            if (settings.source === "remote") {
                //when remote, wait for send search
                if (keyTimeout) {
                    clearTimeout(keyTimeout);
                    keyTimeout = 0;
                }
                keyTimeout = setTimeout(searchInRemoteData, keyTimeoutLength);
            }
        }

        //funçao que abstrai o request http, se não usando jQuery, implementar aqui outro
        function ajax(postData, done) {
            $.ajax({
                type: "POST",
                url: settings.remoteSource,
                data: postData
            }).done(done);
        }
        ;

        function searchInRemoteData() {
            ajax({inputValue: valueSearch}, settings.callback);
        }

        function searchInLocalData() {
            localResult = settings.dataSource.filter(function (element) {
                var name = String(element.name.toLowerCase());
                return name.match(new RegExp(valueSearch.toLowerCase()));
            });

            if (typeof settings.callback === 'function') {
                settings.callback(localResult);
            }
        }
    };

    window.InputSearch = InputSearch;
    var search = InputSearch({
    });
    search


})(jQuery);


