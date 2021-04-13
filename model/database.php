<?php
    $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=thftvh7iuvai1xws';
    $username = 'brtyxfi14gjqvpmp';
    $password = 'jozeq9qvauzkewri';

    try
    {
        $db = new PDO($dsn,$username,$password);
    } catch (PDOException $e)
    {
        $error = "Database error: ";
        $error .= $e -> getMessage();
        include('view/error.php');
        exit();
    }