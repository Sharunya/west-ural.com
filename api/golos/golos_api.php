<?
/*
В этом модуле реализованы функции для работы с голосованием


 _______________________________СПИСОК ФУНКЦИЙ_________________________________

 										№1
function spisok_otvet() - Функция возращает список вариантов ответов
Выходные параметры: "содержимое таблицы t_otvet" в формате результата sql запроса

 										№2
function add_otvet($name) - Функция добавляет новый вариант ответа в базу
Входные параметры: $name - название ответа

										№3
function dlt_otvet($id) - Функция удаляет вариант ответа из базы
Входные параметры: $id  - id ответа

										№4
function updt_otvet($id,$new_name) - Функция обновляет информацию об ответе
Входные параметры: $id - id ответа, $new_name - новое название ответа

										№5
function spisok_vopros() - Функция возращает список тем для голосования
Выходные параметры: содержимое таблицы t_golosovanie – неудалённые темы

										№6
function add_vopros($name,$descr,$vopros) - Функция добавляет новую тему для голосования в базу
Входные параметры: $name - название темы, $descr - описание темы, $vopros – вопрос


										№7
function updt_vopros($id,$new_name,$new_descr, $new_vopros) - Функция обновляет информацию о теме голосования
Входные параметры: $id - id темы, $new_name - новое название темы,
				   $new_descr - новое описание темы, $new_vopros – новый вопрос для голосования

				   						№8
function dlt_vopros_logical($id) - Функция удаляет тему для голосования из базы
Входные параметры: $id  - id темы

										№9
function spisok_otvet_golos($vopros_id) - Функция возращает список ответов по заданной теме для голосования
Входные параметры: $vopros_id - тема для голосования
Выходные параметры: список ответов из t_rez_gol для заданной темы для голосования


										№10
function add_count($vopros_id,$otvet_id) - Функция добавляет единицу в счётчик ответа для заданной темы для голосования
Входные параметры: $vopros_id - тема для голосования, $otvet_id – вопрос к теме


										№11
function add_rez_gol($vopros_id,$otvet_id) - Функция добавляет новую запись с пустым счётчиком в t_rez_gol 
Входные параметры: $vopros_id - тема для голосования, $otvet_id – вопрос к теме

										№12
function correct($str) - Проверяет на корректность данные из формы, предназначенные для внесения в БД 
Входные параметры: $str - строка для проверки
Выходные параметры:  - строка без лишних символов

										№13
function upd_otvet_isactive($name_otvet) - Восстанавливает isactive в "y" для ответа с именем $name_otvet 
Входные параметры: $name_otvet - имя ответа

 										№14
function get_vopros($vopros_id) - Функция возращает тему для голосования по id
Входные параметры: $vopros_id - тема для голосования
Выходные параметры: запись из таблицы t_golosovanie

 										№15
function spisok_all_vopros() - Функция возращает список всех тем для голосования (удалённых в том числе)
Выходные параметры: содержимое таблицы t_golosovanie

 										№16
function get_id_vopros() - Функция находит тему по названию, описанию и вопросу и возвращает её 
Входные параметры: $new_name - название темы,
				   $new_descr - описание темы, $new_vopros – вопрос для голосования
Выходные параметры: запись из таблицы t_golosovanie 


 										№17
function dlt_rez_gol($vopros_id,$otvet_id) - Функция удаляет результаты голосования для указанного вопроса и ответа  
Входные параметры: $vopros_id - тема для голосования, $otvet_id – вопрос к теме

										№18
function spisok_del_vopros() - Функция возращает список удалённыхтем для голосования
Выходные параметры: содержимое таблицы t_golosovanie – неудалённые темы

										№19
function isactive_vopros($id,$val_active) - Функция делает активной/неактивной тему голосования
Входные параметры: $id - id темы, $val_active - значение isactive

										№20
function create_grafic($id) - Функция строит график для темы голосования, создаёт файл-рисунок в формате JPEG
Входные параметры: $id - id темы

										№21
function spisok_otvet_free($vopros_id) - Функция возращает список ответов, не относящихся к заданной теме для голосования
Входные параметры: $vopros_id - тема для голосования
Выходные параметры: список ответов из t_rez_gol, не относящихся к заданной теме для голосования

 										№22
function get_id_otvet($otvet) - Функция возращает ответ по имени
Входные параметры: $otvet - имя ответа
Выходные параметры: запись из таблицы t_otvet 

										№23
function count_povtor($name,$descr,$vopros) - Функция делает проверку, есть ли такая запись в t_golosovanie
Входные параметры: $name - название темы, $descr - описание темы, $vopros – вопрос
Выходные параметры: 0 - нет, id ответа - есть


										№24
function count_povtor_otvet($name) - Функция делает проверку, есть ли такая запись в t_otvet
Входные параметры: $name - название ответа
Выходные параметры: 0 - нет, id ответа - есть		

		   								№25
function dlt_vopros_fisical($id) - Функция удаляет тему для голосования из базы физически
Входные параметры: $id  - id темы

// Функция делает видимой тему голосования	№ 26
function isshow_vopros($id,$val_show)



 */


