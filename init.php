<?php
class Axis
{
    var $left;
    var $right;
    var $color;

    public function __construct($left, $right, $color)
    {
        $this->left  = $left;
        $this->right = $right;
        $this->color = $color;
    }

    public static function create($left, $right, $color)
    {
        return new Axis($left, $right, $color);
    }

}

function getAxes() {
    $lines = @file('axes.txt');

    $digits = array('0','3','6','9','c','f');

    $axes = array();
    foreach ($lines as $line) {
        list($left, $right, $hex) = explode("\t", $line);
        $left = trim($left);
        $right = trim($right);
        $hex = trim($hex);
        $hex = '#'.$hex;

        if ($left && $right) {
            $axes[] = Axis::create($left, $right, $hex);
        }
    }
    return $axes;
}

function getMe($v) {
    return explode(',', $v);
}
