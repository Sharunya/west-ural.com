<?
/*
В этом модуле реализованы функции для работы с разделом отзывы клиентов

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

                                      № 1
//Функция возращает список всех отзывов
function spisok_otzivs($sort,$start,$cnt)
Входные параметры:$sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                                     № 2
//Функция возращает список отзывов только от зарегистрированных пользователей
function spisok_otzivs_reg($sort,$start,$cnt)
Входные параметры:$sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                                   № 3
//Функция удаляет отзыв логически
function del_otziv_logical($id)
Входные параметры:$id - id записи

                                   № 4
//Функция восстанавливает логически удаленные отзывы
function rescue_otziv_logical($id)

                                   № 5
//Функция удаляет физически все удаленные логически  отзывы
function del_otziv_fisical()

                                   № 6
//Функция вставляет отзыв
function update_otziv($id,$otzuv)
Входные параметры:$id - id записи, $otzuv - текст отзыва

                                  № 7
//Функция возращает один отзыв в соответствии с номером id
function spisok_edit_otziv($id)
Входные параметры:$id - id записи

                              № 8
//Функция возвращает количество одинаковых отзывов заданных одним клиентом  № 8
function count_otziv($otzuv,$id)
Входные параметры: вопрос, id клиента
Выходные: количество

                              № 9
//Функция обновляет поле isshow таблицы t_otzuvs
function  redraw_otziv($id,$isshow)
Входные параметры: $id - id клиента, $isshow - (Y или N) будет показан или нет

                              № 10
//Функция возращает список всех отзывов где isshow=Y
function spisok_otzivs_show($sort,$start,$cnt)
Входные параметры:$sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                              № 11
//Функция добавляет отзыв в базу
function insert_otziv($otziv,$id)
Входные параметры: отзыв, id клиента

                              № 12
//Функция возращает список всех отзывов где isactive=N
function spisok_otzivs_noactive()

*/


//------------------------------------------------------------------------------
//_____________КЛИЕНТСКИЕ ФУНКЦИИ________________________________
/*

			№ 1
//функция строит форму задания отзывов
function form_client_otziv($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$textarea_cols,$textarea_rows,$size)
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
$clas_input - - Имя класса таблицы CSS для текстовых полей

			№ 2
//Функция строит список отзывов выводя его постранично
function client_otziv($name_page,$show_date,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas_otziv,$clas_date,$clas_page,$clas_page1,$num_rows,$num_pages)
Входные параметры:
$name_page - имя сценария(страницы) в котором вызвана эта функция
$show_date - показ даты. Если "y" -даты показываются, отлично от "y" - нет.
$tbl_border - ширина бордюра.
$tbl_align - выравнивание колонки на странице: center, left, right
$tbl_width - ширина колонки.
$tbl_cellspacing - расстояние между ячейками.
$tbl_cellpadding - расстояние текста от ячейки
$clas_otziv - Имя класса таблицы CSS для отзывов
$clas_date  - Имя класса таблицы CSS для даты и автора вопроса
$clas_author  - Имя класса таблицы CSS для автора вопроса
$clas_str - Имя класса таблицы CSS для строки страниц
$clas_page  - Имя класса таблицы CSS для номеров страниц не нажатых
$clas_page1  - Имя класса таблицы CSS для нажатого номера страницы
$num_rows - количество записей на страницу
$num_pages - количество номеров страниц в строчке если больше то переносятся на следующую строчку

            № 3
//Функция добавляет отзыв от клиента в базу
function add_otziv($id_k,$mess,$clas_mess,$lang)
Входные параметры:
$id_k - переменная использующаяся вместо переменной сессии (id неавторизованного клиента) и значение ее надо занести в переменную сессии созданную во внешнем сценарии а иначе не работает сессия
$mess - строка выводимая после успешного задания вопроса , если пробел то нет ни какого сообщения
$clas_mess - стиль строки
$lang - вид строки, 2 значения 'html' - в виде html, 'java' - в виде сообщения с кнопкой ОК


*/

//___________________________________________________________________

//Функция возращает список всех отзывов       		№ 1
function spisok_otzivs($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv,isshow,klient_id from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список отзывов только от зарегистрированных пользователей     		№ 2
function spisok_otzivs_reg($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,login,otzuv,isshow,klient_id from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_klients.login!='') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}


