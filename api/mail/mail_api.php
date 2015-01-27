<?
/*
� ���� ������ ����������� ������� ��� ������ � ������


 _______________________________������ �������_________________________________
 										�1
function send_mail($name_from, $email_from, $name_to, $email_to, $text, $files) - ������� ���������� �����
������� ���������:
	$name_from - ��� �����������, 
	$email_from - ����� �����������, 
	$name_to - ��� ����������, 
	$email_to - ����� ����������,
	$tema - ���� ������
	$text - ����� ������
�������������� ������� ���������:
	$files - ������ � �������
�������� ���������:
    ���������� -������ �� �������� �������
*/

//______________________________��� �������____________________________________
require_once('kernel/htmlMimeMail.php');

//������� ���������� �����
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