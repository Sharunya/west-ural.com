<?php
//����������� �����
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");

//��������� � ����
connect_bd();

if (@$_GET['select_id_reklama']) {
    $select_id_reklama = $_GET['select_id_reklama'];
}

if (!(@$select_id_razdel)) {
    $select_id_razdel = 0;
}
if (!(@$select_id_avtor)) {
    $select_id_avtor = 0;
}
if (!(@$page)) {
    $page = 1;
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>������������� �������� ����</title>
    <META HTTP-EQUIV='Expires' CONTENT='0'>
    <META HTTP-EQUIV='Pragma' CONTENET='nocashe'>
    <META NAME='Author' CONTENT='������ �����'>
    <meta name='description' content='�����. ������������� �������� ���� ���������� ������� ������ ����� ����������, ��������� ������.  ����� ������� ��������� � ��������� �����������, �������� � ������ ���������� � ������������� �������� � ���������, ���������������� �������� � �������������.'/>
    <meta name='keywords' content='�������������, �������� ����, ����������, �������, ����������, �����������, �����, ������, ����������, ��������, ���������, ����������� ������'/>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#808080">
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-59663471-1', 'auto');
    ga('send', 'pageview');

</script>
<?php
$page_inc = "presents.php";
require("header.php");
?>

<table align="center" cellpadding="0" cellspacing="0" border="0" style="
    margin-top: 196px;
    width: 1024px;
">
    <!--    <tr>
            <td><img src="./img/head.jpg" border="0" width="971" height="139"></td>
        </tr>
    -->
    <tr>
        <td>
            <table align="center" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td colspan="2" valign="top">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="left">
                                    <!--                                    --><?php //build_main_menu("", "presents.php"); ?>
                                </td>
                                <td align="right" class="cls_name_avtor_haed_fotobank" valign="top">
                                    <?php
                                    if ($select_id_avtor > 0) {
                                        $r = get_avtor($select_id_avtor);
                                        $name = sql_to_array($r, 'name');
                                        echo "$name[1]";
                                    }
                                    ?>
                                    <?php
                                    if ($select_id_razdel > 0) {
                                        $r = get_razdel($select_id_razdel);
                                        $name = sql_to_array($r, 'name');
                                        echo "$name[1]";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <br>
                        <? build_menu_foto_bank($select_id_razdel); ?>
                    </td>
                    <td valign="top" align="center" width="100%">
                        <br>
                        <table bgcolor="#686868" width="800">
                            <tr>
                                <td class="cls_txt_present">
                                    <br>
                                    <center>��������� ���� � �������!
                                        <br>
                                        <br>������������ ���������� ��� ���� ������ � �����
                                        <br>���������� ����������.
                                        <br>� ����� ������ �� ������� ����������� �����
                                        <br>��� ��������������� ������� ������� ����.
                                        <br>� ��� ����� �������� ����� ������ -
                                        <br>������������� ��� �����������.
                                        <br>��������� ����������� ������� � ������
                                        <br>��� ��������� ��������.
                                        <br>����� ���������� ������, �������������� �� ����� ���
                                        <br>����������� � ������, �� ������ ��������� �� ��������
                                        <br>891298-53033 ��� ��������� �� ����������� �����.
                                        <br>
                                    </center>
                                    <font class="cls_txt_present_2">
                                        <br>
                                        <div align="right">���-�������� �������� ��������.</div>
                                        <br>
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php build_kontakt_data(); ?>
</body>
</html>
