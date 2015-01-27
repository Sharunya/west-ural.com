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

//Добавление новости
if ((@$_POST['btn_add_news']) && (@$_POST['txt_news'])) {

    add_news("", $_POST['txt_news'], "", "", "", "", "", "");

}

//Удаление новости
if (@$_GET['dlt_id']) {
    del_news_logical($_GET['dlt_id']);
}


//генерим вверх сайта
$s = get_top_admin_code();
echo $s;


?>


    <table width="100%">
        <tr>
            <td align="center" class="cls_head_admin">
                Новости
            </td>
        </tr>
        <tr>
            <td>
                <table align="center">
                    <form action="admin_news.php" method="post">
                        <tr>
                            <td class='cls_label_admin'>
                                Текст новости:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea cols="46" rows="6" name="txt_news" title="Введите описание фотографмм, которое будет показываться на главной странице сайта"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <input type="Submit" name="btn_add_news" value="Добавить новость">
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
                            Новости на сайте
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table align="center" cellpadding="0" cellspacing="0" border="1">
                                <tr class='cls_table_content_admin' bgcolor="#F2F2F2">
                                    <Th>
                                        Новость
                                    </TH>
                                    <th>
                                    </th>
                                </tr>
                                <?php
                                $news = spisok_news_active();
                                $id = sql_to_array($news, 'id');
                                $big_descr = sql_to_array($news, 'big_descr');
                                for ($i = 1; $i < 1 + count($id); $i++) {
                                    echo "<tr>
		       <td>
			    $big_descr[$i]
			   </td>
			   <td>
               <img title='Удалить новость' border='0' src='./img/del.gif' onclick='delete_foto($id[$i])'>
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
            if (confirm("Удалить новость?")) {
                k = '<?php echo prefiks_admin_url; ?>admin_news.php?dlt_id=' + id_foto;
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