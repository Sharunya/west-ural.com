<?php

//Выдает код для построения верхней части админ интерфейса
function get_top_admin_code()
{
    $rez = "<html>
        <head>
         <title>Администрирование сайта</title>
            <META HTTP-EQUIV='Expires' CONTENT='0'>
            <META HTTP-EQUIV='Pragma' CONTENET='nocashe'>
            <meta http-equiv='Content-Type' content='text/html; charset=windows-1251'>
            <meta name='author' content='Глумов Федор' />
            <meta name='description' content='Пермь. Фотоагентство Западный Урал предлагает широкий спектр услуг фотографии, рекламная съёмка.  Среди авторов агентства – известные фотомастера, лауреаты и призёры российских и международных выставок и конкурсов, профессиональные репортёры и фотохудожники.' />
            <meta name='keywords' content='Фотоагентство, Западный Урал, фотографии, реклама, фотостудия, фотомастера, Пермь, съёмка, фотография, фотобанк, фотографы, организация съемок' />
            <link href='main.css' rel='stylesheet' type='text/css' >
         </head>
        <body topmargin='0' bgcolor='#C0C0C0'>
		<a href='./main_admin.php' >Фотобанк</a>&nbsp;
		<a href='./admin_main_foto.php' >Рекламные фотографии</a>&nbsp;
		<a href='./admin_news.php' >Новости</a>&nbsp;
		";
    return $rez;
}

//Выдает код для построения нижней части админ интерфейса
function get_bottom_admin_code()
{
    $rez = "</body>
        </html>";
    return $rez;
}

//выдает html код авторской фотографии для главной страницы
function get_html_litle_top_foto($id_top_foto, $name_litle, $name_avtor, $id_avtor)
{
    $sss = "./foto_litle/" . $id_top_foto . "/" . $name_litle;
    /*
    $im=GetImageSize($sss);
    if ($im[1]<$im[0]){
    $r='<table border="0" cellpadding="0" cellspacing="0" align="center" width="114" height="114">
        <tr height="50%">
         <td bgcolor="#545454" width="95%"></td>
         <td bgcolor="#808080"></td>
        </tr>
        <tr>
         <td colspan="2" align="center"><img src="./foto_litle/'.$id_top_foto.'/'.$name_litle.'"></td>
        </tr>
        <tr height="50%">
         <td bgcolor="#545454"></td>
         <td bgcolor="#808080"></td>
        </tr>
       </table>';
       }
    if ($im[1]>$im[0]){
    $h=$im[1]-100;
    $h=12;
    $r='
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="114" height="114">
<tr height="'.$h.'">
   <td bgcolor="#545454" width="50%"> </td>
   <td rowspan="2"><img src="./foto_litle/'.$id_top_foto.'/'.$name_litle.'"></td>
   <td bgcolor="#545454" width="50%"> </td>
</tr>
<tr>
   <td></td>
   <td></td>
</tr>
</table>
    ';
       }
       */
    $s = $name_avtor;
    $k = strpos(" ", $s, 0);
    if ($k > 0) {
        $s = substr($s, 1, $k);

    }
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == " ") {
            $s = substr($s, 0, $i) . "<br>" . substr($s, $i + 1, strlen($s) - $i);
            break;
        }
    }
    $name_foto = './foto_litle/' . $id_top_foto . '/' . $name_litle;
    $r = '
	   <table border="0" cellpadding="0" cellspacing="0" align="center"><tr><td>
	    <div name="div_form">
	    <table bgcolor="#545454" border="0" cellpadding="0" cellspacing="0" align="center" width="120" height="120">
		 <tr width="120" height="120">
		  <td valign="middle" align="center" width="120" height="120"><a href="show_foto.php?select_id_avtor=' . $id_avtor . '" class="cls_main_avtors"><img border="0" src="' . $name_foto . '"></a></td>
		 </tr>
	    </table></td></tr><tr><td align="center">
	    </div>';
    $r = $r . '<font class="cls_main_avtors">' . $s . '</font>';
    $r = $r . "</td></tr><tr><td height='10'></td></tr></table>";
    return $r;
}


