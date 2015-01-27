<?php
$d1 = date("d.m.Y", time());
?>
<table width=95% border=0 cellpadding=4 cellspacing=0>
<tr>
 <td width=20>&nbsp;</td>
 <td><font class="cls_forum_top_title">ТЕМА</font></td>
 <td width=110>&nbsp;<font class="cls_forum_top_title" >АВТОР</font></td>
 <td width=122>&nbsp;<font class="cls_forum_top_title">ОБНОВЛЕНИЕ</font></td>
 <td width=10>&nbsp;</td>
</tr>
</table>

<?php

cre_t("forum");
$cf1 = @file($f_p . $f_lst);
del_t("forum");
$co = sizeof($cf1);
for ($i = 0; $i < $co; $i++) {
    list($n_m, $tm_m, $t_t, $v_m, $dt_m, $dt2_m, $r_m, $w_m) = split('[|]', trim($cf1[$i]));
    list($t_1, $d_1) = split('[ ]', $dt2_m);
    if ($d1 == $d_1) {
        $dt2_m = "сегодня - " . $t_1;
    }
    $glb_l = 'index.php?a=lt&idt=' . $tm_m . '&id=' . $id;
    ?>
    <table width=95% border=0 cellpadding=4 cellspacing=0>
    <tr>
        <td width=20><img src=img/frm_0<?php echo $t_t; ?>.gif></td>
        <td>
            <a href='<?php echo $glb_l; ?>&p=1' title=' Эта тема создана: <?php echo $dt_m; ?> &#13 Просмотры: <?php echo $r_m; ?>   Ответы: <?php echo $w_m; ?>'><font class="cls_forum_list_tem"><?php echo trim($v_m); ?></font></a>
            <br><font color=#9fa1b7>Страницы:
                <?php
                $x = floor(($w_m - 1) / $cnt_a_on_t) + 1;
                if ($w_m == 0) {
                    $x = 1;
                }
                if ($x <= 4) {
                    for ($xi = 1; $xi <= $x; $xi++) {
                        my_pages($glb_l, $xi);
                    }
                } else {
                    my_pages($glb_l, 1);
                    my_pages($glb_l, 2);
                    my_pages($glb_l, 3);
                    echo '...&nbsp; ';
                    my_pages($glb_l, $x);
                }
                ?></font></td>
        <td width=110><font style='font-size: 12px;'>&nbsp;<?php echo trim($n_m); ?></font></td>
        <td width=122><font style='font-size: 12px;'>&nbsp;<?php echo $dt2_m; ?></font></td>
        <td width=10><?php if ($can_del == 1) {
                echo '<a align=right href=index.php?a=dt&idt=' . $tm_m . '&id=' . $id . '><img src=img/delete.gif alt="удалить тему" border=0 width=8 height=8></a>';
            } else {
                echo '&nbsp;';
            } ?></td>
    </tr>
    </table><?php
}
?>
<table width=90% border=0 cellpadding=4 cellspacing=0>
<tr>
 <td width=20>&nbsp;</td>
 <td align="right"><font class=c2 style='font-size: 10px;'>
<a href="index.php?a=lg">администратор</a></font></td>
</tr>
</table>
<?php

if ($name == '+++') {
    $logged = 0;
}
if ($logged == 1) { ?>

<script language='JavaScript'>
<!--
function textKey(){
 var ff = document.forms.item('add_t');
 ff.llen.value = <?php echo $len_title; ?> - ff.mess.value.length;
 if( ff.mess.value.length > <?php echo $len_title; ?> ){
  ff.mess.value = ff.mess.value.substr( 0, <?php echo $len_title; ?>);
 }
}
//-->
</script>

<script language='JavaScript'>
<!--// 
function f_1(){
 document.add_t.p_send.disabled = true;
}
//-->
</script>

<form name=add_t action=index.php method=post onSubmit='f_1(); return true;'>
<input name=id value='<?php echo $id; ?>' type=hidden>
<input name=a value='at' type=hidden>
Создайте свою тему:<br>
Тип темы: <input type=radio name=tt value=1 checked>обычная&nbsp;
<input type=radio name=tt value=2>о форуме&nbsp;
<input type=radio name=tt value=3>вопрос&nbsp;
<input type=radio name=tt value=4>поздравление<br>
Ваше имя: <input name="name" class="cls_box_forum" size=50 style="WIDTH: 200px;" value="<?php echo $name; ?>">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Осталось: &nbsp;<input name=llen readOnly class="cls_box_forum" size=2 style='WIDTH: 40px' value="<?php echo $len_title; ?>"><br>
<textarea name=mess class="cls_box_forum" style="width:400px;" rows=4 cols=20 wrap='soft' onkeyup=textKey();></textarea><br>
<input class=c3 value="создать тему" type=submit style="cursor:hand;" name=p_send>
</form>
</center>
<?php
}

?>