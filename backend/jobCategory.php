<?php

class JobCategory {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Genre, Name
            FROM
                JobCategory;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($genre)
    {
        $statement = "
            SELECT 
                Genre, Name
            FROM
                JobCategory
            WHERE Genre = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($genre));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO JobCategory 
                (Genre, Name)
            VALUES
                (:Genre, :Name);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'Name'  => $input['Name']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($genre, Array $input)
    {
        $statement = "
            UPDATE JobCategory
            SET 
                Genre = :Genre,
                Name  = :Name
            WHERE Genre = :genre;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'Name'  => $input['Name']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($genre)
    {
        $statement = "
            DELETE FROM JobCategory
            WHERE Genre = :genre;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('genre' => $genre));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}
?>