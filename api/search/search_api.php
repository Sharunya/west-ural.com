<?
/*
� ���� ������ ����������� ����� ������� ��� ������� ������

									�1
function content_poisk($poisk_word) - ������� ���������� ����� ������ �� ��������  � ������
									  ����� �������������� ��� ������ ���������� �������
									  ��� ������. 
������� ���������: $poisk_word - ����� ��� ������
�������� ��������� � ������� sql �������: content - ���������� � ������� �����, 
										  url - ��� �������� ��� �����, 
										  name - ��� ��������, 
										  descr - �������� ��������

									�2
function good_content_poisk($poisk_word) - ������� ���������� �����  �� ��������  � ������
									        ������ ���� �� ���� ����� �� ��������� �����
											��������� ����������� �� ����� ����������� ����
											�������� ������� �� ������� �� ������� �����. 
������� ���������: 
					$poisk_word - ����� ��� ������
� CSS �����:
					cls_head_rezultat_poiska - ����� ��� ���������� � �������
					cls_txt_body_rezultat_poiska - ����� ��� ����������� � �������
�������� ���������:  ������ � ���� �������� ��������� ������ � ���� �������
*/

//______________________________��� �������____________________________________

//������� ��������� sql ������ ��� ������ �� �����
//������� ���������: 
//					$poisk_word - ����� ��� ������
function Get_sql_txt_for_search($poisk_word)
{
    $m = stroka_in_masiv($poisk_word);
    $usl = "";
    for ($i = 1; $i <= count($m); $i++) {
        $usl = $usl . $m[$i] . "* ";
    }
    $poisk_word = UrlEncode($poisk_word);

    $sql_txt = "
 SELECT
   content_anti_teg as content, CONCAT(url,'?stroka_poiska=$poisk_word')as url, name, descr
from
    `t_content_poisk`,`t_web_page`
WHERE
     (`t_content_poisk`.`id_web_page`=`t_web_page`.`id`)
     AND
     (t_content_poisk.isactive='Y')
     AND
     (t_content_poisk.isimage='N')
     and
     (t_web_page.isactive='Y')
     and
     MATCH (`t_content_poisk`.`content_anti_teg`)AGAINST ('" . $usl . "' IN BOOLEAN MODE)
GROUP BY url
UNION ALL
select
   t_tovar.`name` as content,  CONCAT('prise.php?show_typ_tovar_id=',t_type_tovar.id,'&show_podtyp_id=',t_tovar.predok_id,'&stroka_poiska=$poisk_word') as url,'�����' as name, '����� ��� �� ���� ������' as descr
FROM
    t_types, t_tovar,t_type_tovar
where
    (t_types.tovar_id=t_tovar.id)
    AND
    (t_type_tovar.id=t_types.`type_id`)
    AND
    (t_type_tovar.`isactive`='Y')
    AND
    (t_tovar.`isactive`='Y')
    AND
    MATCH (t_tovar.name)AGAINST ('" . $usl . "' IN BOOLEAN MODE)
GROUP BY url
UNION ALL
select
   t_tovar.`descr` as content,  CONCAT('prise.php?show_typ_tovar_id=',t_type_tovar.id,'&show_podtyp_id=',t_tovar.predok_id,'&stroka_poiska=$poisk_word') as url,'�����' as name, '����� ��� �� ���� ������' as descr
FROM
    t_types, t_tovar,t_type_tovar
where
    (t_types.tovar_id=t_tovar.id)
    AND
    (t_type_tovar.id=t_types.`type_id`)
    AND
    (t_type_tovar.`isactive`='Y')
    AND
    (t_tovar.`isactive`='Y')
    AND
    MATCH (t_tovar.`descr`)AGAINST ('" . $usl . "' IN BOOLEAN MODE)
GROUP BY url";
    return $sql_txt;
}

