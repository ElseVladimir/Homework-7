<?php
require_once "../config/connect_db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
</head>
<header>
    <h1>Блог начинающего бэкендера[admin panel]</h1>
    <hr>
</header>
<body>
    <form method="post" action="addArticle.php">
        <label>Заголовок <input type="text" name="title"></label><br>
        <label>Интро <input type="text" name="intro"></label><br>
        <label>Статья <textarea name="content"></textarea></label><br>
        <button>send</button>
    </form>

</body>
</html>
