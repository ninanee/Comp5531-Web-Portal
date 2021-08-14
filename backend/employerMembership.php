<?php

class EmployerMembership {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Genre, MonthlyFee, MaxJobPost
            FROM
                EmployerMembership;
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
                Genre, MonthlyFee, MaxJobPost
            FROM
                EmployerMembership
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
            INSERT INTO EmployerMembership 
                (Genre, MonthlyFee, MaxJobPost)
            VALUES
                (:Genre, :MonthlyFee, :MaxJobPost);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'MonthlyFee'  => $input['MonthlyFee'],
                'MaxJobPost'  => $input['MaxJobPost']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($genre, Array $input)
    {
        $statement = "
            UPDATE EmployerMembership
            SET 
                Genre = :Genre,
                MonthlyFee  = :MonthlyFee,
                MaxJobPost = :MaxJobPost
            WHERE Genre = :genre;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'MonthlyFee'  => $input['MonthlyFee'],
                'MaxJobPost'  => $input['MaxJobPost']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($genre)
    {
        $statement = "
            DELETE FROM EmployerMembership
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