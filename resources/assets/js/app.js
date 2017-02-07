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
        currentPage: 1,

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
                    self.shots = parsed.photos;

                    // Update the page count
                    self.currentPage = parsed.current_page++;

                }

            });

        },


    }

});