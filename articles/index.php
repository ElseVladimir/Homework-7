<?php
require_once "../config/connect_db.php";
require_once "../classes/CreateTable.php";
require_once "../classes/Entries.php";
require_once "../classes/Comments.php";

$id = htmlspecialchars($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статьи</title>
</head>
<header>
    <h1>Блог начинающего бэкендера</h1>
    <hr>
</header>
<body>
<?php
$articles = Entries::getArticlesById($id, $pdo);
foreach($articles as $article):
    $entries = new Entries($article['title'],$article['intro'],$article['content']);
?>
    <div>
        <h2><?=$entries->getTitle();?></h2>
        <h4><?=$entries->getIntro();?></h4>
        <p>
            <span>
                <?=$entries->getContent();?>
            </span>
        </p>
<?php
endforeach;
?>
<hr>
    <h2>Добавить комментарий</h2>
        <form action="addComment.php" method="post">
            <label>Введите ваше имя <input type="text" name="name"></label><br>
            <label>Введите текст <textarea name="body"></textarea></label><br>
            <input type="hidden" name="id" value="<?=htmlspecialchars($id);?>">
            <button>send</button>
        </form>

</body>
</html>
