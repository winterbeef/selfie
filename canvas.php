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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css"> -->
</head>
<body>
  <?php include 'nav.php';?>
  <div class="container">
    <div class="row">
      <div class="span12">
        <canvas id="frame" width="900" height="900"></canvas >
        <button id="dl" class="btn btn-large btn-primary" type="button">Download</button>
      </div><!-- /.span12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-min.js"></script>
  <script type="text/javascript" src="js/fabric-custom.js"></script>
  <script type="text/javascript" src="js/data.php"></script>
    <script type="text/javascript">
    $(function() {
        var canvas = new fabric.Canvas('frame');
        var axes = <?= json_encode(getAxes()); ?>

        var label = 100;
        var pad   = 5;
        var h = $('#frame').height();
        var w = $('#frame').width();
        var fontSize = 11;

        var Lconfig = {
          fontSize: fontSize,
          left    : label,
          top     : h/2,
          originX :'right',
          originY :'center'
        }
        var Rconfig = {
          fontSize: fontSize,
          left    : w-label,
          top     : h/2,
          originX :'left',
          originY :'center'
        }
        var lineConfig = {
          fill       : 'black',
          stroke     : 'black',
          strokeWidth: 1
        }
        $.each(axes, function(i, axis) {
            var Left  = new fabric.Text(axis.left,  Lconfig);
            var Right = new fabric.Text(axis.right, Rconfig);
            var angle = i * (180/axes.length) - 90;

            lineConfig.fill = lineConfig.stroke = axis.color;
            lineConfig.angle = angle;
            var Line = new fabric.Line([0+pad+label, h/2, w-pad-label, h/2], lineConfig);


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
    })
    </script>
</body>
</html>
