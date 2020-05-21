<?php
require_once "config/connect_db.php";
require_once "classes/CreateTable.php";
require_once "classes/Entries.php";

// CreateTable::dbCreateEntries($pdo);
// CreateTable::dbCreateComm($pdo);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<header>
    <h1>Блог начинающего бэкендера</h1>
    <hr>
</header>
<body>
<?php
$articles = Entries::getArticles($pdo);
//тут повешался фронтендщик))
foreach($articles as $article):
    $entries = new Entries($article['title'],$article['intro'],$article['content']);
    $entries->setId($article['id']);
    echo $entries->getTitle().'<br>'.
         mb_substr($entries->getContent(),0,50,'utf-8').' ... ';
?>
         <a href="articles/index.php?id=<?=$entries->getId();?>">Читать полностью</a><hr>
<?php endforeach; ?>
</body>
</html>
