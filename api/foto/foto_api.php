<?php

//создаем нового автора фотографий
/**
 * @param $name
 */
function create_avtor($name)
{
    $sql = "select count(1) as c from t_avtor where name='$name'";
    $r = execute_sql($sql);
    $m = sql_to_array($r, 'c');
    if ($m[1] == 0) {
        $sql = "insert into t_avtor (name) values ('$name')";
        execute_sql($sql);
    }
}

//удаляет автора
function delete_avtor($id_avtor)
{
    $sql = "delete from t_avtor where id_avtor=$id_avtor";
    execute_sql($sql);
}


//создаем новый раздел фотографий
function create_razdel($name)
{
    $sql = "select count(1) as c from t_razdel where name='$name'";
    $r = execute_sql($sql);
    $m = sql_to_array($r, 'c');
    if ($m[1] == 0) {
        $sql = "SELECT max(ord) AS ord FROM t_razdel";
        $r = execute_sql($sql);
        $ord = sql_to_array($r, 'ord');
        $ord[1] = $ord[1] + 1;
        $sql = "insert into t_razdel (name, ord) values ('$name',  $ord[1])";
        execute_sql($sql);
    }
}

//удаляет раздел
function delete_razdel($id_avtor)
{
    $sql = "delete from t_razdel where id_razdel=$id_avtor";
    execute_sql($sql);
}

//Создает фотку
function create_foto($name_big, $name_litle, $id_avtor, $id_razdel, $key_words, $descr, $show_main_page, $good_foto, $ORD_good_foto, $ORD_SHOW_MAIN_PAGE, $IS_TOP_FOTOBANK)
{
    $sql = "insert into t_foto( name_big, name_litle, id_avtor, id_razdel, key_words, descr, show_main_page, good_foto, ORD_good_foto, ORD_SHOW_MAIN_PAGE, IS_TOP_FOTOBANK)
 values ('$name_big', '$name_litle', $id_avtor, $id_razdel, '$key_words',  '$descr', '$show_main_page', '$good_foto', $ORD_good_foto, $ORD_SHOW_MAIN_PAGE, '$IS_TOP_FOTOBANK')";
    execute_sql($sql);
    $sql = "SELECT max(id_foto) AS id_foto FROM t_foto";
    $r = execute_sql($sql);
    $m = sql_to_array($r, 'id_foto');
    if ($IS_TOP_FOTOBANK == "Y") {
        $sql = "UPDATE t_foto SET ord_fotobank=id_foto+1000000 WHERE id_foto=" . $m[1];
    } else {
        $sql = "UPDATE t_foto SET ord_fotobank=id_foto WHERE id_foto=" . $m[1];
    }
    execute_sql($sql);
    return $m[1];
}

//Обновляет данные о фотографии
function upd_foto($id_foto, $id_avtor, $id_razdel, $key_words, $descr, $show_main_page, $good_foto, $ORD_good_foto, $ORD_SHOW_MAIN_PAGE, $IS_TOP_FOTOBANK)
{
    $sql = "update t_foto set  id_avtor=$id_avtor, id_razdel=$id_razdel, key_words='$key_words', descr='$descr', show_main_page='$show_main_page', good_foto='$good_foto', ORD_good_foto=$ORD_good_foto, ORD_SHOW_MAIN_PAGE=$ORD_SHOW_MAIN_PAGE, IS_TOP_FOTOBANK='$IS_TOP_FOTOBANK' where id_foto=$id_foto";
    execute_sql($sql);
    if ($IS_TOP_FOTOBANK == "Y") {
        $sql = "UPDATE t_foto SET ord_fotobank=id_foto+1000000 WHERE id_foto=" . $id_foto;
    } else {
        $sql = "UPDATE t_foto SET ord_fotobank=id_foto WHERE id_foto=" . $id_foto;
    }
    execute_sql($sql);
}

