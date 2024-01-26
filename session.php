<?php
session_start(); // Начало сессии

require_once './Person.php';

use person\Person, a\Person as Person2;


echo "<pre style='font-size: 18px'>";





$_SESSION['name'] = 'Farid';

print_r($_SESSION);
print_r(session_get_cookie_params());   


$user = new Person('Farid');
$user2 = new Person2(26);

print_r($user);
print_r($user2);

echo "</pre>";
echo session_name();

function my_autoloader($class) {
    echo "Вызов функции автозагрузки<br>";
    require $class . ".php";
}
 
spl_autoload_register("my_autoloader");

$s = <<< String
Hello World!
Bye World..
String;

