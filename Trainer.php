<?php

class Trainer
{
    public static function prepareDate($path): array
    {

        $imagePath = $path;
        $sourceImage = imagecreatefromjpeg($imagePath);
        list($sourceWidth, $sourceHeight) = getimagesize($imagePath);
        $image = imagecreatetruecolor(100, 100);

        // Копируем исходное изображение в новое, масштабируя и интерполируя пиксели
        imagecopyresampled($image, $sourceImage, 0, 0, 0, 0, 50, 50, $sourceWidth, $sourceHeight);

        if ($image === false) {
            echo "Не удалось загрузить изображение";
            exit;
        }
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        $pixelArray = [];
        for ($x = 0; $x < 100; $x++) {
            for ($y = 0; $y < 100; $y++) {
                // Получение цвета пикселя
                $pixelColor = imagecolorat($image, $x, $y);

                // Преобразование цвета в формат RGB
                $rgb = imagecolorsforindex($image, $pixelColor);
                $pixelArray[] =$rgb['red'] / 256 + 0.001;
            }
        }
        // Вывод информации о первом пикселе
//        echo '<pre>';
//        print_r($pixelArray[0]);
//        echo '</pre>';
        // Освобождение памяти
        imagedestroy($image);
        return $pixelArray;
    }
}