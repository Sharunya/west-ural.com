<?
/*
В этом модуле реализованы функции для работы с клиентами


 _______________________________СПИСОК ФУНКЦИЙ_________________________________

 									 № 1
function spisok_klients($sort,$start,$cnt) - Функция возращает список клиентов
$sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать
Выходные параметры: "содержимое таблицы t_klients" в формате результата sql запроса

//Функции возращаеют список клиентов в соответствии с фильтром и ограничением постранично      		№ 1A - 1H
function spisok_clients_f1_s($nm,$start,$cnt)
Входные параметры:$nm - по какому слову искать, $start - с какой записи выдать результат, $cnt - сколько записей выдать



//Функция добавляет клиента в базу              № 2
function add_clients($fam,$name,$otch,$email,$tel,$rem,$firma,$login,$psw)
$fam,$name,$otch,$email,$tel,$rem,$firma - фамилия, имя, отчество, емайл, тел, описание, фирма, логин, пароль

//Функция удаляет клиента каскадно                     № 3
function del_clients($id)

//Функция обновляет клиента                     № 4
function update_clients($id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login,$psw)
$id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login.$psw - номер записи,фамилия, имя, отчество, емайл, тел, описание, фирма, логин, пароль

//Функция обновляет клиента не обновляя psw                    № 4A
function update_clients1($id,$fam,$name,$otch,$email,$tel,$rem,$firma,$login)

                                     № 5
//Функция обновляет поле isactive таблицы t_klients                       № 5
function  redraw_clients($id,$isactive)
Входные параметры: $id - id клиента, $isactive - (Y или N) будет заблоктрован или нет

                                  № 6
//Функция возращает строку клиента
function spisok_edit_clients($id)
Выходные параметры: "содержимое строки таблицы t_klients" в формате результата sql запроса


//Функция возращает кол-во одинаковых клиентов № 7
function count_clients($fam,$name,$otch,$email,$rem,$log,$tel,$firma)
Входные параметры:   $fam,$name,$otch,$email,$rem,$log,$tel,$firma - фамилия, имя, отчество, емайл, описание,логин, тел, фирма
Выходные параметры: число


//Функция возращает кол-во одинаковых клиентов без учета клиента с id № 7A
function count_clients1($id,$fam,$name,$otch,$email,$rem,$log,$tel,$firma)
Входные параметры:   $id,$fam,$name,$otch,$email,$rem,$log,$tel,$firma - id клиента,фамилия, имя, отчество, емайл, описание,логин, тел, фирма
Выходные параметры: число

//Функция заменяет в строке знаки * на %                № 8
function zv_replace($s)
Вход строка
Выход строка

//Функция отправляет информацию о регистрации клиента   № 9
function send_reg($email,$name,$fam,$log,$pass)
Входные параметры: емэйл, имя, фамилия, логин, пароль
Выходные true если письмо ушло, false - неушло

//Функция ищет одинаковый пароль или логин № 10
function search_pass($id,$log,$pass)
Входные параметры: id, логин, пароль
Выходные true  - есть такой логин или пароль иначе false

                              № 11
//Функция возвращает инфо о клиенте в соответствии с его логином и паролем
function client_with_login($user_login,$user_password)
Входные параметры: логин, пароль
Выходные: запись из t_klients

                              № 12
//Функция проверяет есть ли такой пароль или логин
function check_pass($log,$pass)
Входные параметры:
логин,пароль
Выходные: true,false

//-----------КЛИЕНТСКИЕ ФУНКЦИИ------------------------------------

//функция строит форму клиентской информации
function form_client_client($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$textarea_cols,$textarea_rows,$size,$clas_input)
Входные параметры:
Входные параметры:
$zagl - заголовок формы
$clas_zagl - Имя класса таблицы CSS для заголовка
$tbl_border - ширина бордюра.
$tbl_align - выравнивание колонки на странице: center, left, right
$tbl_width - ширина колонки.
$tbl_cellspacing - расстояние между ячейками.
$tbl_cellpadding - расстояние текста от ячейки
$clas - Имя класса таблицы CSS для всех
$textarea_cols - ширина textarea
$textarea_rows - высота textarea
$size - ширина текстовых полей
$clas_input - Имя класса таблицы CSS для текстовых полей

//Функция добавляет клиента или АПДЭЙТИТ его инфу не апдейтя логин и пароль
function add_clients_clients($mess,$clas_mess,$lang,$user_login_global,$user_password_global,$clas_input)
$mess - строка выводимая после успешной регистрации , если пробел то нет ни какого сообщения
$clas_mess - стиль строки
$lang - вид строки, 2 значения 'html' - в виде html, 'java' - в виде сообщения с кнопкой ОК
$user_login_global,$user_password_global - после регистрации имя и пароль в этих глобальных переменных а затем во внешнем сценарии идет их перезапись уже в переменные сессии $user_login,$user_password иначе сессия не работает

//Функция строит Форму авторизации
function form_login($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$size)
Входные параметры:
$zagl - заголовок формы
$clas_zagl - Имя класса таблицы CSS для заголовка
$tbl_border - ширина бордюра.
$tbl_align - выравнивание колонки на странице: center, left, right
$tbl_width - ширина колонки.
$tbl_cellspacing - расстояние между ячейками.
$tbl_cellpadding - расстояние текста от ячейки
$clas - Имя класса таблицы CSS для всех
$size - ширина текстовых полей
$clas_input - Имя класса таблицы CSS для текстовых полей

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

*/


