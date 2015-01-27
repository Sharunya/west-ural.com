<?
/*
� ���� ������ ����������� ����� ������� ��� api


 _______________________________������ �������_________________________________

                                  �1
function convert_date($date) //������� ��������� ���� �� Y-m-d � d.m.Y
������� ���������: $date - data � ������� Y-m-d (����� �� MySQL)
�������� ���������: ������ ����

										�2
function correct($str) - ��������� �� ������������ ������ �� �����, ��������������� ��� �������� � ��
������� ���������: $str - ������ ��� ��������
�������� ���������:  - ������ ��� ������ ��������

  										�3
function convert_date_mysql($date)  //������� ��������� ���� �� d.m.Y �  Y-m-d
������� ���������: $date - data � ������� d.m.Y
�������� ���������: ������ ����

  										�4
function stroka_in_masiv($stroka) - ��������� ������ � ������ ����

									    �5
 �������� ��������� � ������
function select_podstroka_in_stroka($stroka, $podstroka, $simvol_beg_sel, $simvol_end_sel)
������� ���������:
					$stroka - ������ � ������� ����� ��������
					$podstroka - ��������� ������� ����� ��������
					$simvol_beg_sel - ������ ��� ������ ��������� (�������� <font>)
					$simvol_end_sel - ������ ��� ����� ��������� (�������� </font>)

									    �6
����������� 100% ������ � ������� �������
function str_to_upper($str)
������� ���������:
					$str - ������, ������� ����� ������������� � ������� �������
�������� ���������:	������ ��� ������� ������� ������������� � ������� �������
*/


//______________________________��� �������____________________________________

//����������� 100% ������ � ������� �������
function str_to_upper($str)
{
    set_local_var("LV_str_to_upper_function_api.php", $str);
    $r = get_upper_local_var("LV_str_to_upper_function_api.php");
    return $r;
}


//��������� ������ � ������ ����
function stroka_in_masiv($stroka)
{
    $stroka = trim($stroka);
    $stroka = $stroka . " ";
    $c = 0;
    $k = "";
    for ($i = 0; $i < strlen($stroka); $i++) {
        $s = $stroka[$i];
        if ($s == " ") {
            if ($k != "") {
                $c = $c + 1;
                $m[$c] = $k;
            }
            $k = "";
        } else {
            $k = $k . $s;
        }
    }
    return $m;
}


// �������� ��������� � ������
function select_podstroka_in_stroka($stroka, $podstroka, $simvol_beg_sel, $simvol_end_sel)
{
    $m = stroka_in_masiv($podstroka);
    $litle_descr = $stroka;
    for ($l = 1; $l <= count($m); $l++) {
        $r_litle_descr = str_to_upper($litle_descr);
        $r2 = str_to_upper($m[$l]);
        if (strpos($r_litle_descr, $r2) !== false) {
            $pr = strpos($r_litle_descr, $r2);
            $srt = "";
            for ($t = 0; $t < $pr; $t++) {
                $srt = $srt . $litle_descr[$t];
            }
            $srt = $srt . $simvol_beg_sel;
            for ($t1 = $pr; $t1 - $t < strlen($m[$l]); $t1++) {
                $srt = $srt . $litle_descr[$t1];
            }
            $srt = $srt . $simvol_end_sel;
            for ($t = $t1; $t < strlen($litle_descr); $t++) {
                $srt = $srt . $litle_descr[$t];
            }
            $litle_descr = $srt;
        }//if
    }//for

    return $litle_descr;
}


//������� ��������� ���� �� Y-m-d � d.m.Y   � 1
function convert_date($date)
{
    $s = $date[8] . $date[9] . "." . $date[5] . $date[6] . "." . $date[0] . $date[1] . $date[2] . $date[3];
    return $s;
}

//������� ��������� ���� �� d.m.Y �  Y-m-d  �3
function convert_date_mysql($date)
{
    $s = $date[6] . $date[7] . $date[8] . $date[9] . "-" . $date[3] . $date[4] . "-" . $date[0] . $date[1];
    return $s;
}


//	��������� �� ������������ ������ �� �����, ��������������� ��� �������� � �� �2
function correct($str)
{
    $str = str_replace(">", "&gt", $str);
    $str = str_replace("<", "&lt", $str);
    return $str;
}

//������ ��������� �� ������
function out_msg_about_error($msg)
{
    echo "<br><h1><font color='#ff0000'>$msg</font></h1><br>";
}

?>