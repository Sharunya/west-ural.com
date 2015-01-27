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

//Добавление автора
if (@$_GET['name_avtor']) {
    $name_avtor = $_GET['name_avtor'];
    if (@$name_avtor) {
        create_avtor($name_avtor);
    }
}

//Удаление автора
if (@$_GET['dlt_id_avtor']) {
    $dlt_id_avtor = $login = $_GET['dlt_id_avtor'];
    if (@$dlt_id_avtor) {
        delete_avtor($dlt_id_avtor);
    }
}


?>
<table align="center">
    <tr>
        <td>

            <table align="center">
                <form action="edit_avtor.php" method="get">
                    <tr>
                        <td class="cls_head_admin" colspan="2" align="center">
                            Добавление автора
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="cls_label_admin">
                            Автор:
                        </td>
                        <td>
                            <input type="text" name="name_avtor" id="name_avtor">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" value="Добавить">
                        </td>
                    </tr>
                </form>
            </table>
            <br>
            <br>
            <br>
            <center><font class="cls_head_admin">Список авторов</font></center>
            <br>
            <table align="center" border="1" cellpadding="0" cellspacing="0">
                <tr class="cls_table_content_admin" bgcolor="#F2F2F2">
                    <th>
                        Автор
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <?php
                $sql = "select id_avtor, name from `t_avtor` order by name";
                $r = execute_sql($sql);
                $id_avtor = sql_to_array($r, 'id_avtor');
                $name = sql_to_array($r, 'name');
                for ($i = 1; $i <= count($id_avtor); $i++) {
                    echo "<tr class='cls_table_content_admin'><td>$name[$i]</td><td><img  onclick='delete_avtor($id_avtor[$i])' src='img\del.gif' border='0'></td></tr>";
                }
                ?>
            </table>

        </td>
    </tr>
    <tr>
        <form action="main_admin.php" method="get">
            <td align="right">
                <br>
                <input type="submit" value="Вернуться к загрузке фотографий">
            </td>
        </form>
    </tr>
</table>

<script language="JavaScript">
    function delete_avtor(id_foto)
    {
        if (confirm("Удалить автора?")) {
            k = '<?php echo prefiks_admin_url; ?>edit_avtor.php?dlt_id_avtor=' + id_foto;
            window.location.replace(k);
        }
        else {

        }
    }
</script>
<?php
$s = get_bottom_admin_code();
echo $s;
?>
