<?php
/**
 * Created by PhpStorm.
 * User: Kyo
 * Date: 18/11/14
 * Time: 11:57
 */

namespace Web1\StringGenerator;


class PasswordGenerator
{

    const PASSWORD_EASY     = 0;
    const PASSWORD_MEDIUM   = 1;
    const PASSWORD_HARD     = 2;


    /**
     * @var string
     */
    private static $passwordCharEasy        = 'abcdefghijklmnopqrstuvwxyz';

    /**
     * @var string
     */
    private static $passwordCharMedium      = 'ABCDEFGHIJKLMNOPQRSTWXYZ0123456789';

    /**
     * @var string
     */
    private static $passwordCharHard        = '#!$€£%éèà@|=+';

    /**
     * @var int
     */
    private static $passwordDefaultLenght   = 10;


    /**
     * @param null $number
     * @param int $strength
     * @return string
     * @throws \Exception
     */
    public static  function getRandomString($number = null, $strength = self::PASSWORD_MEDIUM)
    {

        if (!in_array($strength, [
            self::PASSWORD_EASY,
            self::PASSWORD_MEDIUM,
            self::PASSWORD_HARD,
        ]))
            throw new \Exception('Bad strength!');

        $lenght = (is_null($number))
            ? self::$passwordDefaultLenght
            : (0 === (int)$number)
                ? self::$passwordDefaultLenght
                : (int)$number;


        $password = $char = '';

        switch ($strength) {
            case self::PASSWORD_EASY:
                $char = self::$passwordCharEasy;
                break;
            case self::PASSWORD_MEDIUM:
                $char = self::$passwordCharEasy.self::$passwordCharMedium;
                break;
            case self::PASSWORD_HARD:
                $char = self::$passwordCharEasy.self::$passwordCharMedium.self::$passwordCharHard;
                break;
        }


        for ($i = 0; $i < $lenght; $i++) {
            $password .= substr($char, mt_rand(0, (strlen($char)-1)), 1);
        }

        return $password;

    }

} 