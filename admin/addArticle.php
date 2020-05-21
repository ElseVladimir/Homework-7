<?php
require_once "../config/connect_db.php";
require_once "../classes/Entries.php";
$title = htmlspecialchars($_POST['title']);
$intro = htmlspecialchars($_POST['intro']);
$content = htmlspecialchars($_POST['content']);

if(empty($title && $intro && $content)){
    echo 'Заполните все поля';
    die();
}

if(!empty($title && $intro && $content)) {
    Entries::createArticle($pdo, $title, $intro, $content);
    header('Location: /admin/index.php');
    die();
}