<?php

$t1 = date("H:i:s", time());
$d1 = date("d.m.Y", time());

if ($can_del == 1) {
    @unlink($f_p . $f_t . $idt);
    $my = "";
    $nt = array();
    cre_t($f_lst);
    $cf1 = file($f_p . $f_lst);
    $co = sizeof($cf1);
    for ($i = 0; $i < $co; $i++) {
        list($n_m, $tm_m, $tmp) = split('[|]', $cf1[$i]);
        if ($tm_m != $idt) {
            array_push($nt, $cf1[$i]);
        } else {
            list($n_m, $tm_m, $t_t, $v_m, $dt_m) = split('[|]', trim($cf1[$i]));
            $my = $v_m;
        }
    }
    $co = sizeof($nt);

    if ($co == 0) {
        $cfp1 = fopen($f_p . $f_lst, "w");
        @fflush($cfp1);
        fclose($cfp1);
    } else {
        $fl_ok = 0;
        while ($fl_ok == 0) {
            $cfp1 = fopen($f_p . $f_lst, "w");
            for ($i = 0; $i < $co; $i++) {
                fputs($cfp1, $nt[$i]);
            }
            @fflush($cfp1);
            fclose($cfp1);
            $fl_ok = filesize($f_p . $f_lst);
        }
    }
    del_t($f_lst);
}

$a = 'll';
?>
