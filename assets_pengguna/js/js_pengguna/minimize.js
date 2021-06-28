"use strict";

var KTCardTools = function () {
    // Toastr
    var initToastr = function() {
        toastr.options.showDuration = 1000;
    }

    // Demo 1
    var demo1 = function() {
        // This card is lazy initialized using data-card="true" attribute. You can access to the card object as shown below and override its behavior
        var card = new KTCard('kt_card_1');

        // Toggle event handlers

        card.on('afterCollapse', function(card) {
            setTimeout(function() {
                toastr.success('Data Complain diperkecil!');
            }, 200);
        });

        card.on('afterExpand', function(card) {
            setTimeout(function() {
                toastr.info('Data Complain diperbesar!');
            }, 200);
        });

        // Remove event handlers
        card.on('beforeRemove', function(card) {
            toastr.info('Before remove event fired!');

            return confirm('Are you sure to remove this card ?');  // remove card after user confirmation
        });

        card.on('afterRemove', function(card) {
            setTimeout(function() {
                toastr.warning('After remove event fired!');
            }, 2000);
        });

        // Reload event handlers
        card.on('reload', function(card) {
            toastr.info('Leload event fired!');

            KTApp.block(card.getSelf(), {
                overlayColor: '#ffffff',
                type: 'loader',
                state: 'primary',
                opacity: 0.3,
                size: 'lg'
            });

            // update the content here

            setTimeout(function() {
                KTApp.unblock(card.getSelf());
            }, 2000);
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            initToastr();

            // init demos
            demo1();
        }
    };
}();

jQuery(document).ready(function() {
    KTCardTools.init();
});