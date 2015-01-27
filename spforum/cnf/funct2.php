<?php
function c_m_s($s)
{
    return trim(stripslashes(str_replace("`", '', str_replace("\n", ' ', str_replace("|", '_', htmlspecialchars($s, ENT_QUOTES))))));
}

function c_m_s2($s)
{
    return ereg_replace("[^a-zA-Z0-9_]", "", $s);
}

function c_m_s3($s)
{
    return ereg_replace("[^a-z0-9_]", "", $s);
}

function c_m_s4($s)
{
    return preg_replace("/([\x01-\x19])/e", "", $s);
}


function cre_t($fl_nm)
{
    global $tmp_p;
    $trp_p = 99;
    $present = 1;
    $fname = $tmp_p . "tmp_" . $fl_nm;
    while ($present == 1) {
        $i = 0;
        $j = rand(2000, 5500);
        while ($i < $j) {
            $i++;
        }

        if (!file_exists($fname)) {
            $mf = @fopen($fname, "w");
            @fflush($mf);
            @fclose($mf);
            $present = 0;
        } else {
            if ((time() - @filemtime($fname)) > $trp_p) {
                @unlink($fname);
            }
        }
        @clearstatcache($fname);
    }
    return 1;
}

function del_t($fl_nm)
{
    global $tmp_p;
    @unlink($tmp_p . "tmp_" . $fl_nm);
}


# проверка сообщений для форума
function f_c_m_s($se)
{
    $se = chop($se);

    $se = str_replace("&#", "&amp;#", $se);
    $se = str_replace("\n", "[br]", $se);
    $se = str_replace("\t", " ", $se);
    $se = str_replace("\r", " ", $se);
    $se = str_replace("\a", "", $se);
    $se = str_replace("\e", "", $se);
    $se = str_replace("\A", "", $se);
    $se = preg_replace("/([\x01-\x19])/e", "", $se);
    $se = str_replace("|", "_", $se);
    $se = str_replace("\"", "&quot;", $se);
    $se = str_replace("\'", "&quot;", $se);
    $se = str_replace("  ", " ", $se);
    $se = str_replace("  ", " ", $se);
    $se = str_replace(">", "&gt;", $se);
    $se = str_replace("<", "&lt;", $se);
    $se = str_replace("[br]", "<br>", $se);
    $se = stripslashes($se);
    $se = chop($se);
    return $se;
}

# увеличиваем количество просмотров и ответов в теме
function add_n($code, $r, $w, $mdt)
{
    global $f_p;
    global $f_lst;

    $f3 = array();
    cre_t($f_lst);
    $f = file($f_p . $f_lst);
    $co = sizeof($f);
    for ($i = 0; $i < $co; $i++) {
        list($n_m, $tm_m, $t_t, $v_m, $dt_m, $mdt2, $r_m, $w_m) = split('[|]', trim($f[$i]));
        if ($tm_m == $code) {
            $r_m = $r_m + $r;
            $w_m = $w_m + $w;
            if ($w == 0) {
                $mdt = $mdt2;
            }
            $s = "$n_m|$tm_m|$t_t|$v_m|$dt_m|$mdt|$r_m|$w_m\n";
            if ($w != 0) {
                array_unshift($f3, $s);
            } else {
                array_push($f3, $s);
            }
        } else {
            array_push($f3, $f[$i]);
        }
    }
    unset($f);
    $co = sizeof($f3);
    if ($co == 0) {
        $f2 = fopen($f_p . $f_lst, "w");
        @fflush($f2);
        fclose($f2);
    } else {
        $fl_ok = 0;
        while ($fl_ok == 0) {
            $f2 = fopen($f_p . $f_lst, "w");
            for ($i = 0; $i < $co; $i++) {
                fputs($f2, $f3[$i]);
            }
            @fflush($f2);
            fclose($f2);
            $fl_ok = filesize($f_p . $f_lst);
        }
    }
    unset($f2);
    unset($f3);
    del_t($f_lst);
    return 1;
}


# разрезание длинной строки на маленькие
function del_bw($s, $msl)
{
    $w_a = split('[ ]', $s);
    $ms = '';
    $co = sizeof($w_a);
    for ($i = 0; $i < $co; $i++) {
        $j = strlen($w_a[$i]);
        if ($j < $msl) {
            $ms .= ' ' . $w_a[$i];
        } else {
            # режем строку на маленькие
            $k = 0;
            $s1 = '';
            $k1 = 0;
            while ($k < $j) {
                if ($k1 == $msl) {
                    $k1 = 0;
                    $s1 .= ' ';
                }
                $s1 .= $w_a[$i]{$k};
                $k++;
                $k1++;
            }
            $ms .= $s1;
        }
    }
    return $ms;
}

# Заменяем смайлики левой панели:)
function Add_Smile2($sa)
{
    $sa = str_replace("[:#]", "<img src=img/s/1.gif> ", $sa);
    $sa = str_replace("[:o)]", "<img src=img/s/2.gif> ", $sa);
    $sa = str_replace("[*)]", "<img src=img/s/3.gif> ", $sa);
    $sa = str_replace("[:(]", "<img src=img/s/4.gif> ", $sa);
    $sa = str_replace("[:*(]", "<img src=img/s/5.gif> ", $sa);
    $sa = str_replace("[:)-]", "<img src=img/s/6.gif> ", $sa);
    $sa = str_replace("[:-(]", "<img src=img/s/7.gif> ", $sa);
    $sa = str_replace("[???]", "<img src=img/s/8.gif> ", $sa);
    $sa = str_replace("[:O)]", "<img src=img/s/9.gif> ", $sa);
    $sa = str_replace("[:)]", "<img src=img/s/10.gif> ", $sa);
    $sa = str_replace("[8*]", "<img src=img/s/11.gif> ", $sa);
    $sa = str_replace("[:=(]", "<img src=img/s/12.gif> ", $sa);
    $sa = str_replace("[;-]", "<img src=img/s/13.gif> ", $sa);
    $sa = str_replace("[.)]", "<img src=img/s/14.gif> ", $sa);
    $sa = str_replace("[::]", "<img src=img/s/15.gif> ", $sa);
    $sa = str_replace("[##]", "<img src=img/s/16.gif> ", $sa);
    $sa = str_replace("[))]", "<img src=img/s/17.gif> ", $sa);
    $sa = str_replace("[+)]", "<img src=img/s/18.gif> ", $sa);
    $sa = str_replace("[+$]", "<img src=img/s/22.gif> ", $sa);
    $sa = str_replace("[+:+]", "<img src=img/s/24.gif> ", $sa);
    $sa = str_replace("[+=]", "<img src=img/s/25.gif> ", $sa);
    $sa = str_replace("[+:=]", "<img src=img/s/26.gif> ", $sa);
    $sa = str_replace("[+:]", "<img src=img/s/27.gif> ", $sa);
    return $sa;
}

?>
