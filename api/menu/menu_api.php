<?

/*
� ���� ������ ����������� ������� ��� ������ � ���������


 _______________________________������ �������_________________________________

 									 � 1

//������� ��������� ������ ������� ����
function spisok_punkt()

                                    � 2
//������� ��������� ����� ���� � ����
function add_punkt($name,$alt,$metod,$url_svyaz,$type_menu)
������� ���������: $name - �����, $alt - ���������, $url_svyaz - �������� ��������� ��������, metod - _self _blank, $type_menu - ��� ������ ��� ����

                                    � 3
//������� ������� ����� ����
function del_punkt($id)
������� ���������: $id - id ������

                                    � 4
//������� ��������� ����� ����
function update_punkt($id,$name,$alt,$metod,$url_svyaz,$type_menu)
������� ���������:$id - id ������, $name - �����, $alt - ���������, $url_svyaz - �������� ��������� ��������, metod - _self _blank, $type_menu - ��� ������ ��� ����

                                    � 5
//������� ��������� ���� � ������ ����
function spisok_edit_punkt($id)

                                    � 6
//������� ��������� ���-�� ���������� ������� ����
function count_punkt($name,$url_svyaz,$type)
������� ���������: $name - �����, $url_svyaz - �������� ��������� ��������
��������: �����

//������� ����� �� JS �����   � 7
function del_punkt_in_file($menu_path,$file,$punkt,$type)
������� ���������: $menu_path - ���� � ������ ����, $file - JS ���� $punkt - ��������� �����, $type ��� ���� H ��������������, V ������������;

//��������� ����� � JS �����    � 8
function add_punkt_in_file($menu_path,$file,$name,$alt,$metod,$url_svyaz,$type);
������� ���������: $menu_path - ���� � ������ ����, $file - JS ����, $name - ��� ������, $alt - ���������, $metod- ����� , $url_svyaz - ��������� ��������, $type ��� ���� H ��������������, V ������������;


//�������� ����� � JS �����     � 9
function  update_punkt_in_file($menu_path,$file,$name_old,$alt_old,$metod_old,$url_svyaz_old,$name,$alt,$metod,$url_svyaz,$tp);
������� ���������: $menu_path - ���� � ������ ����,$file - JS ����, ***_old - ������ �������, $name - ��� ������, $alt - ���������, $metod- ����� , $url_svyaz - ��������� ��������, $type ��� ���� H ��������������, V ������������;
*/

////////////////--------------------------------------------------

