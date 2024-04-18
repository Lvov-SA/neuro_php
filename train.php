<?php
require 'Trainer.php';
$ann = fann_create_standard_array(3,array(10000, 1000, 2));
for($r = 0; $r < 10; $r++){
    for($i = 0; $i < 50; $i++)
    {
        echo "epocha $i".PHP_EOL;
        fann_train($ann,
            Trainer::prepareDate("train/cats/cat.$i.jpg"),
            [0.99,0.01]
        );
        fann_train($ann,
            Trainer::prepareDate("train/dogs/dog.$i.jpg"),
            [0.01,0.99]
        );
    }
}

fann_save($ann,"classify.txt");