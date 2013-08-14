<?php include 'init.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <title>Bootstrap Template</title>
    <meta charset="utf-8">
    <meta name="copyright" content="Psyop 2013">
    <meta name="author"    content="pipeline@psyop.tv">
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
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="http://info.psyop.tv/">Psyop</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li><a href="http://example.com/">Lions</a></li>
                        <li><a href="http://example.com/">Tigers</a></li>
                        <li><a href="http://example.com/">Bears</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown" id="menu1">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="http://example.com/">one</a></li>
                                <li><a href="http://example.com/">two</a></li>
                                <li class="divider"></li>
                                <li><a href="http://example.com/">three</a></li>
                            </ul>
                        </li>
                    </ul><!-- /.nav -->
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </div><!-- /.navbar-inner -->
    </div><!-- /.navbar .navbar-fixed-top -->


    <div class="row">
        <div class="offset1 span10">


            <div class="controls">
                <?php foreach ($things as $name => $label): ?>
                <p class="control">
                    <label>
                        <input type="range" class="axis-control" id="<?=$name?>-control" name="<?=$name?>-control" value="5" min="1" max="10" step="1">
                        <output for="<?=$name?>-control" onforminput="value = <?=$name?>-control.valueAsNumber;"></output>
                    </label>
                </p>
                <?php endforeach; ?>
            </div>

            <canvas id="frame" width="800" height="800"></canvas >

            <button id="dl" class="btn btn-large btn-primary" type="button">Download</button>
        </div>
    </div><!-- /.row -->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="fabric-custom.js"></script>
    <script type="text/javascript">
    $(function() {
        var canvas = new fabric.Canvas('frame');
        var texts = [
             ['hello' , 'gbye']
            ,['howdy' , 'cya'  ]
            ,['ohai'  , 'later']
            ,['hey'   , 'buhbye']
            ,['greet' , 'ciao']
            ,['wassup', 'catch ya']
        ];
        var Lconfig = {
                fontSize: 15,
                left: 100,
                top:  300,
                originX:'right',
                originY:'center'
        }
        var Rconfig = {
                fontSize: 15,
                left:400,
                top: 300,
                originX:'left',
                originY:'center'
        }
        $.each(texts, function(i, pair) {
            var L = new fabric.Text(pair[0], Lconfig);
            var R = new fabric.Text(pair[1], Rconfig);
            var angle = i * (180/texts.length) - 90;
            var C = new fabric.Line([105, 300, 395, 300], {
                fill: 'black',
                stroke: 'black',
                strokeWidth: 1,
                angle : angle,
                selectable: false
            });

            var group = new fabric.Group([L, R], {
                angle: angle,
                selectable: false
            })

            canvas.add(C)
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

