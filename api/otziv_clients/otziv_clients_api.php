<?
/*
� ���� ������ ����������� ������� ��� ������ � �������� ������ ��������

 _______________________________������ �������_________________________________

                                      � 1
//������� ��������� ������ ���� �������
function spisok_otzivs($sort,$start,$cnt)
������� ���������:$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                                     � 2
//������� ��������� ������ ������� ������ �� ������������������ �������������
function spisok_otzivs_reg($sort,$start,$cnt)
������� ���������:$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                                   � 3
//������� ������� ����� ���������
function del_otziv_logical($id)
������� ���������:$id - id ������

                                   � 4
//������� ��������������� ��������� ��������� ������
function rescue_otziv_logical($id)

                                   � 5
//������� ������� ��������� ��� ��������� ���������  ������
function del_otziv_fisical()

                                   � 6
//������� ��������� �����
function update_otziv($id,$otzuv)
������� ���������:$id - id ������, $otzuv - ����� ������

                                  � 7
//������� ��������� ���� ����� � ������������ � ������� id
function spisok_edit_otziv($id)
������� ���������:$id - id ������

                              � 8
//������� ���������� ���������� ���������� ������� �������� ����� ��������  � 8
function count_otziv($otzuv,$id)
������� ���������: ������, id �������
��������: ����������

                              � 9
//������� ��������� ���� isshow ������� t_otzuvs
function  redraw_otziv($id,$isshow)
������� ���������: $id - id �������, $isshow - (Y ��� N) ����� ������� ��� ���

                              � 10
//������� ��������� ������ ���� ������� ��� isshow=Y
function spisok_otzivs_show($sort,$start,$cnt)
������� ���������:$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������

                              � 11
//������� ��������� ����� � ����
function insert_otziv($otziv,$id)
������� ���������: �����, id �������

                              � 12
//������� ��������� ������ ���� ������� ��� isactive=N
function spisok_otzivs_noactive()

*/


//------------------------------------------------------------------------------
//_____________���������� �������________________________________
/*

			� 1
//������� ������ ����� ������� �������
function form_client_otziv($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$textarea_cols,$textarea_rows,$size)
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
$clas_input - - ��� ������ ������� CSS ��� ��������� �����

			� 2
//������� ������ ������ ������� ������ ��� �����������
function client_otziv($name_page,$show_date,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas_otziv,$clas_date,$clas_page,$clas_page1,$num_rows,$num_pages)
������� ���������:
$name_page - ��� ��������(��������) � ������� ������� ��� �������
$show_date - ����� ����. ���� "y" -���� ������������, ������� �� "y" - ���.
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas_otziv - ��� ������ ������� CSS ��� �������
$clas_date  - ��� ������ ������� CSS ��� ���� � ������ �������
$clas_author  - ��� ������ ������� CSS ��� ������ �������
$clas_str - ��� ������ ������� CSS ��� ������ �������
$clas_page  - ��� ������ ������� CSS ��� ������� ������� �� �������
$clas_page1  - ��� ������ ������� CSS ��� �������� ������ ��������
$num_rows - ���������� ������� �� ��������
$num_pages - ���������� ������� ������� � ������� ���� ������ �� ����������� �� ��������� �������

            � 3
//������� ��������� ����� �� ������� � ����
function add_otziv($id_k,$mess,$clas_mess,$lang)
������� ���������:
$id_k - ���������� �������������� ������ ���������� ������ (id ����������������� �������) � �������� �� ���� ������� � ���������� ������ ��������� �� ������� �������� � ����� �� �������� ������
$mess - ������ ��������� ����� ��������� ������� ������� , ���� ������ �� ��� �� ������ ���������
$clas_mess - ����� ������
$lang - ��� ������, 2 �������� 'html' - � ���� html, 'java' - � ���� ��������� � ������� ��


*/

//___________________________________________________________________

//������� ��������� ������ ���� �������       		� 1
function spisok_otzivs($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv,isshow,klient_id from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ ������� ������ �� ������������������ �������������     		� 2
function spisok_otzivs_reg($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,login,otzuv,isshow,klient_id from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_klients.login!='') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}


//������� ������� ����� ���������                       � 3
function del_otziv_logical($id)
{
    $z = "update t_otzuvs set isactive='N' where id='$id'";
    execute_sql($z);
}

//������� ��������������� ��������� ��������� ������                       � 4
function rescue_otziv_logical($id)
{
//	$z="select * from t_otzuvs where isactive='N'";
//	$r=execute_sql($z);
//    $m_id=sql_to_array($r,"id");
//    for($i=1;$i<count($m_id)+1;$i++)
//    {
    $z = "update t_otzuvs set isactive='Y' where id='$id'";
    execute_sql($z);
//    }
}

//������� ������� ��������� ��� ��������� ��������� ������                      � 5
function del_otziv_fisical()
{
    $z = "select * from t_otzuvs where isactive='N'";
    $r = execute_sql($z);
    $m_id = sql_to_array($r, "id");
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        $z = "delete from t_otzuvs where id='$m_id[$i]'";
        execute_sql($z);
    }
}

//������� ��������� �����        � 6
function update_otziv($id, $otziv)
{
    $z = "update t_otzuvs set otzuv='$otziv' where id=$id";
    execute_sql($z);
}