//______________________________КОД ФУНКЦИЙ____________________________________

//Функция возращает список вариантов ответов № 1
function spisok_otvet()
{
    $z = "select id,name from t_otvet where isactive='Y' order by 2";
    $r = execute_sql($z);
    return $r;

}

//Функция добавляет новый вариант ответа в базу №2
function add_otvet($name)
{
    $name = trim($name);
    $z = "insert into t_otvet (name) values('" . $name . "')";
    execute_sql($z);
}

//Функция удаляет вариант ответа из базы №3
function dlt_otvet($id)
{
    $z = "update t_otvet set isactive='N' where id=$id";
    execute_sql($z);
}

//Функция обновляет информацию об ответе №4
function updt_otvet($id, $new_name)
{
    $z = "update t_otvet set name='$new_name' where id=$id";
    execute_sql($z);
}

//Функция возращает список активных тем для голосования №5
function spisok_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where isactive='Y'";
    $r = execute_sql($z);
    return $r;
}


//Функция добавляет новую тему для голосования в базу №6
function add_vopros($name, $descr, $vopros)
{
// Получение даты в удобном для SQL формате
    $dat = date("Y") . '-' . date("m") . '-' . date("d");
    $name = trim($name);
    $descr = trim($descr);
    $vopros = trim($vopros);
    $z = "insert into t_golosovanie (name, descr, vopros,data_voprosa) values('" . $name . "','" . $descr . "','" . $vopros . "','" . $dat . "')";
    execute_sql($z);
}


//	Функция обновляет информацию о теме голосования	№7
function updt_vopros($id, $new_name, $new_descr, $new_vopros)
{
    // Получение даты в удобном для SQL формате
    $dat = date("Y") . '-' . date("m") . '-' . date("d");
    $new_name = trim($new_name);
    $new_descr = trim($new_descr);
    $new_vopros = trim($new_vopros);
    $z = "update t_golosovanie set name='$new_name', descr='$new_descr', vopros='$new_vopros', data_voprosa='$dat' where id=$id";
    execute_sql($z);
}

//Функция удаляет тему для голосования из базы логически №8
function dlt_vopros_logical($id)
{
    $z = "update t_golosovanie set isactive='N' where id=$id";
    execute_sql($z);
}

//Функция возращает список ответов по заданной теме для голосования	№9
function spisok_otvet_golos($vopros_id)
{
    $z = "select * from t_otvet,t_golosovanie,t_rez_gol where (t_golosovanie.id=t_rez_gol.golos_id)and(t_otvet.id=t_rez_gol.otvet_id)and(t_golosovanie.id='$vopros_id') order by t_otvet.name";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет единицу в счётчик ответа для заданной темы для голосования	№10
function add_count($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    $z = "update t_rez_gol set count=count+1 where (otvet_id=$otvet_id)and(golos_id=$vopros_id)";
    execute_sql($z);
}

// Функция добавляет новую запись с пустым счётчиком в t_rez_gol №11
function add_rez_gol($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    //Проверка, есть ли в БД такие точно записи
    $z_count = "select id from t_rez_gol where (golos_id=$vopros_id)and(otvet_id=$otvet_id)";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    $povt = count($count_povtor);
    if ($povt == 0) {
        $z = "insert into t_rez_gol (golos_id, otvet_id, count) values(" . $vopros_id . ", " . $otvet_id . ", 0)";
        execute_sql($z);
    }
}


// Восстанавливает isactive в "y" для ответа с именем $name_otvet №13
function upd_otvet_isactive($id_otvet)
{
    $z = "update t_otvet set isactive='Y' where id=$id_otvet";
    execute_sql($z);
}

// Функция возращает тему для голосования по id №14
function get_vopros($vopros_id)
{
    $vopros_id = intval($vopros_id);
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where id=$vopros_id";
    $r = execute_sql($z);
    return $r;
}

// Функция возращает список всех тем для голосования (удалённых в том числе) №15
function spisok_all_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie";
    $r = execute_sql($z);
    return $r;
}

