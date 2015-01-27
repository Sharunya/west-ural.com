<?php
/*
В этом модуле реализованы функции для работы с переменными

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

                                                                                №1
function set_local_var($name_var, $val_var) - Функция устанавливает локальную переменную 
Входные параметры:
                                        $name_var - имя переменной
                                        $val_var - значение переменной
Примечание:
                        Для каждого юзера переменная устанавливается, как собственная - работает только в рамках 1 подключения.
                        В этих переменных можно хранить имена, пароли и прочую инфу, которая нужна для работы сценариев в рамках 1 подключения.
                        Даже если юзер из разных браузеров запускает сценарий, где используется эта функция, запись будет в 1 переменную.
                        Будет работать даже если несколько юзеров, работают через 1 прокси сервер. Короче это замена сессиям. 
                        Только сессия становится глобальной по отношению к пользователю а не браузеру. 
                        Рекомендуется следующий формат имен переменных, которые вы хотите использовать в рамках 1 сценария:
                        "LV_<имя переменной>_<имя сценария>"
                        
                                                                                №2
function set_global_var($name_var, $val_var) - Функция устанавливает глобальную переменную
Входные параметры:
                                        $name_var - имя переменной
                                        $val_var - значение переменной
Примечание:
                        Переменная хранится вечно, её можно использовать для хранения каких-то настроек.
                        Любой пользователь может считать данную переменну, так что не стоит использовать её для временного хранения данных.
                        Рекомендуется следующий формат имен переменных, которые вы хотите использовать:
                        "GV_<имя переменной>_<имя сценария>"

                                                                                №3
function get_local_var($name_var) - Функция возращает локальную переменную 
Входные параметры:
                                        $name_var - имя переменной
Выходные параметры:
                                        значение переменной

                                                                                №4
function get_global_var($name_var) - Функция возращает глобальную переменную
Входные параметры:
                                        $name_var - имя переменной
Выходные параметры:
                                        значение переменной

                                                                                №3
function get_upper_local_var($name_var) - Функция возращает локальную переменную преобразованную в верхний регистр
Входные параметры:
                                        $name_var - имя переменной
Выходные параметры:
                                        значение переменной в верхнем регистре

*/
//______________________________КОД ФУНКЦИЙ____________________________________

//Функция возращает локальную переменную преобразованную в верхний регистр
function get_upper_local_var($name_var)
{
    $s = convert_name_var_in_local_format($name_var);
    $sql = "
                select
                                upper(val) as c
                from
                           t_var
                where
                           name='$s'";

    $r_sql = execute_sql($sql);
    $r = sql_to_array($r_sql, 'c');
    if (count($r) != 0) {
        return $r[1];
    } else {
        $r = "";
        return $r;
    }
}


//Функция устанавливает локальную переменную
function set_local_var($name_var, $val_var)
{

    $s = convert_name_var_in_local_format($name_var);

    ins_or_updt_t_var($s, $val_var);

}

//Функция устанавливает глобальную переменную
function set_global_var($name_var, $val_var)
{

    ins_or_updt_t_var($name_var, $val_var);

}

//Функция возращает локальную переменную 
function get_local_var($name_var)
{

    $s = convert_name_var_in_local_format($name_var);
    $r = val_from_t_var($s);
    return $r;
}

//Функция возращает глобальную переменную 
function get_global_var($name_var)
{

    $r = val_from_t_var($name_var);

    return $r;
}

//Функция конвертирует имя переменоой в локальный формат
function convert_name_var_in_local_format($name_var)
{

    global $REMOTE_ADDR;
    global $HTTP_X_FORWARDED_FOR;
    $pref_1 = $REMOTE_ADDR;
    $pref_2 = $HTTP_X_FORWARDED_FOR;
    $s = $name_var . "_" . $pref_1 . "_" . $pref_2;

    return $s;
}

//Функция возращает значение из таблицы t_var
function val_from_t_var($name)
{
    $s = "
                select
                                val
                from
                           t_var
                where
                           name='$name'";

    $r_sql = execute_sql($s);
    $r = sql_to_array($r_sql, 'val');
    if (count($r) != 0) {
        return $r[1];
    } else {
        $r = "";
        return $r;
    }
}

//Функция добавляет или обновляет инфу в таблице t_var
function ins_or_updt_t_var($name_var, $val_var)
{
    $val_var = str_replace("'", "''", $val_var);

    $s = "
                select 
                        count(1) as c
                from
                        t_var
                where
                        name='$name_var'";

    $r = execute_sql($s);
    $c = sql_to_array($r, 'c');

    if ($c[1] == 0) {
        $s = "
              insert into 
                                         t_var(name, val)
                  values
                                    ('$name_var', '$val_var')";
    } else {
        $s = "
                                update 
                                        t_var
                                set
                                        val='$val_var'
                                where
                                        name='$name_var'
                  ";
    }

    execute_sql($s);
}

?>
