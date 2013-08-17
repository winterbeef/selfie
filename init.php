<?php
class Axis
{
    var $handle;
    var $left;
    var $right;
    var $color;

    public function __construct($handle, $left, $right, $color)
    {
        $this->handle  = $handle;
        $this->left  = $left;
        $this->right = $right;
        $this->color = $color;
    }

    public static function create($handle, $left, $right, $color)
    {
        return new Axis($handle, $left, $right, $color);
    }

}


$things = array(
    Axis::create('01', 'xxxx',   'oooo',  'red'),
    Axis::create('02', 'Straight',  'Weird',         'green'),
    Axis::create('03', 'Straight',  'Weird',         'green'),
    Axis::create('04', 'Straight',  'Weird',         'green'),
    Axis::create('05', 'Straight',  'Weird',         'green'),
    Axis::create('06', 'Straight',  'Weird',         'green'),
    Axis::create('07', 'Straight',  'Weird',         'green'),
    Axis::create('08', 'Straight',  'Weird',         'green'),
    Axis::create('09', 'Violent',   'Peaceful',      'blue'),
    Axis::create('10', 'Violent',   'Peaceful',      'blue'),
    Axis::create('11', 'Violent',   'Peaceful',      'blue'),
    Axis::create('12', 'Violent',   'Peaceful',      'blue'),
    Axis::create('13', 'Violent',   'Peaceful',      'blue'),
    Axis::create('14', 'Violent',   'Peaceful',      'blue'),
    Axis::create('15', 'Violent',   'Peaceful',      'blue'),
    Axis::create('16', 'Violent',   'Peaceful',      'blue'),
    Axis::create('17', 'Violent',   'Peaceful',      '#60ff33'),
    Axis::create('18', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('19', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('20', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('21', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('22', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('23', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('24', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('25', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('26', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('27', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('28', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('29', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('30', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('31', 'Introvert', 'Extrovert',     'yellow'),
    Axis::create('32', 'Introvert', 'Extrovert',     'yellow'),
);

