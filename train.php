<?php
require 'Trainer.php';
$ann = fann_create_standard_array(3,array(10000, 450, 2));
fann_set_learning_rate($ann, 0.3);
for($r = 0; $r < 200; $r++){
    echo "epocha $r".PHP_EOL;
    for($i = 0; $i < 100; $i++)
    {

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