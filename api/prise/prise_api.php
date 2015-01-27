<?
/*
� ���� ������ ����������� ������� ��� ������ � �������

 _______________________________������ �������_________________________________

 										�1
function spisok_valut() - ������� ��������� ������ �����
�������� ���������: "���������� ������� t_valuts" � ������� ���������� sql �������

 										�2
function spisok_type_edinic_tovara() - ������� ��������� ������ ����� ������ ������
�������� ���������: "���������� ������� t_type_edinic" � ������� ���������� sql �������

										�3
function spisok_type_tovara() - ������� ��������� ������ ����� ������
�������� ���������: "���������� ������� t_type_tovar"

										�4
function add_type_tovar($name,$descr) - ������� ��������� ����� ��� ������ � ����
������� ���������: $name - �������� ������, $descr - �������� ������

										�5
function dlt_type_tovar($id) - ������� ������� ��� ������ �� ����
������� ���������: $id  - id ������

										�6
function updt_type_tovar($id,$new_name,$new_descr) - ������� ��������� ���������� � ���� ������
������� ���������: $id - id ���� ������, $new_name - ����� �������� ������,
				   $new_descr - ����� �������� ������

										�7
function spisok_proizvoditelei() - ������� ��������� ������ �������������� �������
�������� ���������: "���������� ������� t_proizvoditeli"

										�8
function add_proizvoditeli($name,$descr) - ������� ��������� ������ ������������� � ����
������� ���������: $name - �������� �������������, $descr - �������� �������������


										�9
function updt_proizvoditeli($id,$new_name,$new_descr) - ������� ��������� ���������� � ������������� �������
������� ���������: $id - id ���� �������������, $new_name - ����� �������� �������������,
				   $new_descr - ����� �������� �������������

				   						�10
function dlt_proizvoditel($id) - ������� ������� ������������� �� ����
������� ���������: $id  - id �������������

										�11
function spisok_tovarov($type_id) - ������� ��������� ������ ������� �� ��������� ����
������� ���������: $type_id - ��� ������
�������� ���������: t_tovar,t_types

										�12
function dlt_tovar($id) - ������� ������� ����� �� ������
������� ���������: $id - id ������

										�13
//������� ��������� ������� � �����
function add_in_prise($name="",$descr="",$cena=0,$valuta_id=0,$col=0,$edinica_id=0,$typ_id=0,$proizvod_id=0,$litle_img="",$big_img="",$predok_id=0,$fn1="",$fn2="",$cat_save_img="../../../api/prise/img/")
������� �������������� ���������: $name - ��� ������, $descr - �������� ������, $cena - ���� ������,
								  $valuta_id - ��� ������, $col - ���������� ������,
								  $edinica_id - ��� ���� ��������� ������(��, ��, ����),
								  $typ_id - ��� ���� ������, $proizvod_id - ��� ������������=0,
								  $litle_img="" - ��������� ��������, $big_img="" - ������� ��������,
								  $predok_id=0 - ��� ������������� ������, ����� ������ �������. ��� ������, � ������� ������ ���� �����. ������� ������ ������ �� ���� ��������.
								  $fn1,$fn2 - ����� ��������� � ������� �������� � ������������ ������, ���� �� ����������� - ����� + 3 �������
								  $cat_save_img - �������, ���� ��������� ��������

								  		�14
function info_tovar($id_tovar) - ������� ��������� ���������� � ������
������� ���������: $id_tovar - ���������
�������� ���������: t_tovar,t_types

										�15
function count_potomkov($id_tovar) - ������� ��������� ���������� �������� ��� ������
������� ���������: $id_tovar - ��� ������

										�16
function yes_podtovar_in_tovar($id_tovar,$id_podtovar) - ������� ��������� ������� ��������� � ������
������� ���������:	$id_tovar - ��� �����, $id_podtovar - ��� ���������
�������� ���������: false/true

										�17
function spisok_podtovarov($id_tovar) - ������� ��������� ������ ���������� ��� ������
������� ���������: $id_tovar - ��� ������
�������� ���������: ���������� ������� t_tovar

										�18
function str_cena_tovara($id) - ������� ��������� ���� ������ � ���� ������
������� ���������:	$id - ��� ������

										�19
function str_col_tovara($id) - ������� ��������� ���������� ������ � ���� ������
������� ���������:	$id - ��� ������

										�20
function str_proizvoditel_tovara($id) - ������� ��������� ������������� ������ � ���� ������
������� ���������:	$id - ��� ������

										�21
function name_litle_img_tovar($id,$cat_save_img="../../../api/prise/img/") - ������� ��������� ��� ����� � ��������� �������� ��� ������
������� ���������:	$id - ��� ������
					$cat_save_img - ������� � ���������, �������������� ��������.

										�22
function name_big_img_tovar($id,$cat_save_img="../../../api/prise/img/") - ������� ��������� ��� ����� � ������� �������� ��� ������
������� ���������:	$id - ��� ������
					$cat_save_img - ������� � ���������, �������������� ��������.

										�23
function id_predok_tovara($id_tovar) - ������� ��������� ������ ������
������� ���������: $id_tovar  -  ��� ������

										�24
function id_valuta_tovara($id_tovar) - ������� ��������� ��� ������ �� ������� ��������� �����
������� ���������: $id_tovar  -  ��� ������

										�25
function id_typ_tovar($id_tovar) - ������� ��������� ��� ���� ������
������� ���������: $id_tovar  -  ��� ������

										�26
function id_edinica_tovara($id_tovar) - ������� ��������� ��� ���� ������� ������ (��, ��, ...)
������� ���������: $id_tovar  -  ��� ������

										�27
function name_tovara($id_tovar) - ������� ��������� �������� ������
������� ���������: $id_tovar  -  ��� ������

										�28
function id_proizvoditel_tovara($id_tovar) - ������� ��������� ������������� ������
������� ���������: $id_tovar  -  ��� ������



										�29
������� ��������� ���������� � ������ � ������
function update_in_prise($id_tovar,$name="",$descr="",$cena=0,$valuta_id=0,$col=0,$edinica_id=0,$typ_id=0,$proizvod_id=0,$litle_img="",$big_img="",$predok_id=0,$fn1="",$fn2="",$cat_save_img="../../../api/prise/img/")
������� �������������� ���������: $id_tovar - ��� ������
������� �������������� ���������: $name - ��� ������, $descr - �������� ������, $cena - ���� ������,
								  $valuta_id - ��� ������, $col - ���������� ������,
								  $edinica_id - ��� ���� ��������� ������(��, ��, ����),
								  $typ_id - ��� ���� ������, $proizvod_id - ��� ������������=0,
								  $litle_img="" - ��������� ��������, $big_img="" - ������� ��������,
								  $predok_id=0 - ��� ������������� ������, ����� ������ �������. ��� ������, � ������� ������ ���� �����. ������� ������ ������ �� ���� ��������.
								  $fn1,$fn2 - ����� ��������� � ������� �������� � ������������ ������, ���� �� ����������� - ����� + 3 �������
								  $cat_save_img - �������, ���� ��������� ��������

								         �30
function save_prise_to_excel() - ������� ��������� ����� � Excel. 

										�31
������� ��������� id ���� ������� �� ������ �� ������� ���� ������, ���������� ���������� �� ���� �������� ��
function spisok_all_tavar;
�������� ���������: $id_tovar - ��� ������� � ������� sql �������

										�32
������� ������� ���������� ����� ������
function dlt_all_prise;

									    �33
������� �������� ���������� ������ � ��
function add_tovar_quick($name, $descr, $cena, $valuta, $name_type);
������� ���������:
	$name - �������� ������
	$descr - �������� ������
	$cena -  ���� ������
	$valuta - ���������� ������ ������
	$name_type - �������� ���� ������

										�34
������� ��������� id ���� ������� �� ����� ����, ���� ������ ���� ���, �� �� ��������� � ��
function id_type_tovar_from_name($name_type);
������� ���������:
	$name - �������� ���� ������

										�35
������� ��������� id ������ �� � �����, ���� ����� ������ ���, �� ��� ��������� � ��
function id_valuts_from_znak($znak);
������� ���������:
	$znak - ���� (����������� ������)
	

										�36
������� ��������� ����� ������ � ��
function add_valuts($znak, $name);
������� ���������:
		$znak - ���� ������
		$name - �������� ������
 */


