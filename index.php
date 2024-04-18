<?php
require 'Trainer.php';
$ann = fann_create_from_file("classify.txt");
echo  '
<form>
<label>Введите номер котенка</label>
<input name = "id_cat" type="text">
<input type="submit">
</form>
';
if (isset($_GET['id_cat']))
{
    $output = fann_run($ann,  Trainer::prepareDate("validation/cats/cat.".$_GET["id_cat"].".jpg"));
    echo '<img src="validation/cats/cat.'.$_GET["id_cat"].'.jpg"><br>';
    echo "Это Котенок на ".(100 *$output[0])." % и Собачка на ".(100 *$output[1])." %";
}

echo  '
<form>
<label>Введите номер собачки</label>
<input name = "id_dog" type="text">
<input type="submit">
</form>
';
if (isset($_GET['id_dog']))
{
    $output = fann_run($ann,  Trainer::prepareDate("validation/dogs/dog.".$_GET["id_dog"].".jpg"));
    echo '<img src="validation/dogs/dog.'.$_GET["id_dog"].'.jpg"><br>';
    echo "Это Собачка на ".(100 *$output[1])." % и Котенок на ".(100 *$output[0])." % ";
}
