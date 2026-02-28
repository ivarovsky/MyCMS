<?php

class strings
{
    static function help() {}

    static function count_letters($str)
    {
        if (!is_string($str)) {
            return 0;
        }

        return grapheme_strlen($str);
    }

    static function CutName($str, $maxLenght, $CutLenght, $symb)
    {
        if (!is_string($str)) {
            return '';
        }

        if (grapheme_strlen($str) >= $maxLenght) {
            $Name = grapheme_substr($str, 0, $CutLenght);
            return $Name . $symb;
        }

        return $str;
    }

    static function transformDate($argument, $lang = "ua")
    {
        // Визначення мови
        if (isset($_SESSION['language']) && isset($_SESSION['user_logged'])) {
            switch ($_SESSION['language']) {
                case 1: $lang = "ua"; break;
                case 2: $lang = "en"; break;
                case 3: $lang = "ru"; break;
                default: $lang = "ua"; break;
            }
        }

        if (isset($_SESSION['site_language'])) {
            switch ($_SESSION['site_language']) {
                case 1: $lang = "ua"; break;
                case 2: $lang = "en"; break;
                default: $lang = "en"; break;
            }
        }

        // Місяці
        $months = [
            "ua" => [
                "00"=>"Помилка","01"=>"Січня","02"=>"Лютого","03"=>"Березня",
                "04"=>"Квітня","05"=>"Травня","06"=>"Червня","07"=>"Липня",
                "08"=>"Серпня","09"=>"Вересня","10"=>"Жовтня",
                "11"=>"Листопада","12"=>"Грудня"
            ],
            "en" => [
                "00"=>"Error","01"=>"January","02"=>"February","03"=>"March",
                "04"=>"April","05"=>"May","06"=>"June","07"=>"July",
                "08"=>"August","09"=>"September","10"=>"October",
                "11"=>"November","12"=>"December"
            ],
            "ru" => [
                "00"=>"Ошибка","01"=>"Января","02"=>"Февраля","03"=>"Марта",
                "04"=>"Апреля","05"=>"Мая","06"=>"Июня","07"=>"Июля",
                "08"=>"Августа","09"=>"Сентября","10"=>"Октября",
                "11"=>"Ноября","12"=>"Декабря"
            ]
        ];

        if (!isset($months[$lang])) {
            $lang = "en";
        }

        $arr = explode("-", $argument);

        if (count($arr) !== 3) {
            return $argument;
        }

        list($year, $month, $day) = $arr;

        $resMonth = $months[$lang][$month] ?? $months[$lang]["00"];

        return "$day $resMonth $year";
    }

    static function cutTime($argument)
    {
        $arr = explode(":", $argument);

        if (count($arr) < 2) {
            return $argument;
        }

        return "{$arr[0]}:{$arr[1]}";
    }
}

function dateTime($argument)
{
    $ar = explode(" ", $argument);

    if (count($ar) === 2) {
        return strings::transformDate($ar[0]) . " " . strings::cutTime($ar[1]);
    }

    return 0;
}