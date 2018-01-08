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
            // this.menuHover();
        },

        /**
         * Open dropdown list on mouseenter event and
         * close dorpdown list on mouseleave event
         */
        menuHover: function () {

            var navList = $('.model-nav-list > li'),
                modelItem = navList.find('.model-item'),
                modelCarItem = navList.find('.model-car-item');

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
                $('.item-car-description').hide();

               $('#car-id-' + modelId + '').show();
            });

            modelItem.on('mouseleave', function () {
                $('.item-car-description').hide();
            });

            modelCarItem.on('mouseenter', function () {

                var $this = $(this),
                    carId = $this.attr('id');

                $('.item-car-description').hide();

                $('#car-description-id-' + carId + '').show();
            });
        }
    };

    app.init();

})(jQuery);