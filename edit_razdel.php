<?php
//����������� �����
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");

//�������� �����������
if (!(@$_SESSION['login'])) {
    echo "<a href='admin.php'>�� ������ ����������������!</a>";
    exit();
}

//������� ����� �����
$s = get_top_admin_code();
echo $s;

//��������� � ����
connect_bd();

//���������� ������
if (@$_GET['name_avtor']) {
    $name_avtor = $_GET['name_avtor'];
    if (@$name_avtor) {
        create_razdel($name_avtor);
    }
}

//�������� ������
if (@$_GET['dlt_id_avtor']) {
    $dlt_id_avtor = $login = $_GET['dlt_id_avtor'];
    if (@$dlt_id_avtor) {
        delete_razdel($dlt_id_avtor);
    }
}


?>
<table align="center">
    <tr>
        <td>

            <table align="center">
                <form action="edit_razdel.php" method="get">
                    <tr>
                        <td class="cls_head_admin" colspan="2" align="center">
                            ���������� �������
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="cls_label_admin">
                            ������:
                        </td>
                        <td>
                            <input type="text" name="name_avtor" id="name_avtor">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" value="��������">
                        </td>
                    </tr>
                </form>
            </table>
            <br>
            <br>
            <br>
            <center><font class="cls_head_admin">������ ��������</font></center>
            <br>
            <table align="center" border="1" cellpadding="0" cellspacing="0">
                <tr class="cls_table_content_admin" bgcolor="#F2F2F2">
                    <th>
                        ������
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <?php
                $sql = "select id_razdel, name from `t_razdel` order by ord";
                $r = execute_sql($sql);
                $id_avtor = sql_to_array($r, 'id_razdel');
                $name = sql_to_array($r, 'name');
                for ($i = 1; $i <= count($id_avtor); $i++) {
                    echo "<tr class='cls_table_content_admin'><td>$name[$i]</td><td><img onclick='delete_razdel($id_avtor[$i])' src='img\del.gif' border='0'></td></tr>";
                }
                ?>
            </table>

        </td>
    </tr>
    <tr>
        <form action="main_admin.php" method="get">
            <td align="right">
                <br>
                <input type="submit" value="��������� � �������� ����������">
            </td>
        </form>
    </tr>
</table>
<script language="JavaScript">
    function delete_razdel(id_foto)
    {
        if (confirm("������� ������?")) {
            k = '<?php echo prefiks_admin_url; ?>edit_razdel.php?dlt_id_avtor=' + id_foto;
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
