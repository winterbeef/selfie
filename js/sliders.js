$(function() {
  var el, newPoint, newPlace, offset;

  $("input[type='range']").change(function() {
    el = $(this);

    // Figure out placement percentage between left and right of input
    width = el.width();
    newPoint = (el.val() - el.attr("min")) / (el.attr("max") - el.attr("min"));

    // Janky value to get pointer to line up better
    offset = -1.3;
    offset = -.40;

    // Prevent bubble from going beyond left or right (unsupported browsers)
    if (newPoint < 0) { newPlace = 0; }
    else if (newPoint > 1) { newPlace = width; }
    else { newPlace = width * newPoint + offset; offset -= newPoint; }

    // Move bubble
    el
      .next("output")
      .css({
        left: newPlace,
        marginLeft: offset + "%"
      })
      .text(el.val());
  });

  $(window).on('resize load', function(e) {
    $("input[type='range']").trigger('change');
  })

})
