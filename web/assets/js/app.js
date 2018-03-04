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
            this.actionListManage();
            this.offersTree();
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
        },

        /**
         * Action list manage
         *
         * Use for change condition action list story show and hide
         */
        actionListManage: function () {
            var actionListBtn = $('.action-list-btn');

            actionListBtn.on('click', function (e) {
                e.preventDefault();

                var $this = $(this),
                    serviceItem = $this.closest('.car-service-item'),
                    actionStory = serviceItem.find('.action-story');

                actionStory.slideToggle();
            })
        },

        /**
         * Change display condition element
         *
         * @param menu
         * @param subList
         */
        changeCondition: function (menu, subList) {

            var that = this;
            $.each(menu, function () {
                var list = $(this).find('.dropdown-menu');

                /**
                 * If elem display remove class active
                 */
                if (that.checkActive(list)) {
                    list.removeClass('active');
                }
            });

            /**
             * if menu show remove class active, if not add class active
             */
            subList.toggleClass('active');
        },

        /**
         * Checks whether the element contains a class active
         *
         * @param elem
         * @returns {boolean}
         */
        checkActive: function (elem) {
            return elem.hasClass('active');
        },

        /**
         * Offer tree
         */
        offersTree: function () {
            var that = this;
            $('.dropdown-submenu a.submenu').hover(function(e){

                /**
                 * Define variable
                 */
                var $this = $(this),
                    menu = $this.closest('.dropdown-menu'),
                    subList = $this.siblings('ul');

                console.log(subList);

                /**
                 * Call method changeCondition
                 */
                that.changeCondition(menu, subList);

            });
        }
    };

    app.init();

})(jQuery);