//	Функция находит тему по названию, описанию и вопросу и возвращает её №16
function get_id_vopros($new_name, $new_descr, $new_vopros)
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa,isshow from t_golosovanie where (name='$new_name')and(descr='$new_descr')and(vopros='$new_vopros')";
    $r = execute_sql($z);
    return $r;
}

//	Функция удаляет результаты голосования для указанного вопроса и ответа №17
function dlt_rez_gol($vopros_id, $otvet_id)
{
    $vopros_id = intval($vopros_id);
    $otvet_id = intval($otvet_id);
    $z = "delete from t_rez_gol where(golos_id=$vopros_id)and(otvet_id=$otvet_id)";
    execute_sql($z);
}

// Функция возращает список удалённых тем для голосования №18
function spisok_del_vopros()
{
    $z = "select id,name,descr,vopros,isactive,data_voprosa from t_golosovanie where isactive='N'";
    $r = execute_sql($z);
    return $r;
}

// Функция делает активной тему голосования	№19
function isactive_vopros($id, $val_active)
{
    $z = "update t_golosovanie set isactive='$val_active' where id=$id";
    execute_sql($z);
}


// ПОСТРОЕНИЕ ГРАФИКОВ

// Функция строит график для темы голосования, создаёт файл-рисунок в формате JPEG  №20
function create_grafic($id)
{
//  Получаем список ответов для данного вопроса
    $z = spisok_otvet_golos($id);
//  Массив с id, именем и счётчиком голосов
    $otv_id = sql_to_array($z, "id");
    $otv_name = sql_to_array($z, "name");
    $otv_count = sql_to_array($z, "count");
//  Количество ответов
    $col_row = count($otv_id);
//  Общая сумма всех голосов	
    $sum_v = 0;
    for ($i = $col_row; $i >= 1; $i--) {
        $sum_v = $sum_v + intval($otv_count[$i]);
    }

    // Предварительные расчеты для построения графика
    // Установка значений констант
    $width = 500; // шир. изобр. в пикселях
    $left_margin = 50; // отступ слева от изображения
    $right_margin = 50; // то же справа
    $bar_height = 15; // высота одной полосы(столбца) гистограммы
    $bar_spacing = $bar_height / 2;// отступы от полосы(столбца) гистограммы
    $font = 'veranda';
    $main_size = 12; // в пунктах
    $small_size = 12; // в пунктах
    $text_indent = 10; // положение текстовых меток слева


    // Установка начальной точки для рисования
    $x = $left_margin + 100; // место базовой линии рисунка
    $y = 20;
    $bar_unit = ($width - ($x + $right_margin)) / 100; //одна "точка на гистограмме"
    $height = $col_row * ($bar_height + $bar_spacing) + 30; // Подсчёт высоты прямоугольника плюс промежуток плюс поле

    // Создание пустого холста
    $im = imagecreate($width, $height);

    // Назначение цветов

    $white = ImageColorAllocate($im, 255, 255, 255);
    $blue = ImageColorAllocate($im, 0, 64, 250);
    $black = ImageColorAllocate($im, 0, 0, 0);
    $pink = ImageColorAllocate($im, 255, 78, 243);

    $text_color = $white;
    $percent_color = $white;
    $bg_color = $blue;
    $line_color = $pink;
    $bar_color = $pink;
    $number_color = $pink;

    //Создание фона для рисования
    ImageFilledRectangle($im, 0, 0, $width, $height, $bg_color);

    // Вывод данных в виде графика
    for ($i = $col_row; $i >= 1; $i--) {
        if ($sum_v > 0)
            $percent = intval(round(($otv_count[$i] / $sum_v) * 100));
        else
            $percent = 0;
//--------------------------------------------------
        //Вывод процентов для данного значения
        ImageString($im, $main_size, $width - 30, $y + ($bar_height / 2), $percent . '%', $percent_color);
        if ($sum_v > 0)
            $right_value = intval(round(($otv_count[$i] / $sum_v) * 100));
        else
            $right_value = 0;
        // Длина полосы для данного значения
        $bar_length = $x + ($right_value * $bar_unit);

        //вывод полосы для данного значения
        ImageFilledRectangle($im, $x, $y - 2, $bar_length, $y + $bar_height, $bar_color);

        //Вывод заголовка для данного значения
        ImageString($im, $small_size, $text_indent, $y + ($bar_height / 2), $otv_name[$i], $text_color);

        //Прорисовка контура, соответствующего 100%
        ImageRectangle($im, $bar_length + 1, $y - 2, ($x + (100 * $bar_unit)), $y + $bar_height, $line_color);

        //вывод чисел
        ImageString($im, $small_size, $x + (100 * $bar_unit) - 50, $y + ($bar_height / 2), $otv_count[$i] . '/' . $sum_v, $number_color);

        //Спуск к следующей полосе
        $y = $y + ($bar_height + $bar_spacing);
    }
    //Выводим картинку в файл
    imageJpeg($im, "MyGraf1.jpg");

    //Освобождение ресурсов
    ImageDestroy($im);
}


