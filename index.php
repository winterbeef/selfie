<?php include 'init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Who Are You?</title>
    <meta charset="utf-8">
    <meta name="author"    content="Jennifer Dalton">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    #frame {
        box-shadow: 1px 1px 1px  rgba(0,0,0,.3);
        border: 1px solid #999;
    }
    p.control {
        position: relative;
        margin-top:50px;
    }
    output {
      position: absolute;
      background-image: -webkit-gradient(linear, left top, left bottom, from(#444444), to(#999999));
      background-image: -webkit-linear-gradient(top, #444444, #999999);
      background-image: -moz-linear-gradient(top, #444444, #999999);
      background-image: -ms-linear-gradient(top, #444444, #999999);
      background-image: -o-linear-gradient(top, #444444, #999999);
      width: 18px;
      height: 15px;
      text-align: center;
      color: white;
      border-radius: 3px;
      display: inline-block;
      font: bold 11px/13px Georgia;
      bottom: 175%;
      left: 10px;
      margin-left: -1%;
    }
    output:after {
      content: "";
      position: absolute;
      width: 0;
      height: 0;
      border-top: 10px solid #999999;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      margin-top: -1px;
    }
    </style>
</head>
<body>
    <?php include 'nav.php';?>
    <div class="row">
        <div class="offset1 span10">
            <div class="controls">
                <?php foreach ($things as $name => $label): ?>
                <p class="control">
                    <label>
                        <input type="range" class="axis-control input-xxlarge id="<?=$name?>-control" name="<?=$name?>-control" value="5" min="1" max="10" step="1">
                        <output for="<?=$name?>-control" onforminput="value = <?=$name?>-control.valueAsNumber;"></output>
                    </label>
                </p>
                <?php endforeach; ?>
            </div>

            <canvas id="frame" width="600" height="600"></canvas >

            <button id="dl" class="btn btn-large btn-primary" type="button">Download</button>
        </div>
    </div><!-- /.row -->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="fabric-custom.js"></script>
    <script type="text/javascript">
    $(function() {
        var canvas = new fabric.Canvas('frame');
        var texts = <?= json_encode($things); ?>

        var label = 100;
        var pad   = 5;
        var h = $('#frame').height();
        var w = $('#frame').width();

        var Lconfig = {
                fontSize: 15,
                left: label,
                top:  h/2,
                originX:'right',
                originY:'center'
        }
        var Rconfig = {
                fontSize: 15,
                left:w-label,
                top: h/2,
                originX:'left',
                originY:'center'
        }
        $.each(texts, function(i, pair) {
            var Left  = new fabric.Text(pair.left,  Lconfig);
            var Right = new fabric.Text(pair.right, Rconfig);
            var angle = i * (180/texts.length) - 90;
            var Line = new fabric.Line([0+pad+label, h/2, w-pad-label, h/2], {
                fill:   pair.color,
                stroke: pair.color,
                strokeWidth: 1,
                angle : angle,
                selectable: true
            });

            var group = new fabric.Group([Left, Right], {
                angle: angle,
                selectable: true
            })

            canvas.add(Line)
            canvas.add(group)
        })


        $('#dl').click(function(e){
            window.open(canvas.toDataURL({format:'png'}))
        })



    var el, newPoint, newPlace, offset;

     // Select all range inputs, watch for change
     $("input[type='range']").change(function() {

       // Cache this for efficiency
       el = $(this);

       // Measure width of range input
       width = el.width();

       // Figure out placement percentage between left and right of input
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
     })
     // Fake a change to position bubble at page load
     .trigger('change');

    })
    </script>
</body>
</html>