//______________________________��� �������____________________________________

//������� ��������� ����� ������ � ��
function add_valuts($znak, $name)
{

    $znak = trim($znak);
    $name = trim($name);

    $s = "
		insert into
			t_valuts (znak, name)
		values
			('$znak','$name')";

    execute_sql($s);
}

//������� ��������� id ������ �� � �����, ���� ����� ������ ���, �� ��� ��������� � ��
function id_valuts_from_znak($znak)
{

    $s = "
 	select
		id
	from
		t_valuts
	where
		trim(upper(znak))=trim(upper('$znak'))
 ";

    $r = execute_sql($s);
    $m = sql_to_array($r, 'id');

    if (count($m[1]) == 0) {
        add_valuts($znak, $znak);
        return id_valuts_from_znak($znak);
    } else {
        return $m[1];
    }


}


//������� ��������� id ���� ������� �� ����� ����, ���� ������ ���� ���, �� �� ��������� � ��
function id_type_tovar_from_name($name_type)
{

    $s = "
 	select
		id
	from
		t_type_tovar
	where
		trim(upper(name))=trim(upper('$name_type'))
		and
		isactive='Y'
 ";

    $r = execute_sql($s);
    $m = sql_to_array($r, 'id');

    if (count($m) == 0) {
        add_type_tovar($name_type, " ");
        return id_type_tovar_from_name($name_type);
    } else {
        return $m[1];
    }


}


