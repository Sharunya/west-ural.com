<?
/*
В этом модуле реализованы общие функции для api


 _______________________________СПИСОК ФУНКЦИЙ_________________________________

                                  №1
function convert_date($date) //функция конвертит дату из Y-m-d в d.m.Y
Входные параметры: $date - data в формате Y-m-d (вывод из MySQL)
Выходные параметры: строка даты

										№2
function correct($str) - Проверяет на корректность данные из формы, предназначенные для внесения в БД
Входные параметры: $str - строка для проверки
Выходные параметры:  - строка без лишних символов

  										№3
function convert_date_mysql($date)  //функция конвертит дату из d.m.Y в  Y-m-d
Входные параметры: $date - data в формате d.m.Y
Выходные параметры: строка даты

  										№4
function stroka_in_masiv($stroka) - конвертит строку в массив слов

									    №5
 Выделяет подстроку в строке
function select_podstroka_in_stroka($stroka, $podstroka, $simvol_beg_sel, $simvol_end_sel)
Входные параметры:
					$stroka - строка в которой нужно выделить
					$podstroka - подстрока которую нужно выделить
					$simvol_beg_sel - строка для начала выделения (например <font>)
					$simvol_end_sel - строка для конца выделения (например </font>)

									    №6
Преобразует 100% строку в верхний регистр
function str_to_upper($str)
Входные параметры:
					$str - строка, которую нужно преобразовать в верхний регистр
Выходные параметры:	строка все символы которой преобразованы в верхний регистр
*/


//______________________________КОД ФУНКЦИЙ____________________________________

//Преобразует 100% строку в верхний регистр
function str_to_upper($str)
{
    set_local_var("LV_str_to_upper_function_api.php", $str);
    $r = get_upper_local_var("LV_str_to_upper_function_api.php");
    return $r;
}


//конвертит строку в массив слов
function stroka_in_masiv($stroka)
{
    $stroka = trim($stroka);
    $stroka = $stroka . " ";
    $c = 0;
    $k = "";
    for ($i = 0; $i < strlen($stroka); $i++) {
        $s = $stroka[$i];
        if ($s == " ") {
            if ($k != "") {
                $c = $c + 1;
                $m[$c] = $k;
            }
            $k = "";
        } else {
            $k = $k . $s;
        }
    }
    return $m;
}


// Выделяет подстроку в строке
function select_podstroka_in_stroka($stroka, $podstroka, $simvol_beg_sel, $simvol_end_sel)
{
    $m = stroka_in_masiv($podstroka);
    $litle_descr = $stroka;
    for ($l = 1; $l <= count($m); $l++) {
        $r_litle_descr = str_to_upper($litle_descr);
        $r2 = str_to_upper($m[$l]);
        if (strpos($r_litle_descr, $r2) !== false) {
            $pr = strpos($r_litle_descr, $r2);
            $srt = "";
            for ($t = 0; $t < $pr; $t++) {
                $srt = $srt . $litle_descr[$t];
            }
            $srt = $srt . $simvol_beg_sel;
            for ($t1 = $pr; $t1 - $t < strlen($m[$l]); $t1++) {
                $srt = $srt . $litle_descr[$t1];
            }
            $srt = $srt . $simvol_end_sel;
            for ($t = $t1; $t < strlen($litle_descr); $t++) {
                $srt = $srt . $litle_descr[$t];
            }
            $litle_descr = $srt;
        }//if
    }//for

    return $litle_descr;
}


//функция конвертит дату из Y-m-d в d.m.Y   № 1
function convert_date($date)
{
    $s = $date[8] . $date[9] . "." . $date[5] . $date[6] . "." . $date[0] . $date[1] . $date[2] . $date[3];
    return $s;
}

//функция конвертит дату из d.m.Y в  Y-m-d  №3
function convert_date_mysql($date)
{
    $s = $date[6] . $date[7] . $date[8] . $date[9] . "-" . $date[3] . $date[4] . "-" . $date[0] . $date[1];
    return $s;
}


//	Проверяет на корректность данные из формы, предназначенные для внесения в БД №2
function correct($str)
{
    $str = str_replace(">", "&gt", $str);
    $str = str_replace("<", "&lt", $str);
    return $str;
}

//Выдает сообщение об ошибке
function out_msg_about_error($msg)
{
    echo "<br><h1><font color='#ff0000'>$msg</font></h1><br>";
}

?>