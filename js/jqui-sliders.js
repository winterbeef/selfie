$(function() {
	$(".axis-value" ).each(function() {

		// Create the slider
		var value = parseInt($(this).text(), 10);
		$(this).empty().slider({
			'value' : value,
			'min'   : 0,
			'max'   : 10,
			'step'  : 1,
			'slide' : function(event, ui) {
				$(this).find('.ui-slider-handle').qtip('option', 'content.text', '' + ui.value);
			},
			animate: true
		});

		// Create the qtip
		$(this).find('.ui-slider-handle').qtip({
			'content' : {
				'text' : $(this).slider('option', 'value')
			},
			position: {
				my: 'bottom center',
				at: 'top center',
				container: $(this).find('.ui-slider-handle')
			},
			hide: {
				delay: 1000
			},
			style: {
				classes: 'qtip-custom qtip-dark qtip-shadow qtip-rounded'
			}
		})

		//



	});
})
