<?php
// В этом модуле реализованы универсальные функции для генерации HTML кода
/*
 //______________________________СПИСОК ФУНКЦИЙ_________________________________

                                                                        №1
function create_zagolovok($zagolovok,$keywords,$opisane,$file_css, $file_js) - строит шапку документа.
Входные параметры: $zagolovok - заголовок окна, $keywords - ключевые слова,
                                         $opisane - краткое описание страницы,$file_css - путь к стилевому файлу
                                         $file_js - путь к файлу с JS. который нужно подключить к странице

                                                                        №2
function create_select_combo ($name,$m_val,$m_punkts,$style, $onchange, $select_punkt) - строит выпадающий список
Входные параметры: $name - название списка,$m_val - массив со значениями,
                                   $m_punkts - массив с названиями пунктов,
                                   $style - стиль в стилевом файле необязательный параметр,
                                   $onchange - обработчик события необязательный параметр,
                                   $select_punkt - выделенный пунк необязательный параметр


function menu() - вызывает JS скрипт строящий меню   №3


function strrepl($s) //Функция заменяет в строке знаки >,<,""   № 4
*/


//______________________________КОД ФУНКЦИЙ____________________________________

//Функция создает выпадающий список
function create_select_combo($name, $m_val, $m_punkts, $style = "", $onchange = "", $select_punkt = "")
{
    $onchange = trim($onchange);
    if ($onchange != "") {
        echo "<select name='" . $name . "' id='" . $name . "' class='" . $style . "' onchange='" . $onchange . "'>";
    }
    if ($onchange == "") {
        echo "<select name='" . $name . "' id='" . $name . "' class='" . $style . "'>";
    }
    for ($i = 1; $i < 1 + count($m_val); $i++) {
        if ($select_punkt != $m_val[$i]) {
            echo "<option  value='" . $m_val[$i] . "'>" . $m_punkts[$i] . "</option>";
        }
        if ($select_punkt == $m_val[$i]) {
            echo "<option selected  value='" . $m_val[$i] . "'>" . $m_punkts[$i] . "</option>";
        }
    }
    echo "</select>";

}

//Функция генерирует шапку страницу
function create_zagolovok($zagolovok, $keywords, $opisane, $file_css, $file_js = '../../stm31.js')
{
    echo "<html>";
    echo "<head>";
    echo "<title>$zagolovok</title>";
    echo "<LINK REL='stylesheet' TYPE='text/css' HREF='$file_css'>";
    echo "<META content='text/html' charset=windows-1251'>";
    echo "<META HTTP-EQUIV='Expires' CONTENT='0'>";
    echo "<META HTTP-EQUIV='Pragma' CONTENET='nocashe'>";
    echo "<META NAME='Keywords' CONTENT='$keywords'>";
    echo "<META name='description content='$opisane'>";
    if ($file_js != "") {
        echo "<script type='text/javascript' language='JavaScript1.2' src='$file_js'></script>";
    }
    echo "</head>";
}

// вызывает JS скрипт строящий меню                №3
function menu()
{
    echo "<script type='text/javascript' language='JavaScript1.2' src='../../menu.js'></script>";
}

//Функция заменяет в строке знаки >,<                №4
function strrepl($s)
{
    $s = str_replace(">", "&gt", $s);
    $s = str_replace("<", "&lt", $s);
    return $s;
}


?>
