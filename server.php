<?php 
session_start();


echo "<pre>";
     print "<b>Document root - </b>" . ' ' . $_SERVER['DOCUMENT_ROOT']. "<br>";
    $arr = explode(",", $_SERVER['HTTP_ACCEPT']);
    $filtered = array_filter($arr, fn($v) => str_ends_with($v,'/webp'));

    print_r($arr) . "<br>";
    print_r($_SERVER);


echo "</pre>";


// if (!isset($_SESSION['referer_history'])) {
//     $_SESSION['referer_history'] = array();
// }

// // Добавить текущий HTTP_REFERER в историю
// if (!empty($_SERVER['HTTP_REFERER'])) {
//     $_SESSION['referer_history'][] = $_SERVER['HTTP_REFERER'];
// }

// // Вывести историю переходов
// echo "История переходов:<br>";
// foreach ($_SESSION['referer_history'] as $referer) {
//     echo $referer . "<br>";
// }

