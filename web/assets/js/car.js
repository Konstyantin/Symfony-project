/**
 * Created by kostya on 20.01.18.
 */
;(function ($, undefined) {

    var car = {

        /**
         * Init methods
         */
        init: function () {
            this.pageNavigation();
        },

        /**
         * Page navigation
         *
         * Use for realization smooth anchor scrolling on car view page
         */
        pageNavigation: function () {

            var navItemLink = $('.car-nav-item-link');

            navItemLink.on('click', function (e) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 500);
            });
        }
    };

    /**
     * Init car object
     */
    car.init();

})(jQuery);