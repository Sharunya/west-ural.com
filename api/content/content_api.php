<?
/*
В этом модуле реализованы функции для работы с конентом сайта

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

										№1
function add_web_page($name_web_page, $descr_web_page, $url_web_page) - функция добавляет web страницу
Входные параметры: $name_web_page - имя чтраницы, $descr_web_page - описание страницы, $url_web_page - url страницы

										№2
function spisok_web_page() - функция возращает список web страниц
Выходные параметры: содержимое таблицы t_web_page в формате sql запроса


										№3
function dlt_web_page($id_web_page) - функция удаляет web страницу
Входные параметры: $id_web_page - код страницы, которую хотим удалить.

										№4
function add_content($id_web_page, $nomer_on_page, $content, $anti_html=0) - функция добавляет контент на сайт
Входные параметры: $id_web_page - id web страницы, $nomer_on_page - номер, который идентифицурует контент на странице,
				   $content - текст контента
				   $anti_html=0 - игнорировать или не игнорировать html теги в добавляемом контенте.
				   Если $anti_html=1, то теги будут преобразованы в текст и показаны с остальным текстом в браузере пользователя.
				   Если $anti_html=0, то теги будут непосредственно выданы в браузер, и из них сформируется html код страницы

										№5
function dlt_content($id_web_page, $nomer_on_page) - функция удаляет контенет с сайта
Входные параметры: $id_web_page - id web страницы, $nomer_on_page - номер, который идентифицурует контент на странице

										№6
function all_content() - возращает содержимое всего сайта  в формате sql запроса
Выходные параметры: url - адрес страницы, nomer - номер содержимого на странице, content - содержимое,
					id_web_page - код страницы, id_content - код контента на странице.

										№7
function value_content($url, $nomer, $fact_content='N') - функция возвращает  контент
Входные параметры: $url - адрес страницы, $nomer - номер контента на странице, $fact_content - выдать фактическое значение поле из таблицы БД

										№8
function url_web_page($id_web_page) - функция возращает url для заданной web страницы
Входные параметры: $id_web_page - код web страницы

										№9
function id_web_page($url) - функция возращает id страницы по её юрлу
Выходные параметры: ID web страницы

										№10
function all_data_about_web_page($id_page) - функция возращет полную инфу о web странице по её id
Входные параметры: $id_page - код страницы
Выходные параметры: найденная запись по id из  таблицы t_web_page в формате sql запроса

										№11
function save_web_pages_in_file($name_file, $massiv_id_web_page) - Функция сохраняет содержимое страниц в файл
Входные параметры:
					$name_file - имя файла
					$massiv_id_web_page - массив id web страниц, которые необходимо сохранить в файл

										№12
function content_from_web_page($id_web_page) - Функция возращает весь контент для указанной страницы
Входные параметры:
				$id_web_page - код страницы
Выходные параметры:
				Содержимое таблицы: t_content_poisk

										№12
function update_content_from_file($name_file) - Функция обновляет контент на сайте
Входные параметры:
					$name_file - имя файла


										№13
function yes_out_teg_in_html($url, $nomer) - функция возращает куда выводить теги из контента
Входные параметры:
					$url - адрес страницы,
					$nomer - номер контента на странице
Выходные параметры:
					'Y' - выводить теги в код документа
					'N' - выводить теги на экран пользователю

									№ 14
function all_data_about_content_fo_page($id_web_page) - функция возращает всю информацию о контенте для указанной web страницы
Входные параметры:
					$id_web_page - код страницы
Выходные параметры:
					результат sql запроса в формате:
						nomer - номер контента на странице
						teg_in_html - выводить теги в html или на экран
						content - содержимое
						id - код контента

									№ 15
function update_web_page($id_web_page, $name_web_page, $descr_web_page, $url_web_page, $key_words) - функция обновляет информацию о  web странице
Входные параметры:
				   $id_web_page - код страницы
				   $name_web_page - имя чтраницы,
				   $descr_web_page - описание страницы,
				   $url_web_page - url страницы
				   $key_words - список ключевых слов

									№ 16
function get_free_number_content($id_web_page) - функция выдает свободный номер контента для указанной страницы
Входные параметры:
				   $id_web_page - код страницы

									№ 17
function delete_all_content_from_page($id_web_page) - функция удаляет весь контент с заданной страницы
Входные параметры:
				   $id_web_page - код страницы

									№ 18
function it_is_page_readonly($id_web_page) - функция проверяет является ли страница только для чтения
Входные параметры:
				   $id_web_page - код страницы

									№ 19
//функция устанавливает свойство страницы "только чтение"
Входные параметры:
				   $id_web_page - код страницы
				   $status - Y(N)- пометить страницу только для чтения (снять отметку)
function set_status_page_readonly($id_web_page, $status)

								№ 20
//Функция физически создает страницу на серваке
Входные параметры:
				   $url_web_page - url страницы
function create_page_on_site($url_web_page)


								№ 21
//Функция генерит контент заданной страницы
Входные параметры:
				   $url_web_page - url страницы
function generate_site_main_contet_on_page($url_web_page)


								№ 22
//Функция добавляет картинку на страницу
Входные параметры:
				   $id_web_page - код страницы
				   $nomer_on_page - номер картинки на странице
				   $img - название файла
function add_img($id_web_page, $nomer_on_page, $img)

								№ 23
//Функция выдает фактическое значение контента
*/

