<?php
//в этом модуле лежат глобальные константы для работы ядра

//Константы для подключения к базе данных
define("server_bd", "localhost");
define("user_bd", "bh47923_wu2");
define("psw_bd", "fAx-Q6M2]uB!");
define("name_bd", "bh47923_west_ural");

//Константы для входа в административный интерфейс
define("name_admin", "admin");
define("psw_admin", "s12grlfqprt6f");

//Константы абсолютных путей
define("prefiks_users_url", "http://www.west-ural.com/");
define("prefiks_admin_url", "http://www.west-ural.com/");
define("prefiks_api_url", "http://www.west-ural.com/api/");
define("place_site", "../../../../"); //расположение сайта по отношению к генератору страниц


//ПЕРЕМЕННЫЕ СЕССИИ
//$user_login - логин пользователя
//$user_password - пароль пользователя
//$id_notautorized - id неавторизованного пользователя (у которого нет своего логина и пароля)
?>