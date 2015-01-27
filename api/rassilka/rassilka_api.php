<?
/*
В этом модуле реализованы функции для работы с разделом почтовая рассылка

 _______________________________СПИСОК ФУНКЦИЙ_________________________________

                                      № 1
//Функция возращает список всех тем рассылки
function spisok_tem_rassilki($sort,$start,$cnt)
Входные параметры:$sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                                     № 2
//Функция возращает список всех активных(не удаленных логически) рассылок в теме
function spisok_rassilok($id,$sort,$start,$cnt)
Входные параметры:$id - темы рассылки, $sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                                   № 3
//Функция удаляет рассылку логически
function del_rassilka_logical($id)
Входные параметры:$id - id записи

                                   № 4
//Функция восстанавливает логически удаленные рассылки
function rescue_rassilka_logical($id)

                                   № 5
//Функция удаляет физически все удаленные логически рассылки
function del_rassilka_fisical()

                                   № 6
//Функция удаляет физически тему рассылок
function del_tema_rassilki($id)
Входные параметры:$id - id записи

                                  № 7
//Функция изменяет рассылку
function update_rassilka($id,$name,$content,$file_content,$file,$file2)
Входные параметры:$id - id записи,имя рассылки,содержание,содержание в файле,файл,файл2

                              № 8
//Функция изменяет рассылку при нажатии кнопки "Сохранить и отправить"
function update_rassilka_send($id,$status)
Входные параметры:id рассылки, status отправки - текст

                              № 9
//Функция возращает одну рассылку в соответствии с номером id
function spisok_edit_rassilka($id)
Входные параметры: $id - id клиента

                              № 10
//Функция возвращает количество одинаковых рассылок  № 10
function count_rassilka($name)
Входные параметры:имя рассылки
Выходные: количество

                              № 10A
//Функция возвращает количество одинаковых рассылок
function count_rassilka1($id,$name)
Входные параметры:id редактир записи,имя рассылки
Выходные: количество

                             № 11
//Функция возвращает количество одинаковых тем рассылок
function count_tema_rassilki($name)
Входные параметры:имя темы рассылки
Выходные: количество
                             № 11A
//Функция возвращает количество одинаковых тем рассылок
function count_tema_rassilki1($id,$name)
Входные параметры:id редактир записи, имя темы рассылки
Выходные: количество

                             № 12
//Функция обновляет поле isactive таблицы t_rassilka
function  redraw_tema_rassilki($id,$isactive)
Входные параметры:$id - id клиента, isactive - Y или N

                             № 13
//Функция добавляет rassilku в базу
function insert_rassilka($name,$content,$file_content,$file,$file2)
Входные параметры:имя рассылки,содержание,имя файла с контентом(только .txt или .html)),файл,файл2

                             № 14
//Функция добавляет тему rassilku в базу
function insert_tema_rassilki($name,$descr)
Входные параметры:имя темы рассылки,описание

                             № 15
//Функция возвращает количество рассылок  в одной теме
function count_rassilka_in_tema($id)
Входные параметры:$id - id темы рассылки

                             № 16
//Функция добавляет rassilku в базу при нажатии кнопки "Добавить и отправить"
function insert_rassilka_send($status)
Входные параметры:статус отправки (успешно или нет)

                             № 17
//Функция изменяет тему рассылки
function update_tema_rassilki($id,$name,$descr)

                             № 18
//Функция переиминовывает имя файла добавляет номер id и тип 1,2,3 1 - контент 2 - первый приаттаченый 3 - второй приаттаченный
function rename_file_rassilki($name,$id,$type)
Входные параметры: имя файла, id записи, тип

                             № 19
//Функция возращает одну тему в соответствии с номером id
function spisok_edit_tema($id)

                             № 20
//Функция возвращает список всех неактивных рассылок
function spisok_rassilki_noactive()

                             № 21
//Функция возвращает количество абонентов в рассылке
function count_abonents_in_tema($id)
Входные параметры:$id - id темы рассылки


///			 № 22 КЛАСС ДЛЯ ОТСЫЛКИ ПОЧТЫ С АТТАЧМЕНТАМИ           ///

                             № 23
//Функция возращает список всех подписанных абонентов для темы
function spisok_abonents_for_tema($id,$sort,$start,$cnt)
Входные параметры:$id - темы рассылки, $sort - сортировка с указанием порядка, например "email DESC", $start - с какой записи выдать результат, $cnt - сколько записей выдать

                             № 24
//Функция удаляет абонета из темы рассылки
function del_abonent($id)
Входные параметры:$id - id таблицы t_abonents

                             № 25
//Функция возвращает массив номеров id абонентов не подписанных в теме
function spisok_idabonents_nosubscribe_in_tema($id)
Входные параметры:$id - id темы рассылки
Выходные: массив или если таковых абонентов нет возвращает один элемент массива с индексом 1 и равный 0

                             № 26
//Функция возвращает абонента в соответствии с номером id
function abonent_for_add($id)
Входные параметры:$id - id абонента

                             № 27
//Функция добавляет абонента в список темы рассылки (в таблицу t_abonents)
function add_abonent($id,$tema_id)
Входные параметры:$id - id абонента,tema_id - id темы

                             № 28
//Функция возвращает количество активных тем
function count_tema()
Выходные: количество

                             № 29
//Функция возвращает список активных тем
function spisok_active_tem()

                             № 30
//Функция возвращает количество одинаковых абонентов в теме
function count_abonent_in_tema($klient_id,$tema_id)
Входные параметры:$klient_id - id абонента,tema_id - id темы


//_____________КЛИЕНТСКИЕ ФУНКЦИИ________________________________


				№ 1
//функция строит форму тем подписки
function form_client_rassilka($zagl,$clas_zagl,$tbl_border=0,$tbl_align,$tbl_width,$tbl_cellspacing,$tbl_cellpadding,$clas,$size,$num_tema,$clas_input)
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
$num_tema - максимальное количество тем подписки отображаемых в форме
$clas_input - Имя класса таблицы CSS для текстовых полей

				№ 2
//Функция добавляет клиента в списки подписки
function add_client_podpiska($id_k,$mess,$clas_mess,$lang)
Входные параметры:
$id_k - переменная использующаяся вместо переменной сессии (id неавторизованного клиента) и значение ее надо занести в переменную сессии созданную во внешнем сценарии а иначе не работает сессия
$mess - строка выводимая после успешного задания вопроса , если пробел то нет ни какого сообщения
$clas_mess - стиль строки
$lang - вид строки, 2 значения 'html' - в виде html, 'java' - в виде сообщения с кнопкой ОК

*/

