<?php

include ('person.php');
include ('bridge.php');

$people = Person::getRandom(3);

$bridge = new Bridge(1, 3);

echo $bridge->getTimeToPass($people) . PHP_EOL;