$(function() {

	function setTipVal(handle, newVal) {
		 $(handle).qtip('option', 'content.text', ''+newVal);
	}

	function qtipDefault(handle, value) {
		return {
			'content' : {
				'text' : value
			},
			'position': {
				'my': 'bottom center',
				'at': 'top center',
				'container': handle
			},
			'hide': {
				'delay': 1000
			},
			'style': {
				'classes': 'qtip-custom qtip-dark qtip-shadow qtip-rounded'
			}
		}
	}

	function makeQtipFromXv(xv, value) {
		handle = xv.find('.ui-slider-handle')
		handle.qtip(qtipDefault(handle, value))
	}

	function initSlider(xv, value) {
		xv.empty().slider({
			'value' : value,
			'min'   : 0,
			'max'   : 10,
			'step'  : 1,
			'change' : function(event, ui) {
				setTipVal(ui.handle, ui.value);
			},
			'slide' : function(event, ui) {
				setTipVal(ui.handle, ui.value);
			},
			'create': function(event, ui) {
				makeQtipFromXv(xv, value)
			}
		});
	}

	$(".axis-value" ).each(function() {
		var value = parseInt($(this).text(), 10);
		initSlider($(this), value);
	});


	$('.axis').on('click', '.axis-label', function (event) {
		label = $(event.target);
		xv = $(event.delegateTarget).find('.axis-value');
		widget = xv.slider('widget');

		newVal = widget.slider('value') + (label.hasClass('left') ? -1 : +1);
		newVal = Math.max(0, Math.min(10, newVal));
		widget.slider('value', newVal);
		makeQtipFromXv(xv, newVal)
	})


})
