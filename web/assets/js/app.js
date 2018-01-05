/**
 * Created by kostya on 02.01.18.
 */
;(function ($, undefined) {

    /**
     * App object
     */
    var app = {

        /**
         * Init methods
         */
        init: function () {
            this.menuHover();
        },

        /**
         * Open dropdown list on mouseenter event and
         * close dorpdown list on mouseleave event
         */
        menuHover: function () {

            var navList = $('.model-nav-list > li'),
                modelItem = $('.model-item');

            navList.on('mouseenter', function () {
                navList.removeClass('open');
                $(this).addClass('open');
            });

            navList.on('mouseleave', function () {
                navList.removeClass('open');
            });

            modelItem.on('mouseenter', function () {
               var $this = $(this),
                   modelId = $this.attr('id');

                $('.model-car-list').hide();

               $('#car-id-' + modelId + '').show();
            });
        }
    };

    app.init();

})(jQuery);