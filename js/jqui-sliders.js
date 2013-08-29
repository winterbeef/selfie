$(function() {

	function newQtipValue(handle, newVal) {
		$(handle).qtip('option', 'content.text', '' + newVal);
	}


	$(".axis-value" ).each(function() {
		// Create the slider
		var value = parseInt($(this).text(), 10);
		$(this).empty().slider({
			'value' : value,
			'min'   : 0,
			'max'   : 10,
			'step'  : 1,
			'change' : function(event, ui) {
				newQtipValue(ui.handle, ui.value);
			},
			'slide' : function(event, ui) {
				newQtipValue(ui.handle, ui.value);
			},
			'create': function(event, ui) {
				// Create the qtip
				$(this).find('.ui-slider-handle').qtip({
					'content' : {
						'text' : value
					},
					'position': {
						'my': 'bottom center',
						'at': 'top center',
						'container': $(this).find('.ui-slider-handle')
					},
					'hide': {
						'delay': 1000
					},
					'style': {
						'classes': 'qtip-custom qtip-dark qtip-shadow qtip-rounded'
					}
				})
			}
		});
	});


	$('.axis').on('click', '.axis-label', function (event){
		$tr = $(event.delegateTarget);
		$label = $(event.target);
		$widget = $tr.find('.axis-value').slider('widget');
		$tt_handle = $tr.find('.ui-slider-handle');

		newVal = $widget.slider('value') + ($label.hasClass('left') ? -1 : +1);
		$widget.slider('value', newVal);
	})


})
