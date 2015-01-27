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

//цепляемся к базе
connect_bd();


//Удаление фотки
if (@$_GET['dlt_id_foto']) {
    dlt_top_foto($_GET['dlt_id_foto']);
}

//обновление фотки
if (@$_POST['id_save']) {
    if (@$_POST['descr']) {
        $descr = $_POST['descr'];
    } else {
        $descr = "";
    }

    update_top_foto($_POST['id_save'], $descr);
}


if ((@$_POST['btn_load']) && (@$_FILES['img_1'])) {


    if (@$_POST['descr']) {
        $descr = $_POST['descr'];
    } else {
        $descr = "";
    }

    $dir_top = './foto_top/';
    $name_file = basename($_FILES['img_1']['name']);
    $tmp_file = $_FILES['img_1']['tmp_name'];

    $id_reklama = create_top_foto($name_file, $descr);

    mkdir($dir_top . $id_reklama);
    copy($_FILES['img_1']['tmp_name'], $dir_top . $id_reklama . "/" . $name_file);


}


//генерим вверх сайта
$s = get_top_admin_code();
echo $s;


?>

<table width="100%">
    <tr>
        <td align="center" class="cls_head_admin">
            <?php

            if (@$_GET['edit_id_foto']) {
                echo "Редактирование фотографии";
            } else {
                echo "Загрузка фотографий для рекламы";
            }

            ?>

        </td>
    </tr>
    <tr>
        <td align="center">
            <br>
            <table>
                <tr>
                    <td>
                        <table>
                            <form action="admin_main_foto.php" method="post" enctype="multipart/form-data">
                                <?php
                                if (@$_GET['edit_id_foto']) {
                                    $fotki = get_list_top_foto($_GET['edit_id_foto']);
                                    $id_reklama = sql_to_array($fotki, 'id_reklama');
                                    $name_file = sql_to_array($fotki, 'name_file');
                                    $descr = sql_to_array($fotki, 'descr');
                                    echo "<img src='./foto_top/$id_reklama[1]/$name_file[1]'>";
                                } else {
                                    echo "
    <tr>	
	 <td class='cls_label_admin'>
	  Файл:
	 </td>
	 <td>
	  <input type='File' name='img_1' id='img_1'>
	 </td>
	</tr>
	";
                                } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td class='cls_label_admin'>
                                    Описание фотографии:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea cols="46" rows="6" name="descr" title="Введите описание фотографмм, которое будет показываться на главной странице сайта"><?php if (@$_GET['edit_id_foto']) {
                                            echo "$descr[1]";
                                        } ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <input type="Hidden" name="id_save" value="<?php if (@$_GET['edit_id_foto']) {
                            echo $_GET['edit_id_foto'];
                        } ?>">
                        <?php if (@$_GET['edit_id_foto']) {

                            echo "<input type='Submit' name='btn_save' value='Сохранить'>";
                        } else {
                            echo "<input type='Submit' name='btn_load' value='Загрузить'>";
                        } ?>
                    </td>
                </tr>
                </form>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <br>
            <br>
            <hr width="90%">
            <table align="center">
                <tr>
                    <td align="center" class="cls_head_admin">
                        <br><br>
                        Загруженные фотографии
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table cellpadding="0" cellspacing="0" border="1">
                            <tr class='cls_table_content_admin' bgcolor="#F2F2F2">
                                <th>
                                    Фото
                                </th>
                                <th>
                                    Описание
                                </th>
                                <th colspan="2">
                                </th>
                            </tr>
                            <?php
                            $fotki = get_list_top_foto();
                            $id_reklama = sql_to_array($fotki, 'id_reklama');
                            $name_file = sql_to_array($fotki, 'name_file');
                            $descr = sql_to_array($fotki, 'descr');

                            for ($i = 1; $i < 1 + count($id_reklama); $i++) {
                                echo "<tr>
		 		<td>
				 <img src='./foto_top/$id_reklama[$i]/$name_file[$i]'>
				</td>
				<td>
				$descr[$i]
				</td>
		  <td>
		   <img title='Редактировать фотографию' border='0' src='./img/pen.gif' onclick='edit_foto($id_reklama[$i])'>
		  </td>
          <td>
           <img title='Удалить фотографию' border='0' src='./img/del.gif' onclick='delete_foto($id_reklama[$i])'>
          </td>
		       </tr>";
                            }

                            ?>
                        </table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<script language="JavaScript">
    function delete_foto(id_foto)
    {
        if (confirm("Удалить фотографию?")) {
            k = '<?php echo prefiks_admin_url; ?>admin_main_foto.php?dlt_id_foto=' + id_foto;
            window.location.replace(k);
        }
        else {

        }
    }
</script>
<script language="JavaScript">
    function edit_foto(id_foto)
    {
        k = '<?php echo prefiks_admin_url; ?>admin_main_foto.php?edit_id_foto=' + id_foto;
        window.location.replace(k);
    }
</script>

<?php
$s = get_bottom_admin_code();
echo $s;
?>
