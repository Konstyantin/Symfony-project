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
            this.carSearch();
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
                        that.searchModelResult(data);
                    }
                });
            });
        },

        /**
         * Car search
         */
        carSearch: function () {
            var that = this,
                searchModelForm = $('.search-car'),
                showSearchModelBtn = $('.show-search-car-form-btn');

            /**
             * Show and hide search model form
             */
            showSearchModelBtn.on('click', function () {

                var icon =  $('.show-form-icon');

                if (icon.hasClass('glyphicon-plus')) {
                    $('.car-search').show();
                } else {
                    $('.car-search').hide();
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
                    modelName = $this.find('.car-name-field').val();

                $.ajax({
                    url: that.severPath + 'api/cars/' + modelName,
                    success: function (data) {
                        that.searchCarResult(data);
                    }
                });
            });
        },

        searchCarResult: function (data) {

            var template = '';

            $.each(data, function () {
                template = template +
                    '<a href="/models/911/' + this.slug + '" id="' + this.name + '">' +
                    '<div class="car-item col-sm-3">' +
                    '<div class="car-logo">' +
                    '<img src="/uploads/media/CarLogo/0001/01/' + this.providerReference + '" alt="">' +
                    '</div>' +
                    '<div class="car-data">' +
                    '<span>' + this.name + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</a>';
            });

            $('.car-list-section').empty().append(template);
        },

        /**
         * Search model result
         *
         * Build model list template by search result
         *
         * @param data
         */
        searchModelResult: function (data) {

            var template = '';
            $.each(data, function () {
                template = template +
                    '<div class="col-sm-3 model-item">' +
                        '<a href="/model/' + this.slug + '" id="' + this.name + '">' +
                            '<div class="model-logo">' +
                                '<img src="/uploads/media/ModelLogo/0001/01/' + this.providerReference + '" alt=""> ' +
                            '</div>' +
                            '<div class="model-data">' +
                                '<span>' + this.name + '</span>' +
                            '</div>' +
                        '</a>' +
                    '</div>';
            });

            $('.model-list-section').empty().append(template);
        }
    };

    /**
     * Init car object
     */
    car.init();

})(jQuery);

