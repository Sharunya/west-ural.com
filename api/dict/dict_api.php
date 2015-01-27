<?
/*
Модуль для работы с универсальными справочниками данных
*/

//выдает содержимое справочника на указанную дату
function get_dict_val_to_single_date($id_dict, $date)
{
    $date = convert_date_mysql($date);
    $z = "
SELECT
t_dict_val.`id_dict_val`,
t_dict_val.`val_dict`,
t_dict_val.`s_date`,
t_dict_val.`e_date`,
t_dict_val.`id_attr`,
t_dict_val.`id_elem`,
t_dict_attr.id_type_attr
from
t_dict_val, `t_dict_elem`, `t_dict_cont`, t_dict_attr
WHERE
t_dict_val.s_date<='$date'
AND
t_dict_val.`e_date`>'$date'
AND
`t_dict_elem`.`id_dict`=$id_dict
and
t_dict_val.`id_elem`=`t_dict_elem`.`id_elem`
and
`t_dict_cont`.`id_dict`=`t_dict_elem`.`id_dict`
and
`t_dict_cont`.`id_attr`=t_dict_val.`id_attr`
and
t_dict_attr.`id_attr`=t_dict_val.`id_attr`
and
t_dict_attr.`id_attr`=`t_dict_cont`.`id_attr`
order by t_dict_elem.`ord`, t_dict_cont.`ORD`";
    return execute_sql($z);
}


//выдает список типов атрибутов
function get_list_type_attr()
{
    $z = "select id_type_attr, name from t_dict_attr_type order by name";
    return execute_sql($z);
}


//Функция устанавливает  элементу в справочнике по заданному атрибуту значение на указанный промежуток времени (конечная точка промежутка времени - выколотая)
function set_val_to_element_dict($id_elem, $id_attr, $s_date, $e_date, $val)
{
    $s_date = convert_date_mysql($s_date);
    $e_date = convert_date_mysql($e_date);
    $val = trim($val);
    $z = "insert into t_dict_val (s_date, e_date, val_dict, id_elem, id_attr) values ('$s_date', '$e_date', '$val', $id_elem, $id_attr)";
    execute_sql($z);
}


//Функция добавляет элемент в справочник со всеми значениями его атрибутов ($m_val_dict - массив значений, $m_id_attr - массив атрибутов)
function add_new_element_in_dict($id_dict, $s_date, $e_date, $m_val_dict, $m_id_attr)
{
    $z = "select max(ord)+1 as ord from t_dict_elem where id_dict=$id_dict";
    $r = execute_sql($z);
    $m = sql_to_array($r, 'ord');
    $ord = $m[1];
    if ($ord == "") {
        $ord = 1;
    }
    $z = "insert into t_dict_elem(id_dict, ord)values($id_dict, $ord)";
    execute_sql($z);
    $z = "select max(id_elem) as id_elem from t_dict_elem where id_dict=$id_dict";
    $r = execute_sql($z);
    $m = sql_to_array($r, 'id_elem');
    $id_elem = $m[1];
    if (count($m_val_dict) == count($m_id_attr)) {
        for ($j = 1; $j < 1 + count($m_id_attr); $j++) {
            set_val_to_element_dict($id_elem, $m_id_attr[$j], $s_date, $e_date, $m_val_dict[$j]);
        }
    } else {
        echo "<br><h1><font color='#ff0000'>ОШИБКА! Каличество значений не совпадает c  количеством атрибутов справочника!</font></h1><br>";
    }
}


//Выдает список всех атрибутов для справочника
function get_list_attr_to_dict($id_dict)
{
    $z = get_list_type_attr();
    $v = sql_to_array($z, "id_type_attr");
    $z = get_list_attr_po_type_to_dict($id_dict, $v);
    return $z;
}


