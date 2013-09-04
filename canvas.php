<?php include 'init.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <title>Who Are You?</title>
  <meta charset="utf-8">
  <meta name="author"    content="Jennifer Dalton">
  <meta name="viewport"  content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.css">
  <link rel="stylesheet" type="text/css" href="/whoami/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/whoami/css/main.css">
<!--   <link rel="stylesheet" type="text/css" href="/whoami/css/bootstrap-responsive.min.css"> -->
</head>
<body>
  <?php include 'nav.php';?>
  <div class="container">
    <div class="row">
      <div class="span12">
        <pre>
        <?php
        echo join('; ',getMe($_GET['me']));
        ?>
        </pre>
      </div><!-- /.span12 -->
      <div class="span12">
        <canvas id="frame" width="1000" height="1000"></canvas>
        <br>
      </div><!-- /.span12 -->
      <div class="span12">
        <button id="dl" class="btn btn-large btn-primary" type="button">Download</button>
        <br><br>
      </div><!-- /.span12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->

  <?php foreach (range(1,64) as $i) :?>
  <img class="axis-image" id="a_<?=sprintf("%02d", $i)?>" src="/whoami/images/whoami_<?=sprintf("%02d", $i)?>.png">
  <?php endforeach; ?>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js"></script>
  <script type="text/javascript" src="/whoami/js/bootstrap-min.js"></script>
  <script type="text/javascript" src="/whoami/js/fabric-custom.js"></script>
  <script type="text/javascript" src="/whoami/js/data.php"></script>
    <script type="text/javascript">
    $(window).load(function() {
        var canvas = new fabric.Canvas('frame');

        var axes = <?= json_encode(getAxes()); ?>

        var me = <?= json_encode(getMe($_GET['me'])); ?>

        var image = 200;                   // Width of label image.
        var label = 240;                   // Width reserved for label. Image
                                           // must be smaller than this.
        var pad   = 0;                     // Between label and line
        var h = $('#frame').height();      // Extent of canvas
        var w = $('#frame').width();       // Extent of canvas
        var theta = (180.0/axes.length);   // Angle of each wedge

        var params = {
          stroke     : 'black',
          strokeWidth: 1,
          selectable: false
        }

        var images = new Array();
        $('.axis-image').each(function(i, img) {
          var canvasImage = new fabric.Image(img, {top : h/2, originX: 'left'});
          images[images.length] = canvasImage
          $(img).remove();
        })

        $.each(axes, function(i, axis) {
            var angle = i * theta - 90;
            params.stroke = axis.color;

            var line = new fabric.Line([0+pad+label, h/2, w-pad-label, h/2], params);
            var imageL = images[Math.floor(i*2+0)];
            var imageR = images[Math.floor(i*2+1)];

            imageL.left = label-image;
            imageR.left = w-label;

            if (console && console.log ) {
              console.log( imageL.left, imageR.left);
            }

            var group = new fabric.Group([imageL, imageR, line], {
                angle: angle,
                selectable: false
            })
            canvas.add(group)
        })













        $('#dl').click(function(e){
            window.open(canvas.toDataURL({format:'png'}))
        })
    })
    </script>
</body>
</html>

