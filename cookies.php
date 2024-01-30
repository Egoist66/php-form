<?php


echo "<pre style='font-size: 18px'>";
session_start(); // Начало сессии



print_r($_COOKIE);


echo "</pre>";


echo plus('test');
function plus(string $key) {
    if (isset($_COOKIE[$key])) {
        if ($_COOKIE[$key] === 'user1') {
            $_SESSION['count'] = $_SESSION['count'] ?? 0; // Значение по умолчанию 0
            $_SESSION['count']++; // Увеличение значения счетчика
            return $_SESSION['count'];
        }
    } else {
        echo "Куки установлены";
        setcookie($key, 'user1');
        return $_COOKIE[$key];
    }
}

?>

<a href="http://localhost:3003/php-form/">To main</a>