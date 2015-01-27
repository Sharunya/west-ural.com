<?
/*
� ���� ������ ����������� ������� ��� ������ � ������������


 _______________________________������ �������_________________________________

 										�1
function spisok_otvet() - ������� ��������� ������ ��������� �������
�������� ���������: "���������� ������� t_otvet" � ������� ���������� sql �������

 										�2
function add_otvet($name) - ������� ��������� ����� ������� ������ � ����
������� ���������: $name - �������� ������

										�3
function dlt_otvet($id) - ������� ������� ������� ������ �� ����
������� ���������: $id  - id ������

										�4
function updt_otvet($id,$new_name) - ������� ��������� ���������� �� ������
������� ���������: $id - id ������, $new_name - ����� �������� ������

										�5
function spisok_vopros() - ������� ��������� ������ ��� ��� �����������
�������� ���������: ���������� ������� t_golosovanie � ���������� ����

										�6
function add_vopros($name,$descr,$vopros) - ������� ��������� ����� ���� ��� ����������� � ����
������� ���������: $name - �������� ����, $descr - �������� ����, $vopros � ������


										�7
function updt_vopros($id,$new_name,$new_descr, $new_vopros) - ������� ��������� ���������� � ���� �����������
������� ���������: $id - id ����, $new_name - ����� �������� ����,
				   $new_descr - ����� �������� ����, $new_vopros � ����� ������ ��� �����������

				   						�8
function dlt_vopros_logical($id) - ������� ������� ���� ��� ����������� �� ����
������� ���������: $id  - id ����

										�9
function spisok_otvet_golos($vopros_id) - ������� ��������� ������ ������� �� �������� ���� ��� �����������
������� ���������: $vopros_id - ���� ��� �����������
�������� ���������: ������ ������� �� t_rez_gol ��� �������� ���� ��� �����������


										�10
function add_count($vopros_id,$otvet_id) - ������� ��������� ������� � ������� ������ ��� �������� ���� ��� �����������
������� ���������: $vopros_id - ���� ��� �����������, $otvet_id � ������ � ����


										�11
function add_rez_gol($vopros_id,$otvet_id) - ������� ��������� ����� ������ � ������ ��������� � t_rez_gol 
������� ���������: $vopros_id - ���� ��� �����������, $otvet_id � ������ � ����

										�12
function correct($str) - ��������� �� ������������ ������ �� �����, ��������������� ��� �������� � �� 
������� ���������: $str - ������ ��� ��������
�������� ���������:  - ������ ��� ������ ��������

										�13
function upd_otvet_isactive($name_otvet) - ��������������� isactive � "y" ��� ������ � ������ $name_otvet 
������� ���������: $name_otvet - ��� ������

 										�14
function get_vopros($vopros_id) - ������� ��������� ���� ��� ����������� �� id
������� ���������: $vopros_id - ���� ��� �����������
�������� ���������: ������ �� ������� t_golosovanie

 										�15
function spisok_all_vopros() - ������� ��������� ������ ���� ��� ��� ����������� (�������� � ��� �����)
�������� ���������: ���������� ������� t_golosovanie

 										�16
function get_id_vopros() - ������� ������� ���� �� ��������, �������� � ������� � ���������� � 
������� ���������: $new_name - �������� ����,
				   $new_descr - �������� ����, $new_vopros � ������ ��� �����������
�������� ���������: ������ �� ������� t_golosovanie 


 										�17
function dlt_rez_gol($vopros_id,$otvet_id) - ������� ������� ���������� ����������� ��� ���������� ������� � ������  
������� ���������: $vopros_id - ���� ��� �����������, $otvet_id � ������ � ����

										�18
function spisok_del_vopros() - ������� ��������� ������ ����������� ��� �����������
�������� ���������: ���������� ������� t_golosovanie � ���������� ����

										�19
function isactive_vopros($id,$val_active) - ������� ������ ��������/���������� ���� �����������
������� ���������: $id - id ����, $val_active - �������� isactive

										�20
function create_grafic($id) - ������� ������ ������ ��� ���� �����������, ������ ����-������� � ������� JPEG
������� ���������: $id - id ����

										�21
function spisok_otvet_free($vopros_id) - ������� ��������� ������ �������, �� ����������� � �������� ���� ��� �����������
������� ���������: $vopros_id - ���� ��� �����������
�������� ���������: ������ ������� �� t_rez_gol, �� ����������� � �������� ���� ��� �����������

 										�22
function get_id_otvet($otvet) - ������� ��������� ����� �� �����
������� ���������: $otvet - ��� ������
�������� ���������: ������ �� ������� t_otvet 

										�23
function count_povtor($name,$descr,$vopros) - ������� ������ ��������, ���� �� ����� ������ � t_golosovanie
������� ���������: $name - �������� ����, $descr - �������� ����, $vopros � ������
�������� ���������: 0 - ���, id ������ - ����


										�24
function count_povtor_otvet($name) - ������� ������ ��������, ���� �� ����� ������ � t_otvet
������� ���������: $name - �������� ������
�������� ���������: 0 - ���, id ������ - ����		

		   								�25
function dlt_vopros_fisical($id) - ������� ������� ���� ��� ����������� �� ���� ���������
������� ���������: $id  - id ����

// ������� ������ ������� ���� �����������	� 26
function isshow_vopros($id,$val_show)



 */