//�������  �������� ���������� ������ � ��
function add_tovar_quick($name, $descr, $cena, $valuta, $name_type)
{
    $typ_id = id_type_tovar_from_name($name_type);
    $valuta_id = id_valuts_from_znak($valuta);
    $col = 1;
    $edinica_id = 1;
    $z = spisok_proizvoditelei();
    $m = sql_to_array($z, 'id');
    if (count($m) > 0) {
        $proizvod_id = $m[1];
    } else {
        $proizvod_id = -1;
    }

    add_in_prise($name, $descr, $cena, $valuta_id, $col, $edinica_id, $typ_id, $proizvod_id);
}


//������� ������� ���������� ����� ������
function dlt_all_prise()
{

    $s = "
		update
			t_tovar
		set
			isactive='N'
		where
			isactive='Y'";

    execute_sql($s);

}

;

//������� ��������� ����� � Excel. 
function save_prise_to_excel()
{
    header("Content-type: application/vnd.ms-excel");
    out_all_prise_to_table();
}

//------------------

//������� ��������� id ���� ������� �� ������ �� ������� ���� ������, ���������� ���������� �� ���� �������� ��
function spisok_all_tavar()
{
    $s = "
SELECT
      t_tovar.id
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.isactive='Y')
     AND
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
     AND
     (t_type_tovar.isactive='Y')
     AND
     (t_tovar.id=t_tovar.predok_id)
ORDER BY
      t_type_tovar.name, t_tovar.name
	";

    $r = execute_sql($s);

    return $r;
}

