<?php


class Comments
{
    protected $id;
    protected $name;
    protected $body;

    public function __construct($name, $body)
    {
        $this->name = $name;
        $this->body = $body;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBody()
    {
        return $this->body;
    }

    static public function addComment(PDO $pdo,$id,$name,$text){
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
    }

    static public function getComments($id, PDO $pdo){
        try {
            $sql = 'SELECT * FROM comments WHERE entry_id = :id';
            $statements = $pdo->prepare($sql);
            $statements->bindValue(':id', $id);
            $statements->execute();
            $comments = $statements->fetchAll();
            return $comments;
        }catch (Exception $exception){
            echo 'Error to read comments ' . $exception->getCode() . ' ' . $exception->getMessage();
        }
    }
}