//Функция возращает список клиентов        		№ 1
function spisok_clients($sort, $start, $cnt)
{
    $z = "select * from t_klients ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1A
function spisok_clients_f1_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where fam like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1B
function spisok_clients_f2_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where name like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1C
function spisok_clients_f3_s($nm, $start, $cnt)
{
    $z = "select * from t_klients where email like '$nm' and login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1D
function spisok_clients_f1($nm, $start, $cnt)
{
    $z = "select * from t_klients where fam like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1E
function spisok_clients_f2($nm, $start, $cnt)
{
    $z = "select * from t_klients where name like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1F
function spisok_clients_f3($nm, $start, $cnt)
{
    $z = "select * from t_klients where email like '$nm' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список клиентов в соответствии с фильтром       		№ 1H
function spisok_clients_s($start, $cnt)
{
    $z = "select * from t_klients where login!='' and psw!='' ORDER BY fam ASC LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет клиента в базу              № 2
function add_clients($fam, $name, $otch, $email, $tel, $rem, $firma, $login, $psw)
{
    $z = "insert into t_klients (fam,name,otch,email,tel,rem,firma,login,psw) values('" . $fam . "','" . $name . "','" . $otch . "','" . $email . "','" . $tel . "','" . $rem . "','" . $firma . "','" . $login . "','" . $psw . "')";
    execute_sql($z);
}

//Функция удаляет клиента                       № 3
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

//Функция обновляет клиента                     № 4
function update_clients($id, $fam, $name, $otch, $email, $tel, $rem, $firma, $log, $pass)
{
    $z = "update t_klients set fam='$fam', name='$name', otch='$otch', email='$email', tel='$tel', rem='$rem', firma='$firma', login='$log', psw='$pass' where id=$id";
    execute_sql($z);
}

//Функция обновляет клиента не обновляя psw                    № 4A
function update_clients1($id, $fam, $name, $otch, $email, $tel, $rem, $firma)
{
    $z = "update t_klients set fam='$fam', name='$name', otch='$otch', email='$email', tel='$tel', rem='$rem', firma='$firma' where id=$id";
    execute_sql($z);
}

//Функция обновляет поле isactive таблицы t_klients                       № 5
function  redraw_clients($id, $isactive)
{
    $z = "update t_klients set isactive='$isactive' where id=$id";
    execute_sql($z);
}

//Функция возращает строку клиента        		№ 6
function spisok_edit_clients($id)
{
    $z = "select * from t_klients where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает кол-во одинаковых клиентов № 7
function count_clients($fam, $name, $otch, $email, $rem, $log, $tel, $firma)
{
    $z = "select count(*) as kolvo from t_klients where fam='$fam' and name='$name' and otch='$otch' and email='$email' and rem='$rem' and login='$log' and tel='$tel' and firma='$firma'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возращает кол-во одинаковых клиентов № 7A
function count_clients1($id, $fam, $name, $otch, $email, $rem, $log, $tel, $firma)
{
    $z = "select count(*) as kolvo from t_klients where fam='$fam' and name='$name' and otch='$otch' and email='$email' and rem='$rem' and login='$log' and tel='$tel' and firma='$firma' and id!='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция заменяет в строке знаки * на %                № 8
function zv_replace($s)
{
    $s = str_replace("*", "%", $s);
    return $s;
}

//Функция отправляет информацию о регистрации клиента   № 9
function send_reg($email, $name, $fam, $log, $pass)
{
    $message =
        "Content-type:text/plain; charset=windows-1251

From: Webmaster
To:" . $fam . " " . $name . " <" . $email . ">
Subject: Информация о регистрации
Content-type: text/plain; charset=windows-1251

Уважаемый(ая)  " . $fam . " " . $name . "!
Вы зарегистрировались на сайте XXXXXXXX
Ваш логин: " . $log . "
Ваш пароль: " . $pass . "

С уважением, Администрация сайта.";

    if (mail($email, "", $message) == true)
        return true;
    else
        return false;
}

//Функция ищет одинаковый пароль или логин № 10
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

//Функция возвращает инфо о клиенте в соответствии с его логином и паролем    № 11
function client_with_login($user_login, $user_password)
{
    $z = "select * from t_klients where login='" . $user_login . "' and psw='" . $user_password . "'";
    $r = execute_sql($z);
    return $r;
}

//Функция проверяет есть ли такой пароль или логин  № 12
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

//-----------КЛИЕНТСКИЕ ФУНКЦИИ------------------------------------

//функция строит форму клиентской информации
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
    if ((@$user_login) && (@$user_password))   // если в сессии есть логин и пароль т.е. пользователь регеный то в полях отображаем имя фамилию и email
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
    echo "<tr class='$clas'><td class='$clas'>Фамилия: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Имя: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Отчество:</td><td class='$clas'><input class='$clas_input' type='text' name='otch' id='otch' size='$size' value='$otch'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:<font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' name='email' id='email' size='$size' value='$email'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Телефон:</td><td class='$clas'><input class='$clas_input' type='text' name='tel' id='tel' size='$size' value='$tel'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Фирма:</td><td class='$clas'><input class='$clas_input' type='text' name='firma' id='firma' size='$size' value='$firma'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Логин: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='text' $read name='log' id='log' size='$size' value='$log'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Пароль: <font color='red'>*</font></td><td class='$clas'><input class='$clas_input' type='password' $read name='pass' id='pass' size='$size' value='$pass'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'>О себе:</td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'><textarea class='$clas_input' name='msg' id='msg' cols='$textarea_cols' rows='$textarea_rows'>$msg</textarea></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='save' id='save' value='Сохранить'></td></tr>";
    echo "</form></table>";
}

//Функция добавляет клиента или АПДЭЙТИТ его инфу не апдейтя логин и пароль
function add_clients_clients($mess, $clas_mess, $lang, $user_login_global, $user_password_global)
{

    global $user_login_global;       //после регистрации имя и пароль занесуться в эти глобальные переменные а затем во внешнем сценарии уже в переменные сессии $user_login,$user_password
    global $user_password_global;

    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    if ((@$user_login) && (@$user_password))  //Если в сессии есть имя и пароль пользователя
    {
        $z = client_with_login(@$user_login, @$user_password);
        $m_id = sql_to_array($z, "id");
        $id = $m_id[1];        // определяем id клиента
        $fam = $GLOBALS["fam"];
        $name = $GLOBALS["name"];
        $email = $GLOBALS["email"];
        $otch = $GLOBALS["otch"];
        $tel = $GLOBALS["tel"];
        $firma = $GLOBALS["firma"];
        $msg = $GLOBALS["msg"];
        if (@$fam && @$name && @$email) //проверка на заполнение полей
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
            $str = "'Незаполнены обязательные поля Фамилия, Имя, E-mail, Логин, Пароль!'";
            echo "<script language='JavaScript1.2'>alert ($str)</script>";
        }
    } else {
        if (@$GLOBALS["id_notautorized"]) //если уже есть не регеный клиент
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
            if (@$fam && @$name && @$email) //проверка на заполнение полей
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
                    $str = "'Такой логин или пароль уже существует!'";
                    echo "<script language='JavaScript1.2'>alert ($str)</script>";
                }
            } else {
                $str = "'Незаполнены обязательные поля Фамилия, Имя, E-mail, Логин, Пароль!'";
                echo "<script language='JavaScript1.2'>alert ($str)</script>";
            }
        } else   // если нет то пользователь не регеный добавляем его
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
            if (@$fam && @$name && @$log && @$pass && @$email) //проверка на заполнение полей
            {
                if (!check_pass(strrepl(trim(@$log)), md5(strrepl(trim(@$pass))))) {
                    if (count_clients(strrepl(trim(@$fam)), strrepl(trim(@$name)), strrepl(trim(@$otch)), strrepl(trim(@$email)), @$msg, strrepl(trim(@$log)), strrepl(trim(@$tel)), strrepl(trim(@$firma))) == 0)   //проверка на повторную отправку данных
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
                        $str = "'Повторная отправка данных или клиент с такими данными уже существует!'";
                        echo "<script language='JavaScript1.2'>alert ($str)</script>";
                    }
                } else {
                    $str = "'Такой логин или пароль уже существует!'";
                    echo "<script language='JavaScript1.2'>alert ($str)</script>";
                }
            } else {
                $str = "'Незаполнены обязательные поля Фамилия, Имя, E-mail, Логин, Пароль!'";
                echo "<script language='JavaScript1.2'>alert ($str)</script>";
            }

        }
    }
}

//Форма авторизации
function form_login($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $size, $clas_input)
{
    echo "<table class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_login' id='form_login' method='POST'>";
    if ($zagl != '') {
        echo "<tr class='$clas_zagl'><td colspan='2' class='$clas_zagl'>$zagl</td></tr>";
    }
    echo "<tr class='$clas'><td class='$clas'>Логин:</td></tr><tr><td class='$clas'><input class='$clas_input' type='text' name='user_log' id='user_log' size='$size'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Пароль:</td></tr><tr><td class='$clas'><input class='$clas_input' type='password' name='user_pass' id='user_pass' size='$size'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='input' id='input' value='Войти'></td></tr>";
    echo "</form></table>";

}


?>