//������� ������� ����� �� ����� � ���� �������, � ������� ��� ������� ���������� � ��� ���� ������� ������������. 
function out_all_prise_to_table()
{

    set_local_var("LV_name_type_prise_api.php", "");
    $r = spisok_all_tavar();
    $m = sql_to_array($r, 'id');
    $count_tovarov = 0;
    echo "<table border=1>";

    echo "<tr><th>� �������</th><th>��������</th><th>��������</th><th colspan='2'>���������</th></tr>";

    for ($i = 1; $i <= count($m); $i++) {

        $id = $m[$i];

        $count_tovarov = $count_tovarov + 1;

        $c = count_potomkov($id);

        if ($c == 0) {
            stroka_about_tovar_in_table($id, $count_tovarov);
        } else {
            stroka_about_tovar_in_table($id, $count_tovarov);
            save_potomki_tovarov_in_table($id, $count_tovarov);
        }
    }

    echo "</table>";

}

//������� ���������� � ������� ������� ���������� ��� ������� ������
function stroka_about_tovar_in_table($id_tovar, $prefiks)
{

    $sql_txt = "
SELECT
      t_tovar.name, t_tovar.descr, t_tovar.cena, t_valuts.znak,t_type_tovar.`name` as name_type
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
	AND
	 (t_tovar.id=$id_tovar)
";

    $r = execute_sql($sql_txt);
    $name = sql_to_array($r, 'name');
    $descr = sql_to_array($r, 'descr');
    $cena = sql_to_array($r, 'cena');
    $znak = sql_to_array($r, 'znak');
    $name_type = sql_to_array($r, 'name_type');


    $old_name_type = get_local_var("LV_name_type_prise_api.php");

    if ($name_type[1] != $old_name_type) {
        echo "<tr><td colspan='5' bgcolor='#ffffcc'>$prefiks - $name_type[1]</td></tr>";
    }
    $s = "<tr align='right'><td>" . $prefiks . "</td><td>" . $name[1] . "</td><td>" . $descr[1] . "</td><td>" . $cena[1] . "</td><td>" . $znak[1] . "</td></tr>";
    echo "$s";

    set_local_var("LV_name_type_prise_api.php", $name_type[1]);
}

//������� ���������� ���������� � ���� ���� �������� ��� ������� ������
function save_potomki_tovarov_in_table($id_tovar, $prefiks)
{
    $s = "
SELECT
      t_tovar.id
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.isactive='Y')
     AND
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
     AND
     (t_type_tovar.isactive='Y')
     AND
     (t_tovar.predok_id=$id_tovar)
	 AND
	 (t_tovar.id<>t_tovar.predok_id)
ORDER BY
      t_type_tovar.name, t_tovar.name
	";

    $r = execute_sql($s);
    $m = sql_to_array($r, 'id');
    $count_tovarov = 0;

    for ($i = 1; $i <= count($m); $i++) {

        $id = $m[$i];

        $count_tovarov = $count_tovarov + 1;

        $c = count_potomkov($id);

        $new_prefiks = $prefiks . " -> " . $count_tovarov;

        if ($c == 0) {
            stroka_about_tovar_in_table($id, $new_prefiks);
        } else {
            stroka_about_tovar_in_table($id, $new_prefiks);
            save_potomki_tovarov_in_table($id, $new_prefiks);
        }
    }
}


//---------------

//������� ��������� ����� � ����. 
function save_prise_to_file($name_file)
{


    $f = fopen($name_file, "w");

    if (!($f)) {
        echo "<br><h1><font color='#ff0000'>ERROR: �� ������� ������� ���� - " . $name_file . "</font></h1><br>";
        exit;
    }
    fclose($f);

    $s = "
SELECT
      t_tovar.id
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.isactive='Y')
     AND
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
     AND
     (t_type_tovar.isactive='Y')
     AND
     (t_tovar.id=t_tovar.predok_id)
ORDER BY
      t_type_tovar.name, t_tovar.name
	";

    $r = execute_sql($s);

    $m = sql_to_array($r, 'id');
    $count_tovarov = 0;
    for ($i = 1; $i <= count($m); $i++) {

        $id = $m[$i];

        $count_tovarov = $count_tovarov + 1;

        $c = count_potomkov($id);

        if ($c == 0) {
            stroka_about_tovar_in_file($id, $count_tovarov, $name_file);
        } else {
            stroka_about_tovar_in_file($id, $count_tovarov, $name_file);
            save_potomki_tovarov_in_file($id, $count_tovarov, $name_file);
        }
    }


}

