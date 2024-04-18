<?php
require 'Trainer.php';
echo 'start load model'.PHP_EOL;
$ann = fann_create_from_file("classify.txt");
echo 'end load model'.PHP_EOL;
$output = fann_run($ann,  Trainer::prepareDate("validation/cats/cat.2005.jpg"));
print_r($output);
echo $output;
$output = fann_run($ann,  Trainer::prepareDate("validation/dogs/dog.2005.jpg"));
print_r($output);
