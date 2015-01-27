<?php
//подключение всего
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");

//цепляемся к базе
connect_bd();

if (@$_GET['select_id_razdel']) {
    $select_id_razdel = $_GET['select_id_razdel'];
}

if (@$_GET['select_id_reklama']) {
    $select_id_reklama = $_GET['select_id_reklama'];
}

if (@$_GET['select_id_avtor']) {
    $select_id_avtor = $_GET['select_id_avtor'];
}

if (@$_GET['page']) {
    $page = $_GET['page'];
}

if (@$_GET['select_id_foto']) {
    $select_id_foto = $_GET['select_id_foto'];
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
if (!(@$select_id_foto)) {
    $select_id_foto = 0;
}

if (@$_GET['str_poisk']) {
    $str_poisk = $_GET['str_poisk'];
    if ($str_poisk != "") {
        $show_poisk = "Y";
    }
} else {
    $str_poisk = "";
    $show_poisk = "";
}

?>
<html>
<head>
    <title>Фотоагентство Западный Урал</title>
    <META HTTP-EQUIV='Expires' CONTENT='0'>
    <META HTTP-EQUIV='Pragma' CONTENET='nocashe'>
    <META NAME='Author' CONTENT='Глумов Федор'>
    <META content="text/html; charset=windows-1251">
    <meta name='description' content='Пермь. Фотоагентство Западный Урал предлагает широкий спектр услуг фотографии, рекламная съёмка.  Среди авторов агентства – известные фотомастера, лауреаты и призёры российских и международных выставок и конкурсов, профессиональные репортёры и фотохудожники.'/>
    <meta name='keywords' content='Фотоагентство, Западный Урал, фотографии, реклама, фотостудия, фотомастера, Пермь, съёмка, фотография, фотобанк, фотографы, организация съемок'/>
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
</head>
<body bgcolor="#808080">
<table align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td><img src="./img/head.jpg" border="0" width="971" height="139"></td>
    </tr>
    <tr>
        <td>
            <table align="center" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td colspan="2" valign="top">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="left">
                                    <?php build_main_menu($str_poisk); ?>
                                </td>
                                <td align="right" valign="top">
                                    <br>
                                    <font class="cls_name_avtor_haed_fotobank">
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
                                    </font>
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
                        <?php
                        $r = get_fotki($select_id_razdel, $select_id_avtor, $select_id_foto, "", "Y", $show_poisk, $str_poisk);
                        $id_foto = sql_to_array($r, 'id_foto');
                        $name_litle = sql_to_array($r, 'name_litle');
                        $name_avtor = sql_to_array($r, 'name_avtor');
                        $name_razdel = sql_to_array($r, 'name_razdel');
                        $key_words = sql_to_array($r, 'key_words');
                        $name_big = sql_to_array($r, 'name_big');
                        $k = 0;
                        echo "<table cellpadding='3' cellspacing='0'  border='0'>";
                        for ($i = 1; $i <= count($id_foto); $i++) {
                            if ($k > count($id_foto)) {
                                break;
                            }
                            $n = 1;
                            for ($j = 1; $j < 7; $j++) {
                                $k = $k + 1;
                                if ($k > count($id_foto)) {
                                    break;
                                }
                                if (($k > (($page - 1) * 30)) && ($k <= ($page * 30))) {
                                    if ($n == 1) {
                                        echo "<tr align='center'>";
                                        $n = 2;
                                    }

                                    $sss = "./foto_big/" . $id_foto[$k] . "/" . $name_big[$k];
                                    if (file_exists($sss)) {
                                        $df = imageCreateFromJpeg($sss);
                                        $dl = imageCreateFromGif("./img/logo.gif");
                                        $im = GetImageSize($sss);
                                        $dstX = $im[0] * 4 / 6;
                                        if ($dstX + 102 > $im[0]) {
                                            $dstX = $im[0] - 102;
                                        }
                                        if ($dstX <= 0) {
                                            $dstX = 1;
                                        }
                                        $dstY = $im[1] / 2;
                                        if ($dstY <= 0) {
                                            $dstY = 1;
                                        }
                                        $srcX = 1;
                                        $srcY = 1;
                                        $dstW = 100;
                                        $dstH = 98;
                                        $srcW = 100;
                                        $srcH = 98;

                                        imagecopyresized($df, $dl, $dstX, $dstY, $srcX, $srcY, $dstW, $dstH, $srcW, $srcH);

                                        imageJpeg($df, "./foto_big/" . $id_foto[$k] . "/" . $id_foto[$k] . ".jpg");
                                        $sss = "./foto_big/" . $id_foto[$k] . "/" . $id_foto[$k] . ".jpg";
                                    }
                                    $name_litle_foto = "./foto_litle/" . $id_foto[$k] . "/" . $name_litle[$k];
                                    $name_big_foto = "./foto_big/" . $id_foto[$k] . "/" . $id_foto[$k] . ".jpg";

                                    if ((!(file_exists($name_litle_foto))) || ($id_foto[$k] <= 1182)) {
                                        $name_litle_foto = "http://wu.netter.ru/foto_litle/" . $id_foto[$k] . "/" . $name_litle[$k];
                                    }

                                    if ((!(file_exists($name_big_foto))) || ($id_foto[$k] <= 1182)) {
                                        $name_big_foto = "http://wu.netter.ru/foto_big/" . $id_foto[$k] . "/" . $id_foto[$k] . ".jpg";
                                    }

                                    echo "<td valign='top'>";
                                    echo "<table width='120' height='120' border='0' cellpadding='0' cellspacing='0'><tr width='120' height='120'><td width='120' height='120' bgcolor='#545454' align='center' valign='middle'>";

                                    echo "<a rel='lightbox' href='$name_big_foto'><img src='$name_litle_foto' border='0' alt='$name_razdel[$k] - $key_words[$k]'></a>";

                                    echo
                                    "</td></tr><tr>
	   <td align='center' class='cls_main_avtors'>
	   № $id_foto[$k]
	   </td>
	   </tr>
	   </table>";
                                    if ($select_id_foto > 0) {
                                        echo "<div style=CURSOR:hand; onclick='window.close();'><font class='cls_main_avtors'>Назад</font></div>";

                                    }
                                    echo "</td>";
                                }

                            }
                            // echo"</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<table><tr>";
                        if (count($id_foto) > 30) {
                            $k = 0;
                            $n = 0;
                            for ($i = 1; $i <= count($id_foto); $i++) {
                                $k++;
                                if (($k > 30) || ($i == count($id_foto))) {
                                    $k = 0;
                                    $n++;
                                    if ($n == $page) {
                                        echo "<td class='cls_main_link_reklama'>$n</td>";
                                    } else {
                                        echo "<td class='cls_main_link_reklama'><a href='show_foto.php?select_id_razdel=$select_id_razdel&page=$n&select_id_avtor=$select_id_avtor&str_poisk=$str_poisk' class='cls_main_link_reklama'>$n</a></td>";
                                    }
                                }
                            }
                        }
                        echo "</tr></table>";
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php build_kontakt_data(); ?>
</body>
</html>
