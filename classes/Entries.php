<?php


class Entries
{
    protected $id;
    protected $title;
    protected $intro;
    protected $content;

    public function __construct($title, $intro, $content)
    {
        $this->title = $title;
        $this->intro = $intro;
        $this->content = $content;
    }

    public function getIntro()
    {
        return $this->intro;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    static public function createArticle($pdo ,$title, $intro, $content){
        try {
            $sql = 'INSERT INTO entries SET 
                title = :title,
                intro = :intro,
                content = :content';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':title',$title);
            $statement->bindValue(':intro',$intro);
            $statement->bindValue(':content',$content);
            $statement->execute();
        }catch (Exception $exception){
            echo 'Error to write article ' . $exception->getCode() . ' ' . $exception->getMessage();
        }
    }

    static public function getArticles(PDO $pdo)
    {
        try {
            $sql = 'SELECT * FROM entries WHERE id';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $articles = $statement->fetchAll();
            return $articles;
        }catch (Exception $exception){
            echo 'Error to read articles ' . $exception->getCode() . ' ' . $exception->getMessage();
        }
    }

    static public function getArticlesById($id, PDO $pdo)
    {
        try{
            $sql = 'SELECT title, intro, content FROM entries WHERE id = :id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id',$id);
            $statement->execute();
            $articles = $statement->fetchAll();
            return $articles;
        }catch (Exception $exception){
            echo 'Error to read articles ' . $exception->getCode() . ' ' . $exception->getMessage();
        }
    }
}

