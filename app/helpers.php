<?php

if (!function_exists('convertToOdiaTime')) {
    function convertToOdiaTime($time)
    {
        $odiaDigits = ['0'=>'୦','1'=>'୧','2'=>'୨','3'=>'୩','4'=>'୪','5'=>'୫','6'=>'୬','7'=>'୭','8'=>'୮','9'=>'୯'];
        $converted = strtr($time, $odiaDigits);
        $converted = str_replace('AM', 'ଏ.ଏମ.', $converted);
        $converted = str_replace('PM', 'ପି.ଏମ.', $converted);

          $months = [
            'January' => 'ଜାନୁଆରୀ',
            'February' => 'ଫେବୃଆରୀ',
            'March' => 'ମାର୍ଚ୍ଚ',
            'April' => 'ଅପ୍ରେଲ',
            'May' => 'ମେ',
            'June' => 'ଜୁନ୍',
            'July' => 'ଜୁଲାଇ',
            'August' => 'ଅଗଷ୍ଟ',
            'September' => 'ସେପ୍ଟେମ୍ବର',
            'October' => 'ଅକ୍ଟୋବର',
            'November' => 'ନଭେମ୍ବର',
            'December' => 'ଡିସେମ୍ବର',
        ];

         $day = $date->format('j');
        $month = $date->format('F');

        $convertedDay = strtr($day, $odiaDigits);
        $convertedMonth = $months[$month] ?? $month;

        return $convertedDay . ' ' . $convertedMonth;
    }
}
