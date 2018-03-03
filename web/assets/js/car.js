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
            this.modelSearch();
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
        },

        /**
         * Model search
         */
        modelSearch: function () {
            var searchModelForm = $('.search-model');

            searchModelForm.on('submit', function (e) {
                e.preventDefault();

                var $this = $(this),
                    modelName = $this.find('.model-name-field').val();

                $.ajax({
                    url: 'http://symfony-project.com/api/models/' + modelName,
                    success: function (data) {
                        console.log(data.name);
                    }
                });
            });
        }
    };

    /**
     * Init car object
     */
    car.init();

})(jQuery);