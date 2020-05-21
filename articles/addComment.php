<?php
require_once "../config/connect_db.php";
require_once "../classes/CreateTable.php";
require_once "../classes/Entries.php";
require_once "../classes/Comments.php";

if(empty($_POST['name'] && $_POST['body'])){
    echo 'Заполните все поля!';
    die();
}



$name = htmlspecialchars($_POST['name']);
$text = htmlspecialchars($_POST['body']);
$id = htmlspecialchars($_POST['id']);

Comments::addComment($pdo,$id,$name,$text);

header("location:index.php?id=$id");
