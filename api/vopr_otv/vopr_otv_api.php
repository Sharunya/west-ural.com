<?
//	session_start();
/*
� ���� ������ ����������� ������� ��� ������ � �������� ������-�����

 _______________________________������ �������_________________________________

                                      � 1
 //������� ��������� ������ ���� ��������
function spisok_vopros($sort,$start,$cnt)
������� ���������:$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                                     � 2
//������� ��������� ������ �������� � ������������ �� �������� �������
function spisok_vopros_status($status,$sort,$start,$cnt)
������� ���������:$status- ������ ������� 1,2,3,4 (�� ������� t_status_vopros),$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                                     � 3
//������� ��������� ������ �������� ������ �� ������������������ �������������
function spisok_vopros_reg($sort,$start,$cnt)
������� ���������:$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                                    � 4
//������� ��������� ������ �������� � ������������ �� �������� ������� ������ �� ������������������ �������������
function spisok_vopros_status_reg($status,$sort,$start,$cnt)
������� ���������:$status- ������ ������� 1,2,3,4 (�� ������� t_status_vopros),$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������
������������������ �� ������� ����� ���� ����� � ������

                                   � 5
//������� ������� ������ ���������
function del_vopros_logical($id)
������� ���������:$id - id ������

                                   � 6
//������� ��������������� ��������� ��������� �������
function rescue_vopros_logical($id)

                                   � 7
//������� ������� ��������� ��� ��������� ���������  �������
function del_vopros_fisical()

                                   � 8
//������� ��������� �����
function update_vopros($id,$otvet,$status)
������� ���������:$id - id ������, $otvet - ����� ������,$status - ������ ������� 1,2,3,4 (�� ������� t_status_vopros)

                                  � 9
//������� ��������� ���� ������ � ������������ � ������� id
function spisok_edit_vopros($id)
������� ���������:$id - id ������

                                 � 10
//������� ��������� ������ '������ �� ���������'
function update_status($id)
������� ���������:$id - id ������

                               � 11
//������� ���������� ����� �� ������
function send_otvet($email,$name,$fam,$vopros,$otvet)
������� ���������: �����, ���, �������, ������, �����
�������� true ���� ������ ����, false - ������

                              � 13
//������� ���������� ���������� ���������� �������� �������� ����� ��������
function count_vopros($vopros,$id)
������� ���������: ������, id �������
��������: ����������

                              � 14
//������� ��������� ������ � ����
function insert_vopros($vopros,$id)
������� ���������: ������, id �������

                             � 15
//������� ��������� ��� ����� � ����
function update_file_vopros($file,$id)
������� ���������: ��� �����, id �������

                            � 16
//������� ��������� ������ ���������� (��������� ���������) ��������
function spisok_vopros_noactive()

//-----------���������� �������------------------------------------
			� 1
//������� ������ ����� ������� ��������
function form_client_vopros($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$textarea_cols,$textarea_rows,$size,$clas_input)
������� ���������:
$zagl - ��������� �����
$clas_zagl - ��� ������ ������� CSS ��� ���������
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas - ��� ������ ������� CSS ��� ����
$textarea_cols - ������ textarea
$textarea_rows - ������ textarea
$size - ������ ��������� �����
$clas_input - ��� ������ ������� CSS ��� ��������� �����

            � 2
//������� ������ ������ �������� ������� ������ ��� �����������
function client_vopros_otvet($name_page,$show_date,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas_vopros,$clas_otvet,$clas_date,$clas_author,$clas_str,$�las_page,$�las_page1,$num_rows,$num_pages)
������� ���������:
$name_page - ��� ��������(��������) � ������� ������� ��� �������
$show_date - ����� ����. ���� "y" -���� ������������, ������� �� "y" - ���.
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas_vopros - ��� ������ ������� CSS ��� ��������
$clas_otvet - ��� ������ ������� CSS ��� �������
$clas_date  - ��� ������ ������� CSS ��� ���� � ������ �������
$clas_author  - ��� ������ ������� CSS ��� ������ �������
$clas_str - ��� ������ ������� CSS ��� ������ �������
$clas_page  - ��� ������ ������� CSS ��� ������� ������� �� �������
$clas_page1  - ��� ������ ������� CSS ��� �������� ������ ��������
$num_rows - ���������� ������� �� ��������
$num_pages - ���������� ������� ������� � ������� ���� ������ �� ����������� �� ��������� �������

            � 3
//������� ��������� ������ �� ������� � ����
function add_vopros($file_path,$id_k,$mess,$clas_mess,$lang)
������� ���������:
$file_path - ������������� ���� � ����� ���� ���������� ����� ���������� ������ � ���������
$id_k - ���������� �������������� ������ ���������� ������ (id ����������������� �������) � �������� �� ���� ������� � ���������� ������ ��������� �� ������� �������� � ����� �� �������� ������
$mess - ������ ��������� ����� ��������� ������� ������� , ���� ������ �� ��� �� ������ ���������
$clas_mess - ����� ������
$lang - ��� ������, 2 �������� 'html' - � ���� html, 'java' - � ���� ��������� � ������� ��
_______________________________________________________________________________
*/