//������� ��������� ���� ����� � ������������ � ������� id     		� 7
function spisok_edit_otziv($id)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_otzuvs.id='$id')";
    $r = execute_sql($z);
    return $r;
}

//������� ���������� ���������� ���������� ������� �������� ����� ��������  � 8
function count_otziv($otziv, $id)
{
    $z = "select count(*) as kolvo from t_otzuvs where otzuv='$otziv' and klient_id='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� ��������� ���� isshow ������� t_otzuvs                       � 9
function  redraw_otziv($id, $isshow)
{
    $z = "update t_otzuvs set isshow='$isshow' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ ���� ������� ��� isshow=Y      		� 10
function spisok_otzivs_show($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv,isshow from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_otzuvs.isshow='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ����� � ���� � 11
function insert_otziv($otziv, $id)
{
    $z = "insert into t_otzuvs (otzuv,date,klient_id) values('" . strrepl(trim($otziv)) . "',CURDATE(),'" . $id . "')";
    execute_sql($z);
}


//������� ��������� ������ ���� ������� ��� isactive=N      		� 12
function spisok_otzivs_noactive()
{
    $z = "select * from t_otzuvs where (t_otzuvs.isactive='N')";
    $r = execute_sql($z);
    return $r;
}


//_____________���������� �������________________________________

//������� ������ ����� ������� �������
function form_client_otziv($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $textarea_cols, $textarea_rows, $size, $clas_input)
{
    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    echo "<table class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_client_otziv' id='form_client_otziv' method='POST'>";
    if ($zagl != '') {
        echo "<tr class='$clas_zagl'><td colspan='2' class='$clas_zagl'>$zagl</td></tr>";
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
    if (@$GLOBALS["otziv"])
        $otziv = $GLOBALS["otziv"];
    else
        $otziv = '';
    echo "<tr class='$clas'><td class='$clas'>�������:</td><td class='$clas'><input class='$clas_input' type='text' $read name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>���:</td><td class='$clas'><input class='$clas_input' type='text' $read name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:</td><td class='$clas'><input class='$clas_input' type='text' $read name='email' id='email' size='$size' value='$email'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'>�����:</td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'><textarea class='$clas_input' name='otziv' id='otziv' cols='$textarea_cols' rows='$textarea_rows'>$otziv</textarea></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='send' id='send' value='�������� �����'></td></tr>";
    echo "</form></table>";
}

//������� ������ ������ ������� ������ ��� �����������
function client_otziv($name_page, $show_date, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas_otziv, $clas_date, $clas_author, $clas_str, $clas_page, $clas_page1, $num_rows, $num_pages)
{
    if (@$GLOBALS["page"])
        $page = $GLOBALS["page"];
    else
        $page = 1;
    // ���������� �����������
    $z = spisok_otzivs_show('id DESC', 0, 9999999);
    $z1 = spisok_otzivs_show('id DESC', ($page * $num_rows) - ($num_rows), $num_rows);
    $m_id1 = sql_to_array($z, "id");
    $numpages = ceil(count($m_id1) / $num_rows); // ���-�� �������
    echo "<table border='0' align='$tbl_align'><tr><td>";
    echo "<table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'><tr  class='$clas_str'><td  class='$clas_str'>";
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
    if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
    {
        echo "</td></tr>";
    }
    echo "</table></td></tr>";
    $m_id = sql_to_array($z1, "id");
    $m_date_o = sql_to_array($z1, "date");
    $m_fam = sql_to_array($z1, "fam");
    $m_name = sql_to_array($z1, "name");
    $m_email = sql_to_array($z1, "email");
    $m_otziv = sql_to_array($z1, "otzuv");

    ///// ���������� ������� ������������ ��������
    echo "<tr><td><table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        $dt = convert_date($m_date_o[$i]);
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
        echo "<tr class='$clas_otziv'><td colspan='2' class='$clas_otziv'>$m_otziv[$i]</td></tr>";
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
    if (strpos($s, '.') === false) //���� ����� �� ����� �.�. ������� ��� �������
    {
        echo "</td></tr>";
    }
    echo "</table></td></tr></table>";
}

//������� ��������� ����� �� ������� � ����
function add_otziv($id_k, $mess, $clas_mess, $lang)
{
    global $id_k; //���������� �������������� ������ ���������� ������ � �������� �� ���� ������� � ���������� ������ ��������� �� ������� �������� � ����� �� �������� ������

    $fam = $GLOBALS["fam"];
    $name = $GLOBALS["name"];
    $email = $GLOBALS["email"];
    $otziv = $GLOBALS["otziv"];

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
        if (@$fam != '' && @$name != '' && @$email != '' && @$otziv != '') {
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
    // �������� �� ������ ������
    $kol = count_otziv(strrepl(trim(@$otziv)), @$id_k);

    if ((@$otziv != '') && (@$fam != '') && (@$name != '') && (@$email != '')) {
        if ($kol == 0) {
            insert_otziv(strrepl(trim(@$otziv)), @$id_k);

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
        $str = "'����������� ������������ ���� �������, ���, E-mail, �����!'";
        echo "<script language='JavaScript1.2'>alert ($str)</script>";
    }

}


?>