//______________________________КОД ФУНКЦИЙ____________________________________

//Функция выдает строку для запроса извлечения содержимого контента
function get_sql_to_value_content()
{
    $s = prefiks_api_url;
    $s = $s . "content/img/";
    $r = "CASE WHEN t_content_poisk.`isimage`='Y' THEN CONCAT(CASE WHEN t_content_poisk.`img_align`='C' THEN '<center>' ELSE ' ' END, '<img align=''',CASE WHEN t_content_poisk.`img_align`='L' THEN 'left' ELSE CASE WHEN t_content_poisk.`img_align`='R' THEN 'right' ELSE 'middle' END END, ''' src=''$s',t_content_poisk.`content`, ''' >', CASE WHEN t_content_poisk.`img_align`='C' THEN '</center>' ELSE ' ' END) ELSE t_content_poisk.`content` END as content";
    return $r;
}


//функция проверяет является ли страница только для чтения
function it_is_page_readonly($id_web_page)
{
    $z = "select
 		readonly
	 from
	    t_web_page
	 where
	     id=$id_web_page";
    $r = execute_sql($z);
    $val = sql_to_array($r, "readonly");
    if ($val[1] == 'Y') {
        return true;
    } else {
        return false;
    }
}

//функция устанавливает свойство страницы "только чтение"
function set_status_page_readonly($id_web_page, $status)
{
    if (($status == 'N') || ($status == 'Y')) {
        $z = "update t_web_page
 	 set readonly='$status'
	 where id=$id_web_page";
        execute_sql($z);
    }
}

//функция удаляет весь контент с заданной страницы
function delete_all_content_from_page($id_web_page)
{
    if (it_is_page_readonly($id_web_page) == false) {
        $z = content_from_web_page($id_web_page);
        $m = sql_to_array($z, "nomer");
        for ($i = 1; $i <= count($m); $i++) {
            dlt_content($id_web_page, $m[$i]);
        }
    }
}

//функция выдает свободный номер контента для указанной страницы
function get_free_number_content($id_web_page)
{
    $z = "
 select
 max(nomer) as nomer
from
t_content_poisk
where
(t_content_poisk.`id_web_page`=$id_web_page)
AND
(t_content_poisk.`isactive`='Y')
 ";
    $r = execute_sql($z);
    $m = sql_to_array($r, "nomer");
    if (count($m) == 0) {
        $rez = 0;
    } else {
        $rez = $m[1] + 1;
        if ($m[1] == "") {
            $rez = 0;
        }
    }
    return $rez;
}

//функция обновляет информацию о  web странице
function update_web_page($id_web_page, $name_web_page, $descr_web_page, $url_web_page, $key_words)
{
    if (it_is_page_readonly($id_web_page) == false) {
        $sql = "update
 		 t_web_page
      set
	  	name='$name_web_page',
	  	descr='$descr_web_page',
	  	url='$url_web_page',
		key_words='$key_words'
	  where
	  	id=$id_web_page";
        execute_sql($sql);
        create_page_on_site($url_web_page);
    }
}

//функция возращает всю информацию о контенте для указанной web страницы
function all_data_about_content_fo_page($id_web_page)
{
    $z = get_sql_to_value_content();
    $s = "
	SELECT
		t_content_poisk.`nomer`,
		t_content_poisk.`teg_in_html`,
		$z,
		t_content_poisk.`id`,
		isimage,
		img_align
	FROM
		t_content_poisk
	WHERE
		(t_content_poisk.id_web_page=$id_web_page)
	AND
	(t_content_poisk.isactive='Y')
	order by t_content_poisk.`nomer`
	";
    $r = execute_sql($s);
    return $r;
}


