<?php
require_once "../config/connect_db.php";
require_once "../classes/CreateTable.php";
require_once "../classes/Entries.php";
require_once "../classes/Comments.php";

if(empty($_POST['name'] && $_POST['body'])){
    echo 'Заполните все поля!';
}

$name = htmlspecialchars($_POST['name']);
$text = htmlspecialchars($_POST['body']);
$id = htmlspecialchars($_POST['id']);

if(empty($id)){
    echo 'empty id';
}


try{
    $sql = 'INSERT INTO comments SET 
                name = :name,
                body = :body,
                entry_id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':body',$text);
    $statement->bindValue(':id',$id);
    $statement->execute();
}catch (Exception $exception){
    echo 'Error to write article ' . $exception->getCode() . ' ' . $exception->getMessage();
}
header("location:index.php?id=$id");
