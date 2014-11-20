$(function () {
    
    //    Resolvendo bug no menu mobile
    $('.dropdown-toggle').click(function (e) {
        e.preventDefault();
        setTimeout($.proxy(function () {
            if ('ontouchstart' in document.documentElement) {
                $(this).siblings('.dropdown-backdrop').off().remove();
            }
        }, this), 0);
    });

    // Side Bar Toggle
    $('.hide-sidebar').click(function () {
        $('#sidebar').hide('fast', function () {

            $('.hide-sidebar').hide();
            $('.show-sidebar').show();
        });
    });

    $('.show-sidebar').click(function () {

        $('.show-sidebar').hide();
        $('.hide-sidebar').show();
        $('#sidebar').show('fast');
    });




    //========================================
    //deletar registro
    //========================================
    $('.js-delete-item').click(function (e) {
        e.preventDefault();
        if (window.confirm('Deseja realmente deletar o registro?')) {
            window.location.href = $(this).attr('href');
        }
    });

    $('.js-change-visibility').click(function (e) {
        e.preventDefault();
        var $el = $(this);
        var postData = 'classe=' + $el.data('classe') + '&method=changeStatus&id=' + $el.data('id');

        common.ajax(postData, function (e) {
            if (!parseInt(e)) {
                l('false')
                $el.css('opacity', '0.5');
            } else {
                l('true')
                $el.css('opacity', '1');
            }
        });
    });

});

