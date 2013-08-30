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
          <div class="controls">



              <table id="controls" class="table">

              <thead>
              <tr>
                <td></td>
                <td>
                    <button class="showme btn btn-large btn-block btn-primary" type="button">Who Am I?</button>
                </td>
                <td></td>
              </tr>
              </thead>

              <?php foreach (getAxes() as $idx => $axis): ?>
              <tr class="axis">
                <td class="axis-label left"><?=$axis->left?></td>
                <td class="axis-slider">
                    <div class="axis-value" data-value="5">5</div>
                </td>
                <td class="axis-label right"><?=$axis->right?></td>
              </tr>
              <?php endforeach; ?>

              <tfoot>
              <tr>
                <td></td>
                <td>
                    <button class="showme btn btn-large btn-block btn-primary" type="button">Who Am I?</button>
                </td>
                <td></td>
              </tr>
              </tfoot>

              </table>



          </div><!-- /.controls -->
      </div><!-- /.span12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-min.js"></script>
  <script type="text/javascript" src="js/fabric-custom.js"></script>
  <script type="text/javascript" src="js/data.php"></script>
  <script type="text/javascript" src="js/jqui-sliders.js"></script>
</body>
</html>

