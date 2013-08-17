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
    $axes = array();
    foreach ($lines as $line) {
        list($left, $right) = explode("\t", $line);

        if ($left && $right) {
            $axes[] = Axis::create($left, $right, 'blue');
        }
    }
    return $axes;
}