//Функция удаляет отзыв логически                       № 3
function del_otziv_logical($id)
{
    $z = "update t_otzuvs set isactive='N' where id='$id'";
    execute_sql($z);
}

//Функция восстанавливает логически удаленные отзывы                       № 4
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

//Функция удаляет физически все удаленные логически отзывы                      № 5
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

//Функция вставляет отзыв        № 6
function update_otziv($id, $otziv)
{
    $z = "update t_otzuvs set otzuv='$otziv' where id=$id";
    execute_sql($z);
}

//Функция возращает один отзыв в соответствии с номером id     		№ 7
function spisok_edit_otziv($id)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_otzuvs.id='$id')";
    $r = execute_sql($z);
    return $r;
}

//Функция возвращает количество одинаковых отзывов заданных одним клиентом  № 8
function count_otziv($otziv, $id)
{
    $z = "select count(*) as kolvo from t_otzuvs where otzuv='$otziv' and klient_id='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция обновляет поле isshow таблицы t_otzuvs                       № 9
function  redraw_otziv($id, $isshow)
{
    $z = "update t_otzuvs set isshow='$isshow' where id=$id";
    execute_sql($z);
}

//Функция возращает список всех отзывов где isshow=Y      		№ 10
function spisok_otzivs_show($sort, $start, $cnt)
{
    $z = "select t_otzuvs.id,t_otzuvs.date,fam,t_klients.name,email,otzuv,isshow from t_klients,t_otzuvs where (t_otzuvs.klient_id=t_klients.id) and (t_otzuvs.isactive='Y') and (t_otzuvs.isshow='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет отзыв в базу № 11
function insert_otziv($otziv, $id)
{
    $z = "insert into t_otzuvs (otzuv,date,klient_id) values('" . strrepl(trim($otziv)) . "',CURDATE(),'" . $id . "')";
    execute_sql($z);
}


//Функция возращает список всех отзывов где isactive=N      		№ 12
function spisok_otzivs_noactive()
{
    $z = "select * from t_otzuvs where (t_otzuvs.isactive='N')";
    $r = execute_sql($z);
    return $r;
}


//_____________КЛИЕНТСКИЕ ФУНКЦИИ________________________________

//функция строит форму задания отзывов
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
    if ((@$user_login) && (@$user_password))   // если в сессии есть логин и пароль т.е. пользователь регеный то в полях отображаем имя фамилию и email
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
    echo "<tr class='$clas'><td class='$clas'>Фамилия:</td><td class='$clas'><input class='$clas_input' type='text' $read name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Имя:</td><td class='$clas'><input class='$clas_input' type='text' $read name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:</td><td class='$clas'><input class='$clas_input' type='text' $read name='email' id='email' size='$size' value='$email'></td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'>Отзыв:</td></tr>";
    echo "<tr class='$clas'><td colspan='2' class='$clas'><textarea class='$clas_input' name='otziv' id='otziv' cols='$textarea_cols' rows='$textarea_rows'>$otziv</textarea></td></tr>";
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='send' id='send' value='Оставить отзыв'></td></tr>";
    echo "</form></table>";
}

//Функция строит список отзывов выводя его постранично
function client_otziv($name_page, $show_date, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas_otziv, $clas_date, $clas_author, $clas_str, $clas_page, $clas_page1, $num_rows, $num_pages)
{
    if (@$GLOBALS["page"])
        $page = $GLOBALS["page"];
    else
        $page = 1;
    // отображаем постранично
    $z = spisok_otzivs_show('id DESC', 0, 9999999);
    $z1 = spisok_otzivs_show('id DESC', ($page * $num_rows) - ($num_rows), $num_rows);
    $m_id1 = sql_to_array($z, "id");
    $numpages = ceil(count($m_id1) / $num_rows); // кол-во страниц
    echo "<table border='0' align='$tbl_align'><tr><td>";
    echo "<table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'><tr  class='$clas_str'><td  class='$clas_str'>";
    if ($numpages != 0)
        echo "Страницы:&nbsp;&nbsp;";
    //else
    //    echo"&nbsp;";
    $s = '.';
    for ($i = 1; $i <= $numpages; $i++)  //рисуем номера страниц
    {
        if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
        {
            echo "<tr class='$clas_str'><td class='$clas_str'>";
        }
        if ($i == $page)
            echo "<a  class='$clas_page' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        else
            echo "<a  class='$clas_page1' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        $s = strval($i / ($num_pages));//преобразуем в строку
        if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
        {
            echo "</td></tr>";
        }
    }
    if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
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

    ///// Построение таблицы существующих вопросов
    echo "<tr><td><table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        $dt = convert_date($m_date_o[$i]);
        if ($m_email[$i] != '') {
            if ($show_date == 'Y')
                echo "<tr><td class='$clas_date'>$dt</td><td class='$clas_author'> Автор: <a href='mailto:$m_email[$i]'>$m_fam[$i] $m_name[$i]</a></td></tr>";
            else
                echo "<tr><td colspan='2' class='$clas_author'>Автор: <a href='mailto:$m_email[$i]'>$m_fam[$i] $m_name[$i]</a></td></tr>";
        } else {
            if ($show_date == 'Y')
                echo "<tr><td class='$clas_date'>$dt</td><td class='$clas_author'> Автор: $m_fam[$i] $m_name[$i]</td></tr>";
            else
                echo "<tr><td colspan='2' class='$clas_author'>Автор: $m_fam[$i] $m_name[$i]</td></tr>";
        }
        echo "<tr class='$clas_otziv'><td colspan='2' class='$clas_otziv'>$m_otziv[$i]</td></tr>";
    }
    echo "</table></td></tr>";
    echo "<tr><td><table align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'><tr class='$clas_str'><td class='$clas_str'>";
    if ($numpages != 0)
        echo "Страницы:&nbsp;&nbsp;";
    //else
    //    echo"&nbsp;";
    $s = '.';
    for ($i = 1; $i <= $numpages; $i++)  //рисуем номера страниц
    {
        if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
        {
            echo "<tr class='$clas_str'><td class='$clas_str'>";
        }
        if ($i == $page)
            echo "<a  class='$clas_page' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        else
            echo "<a  class='$clas_page1' href='$name_page?page=$i'>$i</a>&nbsp;&nbsp;";
        $s = strval($i / ($num_pages));//преобразуем в строку
        if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
        {
            echo "</td></tr>";
        }
    }
    if (strpos($s, '.') === false) //если точку не нашли т.е. деление без остатка
    {
        echo "</td></tr>";
    }
    echo "</table></td></tr></table>";
}