//������� ��������� ������ ������� ����        		� 1
function spisok_punkt()
{
    $z = "select * from t_menu ORDER BY  type_menu,id DESC";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ����� ���� � ����              � 2
function add_punkt($name, $alt, $metod, $url_svyaz, $type_menu)
{
    $z = "insert into t_menu (name,alt,metod,url_svyaz,type_menu) values ('" . $name . "','" . $alt . "','" . $metod . "','" . $url_svyaz . "','" . $type_menu . "')";
    execute_sql($z);
}

//������� ������� ����� ����                       � 3
function del_punkt($id)
{
    $z = "delete from t_menu where id=$id";
    execute_sql($z);
}

//������� ��������� ����� ����                     � 4
function update_punkt($id, $name, $alt, $metod, $url_svyaz, $type_menu)
{
    $z = "update t_menu set name='$name',alt='$alt', metod='$metod', url_svyaz='$url_svyaz', type_menu='$type_menu' where id=$id";
    execute_sql($z);
}

//������� ��������� ���� � ������ ����        		� 5
function spisok_edit_punkt($id)
{
    $z = "select * from t_menu where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���-�� ���������� ������� ����     � 6
function count_punkt($name, $url_svyaz, $type)
{
    $z = "select count(*) as kolvo from t_menu where name='$name' and url_svyaz='$url_svyaz' and type_menu='$type'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� ����� �� JS �����   � 7
function del_punkt_in_file($menu_path, $file, $punkt, $type)
{
    $len = strlen($punkt);

    $f = fopen("$menu_path$file", 'rt');
    $ftmp = fopen('tmp987', 'wt');
    if ($type == 'H') {
        while (!feof($f)) {
            $s = fgets($f, 1000);
            if (($punkt != substr($s, 26, $len)) && ($punkt != substr($s, 27, $len)))
                fputs($ftmp, $s);
            else {
                $s = fgets($f, 1000);
                $s = fgets($f, 1000);
            }
        }
        fclose($ftmp);
        fclose($f);
        $s1 = realpath($menu_path);
        unlink($s1 . "/" . $file);
        copy('tmp987', $s1 . "/" . $file);
        $s1 = realpath('../menu');
        unlink($s1 . "/" . "tmp987");
    }
    if ($type == 'V') {
        while (!feof($f)) {
            $s = fgets($f, 1000);
            $nnn = substr($s, 26, $len);
            if (($punkt != substr($s, 26, $len)) && ($punkt != substr($s, 27, $len)))
                fputs($ftmp, $s);
        }
        $s1 = realpath($menu_path);
        fclose($ftmp);
        fclose($f);
        unlink($s1 . "/" . $file);
        copy('tmp987', $s1 . "/" . $file);
        $s1 = realpath('../menu/');
        unlink($s1 . "/" . "tmp987");
    }
}

//�7
function add_punkt_in_file($menu_path, $file, $name, $alt, $metod, $url_svyaz, $type)
{
    $f = fopen("$menu_path$file", 'rt');
    $ftmp = fopen('tmp987', 'wt');
    $i = 0;
    if ($type == 'H') {
        while (!feof($f)) {
            $s = fgets($f, 1000);
            $i = $i + 1;
        }
        fclose($f);
        $f = fopen("$menu_path$file", 'rt');
        $j = 0;
        while ($j < $i - 2) {
            $s = fgets($f, 1000);
            fputs($ftmp, $s);
            $j = $j + 1;
        }
        $str = "stm_aix(\"p0i3\",\"p0i2\",[0,\"" . $name . "\",\"\",\"\",-1,-1,0,\"" . $url_svyaz . "\",\"" . $metod . "\",\"" . $url_svyaz . "\",\"" . $alt . "\"]);\n";
        fputs($ftmp, $str);
        $str1 = "stm_aix(\"p0i3\",\"p0i0\",[]);\n";
        fputs($ftmp, $str1);
        $str2 = "stm_aix(\"p0i3\",\"p0i1\",[]);\n";
        fputs($ftmp, $str2);
        $str3 = "stm_ep();\n";
        fputs($ftmp, $str3);
        $str4 = "stm_em();";
        fputs($ftmp, $str4);
        fclose($ftmp);
        fclose($f);
        $s1 = realpath($menu_path);
        unlink($s1 . "/" . $file);
        copy('tmp987', $s1 . "/" . $file);
        $s1 = realpath('../menu');
        unlink($s1 . "/" . "tmp987");
    }
    if ($type == 'V') {
        while (!feof($f)) {
            $s = fgets($f, 1000);
            $i = $i + 1;
        }
        fclose($f);
        $f = fopen("$menu_path$file", 'rt');
        $j = 0;
        while ($j < $i - 2) {
            $s = fgets($f, 1000);
            fputs($ftmp, $s);
            $j = $j + 1;
        }
        $str = "stm_aix(\"p0i3\",\"p0i0\",[0,\"" . $name . "\",\"\",\"\",-1,-1,0,\"" . $url_svyaz . "\",\"" . $metod . "\",\"" . $url_svyaz . "\",\"" . $alt . "\"]);\n";
        fputs($ftmp, $str);
        $str = "stm_ep();\n";
        fputs($ftmp, $str);
        $str = "stm_em();";
        fputs($ftmp, $str);
        fclose($ftmp);
        fclose($f);
        $s1 = realpath($menu_path);
        unlink($s1 . "/" . $file);
        copy('tmp987', $s1 . "/" . $file);
        $s1 = realpath('../menu');
        unlink($s1 . "/" . "tmp987");
    }
}

//�������� ����� � JS �����     � 9
function  update_punkt_in_file($menu_path, $file, $name_old, $alt_old, $metod_old, $url_svyaz_old, $name, $alt, $metod, $url_svyaz, $type)
{
    $len = strlen($name_old);
    $f = fopen("$menu_path$file", 'rt');
    $ftmp = fopen('tmp987', 'wt');
    while (!feof($f)) {
        $s = fgets($f, 1000);
        if (($name_old != substr($s, 26, $len)) && ($name_old != substr($s, 27, $len)))
            fputs($ftmp, $s);
        else {
            $s3 = str_replace($name_old, $name, $s);
            $s4 = str_replace($alt_old, $alt, $s3);
            $s5 = str_replace($metod_old, $metod, $s4);
            $s6 = str_replace($url_svyaz_old, $url_svyaz, $s5);
            fputs($ftmp, $s6);
        }
    }
    fclose($ftmp);
    fclose($f);
    $s1 = realpath($menu_path);
    unlink($s1 . "/" . $file);
    copy('tmp987', $s1 . "/" . $file);
    $s1 = realpath('../menu');
    unlink($s1 . "/" . "tmp987");

}

?>