//������� ���������� � ���� ������� ���������� ��� ������� ������
function stroka_about_tovar_in_file($id_tovar, $prefiks, $name_file)
{

    $sql_txt = "
SELECT
      t_tovar.name, t_tovar.descr, t_tovar.cena, t_valuts.znak,t_type_tovar.`name` as name_type
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
	AND
	 (t_tovar.id=$id_tovar)
";

    $r = execute_sql($sql_txt);
    $name = sql_to_array($r, 'name');
    $descr = sql_to_array($r, 'descr');
    $cena = sql_to_array($r, 'cena');
    $znak = sql_to_array($r, 'znak');
    $name_type = sql_to_array($r, 'name_type');
    $f = fopen($name_file, "a");
    $s = $prefiks . ";" . $name[1] . ";" . $descr[1] . ";" . $cena[1] . ";" . $znak[1] . ";" . $name_type[1] . ";" . "\n";
    fputs($f, $s);
    fclose($f);

}

//������� ���������� ���������� � ���� ���� �������� ��� ������� ������
function save_potomki_tovarov_in_file($id_tovar, $prefiks, $name_file)
{
    $s = "
SELECT
      t_tovar.id
FROM
    t_tovar, t_valuts, t_types, t_type_tovar
where
     (t_tovar.isactive='Y')
     AND
     (t_tovar.valuta_id=t_valuts.id)
     AND
     (t_types.tovar_id=t_tovar.id)
     AND
     (t_type_tovar.id=t_types.type_id)
     AND
     (t_type_tovar.isactive='Y')
     AND
     (t_tovar.predok_id=$id_tovar)
	 AND
	 (t_tovar.id<>t_tovar.predok_id)
ORDER BY
      t_type_tovar.name, t_tovar.name
	";

    $r = execute_sql($s);
    $m = sql_to_array($r, 'id');
    $count_tovarov = 0;

    for ($i = 1; $i <= count($m); $i++) {

        $id = $m[$i];

        $count_tovarov = $count_tovarov + 1;

        $c = count_potomkov($id);

        $new_prefiks = $prefiks . "." . $count_tovarov;

        if ($c == 0) {
            stroka_about_tovar_in_file($id, $new_prefiks, $name_file);
        } else {
            stroka_about_tovar_in_file($id, $new_prefiks, $name_file);
            save_potomki_tovarov_in_file($id, $new_prefiks, $name_file);
        }
    }
}


//������� ��������� ���������� � ������ � ������
function update_in_prise($id_tovar, $name = "", $descr = "", $cena = 0, $valuta_id = 0, $col = 0, $edinica_id = 0, $typ_id = 0, $proizvod_id = 0, $litle_img = "", $big_img = "", $predok_id = 0, $fn1 = "", $fn2 = "", $cat_save_img = "../../../api/prise/img/")
{
    $z = "update
		t_tovar
	set
		name='$name',
		descr='$descr',
		cena=$cena,
		valuta_id=$valuta_id,
		count=$col,
		edinica_id=$edinica_id,
		proizvoditel_id=$proizvod_id
	where
		id=$id_tovar";
    execute_sql($z);

    $z = "update
		t_types
	set
		type_id=$typ_id
	where
		tovar_id=$id_tovar";
    execute_sql($z);

    $i = strlen($fn1);
    if ((file_exists($litle_img)) && ($i >= 4)) {
        $i = $i - 1;
        $r = $fn1[$i - 2] . $fn1[$i - 1] . $fn1[$i];
        $k = 0;
        while (true) {
            $new_name = $cat_save_img . $k . "." . $r;
            $k = $k + 1;
            if (!(file_exists($new_name))) {
                break;
            }
        }
        copy($litle_img, $new_name);
        $file1 = basename($new_name);
    } else {
        $file1 = "";
    }

    $i = strlen($fn2);
    if ((file_exists($big_img)) && ($i >= 4)) {
        $i = $i - 1;
        $r = $fn2[$i - 2] . $fn2[$i - 1] . $fn2[$i];
        $k = 0;
        while (true) {
            $new_name = $cat_save_img . $k . "." . $r;
            $k = $k + 1;
            if (!(file_exists($new_name))) {
                break;
            }
        }
        copy($big_img, $new_name);
        $file2 = basename($new_name);
    } else {
        $file2 = "";
    }

    if ($file1 != "") {
        $z = "update
						t_tovar
					set
						img_litle='$file1'
					where
						id=$id_tovar";
        execute_sql($z);
    }

    if ($file2 != "") {
        $z = "update
						t_tovar
					set
						img_big='$file2'
					where
						id=$id_tovar";
        execute_sql($z);
    }
}

