<?php include 'init.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <title>Who Are You?</title>
  <meta charset="utf-8">
  <meta name="author"    content="Jennifer Dalton">
  <meta name="viewport"  content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
</head>
<body>
  <?php include 'nav.php';?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
          <div class="controls">
              <table id="controls" class="table">
              <?php foreach (getAxes() as $idx => $axis): ?>
              <tr>
                <td class="axis-label left"><?=$axis->left?></td>
                <td class="axis-cell" title="5" data-toggle="tooltip">
<!--
                   <label class="control">
                      <input
                        type="range"
                        class="axis-control"
                        id="<?=$idx?>-control"
                        name="<?=$idx?>-control"
                        value="5"
                        min="1"
                        max="10"
                        step="1">
                      <output for="<?=$idx?>-control" onforminput="value=<?=$idx?>-control.valueAsNumber;"></output>
                  </label>
-->
                    <div id="axisidx-<?=$idx?>" class="axis-control">5</div>
                </td>
                <td class="axis-label right"><?=$axis->right?></td>
              </tr>
              <?php endforeach; ?>
              </table>
          </div><!-- /.controls -->
      </div><!-- /.span12 -->
    </div><!-- /.row-fluid -->
  </div><!-- /.container-fluid -->

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="fabric-custom.js"></script>
  <script type="text/javascript" src="js/data.php"></script>
  <script type="text/javascript" src="js/jqui-sliders.js"></script>
</body>
</html>

