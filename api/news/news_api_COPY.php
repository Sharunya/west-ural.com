<?
/*
В этом модуле реализованы функции для работы с новостями

///-------
Внимание!!! Сценарий использует  3 переменные в таблице t_var
name=metod val=1 или 2 или 3
name=metod1 val=1 или 2 или 3
name=num_news val=1...9999
///-------

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

 									 № 1
function spisok_news() - Функция возращает список новостей
Выходные параметры: "содержимое таблицы t_news" в формате результата sql запроса

                                    № 1A
//Функция возращает список неудаленных логически новостей
function spisok_news_active()

									 № 2
function add_news($l_descr,$b_descr,$l_img,$b_img,$url,$data_publ) - Функция добавляет новость в базу
Входные параметры: $l_descr - краткое описание новости, $b_descr - новость,
$l_img - путь на сервере к маленькой картинке, $b_img -  путь на сервере к большой картинке,
$url - имя странички для ассоциации с определенной новостью (чтобы на определенной
странице показывалась определенная новость), $data_publ - дата публикации

									 № 3
//Функция удаляет физически все удаленные логически новости
function del_news_fisical()

									 № 4
function update_news($id,$l_descr,$b_descr,$l_img,$b_img,$url,$data_publ)  - Функция обновляет новость
Входные параметры: $l_descr - краткое описание новости, $b_descr - новость,
$l_img - путь на сервере к маленькой картинке, $b_img -  путь на сервере к большой картинке,
$url - имя странички для ассоциации с определенной новостью (чтобы на определенной
странице показывалась определенная новость), $data_publ - дата публикации

                                     № 5
redraw_news($id,$isshow) - Функция обновляет поле isshow таблицы t_news
Входные параметры: $id - id новости, $isshow - (Y или N) будет показываться новость или нет

                                     № 6
function rename_img($img,$id,$type_img) - Функция переиминовывает имя файла в соответствии
с номером id и типом (большая или маленькая картинка)
Входные параметры: $img -имя картинки, $id - id новсти, $type_img - (b или l) большая или маленькая
Выходные параметры: имя картинки (Н/р news_b_1.jpg, news_l_12.gif,...)
Сделано для того чтобы исключить повторяющиеся имена файлов


                                     № 8
function name_img($id,$type_img)    //Функция возращает имя картинки из базы
Входные параметры: $id - id новсти, $type_img - (b или l) большая или маленькая
Выходные параметры: имя картинки

                                     № 9
function update_metod($metod,$metod1,$num_news)  - Функция обновляет метод и число показа новостей
Входные параметры: $metod ("1" - по дате, "2" - по наименьшему счетчику показа, "3" случайно)

                                 № 10
function convert_date($date) //функция конвертит дату из Y-m-d в d.m.Y
Входные параметры: $date - data в формате Y-m-d (вывод из MySQL)
Выходные параметры: строка даты
                                     № 11
//функция возвращает массив из 3х элементов где [1] метод показа колонки новостей,[2] метод показа связанных новостей,[3] кол-во новостей
метод: 1- по убыванию даты, 2 - по наим кол-ву показов, 3 - случайно.
function out_metod()
Выходные параметры: массив из 3х элементов

  										№ 13
function convert_date_mysql($date)  //функция конвертит дату из d.m.Y в  Y-m-d
Входные параметры: $date - data в формате d.m.Y
Выходные параметры: строка даты

                                  № 14
function spisok_edit_news($id)//Функция возращает строку новостей
Выходные параметры: "содержимое строки таблицы t_news" в формате результата sql запроса


                                           № 15
//Функция возращает кол-во одинаковых новостей
function count_msg($msg,$opisanie,$url,$url_word,$url_svyaz)
Входные параметры: текст новости, описание, url, слово, url связанной новости
Выходные параметры: число

                                           15A
//Функция возращает кол-во одинаковых новостей без учета новости с id №
function count_msg1($id,$msg,$opisanie,$url,$url_word,$url_svyaz)
Входные параметры: id новости, текст новости, описание, url, слово, url связанной новости
Выходные параметры: число

                                          № 16
function spisok_pages()  //Функция возращает таблицу t_web_page

                                          № 17
function spisok_stand_news() - Функция возращает таблицу t_news со всеми активными не связанными новостями

                                          № 18
function spisok_stand_news_date()  Функция возращает таблицу t_news со всеми активными не связанными новостями  по убыванию даты

                                         № 19
function spisok_stand_news_count() Функция возращает таблицу t_news со всеми активными не связанными новостями  по возрастанию счетчика показа

                                          № 20
function spisok_svyaz_news() //Функция возращает таблицу t_news со всеми активными связанными новостями

                                          № 21
function spisok_svyaz_news_date() - Функция возращает таблицу t_news со всеми активными связанными новостями  по убыванию даты

                                          № 22
function spisok_svyaz_news_count() //Функция возращает таблицу t_news со всеми активными связанными новостями  по возрастанию счетчика показа

                                          № 23
function update_count($id,$coun) //Функция обновляет количество показов новости

                                          № 24
//Функция восстанавливает логически удаленные новости
function rescue_news_logical($id)

                                          № 25
//Функция возращает таблицу t_news со всеми неактивными (логически удаленными) новостями
function spisok_news_noactive()

                                          № 26
//Функция удаляет вопрос логически
function del_news_logical($id)

                                          № 27
Функция генерит скрипт для корректировки картинок в новостях
function avto_korrektirovka_img_in_news(){

//--------------------------Функция показывает колонку новостей на клиенте
function show_news($show_date,$corner,$tbl_border,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$clas_date,$num_news,$url_svyaz="",$target="_blank",$img_path)
Входные параметры:
$show_date - показ даты. Если "y" -даты показываются, отлично от "y" - нет.
$corner - где показывать маленькую картинку в новости. "left" слева, "right" справа, "top" над новостью, "bottom" под новостью.
$tbl_border - ширина бордюра.
$tbl_align - выравнивание колонки на странице: center, left, right
$tbl_width - ширина колонки.
$tbl_cellspacing - расстояние между ячейками.
$tbl_cellpadding - расстояние текста от ячейки
$clas - Имя класса таблицы CSS для всех кроме даты
$clas_date  - Имя класса таблицы CSS для даты новости
$num_news - количество новостей в колонке, параметр игнорируется если будет показываться основная колонка ($url_svyaz="") т.к для нее кол-во показов задается через админ интерфейс
$url_svyaz - имя связанной страницы, если есть то отображаются только новости связанные с этой страницой, если нет то отображаются все не связанные новости
$target - где открывать ссылку при нажатии на новости '_blank' - в новом окне, 'self' в этом же и т.д.
$img_path - строка пути к картинкам
Выходные параметры:
Колонка(таблица новостей) в формате HTML
*/


