// By Chris Coyier & tweaked by Mathias Bynens
// https://css-tricks.com/fluid-width-youtube-videos/
// edited by konstin

$(function() {

    // Find all YouTube videos
    var $allVideos = $("iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $videoContainer = $(".content_wrapper");

    // Figure out and save aspect ratio for each video
    $allVideos.each(function() {
        $(this)
            .data('aspectRatio', this.height / this.width)
            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');
    });

    // When the window is resized
    // (You'll probably want to debounce this)
    $(window).resize(function() {
        var newWidth = $videoContainer.width();

        // Resize all videos according to their own aspect ratio
        $allVideos.each(function() {
            var $el = $(this);
            $el
                .width(newWidth)
                .height(newWidth * $el.data('aspectRatio'));
        });
    // Kick off one resize to fix all videos on page load
    }).resize();
	
	// Display the donate section only if it's enabled (on the donate page)
	$( document ).ready(function(){
		console.log("plop")
		if($('#section-donate-true').length > 0) {
			console.log("We should display the donations");
			$('#section-donate-form').show();
		}
	});
});
