<?
/*
� ���� ������ ����������� ������� ��� ������ � ���������


 _______________________________������ �������_________________________________

 									 � 1
function spisok_klients($sort,$start,$cnt) - ������� ��������� ������ ��������
$sort - ���������� � ��������� �������, �������� "email DESC", $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������
�������� ���������: "���������� ������� t_klients" � ������� ���������� sql �������

//������� ���������� ������ �������� � ������������ � �������� � ������������ �����������      		� 1A - 1H
function spisok_clients_f1_s($nm,$start,$cnt)
������� ���������:$nm - �� ������ ����� ������, $start - � ����� ������ ������ ���������, $cnt - ������� ������� ������



//������� ��������� ������� � ����              � 2
function add_clients($fam,$name,$otch,$email,$tel,$rem,$firma,$login,$psw)
$fam,$name,$otch,$email,$tel,$rem,$firma - �������, ���, ��������, �����, ���, ��������, �����, �����, ������

//������� ������� ������� ��������                     � 3
function del_clients($id)

//������� ��������� �������                     � 4
function update_clients($id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login,$psw)
$id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login.$psw - ����� ������,�������, ���, ��������, �����, ���, ��������, �����, �����, ������

//������� ��������� ������� �� �������� psw                    � 4A
function update_clients1($id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login)

                                     � 5
//������� ��������� ���� isactive ������� t_klients                       � 5
function  redraw_clients($id,$isactive)
������� ���������: $id - id �������, $isactive - (Y ��� N) ����� ������������ ��� ���

                                  � 6
//������� ��������� ������ �������
function spisok_edit_clients($id)
�������� ���������: "���������� ������ ������� t_klients" � ������� ���������� sql �������


//������� ��������� ���-�� ���������� �������� � 7
function count_clients($fam,$name,$otch,$email,$rem,$log,$tel,$firma)
������� ���������:   $fam,$name,$otch,$email,$rem,$log,$tel,$firma - �������, ���, ��������, �����, ��������,�����, ���, �����
�������� ���������: �����


//������� ��������� ���-�� ���������� �������� ��� ����� ������� � id � 7A
function count_clients1($id,$fam,$name,$otch,$email,$rem,$log,$tel,$firma)
������� ���������:   $id,$fam,$name,$otch,$email,$rem,$log,$tel,$firma - id �������,�������, ���, ��������, �����, ��������,�����, ���, �����
�������� ���������: �����

//������� �������� � ������ ����� * �� %                � 8
function zv_replace($s)
���� ������
����� ������

//������� ���������� ���������� � ����������� �������   � 9
function send_reg($email,$name,$fam,$log,$pass)
������� ���������: �����, ���, �������, �����, ������
�������� true ���� ������ ����, false - ������

//������� ���� ���������� ������ ��� ����� � 10
function search_pass($id,$log,$pass)
������� ���������: id, �����, ������
�������� true  - ���� ����� ����� ��� ������ ����� false

                              � 11
//������� ���������� ���� � ������� � ������������ � ��� ������� � �������
function client_with_login($user_login,$user_password)
������� ���������: �����, ������
��������: ������ �� t_klients

                              � 12
//������� ��������� ���� �� ����� ������ ��� �����
function check_pass($log,$pass)
������� ���������:
�����,������
��������: true,false

//-----------���������� �������------------------------------------

//������� ������ ����� ���������� ����������
function form_client_client($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$textarea_cols,$textarea_rows,$size,$clas_input)
������� ���������:
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

//������� ��������� ������� ��� �������� ��� ���� �� ������� ����� � ������
function add_clients_clients($mess,$clas_mess,$lang,$user_login_global,$user_password_global,$clas_input)
$mess - ������ ��������� ����� �������� ����������� , ���� ������ �� ��� �� ������ ���������
$clas_mess - ����� ������
$lang - ��� ������, 2 �������� 'html' - � ���� html, 'java' - � ���� ��������� � ������� ��
$user_login_global,$user_password_global - ����� ����������� ��� � ������ � ���� ���������� ���������� � ����� �� ������� �������� ���� �� ���������� ��� � ���������� ������ $user_login,$user_password ����� ������ �� ��������

//������� ������ ����� �����������
function form_login($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$size)
������� ���������:
$zagl - ��������� �����
$clas_zagl - ��� ������ ������� CSS ��� ���������
$tbl_border - ������ �������.
$tbl_align - ������������ ������� �� ��������: center, left, right
$tbl_width - ������ �������.
$tbl_cellspacing - ���������� ����� ��������.
$tbl_cellpadding - ���������� ������ �� ������
$clas - ��� ������ ������� CSS ��� ����
$size - ������ ��������� �����
$clas_input - ��� ������ ������� CSS ��� ��������� �����

 _______________________________������ �������_________________________________

*/