//������� ��������� ������������� ������
function id_proizvoditel_tovara($id_tovar)
{
    $z = "select proizvoditel_id from t_tovar where id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "proizvoditel_id");
    return $i[1];
}

//������� ��������� �������� ������
function name_tovara($id_tovar)
{
    $z = "select name from t_tovar where id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "name");
    return $i[1];
}


//������� ��������� ��� ���� ������� ������ (��, ��, ...)
function id_edinica_tovara($id_tovar)
{
    $z = "select edinica_id from t_tovar where id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "edinica_id");
    return $i[1];
}

//������� ��������� ��� ���� ������
function id_typ_tovar($id_tovar)
{
    $z = "select type_id from t_types where tovar_id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "type_id");
    return $i[1];
}

//������� ��������� ��� ������ �� ������� ��������� �����
function id_valuta_tovara($id_tovar)
{
    $z = "select valuta_id from t_tovar where id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "valuta_id");
    return $i[1];
}

//������� ��������� ������ ������
function id_predok_tovara($id_tovar)
{
    $z = "select predok_id from  t_tovar  where id=$id_tovar";
    $r = execute_sql($z);
    $i = sql_to_array($r, "predok_id");
    return $i[1];
}

//������� ��������� ��� ����� � ������� �������� ��� ������
function name_big_img_tovar($id, $cat_save_img = "../../../api/prise/img/")
{
    $z = "select img_big from t_tovar where id=$id";
    $r = execute_sql($z);
    $i = sql_to_array($r, "img_big");
    $f = $cat_save_img . $i[1];

    if (($i[1] != "") && (file_exists($f))) {
        $r = $f;
    } else {
        $r = "";
    }
    return $r;
}

//������� ��������� ��� ����� � ��������� �������� ��� ������
function name_litle_img_tovar($id, $cat_save_img = "../../../api/prise/img/")
{
    $z = "select img_litle from t_tovar where id=$id";
    $r = execute_sql($z);
    $i = sql_to_array($r, "img_litle");
    $f = $cat_save_img . $i[1];

    if (($i[1] != "") && (file_exists($f))) {
        $r = $f;
    } else {
        $r = "";
    }
    return $r;
}

//������� ��������� ������������� ������ � ���� ������
function str_proizvoditel_tovara($id)
{
    $z = "select t_proizvoditeli.name from t_tovar,t_proizvoditeli where(t_tovar.id=$id)and(t_tovar.proizvoditel_id=t_proizvoditeli.id)";
    $r = execute_sql($z);
    $c = sql_to_array($r, "t_proizvoditeli.name");
    if (count($c) == 0) {
        $rez = "&nbsp;";
    } else {
        $rez = $c[1];
    }
    return $rez;
}