//Функция добавляет отзыв от клиента в базу
function add_otziv($id_k, $mess, $clas_mess, $lang)
{
    global $id_k; //переменная использующаяся вместо переменной сессии и значение ее надо занести в переменную сессии созданную во внешнем сценарии а иначе не работает сессия

    $fam = $GLOBALS["fam"];
    $name = $GLOBALS["name"];
    $email = $GLOBALS["email"];
    $otziv = $GLOBALS["otziv"];

    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    if ((@$user_login) && (@$user_password))  //Если в сессии есть имя и пароль пользователя
    {
        $z = client_with_login(@$user_login, @$user_password);
        $m_id = sql_to_array($z, "id");
        $id_k = $m_id[1];
    } else   // если нет то пользователь не регеный добавляем его
    {
        if (@$fam != '' && @$name != '' && @$email != '' && @$otziv != '') {
            if (@$id_k)    //определяем имя и фамилию прдыдущего задававшего вопрос (зная его id->$id_k(глобальная переменная которая во внешнем сценарии передает значение в переменную сессии а иначе не работает) из сессии )
            {                          //если она совпадает с набитыми в полях именем и фамилией то такого клиента в базу не добавляем
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
                $id = $m_id2[count($m_id2)];        // определяем klient_id
                $id_k = $id;             //заносим id неавторизованного пользователя в сессию чтобы его каждый раз не добавлять при новом вопросе

            }
        }
    }
    // проверка на повтор отзыва
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
            $str = "'Повторная отправка данных!'";
            echo "<script language='JavaScript1.2'>alert ($str)</script>";
        }
    } else {
        $str = "'Незаполнены обязательные поля Фамилия, Имя, E-mail, Отзыв!'";
        echo "<script language='JavaScript1.2'>alert ($str)</script>";
    }

}


?>