//Выдает список фоток
function get_fotki($id_razdel = 0, $id_avtor = 0, $id_foto = 0, $show_main_page = "", $show_foto_bank = "", $show_poisk = "", $str_poisk = "")
{
    $sql = "SELECT  `id_foto`, `name_big`, `name_litle`, t_avtor.id_avtor, t_avtor.name AS name_avtor, t_razdel.id_razdel ,t_razdel.name  AS name_razdel, `key_words`, `descr`, `show_main_page`, `good_foto`, IS_TOP_FOTOBANK, ORD_SHOW_MAIN_PAGE, ORD_good_foto FROM t_foto, t_razdel, t_avtor WHERE t_avtor.id_avtor=t_foto.id_avtor AND t_foto.id_razdel=t_razdel.id_razdel ";
    if ($id_razdel > 0) {
        $sql = $sql . " and t_foto.id_razdel=" . $id_razdel;
    }
    if ($id_avtor > 0) {
        $sql = $sql . " and t_foto.id_avtor=" . $id_avtor;
        if (($show_foto_bank == "Y")) {
            $sql = $sql . " and t_foto.good_foto='Y'";
        }
    }
    if ($id_foto > 0) {
        $sql = $sql . " and t_foto.id_foto=" . $id_foto;
    }
    if ($show_main_page != "") {
        $sql = $sql . " and t_foto.show_main_page='" . $show_main_page . "'";
    }
    if ($show_poisk == "Y") {
        if ($str_poisk == "") {
            $sql = $sql . " and 1=0";
        } else {
            $sql = $sql . " and (id_foto='" . $str_poisk . "' or upper(key_words) like upper('%" . $str_poisk . "%') or upper(t_razdel.name) like upper('%" . $str_poisk . "%')) order by id_foto";
        }
    }
    if (($show_foto_bank == "") && ($show_main_page == "") && ($show_poisk == "")) {
        $sql = $sql . " order by t_foto.id_razdel, t_foto.id_avtor, ORD_good_foto";
    }
    if ($show_main_page == "Y") {
        $sql = $sql . " order by ORD_SHOW_MAIN_PAGE";
    }
    if (($id_avtor <= 0) && ($show_foto_bank == "Y") && ($show_poisk == "")) {
        $sql = $sql . " order by ord_fotobank desc";
    }
    if (($id_avtor > 0) && ($show_foto_bank == "Y") && ($show_poisk == "")) {
        $sql = $sql . " order by ord_good_foto";
    }
    $r = execute_sql($sql);
    return $r;
}

//Удаляет фотку
function dlt_foto($id_foto)
{
    $sql = "delete from t_foto where id_foto=$id_foto";
    execute_sql($sql);
    delete_folder("./foto_big/" . $id_foto);
    delete_folder("./foto_litle/" . $id_foto);
}

//Выдает список разделов
function get_razdel($id_razdel = 0, $to_main_page = "N")
{
    if ($id_razdel <= 0) {
        if ($to_main_page == "N") {
            $sql = "SELECT id_razdel, name FROM t_razdel WHERE id_razdel>0 ORDER BY ord";
        } else {
            $sql = "SELECT id_razdel, name FROM t_razdel ORDER BY ord";
        }
    } else {
        $sql = "SELECT id_razdel, name FROM t_razdel WHERE id_razdel=" . $id_razdel;
    }
    $r = execute_sql($sql);
    return $r;
}

//Выдает список авторов
function get_avtor($id_avtor = 0)
{
    if ($id_avtor > 0) {
        $sql = "SELECT id_avtor, name FROM `t_avtor` WHERE id_avtor=" . $id_avtor;
    } else {
        $sql = "SELECT id_avtor, name FROM `t_avtor` ORDER BY name";
    }
    $r = execute_sql($sql);
    return $r;
}

//Создает top фотографию
function create_top_foto($name_foto, $descr_foto)
{
    $sql = "insert into t_reklama(name_file, descr)values('$name_foto', '$descr_foto')";
    execute_sql($sql);
    $sql = "SELECT max(id_reklama) AS id FROM t_reklama";
    $r = execute_sql($sql);
    $m = sql_to_array($r, 'id');
    return $m[1];
}


//Выдает список top фотографий
function get_list_top_foto($id_reklama = 0)
{
    if ($id_reklama == 0) {
        $sql = "SELECT id_reklama, name_file, descr FROM t_reklama ORDER BY id_reklama";
    } else {
        $sql = "select id_reklama, name_file, descr from t_reklama where id_reklama=$id_reklama";
    }
    $r = execute_sql($sql);
    return $r;
}

//удаление top фотографии
function dlt_top_foto($id_reklama)
{
    $sql = "delete from t_reklama where id_reklama=$id_reklama";
    execute_sql($sql);
}

//обновление данных о top фотографии
function update_top_foto($id_reklama, $descr)
{
    $sql = "update t_reklama set descr='$descr' where id_reklama=$id_reklama";
    execute_sql($sql);
}

?>
