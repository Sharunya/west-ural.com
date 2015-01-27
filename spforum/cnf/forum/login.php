<?php

$name = '';
$id = '';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (!isset($_POST['c'])) {
    SetCookie("id", "");
}

if (($id == '') && ($name == '')) {
    ?>
    <html>
    <head><title>форум</title>
        <META content='text/html; charset=windows-1251' http-equiv='Content-Type'>
        <style>
            a { text-decoration: none; color: #0077dd; }

            a:hover { text-decoration: underline; color: #eeeeff; }

            body { font-family: Tahoma; font-size: 13px; color: #c0c0cc; }

            .c1 { width: 200; BACKGROUND-COLOR: #000000; border: thin; color: #a6a96C; BORDER-BOTTOM: #999999 1px outset; BORDER-LEFT: #999999 1px outset; BORDER-RIGHT: #999999 2px outset; BORDER-TOP: #999999 1px outset; }

            input { font-size: 11px; }
        </style>
    </head>

    <body bgcolor="black">

    <script language='JavaScript'>
        <!--//
        function f_3()
        {
            document.enterforum.logsubmit.disabled = true;
        }
        //-->
    </script>

    <center>
        Администрирование <a href="index.php">форума</a><br>

        <form name=enterforum action=index.php method=post onSubmit='f_3(); return true;'>
            <input type=hidden name=a value='lg'>
            <input type=hidden name=c value='1'>
            <table border=0 cellpadding=0 cellspacing=0>
                <tr>
                    <td><img src=img/login.gif width=15 height=12 border=0 valign=center alt='Авторизация на форуме'></td>
                    <td>
                        Логин <input name=name class=c1 value='' type=text style='width:100'>&nbsp;&nbsp;
                        Пароль <input name=pasw class=c1 value='' type=password style='width:100'>
                        <input name=logsubmit class=c1 value='<--' type=submit style='width:30; cursor:hand;'>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <?php
    exit;

} else {
    if (!is_string($name)) {
        unset($name);
        $a = 'll';
    }
    $name = ereg_replace("[^a-zA-Z0-9_]", "", $name);
    $pasw = '';
    if (isset($_GET['pasw'])) {
        $pasw = $_GET['pasw'];
    }
    if (isset($_POST['pasw'])) {
        $pasw = $_POST['pasw'];
    }
    if (!is_string($pasw)) {
        unset($pasw);
        $pasw = '';
    }

    if (strlen($name) > 15) {
        $name = '+++';
    }
    if (strlen($pasw) > 15) {
        $pasw = '+++';
    }

    if (($ad == $name) && ($pasw == $adps)) {
        $id = md5($adps . date("d", time() . md5($ad)));
        SetCookie("id", $id);
    } else {
        SetCookie("id", "");
    }

    #--Удаляем старые темы форума (которые не изменялись 20 дней...)--#
    $n_f = array();
    cre_t("forum");
    $cf1 = file($f_p . $f_lst);

    $co = sizeof($cf1);
    for ($i = 0; $i < $co; $i++) {
        list($n_m, $tm_m, $t_t, $v_m, $tmp) = split('[|]', $cf1[$i]);
        $f_nn = $f_p . $f_t . $tm_m;
        $ft = @filemtime($f_nn);
        @clearstatcache($f_nn);
        $tt = time();
        if (($tt - $ft) > $fr_p) {
            @unlink($f_nn);
        } else {
            array_push($n_f, $cf1[$i]);
        }
    }
    $co = sizeof($n_f);
    if ($co == 0) {
        $cfp1 = fopen($f_p . $f_lst, "w");
        @fflush($cfp1);
        fclose($cfp1);
    } else {
        $fl_ok = 0;
        while ($fl_ok == 0) {
            $cfp1 = fopen($f_p . $f_lst, "w");
            for ($i = 0; $i < $co; $i++) {
                fputs($cfp1, $n_f[$i]);
            }
            @fflush($cfp1);
            fclose($cfp1);
            $fl_ok = filesize($f_p . $f_lst);
        }
    }
    del_t("forum");
    ?>
    <html>
    <head><title>форум</title>
        <META content='text/html; charset=windows-1251' http-equiv='Content-Type'>
        <style>
            a { text-decoration: none; color: #0077dd; }

            a:hover { text-decoration: underline; color: #eeeeff; }

            body { font-family: Tahoma; font-size: 13px; color: #c0c0cc; }
        </style>
    </head>

    <body bgcolor="black">
    <center><a href="index.php">перейти на форум</a></center>
    </body>
    </html>
    <?
    exit;
}

?>