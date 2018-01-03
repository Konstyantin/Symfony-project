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

            var navList = $('.model-nav-list>li');

            navList.on('mouseenter', function () {
                navList.removeClass('open');
                $(this).addClass('open');
            });

            navList.on('mouseleave', function () {
                navList.removeClass('open');
            });
        }
    };

    app.init();

})(jQuery);