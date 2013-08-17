$(function() {
    $( ".axis-control" ).each(function() {
      // read initial values from markup and remove that
      var value = parseInt( $( this ).text(), 10 );

      $(this).empty().slider({
		value:value,
		min: 0,
		max: 10,
		step: 0.5,
		slide: function(event, ui) {
			// $("#amount").val(ui.value);
			console.log(ui.value);
			$(this).find('.ui-slider-handle').attr('title', ui.value)
		},
        animate: true
      });
    });
})