//______________________________��� �������____________________________________

//������� ��������� ������ ��������� ������� � 1
function spisok_otvet()
{
    $z = "select id,name from t_otvet where isactive='Y' order by 2";
    $r = execute_sql($z);
    return $r;

}

//������� ��������� ����� ������� ������ � ���� �2
function add_otvet($name)
{
    $name = trim($name);
    $z = "insert into t_otvet (name) values('" . $name . "')";
    execute_sql($z);
}

//������� ������� ������� ������ �� ���� �3
function dlt_otvet($id)
{
    $z = "update t_otvet set isactive='N' where id=$id";
    execute_sql($z);
}

//������� ��������� ���������� �� ������ �4
function updt_otvet($id, $new_name)
{
    $z = "update t_otvet set name='$new_name' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ �������� ��� ��� ����������� �5
function spisok_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where isactive='Y'";
    $r = execute_sql($z);
    return $r;
}


//������� ��������� ����� ���� ��� ����������� � ���� �6
function add_vopros($name, $descr, $vopros)
{
// ��������� ���� � ������� ��� SQL �������
    $dat = date("Y") . '-' . date("m") . '-' . date("d");
    $name = trim($name);
    $descr = trim($descr);
    $vopros = trim($vopros);
    $z = "insert into t_golosovanie (name, descr, vopros,data_voprosa) values('" . $name . "','" . $descr . "','" . $vopros . "','" . $dat . "')";
    execute_sql($z);
}


//	������� ��������� ���������� � ���� �����������	�7
function updt_vopros($id, $new_name, $new_descr, $new_vopros)
{
    // ��������� ���� � ������� ��� SQL �������
    $dat = date("Y") . '-' . date("m") . '-' . date("d");
    $new_name = trim($new_name);
    $new_descr = trim($new_descr);
    $new_vopros = trim($new_vopros);
    $z = "update t_golosovanie set name='$new_name', descr='$new_descr', vopros='$new_vopros', data_voprosa='$dat' where id=$id";
    execute_sql($z);
}

