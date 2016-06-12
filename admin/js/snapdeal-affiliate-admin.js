(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$( document).ready( function () {
		$('#cats-form').submit( function () {
			var data = {
				action: 'snapdeal_response'
			};
			$.post(ajaxurl, data, function ( response ) {
				
				var json_obj = $.parseJSON(response);//parse JSON
				$.each( json_obj["apiGroups"]["Affiliate"]["listingsAvailable"], function( key, value ) {
					console.log( key + ": " + value["listingVersions"]["v1"]["get"] );
				});
				/*var output="<ul>";
				for (var i in json_obj)
				{
					output+="<li>" + json_obj + ",  " + json_obj[i].ID + "</li>";
				}
				output+="</ul>";

				$('span').html(output);*/
			})
			return false;
		})
	})

})( jQuery );
