<?php
try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=testtech', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $pdo->exec("SET CHARACTER SET utf8");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }



