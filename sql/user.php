<?php

require_once __DIR__.'/../config.php';

function checkUser($username) {
    global $mysql;

    $username = mysql_escape_string($username);
    $query = mysql_query("SELECT * FROM user WHERE user = $username", $mysql);

    return mysql_num_rows($query) > 0 ? true : false;
}

function registerUser($username, $password, $nama, $email) {
    global $mysql;

    $username = mysql_escape_string($username);
    $password = mysql_escape_string($password);
    $nama = mysql_escape_string($nama);
    $email = mysql_escape_string($email);

    return mysql_query("
        INSERT INTO user (username, password,nama,email) VALUES ('$username' , '$password' , '$nama' , '$email')
    ", $mysql);
}
?>