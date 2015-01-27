<?
/*Модуль для навигатора 

 										№1
function get_list_web_page() - Функция выдает список основных страниц навигатора

*/

//Функция выдает список основных страниц навигатора
function get_list_web_page()
{
    $z = "select web_page, name_menu from t_navigator order by ord";
    return execute_sql($z);
}


?>