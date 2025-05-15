@php
function convertToOdiaTime($time)
{
    // Convert digits
    $odiaDigits = ['0'=>'୦','1'=>'୧','2'=>'୨','3'=>'୩','4'=>'୪','5'=>'୫','6'=>'୬','7'=>'୭','8'=>'୮','9'=>'୯'];
    $converted = strtr($time, $odiaDigits);

    // Convert AM/PM
    $converted = str_replace('AM', 'ଏ.ଏମ.', $converted);
    $converted = str_replace('PM', 'ପି.ଏମ.', $converted);

    return $converted;
}
@endphp
