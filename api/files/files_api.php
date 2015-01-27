<?php

/*
В этом модуле реализованы функции для работы с новостями


 _______________________________СПИСОК ФУНКЦИЙ_________________________________

 									 № 1

//Функция возращает список файлов
function spisok_file()

                                    № 2
//Функция добавляет файл в базу
function add_file($descr,$file,$url_svyaz)
Входные параметры: $descr - краткое описание, $file - файл, $url_svyaz - название связанной страницы

                                    № 3
//Функция удаляет файл
function del_file($id)
Входные параметры: $id - id записи

                                    № 4
//Функция обновляет файл
function update_file($id,$descr,$file,$url_svyaz)
Входные параметры:$id - id записи, $descr - краткое описание, $file - файл, $url_svyaz - название связанной страницы

                                    № 5
//Функция обновляет поле isactive таблицы t_file
function  redraw_file($id,$isactive)
Входные параметры: $id - id записи, $isactive - (Y или N) будет показываться на клиенте или нет

                                    № 6
//Функция переиминовывает имя файла в соответствии с номером id
function rename_file($name,$id)
Выходные: новое имя

                                    № 7
//Функция возращает инфо о файле
function spisok_edit_file($id)

                                    № 8
//Функция возращает кол-во одинаковых файлов
function count_file($descr,$file,$url_svyaz)
Входные параметры: $descr - краткое описание, $file - файл, $url_svyaz - название связанной страницы
Выходные: число

                                    № 9
//Функция возращает список файлов для связанной страницы
function spisok_svyaz_file($url_svyaz)
Входные параметры:$url_svyaz - название связанной страницы (без пути)


									№ 10
//Функция возращает количество файлов для связанной страницы        		
function count_svyaz_file($url_svyaz)

*/
///////-----------------КЛИЕНТСКИЕ ФУНКЦИИ----------------------////////
//--------------------------Функция показывает колонку с файлами на клиенте
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


////////////////--------------------------------------------------

//Функция возращает список файлов        		№ 1
function spisok_file()
{
    $z = "select * from t_file ORDER BY id ASC";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет файл в базу              № 2
function add_file($descr, $file, $url_svyaz)
{
    $z = "insert into t_file (data,descr,file,url_svyaz) values (CURDATE(),'" . $descr . "','" . $file . "','" . $url_svyaz . "')";
    execute_sql($z);
}

//Функция удаляет файл                       № 3
function del_file($id)
{
    $z = "delete from t_file where id=$id";
    execute_sql($z);
}

//Функция обновляет файл                     № 4
function update_file($id, $descr, $file, $url_svyaz)
{
    $z = "update t_file set data=CURDATE(),descr='$descr', file='$file', url_svyaz='$url_svyaz' where id=$id";
    execute_sql($z);
}

//Функция обновляет поле isactive таблицы t_file                       № 5
function  redraw_file($id, $isactive)
{
    $z = "update t_file set isactive='$isactive' where id=$id";
    execute_sql($z);
}

//Функция переиминовывает имя файла в соответствии с номером id   № 6
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

//Функция возращает инфо о файле        		№ 7
function spisok_edit_file($id)
{
    $z = "select * from t_file where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает кол-во одинаковых файлов   		№ 8
function count_file($descr, $file, $url_svyaz)
{
    $z = "select count(*) as kolvo from t_file where descr='$descr' and file='$file' and url_svyaz='$url_svyaz'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возращает список файлов для связанной страницы        		№ 9
function spisok_svyaz_file($url_svyaz)
{
    $z = "select * from t_file where url_svyaz='$url_svyaz' and isactive='Y' ORDER BY id DESC";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает количество файлов для связанной страницы        		№ 10
function count_svyaz_file($url_svyaz)
{
    $z = "select count(1) as c from t_file where url_svyaz='$url_svyaz' and isactive='Y'";
    $r = execute_sql($z);
    $r = sql_to_array($r, "c");
    $r = $r[1];
    return $r;
}

///////-----------------КЛИЕНТСКИЕ ФУНКЦИИ----------------------////////
//--------------------------Функция показывает колонку с файлами на клиенте
/*
function show_files($opisanie,$ssilka,$corner,$tbl_border,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$num_files,$url_svyaz="",$img_path,$file_path)
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
Выходные параметры:
Колонка(таблица с файлами) в формате HTML

*/

//Функция генерит скрипт для корректировки картинок в иконках файлов
function avto_korrektirovka_img_in_files()
{
    echo "
<script language='JavaScript'>      //Эта функция изменяет пропорционально размеры картинки в колонке файлов к ширине картинки width_img
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

//--------------------------Функция показывает колонку с файлами на клиенте
function show_files($opisanie, $ssilka, $corner, $tbl_border, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $num_files, $url_svyaz = "", $img_path, $file_path)
{
    if ($img_path == '') {
        $ssilka = 'Y';
        $corner = '';
        if ($opisanie == 2)
            $opisanie = 1;
    } else {
        $im = GetImageSize($img_path); //вычисляем размеры картинки
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
        if ($corner == 'left')   //Строим таблицу где картинка слева
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
        if ($corner == 'right')   //Строим таблицу где картинка справа
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
        if ($corner == 'top')   //Строим таблицу где картинка сверху
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
        if ($corner == 'bottom')   //Строим таблицу где картинка снизу
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
        if ($corner == '')   //Строим таблицу где нет картинки
        {
            echo "<tr class='$clas'>";
            if ($opisanie == 1) {
                echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a></td></tr>";
            }
            if ($opisanie == 12) {
                echo "<td class='$clas'><a href='$file_path$m_file[$i]' target='_blank'>$m_file[$i]</a><br>$m_descr[$i]</td></tr>";
            }
        }

    }///-конец цикла
    echo "</table>";
}

//удаляет папку со всем содержимым
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