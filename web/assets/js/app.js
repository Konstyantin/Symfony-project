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
                modelItem = navList.find('.model-item'),
                modelCarItem = navList.find('.list-car-item');

            // show menu nav list on mouseenter event
            navList.on('mouseenter', function () {
                navList.removeClass('open');
                $(this).addClass('open');
            });

            // show car list on mouseenter event model item
            modelItem.on('mouseenter', function () {
                var $this = $(this),
                    modelId = $this.attr('id'),
                    carModelId = '#car-item-' + modelId,
                    carsModel = $(carModelId);

                // if model item has id and model has car
                if (modelId && carsModel.length) {
                    var modelList = $('.model-list-car');

                    // check which model list show
                    $.each(modelList, function () {
                        var that = $(this);

                        if (that.attr('id') == modelId) {
                            that.show();
                        }
                    });
                }
            });

            // hide car list on mouseleave event
            modelItem.on('mouseleave', function () {
                $('.model-list-car').hide();
            });

            // show car description on mouserenter
            modelCarItem.on('mouseenter', function () {
               var $this = $(this),
                   carData = $this.find('.car-data');

               carData.show();
            });

            // hide car description on mouseleave
            modelCarItem.on('mouseleave', function () {
                var $this = $(this),
                    carData = $this.find('.car-data');

                carData.hide();
            });
        }
    };

    app.init();

})(jQuery);