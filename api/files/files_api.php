<?php

/*
� ���� ������ ����������� ������� ��� ������ � ���������


 _______________________________������ �������_________________________________

 									 � 1

//������� ��������� ������ ������
function spisok_file()

                                    � 2
//������� ��������� ���� � ����
function add_file($descr,$file,$url_svyaz)
������� ���������: $descr - ������� ��������, $file - ����, $url_svyaz - �������� ��������� ��������

                                    � 3
//������� ������� ����
function del_file($id)
������� ���������: $id - id ������

                                    � 4
//������� ��������� ����
function update_file($id,$descr,$file,$url_svyaz)
������� ���������:$id - id ������, $descr - ������� ��������, $file - ����, $url_svyaz - �������� ��������� ��������

                                    � 5
//������� ��������� ���� isactive ������� t_file
function  redraw_file($id,$isactive)
������� ���������: $id - id ������, $isactive - (Y ��� N) ����� ������������ �� ������� ��� ���

                                    � 6
//������� ��������������� ��� ����� � ������������ � ������� id
function rename_file($name,$id)
��������: ����� ���

                                    � 7
//������� ��������� ���� � �����
function spisok_edit_file($id)

                                    � 8
//������� ��������� ���-�� ���������� ������
function count_file($descr,$file,$url_svyaz)
������� ���������: $descr - ������� ��������, $file - ����, $url_svyaz - �������� ��������� ��������
��������: �����

                                    � 9
//������� ��������� ������ ������ ��� ��������� ��������
function spisok_svyaz_file($url_svyaz)
������� ���������:$url_svyaz - �������� ��������� �������� (��� ����)


									� 10
//������� ��������� ���������� ������ ��� ��������� ��������        		
function count_svyaz_file($url_svyaz)

*/
///////-----------------���������� �������----------------------////////
//--------------------------������� ���������� ������� � ������� �� �������
/*
function show_files($opisanie,$ssilka,$corner,$tbl_border,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$num_files,$url_svyaz="",$img_path,$file_path,$img_width,$img_height)
������� ���������:
$opisanie - ����� ����� ��� �������� '1' ������������ ��� �����, '2' ������������ �������� �����, '12' ������������ ��� ����� <br>
$ssilka - ����� ����� ��� ��������  'Y' - ��� ����� ����� �������, 'N' ������ ������ ��������
$corner - ��� ���������� ��������� ��������. "left" �����, "right" ������, "top" ��� , "bottom" ���. ���� $img_path='' �� ���� �������� ������������
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas - ��� ������ ������� CSS ��� ���� ����� ����
$num_files - ���-�� ������������ ������
$url_svyaz - ��� ��������� ��������, ���� ���� �� ������������ ������ ��������� � ���� ���������
$img_path - �������� � ������ � ����� (�������� ��� ����������� ��������)
$file_path - ���� � ����� ��� ����� �����
$img_width - ������ ��������
$img_height - ������ ��������
�������� ���������:
�������(������� � �������) � ������� HTML

*/


////////////////--------------------------------------------------

