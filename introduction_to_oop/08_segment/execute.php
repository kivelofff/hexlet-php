<?php

require_once "../../vendor/autoload.php";

use Oop\Eight\Point;
use Oop\Eight\Segment;
use function Oop\Eight\SegmentFunctions\reverse;

$segment = new Segment(new Point(1, 10), new Point(11, -3));

$reversedSegment = reverse($segment);

var_dump($reversedSegment->beginPoint); // (11, -3)

var_dump($reversedSegment->endPoint); // (1, 10)*/