//������� ������� ���� ��� ����������� �� ���� ��������� �8
function dlt_vopros_logical($id)
{
    $z = "update t_golosovanie set isactive='N' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ ������� �� �������� ���� ��� �����������	�9
function spisok_otvet_golos($vopros_id)
{
    $z = "select * from t_otvet,t_golosovanie,t_rez_gol where (t_golosovanie.id=t_rez_gol.golos_id)and(t_otvet.id=t_rez_gol.otvet_id)and(t_golosovanie.id='$vopros_id') order by t_otvet.name";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������� � ������� ������ ��� �������� ���� ��� �����������	�10
function add_count($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    $z = "update t_rez_gol set count=count+1 where (otvet_id=$otvet_id)and(golos_id=$vopros_id)";
    execute_sql($z);
}

// ������� ��������� ����� ������ � ������ ��������� � t_rez_gol �11
function add_rez_gol($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    //��������, ���� �� � �� ����� ����� ������
    $z_count = "select id from t_rez_gol where (golos_id=$vopros_id)and(otvet_id=$otvet_id)";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    $povt = count($count_povtor);
    if ($povt == 0) {
        $z = "insert into t_rez_gol (golos_id, otvet_id, count) values(" . $vopros_id . ", " . $otvet_id . ", 0)";
        execute_sql($z);
    }
}


// ��������������� isactive � "y" ��� ������ � ������ $name_otvet �13
function upd_otvet_isactive($id_otvet)
{
    $z = "update t_otvet set isactive='Y' where id=$id_otvet";
    execute_sql($z);
}

// ������� ��������� ���� ��� ����������� �� id �14
function get_vopros($vopros_id)
{
    $vopros_id = intval($vopros_id);
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where id=$vopros_id";
    $r = execute_sql($z);
    return $r;
}

// ������� ��������� ������ ���� ��� ��� ����������� (�������� � ��� �����) �15
function spisok_all_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie";
    $r = execute_sql($z);
    return $r;
}

//	������� ������� ���� �� ��������, �������� � ������� � ���������� � �16
function get_id_vopros($new_name, $new_descr, $new_vopros)
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where (name='$new_name')and(descr='$new_descr')and(vopros='$new_vopros')";
    $r = execute_sql($z);
    return $r;
}

//	������� ������� ���������� ����������� ��� ���������� ������� � ������ �17
function dlt_rez_gol($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    $z = "delete from t_rez_gol where(golos_id=$vopros_id)and(otvet_id=$otvet_id)";
    execute_sql($z);
}

// ������� ��������� ������ �������� ��� ��� ����������� �18
function spisok_del_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa from t_golosovanie where isactive='N'";
    $r = execute_sql($z);
    return $r;
}

// ������� ������ �������� ���� �����������	�19
function isactive_vopros($id, $val_active)
{
    $z = "update t_golosovanie set isactive='$val_active' where id=$id";
    execute_sql($z);
}


// ���������� ��������

// ������� ������ ������ ��� ���� �����������, ������ ����-������� � ������� JPEG  �20
function create_grafic($id)
{
//  �������� ������ ������� ��� ������� �������
    $z = spisok_otvet_golos($id);
//  ������ � id, ������ � ��������� �������
    $otv_id = sql_to_array($z, "id");
    $otv_name = sql_to_array($z, "name");
    $otv_count = sql_to_array($z, "count");
//  ���������� �������
    $col_row = count($otv_id);
//  ����� ����� ���� �������	
    $sum_v = 0;
    for ($i = $col_row; $i >= 1; $i--) {
        $sum_v = $sum_v + intval($otv_count[$i]);
    }

    // ��������������� ������� ��� ���������� �������
    // ��������� �������� ��������
    $width = 500; // ���. �����. � ��������
    $left_margin = 50; // ������ ����� �� �����������
    $right_margin = 50; // �� �� ������
    $bar_height = 15; // ������ ����� ������(�������) �����������
    $bar_spacing = $bar_height / 2;// ������� �� ������(�������) �����������
    $font = 'veranda';
    $main_size = 12; // � �������
    $small_size = 12; // � �������
    $text_indent = 10; // ��������� ��������� ����� �����


    // ��������� ��������� ����� ��� ���������
    $x = $left_margin + 100; // ����� ������� ����� �������
    $y = 20;
    $bar_unit = ($width - ($x + $right_margin)) / 100; //���� "����� �� �����������"
    $height = $col_row * ($bar_height + $bar_spacing) + 30; // ������� ������ �������������� ���� ���������� ���� ����

    // �������� ������� ������
    $im = imagecreate($width, $height);

    // ���������� ������

    $white = ImageColorAllocate($im, 255, 255, 255);
    $blue = ImageColorAllocate($im, 0, 64, 250);
    $black = ImageColorAllocate($im, 0, 0, 0);
    $pink = ImageColorAllocate($im, 255, 78, 243);

    $text_color = $white;
    $percent_color = $white;
    $bg_color = $blue;
    $line_color = $pink;
    $bar_color = $pink;
    $number_color = $pink;

    //�������� ���� ��� ���������
    ImageFilledRectangle($im, 0, 0, $width, $height, $bg_color);

    // ����� ������ � ���� �������
    for ($i = $col_row; $i >= 1; $i--) {
        if ($sum_v > 0)
            $percent = intval(round(($otv_count[$i] / $sum_v) * 100));
        else
            $percent = 0;
//--------------------------------------------------
        //����� ��������� ��� ������� ��������
        ImageString($im, $main_size, $width - 30, $y + ($bar_height / 2), $percent . '%', $percent_color);
        if ($sum_v > 0)
            $right_value = intval(round(($otv_count[$i] / $sum_v) * 100));
        else
            $right_value = 0;
        // ����� ������ ��� ������� ��������
        $bar_length = $x + ($right_value * $bar_unit);

        //����� ������ ��� ������� ��������
        ImageFilledRectangle($im, $x, $y - 2, $bar_length, $y + $bar_height, $bar_color);

        //����� ��������� ��� ������� ��������
        ImageString($im, $small_size, $text_indent, $y + ($bar_height / 2), $otv_name[$i], $text_color);

        //���������� �������, ���������������� 100%
        ImageRectangle($im, $bar_length + 1, $y - 2, ($x + (100 * $bar_unit)), $y + $bar_height, $line_color);

        //����� �����
        ImageString($im, $small_size, $x + (100 * $bar_unit) - 50, $y + ($bar_height / 2), $otv_count[$i] . '/' . $sum_v, $number_color);

        //����� � ��������� ������
        $y = $y + ($bar_height + $bar_spacing);
    }
    //������� �������� � ����
    imageJpeg($im, "MyGraf1.jpg");

    //������������ ��������
    ImageDestroy($im);
}