//______________________________КОД ФУНКЦИЙ____________________________________


//Функция возращает список новостей        		№ 1
function spisok_news()
{
    $z = "select * from t_news ORDER BY id ASC";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список неудаленных логически новостей        		№ 1A
function spisok_news_active()
{
    $z = "select * from t_news where isactive='Y' ORDER BY id ASC";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет новость в базу              № 2
function add_news($l_descr, $b_descr, $l_img, $b_img, $url, $url_word, $url_svyaz, $data_publ)
{
    $z = "insert into t_news (litle_descr,big_descr,litle_img,big_img,url,url_word,url_svyaz,data_publ) values('" . $l_descr . "','" . $b_descr . "','" . $l_img . "','" . $b_img . "','" . $url . "','" . $url_word . "','" . $url_svyaz . "','" . $data_publ . "')";
    execute_sql($z);
}

//Функция удаляет физически все удаленные логически новости                      № 3
function del_news_fisical()
{
    $z = "select * from t_news where isactive='N'";
    $r = execute_sql($z);
    $m_id = sql_to_array($r, "id");
    $m_l_img = sql_to_array($r, "litle_img");
    $m_b_img = sql_to_array($r, "big_img");
    $s = realpath("img/");
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        if ($m_l_img[$i] != '')
            unlink($s . "\\" . $m_l_img[$i]);
        if ($m_b_img[$i] != '')
            unlink($s . "\\" . $m_b_img[$i]);
        $z = "delete from t_news where id='$m_id[$i]'";
        execute_sql($z);
    }
}

//Функция обновляет новость                     № 4
function update_news($id, $l_descr, $b_descr, $l_img, $b_img, $url, $url_word, $url_svyaz, $data_publ)
{
    $z = "update t_news set litle_descr='$l_descr', big_descr='$b_descr', litle_img='$l_img', big_img='$b_img', url='$url', url_word='$url_word', url_svyaz='$url_svyaz', data_publ='$data_publ' where id=$id";
    execute_sql($z);
}

//Функция обновляет поле isshow таблицы t_news                       № 5
function  redraw_news($id, $isshow)
{
    $z = "update t_news set isshow='$isshow' where id=$id";
    execute_sql($z);
}

//Функция переиминовывает имя файла в соответствии с номером id и типом (большая или маленькая картинка)   № 6
function rename_img($img, $id, $type_img)
{
    $s = substr($img, -5);
    if ($s[0] == '.')
        $img = "news_" . $type_img . "_" . $id . $s;
    if ($s[1] == '.')
        $img = "news_" . $type_img . "_" . $id . $s[1] . $s[2] . $s[3] . $s[4];
    if ($s[2] == '.')
        $img = "news_" . $type_img . "_" . $id . $s[2] . $s[3] . $s[4];
    if ($s[3] == '.')
        $img = "news_" . $type_img . "_" . $id . $s[3] . $s[4];
    return $img;
}


//Функция возращает имя картинки из базы             № 8
function name_img($id, $type_img)
{
    if ($type_img == "l") {
        $z = "select litle_img from t_news where id='$id'";
        $r = execute_sql($z);
        $tmp = sql_to_array($r, "litle_img");
    }
    if ($type_img == "b") {
        $z = "select big_img from t_news where id='$id'";
        $r = execute_sql($z);
        $tmp = sql_to_array($r, "big_img");
    }
    return $tmp[1];
}

//Функция устанавливает метод и число показа новостей      № 9
function update_metod($metod, $metod1, $num_news)
{
    $z = "update t_var set val='$metod' where name='metod'";
    execute_sql($z);
    $z = "update t_var set val='$metod1' where name='metod1'";
    execute_sql($z);
    $z = "update t_var set val='$num_news' where name='num_news'";
    execute_sql($z);
}


//                                           № 11
//функция возвращает массив из 3х элементов где [1] метод показа колонки новостей,[2] метод показа связанных новостей,[3] кол-во новостей
function out_metod()
{
    $z = "select val from t_var where name='metod'";
    $r = execute_sql($z);
    $tmp1 = sql_to_array($r, "val");
    $z = "select val from t_var where name='metod1'";
    $r = execute_sql($z);
    $tmp2 = sql_to_array($r, "val");
    $z = "select val from t_var where name='num_news'";
    $r = execute_sql($z);
    $tmp3 = sql_to_array($r, "val");
    $m_metod[1] = $tmp1[1];
    $m_metod[2] = $tmp2[1];
    $m_metod[3] = $tmp3[1];
    unset($tmp1);
    unset($tmp2);
    unset($tmp3);
    return $m_metod;
}


//Функция возращает строку новостей        		№ 14
function spisok_edit_news($id)
{
    $z = "select * from t_news where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает кол-во одинаковых новостей № 15
function count_msg($msg, $opisanie, $url, $url_word, $url_svyaz)
{
    $z = "select count(*) as kolvo from t_news where big_descr='$msg' and litle_descr='$opisanie' and url='$url' and url_word='$url_word' and url_svyaz='$url_svyaz'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возращает кол-во одинаковых новостей без учета новости с id № 15A
function count_msg1($id, $msg, $opisanie, $url, $url_word, $url_svyaz)
{
    $z = "select count(*) as kolvo from t_news where big_descr='$msg' and litle_descr='$opisanie' and url='$url' and url_word='$url_word' and url_svyaz='$url_svyaz' and id!='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возращает таблицу t_web_page    № 16
function spisok_pages()
{
    $z = "select * from t_web_page order by id asc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными не связанными новостями    № 17
function spisok_stand_news()
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='' order by id asc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными не связанными новостями  по убыванию даты  № 18
function spisok_stand_news_date()
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='' order by id desc, data_publ desc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными не связанными новостями  по возрастанию счетчика показа  № 19
function spisok_stand_news_count()
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='' order by count_show asc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными связанными новостями    № 20
function spisok_svyaz_news($url_svyaz)
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='$url_svyaz' order by id asc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными связанными новостями  по убыванию даты  № 21
function spisok_svyaz_news_date($url_svyaz)
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='$url_svyaz' order by id desc, data_publ desc";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает таблицу t_news со всеми активными связанными новостями  по возрастанию счетчика показа  № 22
function spisok_svyaz_news_count($url_svyaz)
{
    $z = "select * from t_news where isshow='Y' and isactive='Y' and url_svyaz='$url_svyaz' order by count_show asc";
    $r = execute_sql($z);
    return $r;
}

//Функция обновляет количество показов новости № 23
function update_count($id, $coun)
{
    $z = "update t_news set count_show='$coun' where id='$id'";
    execute_sql($z);
}

//Функция восстанавливает логически удаленные новости                       № 24
function rescue_news_logical($id)
{
    $z = "update t_news set isactive='Y' where id='$id'";
    execute_sql($z);
}

//Функция возращает таблицу t_news со всеми неактивными (логически удаленными) новостями       № 25
function spisok_news_noactive()
{
    $z = "select * from t_news where isactive='N'";
    $r = execute_sql($z);
    return $r;
}

//Функция удаляет вопрос логически    № 26
function del_news_logical($id)
{
    $z = "update t_news set isactive='N' where id='$id'";
    execute_sql($z);
}

///////-----------------КЛИЕНТСКИЕ ФУНКЦИИ----------------------////////

//Функция генерит скрипт для корректировки картинок в новостях
function avto_korrektirovka_img_in_news()
{
    echo "
<script language='JavaScript'>      //Эта функция изменяет пропорционально размеры картинки в колонке новостей в соответствии с шириной колонки
	function resize_img(name_img,tbl_width,SY,SX)
    {
        if (SY>tbl_width)
	        {k=SY/(tbl_width);}
        else
	        {k=1;}
        SYnew=SY/k;
        SXnew=SX/k;
        document.all[name_img].width=SYnew;
        document.all[name_img].height=SXnew;
    }
	function resize_img_right(name_img,tbl_width,SY,SX)   //та же функция только для картинки слева и справа
    {
    	tbl_w=tbl_width/100*40;
        if (SY>tbl_w)
	        {k=SY/(tbl_w);}
        else
	        {k=1;}
        SYnew=SY/k;
        SXnew=SX/k;
        document.all[name_img].width=SYnew;
        document.all[name_img].height=SXnew;
    }

</script>";
}


//--------------------------Функция показывает колонку новостей на клиенте
function show_news($show_date, $corner, $tbl_border, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $clas_date, $num_news, $url_svyaz = "", $target = "_blank", $img_path)//,$img_width,$img_height)
{
    $m_metod = out_metod();
    if ($url_svyaz == "")   //выбираем новости в соответствии с показом
    {
        $num_news = $m_metod[3];
        $metod = $m_metod[1];
        if ($metod == 1)
            $z = spisok_stand_news_date();
        if ($metod == 2)
            $z = spisok_stand_news_count();
        if ($metod == 3)
            $z = spisok_stand_news();
    } else {
        $metod = $m_metod[2];
        if ($metod == 1)
            $z = spisok_svyaz_news_date($url_svyaz);
        if ($metod == 2)
            $z = spisok_svyaz_news_count($url_svyaz);
        if ($metod == 3)
            $z = spisok_svyaz_news($url_svyaz);
    }
    $m_id = sql_to_array($z, "id");
    if ($metod == 3) {                  ////-------Перемешивание массива случайным образом
        $m_id_shuf[1] = 0;
        for ($i = 1; $i < count($m_id) + 1; $i++) {
            mt_srand(time() + (double)microtime() * 1000000);
            $e = mt_rand(1, count($m_id));
            for ($j = 1; $j < count($m_id_shuf) + 1; $j++) {
                if ($m_id_shuf[$j] == $m_id[$e]) {
                    $x = false;
                    $j = count($m_id_shuf) + 1;
                } else
                    $x = true;
            }
            if ($x == false)
                $i--;
            else {
                $m_id_shuf[$i] = $m_id[$e];
            }
        }             ////----------------------
    }
    $m_l_descr = sql_to_array($z, "litle_descr");
    $m_b_descr = sql_to_array($z, "big_descr");
    $m_l_img = sql_to_array($z, "litle_img");
    $m_b_img = sql_to_array($z, "big_img");
    $m_isshow = sql_to_array($z, "isshow");
    $m_url = sql_to_array($z, "url");
    $m_url_word = sql_to_array($z, "url_word");
    $m_url_svyaz = sql_to_array($z, "url_svyaz");
    $m_count_show = sql_to_array($z, "count_show");
    $m_data_publ = sql_to_array($z, "data_publ");
    if (count($m_id) < $num_news)
        $num_news = count($m_id);
//    if (count($m_id)==0)
//       $num_news=1;
    for ($i = 1; $i < $num_news + 1; $i++)//узнаем есть ли картинка в списке новостей если да то ячейки без картинок объединяем
    {
        if ($m_l_img[$i] != '') {
            $es = "colspan=2";
            $i = $num_news + 1;
        } else
            $es = "";
    }
    echo "<table align='$tbl_align' class='$clas' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    for ($i = 1; $i < $num_news + 1; $i++) {
        if ($metod == 3) {
            $z = spisok_edit_news($m_id_shuf[$i]);
            $m_id = sql_to_array($z, "id");
            $m_l_descr = sql_to_array($z, "litle_descr");
            $m_b_descr = sql_to_array($z, "big_descr");
            $m_l_img = sql_to_array($z, "litle_img");
            $m_b_img = sql_to_array($z, "big_img");
            $m_isshow = sql_to_array($z, "isshow");
            $m_url = sql_to_array($z, "url");
            $m_url_word = sql_to_array($z, "url_word");
            $m_url_svyaz = sql_to_array($z, "url_svyaz");
            $m_count_show = sql_to_array($z, "count_show");
            $m_data_publ = sql_to_array($z, "data_publ");
            $j = $i;
            $i = 1;
        }
        if ($corner == 'left')   //Строим таблицу где картинка слева от новости
        {
            if ($show_date == "y")
                echo "<tr class='$clas_date'><td $es class='$clas_date'>" . convert_date($m_data_publ[$i]) . "</td></tr>";
            echo "<tr class='$clas'>";
            if ($m_l_img[$i] != '') {
                $sss = $img_path . $m_l_img[$i];
                $im = GetImageSize($sss); //вычисляем размеры картинки
                $ess = true;
                if ($m_b_img[$i] != '') {
                    echo "<td class='$clas'><a class='$clas' href='$img_path$m_b_img[$i]' target='_blank'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></a></td>";
                    echo "<script LANGUAGE='JavaScript'>resize_img_right('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                } else {
                    echo "<td class='$clas'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></td>";
                    echo "<script LANGUAGE='JavaScript'>resize_img_right('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                }
            } else
                $ess = false;
            if ($m_url[$i] == '') {
                if ($ess == true)
                    echo "<td class='$clas'>$m_b_descr[$i]</td></tr>";
                else
                    echo "<td $es class='$clas'>$m_b_descr[$i]</td></tr>";
            } else {
                if ($ess == true) {
                    if ($m_url_word[$i] != '')
                        echo "<td class='$clas'>$m_b_descr[$i] <a class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td></tr>";
                    else
                        echo "<td class='$clas'><a class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td></tr>";
                } else {
                    if ($m_url_word[$i] != '')
                        echo "<td $es class='$clas'>$m_b_descr[$i] <a class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td></tr>";
                    else
                        echo "<td $es class='$clas'><a  class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td></tr>";
                }
            }
        }
        if ($corner == 'right')    //Строим таблицу где картинка справа от новости
        {
            if ($m_l_img[$i] != '') {
                $ess = true;
            } else
                $ess = false;
            if ($show_date == "y")
                echo "<tr $es class='$clas_date'><td $es class='$clas_date'>" . convert_date($m_data_publ[$i]) . "</td></tr>";
            echo "<tr class='$clas'>";
            if ($m_url[$i] == '') {
                if ($ess == true)
                    echo "<td class='$clas'>$m_b_descr[$i]</td>";
                else
                    echo "<td $es class='$clas'>$m_b_descr[$i]</td>";
            } else {
                if ($ess == true) {
                    if ($m_url_word[$i] != '')
                        echo "<td class='$clas'>$m_b_descr[$i] <a  class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td>";
                    else
                        echo "<td class='$clas'><a  class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td>";
                } else {
                    if ($m_url_word[$i] != '')
                        echo "<td $es class='$clas'>$m_b_descr[$i] <a  class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td>";
                    else
                        echo "<td $es class='$clas'><a  class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td>";
                }
            }
            if ($m_l_img[$i] != '') {
                $sss = $img_path . $m_l_img[$i];
                $im = GetImageSize($sss); //вычисляем размеры картинки
                if ($m_b_img[$i] != '') {
                    echo "<td class='$clas'><a class='$clas' href='$img_path$m_b_img[$i]' target='_blank'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></a></td>";
                    echo "<script LANGUAGE='JavaScript'>resize_img_right('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                } else {
                    echo "<td class='$clas'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></td></tr>";
                    echo "<script LANGUAGE='JavaScript'>resize_img_right('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                }
            }
        }
        if ($corner == 'top')     //Строим таблицу где картинка сверху от новости
        {
            if ($show_date == "y")
                echo "<tr class='$clas_date'><td class='$clas_date'>" . convert_date($m_data_publ[$i]) . "</td></tr>";
            if ($m_l_img[$i] != '') {
                $sss = $img_path . $m_l_img[$i];
                $im = GetImageSize($sss); //вычисляем размеры картинки
                if ($m_b_img[$i] != '') {
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$img_path$m_b_img[$i]' target='_blank'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></a></td></tr>";
                    echo "<script LANGUAGE='JavaScript'>resize_img('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                } else {
                    echo "<tr class='$clas'><td class='$clas'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></td></tr>";
                    echo "<script LANGUAGE='JavaScript'>resize_img('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                }
            }
            if ($m_url[$i] == '') {

                echo "<tr class='$clas'><td class='$clas'>$m_b_descr[$i]</td></tr><tr><td><img id='break' name='break' border='0' src='img/break_news.gif'></td></tr>";

            } else {
                if ($m_url_word[$i] != '')
                    echo "<tr class='$clas'><td class='$clas'>$m_b_descr[$i] <a  class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td></tr>";
                else

                    echo "<tr class='$clas'><td class='$clas'><a  class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td></tr><tr><td><img id='break' name='break' border='0' src='img/break_news.gif'></td></tr>";

            }
        }
        if ($corner == 'bottom')        //Строим таблицу где картинка снизу от новости
        {
            if ($show_date == "y")
                echo "<tr class='$clas_date'><td class='$clas_date'>" . convert_date($m_data_publ[$i]) . "</td></tr>";
            //echo"<tr class='$clas'>";
            if ($m_url[$i] == '') {
                echo "<tr class='$clas'><td class='$clas'>$m_b_descr[$i]</td></tr>";
            } else {
                if ($m_url_word[$i] != '')
                    echo "<tr class='$clas'><td class='$clas'>$m_b_descr[$i] <a  class='$clas' href='$m_url[$i]' target='$target'>$m_url_word[$i]</a></td></tr>";
                else
                    echo "<tr class='$clas'><td class='$clas'><a  class='$clas' href='$m_url[$i]' target='$target'>$m_b_descr[$i]</a></td></tr>";
            }
            if ($m_l_img[$i] != '') {
                $sss = $img_path . $m_l_img[$i];
                $im = GetImageSize($sss); //вычисляем размеры картинки
                if ($m_b_img[$i] != '') {
                    echo "<tr class='$clas'><td class='$clas'><a class='$clas' href='$img_path$m_b_img[$i]' target='_blank'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></a></td></tr>";
                    echo "<script LANGUAGE='JavaScript'>resize_img('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                } else {
                    echo "<tr class='$clas'><td class='$clas'><img alt='$m_l_descr[$i]' id='news_img$m_id[$i]' name='news_img$m_id[$i]' border='0' src='$img_path$m_l_img[$i]'></td></tr>";
                    echo "<script LANGUAGE='JavaScript'>resize_img('news_img" . $m_id[$i] . "'," . $tbl_width . "," . $im[0] . "," . $im[1] . ");</script>";
                }
            }
        }
        update_count($m_id[$i], $m_count_show[$i] + 1);

        if ($metod == 3)
            $i = $j;

    }///-конец цикла
    echo "</table>";
}

?>