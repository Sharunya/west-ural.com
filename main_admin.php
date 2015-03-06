<?php
//подключение всего
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");

//проверка регистрации
if (!(@$_SESSION['login'])) {
    echo "<a href='admin.php'>Вы должны авторизироваться!</a>";
    exit();
}


//генерим вверх сайта
$s = get_top_admin_code();
echo $s;

//цепляемся к базе
connect_bd();

//Удаление фотки
if (@$_GET['dlt_id_foto']) {
    dlt_foto($_GET['dlt_id_foto']);
}


if (@$_GET['edit_id_foto']) {
    $edit_id_foto = ($_GET['edit_id_foto']);
}

if (@$_GET['filter_id_foto']) {
    $filter_id_foto = $_GET['filter_id_foto'];
} else {
    $filter_id_foto = 0;
}

if (@$_POST['filter_id_foto']) {
    $filter_id_foto = $_POST['filter_id_foto'];
}


//Редактирование фотки
if (@$final_edit_id_foto) {

    $id_avtor = ($_POST['list_avtor']);
    $id_razdel = ($_POST['list_razdel']);


    if (@$_POST['key_words']) {
        $key_words = ($_POST['key_words']);
    } else {
        $key_words = "";
    }

    if (@$_POST['cb_show_main_page']) {
        $show_main_page = "Y";
    } else {
        $show_main_page = "N";
    }


    if (@$_POST['cb_good_foto']) {
        $good_foto = "Y";
    } else {
        $good_foto = "N";
    }

    if (@$_POST['descr']) {
        $descr = $_POST['descr'];
    } else {
        $descr = "";
    }

    if (@$_POST['ORD_good_foto']) {
        $ORD_good_foto = $_POST['ORD_good_foto'];
    } else {
        $ORD_good_foto = 0;
    }

    if (@$_POST['ORD_SHOW_MAIN_PAGE']) {
        $ORD_SHOW_MAIN_PAGE = $_POST['ORD_SHOW_MAIN_PAGE'];
    } else {
        $ORD_SHOW_MAIN_PAGE = 0;
    }

    if (@$_POST['IS_TOP_FOTOBANK']) {
        $IS_TOP_FOTOBANK = "Y";
    } else {
        $IS_TOP_FOTOBANK = "N";
    }

    upd_foto($final_edit_id_foto, $id_avtor, $id_razdel, $key_words, $descr, $show_main_page, $good_foto, $ORD_good_foto, $ORD_SHOW_MAIN_PAGE, $IS_TOP_FOTOBANK);

//фильтр настроим на выбранную фотку
    $filter_razdel = $id_razdel;
    $filter_avtor = $id_avtor;
}


//Загрузка Фотки
//if ((@$_POST['btn_load'])&&(@$_POST['img_big'])&&(@$_POST['img_litle'])){

if ((@$_POST['btn_load']) && (@$_FILES['img_litle']) && (@$_FILES['img_big'])) {


    if (@$_POST['descr']) {
        $descr = $_POST['descr'];
    } else {
        $descr = "";
    }


    $dir_litle = './foto_litle/';
    $name_file_litle = basename($_FILES['img_litle']['name']);
    $tmp_file_litle = $_FILES['img_litle']['tmp_name'];

    $dir_big = './foto_big/';
    $name_file_big = basename($_FILES['img_big']['name']);
    $tmp_file_big = $_FILES['img_big']['tmp_name'];

    $id_avtor = ($_POST['list_avtor']);
    $id_razdel = ($_POST['list_razdel']);


    if (@$_POST['key_words']) {
        $key_words = ($_POST['key_words']);
    } else {
        $key_words = "";
    }


    if (@$_POST['cb_show_main_page']) {
        $show_main_page = "Y";
    } else {
        $show_main_page = "N";
    }


    if (@$_POST['cb_good_foto']) {
        $good_foto = "Y";
    } else {
        $good_foto = "N";
    }

    if (@$_POST['ORD_SHOW_MAIN_PAGE']) {
        $ORD_SHOW_MAIN_PAGE = $_POST['ORD_SHOW_MAIN_PAGE'];
    } else {
        $ORD_SHOW_MAIN_PAGE = 0;
    }

    if (@$_POST['ORD_good_foto']) {
        $ORD_good_foto = $_POST['ORD_good_foto'];
    } else {
        $ORD_good_foto = 0;
    }

    if (@$_POST['IS_TOP_FOTOBANK']) {
        $IS_TOP_FOTOBANK = "Y";
    } else {
        $IS_TOP_FOTOBANK = "N";
    }


//создаем фото
    $id_foto = create_foto($name_file_big, $name_file_litle, $id_avtor, $id_razdel, $key_words, $descr, $show_main_page, $good_foto, $ORD_good_foto, $ORD_SHOW_MAIN_PAGE, $IS_TOP_FOTOBANK);

//Создаем каталоги  для большой фотографии и маленькой фотографий
    mkdir($dir_big . $id_foto);
    mkdir($dir_litle . $id_foto);

//Копируем большую и маленькую фотографию
    copy($_FILES['img_litle']['tmp_name'], $dir_litle . $id_foto . "/" . $name_file_litle);
    copy($_FILES['img_big']['tmp_name'], $dir_big . $id_foto . "/" . $name_file_big);

//фильтр настроим на выбранную фотку
    $filter_razdel = $id_razdel;
    $filter_avtor = $id_avtor;
}

