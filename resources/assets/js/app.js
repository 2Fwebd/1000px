/**
 * 1000px App Javascript
 * Using Vue JS framework
 *
 * @author 2Fwebd
 *
 * @type {Vue}
 */
var App = new Vue({

    /*
     * Our app wrapper
     */
    el: '#app-wrapper',

    /*
     * Our data handler, this is the model part
     */
    data: {

        // Loading Watcher
        isLoading: true,

        // Page Watcher
        currentPage: 0,

        // Layout State Watcher
        masonryBuilt: false,

        // Images handler
        shots: []

    },

    /**
     * Whenever our object is being created
     */
    created: function () {

        // Let's fetch our shots
        this.fetch();

    },

    /*
     * All the methods used by our view
     */
    methods: {

        /**
         * Build the layout using Masonry
         */
        buildLayout: function () {

            var self = this,
                $photosWrapper = jQuery('#app-grid ul'),
                buttonOffset = jQuery("#app-pagination").offset().top;

            if(!self.masonryBuilt) {
                $photosWrapper.masonry({ itemSelector: '.shot' });
                self.masonryBuilt = true;
            } else {
                // We destroy the layout first
                $photosWrapper.masonry('destroy');
                $photosWrapper.masonry({ itemSelector: '.shot' });
                // Scroll back to where our button was
                jQuery("html, body").animate({ scrollTop: buttonOffset }, 1000);
            }

        },

        /**
         * Calls our /fetch route to get shots from the 500px API according to the current page
         */
        fetch: function () {

            var self = this;

            // We display the loader first
            self.isLoading = true;

            // Information for the call
            var $wrapper = jQuery('#app-wrapper'),
                url = $wrapper.find("#call_url").val();

            // Ajax Setup
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            /*
             * The page count starts at 0 and whenever this function is called
             * We update to the next page, therefore we only have one function.
             */
            self.currentPage = self.currentPage + 1;

            // AJAX Call
            jQuery.ajax({
                url : url,
                type: "POST",
                data : {
                    page: self.currentPage,
                },
                success: function(data)
                {

                    // If we don't have any result
                    if(data.length == 0) {
                        return;
                    }
                    // We parse the result
                    var parsed = JSON.parse(data);

                    // Saved the photos to render them right away
                    parsed.photos.forEach(function (shot) {
                        self.shots.push(shot);
                    });

                    // Stop the loader
                    self.isLoading = false;

                    // To make sure the DOM is here before applying the layout
                    Vue.nextTick(function () {
                        setTimeout(function () {
                            // We re-int our layout
                            self.masonryBuilt = true;
                            // Display the images
                            self.buildLayout();
                        }, 200);
                    });

                }

            });

        }

    }

});