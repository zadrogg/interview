<?php

$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
$id = $_GET['id'];
$res = $mysqli->query('SELECT * FROM users WHERE u_id='. $id);$user = $res->fetch_assoc();

/**
 * проблема SQL - инъекция
 * недобпросовестный пользователь может добровольный SQL запрос
 */