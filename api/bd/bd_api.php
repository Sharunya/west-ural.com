<?php
/*
� ���� ������ ����������� ����� ������� ��� ������ � ��

 _______________________________������ �������_________________________________

                                                                        �1
 function connect_bd() - ������������ � ���� ������ �������
 �������� ���������: false/true

                                                                        �2
 function execute_sql($sql_txt) - ������� ��������� sql ���������
 ������� ���������: $sql_txt - sql ���������
 �������� ���������: "��������� ���������� ���������"

                                                                        �3
function sql_to_array($sql_zapros,$nomer_stolbca) - ������� ������������ �������� sql ������� � ���������� ������
������� ���������: $sql_zapros - sql ������
                                   $nomer_stolbca - ����� ��� ��� ������� � �������, ������� ���� ������������� � ������
�������� ���������: "���������� ������"


                                                                  �4
function sql_to_file($sql_zapros, $name_file) - ������� ��������� ��������� sql ������� � ��������� ����. 
������� ���������: $sql_zapros - sql ������
                                   $name_file - ��� �����, ���� ��������� ��������� �������
�������� ���������: "����"


 */


//______________________________��� �������____________________________________


//������� ������������ �������� sql ������� � ���������� ������
function sql_to_array($sql_zapros, $nomer_stolbca)
{
    if (mysql_num_rows($sql_zapros) == 0) {
        $m = array();
        return $m;
    }

    for ($i = 0; $i < mysql_num_rows($sql_zapros); $i++) {

        $m[$i + 1] = mysql_result($sql_zapros, $i, $nomer_stolbca);
    }
    return $m;
}

//������� ��������� sql ���������
function execute_sql($sql_txt)
{
    mysql_query("SET NAMES 'cp1251'");
//mysql_query("SET NAMES 'utf8'");
    $zapros = mysql_query($sql_txt);
    $error = mysql_error();
    if ($error != "") {
        echo "<br><font color='#ff0000'><h1>ERROR: $error</h1>SQL: $sql_txt</font><br>";
    }
    return $zapros;
}

//������� ������������ � ���� �������
function connect_bd()
{
    return connect_mysql(server_bd, user_bd, psw_bd, name_bd);
}

//������� ������������ � ������� MySQL
function connect_mysql($hostname, $user, $password, $db)
{
    if (!mysql_connect($hostname, $user, $password)) {
        echo "<br><h1><font color='#ff0000'>ERROR: " . mysql_error() . "</font></h1><br>";
        return false;
    };
    mysql_select_db($db);
    mysql_query("SET NAMES 'cp1251';");
    mysql_query("SET CHARACTER SET 'cp1251';");
    mysql_query("SET SESSION collation_connection = 'cp1251_general_ci';");
    mysql_query("SET lc_time_names = 'ru_RU'");
//mysql_query("SET NAMES 'utf8';"); 
//mysql_query("SET CHARACTER SET 'utf8';"); 
//mysql_query("SET SESSION collation_connection = 'utf8_unicode_ci';"); 
//mysql_query("SET lc_time_names = 'ru_RU'");

    return true;
}

//������� ��������� ��������� sql ������� � ��������� ����
function sql_to_file($sql_zapros, $name_file)
{

    $f = fopen($name_file, "w");
    if (!($f)) {
        echo "<br><h1><font color='#ff0000'>ERROR: �� ������� ������� ���� - " . $name_file . "</font></h1><br>";
        exit;
    }

    for ($i = 0; $i < mysql_num_rows($sql_zapros); $i++) {
        $s = '';
        for ($j = 0; $j < mysql_num_fields($sql_zapros); $j++) {
            $r = mysql_result($sql_zapros, $i, $j);
            $s = $s . $r . ';';
        }
        $s = $s . "\n";
        fputs($f, $s);
    }
    fclose($f);
}

?>