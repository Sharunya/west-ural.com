<?php
// � ���� ������ ����������� ������������� ������� ��� ��������� HTML ����
/*
 //______________________________������ �������_________________________________

                                                                        �1
function create_zagolovok($zagolovok,$keywords,$opisane,$file_css, $file_js) - ������ ����� ���������.
������� ���������: $zagolovok - ��������� ����, $keywords - �������� �����,
                                         $opisane - ������� �������� ��������,$file_css - ���� � ��������� �����
                                         $file_js - ���� � ����� � JS. ������� ����� ���������� � ��������

                                                                        �2
function create_select_combo ($name,$m_val,$m_punkts,$style, $onchange, $select_punkt) - ������ ���������� ������
������� ���������: $name - �������� ������,$m_val - ������ �� ����������,
                                   $m_punkts - ������ � ���������� �������,
                                   $style - ����� � �������� ����� �������������� ��������,
                                   $onchange - ���������� ������� �������������� ��������,
                                   $select_punkt - ���������� ���� �������������� ��������


function menu() - �������� JS ������ �������� ����   �3


function strrepl($s) //������� �������� � ������ ����� >,<,""   � 4
*/


//______________________________��� �������____________________________________

//������� ������� ���������� ������
function create_select_combo($name, $m_val, $m_punkts, $style = "", $onchange = "", $select_punkt = "")
{
    $onchange = trim($onchange);
    if ($onchange != "") {
        echo "<select name='" . $name . "' id='" . $name . "' class='" . $style . "' onchange='" . $onchange . "'>";
    }
    if ($onchange == "") {
        echo "<select name='" . $name . "' id='" . $name . "' class='" . $style . "'>";
    }
    for ($i = 1; $i < 1 + count($m_val); $i++) {
        if ($select_punkt != $m_val[$i]) {
            echo "<option  value='" . $m_val[$i] . "'>" . $m_punkts[$i] . "</option>";
        }
        if ($select_punkt == $m_val[$i]) {
            echo "<option selected  value='" . $m_val[$i] . "'>" . $m_punkts[$i] . "</option>";
        }
    }
    echo "</select>";

}

//������� ���������� ����� ��������
function create_zagolovok($zagolovok, $keywords, $opisane, $file_css, $file_js = '../../stm31.js')
{
    echo "<html>";
    echo "<head>";
    echo "<title>$zagolovok</title>";
    echo "<LINK REL='stylesheet' TYPE='text/css' HREF='$file_css'>";
    echo "<META content='text/html' charset=windows-1251'>";
    echo "<META HTTP-EQUIV='Expires' CONTENT='0'>";
    echo "<META HTTP-EQUIV='Pragma' CONTENET='nocashe'>";
    echo "<META NAME='Keywords' CONTENT='$keywords'>";
    echo "<META name='description content='$opisane'>";
    if ($file_js != "") {
        echo "<script type='text/javascript' language='JavaScript1.2' src='$file_js'></script>";
    }
    echo "</head>";
}

// �������� JS ������ �������� ����                �3
function menu()
{
    echo "<script type='text/javascript' language='JavaScript1.2' src='../../menu.js'></script>";
}

//������� �������� � ������ ����� >,<                �4
function strrepl($s)
{
    $s = str_replace(">", "&gt", $s);
    $s = str_replace("<", "&lt", $s);
    return $s;
}


?>
