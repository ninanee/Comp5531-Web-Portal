<?php

class CandidateMembership {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Genre, MonthlyFee, MaxJobApply
            FROM
                CandidateMembership;
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
                Genre, MonthlyFee, MaxJobApply
            FROM
                CandidateMembership
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
            INSERT INTO CandidateMembership 
                (Genre, MonthlyFee, MaxJobApply)
            VALUES
                (:Genre, :MonthlyFee, :MaxJobApply);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'MonthlyFee'  => $input['MonthlyFee'],
                'MaxJobApply'  => $input['MaxJobApply']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($genre, Array $input)
    {
        $statement = "
            UPDATE CandidateMembership
            SET 
                Genre = :Genre,
                MonthlyFee  = :MonthlyFee,
                MaxJobApply = :MaxJobApply
            WHERE Genre = :genre;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Genre' => $input['Genre'],
                'MonthlyFee'  => $input['MonthlyFee'],
                'MaxJobApply'  => $input['MaxJobApply']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($genre)
    {
        $statement = "
            DELETE FROM CandidateMembership
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