//������� ��������� ������ ��������        		� 1
function spisok_clients($sort, $start, $cnt)
{
    $z = "select * from t_klients ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1A
function spisok_clients_f1_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where fam like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1B
function spisok_clients_f2_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where name like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1C
function spisok_clients_f3_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where email like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1D
function spisok_clients_f1($nm, $start, $cnt)
{
    $z = "select * from t_klients where fam like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1E
function spisok_clients_f2($nm, $start, $cnt)
{
    $z = "select * from t_klients where name like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1F
function spisok_clients_f3($nm, $start, $cnt)
{
    $z = "select * from t_klients where email like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������ �������� � ������������ � ��������       		� 1H
function spisok_clients_s($start, $cnt)
{
    $z = "select * from t_klients where login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ������� � ����              � 2
function add_clients($fam, $name, $otch, $email, $tel, $rem, $firma, $login, $psw)
{
    $z = "insert into t_klients (fam,name,otch,email,tel,rem,firma,login,psw) values('" . $fam . "','" . $name . "','" . $otch . "','" . $email . "','" . $tel . "','" . $rem . "','" . $firma . "','" . $login . "','" . $psw . "')";
    execute_sql($z);
}

//������� ������� �������                       � 3
function del_clients($id)
{
    $z = "select * from t_vopros where id='$id'";
    $r = execute_sql($z);
    $m_file = sql_to_array($r, "file");
    $s = realpath("../vopr_otv/file/");
    if ($m_file[1] != '')
        unlink($s . "\\" . $m_file[1]);
    $z = "delete from t_vopros where klient_id=$id";
    execute_sql($z);
    $z = "delete from t_zakaz where klient_id=$id";
    execute_sql($z);
    $z = "delete from t_otzuvs where klient_id=$id";
    execute_sql($z);
    $z = "delete from t_abonents where klient_id=$id";
    execute_sql($z);
    $z = "delete from t_klients where id=$id";
    execute_sql($z);
}

//������� ��������� �������                     � 4
function update_clients($id, $fam, $name, $otch, $email, $tel, $rem, $firma, $log, $pass)
{
    $z = "update t_klients set fam='$fam', name='$name', otch='$otch', email='$email', tel='$tel', rem='$rem', firma='$firma', login='$log', psw='$pass' where id=$id";
    execute_sql($z);
}

//������� ��������� ������� �� �������� psw                    � 4A
function update_clients1($id, $fam, $name, $otch, $email, $tel, $rem, $firma)
{
    $z = "update t_klients set fam='$fam', name='$name', otch='$otch', email='$email', tel='$tel', rem='$rem', firma='$firma' where id=$id";
    execute_sql($z);
}

//������� ��������� ���� isactive ������� t_klients                       � 5
function  redraw_clients($id, $isactive)
{
    $z = "update t_klients set isactive='$isactive' where id=$id";
    execute_sql($z);
}

//������� ��������� ������ �������        		� 6
function spisok_edit_clients($id)
{
    $z = "select * from t_klients where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���-�� ���������� �������� � 7
function count_clients($fam, $name, $otch, $email, $rem, $log, $tel, $firma)
{
    $z = "select count(*) as kolvo from t_klients where fam='$fam' and name='$name' and otch='$otch' and email='$email' and rem='$rem' and login='$log' and tel='$tel' and firma='$firma'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� ��������� ���-�� ���������� �������� � 7A
function count_clients1($id, $fam, $name, $otch, $email, $rem, $log, $tel, $firma)
{
    $z = "select count(*) as kolvo from t_klients where fam='$fam' and name='$name' and otch='$otch' and email='$email' and rem='$rem' and login='$log' and tel='$tel' and firma='$firma' and id!='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//������� �������� � ������ ����� * �� %                � 8
function zv_replace($s)
{
    $s = str_replace("*", "%", $s);
    return $s;
}

//������� ���������� ���������� � ����������� �������   � 9
function send_reg($email, $name, $fam, $log, $pass)
{
    $message =
        "Content-type:text/plain; charset=windows-1251

From: Webmaster
To:" . $fam . " " . $name . " <" . $email . ">
Subject: ���������� � �����������
Content-type: text/plain; charset=windows-1251

���������(��)  " . $fam . " " . $name . "!
�� ������������������ �� ����� XXXXXXXX
��� �����: " . $log . "
��� ������: " . $pass . "

� ���������, ������������� �����.";

    if (mail($email, "", $message) == true)
        return true;
    else
        return false;
}

//������� ���� ���������� ������ ��� ����� � 10
function search_pass($id, $log, $pass)
{
    $z = "select id,login,psw from t_klients ";
    $r = execute_sql($z);
    $m_log = sql_to_array($r, "login");
    $m_psw = sql_to_array($r, "psw");
    $m_id = sql_to_array($r, "id");
    $check = false;
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        if ($m_log[$i] == $log && $m_id[$i] != $id)
            $check = true;
        if ($m_psw[$i] == $pass && $m_id[$i] != $id)
            $check = true;
    }
    return $check;
}

//������� ���������� ���� � ������� � ������������ � ��� ������� � �������    � 11
function client_with_login($user_login, $user_password)
{
    $z = "select * from t_klients where login='" . $user_login . "' and psw='" . $user_password . "'";
    $r = execute_sql($z);
    return $r;
}

//������� ��������� ���� �� ����� ������ ��� �����  � 12
function check_pass($log, $pass)
{
    $z = "select id,login,psw from t_klients ";
    $r = execute_sql($z);
    $m_log = sql_to_array($r, "login");
    $m_psw = sql_to_array($r, "psw");
    $m_id = sql_to_array($r, "id");
    $check = false;
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        if ($m_log[$i] == $log && $m_psw[$i] == $pass)
            $check = true;
    }
    return $check;
}

//-----------���������� �������------------------------------------

//������� ������ ����� ���������� ����������
function form_client_client($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $textarea_cols, $textarea_rows, $size, $clas_input)
{
    echo "<table class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_client_client' id='form_client_client' method='POST'>";
    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_password"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
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
        $m_otch = sql_to_array($z, "otch");
        $m_tel = sql_to_array($z, "tel");
        $m_rem = sql_to_array($z, "rem");
        $m_firma = sql_to_array($z, "firma");
        $m_login = sql_to_array($z, "login");
        if (@$m_name[1] != '')
            $name = $m_name[1];
        else
            $name = '';
//		if (count($m_name)!=0)
//        	$name=$m_name[1];
//        else
//        	$name='';
        if (@$m_fam[1] != '')
            $fam = $m_fam[1];
        else
            $fam = '';
        if (@$m_otch[1] != '')
            $otch = $m_otch[1];
        else
            $otch = '';
        if (@$m_email[1] != '')
            $email = $m_email[1];
        else
            $email = '';
        if (@$m_tel[1] != '')
            $tel = $m_tel[1];
        else
            $tel = '';
        if (@$m_rem[1] != '')
            $msg = $m_rem[1];
        else
            $msg = '';
        if (@$m_firma[1] != '')
            $firma = $m_firma[1];
        else
            $firma = '';
        $log = '';
        $pass = '';

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
        if (@$GLOBALS["otch"])
            $otch = $GLOBALS["otch"];
        else
            $otch = '';
        if (@$GLOBALS["tel"])
            $tel = $GLOBALS["tel"];
        else
            $tel = '';
        if (@$GLOBALS["firma"])
            $firma = $GLOBALS["firma"];
        else
            $firma = '';
        if (@$GLOBALS["msg"])
            $msg = $GLOBALS["msg"];
        else
            $msg = '';
        if (@$GLOBALS["log"])
            $log = $GLOBALS["log"];
        else
            $log = '';
        if (@$GLOBALS["pass"])
            $pass = $GLOBALS["pass"];
        else
            $pass = '';
        $read = '';
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
        }
    }
    echo "<tr class='$clas'><td class='$clas'>�������: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>���: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>��������:</td><td class='$clas'><input class='$clas_input' type='text' name='otch' id='otch' size='$size' value='$otch'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:<font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='email' id='email' size='$size' value='$email'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>�������:</td><td class='$clas'><input class='$clas_input' type='text' name='tel' id='tel' size='$size' value='$tel'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>�����:</td><td class='$clas'><input class='$clas_input' type='text' name='firma' id='firma' size='$size' value='$firma'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>�����: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' $read name='log' id='log' size='$size' value='$log'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>������: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='password' $read name='pass' id='pass' size='$size' value='$pass'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'>� ����:</td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'><textarea class='$clas_input' name='msg' id='msg' cols='$textarea_cols' rows='$textarea_rows'>$msg</textarea></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='save' id='save' value='���������'></td></tr>";
    echo "</form></table>";
}

//������� ��������� ������� ��� �������� ��� ���� �� ������� ����� � ������
function add_clients_clients($mess, $clas_mess, $lang, $user_login_global, $user_password_global)
{

    global $user_login_global;       //����� ����������� ��� � ������ ���������� � ��� ���������� ���������� � ����� �� ������� �������� ��� � ���������� ������ $user_login,$user_password
    global $user_password_global;

    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    if ((@$user_login) && (@$user_password))  //���� � ������ ���� ��� � ������ ������������
    {
        $z = client_with_login(@$user_login, @$user_password);
        $m_id = sql_to_array($z, "id");
        $id = $m_id[1];        // ���������� id �������
        $fam = $GLOBALS["fam"];
        $name = $GLOBALS["name"];
        $email = $GLOBALS["email"];
        $otch = $GLOBALS["otch"];
        $tel = $GLOBALS["tel"];
        $firma = $GLOBALS["firma"];
        $msg = $GLOBALS["msg"];
        if (@$fam && @$name && @$email) //�������� �� ���������� �����
        {
            update_clients1($id, strrepl(trim(@$fam)), strrepl(trim(@$name)), strrepl(trim(@$otch)), strrepl(trim(@$email)), strrepl(trim(@$tel)), strrepl(@$msg), strrepl(trim(@$firma)));
            if ($mess != '') {
                if ($lang == 'html') {
                    echo "<table align='center'><tr><td class='$clas_mess'>$mess</td></tr></table>";
                }
                if ($lang == 'java') {
                    echo "<script language='JavaScript1.2'>alert ('$mess')</script>";
                }
            }
        } else {
            $str = "'����������� ������������ ���� �������, ���, E-mail, �����, ������!'";
            echo "<script language='JavaScript1.2'>alert ($str)</script>";
        }
    } else {
        if (@$GLOBALS["id_notautorized"]) //���� ��� ���� �� ������� ������
        {
            $id = $GLOBALS["id_notautorized"];
            $fam = $GLOBALS["fam"];
            $name = $GLOBALS["name"];
            $email = $GLOBALS["email"];
            $otch = $GLOBALS["otch"];
            $tel = $GLOBALS["tel"];
            $firma = $GLOBALS["firma"];
            $msg = $GLOBALS["msg"];
            $log = $GLOBALS["log"];
            $pass = $GLOBALS["pass"];
            if (@$fam && @$name && @$email) //�������� �� ���������� �����
            {
                if (!check_pass(strrepl(trim(@$log)), md5(strrepl(trim(@$pass))))) {
                    update_clients($id, strrepl(trim(@$fam)), strrepl(trim(@$name)), strrepl(trim(@$otch)), strrepl(trim(@$email)), strrepl(trim(@$tel)), strrepl(@$msg), strrepl(trim(@$firma)), strrepl(trim(@$log)), md5(trim(@$pass)));
                    $user_login_global = $log;
                    $user_password_global = $pass;
                    if ($mess != '') {
                        if ($lang == 'html') {
                            echo "<table align='center'><tr><td class='$clas_mess'>$mess</td></tr></table>";
                        }
                        if ($lang == 'java') {
                            echo "<script language='JavaScript1.2'>alert ('$mess')</script>";
                        }
                    }
                } else {
                    $str = "'����� ����� ��� ������ ��� ����������!'";
                    echo "<script language='JavaScript1.2'>alert ($str)</script>";
                }
            } else {
                $str = "'����������� ������������ ���� �������, ���, E-mail, �����, ������!'";
                echo "<script language='JavaScript1.2'>alert ($str)</script>";
            }
        } else   // ���� ��� �� ������������ �� ������� ��������� ���
        {
            $fam = $GLOBALS["fam"];
            $name = $GLOBALS["name"];
            $email = $GLOBALS["email"];
            $otch = $GLOBALS["otch"];
            $tel = $GLOBALS["tel"];
            $firma = $GLOBALS["firma"];
            $msg = $GLOBALS["msg"];
            $log = $GLOBALS["log"];
            $pass = $GLOBALS["pass"];
            if (@$fam && @$name && @$log && @$pass && @$email) //�������� �� ���������� �����
            {
                if (!check_pass(strrepl(trim(@$log)), md5(strrepl(trim(@$pass))))) {
                    if (count_clients(strrepl(trim(@$fam)), strrepl(trim(@$name)), strrepl(trim(@$otch)), strrepl(trim(@$email)), @$msg, strrepl(trim(@$log)), strrepl(trim(@$tel)), strrepl(trim(@$firma))) == 0)   //�������� �� ��������� �������� ������
                    {
                        add_clients(strrepl(trim(@$fam)), strrepl(trim(@$name)), strrepl(trim(@$otch)), strrepl(trim(@$email)), strrepl(trim(@$tel)), strrepl(@$msg), strrepl(trim(@$firma)), strrepl(trim(@$log)), md5(strrepl(trim(@$pass))));
                        if ($mess != '') {
                            if ($lang == 'html') {
                                echo "<table align='center'><tr><td class='$clas_mess'>$mess</td></tr></table>";
                            }
                            if ($lang == 'java') {
                                echo "<script language='JavaScript1.2'>alert ('$mess')</script>";
                            }
                        }
                        $user_login_global = $log;
                        $user_password_global = $pass;
                    } else {
                        $str = "'��������� �������� ������ ��� ������ � ������ ������� ��� ����������!'";
                        echo "<script language='JavaScript1.2'>alert ($str)</script>";
                    }
                } else {
                    $str = "'����� ����� ��� ������ ��� ����������!'";
                    echo "<script language='JavaScript1.2'>alert ($str)</script>";
                }
            } else {
                $str = "'����������� ������������ ���� �������, ���, E-mail, �����, ������!'";
                echo "<script language='JavaScript1.2'>alert ($str)</script>";
            }

        }
    }
}

//����� �����������
function form_login($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $size, $clas_input)
{
    echo "<table class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_login' id='form_login' method='POST'>";
    if ($zagl != '') {
        echo "<tr class='$clas_zagl'><td colspan='2' class='$clas_zagl'>$zagl</td></tr>";
    }
    echo "<tr class='$clas'><td class='$clas'>�����:</td></tr><tr><td class='$clas'><input class='$clas_input' type='text' name='user_log' id='user_log' size='$size'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>������:</td></tr><tr><td class='$clas'><input class='$clas_input' type='password' name='user_pass' id='user_pass' size='$size'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='input' id='input' value='�����'></td></tr>";
    echo "</form></table>";

}


?>