//������� ��������� ������ �������, �� ����������� � �������� ���� ��� �����������
function spisok_otvet_free($vopros_id)
{
//  �������� id �������, ������� ��� ���� � ������� ������� � ���������� �� � ������
    $z1 = "select distinct otvet_id from t_rez_gol where (golos_id=" . $vopros_id . ")";
    $rez = execute_sql($z1);
    $id_otvet_mas = sql_to_array($rez, "otvet_id");
    $colvo = count($id_otvet_mas);
    if ($colvo != 0) {
// ��������� ������ ������� ��� ���� ���������� id �������
        $str = "select * from t_otvet where (id not in(";
        $str = $str . $id_otvet_mas[count($id_otvet_mas)];
        for ($i = count($id_otvet_mas) - 1; $i >= 1; $i--) {
            $str = $str . "," . $id_otvet_mas[$i];
        }
        $str = $str . ")and isactive='Y')order by name";
    } else $str = "select * from t_otvet where isactive='Y' order by name";
    $z = "$str";
    $r = execute_sql($z);
    return $r;
}


//	������� ��������� id ������ �� ����� �22
function get_id_otvet($otvet)
{
    $z = "select * from t_otvet where (name='$otvet')";
    $r = execute_sql($z);
    return $r;
}

// ������� ������ ��������, ���� �� ����� ������ � t_golosovanie  �23
function count_povtor($name, $descr, $vopros)
{
    $povtor = 0;
    $name = trim($name);
    $descr = trim($descr);
    $vopros = trim($vopros);
//��������, ���� �� � �� ���� � ����� ���������, ��������� � ��������
    $z_count = "select id from t_golosovanie where (name='$name')and(descr='$descr')and(vopros='$vopros')";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    if (count($count_povtor) != 0) $povtor = $count_povtor[1];
    return $povtor;
}


// ������� ������ ��������, ���� �� ����� ������ � t_otvet  �24
function count_povtor_otvet($name)
{
    $povtor = 0;
    $name = trim($name);
//��������, ���� �� � �� ����� � ����� ������
    $z_count = "select * from t_otvet where (name='$name')";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    $isactive_povtor = sql_to_array($rez, "isactive");
    if (count($count_povtor) != 0) {
        if ($isactive_povtor[1] == "Y") $povtor = 1; else $povtor = $count_povtor[1];
    }
    return $povtor;
}

//������� ������� ���� ��� ����������� �� ���� ��������� �25
function dlt_vopros_fisical()
{
    $z = "delete from t_golosovanie where isactive='N'";
    execute_sql($z);
}

// ������� ������ ������� ���� �����������	� 26
function isshow_vopros($id, $val_show)
{
    $z = "update t_golosovanie set isshow='$val_show' where id=$id";
    execute_sql($z);
}

?>