//������� ��������� ������ ������        		� 1
function spisok_file()
{
    $z = "select * from t_file ORDER BY id ASC";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���� � ����              � 2
function add_file($descr, $file, $url_svyaz)
{
    $z = "insert into t_file (data,descr,file,url_svyaz) values (CURDATE(),'" . $descr . "','" . $file . "','" . $url_svyaz . "')";
    execute_sql($z);
}

//������� ������� ����                       � 3
function del_file($id)
{
    $z = "delete from t_file where id=$id";
    execute_sql($z);
}

//������� ��������� ����                     � 4
function update_file($id, $descr, $file, $url_svyaz)
{
    $z = "update t_file set data=CURDATE(),descr='$descr', file='$file', url_svyaz='$url_svyaz' where id=$id";
    execute_sql($z);
}

//������� ��������� ���� isactive ������� t_file                       � 5
function  redraw_file($id, $isactive)
{
    $z = "update t_file set isactive='$isactive' where id=$id";
    execute_sql($z);
}

//������� ��������������� ��� ����� � ������������ � ������� id   � 6
function rename_file($name, $id)
{
    $s = substr($name, -5);
    if ($s[0] == '.') {
        $s1 = substr($name, 0, strlen($name) - 5);
        $file = $s1 . "_" . $id . $s;
    }
    if ($s[1] == '.') {
        $s1 = substr($name, 0, strlen($name) - 4);
        $file = $s1 . "_" . $id . $s[1] . $s[2] . $s[3] . $s[4];
    }
    if ($s[2] == '.') {
        $s1 = substr($name, 0, strlen($name) - 3);
        $file = $s1 . "_" . $id . $s[2] . $s[3] . $s[4];
    }
    if ($s[3] == '.') {
        $s1 = substr($name, 0, strlen($name) - 2);
        $file = $s1 . "_" . $id . $s[3] . $s[4];
    }
    return $file;
}

//������� ��������� ���� � �����        		� 7
function spisok_edit_file($id)
{
    $z = "select * from t_file where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���-�� ���������� ������   		� 8
function count_file($descr, $file, $url_svyaz)
{
    $z = "select count(*) as kolvo from t_file where descr='$descr' and file='$file' and url_svyaz='$url_svyaz'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� ��������� ������ ������ ��� ��������� ��������        		� 9
function spisok_svyaz_file($url_svyaz)
{
    $z = "select * from t_file where url_svyaz='$url_svyaz' and isactive='Y' ORDER BY id DESC";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���������� ������ ��� ��������� ��������        		� 10
function count_svyaz_file($url_svyaz)
{
    $z = "select count(1) as c from t_file where url_svyaz='$url_svyaz' and isactive='Y'";
    $r = execute_sql($z);
    $r = sql_to_array($r, "c");
    $r = $r[1];
    return $r;
}

///////-----------------���������� �������----------------------////////
//--------------------------������� ���������� ������� � ������� �� �������
/*
function show_files($opisanie,$ssilka,$corner,$tbl_border,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$num_files,$url_svyaz="",$img_path,$file_path)
������� ���������:
$opisanie - ����� ����� ��� �������� '1' ������������ ��� �����, '2' ������������ �������� �����, '12' ������������ ��� ����� <br>
$ssilka - ����� ����� ��� ��������  'Y' - ��� ����� ����� �������, 'N' ������ ������ ��������
$corner - ��� ���������� ��������� ��������. "left" �����, "right" ������, "top" ��� , "bottom" ���. ���� $img_path='' �� ���� �������� ������������
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas - ��� ������ ������� CSS ��� ���� ����� ����
$num_files - ���-�� ������������ ������
$url_svyaz - ��� ��������� ��������, ���� ���� �� ������������ ������ ��������� � ���� ���������
$img_path - �������� � ������ � ����� (�������� ��� ����������� ��������)
$file_path - ���� � ����� ��� ����� �����
�������� ���������:
�������(������� � �������) � ������� HTML

*/

//������� ������� ������ ��� ������������� �������� � ������� ������
function avto_korrektirovka_img_in_files()
{
    echo "
<script language='JavaScript'>      //��� ������� �������� ��������������� ������� �������� � ������� ������ � ������ �������� width_img
	function resize_file_img(name_img,width_img,SY,SX)
    {
        if (SY>width_img)
	        {k=SY/width_img;}
        else
	        {k=1;}
        SYnew=SY/k;
        SXnew=SX/k;
        document.all[name_img].width=SYnew;
        document.all[name_img].height=SXnew;
    }
</script>
";
}

//--------------------------������� ���������� ������� � ������� �� �������
function show_files($opisanie, $ssilka, $corner, $tbl_border, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $num_files, $url_svyaz = "", $img_path, $file_path)
{
    if ($img_path == '') {
        $ssilka = 'Y';
        $corner = '';
        if ($opisanie == 2)
            $opisanie = 1;
    } else {
        $im = GetImageSize($img_path); //��������� ������� ��������
    }
    $z = spisok_svyaz_file($url_svyaz);
    $m_descr = sql_to_array($z, "descr");
    $m_file = sql_to_array($z, "file");
    $m_id = sql_to_array($z, "id");
    $m_url_svyaz = sql_to_array($z, "url_svyaz");
    if (count($m_id) < $num_files)
        $num_files = count($m_id);
    echo "<table align='$tbl_align' class='$clas' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    for ($i = 1; $i < $num_files + 1; $i++) {
        if ($corner == 'left')   //������ ������� ��� �������� �����
        {
            echo "<tr class='$clas'>";
            if ($opisanie == 1) {
                if ($ssilka == 'Y')
                    echo "<td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td></tr>";
                else
                    echo "<td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><td class='$clas'>$m_file[$i]</td></tr>";
            }
            if ($opisanie == 12) {
                if ($ssilka == 'Y')
                    echo "<td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td></tr>";

                else
                    echo "<td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><td class='$clas'>$m_file[$i]<br>$m_descr[$i]</td></tr>";
            }
            if ($opisanie == 2) {
                echo "<td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><td class='$clas'>$m_descr[$i]</td></tr>";
            }

        }
        if ($corner == 'right')   //������ ������� ��� �������� ������
        {
            echo "<tr class='$clas'>";
            if ($opisanie == 1) {
                if ($ssilka == 'Y')
                    echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";

                else
                    echo "<td class='$clas'>$m_file[$i]</td><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }
            if ($opisanie == 12) {
                if ($ssilka == 'Y')
                    echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";

                else
                    echo "<td class='$clas'>$m_file[$i]<br>$m_descr[$i]</td><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }
            if ($opisanie == 2) {
                echo "<td class='$clas'>$m_descr[$i]</td><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }

        }
        if ($corner == 'top')   //������ ������� ��� �������� ������
        {
            echo "";
            if ($opisanie == 1) {
                if ($ssilka == 'Y')
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><tr class='$clas'><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td></tr>";

                else
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><tr class='$clas'><td class='$clas'>$m_file[$i]</td></tr>";
            }
            if ($opisanie == 12) {
                if ($ssilka == 'Y')
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><tr class='$clas'><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td></tr>";

                else
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><tr class='$clas'><td class='$clas'>$m_file[$i]<br>$m_descr[$i]</td></tr>";
            }
            if ($opisanie == 2) {
                echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script><tr class='$clas'><td class='$clas'>$m_descr[$i]</td></tr>";
            }

        }
        if ($corner == 'bottom')   //������ ������� ��� �������� �����
        {
            echo "<tr class='$clas'>";
            if ($opisanie == 1) {
                if ($ssilka == 'Y')
                    echo "<tr class='$clas'><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td></tr><tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";

                else
                    echo "<tr class='$clas'><td class='$clas'>$m_file[$i]</td></tr><tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }
            if ($opisanie == 12) {
                if ($ssilka == 'Y')
                    echo "<tr class='$clas'><td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td></tr><tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";

                else
                    echo "<tr class='$clas'><td class='$clas'>$m_file[$i]<br>$m_descr[$i]</td></tr><tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }
            if ($opisanie == 2) {
                echo "<tr class='$clas'><td class='$clas'>$m_descr[$i]</td></tr><tr class='$clas'><td class='$clas'><a class='$clas' href='$file_path$m_file[$i]' target='_blank'><img alt='$m_descr[$i]' id='img_file$i' name='img_file$i' border='0' src='$img_path'></a></td></tr><script LANGUAGE='JavaScript'>resize_file_img('img_file" . $i . "',25," . $im[0] . "," . $im[1] . ");</script>";
            }

        }
        if ($corner == '')   //������ ������� ��� ��� ��������
        {
            echo "<tr class='$clas'>";
            if ($opisanie == 1) {
                echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td></tr>";
            }
            if ($opisanie == 12) {
                echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td></tr>";
            }
        }

    }///-����� �����
    echo "</table>";
}

//������� ����� �� ���� ����������
function delete_folder($path)
{
    if (is_dir($path)) {
        if ($handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    unlink($path . "/" . $file);
                }
            }
            closedir($handle);
            rmdir($path);
            return 1;
        }
    }
    return;
}

?>