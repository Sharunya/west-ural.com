<?php

$t1 = date("H:i:s", time());
$d1 = date("d.m.Y", time());

$my_r = 1;// смотрим
add_n($idt, $my_r, $my_w, "$t1 $d1");

if (file_exists($f_p . $f_t . $idt)) {
    cre_t("forum");
    $cf1 = @file($f_p . $f_t . $idt);
    del_t("forum");
    list($t_h, $tmp) = split('[|]', $cf1[0]);
// if ($name==$t_h){$can_del=1;}

    $co = sizeof($cf1);
    $co2 = $co - 1;
    echo 'Всего ответов: ' . ($co - 1) . '<hr width=640 size=1 color=#445577>';
    list($n_m, $tm_m, $t_tm, $v_m, $dt_m) = split('[|]', trim($cf1[0]));
    ?>
    <table width=640>
    <tr>
        <td><font color=#eeee55 face=Georgia style='font-size: 18px;'><?php echo $v_m; ?></font></td>
    </tr></table><?php
    echo '<hr width=640 size=1 color=#445577>';

    if ($p == 0) {
        $c_s = 0;
        $c_e = $co;
    } else {
        $c_s = ($p - 1) * $cnt_a_on_t + 1;
        $c_e = ($p) * $cnt_a_on_t;
    }
    if ($c_s == 1) {
        $c_s = 0;
    }
    list($n_m, $tm_m, $v_m, $dt_m) = split('[|]', trim($cf1[0]));
    $glb_l = 'index.php?a=lt&idt=' . $tm_m . '&id=' . $id;
    echo '<table width=640><tr><td><a href=' . $glb_l . '&p=0>Вся тема</a>';
    $m_c = floor(($co2 - 1) / $cnt_a_on_t) + 1;
    if ($co2 == 0) {
        $m_c = 1;
    }
    for ($j = 1; $j <= $m_c; $j++) {
        if ($p == $j) {
            echo " : " . $j;
        } else {
            echo ' : <a href=' . $glb_l . '&p=' . $j . '>' . $j . '</a>';
        }
    }
    echo '</td></tr></table>';
    for ($i = 1; $i < $co; $i++) {
        list($n_m, $tm_m, $t_tm, $v_m, $dt_m) = split('[|]', trim($cf1[$i]));
        if (($i >= $c_s) && ($i <= $c_e)) {
            echo '<hr width=640 size=1 color=#445577><table width=640><tr><td><strong>';
            if ($i == 0) { ?><font color=#eeee55><?php } else {
                echo '<font color=#aadada>';
            }
            echo '<font face=Times>' . $n_m . '</font></strong>: ' . $v_m;
            if ($i == 0) {
                echo '</font>';
            }
            echo '<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td align=left><font face=Times>[' . $dt_m . ']</font></td> ';
            if (($can_del == 1) && ($i > 0)) {
                echo '<td align=right>[<a href=index.php?id=' . $id . '&idt=' . $idt . '&p=' . $p . '&a=da&ida=' . $tm_m . '><img src=img/delete.gif  alt="удалить ответ" border=0 width=8 height=8></a>]</td>';
            }
            echo '</tr></table></td></tr></table>';
        }
    }
    echo '<hr width=640 size=1 color=#445577>';

    if ($p == 0) {
        $c_s = 0;
        $c_e = $co;
    } else {
        $c_s = ($p - 1) * $cnt_a_on_t + 1;
        $c_e = ($p) * $cnt_a_on_t;
    }
    if ($c_s == 1) {
        $c_s = 0;
    }
    list($n_m, $tm_m, $v_m, $dt_m) = split('[|]', trim($cf1[0]));
    $glb_l = 'index.php?a=lt&idt=' . $tm_m . '&id=' . $id;
    echo '<table width=640><tr><td><a href=' . $glb_l . '&p=0>Вся тема</a>';
    $m_c = floor(($co2 - 1) / $cnt_a_on_t) + 1;
    if ($co2 == 0) {
        $m_c = 1;
    }
    for ($j = 1; $j <= $m_c; $j++) {
        if ($p == $j) {
            echo " : " . $j;
        } else {
            echo ' : <a href=' . $glb_l . '&p=' . $j . '>' . $j . '</a>';
        }
    }
    echo '</td></tr></table>';

if ($logged == 1){ ?>
    <center><br>
    <script language='JavaScript'>
        <!--
        function textKey()
        {
            var ff = document.forms.item('add_a');
            ff.llen.value = <?php echo $len_mess; ?> -ff.mess.value.length;
            if (ff.mess.value.length > <?php echo $len_mess; ?>) {
                ff.mess.value = ff.mess.value.substr(0, <?php echo $len_mess; ?>);
            }
        }

        function addSmile(code)
        {
            mystr = '';
            if (code == 1) {
                mystr = ' [:#]';
            }
            if (code == 2) {
                mystr = ' [:o)]';
            }
            if (code == 3) {
                mystr = ' [*)]';
            }
            if (code == 4) {
                mystr = ' [:(]';
            }
            if (code == 5) {
                mystr = ' [:*(]';
            }
            if (code == 6) {
                mystr = ' [:)-]';
            }
            if (code == 7) {
                mystr = ' [:-(]';
            }
            if (code == 8) {
                mystr = ' [???]';
            }
            if (code == 9) {
                mystr = ' [:O)]';
            }
            if (code == 10) {
                mystr = ' [:)]';
            }
            if (code == 11) {
                mystr = ' [8*]';
            }
            if (code == 12) {
                mystr = ' [:=(]';
            }
            if (code == 13) {
                mystr = ' [;-]';
            }
            if (code == 14) {
                mystr = ' [.)]';
            }
            if (code == 15) {
                mystr = ' [::]';
            }
            if (code == 16) {
                mystr = ' [##]';
            }
            if (code == 17) {
                mystr = ' [))]';
            }
            if (code == 18) {
                mystr = ' [+)]';
            }
            if (code == 22) {
                mystr = ' [+$]';
            }
            var bf = parent.add_a.mess;
            bf.focus();
            bf.value = bf.value + mystr;
        }
        //-->

    </script>

    <script language='JavaScript'>
        <!--//
        function f_2()
        {
            document.add_a.p_send.disabled = true;
        }
        //-->
    </script>

    <form name=add_a action=index.php method=post onSubmit='f_2(); return true;'>
        Ваш ответ в теме<br>
        <table border=0 cellpadding=5 cellspacing=0>
            <tr>
                <td>

                    <center>
                        &nbsp;<img src=img/s/2.gif border=0 height=15 onClick='addSmile(2)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/14.gif border=0 height=15 onClick='addSmile(14)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/9.gif border=0 height=15 onClick='addSmile(9)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/10.gif border=0 height=15 onClick='addSmile(10)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/3.gif border=0 height=15 onClick='addSmile(3)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/13.gif border=0 height=15 onClick='addSmile(13)' style='cursor:hand;'>
                        <br>
                        &nbsp;<img src=img/s/7.gif border=0 height=15 onClick='addSmile(7)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/11.gif border=0 height=15 onClick='addSmile(11)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/4.gif border=0 height=15 onClick='addSmile(4)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/5.gif border=0 height=15 onClick='addSmile(5)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/6.gif border=0 height=15 onClick='addSmile(6)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/12.gif border=0 height=15 onClick='addSmile(12)' style='cursor:hand;'>
                        <br>
                        <img src=img/s/22.gif border=0 height=18 onClick='addSmile(22)' style='cursor:hand;'>
                        <img src=img/s/17.gif border=0 height=15 onClick='addSmile(17)' style='cursor:hand;'>
                        &nbsp;<img src=img/s/8.gif border=0 onClick='addSmile(8)' style='cursor:hand;'>
                        <img src=img/s/1.gif border=0 height=20 onClick='addSmile(1)' style='cursor:hand;'>
                        <img src=img/s/15.gif border=0 height=23 onClick='addSmile(15)' style='cursor:hand;'>
                        <img src=img/s/16.gif border=0 height=18 onClick='addSmile(16)' style='cursor:hand;'>
                    </center>

                </td>
                <td>
                    Имя: <input name="name" class=c3 size=50 style="WIDTH: 200px;" value="<?php echo $name; ?>">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Осталось: &nbsp;<input name=llen readOnly class=c3 size=2 style='WIDTH: 40px' value="<?php echo $len_mess; ?>"><br>
                    <textarea name=mess class=c3 style="width:400px;" rows=5 cols=20 wrap='soft' onkeyup=textKey();></textarea>
                </td>
            </tr>
        </table>

        <input class=c3 value="ответить" type=submit style="cursor:hand;" name=p_send>
        <br>
        <input name=id value='<?php echo $id; ?>' type=hidden>
        <input name=idt value='<?php echo $idt; ?>' type=hidden>
        <input name=a value='aa' type=hidden>
        <input name=p value='<? echo $p; ?>' type=hidden>
    </form>
<?php
}
    ?>
    <form name=lookl action=index.php method=get>
        <input name=id value='<?php echo $id; ?>' type=hidden>
        <input name=a value='ll' type=hidden>
        <input class=c3 value="перейти к списку тем" type=submit style="cursor:hand; width: 200px;">
    </form></center>
<?php
} else {
    $a = 'll';
}


?>