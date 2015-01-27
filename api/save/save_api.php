<?
//Модуль для работы с данными на основе справочников

//Выдаст массив кодов элементов справочников для заданной записи данных для вывода в отчет
function get_list_id_elem_to_rec_save_data_to_report($id_rec)
{
    $z = "
SELECT `t_save_val`.`id_elem`
FROM `t_save_val`,`t_save_record`,`t_save_cont`, `t_dict_elem`
where `t_save_val`.id_rec=$id_rec
AND
`t_save_val`.`id_rec`=`t_save_record`.`id_rec`
AND
`t_save_cont`.`id_data`=`t_save_record`.`id_data`
AND
`t_dict_elem`.`id_elem`=`t_save_val`.`id_elem`
and
`t_save_cont`.`id_dict`=`t_dict_elem`.`id_dict`
and
t_save_cont.use_select='N'
order by
t_save_cont.`ord`";
    $r = execute_sql($z);
    $id_elem = sql_to_array($r, "id_elem");
    return $id_elem;
}


//Выдает массив кодов записей для заданных данных на указанный промежуток времени по фиксированным элементам справочников 
function get_list_rec_id_to_save_data_na_period($id_data, $s_date, $e_date, $v_fix_id_elem)
{
    $s_date = convert_date_mysql($s_date);
    $e_date = convert_date_mysql($e_date);
    for ($j = 1; $j < 1 + count($v_fix_id_elem); $j++) {
        $z = "
SELECT
distinct `t_save_record`.`id_rec`
from
`t_save_record`, `t_save_val`, `t_dict_elem`, `t_dict_val`
where
`t_save_record`.`id_data`=$id_data
and
`t_save_record`.`s_date`<='$s_date'
AND
`t_save_record`.`e_date`>'$e_date'
AND
`t_save_record`.`id_rec`=`t_save_val`.`id_rec`
and
`t_dict_elem`.`id_elem`=`t_save_val`.`id_elem`
and
`t_dict_elem`.`id_elem`=`t_dict_val`.`id_elem`
and
`t_dict_val`.`s_date`<='$s_date'
AND
`t_dict_val`.`e_date`>'$e_date'
AND
`t_save_val`.`id_elem`=$v_fix_id_elem[$j] ";
        if ($j > 1) {
            $z = $z . " and `t_save_record`.`id_rec` in ( ";
            for ($i = 1; $i < 1 + count($id_rec); $i++) {
                if ($i > 1) {
                    $z = $z . ",";
                }
                $z = $z . " " . $id_rec[$i];
            }
            $z = $z . " )";
        }
        $z = $z . " order by `t_save_record`.`ord`";
        $r = execute_sql($z);
        $id_rec = sql_to_array($r, "id_rec");
        if (count($id_rec) == 0) {
            return $id_rec;
        }
    }
    return $id_rec;
}


//выдает список данных
function get_list_save_data()
{
    $z = "select id_data, name from t_save_data order by ord";
    return execute_sql($z);
}

//выдает структуру данных для заданных данных
function get_save_content($id_data)
{
    $z = "select id_save_cont, name, id_dict, use_select from t_save_cont where id_data=$id_data order by ord";
    return execute_sql($z);
}

//добавляет новыую запись в хранилище данных на указанный промежуток времени
function add_new_record_in_save_data($id_data, $s_date, $e_date, $v_id_elem)
{
    $z = get_save_content($id_data);
    $m_id_dict = sql_to_array($z, "id_dict");
    if (count($m_id_dict) == count($v_id_elem)) {
        $s_date = convert_date_mysql($s_date);
        $e_date = convert_date_mysql($e_date);
        $z = "select max(ord)+1 as ord from t_save_record where id_data=$id_data";
        $r = execute_sql($z);
        $m_ord = sql_to_array($r, "ord");
        if ($m_ord[1] == "") {
            $m_ord[1] = 1;
        }
        $ord = $m_ord[1];
        $z = "insert into t_save_record(s_date, e_date, id_data, ord) values ('$s_date', '$e_date', '$id_data', $ord)";
        execute_sql($z);
        $z = "select max(id_rec) as id_rec from t_save_record where id_data=$id_data";
        $r = execute_sql($z);
        $m_id_rec = sql_to_array($r, "id_rec");
        $id_rec = $m_id_rec[1];

        for ($j = 1; $j < 1 + count($v_id_elem); $j++) {
            $z = "insert into t_save_val(id_rec, id_elem)values($id_rec, $v_id_elem[$j])";
            execute_sql($z);
        }

    } else {
        out_msg_about_error("Количество элементов в записи хранилища должно совпадать с количеством справочников!");
    }
}


//Загружает информацию из csv файла для указанных данных в заданный промежуток времени (в файле должно быть столько столбиков, сколько атрибутов в справочниках данных и они должны идти в порядке справочников и в порядке атрибутов в справочниках)
function load_save_data_from_file($id_data, $s_date, $e_date, $name_file)
{
    $z = get_save_content($id_data);
    $m_id_dict = sql_to_array($z, "id_dict");
    $count_attr = 0;
    for ($j = 1; $j < 1 + count($m_id_dict); $j++) {
        $z = get_list_attr_to_dict($m_id_dict[$j]);
        $m_id_attr = sql_to_array($z, "id_attr");
        $m_count_attr_in_dict[$j] = count($m_id_attr);
        for ($i = 1; $i < 1 + count($m_id_attr); $i++) {
            $count_attr = $count_attr + 1;
            $v_id_attr[$count_attr] = $m_id_attr[$i];
        }
    }

    $file_array = file($name_file);
    if (!$file_array) {
        echo("Ошибка открытия файла");
    } else {
        for ($i = 0; $i < count($file_array); $i++) {
            $s = $file_array[$i];
            $flag = 1;
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
            if (count($v_id_attr) != count($v_val)) {
                echo "<br><h1><font color='#ff0000'>ОШИБКА! Каличество значений не совпадает c  количеством атрибутов справочников!</font></h1><br>";
                $flag = 0;
            } else {
                $c_g_a = 0;
                $v_id_elem_inp = "";
                for ($j = 1; $j < 1 + count($m_id_dict); $j++) {
                    $v_val_search = "";
                    $v_id_attr_search = "";
                    for ($l = 1; $l < 1 + $m_count_attr_in_dict[$j]; $l++) {
                        $c_g_a = $c_g_a + 1;
                        $v_val_search[$l] = $v_val[$c_g_a];
                        $v_id_attr_search[$l] = $v_id_attr[$c_g_a];
                    }
                    $v_id_elem_inp[$j] = get_id_elem_po_val_attr($m_id_dict[$j], $s_date, $v_id_attr_search, $v_val_search);
                    if ($v_id_elem_inp[$j] == "") {
                        echo "<br><h1><font color='#ff0000'>ОШИБКА! Не удалось определить код одного из элементов строки! <br>Строка:<br> $s</font></h1><br>";
                        $flag = 0;
                    }
                }
                if ($flag == 1) {
                    add_new_record_in_save_data($id_data, $s_date, $e_date, $v_id_elem_inp);
                }
            }
        }
    }

}

?>