//Функция возращает список всех тем рассылки       		№ 1
function spisok_tem_rassilki($sort, $start, $cnt)
{
    $z = "select id,name,isactive,descr from t_rassilka ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция возращает список всех активных(не удаленных логически) рассылок в теме    		№ 2
function spisok_rassilok($id, $sort, $start, $cnt)
{
    $z = "select id,name,content,file_content,file,file2,isactive,data_rassilki,data_send,status from t_content_rassilki where (rassilka_id='$id') and (isactive='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}


//Функция удаляет рассылку логически                       № 3
function del_rassilka_logical($id)
{
    $z = "update t_content_rassilki set isactive='N' where id='$id'";
    execute_sql($z);
}

//Функция восстанавливает все логически удаленные рассылки                       № 4
function rescue_rassilka_logical($id)
{
//	$z="select * from t_content_rassilki where isactive='N'";
//	$r=execute_sql($z);
//    $m_id=sql_to_array($r,"id");
//    for($i=1;$i<count($m_id)+1;$i++)
//    {
    $z = "update t_content_rassilki set isactive='Y' where id='$id'";
    execute_sql($z);
//    }
}

//Функция удаляет физически все удаленные логически рассылки                      № 5
function del_rassilka_fisical()
{
    $z = "select * from t_content_rassilki where isactive='N'";
    $r = execute_sql($z);
    $m_id = sql_to_array($r, "id");
    for ($i = 1; $i < count($m_id) + 1; $i++) {
        $z = "delete from t_content_rassilki where id='$m_id[$i]'";
        execute_sql($z);
    }
}

//Функция удаляет физически тему рассылок                      № 6
function del_tema_rassilki($id)
{
    $z = "delete from t_abonents where rassilka_id='$id'";
    execute_sql($z);
    $z = "delete from t_content_rassilki where rassilka_id='$id'";
    execute_sql($z);
    $z = "delete from t_rassilka where id='$id'";
    execute_sql($z);
}

//Функция изменяет рассылку        № 7
function update_rassilka($id, $name, $content, $file_content, $file, $file2)
{
    $z = "update t_content_rassilki set name='$name', content='$content', file_content='$file_content', file='$file', file2='$file2' where id=$id";
    execute_sql($z);
}

//Функция изменяет рассылку при нажатии кнопки "Сохранить и отправить"        № 8
function update_rassilka_send($id, $status)
{
    $z = "update t_content_rassilki set data_send=CURDATE(), status='$status' where id='$id'";
    execute_sql($z);
}

//Функция возращает одну рассылку в соответствии с номером id     		№ 9
function spisok_edit_rassilka($id)
{
    $z = "select id,name,content,file_content,file,file2,data_rassilki,data_send,status,rassilka_id from t_content_rassilki where (t_content_rassilki.isactive='Y') and (t_content_rassilki.id='$id')";
    $r = execute_sql($z);
    return $r;
}

//Функция возвращает количество одинаковых рассылок  № 10
function count_rassilka($name)
{
    $z = "select count(*) as kolvo from t_content_rassilki where (name='$name')";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возвращает количество одинаковых рассылок  № 10A
function count_rassilka1($id, $name)
{
    $z = "select count(*) as kolvo from t_content_rassilki where (name='$name') and (id!='$id')";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возвращает количество одинаковых тем рассылок  № 11
function count_tema_rassilki($name)
{
    $z = "select count(*) as kolvo from t_rassilka where (name='$name')";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возвращает количество одинаковых тем рассылок  № 11A
function count_tema_rassilki1($id, $name)
{
    $z = "select count(*) as kolvo from t_rassilka where (name='$name') and (id!='$id')";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция обновляет поле isactive таблицы t_rassilka                       № 12
function  redraw_tema_rassilki($id, $isactive)
{
    $z = "update t_rassilka set isactive='$isactive' where id=$id";
    execute_sql($z);
}


//Функция добавляет rassilku в базу     № 13
function insert_rassilka($name, $content, $file_content, $file, $file2, $rassilka_id)
{
    $z = "insert into t_content_rassilki (name,data_rassilki,content,file_content,file,file2,rassilka_id) values('" . strrepl(trim($name)) . "',CURDATE(),'" . strrepl(trim($content)) . "','" . trim($file_content) . "','" . trim($file) . "','" . trim($file2) . "','$rassilka_id')";
    execute_sql($z);
}

//Функция добавляет тему rassilku в базу     № 14
function insert_tema_rassilki($name, $descr)
{
    $z = "insert into t_rassilka (name,descr) values('" . strrepl(trim($name)) . "','" . strrepl(trim($descr)) . "')";
    execute_sql($z);
}

//Функция возвращает количество рассылок  в одной теме № 15
function count_rassilka_in_tema($id)
{
    $z = "select count(*) as kolvo from t_content_rassilki where rassilka_id='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция добавляет rassilku в базу при нажатии кнопки "Добавить и отправить"    № 16
function insert_rassilka_send($status)
{
    $z = "insert into t_content_rassilki (data_send,status) values(CURDATE(),'$status')";
    execute_sql($z);
}

//Функция изменяет тему рассылки        № 17
function update_tema_rassilki($id, $name, $descr)
{
    $z = "update t_rassilka set name='$name', descr='$descr' where id=$id";
    execute_sql($z);
}

//Функция переиминовывает имя файла добавляет номер id и тип 1,2,3 1 - контент 2 - первый приаттаченый 3 - второй приаттаченный № 18
function rename_file_rassilki($name, $id, $type)
{
    $s = substr($name, -5);
    if ($s[0] == '.') {
        $s1 = substr($name, 0, strlen($name) - 5);
        $new_name = $s1 . "_" . $type . "_" . $id . $s;
    }
    if ($s[1] == '.') {
        $s1 = substr($name, 0, strlen($name) - 4);
        $new_name = $s1 . "_" . $type . "_" . $id . $s[1] . $s[2] . $s[3] . $s[4];
    }
    if ($s[2] == '.') {
        $s1 = substr($name, 0, strlen($name) - 3);
        $new_name = $s1 . "_" . $type . "_" . $id . $s[2] . $s[3] . $s[4];
    }
    if ($s[3] == '.') {
        $s1 = substr($name, 0, strlen($name) - 2);
        $new_name = $s1 . "_" . $type . "_" . $id . $s[3] . $s[4];
    }
    return $new_name;
}

//Функция возращает одну тему в соответствии с номером id     		№ 19
function spisok_edit_tema($id)
{
    $z = "select id,name,isactive,descr from t_rassilka where (t_rassilka.id='$id')";
    $r = execute_sql($z);
    return $r;
}

//Функция возвращает список всех неактивных рассылок       № 20
function spisok_rassilki_noactive()
{
    $z = "select * from t_content_rassilki where isactive='N'";
    $r = execute_sql($z);
    return $r;
}

//Функция возвращает количество абонентов в рассылке   № 21
function count_abonents_in_tema($id)
{
    $z = "select count(*) as kolvo from t_abonents where rassilka_id='$id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

///----------------------------------------------------------------///
///                                                                ///
///			 № 22 КЛАСС ДЛЯ ОТСЫЛКИ ПОЧТЫ С АТТАЧМЕНТАМИ           ///
///                                                                ///
///----------------------------------------------------------------///
class MIMEMAIL
{
//--------------------------------------------------------------------------------------------------------
// Configuration
//--------------------------------------------------------------------------------------------------------
    var $type = 'Text';             // e-mail type ("HTML" or "Text")
    var $senderName = '';           // sender name
    var $senderMail = '';           // sender e-mail address
    var $cc = '';                   // Cc (e-mail address)
    var $bcc = '';                  // Bcc (e-mail address)
    var $documentRoot = '';         // document root (path to images, stylesheets, etc.)
    var $saveDir = 'mail/';              // save e-mail to this directory (do not send) => just for testing :)
    var $charSet = 'windows-1251';    // character set (ISO)
    var $useQueue = false;          // use mail queue (true = yes, false = no) => does not work with PHP
    // versions < 4.0.5, or with versions >= 4.2.3 in Safe Mode, or with
    // MTAs other than sendmail!

    var $mime = array('jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'swf' => 'application/x-shockwave-flash',
        'doc' => 'application/msword',
        'xls' => 'application/msexcel',
        'ppt' => 'application/mspowerpoint',
        'pdf' => 'application/pdf',
        'zip' => 'application/zip',
        'rtf' => 'text/rtf',
        'rtx' => 'text/richtext',
        'txt' => 'text/plain',
        'js' => 'text/javascript',
        'css' => 'text/css');

    var $exclude = array('htm', 'php', 'pl', 'prl', 'cgi');
    var $inline = array();
    var $attachment = array();
    var $subject, $body, $header, $footer;

//--------------------------------------------------------------------------------------------------------
// Functions
//--------------------------------------------------------------------------------------------------------
    function MIMEMAIL($type = '')
    {
        if ($type) $this->type = $type;
    }

    function get_img_type($data)
    {
        $abc = substr($data, 0, 20);
        if (strstr($abc, 'GIF')) $ftype = 'gif';
        else if (strstr($abc, 'JFIF') || strstr($abc, 'Exif')) $ftype = 'jpeg';
        else if (strstr($abc, 'PNG')) $ftype = 'png';
        else if (strstr($abc, 'FWS') || strstr($abc, 'CWS')) $ftype = 'swf';
        else $ftype = '';

        return $ftype;
    }

    function get_img_data($html, $m, $css)
    {
        global $HTTP_HOST;

        $host = 'http://' . ereg_replace('/$', '', $HTTP_HOST);

        for ($i = 0; $i < count($m[0]); $i++) {
            $ftype = $data = $ext = $fname = '';

            if (!preg_match('/^(http|ftp|mailto|javascript)/i', $m[2][$i])) {
                $inlName = $m[2][$i];
                $ext = substr($inlName, strrpos($inlName, '.') + 1);
                $incl = true;

                for ($j = 0; $j < count($this->exclude) && $incl; $j++) {
                    if (stristr($ext, $this->exclude[$j])) $incl = false;
                }

                if ($incl) {
                    if ($this->documentRoot) {
                        $doc_root = $this->documentRoot;

                        while (ereg('^\.\./', $inlName)) {
                            $inlName = substr($inlName, 3);
                            $doc_root = ereg_replace('/[^/]+$', '', $doc_root);
                        }
                        $fname = "$doc_root/$inlName";
                    } else $fname = $inlName;
                    if ($fp = @fopen($fname, 'rb')) {
                        $data = fread($fp, filesize($fname));
                        fclose($fp);
                    }
                }
            }

            if ($data) {
                if (!$ext) $ftype = $this->get_img_type($data);
                else $ftype = $ext;

                if ($css) $html = str_replace($m[0][$i], ' ' . $m[1][$i] . '(cid:' . $inlName . ')', $html);
                else $html = str_replace($m[0][$i], ' ' . $m[1][$i] . '="cid:' . $inlName . '"', $html);

                if (!$this->inline[$ftype][$inlName]) {
                    $this->inline[$ftype][$inlName] = chunk_split(base64_encode($data));
                }
            } else if (!preg_match('/^(http|ftp|mailto|javascript)/i', $m[2][$i])) {
                if ($css) $html = str_replace($m[0][$i], ' ' . $m[1][$i] . "($host/$inlName)", $html);
                else $html = str_replace($m[0][$i], ' ' . $m[1][$i] . "=\"$host/$inlName\"", $html);
            }
        }
        return $html;
    }

    function check_body()
    {
        if (preg_match_all('/ (src|background|href)="?([^" >]+)"?/i', $this->body, $m))
            $this->body = $this->get_img_data($this->body, $m, false);
        if (preg_match_all('/ (url)\(([^\)]+)\)/i', $this->body, $m))
            $this->body = $this->get_img_data($this->body, $m, true);

        $this->body = preg_replace("/<(table|tr|div)([^>]*)>\r?\n?/i", "<\\1\\2>\r\n", $this->body);
        $this->body = preg_replace("/<\/(table|tr|td|style|script|div|p)>\r?\n?/i", "</\\1>\r\n", $this->body);
    }

    function prepare()
    {
        $attachments = $filetype = array();

        if (count($this->attachment)) while (list(, $att) = each($this->attachment)) {
            if ($att && $att != 'none') {
                if ($fp = @fopen($att, 'rb')) {
                    $filename = basename(str_replace('\\', '/', $att));
                    $file = fread($fp, filesize($att));
                    fclose($fp);

                    $ext = substr($filename, strrpos($filename, '.') + 1);
                    $filetype[$filename] = $this->mime[$ext] ? $this->mime[$ext] : 'application/octet-stream';
                    $attachments[$filename] = chunk_split(base64_encode($file));
                }
            }
        }

        $this->header = $this->footer = '';
        $uid1 = 'Next_' . strtoupper(md5(uniqid(time()) . 1));
        $uid2 = 'Next_' . strtoupper(md5(uniqid(time()) . 2));

        $this->header .= "Return-Path: " . $this->senderMail . "\n" .
            "Subject:\n" .
            "From: " . $this->senderName . " <" . $this->senderMail . ">\n" .
            "X-Sender: <" . $this->senderMail . ">\n" .
            "X-Mailer: PHP " . phpversion() . "\n" .
            "MIME-Version: 1.0\n";

        if ($this->cc) $this->header .= "Cc: " . $this->cc . "\n";
        if ($this->bcc) $this->header .= "Bcc: " . $this->bcc . "\n";

        if ($this->type == 'HTML' || count($attachments)) {
            $this->header .= "Content-Type: multipart/mixed;\n\t" .
                "boundary=\"$uid1\"\n\n" .
                "This is a multi-part message in MIME format.\n\n" .
                "--$uid1\n";
        }

        if ($this->type == 'HTML') {
            $this->header .= "Content-Type: multipart/related;\n\t" .
                "boundary=\"$uid2\"\n\n" .
                "--$uid2\n";
        }

        $this->header .= "Content-Type: text/" . (($this->type == 'HTML') ? 'html' : 'plain') . ";\n\t" .
            "charset=\"" . $this->charSet . "\"\n" .
            "Content-Transfer-Encoding: 8bit\n\n";

        if ($this->type == 'HTML') {
            if (count($this->inline)) while (list($ftype, $arr) = each($this->inline)) {
                if (count($arr)) while (list($inlName, $data) = each($arr)) {
                    $inlType = $this->mime[$ftype] ? $this->mime[$ftype] : 'application/octet-stream';
                    $this->footer .= "--$uid2\n" .
                        "Content-Type: $inlType;\n\t" .
                        "name=\"$inlName\"\n" .
                        "Content-ID: <$inlName>\n" .
                        "Content-Disposition: inline;\n\t" .
                        "filename=\"$inlName\"\n" .
                        "Content-Transfer-Encoding: base64\n\n" .
                        "$data\n\n";
                }
            }
            $this->footer .= "--$uid2--\n\n";
        }

        if (count($attachments)) while (list($filename, $file) = each($attachments)) {
            $this->footer .= "--$uid1\n" .
                'Content-Type: ' . $filetype[$filename] . ";\n\t" .
                "name=\"$filename\"\n" .
                "Content-Disposition: attachment;\n\t" .
                "filename=\"$filename\"\n" .
                "Content-Transfer-Encoding: base64\n\n" .
                "$file\n\n";
        }

        if ($this->type == 'HTML' || $file) $this->footer .= "--$uid1--";
    }

    function send($email)
    {
        if ($this->saveDir) $this->header = str_replace("Subject:\n", 'Subject: ' . $this->subject . "\n", $this->header);
        else $this->header = str_replace("Subject:\n", '', $this->header);

        $mime_mail = $this->header . $this->body . "\n\n" . $this->footer;

        if ($this->saveDir) {
            if ($fp = @fopen($this->saveDir . '/mail.eml', 'w')) {
                $mime_mail = "To: $email\n" . $mime_mail;
                fwrite($fp, $mime_mail, strlen($mime_mail));
                fclose($fp);
                $ok = true;
            } else $ok = false;
        } else {
            $php_ver = phpversion();
            if (function_exists('ini_get')) $safe_mode = ini_get('safe_mode');
            else $safe_mode = get_cfg_var('safe_mode');

            if ($php_ver < '4.0.5' || ($php_ver >= '4.2.3' && $safe_mode)) {
                $ok = @mail($email, $this->subject, '', $mime_mail);
            } else {
                $options = ($this->useQueue ? '-odq ' : '') . '-i -f ' . $this->senderMail;
                $ok = @mail($email, $this->subject, '', $mime_mail, $options);
            }
        }

        return $ok;
    }

    function create()
    {
        if (strlen($this->body) < 100) {
            $file = str_replace('\\', '/', $this->body);

            if ($fp = @fopen($file, 'r')) {
                $this->body = fread($fp, filesize($file));
                fclose($fp);
                $this->documentRoot = dirname($file);
            }
        }
        if ($this->type == 'HTML') $this->check_body();
        $this->prepare();
    }
}

///----------------------------------------------------------------///
///                                                                ///
///			 КОНЕЦ КЛАССА ДЛЯ ОТСЫЛКИ ПОЧТЫ С АТТАЧМЕНТАМИ         ///
///                                                                ///
///----------------------------------------------------------------///

//Функция возращает список всех подписанных абонентов для темы       		№ 23
function spisok_abonents_for_tema($id, $sort, $start, $cnt)
{
    $z = "select t_abonents.id,t_abonents.isactive,t_klients.fam,t_klients.name,t_klients.otch,t_klients.email from t_abonents,t_klients where (rassilka_id='$id' and t_abonents.klient_id=t_klients.id and t_klients.isactive='Y') ORDER BY $sort LIMIT $start, $cnt";
    $r = execute_sql($z);
    return $r;
}

//Функция удаляет абонета из темы рассылки  № 24
function del_abonent($id)
{
    $z = "delete from t_abonents where id='$id'";
    execute_sql($z);
}

//Функция возвращает массив номеров id абонентов не подписанных в теме     № 25
function spisok_idabonents_nosubscribe_in_tema($id)
{
    $z = "select klient_id from t_abonents where rassilka_id='$id'";
    $r = execute_sql($z);
    $m_client_id = sql_to_array($r, "klient_id");
    $z = "select id,isactive from t_klients where t_klients.isactive='Y'";
    $r = execute_sql($z);
    $m_id = sql_to_array($r, "id");
    if (count($m_client_id) != count($m_id))// если не добавленные клиенты еще есть
    {
        for ($i = 1; $i <= count($m_client_id); $i++) {
            for ($j = 1; $j <= count($m_id); $j++) {
                if ($m_id[$j] == $m_client_id[$i]) {
                    $m_id[$j] = 0;
                }
                //echo"$m_id[$j]<br>";
            }
        }
        $tt = count($m_id);
        for ($j = 1; $j <= $tt; $j++) {
            if ($m_id[$j] == 0) {
                unset($m_id[$j]);
            }
        }
        $j1 = 1;
        for ($j = 1; $j <= $tt; $j++) {
            if (isset($m_id[$j]))
                $m_id1[$j1] = $m_id[$j];
            else
                $j1--;
            $j1++;

        }
        return $m_id1;
    } else
        return $m_id1[1] = 0;
}

//Функция возвращает абонента в соответствии с номером id     		№ 26
function abonent_for_add($id)
{
    $z = "select id,fam,name,otch,email from t_klients where id='$id'";
    $r = execute_sql($z);
    return $r;
}

//Функция добавляет абонента в список темы рассылки (в таблицу t_abonents) № 27
function add_abonent($id, $tema_id)
{
    $z = "insert into t_abonents (klient_id,rassilka_id) values('$id','$tema_id')";
    execute_sql($z);
}

//Функция возвращает количество активных тем   № 28
function count_tema()
{
    $z = "select count(*) as kolvo from t_rassilka where isactive='Y'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

//Функция возвращает список активных тем  № 29
function spisok_active_tem()
{
    $z = "select id,name,isactive,descr from t_rassilka where isactive='Y' ORDER BY id DESC";
    $r = execute_sql($z);
    return $r;

}

//Функция возвращает количество одинаковых абонентов в теме  № 30
function count_abonent_in_tema($klient_id, $tema_id)
{
    $z = "select count(*) as kolvo from t_abonents where klient_id='$klient_id' and rassilka_id='$tema_id'";
    $r = execute_sql($z);
    $tmp = sql_to_array($r, "kolvo");
    $kolvo = $tmp[1];
    return $kolvo;
}

function change_file($fname, $str)
{
    $f = fopen($fname, "a");
    fputs($f, $str);
    fclose($f);
}

//_____________КЛИЕНТСКИЕ ФУНКЦИИ________________________________

//функция строит форму тем подписки
function form_client_rassilka($zagl, $clas_zagl, $tbl_border = 0, $tbl_align, $tbl_width, $tbl_cellspacing, $tbl_cellpadding, $clas, $size, $num_tema, $clas_input)
{
    if ((@$GLOBALS["user_login"]) && (@$GLOBALS["user_login"])) {
        $user_login = trim($GLOBALS["user_login"]);
        $user_password = md5(trim($GLOBALS["user_password"]));
    }
    echo "<table class='$clas' align='$tbl_align' width='$tbl_width' border='$tbl_border' cellspacing='$tbl_cellspacing' cellpadding='$tbl_cellpadding'>";
    echo "<form name='form_client_rassilka' id='form_client_rassilka' method='POST'>";
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
    echo "<tr class='$clas'><td class='$clas'>Фамилия:</td><td class='$clas'><input class='$clas_input' type='text' $read name='fam' id='fam' size='$size' value='$fam'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>Имя:</td><td class='$clas'><input class='$clas_input' type='text' $read name='name' id='name' size='$size' value='$name'></td></tr>";
    echo "<tr class='$clas'><td class='$clas'>E-mail:</td><td class='$clas'><input class='$clas_input' type='text' $read name='email' id='email' size='$size' value='$email'></td></tr>";
    if ((count_tema() < $num_tema) || (count_tema() == 0)) // чило отображаемых тем
        $end = count_tema();
    else
        $end = $num_tema;
    $z = spisok_active_tem();
    $m_id = sql_to_array($z, "id");
    $m_name = sql_to_array($z, "name");
    for ($i = 1; $i <= $end; $i++)  //строим checkboxы
    {
        $id = $m_id[$i];
        $name = $m_name[$i];
        echo "<tr class='$clas'><td class='$clas'colspan='2' ><input type='checkbox' name='check$i' id='check$i'> $name</td></tr>";
    }
    echo "<tr class='$clas'><td colspan='2' align='center'><input type='submit' name='podpiska' id='podpiska' value='Подписаться'></td></tr>";
    echo "<input type='hidden' name='num_tema' id='num_tema' value='$num_tema'";
    echo "</form></table>";
}

//Функция добавляет клиента в списки подписки
function add_client_podpiska($id_k, $mess, $clas_mess, $lang)
{
    global $id_k; //переменная использующаяся вместо переменной сессии и значение ее надо занести в переменную сессии созданную во внешнем сценарии а иначе не работает сессия

    $fam = $GLOBALS["fam"];
    $name = $GLOBALS["name"];
    $email = $GLOBALS["email"];
    $num_tema = $GLOBALS["num_tema"];
    if ((count_tema() < $num_tema) || (count_tema() == 0)) // чило отображаемых тем
        $end = count_tema();
    else
        $end = $num_tema;
    $z = spisok_active_tem();
    $m_id = sql_to_array($z, "id");
    $m_name = sql_to_array($z, "name");
    $j = 1;
    for ($i = 1; $i <= $end; $i++)  // формируем массив id тем на которые подписался клиент
    {
        if (@$GLOBALS["check$i"]) {
            $m_tema_id[$j] = $m_id[$i];
            $j++;
        }
    }

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
        if (@$fam != '' && @$name != '' && @$email != '') {
            if (@$id_k)    //определяем имя и фамилию прдыдущего задававшего вопрос (зная его id->$id_k(глобальная переменная которая во внешнем сценарии передает значение в переменную сессии а иначе не работает) из сессии )
            {                          //если она совпадает с набитыми в полях именем и фамилией то такого клиента в базу не добавляем
                $z = spisok_edit_clients(@$id_k);
                $m_id = sql_to_array($z, "id");
                $m_name = sql_to_array($z, "name");
                $m_fam = sql_to_array($z, "fam");
                $m_email = sql_to_array($z, "email");
                if (@$m_name[1] != '')
                    $name1 = $m_name[1];
                else
                    $name1 = '';
                if (@$m_fam[1] != '')
                    $fam1 = $m_fam[1];
                else
                    $fam1 = '';
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
                $id_k = $id;             //заносим id неавторизованного пользователя в сессию чтобы его каждый раз не добавлять при новом добавлении тем

            }
        }
    }

    if ((@$fam != '') && (@$name != '') && (@$email != '')) {
        for ($i = 1; $i <= count($m_tema_id); $i++)//по циклу добавляем абонента в те темы где он поставил галочки
        {
            if (count_abonent_in_tema(@$id_k, $m_tema_id[$i]) == 0)   // проверка на повтор
                add_abonent(@$id_k, $m_tema_id[$i]);
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
        $str = "'Незаполнены обязательные поля Фамилия, Имя, E-mail!'";
        echo "<script language='JavaScript1.2'>alert ($str)</script>";
    }

}

?>