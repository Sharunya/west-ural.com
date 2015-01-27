<?
/*
//В этом модуле реализованы функции для работы с заказами клиентов

													№ 1
function spisok_sost_zakaza() - Функция возращает список состояний заказа
Выходные параметры: содержимое таблицы t_status_zakaz в формате sql запроса

													№ 2
function spisok_zakazov($status_id) - Функция возращает список заказов, по заданному статусу
Входные параметры: $status_id - код состояния заказа
Выходные параметры: содержимое таблицы t_zakaz в формате sql запроса




*/

//------------------------------------------- КОД ФУНКЦИЙ  ----------------------------

//Функция возращает список заказов, по заданному статусу  №2
function spisok_zakazov($status_id)
{
    $z = "select * from t_zakaz where (isactive='Y')and(status_id=$status_id)";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список состояний заказа      		№ 1
function spisok_sost_zakaza()
{
    $z = "select * from t_status_zakaz";
    $r = execute_sql($z);
    return $r;
}


?>