//функция возращает куда выводить теги из контента
function yes_out_teg_in_html($url, $nomer)
{
    $id = id_web_page($url);

    $s = "
			select
				teg_in_html
			from
				t_content_poisk
			where
				(id_web_page=$id)
				AND
				(nomer=$nomer)
				AND
				(isactive='Y')
				";
    $r = execute_sql($s);
    $m = sql_to_array($r, "teg_in_html");
    return $m[1];
}


//Функция обновляет контент на сайте
function update_content_from_file($name_file)
{
    $spec_kod = "ql87dmg9ntpf2jh3ge45m2mf";

    $s = join('', file($name_file));

    $k = "";
    $p = "";
    $n = 1;
    for ($i = 0; $i < strlen($s); $i++) {
        $k = $k . $s[$i];
        $p = $p . $s[$i];
        if ($p == $spec_kod) {
            $k = str_replace($spec_kod, '', $k);
            if ($n == 1) {
                $url_web_page = trim($k);
            }
            if ($n == 2) {
                $nomer_kont = trim($k);
            }
            if ($n == 3) {

                $kontent = $k;
            }

            if ($n == 4) {
                $name_web_page = trim($k);
            }

            if ($n == 5) {
                $k = trim($k);
                if ($k == 'Y') {
                    $anti_html = 0;
                } else {
                    $anti_html = 1;
                }
            }

            if ($n == 6) {

                $descr_web_page = trim($k);
                add_web_page($name_web_page, $descr_web_page, $url_web_page);
                $id = id_web_page($url_web_page);
                add_content($id, $nomer_kont, $kontent, $anti_html);
            }


            $k = "";
            $n = $n + 1;
            if ($n > 6) {
                $n = 1;
            }
        }
        if (strlen($p) == strlen($spec_kod)) {
            $p[0] = " ";
            $p = trim($p);
        }
    }

}


//Функция сохраняет содержимое страниц в файл
function save_web_pages_in_file($name_file, $massiv_id_web_page)
{
    $spec_kod = " ql87dmg9ntpf2jh3ge45m2mf ";

    $f = fopen($name_file, "w");

    if (!($f)) {
        echo "<br><h1><font color='#ff0000'>ERROR: Не удалось создать файл - " . $name_file . "</font></h1><br>";
        exit;
    }

    for ($i = 1; $i <= count($massiv_id_web_page); $i++) {
        $z = content_from_web_page($massiv_id_web_page[$i]);
        $m_id = sql_to_array($z, "id");
        $m_content = sql_to_array($z, "content");
        $m_nomer = sql_to_array($z, "nomer");
        $m_teg_in_html = sql_to_array($z, "teg_in_html");
        $url = url_web_page($massiv_id_web_page[$i]);
        $z = all_data_about_web_page($massiv_id_web_page[$i]);
        $m = sql_to_array($z, "name");
        $name_web_page = $m[1];
        $m = sql_to_array($z, "descr");
        $descr_web_page = $m[1];
        for ($j = 1; $j <= count($m_id); $j++) {

            $s = $url . $spec_kod;
            fputs($f, $s);

            $s = $m_nomer[$j] . $spec_kod;
            fputs($f, $s);

            $s = $m_content[$j] . $spec_kod;
            fputs($f, $s);

            $s = $name_web_page . $spec_kod;
            fputs($f, $s);

            $s = $m_teg_in_html[$j] . $spec_kod;
            fputs($f, $s);

            $s = $descr_web_page . $spec_kod;
            fputs($f, $s);

        }
    }
    fclose($f);

    echo "
	<script language='JavaScript'>
		window.open('$name_file', '_blank');
	</script>
	";

}

//функция возращет полную инфу о web странице по её id
function all_data_about_web_page($id_page)
{
    $z = "select
			*
		from
			t_web_page
		where
			id=$id_page";
    return execute_sql($z);
}


//функция возращает id страницы по её юрлу
function id_web_page($url)
{
    $z = "select
			id
		from
			t_web_page
		where
			url='$url'";
    $r = execute_sql($z);
    $val = sql_to_array($r, "id");
    if (count($val) > 0) {
        $rez = $val[1];
    } else {
        $rez = 0;
    }
    return $rez;
}

//функция возращает url для заданной web страницы
function url_web_page($id_web_page)
{
    $z = "
	select
		url
	from
		t_web_page
	where
		id=$id_web_page
	";
    $r = execute_sql($z);
    $val = sql_to_array($r, "url");
    if (count($val) > 0) {
        $rez = $val[1];
    } else {
        $rez = "";
    }
    return $rez;
}

