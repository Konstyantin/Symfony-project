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
         * Menu hover
         */
        menuHover: function () {

            var navList = $('.model-nav-list>li');

            navList.hover(function () {
                navList.removeClass('open');
                $(this).addClass('open');
            });
        }
    };

    app.init();

})(jQuery);