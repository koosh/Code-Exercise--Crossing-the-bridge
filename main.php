<?php

include ('person.php');
include ('bridge.php');

// Get random persons, with random speeds.
$people = Person::getRandom(10);

// Create a bridge with length 1 and width 2.
$bridge = new Bridge(1, 2);

echo $bridge->getTimeToPass($people) . PHP_EOL;