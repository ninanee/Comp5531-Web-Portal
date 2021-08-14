<?php

class Admin {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Admin_ID, FirstName, LastName, UserID
            FROM
                Admin;
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
                Admin_ID, FirstName, LastName, UserID
            FROM
                Admin
            WHERE Admin_ID = ?;
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
            INSERT INTO Admin 
                (FirstName, LastName, UserID)
            VALUES
                (:FirstName, :LastName, :UserID);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'FirstName' => $input['FirstName'] ?? null,
                'LastName' => $input['LastName'] ?? null,
                'UserID'  => $input['UserID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE Admin
            SET 
                FirstName = :FirstName,
                LastName  = :LastName,
                UserID = :UserID
            WHERE Admin_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'FirstName' => $input['FirstName'] ?? null,
                'LastName' => $input['LastName'] ?? null,
                'UserID'  => $input['UserID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM Admin
            WHERE Admin_ID = :id;
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