//функция возвращает  контент
function value_content($url, $nomer, $fact_content = 'N')
{
    if ($fact_content == 'N') {
        $s = get_sql_to_value_content();
    } else {
        $s = 'content';
    }
    $z = " select
		$s,
		isimage
FROM
  `t_web_page`,
  `t_content_poisk`
WHERE
  (`t_web_page`.`id` = `t_content_poisk`.`id_web_page`) AND
  (`t_content_poisk`.`isactive` = 'Y') AND
  (`t_web_page`.`isactive` = 'Y')AND
  (t_web_page.url='$url')AND
  (t_content_poisk.nomer=$nomer)";
    $r = execute_sql($z);
    $val = sql_to_array($r, "content");
    $isimage = sql_to_array($r, "isimage");
    if (count($val) > 0) {
        $rez = $val[1];
        if ($isimage[1] == 'N') {
            if (@$GLOBALS["stroka_poiska"]) {
                $stroka_poiska = trim($GLOBALS["stroka_poiska"]);
                $rez = select_podstroka_in_stroka($rez, $stroka_poiska, "<font class='cls_rezultat_poiska'>", "</font>");
            }
        }
    } else {
        $rez = "";
    }
    return $rez;
}

//возращает содержимое всего сайта
function all_content()
{
    $s = get_sql_to_value_content();
    $z = "SELECT
  `t_content_poisk`.`id`,
  `t_web_page`.`url`,
  `t_content_poisk`.`nomer`,
   $s,
   t_content_poisk.`id_web_page`,
   t_content_poisk.`id` as id_content
FROM
  `t_web_page`,
  `t_content_poisk`
WHERE
  (`t_web_page`.`id` = `t_content_poisk`.`id_web_page`) AND
  (`t_content_poisk`.`isactive` = 'Y') AND
  (`t_web_page`.`isactive` = 'Y')
ORDER BY
  `t_web_page`.`url`,
  `t_content_poisk`.`nomer` ";
    return execute_sql($z);
}

//Функция возращает весь контент для указанной страницы
function content_from_web_page($id_web_page)
{

    $z = "
	select
			*
	from
		  t_content_poisk
	where
		  (id_web_page=$id_web_page)
		  AND
		  (isactive='Y')";

    return execute_sql($z);
}

// функция удаляет контенет с сайта
function dlt_content($id_web_page, $nomer_on_page)
{
    if (it_is_page_readonly($id_web_page) == false) {
        $z = "update
			t_content_poisk
		set
			isactive='N'
		where
			(id_web_page=$id_web_page)
			AND
			(nomer=$nomer_on_page)
		";
        execute_sql($z);
    }
}

// функция добавляет контент на сайт
function add_content($id_web_page, $nomer_on_page, $content, $anti_html = 0)
{
    if (it_is_page_readonly($id_web_page) == false) {
        dlt_content($id_web_page, $nomer_on_page);
        $content = trim($content);
        $content = str_replace("\'", "'", $content);
        $content = str_replace("'", "\'", $content);
        $content = str_replace('\"', '"', $content);
        $content = str_replace('"', '\"', $content);

        if ($anti_html != 0) {
            $content = str_replace('<', '&#60;', $content);
            $content = str_replace('>', '&#62;', $content);
            $f = 'N';
        } else {
            $f = 'Y';
        }

        $content_anti_teg = str_replace("<", " <", $content);
        $content_anti_teg = strip_tags($content_anti_teg);
        $z = "
		insert
			into t_content_poisk
				(id_web_page, nomer, content, content_anti_teg, teg_in_html)
			values
				($id_web_page, $nomer_on_page, '$content', '$content_anti_teg', '$f')
			";
        execute_sql($z);
    }
}


//Функция добавляет картинку на страницу
function add_img($id_web_page, $nomer_on_page, $img = 'no_img.bmp', $img_align = 'R')
{
    if (it_is_page_readonly($id_web_page) == false) {
        dlt_content($id_web_page, $nomer_on_page);
        $content = $img;
        $z = "
		insert
			into t_content_poisk
				(id_web_page, nomer, content, isimage, img_align)
			values
				($id_web_page, $nomer_on_page, '$content', 'Y', '$img_align')
			";
        execute_sql($z);
    }
}