function build_main_menu($str_poisk = "", $select_url = "")
{
    $m1[1] = "Главная";
    $m1[2] = "Презентация";
    $m1[3] = "Контакты";
    $m1[4] = "Форум";

    $m2[1] = "index.php";
    $m2[2] = "presents.php";
    $m2[3] = "kontakts.php";
    $m2[4] = "./spforum/";

    echo '
	<table cellspacing="0" cellpadding="0" border="0">
	  <tr>';

    for ($i = 1; $i <= 3; $i++) {
        if (($select_url == $m2[4]) && ($i < 4)) {
            $m2[$i] = "../" . $m2[$i];
        }
        if ($select_url != $m2[$i]) {
            echo '<td class="cls_main_menu" style="cursor:pointer';
            echo '" OnMouseDown="';
            echo "location.href='$m2[$i]'";
            echo '"  >';
            echo "$m1[$i]";
            echo '</td>';
        } else {
            echo "<td class='cls_main_menu' style='color: #eff'>$m1[$i]</td>";
        }
        echo "<td width='10'></td>";
    }
    echo '<td class="cls_main_menu">
	 <table align="center" border="0" cellpadding="0" cellspacing="0">
	 <form action="show_foto.php" method="get" id="frm_poisk" name="frm_poisk">
	  <tr>
	   <td valign="top"><input border="0" class="cls_box_poisk" type="Text" name="str_poisk" value="';
    echo "$str_poisk";
    echo '"></td>
	    <td align="right" valign="top" class="cls_1"><img title="Поиск" src="';
    if (($select_url == $m2[4])) {
        echo "../";
    }
    echo 'img/poisk.gif" onclick="frm_poisk.submit()" border="0"></td>
	  </tr>
	  </form>
	 </table>
	   </td>
	  </tr>
	 </table>';
}

function build_menu_foto_bank($select_id_razdel)
{
    echo '
	<table border="0" cellpadding="0" cellspacing="0">';
    $r = get_razdel(-1, "Y");
    $id_razdel = sql_to_array($r, 'id_razdel');
    //$id_razdel[0]=-1;
    $name = sql_to_array($r, 'name');
    //  $name[0]="Фотобанк";
    for ($i = 1; $i <= count($id_razdel); $i++) {
        echo "<tr height='40' class='cls_main_kat'>";
        $f = 1;
        if (@$select_id_razdel) {
            if ($select_id_razdel == $id_razdel[$i]) {
                $f = 0;
                echo "<td  align='left' class='cls_main_kat'><font color='white'>$name[$i]</font></td>";
            }
        }
        if ($f == 1) {
            echo '<td  align="left" class="cls_main_kat" style=CURSOR:pointer; onmouseover="this.style.color=';
            echo "'white';";
            echo '" onmouseout="this.style.color=';
            echo "'black';";
            echo '" OnMouseDown="';
            echo "location.href='show_foto.php?select_id_razdel=$id_razdel[$i]'";
            echo '"  >';
            echo "$name[$i]";
            echo '</td>';
        }

        echo "</tr>";

    }
    echo '</table>';
}

function build_kontakt_data()
{
    echo '
 <div border="0" style="font-size: 9pt; margin-top: 38px;">
    <i>
    Все права защищены &copy; 2008 г. Фотоагентство "Западный Урал", Пермь
	<br>
	Дизайн Марины Долматовой, <a href="http://www.kaidev.ru/">реализация KAI Development</a>
	<br>
	E-mail: <a href="mailto:WesternUralPhoto@mail.ru">WesternUralPhoto@mail.ru</a>  Тел. 8-912-888-35-38,  8-912-98-530-33
	</i>
 </div>';
}

?>