//Функция возращает список ответов, не относящихся к заданной теме для голосования
function spisok_otvet_free($vopros_id)
{
//  Выбираем id ответов, которые уже есть у данного вопроса и превращаем их в массив
    $z1 = "select distinct otvet_id from t_rez_gol where (golos_id=" . $vopros_id . ")";
    $rez = execute_sql($z1);
    $id_otvet_mas = sql_to_array($rez, "otvet_id");
    $colvo = count($id_otvet_mas);
    if ($colvo != 0) {
// формируем строку запроса для всех оставшихся id ответов
        $str = "select * from t_otvet where (id not in(";
        $str = $str . $id_otvet_mas[count($id_otvet_mas)];
        for ($i = count($id_otvet_mas) - 1; $i >= 1; $i--) {
            $str = $str . "," . $id_otvet_mas[$i];
        }
        $str = $str . ")and isactive='Y')order by name";
    } else $str = "select * from t_otvet where isactive='Y' order by name";
    $z = "$str";
    $r = execute_sql($z);
    return $r;
}


//	Функция возращает id ответа по имени №22
function get_id_otvet($otvet)
{
    $z = "select * from t_otvet where (name='$otvet')";
    $r = execute_sql($z);
    return $r;
}

// Функция делает проверку, есть ли такая запись в t_golosovanie  №23
function count_povtor($name, $descr, $vopros)
{
    $povtor = 0;
    $name = trim($name);
    $descr = trim($descr);
    $vopros = trim($vopros);
//Проверка, есть ли в БД темы с таким названием, описанием и вопросом
    $z_count = "select id from t_golosovanie where (name='$name')and(descr='$descr')and(vopros='$vopros')";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    if (count($count_povtor) != 0) $povtor = $count_povtor[1];
    return $povtor;
}


// Функция делает проверку, есть ли такая запись в t_otvet  №24
function count_povtor_otvet($name)
{
    $povtor = 0;
    $name = trim($name);
//Проверка, есть ли в БД ответ с таким именем
    $z_count = "select * from t_otvet where (name='$name')";
    $rez = execute_sql($z_count);
    $count_povtor = sql_to_array($rez, "id");
    $isactive_povtor = sql_to_array($rez, "isactive");
    if (count($count_povtor) != 0) {
        if ($isactive_povtor[1] == "Y") $povtor = 1; else $povtor = $count_povtor[1];
    }
    return $povtor;
}

//Функция удаляет тему для голосования из базы физически №25
function dlt_vopros_fisical()
{
    $z = "delete from t_golosovanie where isactive='N'";
    execute_sql($z);
}

// Функция делает видимой тему голосования	№ 26
function isshow_vopros($id, $val_show)
{
    $z = "update t_golosovanie set isshow='$val_show' where id=$id";
    execute_sql($z);
}

?>