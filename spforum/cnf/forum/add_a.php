<?php

$mess = '';
if (isset($_POST['mess'])) {
    $mess = $_POST['mess'];
}
$mess = Add_Smile2(substr(del_bw(f_c_m_s($mess), 80), 0, $len_mess + 10));

if (strlen($mess) > 1) {
    $t1 = date("H:i:s", time());
    $d1 = date("d.m.Y", time());
    $m_s = $name . '|' . time() . '|0|' . $mess . '|' . $t1 . ' ' . $d1 . "\n";

    cre_t($idt);
    $cf1 = @file($f_p . $f_t . $idt);
    $co = sizeof($cf1);
    list($t_h, $tmp) = split('[|]', $cf1[0]);

    $fl_ok = 0;
    while ($fl_ok == 0) {
        $cfp1 = fopen($f_p . $f_t . $idt, "w");
        for ($i = 0; $i < $co; $i++) {
            fputs($cfp1, $cf1[$i]);
        }
        fputs($cfp1, $m_s);
        @fflush($cfp1);
        fclose($cfp1);
        $fl_ok = filesize($f_p . $f_t . $idt);
    }
    del_t($idt);
    $my_w = 1;
    if ($p != 0) {
        $p = floor(($co + $cnt_a_on_t - 1) / $cnt_a_on_t);
    }
}

//header("Location: index.php?id=".$id."&a=lt&idt=".$idt."&p=".$p);

$a = 'lt';
?>
