<?php


class CreateTable
{
    static public function dbCreateEntries($pdo){
        try{
            $sql = "CREATE TABLE entries(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR (255) NOT NULL,
                intro TEXT (500) ,
                content TEXT NOT NULL
                )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB";
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating db' . $exception->getMessage() . $exception->getCode();
            die();
        }

    }

    static public function dbCreateComm($pdo){
        try{
            $sql = "CREATE TABLE comments(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR (30) NOT NULL,
                body TEXT (2000) NOT NULL,
                entry_id INT,
                FOREIGN KEY (entry_id) REFERENCES entries (id) ON DELETE CASCADE 
                )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB";
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating db' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }
}