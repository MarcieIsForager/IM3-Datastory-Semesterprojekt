<?php
    $host = "toverudu.mysql.db.internal";
    $dbname = "toverudu_im3test";
    $dbuser = "toverudu_im3usr";
    $password = "npUM7?QK8P-Mz8D";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];