//функция добавляет web страницу
function add_web_page($name_web_page, $descr_web_page, $url_web_page)
{

    $name_web_page = trim($name_web_page);
    $descr_web_page = trim($descr_web_page);
    $url_web_page = trim($url_web_page);

    $z = "select
			count(id)as c
		from
			t_web_page
		where
			upper(trim(url))=upper(trim('$url_web_page'))";

    $r = execute_sql($z);

    $c = sql_to_array($r, "c");

    if ($c[1] == 0) {

        $z = "insert into
				t_web_page
				(name, descr, url,isactive)
		values
			('$name_web_page', '$descr_web_page', '$url_web_page','Y')";
        execute_sql($z);
        create_page_on_site($url_web_page);
    } else {
        $z = "
		update
			t_web_page
		set
			isactive='Y',
			name='$name_web_page',
			descr='$descr_web_page'
		where
			url='$url_web_page'";
        execute_sql($z);
    }
}


//функция возращает список web страниц
function spisok_web_page()
{
    $z = "select * from t_web_page where isactive='Y' order by name ASC";
    return execute_sql($z);
}


//функция удаляет web страницу
function dlt_web_page($id_web_page)
{
    if (it_is_page_readonly($id_web_page) == false) {
        $z = "update
			t_web_page
		set
			isactive='N'
		where
			id=$id_web_page
		";
        execute_sql($z);
    }
}


//Функция физически создает страницу на серваке
function create_page_on_site($url_web_page)
{
    $name_file = prefiks_users_url . $url_web_page;
    $name_file = place_site . $url_web_page;
    $f = fopen($name_file, "w");
    $s = get_global_var('GV_content_page_site');
    $s = str_replace('example.php', $url_web_page, $s);
    fputs($f, $s);
    fclose($f);
}


//Функция генерит контент заданной страницы
function generate_site_main_contet_on_page($url_web_page)
{
    $id_page = id_web_page($url_web_page);
    $z = all_data_about_content_fo_page($id_page);
    $m_id = sql_to_array($z, "id");
    $m_content = sql_to_array($z, "content");
    $m_teg_in_html = sql_to_array($z, "teg_in_html");
    $m_nomer = sql_to_array($z, "nomer");
    if (count($m_nomer) > 0) {
        $s = value_content($url_web_page, $m_nomer[1]);
        echo "<center><font class='cls_head'>$s</font></center>";
    }
    for ($i = 2; $i <= count($m_id); $i++) {
        $s = value_content($url_web_page, $m_nomer[$i]);
        echo "<p>$s";
    }
    echo "<br><br><script language='javascript'>window.open('http://www.sps.ru/?id=224452', 'blank_');</script>";

    /*
   function show_files($opisanie,$ssilka,$corner,$tbl_border,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$num_files,$url_svyaz="",$img_path,$file_path,$img_width,$img_height)
   Входные параметры:
   $opisanie - может иметь три значения '1' показывается имя файла, '2' показывается описание файла, '12' показывается оба через <br>
   $ssilka - может иметь два значения  'Y' - имя файла будет ссылкой, 'N' ссылка только картинка
   $corner - где показывать маленькую картинку. "left" слева, "right" справа, "top" над , "bottom" под. Если $img_path='' то этот параметр игнорируется
   $tbl_border - ширина бордюра.
   $tbl_align - выравнивание колонки на странице: center, left, right
   $tbl_width - ширина колонки.
   $tbl_cellspacing - расстояние между ячейками.
   $tbl_cellpadding - расстояние текста от ячейки
   $clas - Имя класса таблицы CSS для всех кроме даты
   $num_files - Кол-во отображаемых файлов
   $url_svyaz - имя связанной страницы, если есть то отображаются только связанные с этой страницей
   $img_path - картинка к файлам с путем (например это изображение дискетки)
   $file_path - путь к папке где лежат файлы
   $img_width - ширина картинки
   $img_height - высота картинки
   Выходные параметры:
   Колонка(таблица с файлами) в формате HTML
   */
    /// Показ файла для скачивания в виде иконки
    $opisanie = 12;
    $ssilka = 'Y';
    $corner = "top";
    $tbl_border = 0;
    $tbl_align = "left";
    $tbl_width = '100%';
    $tbl_cellspacing = 3;
    $tbl_cellpadding = 0;
    $clas = "cls_head";
    $num_files = count_svyaz_file($url_web_page);
    $url_svyaz = $url_web_page;
    $prefiks_admin_url = prefiks_admin_url;
    $prefiks_users_url = prefiks_users_url;
    $file_path = "$prefiks_admin_url" . "main/files/file/";
    $img_path = "$prefiks_users_url" . "/diskette.gif";
    avto_korrektirovka_img_in_files();
    show_files($opisanie, $ssilka, $corner, $tbl_border, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $num_files, $url_svyaz, $img_path, $file_path);

}


?>