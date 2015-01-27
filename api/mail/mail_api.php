<?
/*
В этом модуле реализованы функции для работы с почтой


 _______________________________СПИСОК ФУНКЦИЙ_________________________________
 										№1
function send_mail($name_from, $email_from, $name_to, $email_to, $text, $files) - Функция отправляет почту
Входные параметры:
	$name_from - имя отправителя, 
	$email_from - адрес отправителя, 
	$name_to - имя получателя, 
	$email_to - адрес получателя,
	$tema - тема письма
	$text - текст письма
Необязательные входные параметры:
	$files - массив с файлами
Выходные параметры:
    логический -прошла ли отправка успешно
*/

//______________________________КОД ФУНКЦИЙ____________________________________
require_once('kernel/htmlMimeMail.php');

//Функция отправляет почту
function send_mail($name_from, $email_from, $name_to, $email_to, $tema, $text, $files = "")
{
    $mail = new htmlMimeMail();
//    $mail->setTextCharset('CP1251');
    $mail->setText($text);
    if ($files != "") {
        for ($i = 1; $i <= count($files); $i++) {
            $attachment = $mail->getFile($files[$i]);
            $mail->addAttachment($attachment, $files[$i]);
        }
    }
    $mail->setFrom($name_from . ' <' . $email_from . '>');
    $mail->setSubject($tema);
    $result = $mail->send(array('"' . $name_to . '" <' . $email_to . '>'));

    return $result;

}

?>