//������� ��������� ���������� ������ � ���� ������
function str_col_tovara($id)
{
    $z = "select * from t_tovar,t_type_edinic where(t_tovar.id=$id)and(t_tovar.edinica_id=t_type_edinic.id)";
    $r = execute_sql($z);
    $c = sql_to_array($r, "count");
    $z = sql_to_array($r, "t_type_edinic.name");
    if (count($c) > 0) {
        if ($c[1] == 0) {
            $rez = "&nbsp;";
        } else {
            $rez = $c[1] . " " . $z[1];
        }
    } else {
        $rez = "&nbsp;";
    }
    return $rez;
}

//������� ��������� ���� ������ � ���� ������
function str_cena_tovara($id)
{
    $z = "select * from t_tovar,t_valuts where(t_tovar.id=$id)and(t_valuts.id=t_tovar.valuta_id)";
    $r = execute_sql($z);
    $c = sql_to_array($r, "cena");
    $z = sql_to_array($r, "t_valuts.znak");
    if ($c[1] == 0) {
        $rez = "&nbsp;";
    } else {
        $rez = $c[1] . " " . $z[1];
    }
    return $rez;
}


//������� ��������� ������� ��������� � ������
function yes_podtovar_in_tovar($id_tovar, $id_podtovar)
{
    $z = "select id from t_tovar where (isactive='Y')and(predok_id=$id_tovar)and(id<>predok_id)";
    $r = execute_sql($z);
    $m = sql_to_array($r, "id");
    $b = false;
    for ($i = 1; $i <= count($m); $i++) {
        if ($m[$i] == $id_podtovar) {
            $b = true;
            break;
        }
        if ($m[$i] != $id_podtovar) {
            $b = yes_podtovar_in_tovar($m[$i], $id_podtovar);
            if ($b == true) {
                break;
            }
        }
    }
    return $b;
}

//������� ��������� ������ ���������� ��� ������
function spisok_podtovarov($id_tovar)
{
    $z = "select * from t_tovar where (isactive='Y')AND(predok_id=$id_tovar)and(predok_id<>id)";
    return execute_sql($z);
}

//������� ��������� ���������� �������� ��� ������
function count_potomkov($id_tovar)
{
    $z = "select count(id) as c from t_tovar where (id<>predok_id)and(isactive='Y')and(predok_id=$id_tovar)";
    $r = execute_sql($z);
    $m = sql_to_array($r, "c");
    return $m[1];

}

//������� ��������� ���������� � ������
function info_tovar($id_tovar)
{
    $z = "select * from t_tovar, t_types where (t_tovar.id=t_types.tovar_id)and(t_tovar.id=$id_tovar)";
    return execute_sql($z);
}

