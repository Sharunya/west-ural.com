<?php
session_start();
require_once("fun.php");
require_once("./api/include_all_1.php");


//проверка регистрации
if (@$_GET['login']) {
    $login = $_GET['login'];
    $psw = $_GET['psw'];
}

if ((@$login) && (@$psw)) {
    if (($login == name_admin) && ($psw == psw_admin)) {
        $_SESSION['login'] = $login;
        $kov = '"';
        echo "<script language=" . $kov . "JavaScript" . $kov . ">";
        echo "window.open(" . $kov . "main_admin.php" . $kov . "," . $kov . "_top" . $kov . ");";
        echo "</script>";
        exit();
    }
}

$s = get_top_admin_code();
echo $s;
?>
<table cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td>

        </td>
    </tr>
    <tr>
        <td height="120">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td align="center">
            <table>
                <form action="admin.php" method="get">
                    <tr>
                        <td class="cls_label_admin">
                            Логин:
                        </td>
                        <td>
                            <input type="text" name="login" id="login" size="17">
                        </td>
                    </tr>
                    <tr>
                        <td class="cls_label_admin">
                            Пароль:
                        </td>
                        <td>
                            <input type="password" name="psw" id="psw" size="17">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" name="GO" value="Войти">
                        </td>
                    </tr>
                </form>
            </table>
        </td>
    </tr>
</table>
<?php
$s = get_bottom_admin_code();
echo $s;
?>
