<?php
#********************************#
# SP-Forum 3.0                   #
# E-Mail: gcmsite@yandex.ru      #
#********************************#

if (!file_exists("cnf/spforum.x")) {
    header("Location: /index.php");
    exit;
}
include("cnf/forum.php");
?>
