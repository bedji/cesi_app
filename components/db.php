<?php
require_once('./components/config.php');
try {

    $db = new PDO('mysql:host=' . $HOST . '; dbname=' . $dbname . '; charset=UTF8', $user, $password);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    var_dump($th);
    die();
}
