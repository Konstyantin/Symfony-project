/**
 * Created by kostya on 20.01.18.
 */
;(function ($, undefined) {

    var car = {

        /**
         * Server path to project
         */
        severPath: null,

        /**
         * Init methods
         */
        init: function () {
            this.setServerPath();
            this.pageNavigation();
            this.modelSearch();
        },

        /**
         * Set server path to project
         */
        setServerPath: function () {
            this.severPath = $('meta[name=serverPath]').attr('content');
        },

        /**
         * Get server path
         *
         * @returns {null}
         */
        getServerPath: function () {
            return this.severPath;
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

            var that = this,
                searchModelForm = $('.search-model'),
                showSearchModelBtn = $('.show-search-form-btn');

            /**
             * Show and hide search model form
             */
            showSearchModelBtn.on('click', function () {

                var icon =  $('.show-form-icon');

                if (icon.hasClass('glyphicon-plus')) {
                    $('.model-search').show();
                } else {
                    $('.model-search').hide();
                }

                icon.toggleClass('glyphicon-plus');
                icon.toggleClass('glyphicon-minus');

            });

            /**
             * Send search model request
             */
            searchModelForm.on('submit', function (e) {
                e.preventDefault();

                var $this = $(this),
                    modelName = $this.find('.model-name-field').val();

                $.ajax({
                    url: that.severPath + 'api/models/' + modelName,
                    success: function (data) {
                        console.log(data);
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