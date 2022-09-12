<?php
     //headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');

 include_once '../../PHPDB/Database.php';
 include_once '../../models/user.php';


    // Instan DB + connection

    $database = new Database();
    $db = $database->connect();

    // echo $db;
    // Instan object

    $user = new user($db); 

    $username = $_POST['username'];
    $password = $_POST['password'];


    echo $username, $password;

    $user->create($username, $password); 