//редактирование фотографии
if (@$edit_id_foto) {
    $edit_foto = get_fotki(0, 0, $edit_id_foto);
}

if ($filter_id_foto > 0) {
    $filter_razdel = 0;
    $filter_avtor = 0;
}

?>

<table width="100%">
    <tr>
        <td align="center" class="cls_head_admin">
            <?php if (!(@$edit_foto)) {
                echo "Загрузка фотографий";
            } else {
                $k = sql_to_array($edit_foto, 'name_big');
                $c = sql_to_array($edit_foto, 'name_litle');

                if ($edit_foto > 1182) {
                    $name_big_foto = "./foto_big/$edit_id_foto/" . $k[1];
                    $name_litle_foto = "./foto_litle/$edit_id_foto/" . $c[1];
                } else {
                    $name_big_foto = "http://wu.netter.ru/foto_big/$edit_id_foto/" . $k[1];
                    $name_litle_foto = "http://wu.netter.ru/foto_litle/$edit_id_foto/" . $c[1];
                }

                echo "Редактирование фотографии - $k[1]
	 <br>
	 <br>
	 <a href='$name_big_foto' target='_blank')>
	 <img border='0' src='$name_litle_foto' >
	 </a>
	 ";

            } ?>
        </td>
    </tr>
    <tr>
        <td>
            <table align="center">
                <form action="main_admin.php" method="post" enctype="multipart/form-data">
                    <?php if (!(@$edit_foto)) {
                        echo "
		 <tr>
          <td class='cls_label_admin'>
           Маленькое изображение:
		   </td>
          <td>
           <input type='File' name='img_litle' id='img_litle'>
          </td>
         </tr>
         <tr>
          <td class='cls_label_admin'>
            Большое изображение:
		  </td>
          <td>
          <input type='File' name='img_big' id='img_big'>
          </td>
         </tr>";
                    } else {
                        echo "<input type='Hidden' name='final_edit_id_foto' value='$edit_id_foto'>  ";
                    }
                    ?>
                    <tr>
                        <td class="cls_label_admin">
                            Автор:
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>

                                        <?php
                                        $r = get_avtor();
                                        $id_avtor = sql_to_array($r, 'id_avtor');
                                        $name = sql_to_array($r, 'name');
                                        if (@$edit_foto) {
                                            $id = sql_to_array($edit_foto, 'id_avtor');
                                            create_select_combo("list_avtor", $id_avtor, $name, "", "", $id[1]);
                                        } else {
                                            if (@$_POST['list_avtor']) {
                                                create_select_combo("list_avtor", $id_avtor, $name, "", "", $_POST['list_avtor']);
                                            } else {
                                                create_select_combo("list_avtor", $id_avtor, $name, "", "", "");
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_avtor.php"><img src="img/pen.gif" border="0"></a>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="cls_label_admin">
                            Раздел:
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <?php
                                        $r = get_razdel();
                                        $id_avtor = sql_to_array($r, 'id_razdel');
                                        $name = sql_to_array($r, 'name');
                                        if (@$edit_foto) {
                                            $id = sql_to_array($edit_foto, 'id_razdel');
                                            create_select_combo("list_razdel", $id_avtor, $name, "", "", $id[1]);
                                        } else {
                                            if (@$_POST['list_razdel']) {
                                                create_select_combo("list_razdel", $id_avtor, $name, "", "", $_POST['list_razdel']);
                                            } else {
                                                create_select_combo("list_razdel", $id_avtor, $name, "", "", "");
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_razdel.php"><img src="img/pen.gif" border="0" border="0"></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="cls_label_admin" colspan="2">
                            Ключевые слова:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea cols="46" rows="6" name="key_words"
                                      title="Укажите через запятую ключевые слова, описывающие фотографию."><?php if (@$edit_foto) {
                                    $t = sql_to_array($edit_foto, 'key_words');
                                    echo $t[1];
                                } ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <input type="checkbox" name="cb_show_main_page" <?php if (@$edit_foto) {
                                $t = sql_to_array($edit_foto, 'show_main_page');
                                if ($t[1] == "Y") {
                                    echo "checked='1'";
                                }
                            } ?> ><font class="cls_label_admin">Авторская кнопка</font>
                        </td>
                        <td colspan="1">
                            <font class="cls_label_admin"> ( порядковый номер <input name="ORD_SHOW_MAIN_PAGE"
                                                                                     type="Text" size="3"
                                                                                     value="<?php if (@$edit_foto) {
                                                                                         $t = sql_to_array($edit_foto, 'ORD_SHOW_MAIN_PAGE');
                                                                                         echo $t[1];
                                                                                     } ?>"> )</font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <input type="checkbox" name="cb_good_foto" <?php if (@$edit_foto) {
                                $t = sql_to_array($edit_foto, 'good_foto');
                                if ($t[1] == "Y") {
                                    echo "checked='1'";
                                }
                            } ?>><font class="cls_label_admin">TOP 30</font>
                        </td>
                        <td colspan="1">
                            <font class="cls_label_admin"> ( порядковый номер <input name="ORD_good_foto" type="Text"
                                                                                     size="3"
                                                                                     value="<?php if (@$edit_foto) {
                                                                                         $t = sql_to_array($edit_foto, 'ORD_good_foto');
                                                                                         echo $t[1];
                                                                                     } ?>"> )</font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" name="IS_TOP_FOTOBANK" <?php if (@$edit_foto) {
                                $t = sql_to_array($edit_foto, 'IS_TOP_FOTOBANK');
                                if ($t[1] == "Y") {
                                    echo "checked='1'";
                                }
                            } ?>><font class="cls_label_admin">TOP фотобанка</font></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <?php if (!(@$edit_foto)) {
                                echo "<input type='submit' name='btn_load' value='Загрузить'>";
                            } else {
                                echo "<table><tr><td><input type='submit' name='btn_save' value='Сохранить'></td></form><form action='main_admin.php'><td><input type='submit' name='btn_cancel_save' value='Отмена'></td></tr></table>";
                            }
                            ?>
                        </td>
                    </tr>
                </form>
            </table>
            <br>
            <hr width="90%">
        </td>
    </tr>
    <tr>
        <td align="center" class="cls_head_admin">
            <br><br>
            Загруженные фотографии
        </td>
    </tr>
    <tr>
        <td align="center">
            <table border="0">
                <form id="frm_filter" action="main_admin.php" method="post">
                    <tr>
                        <td class="cls_label_admin">
                            № фото:
                        </td>
                        <td>

                            <input size="4" type="Text" name="filter_id_foto"
                                <?php
                                if ($filter_id_foto > 0) {
                                    echo " value='$filter_id_foto'";
                                }
                                ?>
                                >
                        </td>
                        <td>
                            <img src="img/poisk.gif" alt="" width="22" height="22" border="0"
                                 onclick="frm_filter.submit()">
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td class="cls_label_admin">
                            Автор:
                        </td>
                        <td>
                            <?php
                            $r = get_avtor();
                            $id_avtor = sql_to_array($r, 'id_avtor');
                            $name = sql_to_array($r, 'name');
                            $c = count($id_avtor) + 1;
                            $id_avtor[$c] = -1;
                            $name[$c] = "Все";
                            if (@$_GET['filter_avtor']) {
                                $filter_avtor = $_GET['filter_avtor'];
                            } else {
                                if (@$_POST['filter_avtor']) {
                                    $filter_avtor = $_POST['filter_avtor'];
                                } else {
                                    if (!(@$filter_avtor)) {
                                        $filter_avtor = $id_avtor[1];
                                    }
                                }
                            }
                            if ($filter_id_foto > 0) {
                                $filter_avtor = -1;
                            }

                            create_select_combo("filter_avtor", $id_avtor, $name, "", "frm_filter.submit()", $filter_avtor);
                            ?>
                        </td>
                        <td>
                            &nbsp;
                        </td>
                        <td class="cls_label_admin">
                            Раздел:
                        </td>
                        <td>
                            <?php
                            $r = get_razdel();
                            $id_avtor = sql_to_array($r, 'id_razdel');
                            $name = sql_to_array($r, 'name');
                            $c = count($id_avtor) + 1;
                            $id_avtor[$c] = -1;
                            $name[$c] = "Все";

                            if (@$_GET['filter_razdel']) {
                                $filter_razdel = $_GET['filter_razdel'];
                            } else {
                                if (@$_POST['filter_razdel']) {
                                    $filter_razdel = $_POST['filter_razdel'];
                                } else {
                                    if (!(@$filter_razdel)) {
                                        $filter_razdel = -1;
                                    }
                                }
                            }
                            if ($filter_id_foto > 0) {
                                $filter_razdel = -1;
                            }
                            create_select_combo("filter_razdel", $id_avtor, $name, "", "frm_filter.submit()", $filter_razdel);
                            ?>
                        </td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table cellpadding="0" cellspacing="0" border="1">
                <tr class='cls_table_content_admin' bgcolor="#F2F2F2">
                    <th>
                        №
                    </th>
                    <th>
                        Фото
                    </th>
                    <th>
                        Название файла
                    </th>
                    <th>
                        Раздел
                    </th>
                    <th>
                        Автор
                    </th>
                    <th>
                        Авторская кнопка
                    </th>
                    <th>
                        TOP 30
                    </th>
                    <th>
                        TOP фотобанка
                    </th>
                    <th>
                        Ключевые слова
                    </th>
                    <th colspan="2">
                    </th>
                </tr>
                <?php
                //Вывод фоток


                $r = get_fotki($filter_razdel, $filter_avtor, $filter_id_foto);

                $id_foto = sql_to_array($r, 'id_foto');
                $name_big = sql_to_array($r, 'name_big');
                $name_litle = sql_to_array($r, 'name_litle');
                $name_avtor = sql_to_array($r, 'name_avtor');
                $name_razdel = sql_to_array($r, 'name_razdel');
                $key_words = sql_to_array($r, 'key_words');
                $descr = sql_to_array($r, 'descr');
                $show_main_page = sql_to_array($r, 'show_main_page');
                $IS_TOP_FOTOBANK = sql_to_array($r, 'IS_TOP_FOTOBANK');
                $good_foto = sql_to_array($r, 'good_foto');
                $ORD_SHOW_MAIN_PAGE = sql_to_array($r, 'ORD_SHOW_MAIN_PAGE');
                $ORD_good_foto = sql_to_array($r, 'ORD_good_foto');

                for ($i = 1; $i < 1 + count($id_foto); $i++) {
                    if ($descr[$i] == "") {
                        $descr[$i] = "&nbsp;";
                    }
                    if ($key_words[$i] == "") {
                        $key_words[$i] = "&nbsp;";
                    }
                    $kov = '"';
                    if ($id_foto[$i] > 1182) {
                        $name_big_foto = "./foto_big/$id_foto[$i]/$name_big[$i]";
                        $name_litle_foto = "./foto_litle/$id_foto[$i]/$name_litle[$i]";
                    } else {
                        $name_big_foto = "http://wu.netter.ru/foto_big/$id_foto[$i]/$name_big[$i]";
                        $name_litle_foto = "http://wu.netter.ru/foto_litle/$id_foto[$i]/$name_litle[$i]";
                    }
                    echo "
         <tr class='cls_table_content_admin'>
          <td>
		  $id_foto[$i]
		  </td>
		  <td>
           <a href='$name_big_foto' target='_blank'><img id='foto_$id_foto[$i]' border='0' src='$name_litle_foto'></a>
          </td>
          <td>
            $name_big[$i]
          </td>
          <td>
            $name_razdel[$i]
          </thd>
          <td>
           $name_avtor[$i]
          </td>
          <td align='center'>
           $show_main_page[$i]";
                    if ($show_main_page[$i] == "Y") {
                        echo "<br>№$ORD_SHOW_MAIN_PAGE[$i]";
                    }

                    echo "</td>
          <td align='center'>
            $good_foto[$i]";
                    if ($good_foto[$i] == "Y") {
                        echo "<br>№$ORD_good_foto[$i]";
                    }
                    echo
                    "</td>
		  <td align='center'>
            $IS_TOP_FOTOBANK[$i]
          </td>
          <td>
            $key_words[$i]
          </td>
		  <td>
		   <img title='Редактировать фотографию' border='0' src='./img/pen.gif' onclick='edit_foto($id_foto[$i])'>
		  </td>
          <td>
           <img title='Удалить фотографию' border='0' src='./img/del.gif' onclick='delete_foto($id_foto[$i])'>
          </td>
         </tr>";
                }




                ?>
            </table>
        </td>
    </tr>
</table>
<script language="JavaScript">
    function delete_foto(id_foto) {
        if (confirm("Удалить фотографию?")) {
            k = '<?php echo prefiks_admin_url; ?>main_admin.php?dlt_id_foto=' + id_foto + '&filter_razdel=<?php echo $filter_razdel;?>&filter_avtor=<?php echo $filter_avtor; ?>';
            window.location.replace(k);
        }
        else {

        }
    }
</script>
<script language="JavaScript">
    function edit_foto(id_foto) {
        k = '<?php echo prefiks_admin_url; ?>main_admin.php?edit_id_foto=' + id_foto + '&filter_razdel=<?php echo $filter_razdel;?>&filter_avtor=<?php echo $filter_avtor; ?>';
        window.location.replace(k);
    }
</script>

<?php
$s = get_bottom_admin_code();
echo $s;
?>