//������� ������� ��������� ������ � ������� ������������
//������� ���������: 
//					$rez - ��������� sql ������� � ��, 
//					       ������ ��������� ����: 
//							content - ����������
//							url - ����� ��������
//							name - �������� ��������
//							descr - �������� ��������
//					$poisk_word - ����� �� ������� ���������� �����
function out_data_iz_poiska_v_brauzer($rez, $poisk_word)
{
    $m_name = sql_to_array($rez, "name");
    $m_descr = sql_to_array($rez, "descr");
    $m_cont = sql_to_array($rez, "content");
    $m_url = sql_to_array($rez, "url");

    if (count($m_url) == 0) {
        echo "�� ������ ������� ������ �� �������.";
    } else {
        echo "<table align='center' border='0'>";
        $m = stroka_in_masiv($poisk_word);

        for ($i = 1; $i <= count($m_url); $i++) {
            $d_min = 3;
            while ($d_min > 0) {
                for ($j = 1; $j <= count($m); $j++) {
                    $m_cont_U = str_to_upper($m_cont[$i]);
                    $m_U = str_to_upper($m[$j]);
                    if ((strpos($m_cont_U, $m_U) !== false) && (strlen($m_U) >= $d_min)) {
                        $beg = strpos($m_cont_U, $m_U);
                        $beg = $beg - 20;
                        while (($beg > 0) && ($m_cont[$i][$beg] != " ")) {
                            $beg = $beg - 1;
                        }
                        if ($beg < 0) {
                            $beg = 0;
                        }
                        $litle_descr = substr($m_cont[$i], $beg, 150);


                        for ($l = 1; $l <= count($m); $l++) {
                            $r_litle_descr = str_to_upper($litle_descr);
                            $r2 = str_to_upper($m[$l]);
                            if (strpos($r_litle_descr, $r2) !== false) {
                                $pr = strpos($r_litle_descr, $r2);
                                $srt = "";
                                for ($t = 0; $t < $pr; $t++) {
                                    $srt = $srt . $litle_descr[$t];
                                }
                                $srt = $srt . "<b>";
                                for ($t1 = $pr; $t1 - $t < strlen($m[$l]); $t1++) {
                                    $srt = $srt . $litle_descr[$t1];
                                }
                                $srt = $srt . "</b>";
                                for ($t = $t1; $t < strlen($litle_descr); $t++) {
                                    $srt = $srt . $litle_descr[$t];
                                }
                                $litle_descr = $srt;
                            }//if
                        }//for
                        $d_min = -1;
                        break;
                    }
                }
                $d_min = $d_min - 1;
            }
            echo "<tr>
		        <td rowspan='2' valign='top' align='left' width='20'>
				 $i.
				</td>
			    <td>
				 <a href='$m_url[$i]' target='_blank' class='cls_head_rezultat_poiska'>
				 $m_name[$i] - $m_descr[$i]
				 </a>
				</td>
			   </tr>
			   <tr>
			    <td>
				 <font class='cls_txt_body_rezultat_poiska'>... $litle_descr ...</font>
				</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				</tr>
			   ";
        }
        echo "</table>";
    }
}


//������� ���������� �����  �� ��������  � ������
function good_content_poisk($poisk_word)
{
    $poisk_word = trim($poisk_word);
    $poisk_word = str_replace('*', ' ', $poisk_word);
    $sql_txt = Get_sql_txt_for_search($poisk_word);
    $z = execute_sql($sql_txt);
    out_data_iz_poiska_v_brauzer($z, $poisk_word);
}


/*
//������� ���������� ��������� ����� �� �������� �����
function content_poisk($poisk_word){
	$poisk_word=trim($poisk_word);
	if (strlen($poisk_word)>1){
								 $k=strlen($poisk_word)-1;
								 if (($poisk_word[$k]=='%')||($poisk_word[$k]=='*')){
								 	$poisk_word[$k]=" ";
								 }
							  }
	if (strlen($poisk_word)>0){
								 $k=0;
								 if (($poisk_word[$k]=='%')||($poisk_word[$k]=='*')){
								 	$poisk_word[$k]=" ";
								 }
							   }
	$poisk_word=trim($poisk_word);
	$poisk_word=str_replace('*','%',$poisk_word);
	$z="
SELECT
   content, CONCAT(url,'?stroka_poiska=$poisk_word')as url, name, descr
from
    `t_content_poisk`,`t_web_page`
WHERE
     (`t_content_poisk`.`id_web_page`=`t_web_page`.`id`)
     AND
     (t_content_poisk.isactive='Y')
     and
     (t_web_page.isactive='Y')
     and
     (UPPER(content_anti_teg) like UPPER('%$poisk_word%'))
UNION ALL
select
   t_tovar.`name` as content,  CONCAT('prise.php?show_typ_tovar_id=',t_type_tovar.id,'&show_podtyp_id=',t_tovar.predok_id,'&stroka_poiska=$poisk_word') as url,'�����' as name, '����� ��� �� ���� ������' as descr
FROM
    t_types, t_tovar,t_type_tovar
where
    (t_types.tovar_id=t_tovar.id)
    AND
    (t_type_tovar.id=t_types.`type_id`)
    AND
    (t_type_tovar.`isactive`='Y')
    AND
    (t_tovar.`isactive`='Y')
    AND
    (UPPER(t_tovar.name) like UPPER('%$poisk_word%'))
UNION ALL
select
   t_tovar.`descr` as content,  CONCAT('prise.php?show_typ_tovar_id=',t_type_tovar.id,'&show_podtyp_id=',t_tovar.predok_id,'&stroka_poiska=$poisk_word') as url,'�����' as name, '����� ��� �� ���� ������' as descr
FROM
    t_types, t_tovar,t_type_tovar
where
    (t_types.tovar_id=t_tovar.id)
    AND
    (t_type_tovar.id=t_types.`type_id`)
    AND
    (t_type_tovar.`isactive`='Y')
    AND
    (t_tovar.`isactive`='Y')
    AND
    (UPPER(t_tovar.`descr`) like UPPER('%$poisk_word%'))
	";
	$r=execute_sql($z);
	return $r;
}

*/

?>