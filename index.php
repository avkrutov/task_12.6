<?php

//Задание №1
$str1 = 'Иванов';
$str2 = 'Иван';
$str3 = 'Иванович';

function getFullnameFromParts ($str1, $str2, $str3) {
    $sum = $str1 ." ". $str2 ." ". $str3;
    return $sum;
}
echo getFullnameFromParts($str1, $str2, $str3)."<hr>".'</br>';


//Задание №2
$str4 = 'Иванов Иван Иванович';
function getPartsFromFullname ($str4) {
    $div1 = explode(' ', $str4);
    $keys = ['surname', 'name', 'patronomyc'];
    $div2 = array_combine ($keys, $div1);
    return $div2;
}
echo '<pre>';
print_r(getPartsFromFullname($str4));
echo '</pre>'."<hr>";


//Задание №3
$str5 = 'Иванов Иван Иванович';
function getShortName ($str5) {
    $div3 = explode(' ', $str5);
    $div4 = $div3[0];
    $div5 = mb_substr($div3[1], 0, 1);
    return $div4." ".$div5.".";
}
echo getShortName($str5)."<hr>".'</br>';


//Задание №4
$str6 = 'Иванов Иван Иванович';
function getGenderFromName ($str6) {
    $div6 = explode(' ',$str6);
    $div7 = mb_substr($div6[0], -2);
    $div8 = mb_substr($div6[1], -1);
    $div9 = mb_substr($div6[2], -3);
    $gender = 0;
    $genMaleSur = 'в';
    $genMaleNam = 'й'||'н';
    $genMalePat = 'ич';
    $genFemaleSur = 'ва';
    $genFemaleNam = 'а';
    $genFemalePat = 'вна';
    if ($genMaleSur == $div7) $gender++;
    if ($genMaleNam == $div8) $gender++;
    if ($genMalePat == $div9) $gender++;
    if ($genFemaleSur == $div7) $gender--;
    if ($genFemaleNam == $div8) $gender--;
    if ($genFemalePat == $div9) $gender--;
    $result = ($gender <=> 0);
    if ($result == 1){
        return "мужской пол";
    }elseif ($result == -1){
        return "женский пол";
    }elseif ($result == 0){
        return "пол не определен";
    }
}
echo getGenderFromName ($str6)."<hr>".'</br>';

//Задание №5
include 'array.php';
function getGenderDescription ($example_persons_array){
   $arr = array_column($example_persons_array, 'fullname');
   $arr2 = array_map('getGenderFromName', $arr);
   $count = count($arr2);
   $man = 0;
   $wooman = 0;
   $undefined = 0;
   $manStr = "мужской пол";
   $woomanStr = "женский пол";
   $undefinedStr = "пол не определен";
   foreach ($arr2 as $val) { 
    if ($manStr == $val) $man ++;
    if ($woomanStr == $val) $wooman ++;
    if ($undefinedStr == $val) $undefined ++;
   }
   $percMan = (round (($man / $count) * 100));
   $percWooman = (round (($wooman / $count) * 100));
   $percuUdefined = (round (($undefined / $count) * 100));
   
   echo "Гендерный состав аудитории:".'</br>';
   echo '</br>';
   echo "Мужчины - $percMan %".'</br>';
   echo "Женщины - $percWooman %".'</br>';
   echo "Не удалось определить - $percuUdefined %".'</br>';
}
echo getGenderDescription ($example_persons_array).'</br>';

?>