//Выдает список атрибутов заданных типов для справочника
function get_list_attr_po_type_to_dict($id_dict, $m_id_type_attr)
{
    $z = "
SELECT
t_dict_attr.`id_attr`,
t_dict_attr.`name`
from
t_dict_cont, t_dict_attr, t_dict_attr_type
where
t_dict_cont.`id_attr`=t_dict_attr.`id_attr`
and
t_dict_cont.`id_dict`=$id_dict
and
t_dict_attr.id_type_attr=t_dict_attr_type.id_type_attr
and (";
    for ($j = 1; $j < 1 + count($m_id_type_attr); $j++) {
        if ($j > 1) {
            $z = $z . " or ";
        }
        $z = $z . "t_dict_attr_type.id_type_attr=$m_id_type_attr[$j]";
    }
    $z = $z . ") order by t_dict_cont.`ORD`";
    return execute_sql($z);
}

//созданеи нового атрибута, заданного типа
function create_new_attr($name, $id_type_attr)
{
    $z = "select count(1) as c from t_dict_attr where trim((upper(name)))=trim((upper('$name')))";
    $r = execute_sql($z);
    $m = sql_to_array($r, 'c');
    if ($m[1] == 0) {
        $z = "select max(ord) as ord from t_dict_attr";
        $r = execute_sql($z);
        $m = sql_to_array($r, 'ord');
        if (count($m) == 0) {
            $m[1] = 0;
        }
        $m[1] = $m[1] + 1;
        $z = "insert into t_dict_attr(name, ord, id_type_attr)values('$name', $m[1], $id_type_attr)";
        execute_sql($z);
    }
}

//добавляет атрибут в справочник
function add_attr_in_dict($id_dict, $id_attr)
{
    $z = "select count(1) as c from t_dict_cont where id_dict=$id_dict and id_attr=$id_attr";
    $r = execute_sql($z);
    $m = sql_to_array($r, 'c');

    $z = "select max(ord) as ord from t_dict_cont where id_dict=$id_dict";
    $r = execute_sql($z);
    $m1 = sql_to_array($r, 'ord');
    if (count($m1) == 0) {
        $m1[1] = 0;
    }
    $m1[1] = $m1[1] + 1;
    if ($m[1] == 0) {
        $z = "insert into t_dict_cont (id_dict, id_attr, ord) values ($id_dict, $id_attr, $m1[1])";
        execute_sql($z);
    }
}

//выдает список атрибутов справочников
function get_list_attr()
{
    $z = "select id_attr, name from t_dict_attr order by ord";
    return execute_sql($z);
}


//выдает список справочников
function get_list_dict()
{
    $z = "
SELECT
t_dict.`id_dict`,
t_dict.`name`
from
t_dict
where
`IS_ACTIVE`='Y'
order by ord";
    return execute_sql($z);
}

//создает новый справочник
function create_new_dict($name)
{

    $s = "
 	select
		max(ord) as ord
	from
		t_dict";

    $r = execute_sql($s);
    $m = sql_to_array($r, 'ord');
    if (count($m) == 0) {
        $ord = 1;
    } else {
        $ord = $m[1] + 1;
    }
    if ($ord == "") {
        $ord = 1;
    }
    $z = "insert into t_dict(name, ord) values ('$name', $ord)";
    execute_sql($z);
}


//добавит элемент в справочник и выдаст  код нового элемента
function add_element_in_dict($id_dict)
{
    $z = "
   insert into t_dict_elem (id_dict) values (id_dict)
   values ($id_dict)";
    execute_sql($z);
    $z = "select max(id_dict) as id_dict from t_dict_elem where id_dict=$id_dict";
    $r = execute_sql($z);
    $m = sql_to_array($r, "id_dict");
    $rez = $m[1];
    return $rez;
}


//загружает справочник из CSV файла (порядок столбиков должен соответсвовать порядку атрибутов в справочнике)
function load_dict_from_file($id_dict, $name_file, $s_date, $e_date)
{

    $file_array = file($name_file);
    if (!$file_array) {
        echo("Ошибка открытия файла");
    } else {
        $pz = get_list_attr_to_dict($id_dict);
        $m_id_attr = sql_to_array($pz, "id_attr");
        $max_count_val = count($m_id_attr);

        for ($i = 0; $i < count($file_array); $i++) {

            $s = $file_array[$i];
            $c = strlen($s);
            $count_val = 0;
            $current_val = "";
            for ($j = 0; $j < $c; $j++) {
                if (($s[$j] == ";") || ($j == $c - 1)) {
                    $count_val = $count_val + 1;
                    $v_val[$count_val] = $current_val;
                    $current_val = "";
                } else {
                    $current_val = $current_val . $s[$j];
                }
            }
            add_new_element_in_dict($id_dict, $s_date, $e_date, $v_val, $m_id_attr);
        }
    }
}


//Функция выдает код элемента справочника по значениям всех его атрибутов на указанную дату, если элемент справочника определить  не удалось, то выдаст пустую строку
function get_id_elem_po_val_attr($id_dict, $date, $m_id_attr, $m_val_attr)
{
    $rez = "";
    if (count($m_id_attr) == count($m_val_attr)) {
        $date = convert_date_mysql($date);
        $m_id_elem = "";
        for ($j = 1; $j < 1 + count($m_id_attr); $j++) {
            $m_val_attr[$j] = trim($m_val_attr[$j]);
            $z = "
select
t_dict_elem.`id_elem`
from
t_dict_val, t_dict_elem
WHERE
t_dict_val.`id_elem`=t_dict_elem.`id_elem`
and
t_dict_val.`s_date`<='$date'
and
t_dict_val.`e_date`>'$date'
AND
t_dict_elem.`id_dict`=$id_dict
AND
t_dict_val.`id_attr`=$m_id_attr[$j] 
and 
t_dict_val.`val_dict`='$m_val_attr[$j]'
";
            if ($j > 1) {
                $z = $z . " and t_dict_elem.`id_elem` in (";
                for ($l = 1; $l < 1 + count($m_id_elem); $l++) {
                    if ($l > 1) {
                        $z = $z . ", ";
                    }
                    $z = $z . $m_id_elem[$l];
                }
                $z = $z . ")";
            }
            $r = execute_sql($z);
            $m_id_elem = sql_to_array($r, "id_elem");
            if (count($m_id_elem) == 0) {
                break;
            }
        }
        if (count($m_id_elem) == 1) {
            $rez = $m_id_elem[1];
        }

    }
    return $rez;
}


//Выдает список значений элемента справочника для вывода в отчет на указанную дату
function get_val_elem_dict_to_show_in_rep($id_elem, $date)
{
    $date = convert_date_mysql($date);
    $z = "
select
`t_dict_val`.`val_dict`
from
`t_dict_elem`, `t_dict_val`, `t_dict_attr`, `t_dict_cont`
where
`t_dict_elem`.id_elem=$id_elem
and
`t_dict_elem`.`id_elem`=`t_dict_val`.`id_elem`
AND
`t_dict_val`.`s_date`<='$date'
and
`t_dict_val`.`e_date`>'$date'
AND
`t_dict_attr`.`id_attr`=`t_dict_val`.`id_attr`
AND
`t_dict_attr`.`id_type_attr` in (2,3)
and
`t_dict_cont`.`id_attr`=`t_dict_attr`.`id_attr`
AND
`t_dict_elem`.`id_dict`=`t_dict_cont`.`id_dict`
order by
`t_dict_cont`.`ORD`";
    $r = execute_sql($z);
    $v = sql_to_array($r, "val_dict");
    return $v;
}


?> 