//������� ��������� ������ ���� ��������       		� 1
function spisok_vopros($sort, $start, $cnt)
{
    $z = "select t_vopros.id,data_voprosa,fam,t_klients.name,email,vopros,file,data_otveta,otvet,klient_id,t_status_vopros.name as status from t_klients,t_vopros,t_status_vopros where (t_vopros.klient_id=t_klients.id) and (t_vopros.status_id=t_status_vopros.id) and (t_vopros.isactive='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ �� �������� �������      		� 2
function spisok_vopros_status($status, $sort, $start, $cnt)
{
    $z = "select t_vopros.id,data_voprosa,fam,t_klients.name,email,vopros,file,data_otveta,otvet,klient_id,t_status_vopros.name as status from t_klients,t_vopros,t_status_vopros where (t_vopros.klient_id=t_klients.id) and (t_vopros.status_id=t_status_vopros.id) and (t_vopros.isactive='Y') and (t_vopros.status_id=$status) ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� ������ �� ������������������ �������������     		� 3
function spisok_vopros_reg($sort, $start, $cnt)
{
    $z = "select t_vopros.id,data_voprosa,fam,t_klients.name,email,login,vopros,file,data_otveta,otvet,klient_id,t_status_vopros.name as status from t_klients,t_vopros,t_status_vopros where (t_vopros.klient_id=t_klients.id) and (t_vopros.status_id=t_status_vopros.id) and (t_vopros.isactive='Y') and (t_klients.login!='') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ �� �������� ������� ������ �� ������������������ �������������     		� 4
function spisok_vopros_status_reg($status, $sort, $start, $cnt)
{
    $z = "select t_vopros.id,data_voprosa,fam,t_klients.name,email,login,vopros,file,data_otveta,otvet,t_status_vopros.name as status from t_klients,t_vopros,t_status_vopros where (t_vopros.klient_id=t_klients.id) and (t_vopros.status_id=t_status_vopros.id) and (t_vopros.isactive='Y') and (t_vopros.status_id=$status) and (t_klients.login!='') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ������� ������ ���������                       � 5
function del_vopros_logical($id)
{
    $z = "update t_vopros set isactive='N' where id='$id'";
    execute_sql($z);
}

//������� ��������������� ��������� ��������� �������                       � 6
function rescue_vopros_logical($id)
{
//	$z="select * from t_vopros where isactive='N'";
//	$r=execute_sql($z);
//    $m_id=sql_to_array($r,"id");
//    for($i=1;$i<count($m_id)+1;$i++)
//    {
    $z = "update t_vopros set isactive='Y' where id='$id'";
    execute_sql($z);
//    }
}

//������� ������� ��������� ��� ��������� ��������� �������                      � 7
function del_vopros_fisical()
{
    $z = "select * from t_vopros where isactive='N'";
    $r = execute_sql($z);
    $m_id = sql_to_array($r, "id");
    $m_file = sql_to_array($r, "file");
    $s = realpath("file/");
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        if ($m_file[$i] != '')
            unlink($s . "/" . $m_file[$i]);
        $z = "delete from t_vopros where id='$m_id[$i]'";
        execute_sql($z);
    }
}

//������� ��������� �����        � 8
function update_vopros($id, $otvet, $status)
{
    $s = convert_date_mysql(date("d.m.Y"));
    $z = "update t_vopros set otvet='$otvet', status_id='$status', data_otveta='$s' where id=$id";
    execute_sql($z);
}

//������� ��������� ���� ������ � ������������ � ������� id     		� 9
function spisok_edit_vopros($id)
{
    $z = "select t_vopros.id,data_voprosa,fam,t_klients.name,email,vopros,file,data_otveta,otvet,status_id,t_status_vopros.name as status from t_klients,t_vopros,t_status_vopros where (t_vopros.klient_id=t_klients.id) and (t_vopros.status_id=t_status_vopros.id) and (t_vopros.isactive='Y') and (t_vopros.id='$id')";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ '������ �� ���������'       � 10
function update_status($id)
{
    $s = convert_date_mysql(date("d.m.Y"));
    $z = "update t_vopros set status_id='2', data_otveta='$s' where id=$id";
    execute_sql($z);
}

//������� ����������  ����� �� ������   � 11
function send_otvet($email, $name, $fam, $vopros, $otvet)
{
    $message =
        "Content-type:text/plain; charset=windows-1251\n
\n
From: Webmaster\n
To:" . $fam . " " . $name . " <" . $email . ">\n
Subject: ����� �� ��� ������.\n
Content-type:text/plain; charset=windows-1251\n
\n
���������(��)  " . $fam . " " . $name . "!\n
�� ����������:\n
" . $vopros . "\n
______________________________\n
��������:\n
" . $otvet . "\n
______________________________\n
� ���������, ������������� �����.";

    if (mail($email, "", $message) == true)
        return true;
    else
        return false;
}

//������� ���������� ���������� ���������� �������� �������� ����� ��������  � 13
function count_vopros($vopros, $id)
{
    $z = "select count(*) as kolvo from t_vopros where vopros='$vopros' and klient_id='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� ��������� ������ � ���� � 14
function insert_vopros($vopros, $id)
{
    $z = "insert into t_vopros (vopros,data_voprosa,klient_id,status_id) values('" . strrepl(trim(@$vopros)) . "',CURDATE(),'" . $id . "','1')";
    execute_sql($z);
}

//������� ��������� ��� ����� � ���� � 15
function update_file_vopros($file, $id)
{
    $z = "update t_vopros set file='$file' where id='$id'";
    execute_sql($z);
}

//������� ��������� ������ ���������� (��������� ���������) ��������      		� 16
function spisok_vopros_noactive()
{
    $z = "select * from t_vopros where (t_vopros.isactive='N')";
    $r = execute_sql($z);
    return $r;
}

//-----------���������� �������------------------------------------

//������� ������ ����� ������� ��������
function form_client_vopros($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $textarea_cols, $textarea_rows, $size, $clas_input)
{
    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    echo "<table style='margin-left:10;margin-top:10;margin-bottom:10;margin-right:10;' class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_client_vopros' id='form_client_vopros' ENCTYPE='multipart/form-data' method='POST'>";
    if ($zagl != '') {
        echo "<tr class='$clas_zagl'><td colspan='2' class='$clas_zagl'>$zagl<br><br></td></tr>";
    }
    if ((@$user_login) && (@$user_password))   // ���� � ������ ���� ����� � ������ �.�. ������������ ������� �� � ����� ���������� ��� ������� � email
    {
        $read = 'readonly';
        $z = client_with_login(@$user_login, @$user_password);
        $m_id = sql_to_array($z, "id");
        $m_name = sql_to_array($z, "name");
        $m_fam = sql_to_array($z, "fam");
        $m_email = sql_to_array($z, "email");
        if (@$m_name[1] != '')
            $name = $m_name[1];
        else
            $name = '';
        if (@$m_fam[1] != '')
            $fam = $m_fam[1];
        else
            $fam = '';
        if (@$m_email[1] != '')
            $email = $m_email[1];
        else
            $email = '';
    } else {
        if (@$GLOBALS["id_notautorized"]) {
            $id = $GLOBALS["id_notautorized"];
            $z = spisok_edit_clients($id);
            $m_name = sql_to_array($z, "name");
            $m_fam = sql_to_array($z, "fam");
            $m_email = sql_to_array($z, "email");
            if (@$m_name[1] != '')
                $name = $m_name[1];
            else
                $name = '';
            if (@$m_fam[1] != '')
                $fam = $m_fam[1];
            else
                $fam = '';
            if (@$m_email[1] != '')
                $email = $m_email[1];
            else
                $email = '';
            $read = '';
        } else {
            if (@$GLOBALS["fam"])
                $fam = $GLOBALS["fam"];
            else
                $fam = '';
            if (@$GLOBALS["name"])
                $name = $GLOBALS["name"];
            else
                $name = '';
            if (@$GLOBALS["email"])
                $email = $GLOBALS["email"];
            else
                $email = '';
            $read = '';
        }
    }
    if (@$GLOBALS["vopros"])
        $vopros = $GLOBALS["vopros"];
    else
        $vopros = '';
    echo "<tr class='$clas'><td class='$clas'>�������:</td></tr><tr><td class='$clas'><input class='$clas_input' style='WIDTH: 100%' type='text' $read name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>���:</td></tr><tr><td class='$clas'><input class='$clas_input' type='text' style='WIDTH: 100%' $read name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:</td></tr><tr><td class='$clas'><input class='$clas_input' type='text' style='WIDTH: 100%' $read name='email' id='email' size='$size' value='$email'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'>������:</td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'><textarea class='txtarea' name='vopros' id='vopros' cols='$textarea_cols' rows='$textarea_rows'>$vopros</textarea></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>���������� ����:</td></tr><tr><td class='$clas'><input class='$clas_input' style='WIDTH: 100%' type='file' name='files' id='files' size='$size'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input class='btn' style='CURSOR: hand;' type='submit' name='ask' id='ask' value='������ ������'></td></tr>";
    echo "</form></table>";
}

//������� ������ ������ �������� ������� ������ ��� �����������
function client_vopros_otvet($name_page, $show_date, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas_vopros, $clas_otvet, $clas_date, $clas_author, $clas_str, $clas_page, $clas_page1, $num_rows, $num_pages)
{
    if (@$GLOBALS["page"])
        $page = $GLOBALS["page"];
    else
        $page = 1;
    // ���������� �����������
    $z = spisok_vopros_status(4, 'id DESC', 0, 9999999);
    $z1 = spisok_vopros_status(4, 'id DESC', ($page * $num_rows) - ($num_rows), $num_rows);
    $m_id1 = sql_to_array($z, "id");
    $numpages = ceil(count($m_id1) / $num_rows); // ���-�� �������
    echo "<table border='0' align='$tbl_align'><tr><td>";
    echo "<table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'><tr class='$clas_str'><td class='$clas_str'>";
    if ($numpages != 0)
        echo "��������:&nbsp;&nbsp;";
    //else
    //    echo"&nbsp;";
    $s = '.';
    for ($i = 1; $i <= $numpages; $i++)  //������ ������ �������
    {
        if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
        {
            echo "<tr class='$clas_str'><td class='$clas_str'>";
        }
        if ($i == $page)
            echo "<a  class='$clas_page' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        else
            echo "<a  class='$clas_page1' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        $s = strval($i / ($num_pages));//����������� � ������
        if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
        {
            echo "</td></tr>";
        }
    }
    if (strpos($s, '.') !== false) //���� ����� �� ����� �.�. ������� ��� �������
    {
        echo "</td></tr>";
    }
    echo "</table></td></tr>";

    $m_id = sql_to_array($z1, "id");
    $m_data_v = sql_to_array($z1, "data_voprosa");
    $m_fam = sql_to_array($z1, "fam");
    $m_name = sql_to_array($z1, "name");
    $m_email = sql_to_array($z1, "email");
    $m_vopros = sql_to_array($z1, "vopros");
    $m_otvet = sql_to_array($z1, "otvet");

    ///// ���������� ������� ������������ ��������
    echo "<tr><td><table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        $dt = convert_date($m_data_v[$i]);
        if ($m_email[$i] != '') {
            if ($show_date == 'Y')
                echo "<tr><td class='$clas_date'>$dt</td><td class='$clas_author'> �����: <a href='mailto:$m_email[$i]'>$m_fam[$i] $m_name[$i]</a></td></tr>";
            else
                echo "<tr><td colspan='2' class='$clas_author'>�����: <a href='mailto:$m_email[$i]'>$m_fam[$i] $m_name[$i]</a></td></tr>";
        } else {
            if ($show_date == 'Y')
                echo "<tr><td class='$clas_date'>$dt</td><td class='$clas_author'> �����: $m_fam[$i] $m_name[$i]</td></tr>";
            else
                echo "<tr><td colspan='2' class='$clas_author'>�����: $m_fam[$i] $m_name[$i]</td></tr>";
        }
        echo "<tr class='$clas_vopros'><td colspan='2' class='$clas_vopros'>$m_vopros[$i]</td></tr>";
        echo "<tr class='$clas_otvet'><td colspan='2' class='$clas_otvet'>$m_otvet[$i]</td></tr>";
    }
    echo "</table></td></tr>";
    echo "<tr><td><table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'><tr class='$clas_str'><td class='$clas_str'>";
    if ($numpages != 0)
        echo "��������:&nbsp;&nbsp;";
    //else
    //    echo"&nbsp;";
    $s = '.';
    for ($i = 1; $i <= $numpages; $i++)  //������ ������ �������
    {
        if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
        {
            echo "<tr class='$clas_str'><td class='$clas_str'>";
        }
        if ($i == $page)
            echo "<a  class='$clas_page' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        else
            echo "<a  class='$clas_page1' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        $s = strval($i / ($num_pages));//����������� � ������
        if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
        {
            echo "</td></tr>";
        }
    }
    if (strpos($s, '.') !== false) //���� ����� �� ����� �.�. ������� ��� �������
    {
        echo "</td></tr>";
    }
    echo "</table>";
    echo "</td></tr></table>";

}


//������� ��������� ������ �� ������� � ����
function add_vopros($file_path, $id_k, $mess, $clas_mess, $lang)
{
    global $id_k; //���������� �������������� ������ ���������� ������ � �������� �� ���� ������� � ���������� ������ ��������� �� ������� �������� � ����� �� �������� ������

    $fam = $GLOBALS["fam"];
    $name = $GLOBALS["name"];
    $email = $GLOBALS["email"];
    $vopros = $GLOBALS["vopros"];
    $files_name = $GLOBALS["files_name"];
    $files_size = $GLOBALS["files_size"];
    $files = $GLOBALS["files"];

    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    if ((@$user_login) && (@$user_password))  //���� � ������ ���� ��� � ������ ������������
    {
        $z = client_with_login(@$user_login, @$user_password);
        $m_id = sql_to_array($z, "id");
        $id_k = $m_id[1];
    } else   // ���� ��� �� ������������ �� ������� ��������� ���
    {
        if (@$fam != '' && @$name != '' && @$email != '' && @$vopros != '') {
            if (@$id_k)    //���������� ��� � ������� ���������� ����������� ������ (���� ��� id->$id_k(���������� ���������� ������� �� ������� �������� �������� �������� � ���������� ������ � ����� �� ��������) �� ������ )
            {                          //���� ��� ��������� � �������� � ����� ������ � �������� �� ������ ������� � ���� �� ���������
                $z = spisok_edit_clients(@$id_k);
                $m_id = sql_to_array($z, "id");
                $m_fam = sql_to_array($z, "fam");
                if (@$m_fam[1] != '')
                    $fam1 = $m_fam[1];
                else
                    $fam1 = '';
                $m_name = sql_to_array($z, "name");
                if (@$m_name[1] != '')
                    $name1 = $m_name[1];
                else
                    $name1 = '';
                $m_email = sql_to_array($z, "email");
                if (@$m_email[1] != '')
                    $email1 = $m_email[1];
                else
                    $email1 = '';
            }
            if ((!@$id_k) || ($fam1 != @$fam) || ($name1 != @$name) || ($email1 != @$email)) {
                $z = add_clients(@$fam, @$name, '', @$email, '', '', '', '', '');
                $z = spisok_clients('id ASC', 0, 9999999);
                $m_id2 = sql_to_array($z, "id");
                $id = $m_id2[count($m_id2)];        // ���������� klient_id
                $id_k = $id;             //������� id ����������������� ������������ � ������ ����� ��� ������ ��� �� ��������� ��� ����� �������
            }
        }
    }
    // �������� �� ������ �������
    $kol = count_vopros(strrepl(trim(@$vopros)), @$id_k);

    if ((@$vopros != '') && (@$fam != '') && (@$name != '') && (@$email != '')) {
        if ($kol == 0) {
            insert_vopros(strrepl(trim(@$vopros)), @$id_k);

            if ($files_name != '')      // �������������� � ������ ����� �� ������
            {
                if ($files_size != 0) {
                    $z = spisok_vopros('id ASC', 0, 9999999);
                    $m_id = sql_to_array($z, "id");
                    $id = $m_id[count(@$m_id)];
                    $s = substr($files_name, -5);
                    if ($s[0] == '.')
                        $fl = "vopros_otvet_" . $id . $s;
                    if ($s[1] == '.')
                        $fl = "vopros_otvet_" . $id . $s[1] . $s[2] . $s[3] . $s[4];
                    if ($s[2] == '.')
                        $fl = "vopros_otvet_" . $id . $s[2] . $s[3] . $s[4];
                    if ($s[3] == '.')
                        $fl = "vopros_otvet_" . $id . $s[3] . $s[4];
                    copy($files, $file_path . $fl);
                    update_file_vopros($fl, $id);
                } else {
                    $str = "'������ ��� �������� �����.�������� ���� �������� �������.���� �������� �� �����!'";
                    echo "<script language='JavaScript1.2'>alert ($str)</script>";
                    $fl = '';
                }
            }
            if (@$mess != '') {
                if ($lang == 'html') {
                    echo "<table align='center'><tr><td class='$clas_mess'>$mess</td></tr></table>";
                }
                if ($lang == 'java') {
                    echo "<script language='JavaScript1.2'>alert ('$mess')</script>";
                }
            }
        } else {
            $str = "'��������� �������� ������!'";
            echo "<script language='JavaScript1.2'>alert ($str)</script>";
        }
    } else {
        $str = "'����������� ������������ ���� �������, ���, E-mail, ������!'";
        echo "<script language='JavaScript1.2'>alert ($str)</script>";
    }

}

?>