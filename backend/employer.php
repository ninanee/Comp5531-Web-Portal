<?php

class Employer {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Employer_ID, Description, Name, Emoloyer_Balance, EmMembershipStartTime, UserId, GenreEm
            FROM
                Employer;
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
                Employer_ID, Description, Name, Emoloyer_Balance, EmMembershipStartTime, UserId, GenreEm
            FROM
                Employer
            WHERE Employer_ID = ?;
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
            INSERT INTO Employer 
                (Description, Name, Emoloyer_Balance, EmMembershipStartTime, UserId, GenreEm)
            VALUES
                (:Description, :Name, :Emoloyer_Balance, :EmMembershipStartTime, :UserId, :GenreEm);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Description' => $input['Description'] ?? null,
                'Name' => $input['Name'] ?? null,
                'Emoloyer_Balance'  => $input['Emoloyer_Balance'],
                'EmMembershipStartTime' => $input['EmMembershipStartTime'] ?? null,
                'UserId' => $input['UserId'],
                'GenreEm' => $input['GenreEm'] ?? null
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE Employer
            SET 
                Description = :Description,
                Name  = :Name,
                Emoloyer_Balance = :Emoloyer_Balance,
                EmMembershipStartTime = :EmMembershipStartTime,
                UserId = :UserId,
                GenreEm = :GenreEm
            WHERE Employer_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Description' => $input['Description'] ?? null,
                'Name' => $input['Name'] ?? null,
                'Emoloyer_Balance'  => $input['Emoloyer_Balance'],
                'EmMembershipStartTime' => $input['EmMembershipStartTime'] ?? null,
                'UserId' => $input['UserId'],
                'GenreEm' => $input['GenreEm'] ?? null
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM Employer
            WHERE Employer_ID = :id;
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