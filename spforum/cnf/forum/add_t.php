<?php

$t1 = date("H:i:s", time());
$d1 = date("d.m.Y", time());
$mess = '';
if (isset($_POST['mess'])) {
    $mess = $_POST['mess'];
}
$mess = substr(del_bw(f_c_m_s($mess), 80), 0, $len_title + 10);


if (substr_count($mess, "&lt") == 0) {
    if (substr_count($mess, ">") == 0) {
        if (substr_count($mess, "<") == 0) {
            if (substr_count(strtoupper($mess), "ÏÎÐÍÎ") == 0) {
                if (substr_count(strtoupper($mess), "ÑÅÊÑ") == 0) {
                    if (substr_count(strtoupper($mess), "HREF") == 0) {

                        $tt = 1;
                        if (isset($_POST['tt'])) {
                            $tt = $_POST['tt'];
                        }
                        if (($tt > 4) || ($tt < 1)) {
                            $tt = 1;
                        }

                        if ((strlen($mess) > 1) && ($name != '+++')) {
                            $mt = time();
                            $m_s = "$name|" . $mt . "|$tt|$mess|$t1 $d1|$t1 $d1|0|0\n";

                            cre_t($f_lst);
                            $cf1 = @file($f_p . $f_lst);
                            $co = sizeof($cf1);

                            $fl_ok = 0;
                            while ($fl_ok == 0) {
                                $cfp1 = fopen($f_p . $f_lst, "w");
                                fputs($cfp1, $m_s);
                                for ($i = 0; $i < $co; $i++) {
                                    fputs($cfp1, $cf1[$i]);
                                }
                                @fflush($cfp1);
                                fclose($cfp1);
                                $fl_ok = filesize($f_p . $f_lst);
                            }

                            del_t($f_lst);

                            $fl_ok = 0;
                            while ($fl_ok == 0) {
                                $cfp2 = fopen($f_p . $f_t . $mt, "w");
                                fputs($cfp2, $m_s);
                                @fflush($cfp2);
                                fclose($cfp2);
                                $fl_ok = filesize($f_p . $f_t . $mt);
                            }
                            @chmod($f_p . $f_t . $mt, 0666);
                        }
                    }
                }
            }
        }
    }
}
//header("Location: index.php?id=".$id);

$a = 'll';
?>