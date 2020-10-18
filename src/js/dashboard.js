(function () {
    'use strict'

    const $win = $(window);
    const $doc = $(document);

    const dash = {
        icons() {
            feather.replace();
        },
        init() {
            this.icons();
        }
    }

    $doc.ready(function(){
        dash.init();
    });
})()