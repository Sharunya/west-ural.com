<?php
#++++++++++++++++++++++++#
# Last update 17.09.2005 #
#++++++++++++++++++++++++#

//подключение всего
session_start();
require_once("../fun.php");


include("cnf/vars.php");
include("cnf/funct2.php");

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Pragma: no-cache"); // HTTP/1.0

$acc_f = 'a_forum.php';
$f_p = 'data/';
$f_lst = 'f_lst';
$f_t = '_';
$slp_p = 60 * 40;
$fr_p = $life_old_th * 60 * 60 * 24; # 20 дней...
$can_del = 0;
$logged = '1';

if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
} else {
    $name = '';
}
if ($name != "") {
    SetCookie("name", $name, time() + 60 * 60 * 24 * 30);
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
$name = (substr(f_c_m_s($name), 0, 30));

$a = 'll';
if (isset($_GET['a'])) {
    $a = $_GET['a'];
}
if (isset($_POST['a'])) {
    $a = $_POST['a'];
}
$a = ereg_replace("[^a-z]", "", $a);
if (!is_string($a)) {
    unset($a);
    $a = 'll';
}
if (($a != 'at') && ($a != 'aa') && ($a != 'dt') && ($a != 'da') && ($a != 'lg') && ($a != 'lt') && ($a != 'll')) {
    $a = 'll';
}

if ($a != "lg") {
    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
    } else {
        $id = '';
    }
} else {
    if (!isset($_POST['c'])) {
        $id = '';
    }
    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
    }
}

$idt = '';
if (isset($_GET['idt'])) {
    $idt = $_GET['idt'];
}
if (isset($_POST['idt'])) {
    $idt = $_POST['idt'];
}
if (!is_string($idt)) {
    unset($idt);
    $a = 'll';
} else {
    $idt = ereg_replace("[^0-9]", "", $idt);
}

$p = '1';
if (isset($_GET['p'])) {
    $p = $_GET['p'];
}
if (isset($_POST['p'])) {
    $p = $_POST['p'];
}
if (!is_string($p)) {
    unset($p);
    $p = '1';
    $a = 'll';
} else {
    $p = ereg_replace("[^0-9]", "", $p);
}
$p = substr($p, 0, 4);

if ($a == 'lg') {
    include("cnf/forum/login.php");
}
up_forum();

if ($id == md5($adps . date("d", time() . md5($ad)))) {
    $can_del = 1;
}

$my_w = 0;// изменяем
$my_r = 0;// смотрим

//echo "[id=$id]";

if ($a == 'at') {
    include("cnf/forum/add_t.php");
}
if ($a == 'dt') {
    include("cnf/forum/delete_t.php");
}
if ($a == 'aa') {
    include("cnf/forum/add_a.php");
}
if ($a == 'da') {
    include("cnf/forum/delete_a.php");
}
if ($a == 'lt') {
    include("cnf/forum/look_t.php");
}
if ($a == 'll') {
    include("cnf/forum/list_t.php");
}

down_forum();

function up_forum(){
global $forum_name;
?>
<html>
<head><title><?php echo $forum_name; ?></title>
    <META content='text/html; charset=windows-1251' http-equiv='Content-Type'>
    <link href="../main.css" rel="stylesheet" type="text/css">
</head>
<style>
    a { text-decoration: none; color: #0077dd; }

    a:hover { text-decoration: underline; color: #eeeeff; }

    a.pg { text-decoration: none; color: #9fa1b7; }

    a.pg:hover { text-decoration: underline; color: #eeeeff; }

    a.m2 { text-decoration: none; color: #777777; }

    a.m2:hover { text-decoration: underline; color: #777777; }

    .c1 { width: 200; BACKGROUND-COLOR: #000000; border: thin; color: #a6a96C; BORDER-BOTTOM: #999999 1px outset; BORDER-LEFT: #999999 1px outset; BORDER-RIGHT: #999999 2px outset; BORDER-TOP: #999999 1px outset; }

    .c2 { font-size: 13px; font-family: Arial; color: #777777; }

    .c3 { width: 200; BACKGROUND-COLOR: #B7B9BE; color: black; BORDER-BOTTOM: #555555 1px outset; BORDER-LEFT: #555555 1px outset; BORDER-RIGHT: #555555 2px outset; BORDER-TOP: #555555 1px outset; }

    select { font-size: 11px; }

    .mh { color: #0066cc; font-family: Verdana; font-size: 18px; }

    .author { font-size: 7pt; color: #777777; }
</style>

<body bgcolor=#000022 background=img/bg2.gif text=ffffff bgproperties='fixed'>

<table align="center" cellpadding="0" cellspacing="0" border="0" width="971">
    <tr>
        <td>
            <img src="../img/head.jpg" border="0" width="971" height="139">
        </td>
    </tr>
    <tr>
        <td>
            <?php build_main_menu("", "./spforum/"); ?>
        </td>
    </tr>
    <tr>
        <td>
            <center>
                <?php
                }

                function down_forum()
                { ?>

                <?php
                }

                function my_pages($g, $mp)
                {
                    ?><a class=pg href='<?php echo $g; ?>&p=<?php echo $mp; ?>'><?php echo $mp; ?></a>&nbsp; <?php
                }

                function my_links()
                { ?>
                <?php
                }

                ?>
        </td>
    </tr>
</table>