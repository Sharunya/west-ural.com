<?php
//подключение всего
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");

//цепляемся к базе
connect_bd();

if (@$_GET['select_id_reklama']) {
    $select_id_reklama = $_GET['select_id_reklama'];
}

if (!(@$select_id_razdel)) {
    $select_id_razdel = -1;
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <title>Фотоагентство Западный Урал</title>
    <META HTTP-EQUIV='Expires' CONTENT='0'>
    <META HTTP-EQUIV='Pragma' CONTENET='nocashe'>
    <META NAME='Author' CONTENT='Глумов Федор'>
    <meta name='description' content='Пермь. Фотоагентство Западный Урал предлагает широкий спектр услуг фотографии, рекламная съёмка.  Среди авторов агентства – известные фотомастера, лауреаты и призёры российских и международных выставок и конкурсов, профессиональные репортёры и фотохудожники.'/>
    <meta name='keywords' content='Фотоагентство, Западный Урал, фотографии, реклама, фотостудия, фотомастера, Пермь, съёмка, фотография, фотобанк, фотографы, организация съемок'/>
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<body bgcolor="#808080">
<script language="JavaScript">
    var i = 0;
    var timer;
    var flag = 1;
    var images = [<?php
        $r=get_list_top_foto();
		$id_reklama=sql_to_array($r,'id_reklama');
		$name_file=sql_to_array($r,'name_file');
		for($i=1;$i<=count($id_reklama);$i++){
		 $sss="./foto_top/$id_reklama[$i]/$name_file[$i]";
		 echo"'$sss'";
		 if ($i<count($id_reklama)){
		  echo",";
		 }
		}

?>];
    var descr = [<?php
        $r=get_list_top_foto();
		$descr=sql_to_array($r,'descr');
		for($i=1;$i<=count($descr);$i++){
		 echo"'$descr[$i]'";
		 if ($i<count($descr)){
		  echo",";
		 }
		}

?>];
    function on_clik_btn_play()
    {
        flag = -flag;
        if (flag < 0) {
            btn_play.src = './img/play.gif';
        } else {
            btn_play.src = './img/stop.gif';
        }
    }

    function play()
    {
        timer = setInterval(f, 5000);
    }
    function f()
    {
        if (flag > 0) {
            img_top.src = images[(i = (i ==<? echo count($id_reklama)-1; ?> ? 0 : i + 1))];
            imgObjText.innerHTML = descr[i];
            btn_play.src = './img/stop.gif';
        }
        if (flag < 0) {
            btn_play.src = './img/play.gif';
        }
    }
    play();
</script>
<div class="mytopmenu" style="
    width: 100%;
">
    <div style="
    width: 50%;
    height: 139px;
    float: left;
    background-color: #e19535;
">
        &nbsp;</div>
    <div style="
 width: 50%;
    height: 139px;
    float: left;
    background-color: #333333;
            ">
        &nbsp;</div>
</div>

<div class="mytopmenu" style="
    width: 100%;
">
    <img src="./img/head.jpg" border="0" width="971" height="139" style="
    display: block;
    margin: 0 auto;
">
</div>
<div class="mytopmenu" style="left: 120px; top: 139px; background-color: gray; height: 47px; padding-bottom: 10px; width: 720px;">
    <?php build_main_menu("", "index.php"); ?>
</div>

<table align="center" cellpadding="0" cellspacing="0" border="0" style="
    margin-top: 196px;
    width: 1024px;
">
    <tr>
        <td>
            <table align="center" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td valign="top">
                        <br>
                        <? build_menu_foto_bank($select_id_razdel); ?>
                    </td>
                    <td valign="top" align="center" height="459">
                        <table height="459" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <table height="459" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tr height="10%">
                                            <td>&nbsp;</td>
                                            <td bgcolor="#595959" width="457">
                                                <table align="center" cellpadding="0" cellspacing="4" border="0">
                                                    <tr>
                                                        <?php
                                                        $r = get_list_top_foto();
                                                        $id_reklama = sql_to_array($r, 'id_reklama');
                                                        $name_file = sql_to_array($r, 'name_file');
                                                        $descr = sql_to_array($r, 'descr');
                                                        if (count($id_reklama) > 0) {
                                                            if (!(@$select_id_reklama)) {
                                                                $select_id_reklama = $id_reklama[1];
                                                            }
                                                            for ($i = 1; $i <= count($id_reklama); $i++) {
                                                                echo "<td class='cls_main_link_reklama'>";
                                                                if ($id_reklama[$i] != $select_id_reklama) {
                                                                    // echo"<a href='index.php?select_id_reklama=$id_reklama[$i]' class='cls_main_link_reklama' title='$descr[$i]'>$i</a>";
                                                                } else {
                                                                    //    echo"$i";
                                                                }
                                                                echo "</td>";
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <?php
                                            if (@$select_id_reklama) {
                                                $r = get_list_top_foto($select_id_reklama);
                                                $id_reklama = sql_to_array($r, 'id_reklama');
                                                $name_file = sql_to_array($r, 'name_file');
                                                $descr = sql_to_array($r, 'descr');
                                                $sss = "./foto_top/$id_reklama[1]/$name_file[1]";
                                                $im = GetImageSize($sss);
                                                if ($im[1] < $im[0]) {
                                                    echo "<td></td><td valign='top' align='center' bgcolor='#595959'><img border='0' name='img_top' id='img_top'' src='./foto_top/$id_reklama[1]/$name_file[1]'></td><td></td>";
                                                } else {
                                                    echo "<td></td><td bgcolor='#595959' valign='top' align='center'><img  name='img_top' id='img_top'' src='./foto_top/$id_reklama[1]/$name_file[1]'></td><td></td>";
                                                }
                                            } else {
                                                echo "<td colspan='3' valign='top' align='center'></td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td bgcolor="#595959" width="457" height="100%" align="left">
                                                <br>
                                                <font class="cls_main_descr_reklama_foto">
                                                    <DIV id="imgObjText">
                                                        <?
                                                        if (@$descr) {
                                                            echo "$descr[1]";
                                                        }
                                                        ?>
                                                    </DIV>
                                                </font>

                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><img title="Стоп/Запустить" onclick="on_clik_btn_play();" id="btn_play" name="btn_play" src="img/stop.gif" alt="" width="40" height="41" border="0">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" width="450" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td class="cls_news_txt" valign="top">
                                                <?php
                                                $news = spisok_news_active();
                                                $id = sql_to_array($news, 'id');
                                                $big_descr = sql_to_array($news, 'big_descr');
                                                for ($i = 1; $i < 1 + count($id); $i++) {
                                                    if ($i > 1) {
                                                        echo "<br>";
                                                    }
                                                    echo "&nbsp; $big_descr[$i]";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" align="right">
                        <table border="0" align="right" cellpadding="0" cellspacing="0">
                            <?php


                            $r = get_fotki($id_razdel = 0, $id_avtor = 0, $id_foto = 0, $show_main_page = "Y");
                            $id_top_foto = sql_to_array($r, 'id_foto');
                            $name_litle = sql_to_array($r, 'name_litle');
                            $name_avtor = sql_to_array($r, 'name_avtor');
                            $id_avtor = sql_to_array($r, 'id_avtor');
                            $k = 0;
                            for ($i = 1; $i <= count($id_top_foto) / 2; $i++) {
                                $k++;
                                echo "<tr align='center' valign='top'>";
                                if ($k <= count($id_top_foto)) {
                                    $h = get_html_litle_top_foto($id_top_foto[$k], $name_litle[$k], $name_avtor[$k], $id_avtor[$k]);
                                    echo "<td width='120'>$h</td>";
                                }
                                echo "<td width='30'>&nbsp;</td>";
                                $k++;
                                if ($k <= count($id_top_foto)) {
                                    $h = get_html_litle_top_foto($id_top_foto[$k], $name_litle[$k], $name_avtor[$k], $id_avtor[$k]);
                                    echo "<td width='120'>$h</td>";
                                }
                                echo "</tr>";
                                if ($i == 5) {
                                    break;
                                }
                            }
                            ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" valign="top">
                        <table align="right" border="0" cellpadding="0" cellspacing="0">
                            <?php
                            $r = get_fotki($id_razdel = 0, $id_avtor = 0, $id_foto = 0, $show_main_page = "Y");
                            $id_top_foto = sql_to_array($r, 'id_foto');
                            $name_litle = sql_to_array($r, 'name_litle');
                            $name_avtor = sql_to_array($r, 'name_avtor');
                            $id_avtor = sql_to_array($r, 'id_avtor');
                            $k = 10;
                            for ($i = 1; $i <= count($id_top_foto) / 2; $i++) {
                                echo "<tr align='center' valign='top'>";
                                for ($j = 0; $j < 5; $j++) {
                                    $k++;
                                    if ($k <= count($id_top_foto)) {
                                        $h = get_html_litle_top_foto($id_top_foto[$k], $name_litle[$k], $name_avtor[$k], $id_avtor[$k]);
                                        echo "<td width='30'>&nbsp;</td><td width='120'>$h</td>";
                                    }
                                }
                                echo "</tr>";
                            }
                            ?>
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

                            