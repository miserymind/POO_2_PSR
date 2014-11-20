<?php
/**
 * Created by PhpStorm.
 * User: Kyo
 * Date: 18/11/14
 * Time: 09:42
 */

require __DIR__.'/vendor/autoload.php';

$passwordGenerator = new \Web1\StringGenerator\PasswordGenerator();

echo \Web1\StringGenerator\PasswordGenerator::getRandomString(50, \Web1\StringGenerator\PasswordGenerator::PASSWORD_HARD);

PDO::FETCH_OBJ;