//������� ������� ����� �� ������
function dlt_tovar($id)
{
    $z = "update t_tovar set isactive='N' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ ������� �� ��������� ����
function spisok_tovarov($type_id)
{
    $z = "SELECT * from t_tovar,t_types where (t_types.type_id=$type_id)AND(t_tovar.id=t_types.tovar_id)and(t_tovar.isactive='Y')and(t_tovar.id=t_tovar.predok_id)";
    return execute_sql($z);
}

//������� ��������� ��������� id ��� ������
function new_id_from_t_tovar()
{

    $z = "select max(id) as id from t_tovar";
    $r = execute_sql($z);
    $m = sql_to_array($r, "id");

    $old_id = get_global_var('GV_max_id_t_tovar_prise_api.php');

    $id = $m[1] + 1;

    if ($old_id > $id) {
        $id = $old_id + 1;
    }

    set_global_var('GV_max_id_t_tovar_prise_api.php', $id);

    return $id;


}


//������� ��������� ������� � �����
function add_in_prise($name = "", $descr = "", $cena = 0, $valuta_id = 0, $col = 0, $edinica_id = 0, $typ_id = 0, $proizvod_id = 0, $litle_img = "", $big_img = "", $predok_id = 0, $fn1 = "", $fn2 = "", $cat_save_img = "../../../api/prise/img/")
{

    $i = strlen($fn1);
    if ((file_exists($litle_img)) && ($i >= 4)) {
        $i = $i - 1;
        $r = $fn1[$i - 2] . $fn1[$i - 1] . $fn1[$i];
        $k = 0;
        while (true) {
            $new_name = $cat_save_img . $k . "." . $r;
            $k = $k + 1;
            if (!(file_exists($new_name))) {
                break;
            }
        }
        copy($litle_img, $new_name);
        $file1 = basename($new_name);
    } else {
        $file1 = "";
    }

    $i = strlen($fn2);
    if ((file_exists($big_img)) && ($i >= 4)) {
        $i = $i - 1;
        $r = $fn2[$i - 2] . $fn2[$i - 1] . $fn2[$i];
        $k = 0;
        while (true) {
            $new_name = $cat_save_img . $k . "." . $r;
            $k = $k + 1;
            if (!(file_exists($new_name))) {
                break;
            }
        }
        copy($big_img, $new_name);
        $file2 = basename($new_name);
    } else {
        $file2 = "";
    }

    $id = new_id_from_t_tovar();

    if ($predok_id == 0) {
        $predok_id = $id;
    }

    $cena = str_replace(",", ".", $cena);
    $descr = trim($descr);
    if ($descr == "") {
        $descr = " ";
    }
    $name = trim($name);
    if ($name == "") {
        $name = " ";
    }
    $z = "insert
 		into t_tovar
		( id, predok_id, name, descr, cena, valuta_id, count, edinica_id, proizvoditel_id,img_litle,img_big)
	values
		($id, $predok_id,'$name','$descr', $cena ,$valuta_id,$col,$edinica_id,$proizvod_id,'$file1','$file2')
	";

    execute_sql($z);

    if ($predok_id != $id) {
        $z = "select type_id from t_types where tovar_id=$predok_id";
        $r = execute_sql($z);
        $m = sql_to_array($r, "type_id");
        $typ_id = $m[1];
    }

    $z = "insert
 			into t_types
			(type_id,tovar_id)
	 values($typ_id,$id)";
    execute_sql($z);
}

//������� ������� ������������� �� ����
function dlt_proizvoditel($id)
{
    $z = "update t_proizvoditeli set isactive='N'  where id=" . $id;
    execute_sql($z);
}

//������� ��������� ���������� � ������������� �������
function updt_proizvoditeli($id, $new_name, $new_descr)
{
    $z = "update t_proizvoditeli set name='$new_name', descr='$new_descr' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ ������������� � ����
function add_proizvoditeli($name, $descr)
{
    $z = "insert into t_proizvoditeli (name, descr) values('" . $name . "','" . $descr . "')";
    execute_sql($z);
}

//������� ��������� ������ �������������� �������
function spisok_proizvoditelei()
{
    $z = "select id,name,descr from t_proizvoditeli where isactive='Y'";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���������� � ���� �������
function updt_type_tovar($id, $new_name, $new_descr)
{
    $z = "update t_type_tovar set name='$new_name', descr='$new_descr' where id=$id";
    execute_sql($z);
}

//������� ������� ��� �� ����
function dlt_type_tovar($id)
{
    $z = "update t_type_tovar set isactive='N'  where id=" . $id;
    execute_sql($z);
}


//������� ��������� ����� ��� ������ � ����
function add_type_tovar($name, $descr)
{
    $z = "insert into t_type_tovar (name, descr) values('" . $name . "','" . $descr . "')";
    execute_sql($z);
}

//������� ��������� ������ ����� �������
function spisok_type_tovara()
{
    $z = "select id,name,descr from t_type_tovar where isactive='Y'";
    $r = execute_sql($z);
    return $r;

}

//������� ��������� ������ �����
function spisok_valut()
{
    $z = "select * from t_valuts";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �����
function spisok_type_edinic_tovara()
{
    $z = "select * from t_type_edinic where isactive='Y'";
    $r = execute_sql($z);
    return $r;
}


?>