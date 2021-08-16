<?php

class Candidate {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Candidate_ID, FirstName, LastName, Candidate_Balance, CanMembershipStartTime, UserId, GenreCan
            FROM
                Candidate;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "
            SELECT 
                Candidate_ID, FirstName, LastName, Candidate_Balance, CanMembershipStartTime, UserId, GenreCan
            FROM
                Candidate
            WHERE Candidate_ID = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO Candidate 
                (FirstName, LastName, Candidate_Balance, CanMembershipStartTime, UserId, GenreCan)
            VALUES
                (:FirstName, :LastName, :Candidate_Balance, :CanMembershipStartTime, :UserId, :GenreCan);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'FirstName' => $input['FirstName'] ?? null,
                'LastName' => $input['LastName'] ?? null,
                'Candidate_Balance'  => $input['Candidate_Balance'] ?? null,
                'CanMembershipStartTime' => $input['CanMembershipStartTime'] ?? null,
                'UserId' => $input['UserId'],
                'GenreCan' => $input['GenreCan'] ?? null
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE Candidate
            SET 
                FirstName = :FirstName,
                LastName  = :LastName,
                Candidate_Balance = :Candidate_Balance,
                CanMembershipStartTime = :CanMembershipStartTime,
                UserId = :UserId,
                GenreCan = :GenreCan
            WHERE Candidate_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'FirstName' => $input['FirstName'] ?? null,
                'LastName' => $input['LastName'] ?? null,
                'Candidate_Balance'  => $input['Candidate_Balance'],
                'CanMembershipStartTime' => $input['CanMembershipStartTime'],
                'UserId' => $input['UserId'],
                'GenreCan' => $input['GenreCan'] ?? null
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM Candidate
            WHERE Candidate_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}
?>