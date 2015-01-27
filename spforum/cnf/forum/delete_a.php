<?php

$t1 = date("H:i:s", time());
$d1 = date("d.m.Y", time());

$ida = '';
if (isset($_GET['ida'])) {
    $ida = $_GET['ida'];
}
if (isset($_POST['ida'])) {
    $ida = $_POST['ida'];
}
if (!is_string($ida)) {
    unset($ida);
    $a = 'll';
} else {
    $ida = ereg_replace("[^0-9]", "", $ida);
}

cre_t($idt);
$f = @file($f_p . $f_t . $idt);
list($t_h, $tmp) = split('[|]', $f[0]);
del_t($idt);
unset($f);

if ($can_del == 1) {
    $my = "";
    $nt = array();
    cre_t($idt);
    $cf1 = file($f_p . $f_t . $idt);
    $co = sizeof($cf1);
    for ($i = 0; $i < $co; $i++) {
        list($n_m, $tm_m, $tmp) = split('[|]', $cf1[$i]);
        if ($tm_m != $ida) {
            array_push($nt, $cf1[$i]);
        } else {
            list($n_m, $tm_m, $t_m, $v_m, $dt_m) = split('[|]', trim($cf1[$i]));
            $my = $n_m . ": " . $v_m . " [" . $dt_m . "]";
        }
    }
    $co = sizeof($nt);

    $fl_ok = 0;
    while ($fl_ok == 0) {
        $cfp1 = fopen($f_p . $f_t . $idt, "w");
        for ($i = 0; $i < $co; $i++) {
            fputs($cfp1, $nt[$i]);
        }
        @fflush($cfp1);
        fclose($cfp1);
        $fl_ok = filesize($f_p . $f_t . $idt);
    }
    del_t($idt);

    $my_w = -1;

    $c = floor(($co - 1 + $cnt_a_on_t) / $cnt_a_on_t - 0.06);
    if ($p > $c) {
        $p = $c;
    }
}

$a = 'lt';
?>
